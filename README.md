## Wings

[![Laravel](https://github.com/axeldotdev/wings/actions/workflows/laravel.yml/badge.svg)](https://github.com/axeldotdev/wings/actions/workflows/laravel.yml)

Lorem ipsum dolor sit amet

## Requirements

-   PHP >= 8.0
-   BCMath PHP Extension
-   Ctype PHP Extension
-   Fileinfo PHP Extension
-   JSON PHP Extension
-   Mbstring PHP Extension
-   OpenSSL PHP Extension
-   PDO PHP Extension
-   Tokenizer PHP Extension
-   XML PHP Extension
-   MySQL >= 8.0
-   Redis → [Read the doc](https://redis.io/documentation)

## Installation

1\. Clone the repository

```bash
git clone git@github.com:futama-io/futama.git
cd application
```

2\. Run composer and NPM

```bash
composer install
npm install
npm run dev
```

3\. Create the `.env` file

```bash
cp .env.example .env
```

4\. Run some artisan commands

```bash
php artisan key:generate
php artisan storage:link
```

5\. Fill the `.env` file with your configurations

```bash
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost
APP_DOMAIN=localhost

DB_DATABASE=schedule
DB_USERNAME=root
DB_PASSWORD=

MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
```

6\. Add your superadmin emails into `/config/superadmins.php`

7\. Fill your database

```bash
php artisan migrate
```

8\. If you are in dev mode, you can seed your database

```bash
php artisan db:seed
```

9\. Fill the content of `/resources/js/Pages/Term/Show.vue`.

10\. Fill the content of `/resources/js/Pages/Policy/Show.vue`.

## Backups

If you need to run backups, you can do it with artisan :

```bash
php artisan backup:run
```

You can also schedule it in `/app/Console/Kernel.php` like that :

```php
protected function schedule(Schedule $schedule)
{
    // Initial commands

    $schedule->command('backup:run')->daily();
}
```

## Horizon

You can access Horizon via `/tools/horizon`.

## Telescope

You can access Telescope via `/tools/telescope`.
