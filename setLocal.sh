#!/bin/bash
composer install
php artisan migrate:fresh
php artisan db:seed
echo "PASSPORT_PERSONAL_ACCESS_CLIENT_ID=\"1\"" >> .env
key="$(php artisan passport:install | grep "Client secret: " | awk '{print $NF}' | tail -n 1)"
echo "PASSPORT_PERSONAL_ACCESS_CLIENT_SECRET=\"$key\"" >> .env
echo "TABLAS_A_RESPALDAR=\"tw_corporativos,tw_documentos\"" >> .env

