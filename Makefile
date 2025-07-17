.PHONY: setup start migrate keygen storage-link seed

setup: .env
	docker-compose up --build -d
	@echo "Waiting for containers to start..."
	sleep 10
	make first-time

.env: .env.docker.example
	cp .env.docker.example .env

first-time:
	docker exec -it samarium_app npm run dev
	docker exec -it samarium_app composer dump-autoload
	docker exec -it samarium_app php artisan migrate
	docker exec -it samarium_app php artisan key:generate
	docker exec -it samarium_app php artisan storage:link
	docker exec -it samarium_app php artisan db:seed

start:
	docker-compose up --build -d
	@echo "Visit: http://127.0.0.1:8000"
	@echo "Dashboard: http://127.0.0.1:8000/dashboard"

stop:
	docker-compose down

logs:
	docker-compose logs -f
