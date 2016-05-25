#!/bin/bash
DATE=`date +%Y-%m-%d:%H_%M_%S`
PWD=$(dirname $0)

echo "Instalando CodeServices" $DATE

echo " 1 Dependências do Projeto..."

composer install

echo " 2 Criando DataBase..."

touch database/database.sqlite

echo " 3 Configurando..."

cp .env.example .env

echo " 4 Criando Tables.."

php artisan migrate

echo " 5 Criando Registros.."

php artisan db:seed --class=StartTableSeeder

echo "5 - Server Start"

echo "6 - Dados do usuario , email :admin@admin.com, senha: admin"

php -S localhost:8080 -t ./public/
