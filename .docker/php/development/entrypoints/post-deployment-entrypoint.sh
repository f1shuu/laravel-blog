#!/bin/bash

#
# Copyright (C) WeAstronauts Software - All Rights Reserved 2022.
# Unauthorized copying of this file, via any medium is strictly prohibited
# Proprietary and confidential
#

# we use this script by overriding php dockerfile CMD in TaskDefinition

echo "Running post-deployment-startscript"

# we must always call config:cache to gain access to custom config files (ex deploy)
php artisan config:cache
php artisan migrate --force
php artisan deploy:seed

echo "Finished post-deployment-startscript"
