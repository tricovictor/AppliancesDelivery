# Introduction

This is a test project of a scraping website from another website. The articles will be used by this website to share with friends. Development done in Laravel with mysql as a database manager. 

# Requirements

	* Php 7 or higher
	* Apache
	* Mysql
	* Laravel (just to run cron because you need to run php artisan)
	* PhpMyadmin (optional)

# Getting started

## Create Database

You can enter your phpmyadmin and execute the attached script that recreates the database. You can also run the migrations from the root directory of the project with the "php artisan make: migration" command

## Copy project to your local machine or server

If you have laravel installed on your machine, you will have to clone the repository where you want it.
git clone https://github.com/tricovictor/AppliancesDelivery

## Modify the proyect access to Mysql

Edit the app \ .env file and modify

	DB_USERNAME_DATABASE=   your database name
	DB_USERNAME=   your user
	DB_PASSWORD=   your password

## Add task to cron

If you want the data to be updated daily, you can add the application directory to cron. With this we guarantee that once a day we execute this process.
To add it to cron permanently we must execute from the console: 
	* crontab -e  
	* add line : * * * * * php /path/to/artisan update:bd >> /dev/null 2>&1

To simply test the process and not add it to cron we can execute:  php artisan update:bd 

## Test users

Test users user1 up to user5 were created with the password "12345678"

# License

DevelopmentUY

# Author Information

Victor Torterola
=======
# AppliancesDelivery
