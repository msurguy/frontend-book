# Sample application that shows a date picker in action

You can see this application deployed and running at <http://books.maxoffsky.com/frontend/ch8>

This application demonstrates usage of Pickadate library to provide the user with a nice looking date picker.

The application requires PHP 5.4+ with Composer installed and an empty MySQL database called 'date-picker-db'. To get this application to run, follow the steps (run from the Terminal/command line):

- run `composer install` in the root of the application to install Laravel
- adjust the DB username/password for the MySQL database in app/config/database.php
- run `php artisan migrate` to create the database structure for the application
- run `php artisan serve` to launch the application and navigate to the URL specified in the output (localhost:8000). 

Now go to localhost:8000 and use the application.