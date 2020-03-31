FROM php:7.4-fpm

RUN apt-get update && apt-get install -y unzip

RUN docker-php-ext-install mysqli && \
	pecl install xdebug

RUN curl https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

ADD *.ini /usr/local/etc/php/conf.d/

ADD app.pool.conf /usr/local/etc/php-fpm.d/www.conf

WORKDIR /var/www/app
