# Вхід у контейнер PHP CLI# Вхід у контейнер PHP CLI
cli c:
	docker exec -it php-cli-codeigniter3 bash
# Запустити контейнери
up u:
	docker compose up -d
# Вийти і видалити контейнери
down d:
	docker compose down
# Перебудувати контейнери
build b:
	docker compose up --build -d
# Видалити volumes
volumes v:
	docker compose down -v
# Запустити проект
init:
	git clone https://github.com/kuzminskaliza/codeigniter3
	cd codeigniter3 && \
	docker compose up --build -d && \
	sleep 10 && \
	docker exec php-cli-codeigniter3 composer install && \
	docker exec php-cli-codeigniter3 php index.php migrate/up
