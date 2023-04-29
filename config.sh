#!/bin/bash

echo "##### Inicializa os Containers ######"
docker-compose up -d --build

echo "##### Copia o .env #####"
docker exec jefffrade-carros-php-fpm cp .env.example .env

echo "##### Instala os Pacotes da Aplicação #####"
docker exec jefffrade-carros-php-fpm composer install

echo "##### Gera a Chave da Aplicação #####"
docker exec jefffrade-carros-php-fpm php artisan key:generate

echo "##### Cria as Tabelas e Popula o Banco de Dados #####"
docker exec jefffrade-carros-php-fpm php artisan migrate:fresh --seed
