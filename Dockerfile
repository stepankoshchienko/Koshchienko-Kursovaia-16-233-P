FROM php:8.2-fpm-alpine

RUN apk update && apk add --no-cache \
    nginx \
    nodejs \
    npm \
    supervisor \
    oniguruma-dev \
    libxml2-dev

RUN docker-php-ext-install pdo pdo_mysql mbstring xml

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
COPY . .

# Устанавливаем зависимости СРАЗУ
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs --no-scripts \
    && npm install --legacy-peer-deps \
    && npm run build

RUN chmod -R 775 storage bootstrap/cache

COPY docker/nginx.conf /etc/nginx/nginx.conf
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

EXPOSE 80
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]