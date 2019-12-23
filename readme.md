<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

# Laravel Multi User Auth Guard Example

This repo is a Laravel 5.6 setup with Auth Guards for multiple users (Customer & Admin).

For simplicity and to get up and running quicker there are login/register pages for both customer and admin.

## Installation

 - Clone or download this repo.
 - Install Composer
 - Install Node/npm

## Create .env file

```
cp .env.example .env
```

And update settings accordingly

## Scaffold Authentication

```
php artisan make:auth
```

## Run Migrations

```
php artisan migrate
```


## Install NPM packages

```
npm install
```

## Build Frontend Assets

```
run run dev
```


## Visit in browser

`mysite.test` will get replaced with whatever domain you have setup.

### Customer Login
```
mysite.test/login
```

### Admin Login
```
mysite.test/admin/login
```