**Install**
```bash
git clone https://github.com/HaradaKumiko/simple-inventory-laravel
cd  simple-inventory-laravel
composer install
cp .env.example .env
php artisan key:generate

php artisan migrate
php artisan db:seed
```

**Enjoy**
```bash
php artisan serve
```

**User Default**
```bash
      Email                Password       
--------------------------------------------------------
fariv.fariv12@gmail.com   | password@123
fujikawachiai@gmail.com   | password@123 
--------------------------------------------------------