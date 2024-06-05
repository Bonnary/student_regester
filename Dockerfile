FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev # Add this line to install the libzip library needed for the PHP Zip extension

# install composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip # Add 'zip' here to install the PHP Zip extension

# Set up node and npm
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash
RUN apt-get update && apt-get -y install nodejs

# Set working directory
WORKDIR /app
COPY . /app

# Allow Composer plugins for root user (optional and not recommended)
ENV COMPOSER_ALLOW_SUPERUSER=1

RUN composer install && php artisan optimize:clear && \
php artisan storage:link

CMD php artisan serve --host=0.0.0.0 --port=8181
EXPOSE 8181
