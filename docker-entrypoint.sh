#!/bin/bash

# Use Render's actual URL for APP_URL
if [ -n "$RENDER_EXTERNAL_URL" ]; then
    export APP_URL="$RENDER_EXTERNAL_URL"
fi

# Create storage symlink
php artisan storage:link --force || true

# Run migrations
php artisan migrate --force || true

# Cache (any failure here is non-fatal)
php artisan config:cache || true
php artisan route:cache  || true
php artisan view:cache   || true

exec "$@"
