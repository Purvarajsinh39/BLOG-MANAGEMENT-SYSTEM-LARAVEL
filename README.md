# Blog Management System

## Project Overview
The Blog Management System is a web application built using **Laravel 11** and **PHP 8.2**. It enables users to create, edit, and manage blog posts with an admin and reviewer system for post approval and publishing. The application supports user authentication, role-based access (admin, reviewer, user), and post status management (`pending`, `reviewer_approved`, `published`, `rejected`). It uses **MariaDB** for data storage and **Vite** for asset management.

### Features
- **User Management**: Register, login, and manage user profiles.
- **Role-Based Access**:
  - **Admins**: Manage users, posts, and reviewer requests.
  - **Reviewers**: Approve/reject posts and provide suggestions.
  - **Users**: Create and edit posts.
- **Post Management**: Create, edit, and delete posts with image uploads and status tracking.
- **Caching**: Utilizes Laravel's caching system for performance optimization.
- **Job Queues**: Supports job batching and queue handling for background tasks.
- **Session Management**: Secure session handling for user authentication.
- **Database**: Uses MariaDB with tables for users, posts, cache, jobs, and sessions.

### Tech Stack
- **Backend**: Laravel 11, PHP 8.2
- **Database**: MariaDB 10.4.32
- **Frontend**: Blade templates, Vite for asset bundling
- **Testing**: Supports Pest PHP for testing
- **Others**: Laravel's built-in support for caching, job queues, and migrations

## Screenshots
The following screenshots showcase the application's key interfaces (all in PNG format):
1. **AboutUs1**: First section of the About Us page.
2. **AboutUs2**: Second section of the About Us page.
3. **AdminDashboard**: Admin dashboard for managing users and posts.
4. **AdminRequest**: Interface for admins to handle reviewer requests.
5. **CreatePost**: Form for creating a new blog post.
6. **EditPost**: Form for editing an existing blog post.
7. **Home**: Homepage of the application.
8. **PostPDF**: PDF view/export of a blog post.
9. **Register**: User registration page.
10. **ReviewerDashboard**: Dashboard for reviewers to manage post approvals.
11. **ReviewerRequest**: Interface for reviewers to request post reviews.
12. **UserDashboard**: Dashboard for regular users to manage their posts.
13. **UserLogin**: User login page.

*Note*: Screenshots are stored in the `screenshots/` directory in the project root.

## Prerequisites
Before setting up the project, ensure you have the following installed:
- **PHP** 8.2 or higher
- **Composer** (for dependency management)
- **MariaDB** 10.4.32 or compatible MySQL version
- **Node.js** and **npm** (for Vite asset compilation)
- **Git** (for cloning the repository)
- **phpMyAdmin** (for database management)
- A web server (e.g., Apache or Nginx) or Laravel's built-in development server

## Installation Steps
Follow these steps to set up and run the project locally:

### 1. Clone the Repository
bash
git clone <repository-url>
cd blog-management

2. Install Dependencies
Install PHP dependencies using Composer:
composer install

Install Node.js dependencies for frontend assets:
npm install

3. Configure Environment
Copy the .env.example file to create a .env file:
cp .env.example .env

Update the .env file with your database credentials:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog-management
DB_USERNAME=your_username
DB_PASSWORD=your_password

Generate an application key:
php artisan key:generate

4. Import the SQL Database
To set up the database, import the provided SQL dump file into phpMyAdmin:

Open phpMyAdmin in your browser (e.g., http://localhost/phpmyadmin).
Create a new database named blog-management.
Select the blog-management database.
Click on the Import tab.
Choose the SQL dump file (e.g., blog-management.sql) from your project directory.
Click Go to import the database schema and data.

The SQL dump includes the following tables:

users: Stores user information (id, name, email, password, is_admin, is_reviewer).
posts: Stores blog posts (id, title, content, user_id, img, status, suggestion).
cache, cache_locks: For caching data.
jobs, job_batches, failed_jobs: For queue and job management.
sessions: For session management.
password_reset_tokens: For password reset functionality.
migrations: Tracks database migrations.

5. Run Migrations (Optional)
If you prefer to set up the database using Laravel migrations instead of the SQL dump:
php artisan migrate

Note: If you use the SQL dump, migrations are already applied as per the migrations table.
6. Compile Assets
Compile frontend assets using Vite:
npm run dev

For production, use:
npm run build

7. Run the Application
Start the Laravel development server:
php artisan serve

The application will be available at http://localhost:8000.
Running the Project

Ensure the database is imported and the .env file is configured.
Start the development server:php artisan serve


Access the application in your browser at http://localhost:8000.
Log in using the following credentials (from the SQL dump):
Admin: admin@gmail.com / password (hashed in DB)
Reviewer: reviewer@gmail.com / password (hashed in DB)
Users: Example user purvarajsinh@gmail.com / password (hashed in DB)



Note: Passwords are hashed in the database. Use the password reset feature or update the users table manually to set new passwords if needed.
Example route for user dashboard (from routes/web.php):
Route::get('/user/dashboard', [UserController::class, 'dashboard'])->middleware('auth');

Directory Structure
Key directories in the project:

app/: Contains Laravel application logic (models, controllers, etc.).
database/: Contains migrations and the SQL dump file.
public/: Stores compiled assets and uploaded images (e.g., uploads/ for post images).
resources/: Contains Blade templates and frontend assets.
screenshots/: Stores the 13 PNG screenshots listed above.
routes/: Defines application routes (e.g., web.php).

Troubleshooting

Database Connection Error: Ensure MariaDB is running and the .env file has correct credentials.php artisan config:clear


Missing Dependencies: Run composer install and npm install to ensure all dependencies are installed.
Asset Compilation Issues: Verify Node.js and npm are installed, and run npm run dev or npm run build.
Permission Issues: Ensure the storage/ and public/uploads/ directories have write permissions:chmod -R 775 storage
chmod -R 775 public/uploads



Contributing
To contribute to the project:

Fork the repository.
Create a new branch:git checkout -b feature/your-feature


Make your changes and commit:git commit -m "Add your feature"


Push to the branch:git push origin feature/your-feature


Create a pull request.

License
This project is licensed under the MIT License.```
