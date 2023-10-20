### Instalacja
##### W folderze głównym uruchom :
#### 
```
composer install
```
##### następnie:
####
```
./vendor/bin/sail up
```
##### w razie problemów:
####
```
docker-compose down --volumes
```

### Populacja bazy danych:
##### Otwórz terminal kontenera (zastąp <recruitment-backend> na nazwe foldera głównego )
#### 
```
docker exec -it recruitment-backend-laravel.test-1 bash
```
##### następnie:
####
```
php artisan migrate --seed
```

### Budowa frontedu
##### W terminalu kontenera (po uruchomieniu docker exec -it recruitment-backend-laravel.test-1 bash)
#### 
```
npm install
```
##### następnie:
####
```
npm run build
```
### Zarejestruj się żeby zobaczyć pełną funkcjonalność.
