#!/bin/bash

set -e

echo "Waiting for the database..."
until nc -z db 3306; do
  sleep 1
done
echo "Database is up."

composer install --no-interaction
npm install

php artisan key:generate
php artisan migrate --force
php artisan db:seed --force
php artisan storage:link
composer dump-autoload

exec npm run dev
