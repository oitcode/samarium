#!/bin/bash

##
##  app-install.sh
##
##  Author: Application developer
##
##  Bash script to setup this laravel application. All you have to do is run
##  this bash script, and your application will be completely setup. It will perform
##  below actions:
##
##  1. Check if php dependencies are installed. If not installed then install them.
##  2. Check if composer and npm are installed. If not installed then install them.
##  3. Create required database and grant access to the database.
##  4. Download and install composer dependencies.
##  5. Download and install npm dependencies.
##  6. Run migrations.
##  7. Generate application key.
##  8. Create storage links.
##
##  Thank you for trying out this application! 
##

echo '================================================================================'
echo 'Welcome'
echo '================================================================================'


##
## Do the required tasks for setting up a typical laravel application
## (which our application is!).
##
clear
echo '-- Setting up database'
echo -n 'Database name: '
read dbName
echo ''
echo ''
echo -n 'Database username: '
read dbUserName
echo -n 'Database password: '
read -s dbPassword
echo 'Need to execute'
sudo mysql  -e "CREATE DATABASE $dbName;"
sudo mysql  -e "CREATE USER ${dbUserName}@localhost IDENTIFIED BY '${dbPassword}';"
sudo mysql  -e "GRANT ALL PRIVILEGES ON $dbName.* TO $dbUserName@localhost;"


clear
echo '-- Press any key to continue ...'
read z

clear
echo '-- Creating env file'
cp env.example .env
sed -i "s/DB_DATABASE=/DB_DATABASE=$dbName/" .env
sed -i "s/DB_USERNAME=/DB_USERNAME=$dbUserName/" .env
sed -i "s/DB_PASSWORD=/DB_PASSWORD=$dbPassword/" .env


clear
echo '-- Press any key to continue ...'
read z

clear
echo '-- Install composer dependencies'
composer install


clear
echo '-- Press any key to continue ...'
read z

clear
echo '-- Install npm dependencies'
npm install
npm run dev


clear
echo '-- Press any key to continue ...'
read z

clear
echo '-- Running migrations'
php artisan migrate


clear
echo '-- Press any key to continue ...'
read z

clear
echo '-- Generating application key'
php artisan key:generate

clear
echo '-- Creating storage links'
php artisan storage:link

clear
echo '-- Press any key to continue ...'
read z

clear
echo '================================================================================'
echo 'App install completed'
echo '================================================================================'
