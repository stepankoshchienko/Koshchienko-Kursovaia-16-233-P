# Используем официальный PHP образ
FROM php:8.2-fpm-alpine

# Минимальный набор
RUN apk update && apk add --no-cache \
    nginx \
    nodejs \
    npm \
    oniguruma-dev

# Базовые расширения PHP
RUN docker-php-ext-install pdo pdo_mysql mbstring

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Директории
RUN mkdir -p /run/nginx

WORKDIR /var/www

# Копируем код
COPY . .

# Устанавливаем зависимости
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs \
    && npm install --legacy-peer-deps \
    && npm run build

# Права
RUN chmod -R 775 storage bootstrap/cache

# Nginx конфиг
COPY docker/nginx.conf /etc/nginx/nginx.conf

EXPOSE 80

# Простой запуск
CMD sh -c "php-fpm -D && nginx -g 'daemon off;'"