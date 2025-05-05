FROM php:7.3-apache

RUN apt-get update && apt-get install -y \
    default-mysql-client \
    && docker-php-ext-install pdo pdo_mysql mysqli

RUN pecl install xdebug-2.9.6 && docker-php-ext-enable xdebug

RUN a2enmod rewrite

WORKDIR /var/www/codeigniter3-education
