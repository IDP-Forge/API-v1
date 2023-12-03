install:
	- php artisan migrate
	- php artisan db:seed --class=IDPForgeCoreSeeder

prepare-testing-db:
	- php artisan migrate:fresh --database=mysql-testing
	- php artisan db:seed --database=mysql-testing --class=IDPForgeCoreSeeder
