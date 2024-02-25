# Dockerize Symfony App

## Prepare dev environment

- Create config files
- Edit hosts file to register new domain
- Run `docker-compose up -d`

## Install Symfony Skeleton

- Run `docker-compose exec php composer create-project symfony/skeleton:"5.*"`
- Run `docker-compose exec php composer require symfony/orm-pack`