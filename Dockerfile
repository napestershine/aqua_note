FROM php:8.4-fpm-alpine

RUN apk add --no-cache icu-dev postgresql-dev libzip-dev zip linux-headers \
    && docker-php-ext-install -j$(nproc) intl pdo_pgsql opcache zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY composer.json composer.lock* ./
RUN composer install --no-scripts --no-autoloader || true

COPY . .
RUN composer dump-autoload --optimize \
    && chown -R www-data:www-data /app
