FROM php:8.2-fpm

RUN apt update && apt install -y git

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www

COPY ./Laravel /var/www

RUN composer install --no-interaction --prefer-dist

EXPOSE 8000

CMD sh -c "until nc -z -v -w30 db 3306; do echo 'Waiting for database...'; sleep 10; done && \
    php artisan migrate && \
    php artisan db:seed --class=SeederAlumno && \
    php artisan serve --host=0.0.0.0 --port=8000"
