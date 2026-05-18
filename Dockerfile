FROM php:8.2-apache

# ── System deps ──────────────────────────────────────────────────────────────
RUN apt-get update && apt-get install -y \
        git curl zip unzip \
        # GD dependencies (jpeg + webp + freetype)
        libjpeg62-turbo-dev libpng-dev libwebp-dev libxpm-dev libfreetype6-dev \
        # PostgreSQL / other PHP ext deps
        libpq-dev libzip-dev libonig-dev \
        # Node.js 20
        ca-certificates gnupg \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    # Configure GD with WebP + JPEG + FreeType support
    && docker-php-ext-configure gd \
        --with-jpeg \
        --with-webp \
        --with-freetype \
    && docker-php-ext-install \
        pdo pdo_pgsql pdo_mysql \
        mbstring gd zip opcache \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# ── PHP ini tweaks (upload limits, memory) ───────────────────────────────────
RUN { \
    echo 'upload_max_filesize = 50M'; \
    echo 'post_max_size = 50M'; \
    echo 'memory_limit = 512M'; \
    echo 'max_execution_time = 120'; \
    echo 'max_input_time = 120'; \
} > /usr/local/etc/php/conf.d/uploads.ini

RUN { \
    echo 'opcache.enable=1'; \
    echo 'opcache.memory_consumption=128'; \
    echo 'opcache.interned_strings_buffer=8'; \
    echo 'opcache.max_accelerated_files=10000'; \
    echo 'opcache.revalidate_freq=0'; \
    echo 'opcache.validate_timestamps=0'; \
    echo 'opcache.fast_shutdown=1'; \
} > /usr/local/etc/php/conf.d/opcache.ini

# ── Apache setup ─────────────────────────────────────────────────────────────
RUN a2enmod rewrite

# Set DocumentRoot → Laravel public/
RUN sed -i 's|/var/www/html|/var/www/html/public|g' \
        /etc/apache2/sites-available/000-default.conf

# Directory config: allow .htaccess + symlinks
RUN printf '<Directory /var/www/html/public>\n\tOptions +FollowSymLinks\n\tAllowOverride All\n\tRequire all granted\n</Directory>\n' \
        > /etc/apache2/conf-available/laravel.conf \
    && a2enconf laravel

# ── App setup ─────────────────────────────────────────────────────────────────
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --optimize-autoloader --no-interaction

RUN npm ci && npm run build && rm -rf node_modules

# Storage dirs must be writable by www-data (775 = owner+group write)
RUN chown -R www-data:www-data /var/www/html \
    && find /var/www/html/storage -type d -exec chmod 775 {} \; \
    && find /var/www/html/storage -type f -exec chmod 664 {} \; \
    && chmod -R 775 /var/www/html/bootstrap/cache

COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

EXPOSE 80

ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["apache2-foreground"]
