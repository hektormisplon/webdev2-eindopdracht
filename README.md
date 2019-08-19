# Environment setup instructions

## Belangrijk

### Zorg ervoor dat MAIL_DRIVER=log is voor migrations & seeding

Standaard users worden aangemaakt (e.g. admin@mail.com) en zijn niet gemachtigd voor de mailgun sandbox.
Bij het aanmaken van een project wordt namelijk een email naar de user verzonden.

Om de emails te controleren werkte ik met telescope (localhost:8000/telescope), de email event listeners werken voor gemachtigde users maar kunnen voor problemen zorgen door de niet gemachtigde standaard users.

### make sure to run "php artisan migrate" w/ "--seed"

Voor zowat alle entities werden factories en seeders gemaakt, migrate met seed zorgt er dan ook voor enkele standaard accounts.

| email                | password |
| -------------------- | -------- |
| admin@mail.com       | password |
| user@mail.com        | password |
| nonverified@mail.com | password |

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
