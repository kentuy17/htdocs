# acsat-hris

## Quick start

1. Install php 7.*
2. Clone repo

```
git clone https://github.com/kentuy17/acsat-hris.git
```

3. cd acsat-hris
4. Install packages
 
```
php composer.phar install
```

5. Create first DB in localhost/phpmyadmin "lara_hrms". 
Then execute command:
 
```
php artisan migrate
```

6. Seed records

```
php artisan db:seed
```
