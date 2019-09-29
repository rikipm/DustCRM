FROM php:apache
RUN apt-get update -y; \
    apt-get upgrade -y; \
    docker-php-ext-install mysqli pdo_mysql; \
    a2enmod ssl; \
    a2enmod rewrite

WORKDIR /var/www/