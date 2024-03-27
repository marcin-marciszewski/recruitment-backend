### Instalation
##### In root folder run :
#### 
```
composer install
```
##### next:
####
```
./vendor/bin/sail up
```
##### in case of any issues:
####
```
docker-compose down --volumes
```

### Database population:
##### Open the container terminal (replace recruitment-backend with root folder name)
#### 
```
docker exec -it recruitment-backend-laravel.test-1 bash
```
##### next:
####
```
php artisan migrate --seed
```

### Frontend build
##### In container terminal ( after command: docker exec -it recruitment-backend-laravel.test-1 bash)
#### 
```
npm install
```
##### next:
####
```
npm run build
```
### Register an user for full functionality.
