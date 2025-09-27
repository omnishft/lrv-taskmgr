FROM php:8.2-fpm

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y libicu-dev \
    && docker-php-ext-install pdo pdo_mysql intl



