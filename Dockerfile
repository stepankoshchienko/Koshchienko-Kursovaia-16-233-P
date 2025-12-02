FROM php:8.2-fpm-alpine

RUN apk update && apk add --no-cache \
    nginx \
    nodejs \
    npm \
    oniguruma-dev

RUN docker-php-ext-install pdo pdo_mysql mbstring

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN mkdir -p /run/nginx

WORKDIR /var/www
COPY . .

# Установка с --no-scripts чтобы пропустить post-autoload-dump
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs --no-scripts \
    && npm install --legacy-peer-deps \
    && npm run build

# Запускаем скрипты отдельно ПОСЛЕ исправления кода
RUN composer run-script post-autoload-dump

RUN chmod -R 775 storage bootstrap/cache

COPY docker/nginx.conf /etc/nginx/nginx.conf

EXPOSE 80

CMD sh -c "php-fpm -D && nginx -g 'daemon off;'"