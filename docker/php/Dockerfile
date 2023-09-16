FROM php:fpm-buster

COPY ./.docker/php/php.ini /usr/local/etc/php/php.ini

RUN apt-get update \
    && apt-get -y install git zip unzip vim

RUN docker-php-ext-install pdo_mysql

RUN cd /usr/bin

WORKDIR /var/www/html