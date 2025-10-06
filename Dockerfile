# Sử dụng image PHP có Apache tích hợp sẵn
FROM php:8.2-apache

# Thiết lập thư mục làm việc trong container
WORKDIR /var/www/html

# Cài các extension PHP cần cho Laravel
# - pdo_mysql: để Laravel kết nối MySQL
# - zip, gd, intl: cần cho nhiều package Laravel
RUN docker-php-ext-install pdo pdo_mysql

# Copy toàn bộ mã nguồn Laravel vào container
COPY . .

# Phân quyền cho storage & bootstrap/cache (Laravel yêu cầu ghi được)
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 storage bootstrap/cache

# Enable mod_rewrite để Laravel hoạt động với route đẹp
RUN a2enmod rewrite

# Chỉnh cấu hình Apache: chỉ định thư mục public là DocumentRoot
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Mở port 80 để truy cập web
EXPOSE 80

# Lệnh mặc định khởi chạy Apache
CMD ["apache2-foreground"]
