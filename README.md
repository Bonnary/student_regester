## Student register WU
create database name **student_register**
<br>to install open project directory in terminal or powershell <br>
```
cp .env.example .env
composer install
php artisan migrate:refresh
php artisan db:seed
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
