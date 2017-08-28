FROM php:7.1-fpm

MAINTAINER Raniery Ribeiro <raniery.rrr@gmail.com>

RUN apt-get update \
	&& apt-get install -y \
	libpq-dev \
	libmcrypt-dev \
	zip \
	unzip \
	wget \
	curl \
	zlib1g-dev \
	libicu-dev \
	&& rm -rf /var/lib/apt/lists/* \
	&& rm -rf /tmp/* \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
	&& docker-php-ext-configure intl \
    && docker-php-ext-install pdo pdo_pgsql pgsql mcrypt pdo_mysql opcache intl zip

# install xdebug
#RUN pecl install xdebug
#RUN docker-php-ext-enable xdebug \
#    && echo "error_reporting = E_ALL" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
#    && echo "display_startup_errors = On" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
#    && echo "display_errors = On" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
#    && echo "xdebug.remote_enable = 1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
#    && echo "xdebug.remote_connect_back = 1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
#    && echo "xdebug.idekey = \"PHPSTORM\"" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
#    && echo "xdebug.remote_port = 9001" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

RUN pecl install xdebug
RUN docker-php-ext-enable xdebug \
    && echo "xdebug.remote_enable = 1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_connect_back = 1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.idekey = \"PHPSTORM\"" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_port = 9001" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

RUN php -r "copy('https://getcomposer.org/installer', '/tmp/composer-setup.php');"
RUN php /tmp/composer-setup.php
RUN php -r "unlink('/tmp/composer-setup.php');"
RUN cp composer.phar /usr/bin/composer
RUN chmod +x /usr/bin/composer

EXPOSE 9001
EXPOSE 9000