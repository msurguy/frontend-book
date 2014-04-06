# Sample application that shows autosuggest in action

This application demonstrates a complete application that uses autosuggest.

The application requires PHP 5.4+ with Composer installed and an empty MySQL database called 'tags-db'. To get this application to run, follow the steps (run from the Terminal/command line):

- run `composer install` in the root of the application to install Laravel
- adjust the DB username/password for the MySQL database in app/config/database.php
- import the DB contents from `cities-db` file in the root folder of the application to the database
- run `php artisan serve` to launch the application and navigate to the URL specified in the output (localhost:8000). 

Now go to localhost:8000 and use the application.