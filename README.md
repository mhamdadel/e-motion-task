Introduction
The Blog Creation application is a simple Laravel-based blogging platform that allows authenticated users to create, edit, and delete blog posts and comments. It implements basic authentication, post creation, and commenting functionalities, and is designed to follow the Model-View-Controller (MVC) paradigm.

System Requirements
To run the application, you will need to have the following installed on your system:

PHP version 7.3 or higher
Composer
MySQL or another relational database management system
A web server (e.g., Apache, Nginx)
Installation Instructions
Clone the repository to your local machine.
Navigate to the project directory and run the following command to install the project dependencies:

composer install
Create a new MySQL database for the project.
Rename the .env.example file to .env, and update the following fields to match your database credentials:

DB_DATABASE=task_emotion
DB_USERNAME=root
DB_PASSWORD=

Run the following command to run the database migrations:
php artisan migrate

Finally, run the following command to start the development server:
php artisan serve
The application should now be accessible at http://localhost:8000.

Functionality Overview
User Authentication
The application implements basic authentication using Laravel's built-in authentication system. Users can sign up with a username, email, and password, and registered users can log in using their email and password. Only authenticated users can access the blog's posting and commenting features.

Post Creation
Authenticated users can create a new blog post. Each post has a title and body/content. Users can view a list of their own blog posts, update and delete their own posts.

Commenting
Authenticated users can add comments to any blog post. Each comment is associated with the user who made the comment and the blog post the comment relates to. Users can update and delete their own comments.

Database Schema
The application uses three main database tables: users, posts, and comments.

The users table stores user information, including their username, email, and password.
The posts table stores post information, including the post title, content, and the user who created the post.
The comments table stores comment information, including the comment content, the user who made the comment, and the post the comment relates to.
Libraries and Packages
The application uses Laravel's built-in authentication system and Eloquent ORM. No additional libraries or packages are used beyond Laravel's built-in ones.# laravrel_motionagency
