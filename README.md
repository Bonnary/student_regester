## Student register WU
create database name **student_register**
<br>to install open project directory in terminal or powershell <br>
```
cp .env.example .env
composer install
php artisan migrate:refresh --seed
```
<br>
run
<br>

``` php artisan serve ```

to start project
<br>

## Default account
> admin

- username: admin@gmail.com
- password: password

> staff

- username: staff@gmail.com
- password: password

<br>

run this in docker ```student_register container```
```  
apt-get update && apt-get install -y git curl libpng-dev libonig-dev libxml2-dev libldap2-dev zip unzip libzip-dev && composer install && php artisan migrate:refresh --seed

php artisan migrate:refresh --seed
```

if image not loading run this
``` php artisan storage:link ```
