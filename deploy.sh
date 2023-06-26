cd project/
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate --seed
php -S 0.0.0.0:9002 -t public
