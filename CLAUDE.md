# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Ethos is an educational institution CMS handling student admissions, academic management, careers, newsletters, galleries, events, and content publishing. It supports bilingual content (English/Arabic).

## Tech Stack

- **Framework**: CakePHP 1.3.21 (legacy — no Composer autoloading for app code, no namespaces)
- **PHP**: 7.3+
- **Database**: MySQL via MySQLi driver, UTF-8 encoding
- **Frontend**: jQuery with server-rendered `.ctp` templates
- **Dependencies**: Composer (`vendor/`) — dompdf, phpmailer, phpspreadsheet, ar-php, flysystem, phpdotenv

## Commands

```bash
# Install PHP dependencies
composer install

# Run CakePHP tests (from app directory)
cd app && cake testsuite app case models/content

# Start local dev server (Apache with mod_rewrite required)
# The app expects to be served from the document root with .htaccess rewriting
```

There is no build step, linter, or CI pipeline configured. Tests use CakePHP's built-in test suite under `app/tests/`.

## Architecture

### MVC Structure

```
app/
├── config/           # core.php, database.php, routes.php, bootstrap.php
├── controllers/      # 49 controllers — one per domain entity
│   └── components/   # Upload (file/image handling with resize modes)
├── models/           # 36 models — CakePHP ActiveRecord style
├── views/
│   ├── <controller>/  # View templates (.ctp) grouped by controller
│   ├── elements/      # Reusable partials (backend/, front/, email/)
│   ├── helpers/       # Lang, Resize, GoogleMapV3, CropImage, XmlExcel, Fck
│   └── layouts/       # backend/main, front/main, forum/main, email, ajax, xml
├── webroot/          # Public assets (CSS, JS, images, uploaded files)
├── app_controller.php   # Base controller — SSL redirect, language detection, settings
└── auth_controller.php  # Extends AppController — session-based auth via `userInfo`
```

### Controller Inheritance

All public-facing controllers extend `AppController`. Admin controllers extend `AuthController` (which extends `AppController`) and call `$this->isAuthentic()` to gate access.

### Key Patterns

- **Dual controller convention**: Some entities have singular (frontend) and plural (admin) controllers — e.g., `career_controller.php` (public view) vs `careers_controller.php` (admin CRUD).
- **Language routing**: URLs follow `/:language/:controller/:action/*` pattern. `$this->lang` defaults to `'en'`; `'ar'` switches CakePHP locale to `'ara'`. Translations live in `app/locale/{ara,eng}/`.
- **Admin area**: All admin routes start with `/me-admin/`. The `meadmin_controller.php` handles login/logout/dashboard.
- **Upload component**: `app/controllers/components/upload.php` handles file uploads with configurable resize modes (0–3) for master images, thumbnails, and crops.
- **Settings**: Site-wide settings are stored in the `settings` table (row id=1) and cached in the session.
- **PDF export**: Uses dompdf for generating PDF documents (e.g., admission forms).
- **Excel export**: Uses PhpSpreadsheet for data exports.
- **Email/Newsletter**: PHPMailer for transactional email; newsletter queue system with rate limiting (500/hour).

### Database Configuration

Connection details come from `.env` via phpdotenv, loaded in `app/config/database.php`. Required env vars: `DB_HOST`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`.

### Layouts

- `front/main` — Public website (default for all controllers)
- `backend/main` — Admin panel (set explicitly in admin controllers)
- `ajax` — Bare layout for AJAX responses
- `email/html/default` — HTML email wrapper
