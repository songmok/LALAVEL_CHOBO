#!/bin/bash

set -e

APP_DIR="/var/www/LALAVEL_CHOBO"

echo "================================="
echo " Laravel deployment started"
echo "================================="

cd "$APP_DIR"

echo "[1/5] Prepare Laravel directories"

mkdir -p bootstrap/cache
mkdir -p storage/framework/cache/data
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p storage/logs
mkdir -p storage/app/private
mkdir -p storage/app/public

chmod -R 775 bootstrap/cache storage

echo "[2/5] Composer install"

composer install \
  --no-dev \
  --no-interaction \
  --prefer-dist \
  --optimize-autoloader

echo "[3/5] Laravel cache"

if [ -f .env ]; then
    php artisan optimize:clear
    php artisan optimize
else
    echo ".env does not exist yet - skipping artisan optimize"
fi

echo "[4/5] Permissions"

chmod -R 775 bootstrap/cache storage

echo "[5/5] Done"

echo "================================="
echo " Laravel deployment completed"
echo "================================="