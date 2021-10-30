Useful commands:

GRANT ALL PRIVILEGES ON *.* TO 'proj_user'@'localhost' IDENTIFIED BY 'password';
CREATE DATABASE proj;

mysql --user=proj_user --password=password proj < database/_data/dump.sql

php -S localhost:8000 -t public

php vendor/bin/codecept bootstrap 
php vendor/bin/codecept build
php vendor/bin/codecept generate:cest functional addUser
php vendor/bin/codecept run functional --steps
