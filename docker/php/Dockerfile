FROM php:8.2-rc-fpm

COPY ./docker/php/php.ini /usr/local/etc/php/php.ini

RUN groupadd -g 1000 developer

RUN useradd -ms /bin/bash --no-user-group -g developer -u 1000 developer

RUN apt -y update \
    && apt -y install \
    zip \
    unzip \
    curl

RUN docker-php-ext-install pdo_mysql

RUN cd /usr/bin

USER developer

WORKDIR /var/www/html