#!/bin/sh
set -eu

if [ "${SHADOWSIX_AUTO_INIT_SCHEMA:-0}" = "1" ]; then
    attempt=1
    max_attempts=60

    while [ "$attempt" -le "$max_attempts" ]; do
        if php /var/www/html/scripts/bootstrap_railway.php; then
            break
        fi

        if [ "$attempt" -eq "$max_attempts" ]; then
            echo "ShadowSix database bootstrap did not complete; refusing to start the web server." >&2
            exit 1
        fi

        attempt=$((attempt + 1))
        sleep 2
    done
fi

# Persistent disks start with their own mount permissions; make upload directories writable by Apache.
mkdir -p /var/www/html/uploads/materi /var/www/html/uploads/mapel
chown www-data:www-data /var/www/html/uploads /var/www/html/uploads/materi /var/www/html/uploads/mapel
chmod 0750 /var/www/html/uploads /var/www/html/uploads/materi /var/www/html/uploads/mapel

# Bootstrap-only database-admin credentials must not be inherited by Apache/PHP requests.
unset DB_BOOTSTRAP_HOST DB_BOOTSTRAP_USER DB_BOOTSTRAP_PASSWORD DB_BOOTSTRAP_PORT DB_BOOTSTRAP_SSL DB_BOOTSTRAP_SSL_CA SHADOWSIX_AUTO_INIT_SCHEMA

exec "$@"
