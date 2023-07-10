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

# Copy composer.lock and composer.json
COPY composer.lock composer.json /var/www/

# Copy PHP config
COPY .docker/php/production/local.ini /usr/local/etc/php/conf.d/local.ini

RUN touch /var/log/xdebug.log
RUN sudo chmod 777 /var/log/xdebug.log

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Install dependencies
COPY composer.json composer.json
RUN composer validate
RUN composer install --prefer-dist --no-scripts --no-dev --no-autoloader && rm -rf /root/.composer

# Context is set in docker-compose to repo dir
# Copy codebase
COPY . .

RUN composer dump-autoload --no-scripts --no-dev --optimize

# Copy preset .env
ADD .env.production .env

# Copy preset entrypoints
ADD .docker/php/production/entrypoints/ entrypoints/

# Copy existing application directory permissions
COPY --chown=www:www . /var/www

RUN mkdir -p storage/logs

RUN touch storage/logs/laravel.log
RUN touch /var/log/cron.log

# Copy cron config
ADD .docker/php/cron/artisan-schedule-run /etc/cron.d/artisan-schedule-run

RUN touch /var/log/cron.log

RUN chmod 777 storage/logs/laravel.log
RUN chmod -R 777 storage
RUN chmod -R 777 bootstrap/cache
RUN chmod 777 /etc/cron.d/artisan-schedule-run
RUN chmod +x /etc/cron.d/artisan-schedule-run
RUN chmod -R +x entrypoints

RUN ls -al

# Expose port 9000 and run entrypoint that do setup and start php-fpm
EXPOSE 9000
ENTRYPOINT entrypoints/entrypoint.sh
