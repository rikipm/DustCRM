FROM php:apache
RUN apt-get update -y; \
    apt-get upgrade -y; \
    docker-php-ext-install mysqli pdo_mysql; \
    a2enmod ssl; \
    a2enmod rewrite; \
    pecl install xdebug-2.7.1; \
    docker-php-ext-enable xdebug;

ADD ./php.ini /usr/local/etc/php/php.ini

WORKDIR /var/www/