## Deloy
- composer install
- cp .env.example .env
- Thay đổi database trong .env 
- php artisan migrate
- php artisan ckfinder:download
- Seeder:
    + php artisan db:seed --class=RolesTableSeed
    + php artisan db:seed --class=UsersTableSeed