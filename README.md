# MSIT 114 - Activity 22 - Laravel API

This project is a simple **Laravel 12** for managing train data, developed as part of MSIT 114 coursework.

## Requirements

- [Composer](https://getcomposer.org/)

## Installation & Setup

### Step 1: Clone the Repository
```bash
git https://github.com/jesselzapanta09/train-laravel-api.git
cd train-laravel-api
```

### Step 2: Install Dependencies
```bash
composer install
```

### Step 3: Import the Database or Run migration

### Option 1: Import Database

1. Open your MySQL client (e.g., MySQL Workbench, phpMyAdmin, or CLI).
2. Create a new database:
```sql
   CREATE DATABASE traindb_laravel;
```
3. Import the provided SQL file(**traindb_laravel.sql**)

### Option 2: Run Migration

```bash
php artisan migrate:fresh    
```

### Step 4: Generate app key

```bash
php artisan key:generate    
```


### Step 5: Run the Server
```bash
php artisan serve --port=5000
```

The API should now be running at `http://localhost:5000`.

---

# API Endpoints

| Method | Endpoint       | Description          |
|--------|----------------|----------------------|
| POST   | `api/login`       | Login User        |
| POST   | `api/register`    | Register User     |
| POST   | `api/logout`      | Log out User      |
| GET    | `api/trains`      | Get all trains    |
| GET    | `api/trains/:id`  | Get a train by ID |
| POST   | `api/trains`      | Add a new train   |
| PUT    | `api/trains/:id`  | Update a train    |
| DELETE | `api/trains/:id`  | Delete a train    |


## Author

**Jessel Zapanta** — MSIT 114