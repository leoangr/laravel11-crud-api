<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Laravel 11 RESTful API - CRUD

A simple CRUD API built with **Laravel 11**, **MySQL**.  
This project allows you to manage product data with endpoints for create, read, update and delete.

---

## Tech Stack

- Laravel 11
- MySQL

---

## Getting Started

### 1. Clone Repo
```bash
git clone https://github.com/leoangr/laravel11-crud-api.git
cd laravel11-crud-api
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Configure Environment Variables

Create an .env file based on .env.example:

### 4. Database configuration
```bash
DB_DATABASE=your database name
DB_USERNAME=root
DB_PASSWORD=
```
### 5. Run the Migration
```bash
php artisan migrate
```

### 6. Run the Development Server
```bash
php artisan serve
```

Server will run at [http://localhost:8000](http://localhost:8000)

---

## API Endpoints

#### Get all product

```bash
GET /api/products
```
#### Get product by Id
```bash
GET /api/products/:id
```
#### Add new product
```bash
POST /api/products
```
Request Body:
```bash
{
    "name": "watermelon",
    "description": "this is watermelon",
    "price": "5000"
}
```
#### Update product by ID

```bash
PUT /api/products/:id
```
#### Delete product by ID
```bash
DELETE /api/products/:id
```
---

## Author

Created by [leoanggoro.my.id](https://leoanggoro.my.id/)   
Simple Backend API with Laravel 11
