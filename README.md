# Environment setup instructions

## important: make sure to run "php artisan migrate" w/ "--seed"

1 Clone the repo

```bash
    git clone https://github.com/hektormisplon/webdev2-eindopdracht
```

2 Navigate to the laravel directory

```bash
    cd webdev2-eindopracht/laravel
```

3 Create .env file in this directory & add the config

4 Make sure the database configuration is set to your corresponding settings

5 Make sure you have an apache server & mysql database running

6 Install the neccessary packages & set up the development environment

```bash
   npm i
   composer install
   php artisan key:generate
   php artisan migrate --seed
   php artisan serve
```

7 The Laravel application should be running on http://localhost:8000/
