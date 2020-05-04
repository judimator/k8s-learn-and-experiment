FROM php:7.4-fpm

RUN apt-get update && apt-get install -y \
    wget \
    libmcrypt-dev \
    zlib1g-dev \
    libpq-dev \
    libzip-dev \
    unzip; \
    rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-install zip \
    pdo_pgsql

COPY ./app /var/www/app

WORKDIR /var/www/app
