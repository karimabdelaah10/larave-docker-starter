#!/bin/sh

cd /var/www

php artisan migrate --force

php-fpm

chown -R www-data:www-data /var/www
chmod -R 775 /var/www/storage

php artisan config:cache
php artisan cache:clear
/usr/bin/supervisord -c /etc/supervisord.conf

