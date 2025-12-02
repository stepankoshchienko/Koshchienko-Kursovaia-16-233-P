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

# 1. Сначала устанавливаем зависимости
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs --no-scripts \
    && npm install --legacy-peer-deps \
    && npm run build

# 2. Создаем нужные директории и устанавливаем права ПОСЛЕ копирования
RUN mkdir -p storage/framework/{sessions,views,cache} \
    && mkdir -p storage/logs \
    && mkdir -p bootstrap/cache

# 3. КРИТИЧЕСКИ ВАЖНО: правильные права для www-data пользователя
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 storage bootstrap/cache \
    && chmod -R 777 storage/logs

# 4. Запускаем artisan optimize
RUN php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

# 5. Копируем конфиг nginx
COPY docker/nginx.conf /etc/nginx/nginx.conf

EXPOSE 80

# 6. Запускаем от имени www-data
USER www-data
CMD sh -c "php-fpm -D && nginx -g 'daemon off;'"