FROM php:8.2-apache

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    nodejs \
    npm

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Enable Apache modules
RUN a2enmod rewrite

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy application code
COPY . .

# Set proper permissions
RUN chgrp -R www-data /var/www/html/storage \
    && chgrp -R www-data /var/www/html/bootstrap/cache \
    && chmod -R g+w /var/www/html/storage \
    && chmod -R g+w /var/www/html/bootstrap/cache

# Install PHP dependencies
RUN composer install --no-scripts --no-autoloader

# Install Node.js dependencies
RUN npm install

# Copy Apache virtual host configuration
COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

# Expose port for php artisan serve
EXPOSE 8000:80

# Start Apache
CMD ["apache2-foreground"]
# Copy the entrypoint script into the image
COPY docker-entrypoint.sh /var/www/html/docker-entrypoint.sh

# Make sure it is executable
RUN chmod +x /var/www/html/docker-entrypoint.sh

