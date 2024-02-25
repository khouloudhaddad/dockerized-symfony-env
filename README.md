# Dockerize Symfony App

## Prepare dev environment

- Create config files
- Edit hosts file to register new domain
- Run `docker-compose up -d`

## Install Symfony Skeleton

- Run `docker-compose exec php composer create-project symfony/skeleton:"5.*"`
- Run `docker-compose exec php composer require symfony/orm-pack`
- Run `docker-compose exec php composer require symfony/orm-pack`, choose "No" then update DATABASE_URL in .env file

## Create Postgres DB and entities

- Run `docker-compose exec php bin/console doctrine:schema:update --force`

## PHPUnit
- Run `docker-compose exec php composer require phpunit/phpunit`
- Run `docker-compose exec php composer require --dev symfony/phpunit-bridge`