FROM php:8.2-apache

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions

#RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

#RUN apt-get clean

#Install libraries
RUN apt-get update \
    &&  apt-get install -y --no-install-recommends locales apt-utils git libicu-dev g++ libpng-dev libxml2-dev libzip-dev libonig-dev libxslt-dev unzip;

#Install local language
RUN echo "en_US.UTF-8 UTF-8" > /etc/locale.gen && \
    echo "fr_FR.UTF-8 UTF-8" >> /etc/locale.gen && \
    locale-gen;

# Symfony CLI
#RUN curl -sS https://get.symfony.com/cli/installer | bash && \
    #mv /root/.symfony5/bin/symfony /usr/local/bin/symfony;

# User owner setup
#RUN chown -R www-data:www-data /var/www/

#Install composer
#ENV COMPOSER_ALLOW_SUPERUSER=1
RUN curl -sS https://getcomposer.org/installer | php -- --disable-tls && \
    mv composer.phar /usr/local/bin/composer;

#Install nodejs & npm
RUN apt update && apt install -yqq nodejs npm;

RUN docker-php-ext-configure intl;
RUN docker-php-ext-install pdo pdo_mysql opcache intl zip calendar dom mbstring gd xsl;
RUN pecl install apcu && docker-php-ext-enable apcu;

#Copy project dir
#COPY . /var/www/

#Copy an apache config file from /docker/php/vhosts
#COPY ./docker/php/vhosts/apache.conf etc/apache2/sites-available/000-default.conf

RUN cd /var/www && \
    composer install && \
    npm install --force && \
    npm run build

#WORKDIR /var/www/

#ENTRYPOINT [ "bash", "./docker/docker.sh/" ]