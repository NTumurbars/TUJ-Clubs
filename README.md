<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

-   **[Vehikl](https://vehikl.com/)**
-   **[Tighten Co.](https://tighten.co)**
-   **[WebReinvent](https://webreinvent.com/)**
-   **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
-   **[64 Robots](https://64robots.com)**
-   **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
-   **[Cyber-Duck](https://cyber-duck.co.uk)**
-   **[DevSquad](https://devsquad.com/hire-laravel-developers)**
-   **[Jump24](https://jump24.co.uk)**
-   **[Redberry](https://redberry.international/laravel/)**
-   **[Active Logic](https://activelogic.com)**
-   **[byte5](https://byte5.de)**
-   **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Google SSO

Used google sso to handle user authentication

### Step 1

You need Laravel plugin:
Use the following code in the root of your project

```console
composer require laravel/socialite
```

This adds socialite plugin which allows users to have third party authentications for socials such as google, x, facebook etc.,

#### Note:

Upon using this only the
composer.json
composer.lock change
As mentioned now our application is ready to use SSO from third parties

### Step 2

Change the services file inside config i.e., navigate to config/services.php

Here we need to connect the google client with our application
We specify the client id, client secret and the call back url from our .env file

### Step 3

Change the .env file

Here we specify the google client id and secret

google client id is used to identify the configuration and secret is well secret
so based on the client id and secret we will be able to access the desired google authentication

### Step 4

Changes to routes
Since we specify the call back route inside the .env file and the google dev console
we need to update the routes in our application

### Step 5 (Changes Required)

Changes to controller
We need a dedicated controller to manage the google authentication service
We can use the following code to create a new folder inside the controllers folder

```python
php artisan make:controller Auth/GoogleController
```

We dictate the behavior of the sso here

### Step 6 (Changes Required)

Create/Update user model
Since we need to associate them with google id (may be I should delete this later on for the application purpose)

### Step 7 (Should delete this maybe)

To create a new migration use:

```python
php artisan make:migration add_google_id_to_users_table
```

This creates a new migration folder which we will be using to define the behavior of google_id

Once done with all this you need to push the new schema to db
We can use the following code for that:

```python
php artisan migrate
```

composer require livewire/livewire

php artisan make:livewire ChatComponent

php artisan make:event MessageEvent

php artisan install:broadcasting

php artisan reverb:start

npm run build

18:30
https://www.youtube.com/watch?v=huLSxcxFRl4

for chatting
https://www.youtube.com/watch?v=RPRVMbR75KI
