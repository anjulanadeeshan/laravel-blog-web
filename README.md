# Laravel Blog Web Application

A simple and elegant blog application built with Laravel, featuring user authentication, post management, and a modern UI.

## Features

- **User Authentication**
  - User registration and login
  - Secure password handling
  - Session management

- **Blog Post Management**
  - Create new blog posts
  - Edit existing posts
  - Delete posts
  - View all posts with author information

- **Modern UI Design**
  - Clean and responsive interface
  - Gradient backgrounds
  - Smooth animations and transitions
  - Mobile-friendly design

## Requirements

- PHP 8.1 or higher
- Composer
- MySQL or other database supported by Laravel
- Node.js & NPM (for assets)

## Installation

1. Clone the repository:
   ```bash
   git clone <repository-url>
   cd laravel-blog-web
   ```

2. Install PHP dependencies:
   ```bash
   composer install
   ```

3. Install JavaScript dependencies:
   ```bash
   npm install
   ```

4. Create environment file:
   ```bash
   cp .env.example .env
   ```

5. Generate application key:
   ```bash
   php artisan key:generate
   ```

6. Configure your database in `.env`:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_user
   DB_PASSWORD=your_database_password
   ```

7. Run database migrations:
   ```bash
   php artisan migrate
   ```

## Usage

1. Start the development server:
   ```bash
   php artisan serve
   ```

2. Visit `http://localhost:8000` in your browser

3. Register a new account or log in

4. Start creating and managing your blog posts!

## Project Structure

- `app/Http/Controllers/` - Application controllers
  - `PostController.php` - Handles blog post operations
  - `UserController.php` - Handles user authentication
- `app/Models/` - Eloquent models
  - `Post.php` - Blog post model
  - `User.php` - User model
- `database/migrations/` - Database migrations
- `resources/views/` - Blade templates
  - `home.blade.php` - Main page with posts listing
  - `edit-post.blade.php` - Post editing page
- `routes/web.php` - Web routes

## Key Features Implementation

### Authentication
- Users can register with name, email, and password
- Login functionality with session management
- Logout capability

### Post Management
- Only authenticated users can create posts
- Users can only edit and delete their own posts
- Posts display author information
- CSRF protection on all forms

## Technologies Used

- **Laravel** - PHP web application framework
- **Blade** - Laravel's templating engine
- **Eloquent ORM** - Database interactions
- **Custom CSS** - Modern, gradient-based styling

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
