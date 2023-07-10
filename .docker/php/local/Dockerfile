FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    mariadb-client \
    libpng-dev \
    libzip-dev \
    libonig-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    nano \
    bash \
    sudo \
    htop \
    unzip \
    git \
    curl \
    cron

# Install php-redis (with default options instead of confirming everything with 'yes')
RUN printf "\n" | pecl install redis

RUN yes | pecl install xdebug \
    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_autostart=off" >> /usr/local/etc/php/conf.d/xdebug.ini

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl
RUN docker-php-ext-install opcache

RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd

# Copy PHP config
COPY .docker/php/local/local.ini /usr/local/etc/php/conf.d/local.ini

# Disable PHP-fpm access logging to stdout, because we use it as a channel for application logs
# Access logs bring no value, as we still have richer nginx logs
# https://serverfault.com/questions/1024108/how-to-disable-php-fpm-request-logging
RUN echo "access.log = /dev/null" >> /usr/local/etc/php-fpm.d/www.conf


# Setup xdebug
ENV XDEBUG_SESSION 'Boilerplate'

RUN touch /var/log/xdebug.log
RUN sudo chmod 777 /var/log/xdebug.log

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy cron config
ADD .docker/php/cron/artisan-schedule-run /etc/cron.d/artisan-schedule-run

RUN touch /var/log/cron.log

RUN chmod 777 /etc/cron.d/artisan-schedule-run
RUN chmod +x /etc/cron.d/artisan-schedule-run

# Expose port 9000 and run entrypoint that do setup and start php-fpm
EXPOSE 9000
ENTRYPOINT .docker/php/local/entrypoints/entrypoint.sh
