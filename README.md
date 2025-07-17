# Samarium - Business Management System

<div align="center">

[![Version: 0.9.6](https://img.shields.io/badge/Version-0.9.6-green.svg)](https://github.com/oitcode/samarium)
[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)](https://opensource.org/licenses/MIT)
[![PHP](https://img.shields.io/badge/PHP->=8.2-777BB4?logo=php&logoColor=white)](https://php.net/)
[![Laravel](https://img.shields.io/badge/Laravel-Framework-FF2D20?logo=laravel&logoColor=white)](https://laravel.com/)
[![MySQL](https://img.shields.io/badge/MySQL->=8.0-4479A1?logo=mysql&logoColor=white)](https://mysql.com/)
[![Docker](https://img.shields.io/badge/Docker-Ready-2496ED?logo=docker&logoColor=white)](https://docker.com/)

**A simple ERP system for small businesses - still growing and improving**

[Quick Start](#quick-start) • [Features](#current-features) • [Installation](#installation) • [Contributing](#contributing)

![screenshot](screenshots/dashboard-screenshot-1.png)

</div>

---

## About Samarium

Samarium is a work-in-progress business management system that aims to help small businesses handle basic operations like invoicing, inventory, and customer management in one place. While it's still in active development with many features being refined and added, it might be useful for simple business needs.

The project started as a learning exercise but has grown into something that could potentially help others who need basic business management tools without the complexity or cost of enterprise solutions.

## Current Features

**Please note**: Many features are still being developed and improved. What's available now:

### Basic ERP Functions
- Simple invoice generation
- Basic financial tracking (income/expenses)
- Customer database management
- Basic inventory tracking

### Point of Sale
- Simple checkout process
- Basic receipt generation
- Product management

### Website Management
- Simple CMS functionality
- Basic pages (About, Contact, etc.)
- Basic content management

### Additional Tools
- Task management (basic)
- Calendar system
- Notice board
- Simple analytics dashboard

### Customization Options
- Modular architecture (enable/disable features)
- Basic theme customization
- Configuration options

## Who Might Find This Useful

This might be helpful for:
- Small businesses looking for a simple, free alternative to expensive software
- Developers wanting to contribute to or learn from a Laravel-based business system
- Anyone needing basic business management tools while understanding this is still evolving

## Quick Start

### Using Docker (Easiest)

```bash
git clone https://github.com/oitcode/samarium.git
cd samarium
make setup
```

- This will:
  - Copy the Docker environment file
  - Build and start the containers
  - Run all first-time setup steps inside the container

To (re)start the stack later, just use:
```bash
make start
```

To stop all containers:
```bash
make stop
```

To view logs:
```bash
make logs
```

When setup completes, visit your site:
- Website: [http://127.0.0.1:8000](http://127.0.0.1:8000)
- Dashboard: [http://127.0.0.1:8000/dashboard](http://127.0.0.1:8000/dashboard)

## Installation

<details>
<summary>Manual Installation (requires PHP, MySQL, etc.)</summary>

### Requirements
- PHP >= 8.2
- MySQL >= 8.0
- Composer
- Node.js & npm

### Steps
```bash
git clone https://github.com/oitcode/samarium.git
cd samarium
cp .env.example .env

# Create database and update .env with your database credentials:
# DB_DATABASE=your_database_name
# DB_USERNAME=your_username
# DB_PASSWORD=your_password

composer install
npm install
npm run dev

php artisan migrate
php artisan key:generate
php artisan storage:link
php artisan db:seed

php artisan serve
```

Access at `http://127.0.0.1:8000`

</details>

## Configuration

You can enable or disable modules in `config/app.php`:

```php
'modules' => [
    'dashboard' => true,
    'product' => true,
    'shop' => true,
    'calendar' => true,
    'analytics' => false, // Disable unused features
],
```

Theme colors can be customized in the same file:

```php
'app_menu_bg_color' => 'bg-dark',
'app_top_menu_bg_color' => 'bg-light',
```

## Current Limitations

Being honest about where things stand:
- Many features are still basic and need improvement
- Documentation could be much better
- Some modules are incomplete
- UI/UX needs work in many areas
- Testing coverage is limited
- Performance optimizations are needed

## Contributing

If you're interested in helping improve this project, contributions are very welcome:

- **Bug reports**: If something doesn't work as expected
- **Feature suggestions**: Ideas for improvements
- **Code contributions**: Help fix issues or add features
- **Documentation**: Help make things clearer for others
- **Testing**: Help identify problems

Feel free to open issues or pull requests. Even small improvements are appreciated.

## Technical Details

- **Backend**: Laravel (PHP), Livewire
- **Frontend**: Bootstrap, Livewire
- **Database**: MySQL
- **Containerization**: Docker support included

## License

MIT License - feel free to use, modify, and distribute.

## A Note

This project is still evolving. While it works for basic needs, please consider it as "early stage" software. If you try it and encounter issues or have suggestions, feedback would be genuinely helpful for making it better.

Thanks for taking a look at this project.
