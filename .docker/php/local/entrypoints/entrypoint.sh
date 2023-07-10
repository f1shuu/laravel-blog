#!/bin/bash

#
# Copyright (C) WeAstronauts Software - All Rights Reserved 2022.
# Unauthorized copying of this file, via any medium is strictly prohibited
# Proprietary and confidential
#

# Default local entrypoint, used in Dockerfile
echo "Running local startscript"

chmod -R 777 storage/ bootstrap/cache/

if [[ ! -e .env ]]; then
    cp .env.local .env
    php artisan key:generate
fi

if [[ ! -e .buildinfo ]]; then
    cp .buildinfo.example .buildinfo
fi

php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan storage:link

exec "php-fpm"
