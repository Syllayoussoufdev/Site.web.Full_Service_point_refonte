FROM php:8.3-apache
RUN apt-get update && apt-get install -y zip unzip \
    && docker-php-ext-install pdo_mysql zip
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN a2enmod rewrite
WORKDIR /var/www/html