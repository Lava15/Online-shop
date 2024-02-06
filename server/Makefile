include .env

LARAVEL_SERVICE=server_laravel

up:
	docker-compose up -d

down:
	docker-compose down
migrate:
	docker-compose exec ${LARAVEL_SERVICE} php artisan migrate
