# Technical Test

## Requirements
- php >= 8.0
- composer >= 2
- mysql >= 8.0
- node >= 12
- docker and docker-compose (optional)

## Installation
1. `composer install`
1. copy .env.example to .env and edit based on your current environtment
1. `php artisan key:generate`
1. `php artisan migrate --seed`
1. `npm install && npm run dev`
1. `php artisan serve`

## Testing
1. `php artisan test`(Warning this will drop the database)

## Test User
```
email: admin@gmail.com
password: admin
```

## Troubleshoot
1. if css style doesn't load properly rerun `npm run dev` again
