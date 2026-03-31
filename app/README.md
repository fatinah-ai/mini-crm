# Mini CRM — Laravel

A simple admin panel to manage Companies and Employees.

## Requirements
- PHP 8.1+
- Composer
- Node.js & NPM
- MySQL

## Setup

1. Clone the repo:
git clone <your-repo-url>
cd mini-crm

2. Install dependencies:
composer install
npm install && npm run build

3. Copy env and configure:
cp .env.example .env
php artisan key:generate
# Edit .env with your DB credentials

4. Run migrations and seed:
php artisan migrate --seed
php artisan storage:link

5. Start the server:
php artisan serve

## Login
- Email: admin@admin.com
- Password: password

## API Endpoint
GET /api/companies/{id}
Returns a company with its employees and employee_count.

Example: http://localhost:8000/api/companies/1