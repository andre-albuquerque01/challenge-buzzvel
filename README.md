# Challenge

## System Requirements

To operate the system, the following minimum requirements are needed on your machine: PHP, Composer, and Docker. PHP and Composer are essential to run Laravel, which contains the main API of the system. Docker is used to virtualize the environment in which the API is executed.

## System Architecture

The system uses the following languages:

- PHP

Database:

- MySQL

Framework:

- Laravel 11

API Architecture:

- MVC
- RESTful

Additionally, it uses:

- Docker

## How to Start the System

### Step 1: Download the Files

Clone the repository:

```bash
git clone https://github.com/andre-albuquerque01/challenge-buzzvel.git
```

### Step 2: Backend Setup

Navigate to the backend folder:

```bash
cd /challenge-buzzvel
```

Install Laravel packages:

```php
composer install
```

Create a `.env` file in the root of your project and configure the environment variables as needed. Run `php artisan config:cache` to apply the settings from the `.env` file.


To generate a Laravel application key, run:

```php
php artisan key:generate
```

In the `.env` file, set the Swagger base URL:

```php
L5_SWAGGER_CONST_HOST=http://project.test/api/v1
```

The database environment variables should be set as follows:

```bash
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=sail
DB_PASSWORD=password
```

Start the API server:

```bash
sudo ./vendor/bin/sail up
```

To stop the API server:

```bash
sudo ./vendor/bin/sail down
```

After starting the server, run the database migration:

```bash
sudo ./vendor/bin/sail artisan migrate
```

To access Swagger:

```bash
http://localhost/api/documentation
```


### Step 3: System Functionality

The system is a RESTful API developed with Laravel. It provides a set of routes to manage users and holidays with the following operations:

The system uses Laravel Sanctum to manage user authentication. Sanctum issues simple access tokens that are used to authenticate API requests. These tokens ensure that only authenticated users can access certain protected routes within the system.

API URLs start with `http://localhost/api/v1/`

#### RESTful Routes for Users

`
POST /login: Authenticates the user.
`

`
POST /logout: Removes user authentication.
`

`
POST /users: Creates a new user.
`

`
GET /users: Returns the details of a specific user.
`

`
PUT /users: Updates an existing user.
`

#### RESTful Routes for Holidays

`
GET /holiday: Returns a list of all holidays.
`

`
POST /holiday: Creates a new holiday.
`

`
GET /holiday/{id}: Returns the details of a specific holiday identified by {id}.
`

`
PUT /holiday/{id}: Updates an existing holiday identified by {id}.
`

`
DELETE /holiday/{id}: Removes an existing holiday identified by {id}.
`

`
GET /holidays/pdf/{id}: Returns the details of a specific holiday identified by {id} in pdf.
`

`
GET /holidays/pdf: Returns a list of all holidays in pdf.
`

## Component Documentation

### Controllers

Controllers manage API requests and responses. They use services to perform business operations and return formatted resources.

### Services

Services encapsulate the business logic of the application. They are used by controllers to manipulate data and perform complex operations.

### Requests

Requests handle request validation. They define validation rules and ensure that the received data meets the necessary criteria.
