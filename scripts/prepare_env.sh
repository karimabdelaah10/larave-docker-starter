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

npm install -g npm@9.8.1
npm i

php artisan key:generate

npm run build