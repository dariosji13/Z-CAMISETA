FROM php:8.2-fpm

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    libpq-dev \
    zip unzip curl git \
    && docker-php-ext-install pdo pdo_pgsql

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Definir el directorio de trabajo
WORKDIR /var/www

# Copiar todo el proyecto dentro del contenedor
COPY . .

# Instalar dependencias de Laravel
RUN composer install

# Exponer el puerto del servidor Laravel si se ejecuta por 'php artisan serve'
EXPOSE 8000

CMD ["php-fpm"]
