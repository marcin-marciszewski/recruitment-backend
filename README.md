# Instalacja
docker compose up
./vendor/bin/sail up

### Uruchom migracje
docker exec -it library-laravel.test-1 bash
php artisan migrate