### © Copyright 2024 Jhon Steven Vique Rodriguez

## Requisitos tener instalada una BD posgresql o cambiar el motor del .env a Mysql
## Tener configurada las extensiones necesarias para Laravel 8.x
## En caso de usar linux instalar extensiones de php necesarios
## En caso de servidores de windows como XAMPP, WAMPSERVER modificar php.ini permitiengo pgsql, pgsql.pdo y extensiones de php.zip

### Cambiar las variables de entorno

### En caso de error ejecutar composer update 


### ejecutar las migraciones 

## php artisan migrate

### ejecutar los seeders 

## php artisan migrate:fresh --seed