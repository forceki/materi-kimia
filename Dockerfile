FROM php:7.4

RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    zip \
    vim \
    libzip-dev \
    unzip \
    git \
    libonig-dev \
    curl 

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-install pdo pdo_mysql 

WORKDIR /var/www

COPY . /var/www
ADD ./php.ini /usr/local/etc/php/conf.d/php.ini

RUN composer install
RUN php artisan storage:link
RUN php artisan key:generate 
RUN php artisan optimize

CMD php artisan serve --host=0.0.0.0 --port=8000
EXPOSE 8000