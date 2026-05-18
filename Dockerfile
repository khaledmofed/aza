FROM php:8.2-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libpq-dev libzip-dev libonig-dev \
    nodejs npm \
    && docker-php-ext-install pdo pdo_pgsql pdo_mysql mbstring gd zip opcache \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set DocumentRoot to Laravel's public folder
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf \
    /etc/apache2/apache2.conf \
    /etc/apache2/conf-available/*.conf

# Allow .htaccess overrides
RUN echo '<Directory /var/www/html/public>\n    AllowOverride All\n    Require all granted\n</Directory>' \
    > /etc/apache2/conf-available/laravel.conf && a2enconf laravel

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . .

# Install PHP dependencies (no dev)
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Install Node dependencies and build frontend
RUN npm ci && npm run build && rm -rf node_modules

# Set permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

# Create storage symlink and run migrations on start via entrypoint
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

EXPOSE 80

ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["apache2-foreground"]
