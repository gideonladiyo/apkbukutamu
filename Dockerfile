# Gunakan base image PHP resmi dengan FPM (FastCGI Process Manager)
FROM php:8.2-fpm-alpine

# Set working directory
WORKDIR /var/www/html

# Instal dependensi sistem yang dibutuhkan Laravel
RUN apk update && apk add --no-cache \
    build-base shadow curl \
    php82-gd \
    php82-gd php82-exif php82-pcntl php82-bcmath php82-opcache \
    php82-zip php82-tokenizer php82-xml php82-xmlwriter \
    php82-pdo php82-pdo_mysql php82-mysqli php82-mysqlnd \
    php82-dom php82-session php82-ctype php82-fileinfo \
    php82-mbstring php82-curl php82-openssl php82-json \
    supervisor nginx

# Instal Composer secara global
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Salin file aplikasi
COPY . .

# Salin konfigurasi Nginx (jika ingin Nginx dalam container yang sama)
COPY docker/nginx.conf /etc/nginx/http.d/default.conf
# Salin konfigurasi Supervisor (untuk menjalankan php-fpm dan nginx)
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Setel izin yang benar untuk storage dan bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Install dependensi PHP
RUN composer install --optimize-autoloader --no-dev --no-interaction --no-plugins --no-scripts

# Optimasi Laravel
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

# Expose port untuk Nginx (jika Nginx di dalam container ini)
EXPOSE 80

# Perintah untuk menjalankan aplikasi (menggunakan Supervisor)
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]