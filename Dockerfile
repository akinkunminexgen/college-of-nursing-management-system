FROM php:7.4-apache

# Install PHP extensions
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git curl libonig-dev libxml2-dev libpng-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring zip xml gd

# Enable Apache rewrite
RUN a2enmod rewrite

# Set working dir
WORKDIR /var/www/html

# Set Laravel's public folder as DocumentRoot
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Adjust Apache config to use Laravel's public directory
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf
