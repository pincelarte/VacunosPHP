# Usamos una imagen FPM (FastCGI) desde Docker Hub
FROM php:8.3-fpm

# Argumento para especificar la ID de usuario/grupo (útil para solucionar problemas de permisos en Linux/macOS)
ARG UID=1000
ARG GID=1000

# 1. Instalar dependencias necesarias para Laravel (git, zip, etc.)
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# 2. Instalar extensiones de PHP que Laravel requiere
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd sockets

# 3. Instalar Composer (el gestor de dependencias) desde Docker Hub
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 4. Crear un nuevo usuario llamado 'appuser' y configurar permisos
RUN usermod -u $UID www-data && groupmod -g $GID www-data

# 5. Definir el directorio de trabajo
WORKDIR /var/www/html

# 6. Comando para iniciar el servidor de procesos FPM
CMD ["php-fpm"]
