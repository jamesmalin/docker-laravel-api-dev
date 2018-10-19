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
```

Go into the Laravel container:
```
docker exec -it docker-laravel-api-dev_php_1 /bin/bash
php artisan migrate:fresh
php artisan db:seed
```

Go into the React container:
```
docker exec -it docker-laravel-api-dev_react_1 /bin/bash
HOST=0.0.0.0 && npm start
```

### APIs:
http://127.0.0.1/api/consumedDrinks

http://127.0.0.1/api/consumedDrink

http://127.0.0.1/api/drinkList
