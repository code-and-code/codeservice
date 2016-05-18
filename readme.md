# Manage service servers developed with -> Lumen PHP Framework v5.1

## Instalação

#### 1 - Dependências do Projeto

Requisitos help -> https://github.com/angelobiscola/config-ambient

    php 5.5.9+
    composer

Instalação

#### 2 - Dependências do Projeto

Para instalar as dependências do projeto, execute o seguinte comando:

    composer install
   
#### 3 - Migrações

Para criar as tabelas necessárias, basta rodar o comando:

    touch database/database.sqlite
    php artisan migrate

#### 4 - Gerar Key

Precismos de uma key 32 bits, pode usar seguinte site

    http://textmechanic.com/text-tools/randomization-tools/random-string-generator/

#### 5 - Server Start

Para inicar o APP php artisan

    php artisan serve -> http://localhost:8000
    php artisan server --host "ip" --port "30" -> http://ip:port
    php -S locahost:8090 -t ./public/

## Configuracao .env

Para criar arquivo .env, basta rodar o comando:  cp .env.example .env 
    
    APP_ENV=local
    APP_DEBUG=false
    APP_KEY=SomeRandomKey!!!

    AUTH_DRIVE=eloquent
    AUTH_MODEL=\App\Model\User
    AUTH_TABLE=users

    DB_CONNECTION=sqlite

    SESSION_DRIVER=cookie
    CACHE_DRIVER=file
    QUEUE_DRIVER=sync


