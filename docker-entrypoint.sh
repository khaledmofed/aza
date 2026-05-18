#!/bin/bash
set -e

# Render provides the real service URL in RENDER_EXTERNAL_URL
# Use it so asset() generates correct absolute URLs
if [ -n "$RENDER_EXTERNAL_URL" ]; then
    export APP_URL="$RENDER_EXTERNAL_URL"
fi

# Create storage symlink
php artisan storage:link --force 2>/dev/null || true

# Run pending migrations
php artisan migrate --force 2>/dev/null || true

# Cache config / routes / views (uses updated APP_URL)
php artisan config:cache
php artisan route:cache
php artisan view:cache

exec "$@"
