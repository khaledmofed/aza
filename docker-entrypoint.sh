#!/bin/bash
set -e

# Create storage symlink if not exists
php artisan storage:link --force 2>/dev/null || true

# Run migrations
php artisan migrate --force 2>/dev/null || true

# Cache config/routes/views
php artisan config:cache
php artisan route:cache
php artisan view:cache

exec "$@"
