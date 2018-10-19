### Prerequisites

* [Docker](https://docs.docker.com/install/)
* [Docker Compose](https://docs.docker.com/compose/install/)

## Environments

### Getting Started
```bash
git clone https://github.com/jamesmalin/docker-laravel-api-dev.git
cd docker-laravel-api-dev
composer install
yarn install
docker-compose -f docker-compose-dev.yml up --build -d --force-recreate
docker exec -it docker-laravel-api-dev_php_1 /bin/bash
php artisan migrate:fresh
php artisan db:seed
```

### Dev or Local Mode
* docker-compose-dev.yml: generate automatically folders and require-dev dependencies on your local workspace including Xdebug.
Note: the yaml file has a key called:"XDEBUG_MODE", this yaml by default has the value true (1) to install it.

You can appreciate the dependencies generated automatically on your workspace!

## Running the tests

You have a [Travis](https://travis-ci.org/) Pipeline to apply Continous Integration, and other technology to test this environment.

You can modify the runtests.sh from the [scripts folder](https://raw.githubusercontent.com/jfernancordova/docker-laravel-api-dev/master/scripts/runtests.sh)

Insert jobs, instructions, builds in [this pipeline](https://raw.githubusercontent.com/jfernancordova/docker-laravel-api-dev/master/.travis.yml)