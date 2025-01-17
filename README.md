# Samarium

<img src="https://img.shields.io/badge/Version-0.9.0-blue" alt="Version"> <img src="https://img.shields.io/badge/License-MIT-005530" alt="License"> <img src="https://img.shields.io/badge/Using-Laravel-FA5B32" alt="Laravel"> <img src="https://img.shields.io/badge/Using-Livewire-AA3B62" alt="Livewire"> <img src="https://img.shields.io/badge/Using-Bootstrap-AA2BE2" alt="Bootstrap">

Open source ERP built with Laravel and Livewire.

## Features

Feature | Description
------- | -----------
Product | Create products from admin panel. This product can be added to invoices as well as displayed in the website.
Product Category | Arrange products by product categories. 
Invoicing | Create and manage sale invoice, purchase and expense entries.
Website Management (CMS) | Create and manage webpage and blog post entries.
Calendar | Create and manage calendar events.
Team | Create and manage teams.
Contact Message | View contact messages sent by website visitors 
Appointment | Get appointment request from website visitors. Approve or reject from admin panel.
Newsletter subscription | Get newsletter subscription request from website visitors.
Task Manager | Create and manage tasks.

![screenshot](dashboard-screenshot-1.png)

## Installation

It is just another laravel application. So we do all the steps required to get a
laravel application working. 

### Pre requisites

Below applications must be installed in the system. 

```
php >= 8.2
mysql >= 8.0
composer
npm
```

### Step by step instructions

Perform below steps to get the application running.

First create a mysql database. Then grant access to the mysql user. 
Lets assume you created database named `demo_database` and you granted
access to mysql user `demo_user`. You will need this info to enter
in the .env file later.

Clone the repository.

```
$ git clone https://github.com/oitcode/samarium.git
```

Go to the directory.
```
$ cd samarium
```

Copy env.example file to .env file
```
$ cp env.example .env
```

Now, enter database name, mysql username and mysql password in the .env file.
Your .env file's database part should be like this.

```
DB_DATABASE=demo_database
DB_USERNAME=demo_user
DB_PASSWORD='demo_password'
```
Please replace `demo_database`, `demo_user` and `demo_password` with real
database name, username and password.

Install composer dependencies.
```
$ composer install
```

Install npm dependencies.
```
$ npm install
```

Compile front end assets.
```
$ npm run dev
```

Run database migrations.
```
$ php artisan migrate
```

Generate key.
```
$ php artisan key:generate
```

Create storage links.
```
$ php artisan storage:link
```

### Script installation

If you do not want to perform all the installation steps manually,
then there is a bash script provided that will run all the 
required steps.

Please run below bash script.

`bash app-install.sh`

## Creating first user

To use the dashboard, you need a username and password.
Use below seeder file to create first user. This will create
an admin user. After that you can create other users from
dashboard.

`php artisan db:seed --class=UserSeeder`
 
## Running the app

`php artisan serve`

Now open your web browser and visit 
- `127.0.0.1:8000` to see the website
- `127.0.0.1:8000/dashboard` to see the dashboard

## Screenshots

Below are some screenshots.

![screenshot](screenshots/screenshot-login-1.png)
![screenshot](screenshots/screenshot-product-list-1.png)
![screenshot](screenshots/screenshot-product-category-list-1.png)
![screenshot](screenshots/screenshot-sale-invoice-list-1.png)
![screenshot](screenshots/screenshot-purchase-list-1.png)
![screenshot](screenshots/screenshot-expense-list-1.png)
![screenshot](screenshots/screenshot-page-list-1.png)
![screenshot](screenshots/screenshot-post-list-1.png)

### GIFs

![screenshot](screenshots/create-webpage-1.gif)

![screenshot](screenshots/create-post-1.gif)

## Configuration

Please check `app/config.php` file to see different configuration options
for the application. Below are some configuration options you may want to
change.  

File:                    `app/config.php`
Configurable option:     `App menu color options`

```
'app_menu_dropdown_button_text_color' => 'text-white',
'app_menu_normal_button_text_color'   => 'text-white',
'app_menu_bg_color'                   => 'bg-dark',
```

## Contributing

Please consider contributing to this project. Any kind of contributions are welcome.
You can contribute in following ways:

### Raising issues

You can raise issues for existing bugs. Or you can raise issue for requesting new features.

### Adding test code

More test code is needed to automate as much test as possible. You can add more test code.

### Fixing issues

You can fix issues that are raised here in github repo.

### Extending the application

You can add your own code to extend the features of this application. Or, if you can see
the need for refactoring certain part of code then also, please send a pull request
by making necessary code changes.

All contributions are welcome.

## Issues

If you find any issue in this application, you can help by raising an issue
here in our github repo.

## Note on invoicing system

Different countries have different laws for using invoicing system. Although you can use this
system to generate invoice for learning/experiment, please check with your local law before
using this system to generate invoice commercially.

## Encouraging/Support

Please star this repository to show your support if you find this project useful and/or interesting.

## License

[MIT license](https://opensource.org/licenses/MIT)
