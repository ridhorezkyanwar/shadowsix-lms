FROM php:8.3-apache-bookworm

RUN apt-get update \
    && apt-get install -y --no-install-recommends curl \
    && docker-php-ext-install mysqli \
    && a2enmod headers \
    && a2enconf shadowsix-security \
    && mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini" \
    && { \
      echo "expose_php = Off"; \
      echo "display_errors = Off"; \
      echo "log_errors = On"; \
      echo "session.use_strict_mode = 1"; \
      echo "session.cookie_httponly = 1"; \
      echo "file_uploads = On"; \
      echo "upload_max_filesize = 5M"; \
      echo "post_max_size = 8M"; \
      echo "max_file_uploads = 5"; \
    } > "$PHP_INI_DIR/conf.d/zz-shadowsix.ini" \
    && rm -rf /var/lib/apt/lists/*

COPY docker/apache-security.conf /etc/apache2/conf-available/shadowsix-security.conf
COPY . /var/www/html/

RUN mkdir -p /var/www/html/uploads/materi /var/www/html/uploads/mapel \
    && chown -R www-data:www-data /var/www/html/uploads \
    && chmod 0750 /var/www/html/uploads /var/www/html/uploads/materi /var/www/html/uploads/mapel

WORKDIR /var/www/html

EXPOSE 80

HEALTHCHECK --interval=30s --timeout=5s --start-period=20s --retries=3 \
    CMD curl --fail --silent --show-error http://127.0.0.1/health.php || exit 1
