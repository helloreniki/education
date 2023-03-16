
## About

Education Tracker is a Laravel app that tracks educations, seminars, and courses for each employee. Each user can see all educations available, can apply to upcoming educations, can see all of their educations (past, upcoming: applied), total cost and credits of all their attended educations and each user can upload/download a certificate (file) for each education. Admin and Editor can also see all of this for each employee, but can also add or delete employee, education. Only the admin can approve the education that the user has applied to.


## Credentials

admin role:
email:admin@test.com | password: password

editor role:
email: tajnica@test.com | password: password

simple user:
email: user@test.com | password: password

## Setup

clone repository, adjust .env, create database

```composer install```

```npm install & npm run dev```

```php artisan key:generate```

```php artisan migrate```

```php artisan db:seed```

