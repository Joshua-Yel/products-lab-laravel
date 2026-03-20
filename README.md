# products-lab-laravel

A Laravel project demonstrating the use of database migrations, seeders, and Eloquent ORM to build a Products module with a clean, modern interface.

---

## Overview

This project was developed as part of a laboratory activity focused on Laravel's database layer. It demonstrates how to create and run migrations, seed the database with sample data using seeders, and retrieve records using Eloquent ORM. The frontend is built with Blade templates using a green and white card-based design.

---

## Requirements

- PHP 8.2 or higher
- Composer
- Laravel 13.x

---

## Installation

Clone the repository:

```bash
git clone https://github.com/Joshua-Yel/products-lab-laravel.git
cd products-lab-laravel
```

Install PHP dependencies:

```bash
composer install
```

Copy the environment file and generate the application key:

```bash
cp .env.example .env
php artisan key:generate
```

Create the SQLite database file:

```bash
touch database/database.sqlite
```

Configure the database in `.env`:

```env
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database/database.sqlite
```

Run the migrations:

```bash
php artisan migrate
```

Seed the database with sample products:

```bash
php artisan db:seed
```

Start the development server:

```bash
php artisan serve
```

The application will be available at `http://127.0.0.1:8000`.

---

## Project Structure

```
products-lab/
├── app/
│   └── Models/
│       └── Product.php                          # Eloquent model with fillable fields
├── database/
│   ├── migrations/
│   │   └── xxxx_create_products_table.php       # Products table migration
│   └── seeders/
│       ├── DatabaseSeeder.php                   # Registers all seeders
│       └── ProductSeeder.php                    # Inserts 8 sample products
├── resources/views/
│   ├── products.blade.php                       # All products page
│   ├── available.blade.php                      # Available products page
│   └── category.blade.php                       # Category filter page
└── routes/
    └── web.php                                  # Application routes
```

---

## Database

### Products Table

| Column | Type | Description |
|--------|------|-------------|
| id | integer | Primary key |
| name | string | Product name |
| description | text | Product description |
| price | decimal(10,2) | Product price |
| stock | integer | Quantity in stock |
| category | string | Product category |
| is_available | boolean | Availability status |
| created_at | timestamp | Record creation time |
| updated_at | timestamp | Record update time |

### Sample Data

The seeder inserts 8 sample products across three categories: Electronics, Accessories, and Office Supplies.

---

## Pages

### All Products

Route: `/`

Displays the complete product list retrieved using `Product::all()`. Includes a summary row showing total products, available count, unavailable count, and number of categories.

### Available Products

Route: `/available`

Displays only products where `is_available` is true, sorted by price from lowest to highest using:

```php
Product::where('is_available', true)->orderBy('price', 'asc')->get();
```

Includes stat cards showing total available products, lowest price, and highest price.

### Category Filter

Route: `/category/{category}`

Displays all products belonging to a specific category using:

```php
Product::where('category', $category)->get();
```

Supports the following categories:
- Electronics
- Accessories
- Office Supplies

---

## Eloquent ORM Usage

```php
// Retrieve all products
Product::all();

// Retrieve available products sorted by price
Product::where('is_available', true)->orderBy('price', 'asc')->get();

// Retrieve products by category
Product::where('category', $category)->get();
```

---

## Procedure Completed

| Step | Description | Status |
|------|-------------|--------|
| 1 | Created a new Laravel project | Done |
| 2 | Configured database in .env | Done |
| 3 | Created products migration | Done |
| 4 | Ran migration | Done |
| 5 | Created Product model | Done |
| 6 | Created ProductSeeder | Done |
| 7 | Inserted sample data | Done |
| 8 | Retrieved data using Eloquent | Done |

---

## Screenshots

### All Products Page

<img width="1897" height="1036" alt="image" src="https://github.com/user-attachments/assets/038d16e7-516b-4b8b-b3c9-6044da8f7ef1" />


### Available Products Page

<img width="1906" height="1034" alt="image" src="https://github.com/user-attachments/assets/eba1125d-d590-42cd-b0b0-268219f3dd7d" />


### Category Page

<img width="1917" height="1039" alt="image" src="https://github.com/user-attachments/assets/ed8b1a37-fb39-4963-b38b-fbade72dce46" />
<img width="1912" height="802" alt="image" src="https://github.com/user-attachments/assets/28630764-4c89-4305-b12d-1f27c408b25d" />
<img width="1919" height="679" alt="image" src="https://github.com/user-attachments/assets/344d07be-1312-4f53-a900-df60457a0405" />


---

## Built With

- [Laravel 13](https://laravel.com)
- [Eloquent ORM](https://laravel.com/docs/eloquent)
- [Laravel Migrations](https://laravel.com/docs/migrations)
- [Laravel Seeders](https://laravel.com/docs/seeding)
- [Blade Templating Engine](https://laravel.com/docs/blade)
- SQLite
