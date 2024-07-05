FROM php:7.4-apache
WORKDIR /var/www/html/
RUN a2enmod rewrite
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo_mysql

# USER www-data
