
# This is a sample CRUD using Doctrine PHP and Angular
System developed in Laravel 5.5 and PHP 7.2.10 for web with the intention to manage business plans.

## 1. Requirements for Install (Back-end)
Technologies :
    ```
    PHP 7.4.3
    ```    
    ```
    MySQL
    ```    
    ```
    Composer
    ```    

## 2. Installation (Back-end)

1. Go to the folder application using cd command on your cmd or terminal and insert:

    ```
    composer install
    ```    
    ```
    create a database with respective name: "waterstore"
    ```

    Run this command in root backend folder:
    ```
    vendor/bin/doctrine orm:schema-tool:create 
    ``` 

    For update database use this command:
    ```
    vendor/bin/doctrine orm:schema-tool:update -f
    ``` 
    
    ```
    php artisan serve
