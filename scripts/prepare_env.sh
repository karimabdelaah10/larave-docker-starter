#!/bin/sh

cd /var/www
echo "in prepare_env.sh"

composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev

FILE=./.env

if [ -f "$FILE" ]; then
    echo "$FILE exists."
else
    echo "$FILE does not exist."
    cp .env.example .env
    echo "$FILE created."

fi

php artisan key:generate
find /var/www -exec chown -R nobody:www-data {} \; && find /var/www  -type f -exec chmod 664 {} \; && find /var/www -type d -exec chmod 775 {} \;