FROM php:8.2-apache-buster

ARG user
ARG uid

# ENV PATH="./vendor/bin:$PATH"

RUN docker-php-ext-install pdo_mysql \
    && pecl install xdebug && docker-php-ext-enable xdebug \
    && a2enmod rewrite

COPY . /var/www/html
COPY docker/vhost.conf /etc/apache2/sites-available/000-default.conf
COPY docker/config/php/conf.d/*.ini "${PHP_INI_DIR}/conf.d/"

RUN mkdir -p /home/$user \
    && useradd -G www-data,root -u $uid -d /home/$user $user \
    && chown -R $user:$user /home/$user \
    && chmod -R 755 storage/

WORKDIR /var/www/html

USER $user

RUN php artisan config:clear
