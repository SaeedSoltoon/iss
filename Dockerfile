FROM php:8.0-fpm

USER root

RUN apt-get autoremove -y
RUN apt-get update -y
RUN apt-get upgrade -y
RUN apt-get install -y apt-utils autoconf pkg-config libssl-dev libzip-dev git gcc make autoconf libc-dev vim unzip
RUN docker-php-ext-install bcmath pdo pdo_mysql mysqli sockets zip

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_host = host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_port = 9003" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

RUN pecl install pcov \
    && docker-php-ext-enable pcov

RUN curl -sS https://getcomposer.org/installer | php \
        && mv composer.phar /usr/local/bin/ \
        && ln -s /usr/local/bin/composer.phar /usr/local/bin/composer

# install nodejs ,yarn and mysql-client
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash - \
    && apt-get install -y nodejs \
    && curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - \
    && echo "deb https://dl.yarnpkg.com/debian/ stable main" > /etc/apt/sources.list.d/yarn.list \
    && apt-get update \
    && apt-get install -y yarn

WORKDIR /home/iss
COPY . /home/iss/
#install deps
RUN composer install

#config laravel
RUN php artisan key:generate
RUN php artisan storage:link

#install npm packages
RUN npm install
RUN npm run dev
