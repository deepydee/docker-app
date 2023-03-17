FROM php:8.2-apache-buster

ARG user
ARG uid

COPY . /var/www/html
COPY docker/vhost.conf /etc/apache2/sites-available/000-default.conf

RUN mkdir -p /home/$user \
    && useradd -G www-data,root -u $uid -d /home/$user $user \
    && chown -R $user:$user /home/$user \
    && chmod -R 755 storage/ \
    && docker-php-ext-install pdo_mysql \
    && a2enmod rewrite

WORKDIR /var/www/html

USER $user

RUN php artisan config:clear
