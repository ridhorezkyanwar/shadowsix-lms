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

Optional contact-email settings are `CONTACT_EMAIL` (destination address) and `MAIL_FROM` (a sender address authorized by your host). Without both values, the form stores the message in the database but does not send an email. A successful `mail()` return means the mail server accepted the message for handling; it does not guarantee delivery.

Open `http://localhost/shadowsix-lms/index.php`. Register a new account to test the student flow. The schema does not create a default administrator. To grant admin access on your own development database after registering, run a deliberate database operation such as `UPDATE login SET role = 'admin' WHERE email = 'your-own-address@example.test';` with your own registered email. Never put real account credentials or data in the repository.

## Database configuration and secrets

The application reads `DB_HOST`, `DB_USER`, `DB_PASSWORD`, and `DB_NAME` from the server environment. It no longer contains deployment credentials. If configuration is missing, database-backed pages return a generic service-unavailable message instead of exposing connection details.

**Important:** any database credential previously committed to a public repository must be considered exposed. Rotate the old password in the hosting/database control panel, update the private environment configuration, and review access logs. Removing a file from the current branch does not erase earlier Git commits; history cleanup may be needed if a secret was committed.

## Continuous integration

Every push and pull request should run a PHP syntax check across application PHP files and verify that the database schema contains the expected tables. Static checks do not connect to, mutate, or prove the health of a hosted database.

## Production deployment checklist (cPanel / Apache + MySQL)

The repository does not contain a deployment-provider API or production database credentials. Before changing a live site:

1. Confirm the hosting account, document root, PHP version/extensions, and whether Git Version Control or another deployment mechanism is configured.
2. Export a database backup from the hosting control panel/phpMyAdmin and verify that the backup file is readable. Back up uploaded files separately; they are not part of the SQL schema.
3. Compare the live schema with `shadowsix.sql`. The file creates the three tables on a fresh database; it is not a data migration and does not update existing rows or provision an administrator.
4. Deploy application files without overwriting private server configuration or user uploads. Configure `DB_HOST`, `DB_USER`, `DB_PASSWORD`, and `DB_NAME` in the host's private environment settings.
5. Run smoke tests for the home page, registration, login/logout, subject/material reading, admin authorization, material CRUD, image-upload restrictions, and contact form. Use a test account and test content only.
6. Confirm the new revision and database-backed flows on the actual production hostname. If anything fails, restore the previous application revision and database backup.

**Do not import the schema into an existing production database blindly.** No production database changes are made by static checks. Never commit hosting passwords, database dumps, real users, password hashes, or contact messages.

## Security and limitations

- SQL operations in the authentication/material flows use prepared statements in several places, but this does not mean the whole application is secure.
- Admin create/edit/delete forms and logout use CSRF tokens; login rotates the session ID; uploaded raster images are checked by MIME type and image headers; and rich-text material is sanitized before rendering.
- Before a production deployment, review rate limiting, secure cookie flags, admin provisioning, file-upload hosting rules, backups, and the application's remaining legacy PHP flows.
- Do not place production data, account exports, contact messages, password hashes, credentials, or uploaded files in Git.
- Use only test data in development.
- The schema file is structure only; an administrator account is not pre-created.

