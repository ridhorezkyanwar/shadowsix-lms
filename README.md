# ShadowSix LMS

ShadowSix is a PHP and MySQL/MariaDB learning-management project built for a school competency assessment. It provides subject pages, chapter-based materials, user registration/login, an admin interface for managing materials, and a contact form.

> **Project status:** educational project / portfolio prototype. It has not undergone an independent security review. Do not use it for sensitive student data or public production workloads without further hardening and testing.

## Features

- Browse subject and chapter pages.
- Register and sign in with password hashing.
- Role check for the admin material-management area.
- Create, edit, and delete material records.
- Optional material and subject image uploads.
- Contact form backed by the database.
- Responsive HTML/CSS interface.

## Technology

- PHP (MySQLi)
- MySQL or MariaDB
- HTML and CSS
- Apache, including XAMPP for local development

## Project structure

```text
.
├── index.php                 # Home and subject overview
├── login.php                 # Sign-in
├── register.php              # Account registration
├── databasecpnel.php         # Shared database connection
├── dashboard_admin.php       # Admin material list
├── tambah_materi.php         # Create a material
├── edit_materi.php           # Update a material
├── hapus_materi.php          # Delete a material
├── view_materi.php           # Material details
├── kontak/                   # Contact page and stylesheet
├── materi-*/                 # Subject/chapter pages
├── img/                      # Subject images
└── shadowsix.sql             # Schema only; no account or contact data
```

## Run locally with XAMPP

1. Clone this repository into `xampp/htdocs/shadowsix-lms`.
2. Start Apache and MySQL/MariaDB.
3. Create an empty database named `shadowsix` in phpMyAdmin.
4. Select that database and import `shadowsix.sql`. The file creates the three tables used by the application but deliberately contains no users, password hashes, or contact messages.
5. Configure the database environment variables for Apache/PHP:
   - `DB_HOST`: usually `localhost`
   - `DB_USER`: your local database user
   - `DB_PASSWORD`: that user's password (XAMPP installations may use an empty password locally)
   - `DB_NAME`: `shadowsix`

For local XAMPP only, `.htaccess.example` shows one way to set these variables through Apache. Copy it to `.htaccess` and edit the values for your local database. The real `.htaccess` is ignored by Git and must not be committed. On hosting, set the variables through the hosting control panel or server configuration instead. Confirm the host supports the chosen environment-variable mechanism before deploying.

Open `http://localhost/shadowsix-lms/index.php`. Register a new account to test the student flow. Do not promote an account to administrator by editing a public seed file; assign administrator privileges only through a controlled database operation on your own instance.

## Database configuration and secrets

The application reads `DB_HOST`, `DB_USER`, `DB_PASSWORD`, and `DB_NAME` from the server environment. It no longer contains deployment credentials. If configuration is missing, database-backed pages return a generic service-unavailable message instead of exposing connection details.

**Important:** any database credential previously committed to a public repository must be considered exposed. Rotate the old password in the hosting/database control panel, update the private environment configuration, and review access logs. Removing a file from the current branch does not erase earlier Git commits; history cleanup may be needed if a secret was committed.

## Security and limitations

- SQL operations in the authentication/material flows use prepared statements in several places, but this does not mean the whole application is secure.
- Before a production deployment, add CSRF protection to state-changing forms, harden file uploads, review session settings and rate limiting, and sanitize stored rich-text material before rendering it.
- Do not place production data, account exports, contact messages, password hashes, credentials, or uploaded files in Git.
- Use only test data in development.
- The schema file is structure only; an administrator account is not pre-created.

## License

See [LICENSE](LICENSE).
