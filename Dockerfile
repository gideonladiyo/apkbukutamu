# Dockerfile
FROM php:8.2-fpm-alpine

WORKDIR /var/www/html

RUN apk update && apk add --no-cache \
    build-base shadow curl \
    freetype-dev libpng-dev libjpeg-turbo-dev \
    php82-gd php82-exif php82-pcntl php82-bcmath php82-opcache \
    php82-zip php82-tokenizer php82-xml php82-xmlwriter \
    php82-pdo php82-pdo_mysql php82-mysqli php82-mysqlnd \
    php82-dom php82-session php82-ctype php82-fileinfo \
    php82-mbstring php82-curl php82-openssl php82-json \
    supervisor nginx

# Symlink GD config agar bisa digunakan CLI (php artisan)
RUN mkdir -p /usr/local/etc/php/conf.d/ && \
    ln -s /etc/php82/conf.d/00_gd.ini /usr/local/etc/php/conf.d/zz_gd.ini || true

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . .

COPY docker/nginx.conf /etc/nginx/http.d/default.conf
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

RUN composer install --optimize-autoloader --no-dev --no-interaction

RUN php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

EXPOSE 80

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
