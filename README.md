## boilerplate-backend

### Details

Backend (nginx) port: `45001`

API URL: `http://localhost:45001/api/v1`

Admin Dev Panel URL: `http://localhost:45001/admin`

Phpinfo: `http://localhost:45001/debug/phpinfo`

Version: http://localhost:45001/api/v1/info/version

Essential healthcheck: http://localhost:45001/health/check-essential
(returns 510 response code in case of healthcheck failure)

### Docs

API documentation (Postman collection) is available in `docs` directory.



### Instalation

1. Copy `.env.local` file to `.env` if it not exists
2. Run following commands in `php` container (`docker exec -it boilerplate-php bash`):
   1. `composer install`
   2. `php artisan key:generate`
   3. `chmod -R 777 storage`
   4. `php artisan migrate:fresh`
   5. `php artisan db:seed`


### Useful commands

#### Migrate
`php artisan migrate`

`php artisan migrate:fresh`

`php artisan migrate:fresh --seed`

`php artisan migrate:rollback --step=1` or `./rollback1step.sh`


#### Seed
`php artisan db:seed`


#### Config, cache
`php artisan config:clear`

`php artisan config:cache`

`php artisan cache:clear`

#### Misc
`php artisan about`

`php artisan db:show`

`php artisan model:show`

`php artisan route:list`


### Artisan
`php artisan route:list`

### Troubleshooting

#### Error "_No application encryption key has been specified_"

Verify that .env file exists. Run `php artisan key:generate`.

If the error still occurs, try clearing & caching the config:

`php artisan config:clear`

`php artisan config:cache`

#### Error "_SQLSTATE[42S02]: Base table or view not found_"

Run `php artisan migrate`

#### Error "_Class [...] not found_"

Run `composer install`
#### Error "_There is no permission named [...]_"

Permissions table is not up-to-date.
Run `php artisan deploy:seed`

#### Changes are not reflected in the API

If opcache is enabled, make sure that validate_timestamps option is `On`.
Go to phpinfo (http://localhost:45001/debug/phpinfo) and find "validate_timestamps" phrase.

To enable this option, add following line to `php` container env:

`PHP_OPCACHE_VALIDATE_TIMESTAMPS=1`

#### API errors despite proper configuration

Make sure that frontend envs are set up properly! In misconfigured frontend, requests can be sent to
wrong address. Verify URLs of XHR requests sent in the browser.
