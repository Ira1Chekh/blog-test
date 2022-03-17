# Blog

Simple CRUD API application with posts.
Postman collection for testing https://www.getpostman.com/collections/426ad31b6284b590b656

## Requirements:

1. PHP >= 7.4
2. Nginx
3. MySQL >= 8.0

## Instalation

- Clone this repository
- Create and fill `.env` file from `.env.example`
- Run `composer install`
- Run `php artisan key:generate`
- Run `php artisan migrate --seed`

## Testing

Run `php artisan test`
