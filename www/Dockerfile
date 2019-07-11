
FROM php:7.2-apache

RUN apt-get update -y


RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN docker-php-ext-enable mysqli
RUN docker-php-ext-enable pdo
RUN docker-php-ext-enable pdo_mysql

RUN a2enmod rewrite
RUN a2enmod headers


RUN  service apache2 restart
