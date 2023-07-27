#!/bin/sh

cd /var/www
find /var/www -exec chown -R nobody:www-data {} \; && find /var/www -type f -exec chmod 664 {} \; && find /var/www -type d -exec chmod 775 {} \;
php artisan route:trans:cache
php artisan migrate --force
php artisan cache:clear

php-fpm

chown -R www-data:www-data /var/www
chmod -R 755 /var/www/storage
composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev
php artisan key:generate
php artisan cache:clear
php artisan config:cache

/usr/bin/supervisord -c /etc/supervisord.conf
