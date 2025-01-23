# Usamos una imagen oficial de PHP con soporte para FPM
FROM php:8.2-fpm

# Instalamos las dependencias necesarias para Laravel (extensiones de PHP, Composer, etc.)
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev \
    zip git netcat-openbsd && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd pdo pdo_mysql

# Instalamos Composer para manejar las dependencias de Laravel
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Establecemos el directorio de trabajo
WORKDIR /var/www

# Copiamos los archivos del backend (Laravel) al contenedor
COPY ./Laravel /var/www

# Instalamos las dependencias de Laravel
RUN composer install --no-interaction --prefer-dist

# Exponemos el puerto 8000 para el servidor de desarrollo
EXPOSE 8000

# Comando por defecto al ejecutar el contenedor: esperar a que la base de datos esté lista, luego ejecutar las migraciones, seeders y levantar el servidor
CMD sh -c "until nc -z -v -w30 db 3306; do echo 'Waiting for database...'; sleep 10; done && \
    php artisan migrate && \
    php artisan db:seed --class=SeederAlumno && \
    php artisan serve --host=0.0.0.0 --port=8000"
