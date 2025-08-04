FROM php:8.2-fpm
WORKDIR /var/www
COPY . .
RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer
RUN composer install
CMD php artisan serve --host=0.0.0.0 --port=8000
