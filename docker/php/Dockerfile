FROM php:8.2-rc-fpm

COPY ./docker/php/php.ini /usr/local/etc/php/php.ini

RUN apt -y update \
    && apt -y install \
    zip \
    unzip \
    curl

RUN docker-php-ext-install pdo_mysql

RUN cd /usr/bin

WORKDIR /var/www/html