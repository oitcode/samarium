# Khajanchi

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

Khajanchi is a web application built with laravel and livewire. 

## Features

- Website
- Admin dashboard
- Ecommerce 
- Accounting

## Installation

`git clone https://github.com/oitcode/khajanchi.git`

`mv khajanchi project_name`

`cd project_name`

`sudo mysql -uroot -e "CREATE DATABASE db_name;"`

`sudo mysql -uroot -e "CREATE USER db_user_name@localhost IDENTIFIED BY
'db_password';"`

`sudo mysql -uroot -e "GRANT ALL PRIVILEGES ON db_name.* TO
db_user_name@localhost;"`

 `cp env.example .env`

 `sed -i "s/DB_DATABASE=/DB_DATABASE=$dbName/" .env`

 `sed -i "s/DB_USERNAME=/DB_USERNAME=$dbUserName/" .env`

 `sed -i "s/DB_PASSWORD=/DB_PASSWORD=$dbPassword/" .env`


`php artisan migrate`

`composer install`

`npm install`

`npm run dev`

`php artisan key:generate`


## Learning Khajanchi

Documentation of Khajanchi is coming soon. We will also have video tutorials on
how to use Khajanchi.

## Contributing

Thank you for considering contributing to this project.
Please fork the project, make necessary changes and send a pull request. 

## Security Vulnerabilities

Please raise an issue in github. All security vulnerabilities will be promptly addressed.

## License

Khajanchi is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
