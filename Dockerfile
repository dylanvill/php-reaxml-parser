FROM php:8.3-zts-alpine3.20

# Install bash
RUN apk add --no-cache bash

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . /var/www/app
WORKDIR /var/www/app