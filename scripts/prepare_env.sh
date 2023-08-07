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
php artisan migrate
#npm install -g npm@9.8.1
#npm i
#npm run build
source /bin/fix_permissions.sh
php artisan key:generate

