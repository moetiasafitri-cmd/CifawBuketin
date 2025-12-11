# Base image PHP 8.2 FPM
FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    default-mysql-client \
    libonig-dev \
    libxml2-dev \
    libcurl4-openssl-dev \
    zlib1g-dev \
    pkg-config \
    libssl-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring xml curl zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Set git safe directory
RUN git config --global --add safe.directory /var/www/html

# Install composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install Laravel dependencies
RUN composer install --no-interaction --optimize-autoloader --ignore-platform-reqs

# Expose port (Railway akan assign PORT)
EXPOSE 8000

# Run Laravel server with Railway port
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=${PORT}"]

