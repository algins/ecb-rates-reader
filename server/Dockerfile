FROM php:7.3-fpm

RUN apt-get update

RUN apt-get install --no-install-recommends -y \
    openssl \
    libxml2-dev \
    libzip-dev

RUN docker-php-ext-configure zip --with-libzip \
    && docker-php-ext-install \
        bcmath \
        ctype \
        fileinfo \
        json \
        mbstring \
        pdo \
        pdo_mysql \
        tokenizer \
        xml \
        zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer

WORKDIR /var/www/html

COPY . .

RUN composer install
RUN cp -n .env.example .env || true
RUN php artisan key:generate
