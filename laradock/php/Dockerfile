FROM php:7.1.1-fpm
RUN apt -yqq update
RUN apt -yqq install libxml2-dev
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install xml