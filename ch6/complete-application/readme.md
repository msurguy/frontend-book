# Sample application that uses tagging

This application demonstrates a simple admin panel for a blog post where you can enter tags and assign those tags to the blog post.

The application requires PHP 5.4+ with Composer installed and an empty MySQL database called 'tags-db'. To get this application to run, follow the steps (run from the Terminal/command line):

- run `composer install` in the root of the application to install Laravel
- adjust the DB username/password for the MySQL database in app/config/database.php
- run `php artisan migrate` to create the DB structure automatically
- run `php artisan db:seed` to put some sample data in the DB
- run `php artisan serve` to launch the application and navigate to the URL specified in the output (localhost:8000). 

Try creating new tags and updating the blog post.