# Client Project Tracker

A simple Client Project Tracker developed for a digital agency to manage client projects, project status, priority, schedules, and progress.

## Technologies Used

Frontend:
- Laravel Blade (Including :HTML,CSS,JavaScript,Bootstrap)

Backend:
- Laravel
- PHP
- REST API
- Database

Database:
MySQL


## Features
- Authentication
- View project list
- Add new projects
- View project details
- Edit existing projects
- Delete projects with confirmation
- Search projects
- Filter projects by status
- Filter projects by priority
- Sort project records
- Pagination
- Dashboard project statistics
- Form validation

## Project Status

The application supports the following project statuses:

- Planning
- In Progress
- On Hold
- Completed

## Priority

Projects can have the following priority levels:

- Low
- Medium
- High

## Validation

The application validates the following:

- Client Name is required
- Project Name is required
- Status must be valid
- Priority must be valid
- Due Date cannot be earlier than Start Date
- Invalid requests return meaningful validation errors
# Client Project Tracker

## Setup and Installation

### Requirements

Before running the project, make sure the following are installed:

- PHP
- Composer
- MySQL
- Git

You may use XAMPP, Laragon, or another local PHP/MySQL environment.

### 1. Clone the Repository

Open a terminal or command prompt and run:

```bash
git clone https://github.com/Reymart143/CLientTrackerProject
```

Example:

```bash
git clone https://github.com/Reymart143/ClientTrackerProject.git
```

### 2. Open the Project Directory

```bash
cd ClientTrackerProject
```

### 3. Install PHP Dependencies

Run:

```bash
composer install
```

### 4. Create the MySQL Database
There is **project.sql** file in the github you need to downlaod it. 

Open phpMyAdmin, MySQL Workbench, or the MySQL command line and create the database:

```sql
CREATE DATABASE projects;
```

### 5. Import the Database

A SQL database file is included in the repository.

Using phpMyAdmin:

1. Open phpMyAdmin.
2. Create or select the `projects` database.
3. Click the **Import** tab.
4. Select the provided `.sql` file from the project repository.
5. Click **Import** or **Go**.
6. Wait for the import to complete successfully.

The imported database contains the required tables and initial data for the application.

### 6. Database Configuration

The included `.env` file is already configured with the following default local database settings:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=projects
DB_USERNAME=root
DB_PASSWORD=
```

If your local MySQL configuration is different, update the database settings in the `.env` file.

### 7. Clear Laravel Cache

Run:

```bash
php artisan optimize:clear
```

### 8. Start the Laravel Development Server

Run:

```bash
php artisan serve
```

The application should now be available at:

```text
http://127.0.0.1:8000/login
```

Open the URL in your web browser.

## Running the Application

After the initial setup, start your MySQL service and run:

```bash
php artisan serve
```

Then visit:

```text
http://127.0.0.1:8000/login
```

## Default Login Credentials

Use the following credentials to access the application:

```text
Username: admin
Password: 123
```
## Troubleshooting

If you encounter Laravel cache or configuration issues, run:

```bash
php artisan optimize:clear
```

If PHP dependencies are missing, run:

```bash
composer install
```

If the application key is missing or invalid, run:

```bash
php artisan key:generate
```

If you encounter a database connection error, verify that:

- MySQL is running.
- The `projects` database exists.
- The SQL file was imported successfully.
- The database credentials in `.env` match your local MySQL configuration.

## AI Tool Disclosure

ChatGPT was used as an AI-assisted development tool during the development of this project.

It was primarily used for development assistance, particularly for JavaScript syntax and formatting that I do not always memorize, as well as for grammar and documentation improvements.

All AI-generated suggestions were reviewed, tested, modified where necessary, and integrated into the final application by the developer.

## Submission

This repository contains the source code, database file, and setup instructions required to run the Client Project Tracker locally.
The repository is publicly accessible for review.

Please feel free to message or email me if you encounter any issues. Thank you!
