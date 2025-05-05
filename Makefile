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
# Зайти в контейнер і Виконати міграції
migrate_up mu:
	php index.php migrate
# Зайти в контейнер і Відкотити міграції
migrate_down md:
	php index.php migrate/down
