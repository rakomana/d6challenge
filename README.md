# Invoice Manager
**Invoice Manager**.<br>
# Invoice API
**Invoice**.<br>

## Project Setup
```
composer install

composer run-script post-root-package-install

composer run-script post-create-project-cmd
```

## Project Requirements
1. PHP ^7.4

``
composer run-script clear-project-compiled-files
```
This command helps to perform the following CLI commands:
```
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```


## Project Setup
```
## Project Requirements
1. PHP ^7.4
2. MySQL
3. Vue.js cdn

## Project Guide
1. 

### Database Connection

MySQL
1. Servername = "localhost";
2. Username = "root";
3. Password = "";
4. db_name = "dichallenge";

## Alternative run db migrations
php artisan migrate

#Import the database name "d6challenge.sql" from the files to your database engine
