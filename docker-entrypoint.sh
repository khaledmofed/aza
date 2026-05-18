#!/bin/bash

# Use Render's actual URL for APP_URL
if [ -n "$RENDER_EXTERNAL_URL" ]; then
    export APP_URL="$RENDER_EXTERNAL_URL"
fi

# Ensure all required storage directories exist and are writable
mkdir -p storage/framework/cache/data
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p storage/app/public
mkdir -p storage/logs
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

# Create storage symlink
php artisan storage:link --force || true

# Run migrations
php artisan migrate --force || true

# Cache config/routes/views
php artisan config:cache || true
php artisan route:cache  || true
php artisan view:cache   || true

exec "$@"
