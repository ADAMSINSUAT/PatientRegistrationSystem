Prerequisites:
* Must have mySQL server and mySQL workbench installed.

Initial Setup:

1. Open the terminal and run the command npm install
2. Run the command composer install
3. Create a new mySQL connection with the hostname: 127.0.0.1 and port: 3306. Set root as the username and password.
4. Copy the .env.example file and paste it. Rename the new .env.example file as .env only.
5. Open the .env file inside VS Code. Set the following values to the following code:
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=emr_db
    DB_USERNAME=root
    DB_PASSWORD=root
6. Go to the public folder and extract the emr_db rar to the MYSQL data directory. Example location: C:\ProgramData\MySQL\MySQL Server 8.0\Data
7. Try searching for the emr_db inside the mySQL connection you created earlier back in step 3. If it's not found, then create a new schema and name it as emr_db and continue with step 8a to 11a.
8. Run the command php artisan db:seed.
9. Run the command php artisan serve to start the program.
10. Go to this link: http://127.0.0.1:8000.

When emr_db is not detected by the mySQL connection

8a. Run the command php artisan migrate. If any migrations were skipped or not run successfully, kindly run the command php artisan migrate --path={Path of the migration} for each unsuccessful migration file. If you want to get the path of the migration, just right click on the migration and select copy relative path. The migration folder is located under database->migration. Run the following migrations in order: database\migrations\2025_02_14_085232_create_patients_table.php -> database\migrations\2025_02_14_085442_create_physicians_table.php -> database\migrations\2025_02_14_085243_create_patientdetails_table.php.

9a. Run the command php artisan db:seed.

10a. Run the command php artisan serve to start the program.

11a. Go to this link: http://127.0.0.1:8000.

Usage of the system:
1. Click the add patient button to create a new patient. Fill up all the fields and make sure none are left empty. Click save once you're done.
2. Click the add diagnosis button and select the type of consultation, type the chief complaint, and select the physician.
3. Click the view diagnosis to view all previous diagnoses.
4. Click the edit diagnosis button to change the diagnosis. Make sure to not leave any field empty. Click update once you're done.
5. Click the delete diagnosis button to soft delete the record (it will still exist in the database). Click yes to confirm deletion. 

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
