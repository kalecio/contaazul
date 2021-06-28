FROM php:7.4-apache
RUN docker-php-ext-install pdo pdo_mysql
COPY . /var/www/html
COPY docker/www/apache2.conf /etc/apache2/apache2.conf
EXPOSE 80

RUN a2enmod rewrite
RUN chown=www:www . /var/www/html

WORKDIR /var/www/html