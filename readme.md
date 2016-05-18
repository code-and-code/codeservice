# Manage service servers developed with -> Lumen PHP Framework v5.1


## Install

    https://github.com/code-and-code/interface-admin.git
    composer install
    cp .env.example .env [Config Env]
    touch database/database.sqlite
    php artisan migrate

    key generate 32 bits [http://textmechanic.com/text-tools/randomization-tools/random-string-generator/]
    php -S locahost:8090 -t ./public/

## Config Env

    APP_ENV=local
    APP_DEBUG=true
    APP_KEY=SomeRandomKey!!!

    AUTH_DRIVE=eloquent
    AUTH_MODEL=\App\Model\User
    AUTH_TABLE=users

    DB_CONNECTION=sqlite
    DB_FILE=db.sql

    SESSION_DRIVER=cookie
    CACHE_DRIVER=file
    QUEUE_DRIVER=sync


