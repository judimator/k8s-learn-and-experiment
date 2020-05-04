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
RUN yes | pecl install xdebug
RUN echo "$(curl -sS https://composer.github.io/installer.sig) -" > composer-setup.php.sig \
        && curl -sS https://getcomposer.org/installer | tee composer-setup.php | sha384sum -c composer-setup.php.sig \
        && php composer-setup.php && rm composer-setup.php* \
        && chmod +x composer.phar && mv composer.phar /usr/bin/composer

COPY conf.d/xdebug.ini $PHP_INI_DIR/conf.d/
COPY conf.d/php.ini $PHP_INI_DIR/conf.d/
COPY php-fpm.d/symfony.pool.conf /usr/local/etc/php-fpm.d/symfony.pool.conf

WORKDIR /var/www/app

EXPOSE 9001
