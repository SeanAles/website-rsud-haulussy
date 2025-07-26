# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a Laravel 10 application for RSUD Haulussy hospital website. The project includes both admin and visitor interfaces, with features for content management, notifications, and hospital services information.

## Essential Commands

### Development
```bash
# Start development server
php artisan serve

# Run migrations
php artisan migrate

# Generate application key (if needed)
php artisan key:generate

# Clear application cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Run queue workers (for background jobs)
php artisan queue:work
```

### Database
```bash
# Run database migrations
php artisan migrate

# Rollback migrations
php artisan migrate:rollback

# Refresh migrations (drops all tables and re-runs)
php artisan migrate:refresh

# Seed database
php artisan db:seed
```

### Testing
```bash
# Run all tests
php artisan test
# or
vendor/bin/phpunit

# Run specific test
php artisan test --filter=ExampleTest
```

### Asset Management
```bash
# Install NPM dependencies (if package.json exists)
npm install

# Build assets for development
npm run dev

# Build assets for production
npm run build

# Watch for changes (development)
npm run dev -- --watch
```

### Code Quality
```bash
# Laravel Pint (code formatting)
vendor/bin/pint

# Fix all files
vendor/bin/pint --verbose
```

## Architecture Overview

### Application Structure
- **MVC Pattern**: Standard Laravel MVC architecture
- **Admin Panel**: Full CRUD operations for content management located in `app/Http/Controllers/`
- **Visitor Interface**: Public-facing website in `app/Http/Controllers/Visitor/`
- **Authentication**: Role-based access control with User and Role models
- **Notifications**: Laravel notification system for suggestions and requests

### Key Models
- `User`: Authentication with role-based permissions
- `Post`: News/articles with categories and thumbnails  
- `Event`: Hospital events with picture galleries
- `Bed`: Hospital bed availability tracking
- `Suggestion`: Public feedback system
- `RequestOnlineInformation`: Online information requests
- `Notification`: System notifications

### Database
- Uses Laravel migrations in `database/migrations/`
- Models follow Eloquent ORM patterns
- Relationships defined between models (User->Posts, Event->Pictures, etc.)

### Frontend
- Blade templating engine
- Separate admin and visitor view directories
- Bootstrap-based responsive design
- DataTables integration for admin listings
- CKEditor for rich text editing

### Key Features
- Content Management System (News, Articles, Events)
- Hospital bed availability tracking
- Public suggestion/feedback system
- Online information request system
- File download management
- Advertisement (Iklan) management
- Role-based admin access control
- Notification system

### Middleware
- Admin access control (`Admin`, `SuperAdmin`)
- Feature-specific middleware (`AdminArticle`, `AdminBed`, etc.)
- Authentication and CSRF protection

### Routes
- Visitor routes: Public website functionality
- Admin routes: Protected administrative interface
- API routes: Available in `routes/api.php`

## Development Notes

### Testing
- PHPUnit configured with `phpunit.xml`
- Test environment uses array drivers for cache, mail, and sessions
- Feature and Unit test directories in `tests/`

### Dependencies
- **yajra/laravel-datatables**: For admin data tables
- **laravel/sanctum**: API authentication
- **Bootstrap & jQuery**: Frontend framework (via public/plugins/)
- **CKEditor**: Rich text editing
- **FontAwesome**: Icons

### File Structure
- Controllers organized by functionality
- Models in `app/Models/`
- Views separated into `admin/` and `visitor/` directories
- Public assets in `public/` with organized plugin structure
- Database migrations follow Laravel conventions

### Common Patterns
- Controllers extend base `Controller` class
- Models use Laravel Eloquent features (factories, relationships)
- Blade views use component-based structure
- Admin forms follow consistent validation patterns