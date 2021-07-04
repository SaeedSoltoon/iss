init:
	docker-compose build --force-rm --no-cache
	make up

up:
	docker-compose up -d
	docker exec -d iss php artisan migrate
	docker exec -d iss php artisan db:seed
	docker exec -d iss php artisan serve --host=0.0.0.0 --port=8080
	echo "Insurance Sale System is running at http://127.0.0.1:8010"
