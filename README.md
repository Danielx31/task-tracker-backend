# Task Tracker API

A Laravel-based RESTful API for managing tasks with authentication, CRUD operations, and statistics.

## Features

-   User authentication with Sanctum API tokens
-   Task management (Create, Read, Update, Delete)
-   Task filtering by status, priority, and due date
-   Full-text search for tasks
-   Statistics dashboard
-   RESTful API design

## Tech Stack

-   **Backend**: Laravel 12
-   **Authentication**: Laravel Sanctum
-   **Database**: MySQL/PostgreSQL/SQLite
-   **Frontend Build Tool**: Vite
-   **Styling**: Tailwind CSS
-   **API Testing**: Built-in Laravel testing

## Prerequisites

Before you begin, ensure you have the following installed:

-   PHP 8.2 or higher
-   Composer
-   Node.js and npm
-   A database (MySQL, PostgreSQL, or SQLite)

## Installation

### 1. Clone the repository

```bash
git clone <repository-url>
cd task-tracker-api
```

### 2. Install PHP dependencies

```bash
composer install
```

### 3. Set up environment variables

Copy the example environment file:

```bash
cp .env.example .env
```

### 4. Generate application key

```bash
php artisan key:generate
```

### 5. Configure your database

Update the `.env` file with your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_tracker
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 6. Run database migrations

```bash
php artisan migrate
```

This will:

-   Install PHP dependencies
-   Copy `.env` file if it doesn't exist
-   Generate the application key
-   Run database migrations
-   Install and build frontend assets

## Running the Application

### Development

To run the application in development mode with hot reloading:

```bash
composer run dev
```

This will start:

-   Laravel development server
-   Queue listener
-   Pail logs
-   Vite dev server

### Production

To run the application in production:

```bash
php artisan serve
```

## API Endpoints

### Authentication

-   `POST /api/register` - Register a new user
-   `POST /api/login` - Login and get API token
-   `POST /api/logout` - Logout and invalidate token
-   `GET /api/me` - Get authenticated user details

### Tasks

-   `GET /api/tasks` - Get all tasks (with optional filters)
-   `POST /api/tasks` - Create a new task
-   `GET /api/tasks/{id}` - Get a specific task
-   `PUT /api/tasks/{id}` - Update a task
-   `DELETE /api/tasks/{id}` - Delete a task

### Statistics

-   `GET /api/stats` - Get user statistics

### Task Filters

The tasks endpoint supports the following query parameters:

-   `status` - Filter by task status
-   `priority` - Filter by task priority
-   `due_date` - Filter by due date
-   `search` - Search in title and description

## Environment Variables

-   `APP_NAME` - Application name
-   `APP_ENV` - Application environment (local, production)
-   `APP_KEY` - Application key (auto-generated)
-   `DB_CONNECTION` - Database connection type
-   `DB_HOST` - Database host
-   `DB_PORT` - Database port
-   `DB_DATABASE` - Database name
-   `DB_USERNAME` - Database username
-   `DB_PASSWORD` - Database password
-   `SANCTUM_STATEFUL_DOMAINS` - Domains allowed for stateful requests

## Testing

Run the test suite:

```bash
composer run test
```

Or using artisan directly:

```bash
php artisan test
```

## Database Seeding

To seed the database with sample data:

```bash
php artisan db:seed
```

## Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Make your changes
4. Commit your changes (`git commit -m 'Add amazing feature'`)
5. Push to the branch (`git push origin feature/amazing-feature`)
6. Open a Pull Request

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
