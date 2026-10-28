#!/bin/sh
set -eu

if [ "${SHADOWSIX_AUTO_INIT_SCHEMA:-0}" = "1" ]; then
    attempt=1
    max_attempts=30

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

# The bootstrap-only root credentials must not be inherited by Apache/PHP requests.
unset DB_BOOTSTRAP_HOST DB_BOOTSTRAP_USER DB_BOOTSTRAP_PASSWORD SHADOWSIX_AUTO_INIT_SCHEMA

exec "$@"
