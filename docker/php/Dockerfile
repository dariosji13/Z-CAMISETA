FROM php:8.2-cli

# Instalar dependencias del sistema necesarias para extensiones
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    libzip-dev \
    zlib1g-dev \
    libicu-dev \
    libxml2-dev \
    libpq-dev \
    && rm -rf /var/lib/apt/lists/*
     # Limpiar caché de apt aquí para reducir el tamaño de la imagen

# Instalar extensiones de PHP
RUN docker-php-ext-install intl zip pdo pdo_pgsql

# Instalar Composer (desde la imagen oficial de Composer)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Crear directorio de trabajo
WORKDIR /var/www

COPY composer.json composer.lock* ./

# Copiar todos los archivos al contenedor
COPY . .

# Instalar dependencias del proyecto Laravel
#RUN composer install --ignore-platform-reqs --no-interaction --prefer-dist

#Instalar dependencias y configurar permisos
RUN composer install --ignore-platform-reqs --no-interaction --prefer-dist --verbose && \
    cp .env.example .env && \
    php artisan key:generate && \
    php artisan migrate &&\
    php artisan storage:link && \
    chmod -R 775 storage bootstrap/chache

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]


