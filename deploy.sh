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

echo "[2/5] Composer install"

composer install \
  --no-dev \
  --no-interaction \
  --prefer-dist \
  --optimize-autoloader

echo "[3/5] Database / Laravel cache"

if [ -f .env ]; then
    php artisan migrate --force
    php artisan optimize:clear
    php artisan optimize
else
    echo ".env does not exist yet - skipping Laravel commands"
fi

echo "[4/5] Runtime directories ready"

echo "[5/5] Done"

echo "================================="
echo " Laravel deployment completed"
echo "================================="
