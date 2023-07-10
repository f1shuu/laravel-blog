#!/bin/bash

#
# Copyright (C) WeAstronauts Software - All Rights Reserved 2022.
# Unauthorized copying of this file, via any medium is strictly prohibited
# Proprietary and confidential
#

echo "Running startscript"
#php artisan config:cache
date +'%Y-%m-%d %T' > startedAt.txt

env /bin/bash -o posix -c 'export -p' > /etc/cron.d/project_env.sh
chmod +x /etc/cron.d/project_env.sh
crontab /etc/cron.d/artisan-schedule-run

cron

# tail -f continuously streams text file
tail -f /var/log/cron.log
