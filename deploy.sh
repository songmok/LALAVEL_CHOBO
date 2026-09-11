#!/bin/bash

set -e

APP_DIR="/var/www/LALAVEL_CHOBO"

echo "================================="
echo " Laravel deployment started"
echo "================================="

cd "$APP_DIR"

echo "[1/5] Composer install"

composer install \
    --no-dev \
    --no-interaction \
    --prefer-dist \
    --optimize-autoloader

echo "[2/5] Storage directories"

mkdir -p storage/framework/cache/data
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p storage/logs
mkdir -p bootstrap/cache

echo "[3/5] Permissions"

chmod -R 775 storage bootstrap/cache

echo "[4/5] Laravel"

if [ -f .env ]; then
    php artisan optimize:clear
    php artisan optimize
else
    echo ".env does not exist yet - skipping artisan optimize"
fi

echo "[5/5] Done"

echo "================================="
echo " Laravel deployment completed"
echo "================================="