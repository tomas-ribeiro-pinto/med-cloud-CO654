# MedCloud Laravel Application for CO654 Cloud Computing

## Description

As part of a coursework for CO654 - Cloud Computing (an AWS Cloud Academy course module at Buckinghamshire New University), MedCloud is a web application developed in Laravel PHP and deployed to a Linux AWS EC2 instance. The application also connects with an RDS MySQL database and an S3 bucket for managing data and documents.

The application is intended as a prototype for a fictious medical company. It allows to add, edit and remove hospital and patient records. It is also able to produce invoices and store them under an AWS S3 bucket using a package called [Laravel Invoices](https://github.com/LaravelDaily/laravel-invoices).


### Cloud Architecture:
![Cloud Architecture]()

## Getting Started

### Dependencies

* PHP Storm or any other IDE with Laravel installed: [https://laravel.com/docs/10.x/installation](https://laravel.com/docs/10.x/installation)
* Laravel 10.13.5
* MySQL 8.1
* PHP 8.1
* Server or local environment ready for deployment

### Executing program locally

* Change “.env_example” filename to “.env”
* Add necessary AWS S3 Bucket credentials if storing invoice documents under an AWS S3 bucket. Standard configuration is to store locally.
* Run, launch the server, and seed the app by executing the following commands:
```
php artisan serve
npm run dev
php artisan migrate --seed
```

### Admin Credentials

Use these credentials to access the back office:

- Username: admin@admin.com
- Password: admin


The endpoint to register users is disabled, but you can either allow it by uncommenting the code in the path "routes/auth.php" or you can add more through seeding/PHP Tinker.


## Authors

Contributors names and contact info:

* Tomás Pinto - morato.toms@gmail.com
