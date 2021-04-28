## Installation guide

Run commands
```
git clone https://github.com/olyatabaran/leadstrade-task.git
composer install
```

Copy data from .env.example file to .env file

Fill all .env variables
```
DB_CONNECTION
DB_HOST
DB_PORT
DB_DATABASE
DB_USERNAME
DB_PASSWORD

#fill options with data, in other case mail will be not sent
MAIL_USERNAME  
MAIL_PASSWORD
MAIL_FROM_ADDRESS

```
Create db based on .env DB_DATABASE variable

Run commands
```
php artisan key:generate
php artisan migrate
php artisan serve
```
