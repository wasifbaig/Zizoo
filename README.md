Steps to run project
========================

1. Goto project directory

2. Download project dependencies <br>
composer install

3. Database creation <br>
php bin/console doctrine:database:create --if-not-exists

4. Table creation <br>
php bin/console doctrine:migration:migrate

5. Run Apache Server <br>
 php bin/console server:run
 
6. Call url <br>
http://localhost:8000/admin  
 
 

