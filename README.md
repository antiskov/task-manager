1. Змінити .env
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=task-manager
DB_USERNAME=user
DB_PASSWORD=secret

API_KEY=1234

CACHE_STORE=file

дані можете змінити під себе

2. Запустити команди
docker-compose build
docker compose up -d

3. Запустити сіди
зайти в контейнер
docker exec -it task-manager bash
запустити там команду
php artisan db:seed

якщо треба вимкнути контейнери
docker compose stop

якщо треба видалити контейнери
docker compose down

По дефолту порт стоїть 8082, щоб не коніфлкувати із запущеними локальними веб-серверами
Його можна змінити в docker-compose.yml

Якщо будуть проблеми з кешування, зайдіть в контейнер
docker exec -it task-manager bash
та оновіть права доступу цим папкам
chmod -R 775 /var/www/html/storage
chmod -R 775 /var/www/html/bootstrap/cache