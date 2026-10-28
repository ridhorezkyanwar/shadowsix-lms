FROM php:8.3-apache-bookworm

RUN apt-get update \
    && apt-get install -y --no-install-recommends curl \
    && docker-php-ext-install mysqli \
    && a2enmod headers \
    && mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini" \
    && { \
      echo "expose_php = Off"; \
      echo "display_errors = Off"; \
      echo "display_startup_errors = Off"; \
      echo "log_errors = On"; \
      echo "session.use_strict_mode = 1"; \
      echo "session.use_only_cookies = 1"; \
      echo "session.cookie_httponly = 1"; \
      echo "session.cookie_samesite = Lax"; \
      echo "file_uploads = On"; \
      echo "upload_max_filesize = 6M"; \
      echo "post_max_size = 13M"; \
      echo "max_file_uploads = 4"; \
      echo "max_execution_time = 60"; \
      echo "max_input_time = 60"; \
      echo "memory_limit = 128M"; \
    } > "$PHP_INI_DIR/conf.d/zz-shadowsix.ini" \
    && rm -rf /var/lib/apt/lists/*

# Copy the configuration before enabling it; otherwise a2enconf fails at build time.
COPY docker/apache-security.conf /etc/apache2/conf-available/shadowsix-security.conf
RUN a2enconf shadowsix-security

COPY . /var/www/html/

# Uploads are persisted separately by Compose; never include real uploads in the image.
RUN mkdir -p /var/www/html/uploads/materi /var/www/html/uploads/mapel \
    && chown -R www-data:www-data /var/www/html/uploads \
    && chmod 0750 /var/www/html/uploads /var/www/html/uploads/materi /var/www/html/uploads/mapel

WORKDIR /var/www/html

EXPOSE 80

HEALTHCHECK --interval=30s --timeout=5s --start-period=25s --retries=3 \
    CMD curl --fail --silent --show-error http://127.0.0.1/health.php || exit 1
