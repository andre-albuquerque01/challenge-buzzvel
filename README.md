<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Documentation</title>
    <h1>Challenge</h1>

    <h2>System Requirements</h2>
    <p>To operate the system, the following minimum requirements are needed on your machine: PHP, Composer, and Docker. PHP and Composer are essential to run Laravel, which contains the main API of the system. Docker is used to virtualize the environment in which the API is executed.</p>

    <h2>System Architecture</h2>
    <p>The system uses the following languages:</p>
    <ul>
        <li>PHP</li>
    </ul>

    <p>Database:</p>
    <ul>
        <li>MySQL</li>
    </ul>

    <p>Frameworks:</p>
    <ul>
        <li>Laravel</li>
    </ul>

    <p>API Architecture:</p>
    <ul>
        <li>MVC</li>
        <li>RESTful</li>
    </ul>

    <p>Additionally, it uses:</p>
    <ul>
        <li>Docker</li>
    </ul>

    <h2>How to Start the System</h2>

    <h3>Step 1: Download the Files</h3>
    <p>Clone the repository:</p>
    <pre><code>git clone https://github.com/andre-albuquerque01/challenge-laravel</code></pre>

    <h3>Step 2: Backend Setup</h3>
    <p>Navigate to the backend folder:</p>
    <pre><code>cd /challenge-laravel</code></pre>

    <p>Install Laravel packages:</p>
    <pre><code>composer install</code></pre>

    <p>Create a <code>.env</code> file in the root of your project and configure the environment variables as needed. Run <code>php artisan config:cache</code> to apply the settings from the <code>.env</code> file.</p>

    <p>To generate a Laravel application key, run:</p>
    <pre><code>php artisan key:generate</code></pre>

    <p>To generate a secret key for JWT, run:</p>
    <pre><code>php artisan jwt:secret</code></pre>

    <p>In the <code>.env</code> file, set the Swagger base URL:</p>
    <pre><code>L5_SWAGGER_CONST_HOST=http://project.test/api/v1</code></pre>

    <p>The database environment variables should be set as follows:</p>
    <pre><code>DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=sail
DB_PASSWORD=password</code></pre>

    <p>Start the API server:</p>
    <pre><code>./vendor/bin/sail up</code></pre>
    <p>On Linux:</p>
    <pre><code>sudo ./vendor/bin/sail up</code></pre>

    <p>To stop the API server:</p>
    <pre><code>./vendor/bin/sail down</code></pre>
    <p>On Linux:</p>
    <pre><code>sudo ./vendor/bin/sail down</code></pre>

    <p>After starting the server, run the database migration:</p>
    <pre><code>sudo ./vendor/bin/sail artisan migrate</code></pre>

    <p>To access Swagger:</p>
    <pre><code>http://localhost/api/documentation</code></pre>

    <h3>Step 3: System Functionality</h3>
    <p>The system is a RESTful API developed with Laravel. It provides a set of routes to manage users and holidays with the following operations:</p>

    <p>API URLs start with <code>http://localhost/api/v1/</code></p>

    <h4>RESTful Routes for Users</h4>
    <pre><code>POST /login: Authenticates the user.
POST /logout: Removes user authentication.
POST /users: Creates a new user.
GET /users: Returns the details of a specific user.
PUT /users: Updates an existing user.</code></pre>

    <h4>RESTful Routes for Holidays</h4>
    <pre><code>GET /holiday: Returns a list of all holidays.
POST /holiday: Creates a new holiday.
GET /holiday/{id}: Returns the details of a specific holiday identified by {id}.
PUT /holiday/{id}: Updates an existing holiday identified by {id}.
DELETE /holiday/{id}: Removes an existing holiday identified by {id}.</code></pre>

    <h2>Component Documentation</h2>
    
    <h3>Controllers</h3>
    <p>Controllers manage API requests and responses. They use services to perform business operations and return formatted resources.</p>

    <h3>Services</h3>
    <p>Services encapsulate the business logic of the application. They are used by controllers to manipulate data and perform complex operations.</p>

    <h3>Requests</h3>
    <p>Requests handle request validation. They define validation rules and ensure that the received data meets the necessary criteria.</p>
</body>
</html>
