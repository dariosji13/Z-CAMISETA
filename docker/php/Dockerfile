FROM php:8.3-cli

# Instalar dependencias del sistema
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

# Instalar extensiones de PHP necesarias para Laravel
RUN docker-php-ext-install intl zip pdo pdo_pgsql

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Directorio de trabajo dentro del contenedor
WORKDIR /var/www

# Copiar archivos necesarios
COPY . .

# Instalar dependencias PHP sin requerir la plataforma del host
RUN composer install --ignore-platform-reqs --no-interaction --prefer-dist

# Mantener el contenedor vivo en GitHub Actions
CMD ["sleep", "infinity"]
