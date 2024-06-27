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
##  2. Create required database and grant access to the database.
##  3. Download and install composer dependencies.
##  4. Download and install npm dependencies.
##  5. Run migrations.
##  6. Generate application key.
##
##  Thank you for trying out this application! 
##

echo '================================================================================'
echo 'Welcome'
echo '================================================================================'


##
## First check that php dependencies are installed.
##

declare -a phpDependencies=(
                   "php"
                   "php-bcmath"
                   "php-json"
                   "php-mbstring"
                   "php-tokenizer"
                   "php-xml"
                   "php-common"
               )

## Check for each php dependency
for i in "${phpDependencies[@]}"
do
    REQUIRED_PKG=$i
    PKG_OK=$(dpkg-query -W --showformat='${Status}\n' $REQUIRED_PKG | grep "install ok installed")
    echo $REQUIRED_PKG: $PKG_OK
    if [ "" = "$PKG_OK" ]; then
      echo "No $REQUIRED_PKG. Setting up $REQUIRED_PKG."
      sudo apt-get --yes install $REQUIRED_PKG
    fi
done

##
## Check for composer.
##

which composer >> /dev/null

if [ $? != 0 ]; then
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    php -r "if (hash_file('sha384', 'composer-setup.php') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
    php composer-setup.php
    php -r "unlink('composer-setup.php');"
    sudo mv composer.phar /usr/local/bin/composer
else
    echo 'Composer already installed'
fi

##
## Check for npm.
##

declare -a npmDependencies=(
                   "npm"
               )

for i in "${npmDependencies[@]}"
do
    REQUIRED_PKG=$i
    PKG_OK=$(dpkg-query -W --showformat='${Status}\n' $REQUIRED_PKG | grep "install ok installed")
    echo $REQUIRED_PKG: $PKG_OK
    if [ "" = "$PKG_OK" ]; then
      echo "No $REQUIRED_PKG. Setting up $REQUIRED_PKG."
      sudo apt-get --yes install $REQUIRED_PKG
    fi
done

##
## Check for mysql.
##

declare -a mysqlDependencies=(
                   "mysql-server"
               )

for i in "${mysqlDependencies[@]}"
do
    REQUIRED_PKG=$i
    PKG_OK=$(dpkg-query -W --showformat='${Status}\n' $REQUIRED_PKG | grep "install ok installed")
    echo $REQUIRED_PKG: $PKG_OK
    if [ "" = "$PKG_OK" ]; then
      echo "No $REQUIRED_PKG. Setting up $REQUIRED_PKG."
      sudo apt-get --yes install $REQUIRED_PKG
    fi
done


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
