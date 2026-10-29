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

## Recommended full-stack deployment: Render

The repository includes a Render Blueprint in `render.yaml` for the PHP application, a private MySQL service, persistent database storage, persistent uploaded-image storage, and automatic schema bootstrap. Follow [RENDER_DEPLOYMENT.md](RENDER_DEPLOYMENT.md) for first-time setup, health checks, costs, and the important note that the SQL file contains schema only—not existing production data.

The Blueprint must be created once in the Render Dashboard; committing this file does not itself provision cloud resources. The configuration uses paid Starter services and persistent disks (estimated around US$16.75/month before extras).

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

## Run locally with Docker Compose (PHP + MariaDB)

The repository includes a containerized PHP/Apache runtime and a persistent MariaDB service for reproducible testing.

1. Install Docker Engine with the Compose plugin.
2. Copy `.env.example` to `.env`.
3. Replace both example passwords in `.env` with different random values. Do not commit the real `.env`.
4. Start the application and database:

   ```sh
   docker compose up --build -d
   ```

5. Open `http://127.0.0.1:8080`. Check readiness with `docker compose ps` or `http://127.0.0.1:8080/health.php`.

MariaDB imports `shadowsix.sql` when the database volume is first created. The `db_data` and `uploads_data` volumes preserve database rows and uploaded images across application rebuilds. The schema does not create an administrator account. After registering your own test account, grant admin role only in the database you control.

To stop services while preserving data, use `docker compose down`. Do not use `docker compose down -v` unless permanent deletion of both named volumes is intended. Review [DEPLOYMENT.md](DEPLOYMENT.md) for backup, restore, and host requirements.

The health endpoint reports only `ok` or `unavailable`; it never returns database hostnames, table names, or credentials.
The cPanel bundle omits legacy `.html` duplicates because PHP is the actual LMS entry point; the bundled `.htaccess` also sets `DirectoryIndex index.php index.html` to prioritize the session-aware PHP home page.

## Legacy hosting option: PHP.ID/cPanel (not used by the Render deployment)

PHP.ID advertises free cPanel hosting with PHP and MySQL. Its terms require truthful personal details, verified email, one free hosting account per person and user-maintained backups. The service is not intended for large-scale CBT/online exams, so keep ShadowSix focused on learning materials rather than running mass online exams.

1. Register at [PHP.ID](https://www.php.id/register.html) using your real name, active Gmail/Yahoo email, and WhatsApp number for activation. Do not falsify identity details or create a duplicate free account.
2. Create a MySQL database and database user in the hosting control panel. Import [`shadowsix.sql`](https://raw.githubusercontent.com/ridhorezkyanwar/shadowsix-lms/main/shadowsix.sql) using phpMyAdmin. This schema contains no user records, materials, contact messages, or passwords.
3. In the control panel's file manager, create `public_html/config.local.php` from `config.local.example.php` and insert the exact DB hostname, full database name, username, and password. Keep the filled file private.
4. In GitHub repository **Settings → Secrets and variables → Actions**, add `PHPID_FTP_SERVER`, `PHPID_FTP_USERNAME`, and `PHPID_FTP_PASSWORD` using the FTP details shown by the provider.
5. Open **Actions → Deploy ShadowSix to PHP.ID cPanel → Run workflow**. First run with `dry_run=true`; inspect the preview, then use `dry_run=false` only after confirming the destination.
6. Test the assigned HTTPS domain, `/health.php`, registration/login, materials, admin permission, image uploads, and the contact form.

The FTPS workflow uses strict TLS, targets the standard cPanel `public_html/` directory, defaults to preview mode, never uses destructive clean-slate syncing, and excludes database dumps, private config, legacy HTML duplicates, and upload contents. See [DEPLOYMENT.md](DEPLOYMENT.md) for detailed steps and backups.

**Important:** the old hosting database and uploaded images are not in this repository. If the old host was deleted, existing users/materials/contact messages/uploads can only be restored from a backup you already have.

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

The tracked root `.htaccess` contains non-secret hardening rules and should not be overwritten. For local XAMPP, use the SetEnv snippet in `.htaccess.example` inside your local Apache VirtualHost configuration outside this repository; do not add database settings to the tracked file. On hosted environments, set `DB_HOST`, `DB_USER`, `DB_PASSWORD`, and `DB_NAME` through the hosting provider's private environment settings. Confirm the host supports the chosen mechanism before deploying.

### Read-only database preflight

Run `php scripts/db_preflight.php --schema-only` to check the committed schema without a server or database connection. On the PHP host (for example, through its CLI/terminal), run `php scripts/db_preflight.php` after setting the private `DB_*` variables. The live check reads only table metadata and makes no schema or record changes. It is CLI-only and does not print database credentials or raw connection errors. Do not expose the command via a web request or paste database passwords into GitHub.

Optional contact-email settings are `CONTACT_EMAIL` (destination address) and `MAIL_FROM` (a sender address authorized by your host). Without both values, the form stores the message in the database but does not send an email. A successful `mail()` return means the mail server accepted the message for handling; it does not guarantee delivery.

Open `http://localhost/shadowsix-lms/index.php`. Register a new account to test the student flow. The schema does not create a default administrator. To grant admin access on your own development database after registering, run a deliberate database operation such as `UPDATE login SET role = 'admin' WHERE email = 'your-own-address@example.test';` with your own registered email. Never put real account credentials or data in the repository.

## Database configuration and secrets

The application reads `DB_HOST`, `DB_USER`, `DB_PASSWORD`, and `DB_NAME` from the server environment. It no longer contains deployment credentials. If configuration is missing, database-backed pages return a generic service-unavailable message instead of exposing connection details.

**Important:** any database credential previously committed to a public repository must be considered exposed. Rotate the old password in the hosting/database control panel, update the private environment configuration, and review access logs. Removing a file from the current branch does not erase earlier Git commits; history cleanup may be needed if a secret was committed.

## Verified cPanel deployment bundle

After the `PHP quality checks` workflow succeeds, it uploads a `shadowsix-cpanel-bundle` artifact for 14 days. Open [GitHub Actions](https://github.com/ridhorezkyanwar/shadowsix-lms/actions/workflows/php-quality.yml), select the successful run for the desired commit, and download that artifact. It contains:

- `public_html/`: application PHP/CSS/images and Apache protection rules.
- `database/shadowsix.sql`: schema-only SQL for importing into a database you created.

Before deployment, back up the existing database and uploaded images. Import the schema only into a new/empty database; do not blindly import it over an existing database. Upload the contents of `public_html/` into the host document root, create the database and dedicated user in the host control panel, then configure private DB settings as the host supports. Never put actual database credentials in the ZIP, GitHub, or the tracked `.htaccess`.

This verified artifact is a deployment package, not proof that a live host has been updated. The linked host must still be reachable and authenticated, the database must be configured, and the live routes must be smoke-tested before declaring production deployment complete.

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

