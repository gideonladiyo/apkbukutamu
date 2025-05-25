# Gunakan base image PHP resmi dengan FPM (FastCGI Process Manager)
FROM php:8.2-fpm-alpine

# Set working directory
WORKDIR /var/www/html

# Instal dependensi sistem yang dibutuhkan Laravel
# Install ekstensi PHP dari source menggunakan docker-php-ext-install
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql mysqli

# Tambahan: Pastikan file konfigurasi GD dibaca oleh PHP CLI
# PHP CLI pada image ini memindai /usr/local/etc/php/conf.d/
# Paket php82-gd menempatkan konfigurasinya di /etc/php82/conf.d/00_gd.ini
# Kita buat symlink atau copy file tersebut. Symlink lebih baik.
RUN mkdir -p /usr/local/etc/php/conf.d/ && \
    if [ -f /etc/php82/conf.d/00_gd.ini ]; then \
    ln -s /etc/php82/conf.d/00_gd.ini /usr/local/etc/php/conf.d/zz_gd.ini; \
    echo "Symlinked 00_gd.ini"; \
    elif [ -f /etc/php82/conf.d/gd.ini ]; then \
    ln -s /etc/php82/conf.d/gd.ini /usr/local/etc/php/conf.d/zz_gd.ini; \
    echo "Symlinked gd.ini"; \
    else \
    echo "WARNING: GD .ini file not found in /etc/php82/conf.d/"; \
    fi

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