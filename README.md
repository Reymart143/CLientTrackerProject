# Client Project Tracker

A simple Client Project Tracker developed for a digital agency to manage client projects, project status, priority, schedules, and progress.

## Technologies Used

Frontend:
Laravel Blade (Including :HTML,CSS,JavaScript,Bootstrap)

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
git clone YOUR_GITHUB_REPOSITORY_URL
```
Replace `YOUR_GITHUB_REPOSITORY_URL` with the actual GitHub repository URL.

Example:

```bash
git clone https://github.com/yourusername/client-project-tracker.git
```

### 2. Open the Project Directory

```bash
cd ClientTracker
```

Change `ClientTracker` if your project folder has a different name.

### 3. Install PHP Dependencies

Run:

```bash
composer install
```

### 4. Create the Environment File

For Windows Command Prompt:

```bash
copy .env.example .env
```

For macOS/Linux:

```bash
cp .env.example .env
```

### 5. Generate the Laravel Application Key

Run:

```bash
php artisan key:generate
```

### 6. Create the MySQL Database

Open phpMyAdmin, MySQL Workbench, or the MySQL command line and create a database.

Example:

```sql
CREATE DATABASE projects;
```

### 7. Configure the Database

Open the `.env` file and update the database configuration:
Defaul is : 
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=client_project_tracker
DB_USERNAME=root
DB_PASSWORD=
```

Update `DB_USERNAME` and `DB_PASSWORD` according to your local MySQL configuration.

### 8. Run the Database Migrations

Run:

```bash
php artisan migrate
```

This will create the required database tables.

### 9. Clear Laravel Cache

Run:

```bash
php artisan optimize:clear
```

### 10. Start the Laravel Development Server

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

After the initial setup, you normally only need to start your MySQL service and run:

```bash
php artisan serve
```

Then visit:

```text
http://127.0.0.1:8000/login

## Login DEFAULT CREDENTIALS
- username: admin
- password : 123

## Dashboard
The dashboard displays project statistics including:

- Total Projects
- Planning
- In Progress
- On Hold
- Completed
- Low Priority
- Medium Priority
- High Priority

## Troubleshooting
If you encounter Laravel cache or configuration issues, run:

```bash
php artisan optimize:clear
```

If the database tables do not exist, run:

```bash
php artisan migrate
```

If PHP dependencies are missing, run:

```bash
composer install
```

If the application key is missing, run:

```bash
php artisan key:generate
```

## AI Tool Disclosure

AI-assisted development tools is (CHAT GPT) were used during the development process for development assistance,specially in format for javascript since i did not memorize all format in javascript and also grammar in documentations.

The generated suggestions were reviewed, tested, modified where necessary, and integrated into the final application by the developer.
## Submission

The repository contains the source code and setup instructions required to run the Client Project Tracker locally.
Make sure the GitHub repository is publicly accessible before submitting the repository link through the official application form.
