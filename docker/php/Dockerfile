FROM php:8.2-cli

# Instala dependencias del sistema necesarias
RUN apt-get update && apt-get install -y \
    unzip \
    libzip-dev \
    libicu-dev \
    zlib1g-dev \
    libxml2-dev \
    git \
    curl \
    && docker-php-ext-install intl zip pdo pdo_pgsql

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copia tu código
COPY . .

# Instala dependencias PHP
RUN composer install

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]


