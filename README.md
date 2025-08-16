# Laravel Project Setup

A simple guide to set up the project locally.

Import the database from the database file located inside the project folder, and copy .env.example to configure your database settings according to your environment.

## Steps to Install

### 1. Clone Repository

```bash
git clone <repository-url>
cd <project-folder>
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Setup Environment

```bash
cp .env.example .env
```

Update database credentials in `.env`.

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Install Node.js Dependencies

```bash
npm install
```

### 6. Run Migrations

```bash
php artisan migrate
```

### 7. Run Development Servers

Laravel server:

```bash
php artisan serve
```

Node development server:

```bash
npm run dev
```

### 8. Start WebSocket Server

```bash
php artisan websockets:serve
```

## Credential

-   user1@mail.com
-   pw: secret007

-   user2@mail.com
-   pw: seccert007
