#!/bin/bash
DATE=`date +%Y-%m-%d:%H_%M_%S`
PWD=$(dirname $0)

echo "Instalando CodeServices" $DATE

cd $PWD

echo " 1 Dependências do Projeto.."

composer install

echo " 2 Migrações"

touch database/database.sqlite
php artisan migrate
php artisan db:seed --class=StartTableSeeder

echo " 3 configurando..."

echo "  APP_ENV=local
        APP_DEBUG=true
        APP_KEY=KzUCanG69NAxTesSRENLMeZIfuzgX4Wo
        APP_LOG= daily

        AUTH_DRIVER=eloquent
        AUTH_MODEL=\App\Model\User
        AUTH_TABLE=users

        DB_CONNECTION=sqlite
        DB_FILE=db.sql

        SESSION_DRIVER=cookie
        CACHE_DRIVER=file
        QUEUE_DRIVER=sync"
        > .env
echo "5 - Server Start"
echo "6 - Dados do usuario , email :admin@admin.com, senha: admin"

php -S localhost:8080 -t ./public/
