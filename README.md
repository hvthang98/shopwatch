## Deloy
- composer install
- cp .env.example .env
- Thay đổi database trong .env 
- php artisan migrate
- composer dump-autoload
- Seeder:
    + php artisan db:seed --class=RolesTableSeed
    + php artisan db:seed --class=UsersTableSeed