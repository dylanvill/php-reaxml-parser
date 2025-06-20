FROM php:8.3-zts-alpine3.20

# Install necessary packages and bash
RUN apk add --no-cache bash curl $PHPIZE_DEPS linux-headers libtool autoconf make g++

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install and enable Xdebug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# Copy app code
COPY . /var/www/app
WORKDIR /var/www/app

# Xdebug config
RUN echo "zend_extension=xdebug.so" > /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
    echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
    echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
    echo "xdebug.client_port=9003" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
    echo "xdebug.discover_client_host=true" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini