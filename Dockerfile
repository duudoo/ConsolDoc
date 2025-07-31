FROM php:8.2-fpm
WORKDIR /var/www
RUN apt-get update && apt-get install -y \
    libpq-dev git unzip curl && docker-php-ext-install pdo pdo_pgsql
COPY . .
RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer
RUN composer install
CMD php artisan serve --host=0.0.0.0 --port=8000
