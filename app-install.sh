#!/bin/bash

##
##  app-install.sh
##
##  Author: SPS
##
##

echo '================================================================================'
echo 'Welcome'
echo '================================================================================'

# echo '-- Cloning laravel project'
# git clone https://github.com/oitcode/khajanchi.git

clear
echo '-- Setup project name'
echo -n 'Project name: '
read projectName
mv khajanchi $projectName	
echo '-- Cd-ing into the project'
cd $projectName

clear
echo '-- Setting up database'
echo -n 'Database name: '
read dbName
echo ''
echo ''
echo -n 'Database username: '
read dbUserName
echo -n 'Database password: '
read dbPassword
echo 'Need to execute'
sudo mysql  -e "CREATE DATABASE $dbName;"
sudo mysql  -e "CREATE USER ${dbUserName}@localhost IDENTIFIED BY '${dbPassword}';"
sudo mysql  -e "GRANT ALL PRIVILEGES ON $dbName.* TO $dbUserName@localhost;"

clear
echo '-- Creating env file'
cp env.example .env
sed -i "s/DB_DATABASE=/DB_DATABASE=$dbName/" .env
sed -i "s/DB_USERNAME=/DB_USERNAME=$dbUserName/" .env
sed -i "s/DB_PASSWORD=/DB_PASSWORD=$dbPassword/" .env

clear
echo '-- Install composer dependencies'
composer install

clear
echo '-- Install npm dependencies'
npm install
npm run dev

clear
echo '-- Running migrations'
php artisan migrate

clear
echo '-- Generating application key'
php artisan key:generate

clear
echo '================================================================================'
echo 'App install completed'
echo '================================================================================'
