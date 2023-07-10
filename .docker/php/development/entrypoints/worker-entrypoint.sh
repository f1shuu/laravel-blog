#!/bin/bash

#
# Copyright (C) WeAstronauts Software - All Rights Reserved 2022.
# Unauthorized copying of this file, via any medium is strictly prohibited
# Proprietary and confidential
#

echo "Running startscript"
php artisan config:cache
date +'%Y-%m-%d %T' > startedAt.txt
php artisan horizon
