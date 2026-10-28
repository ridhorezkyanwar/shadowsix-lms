# ShadowSix deployment guide

ShadowSix uses PHP + MySQL/MariaDB (MySQLi). It is not a static website.

## Free public hosting: PHP.ID

PHP.ID advertises a free cPanel plan with PHP, MySQL, and free SSL. Its published signup form asks for a real full name, WhatsApp number for activation, a Gmail/Yahoo email, and a password. The hosting terms require genuine identity data and an active verified email, allow only one free hosting account per person, put backups on the user, and prohibit high-volume CBT/online-exam use. ShadowSix's current repository is a learning-material LMS; do not use this free host to run large-scale exams. The provider's public terms page does not state a minimum age, but register only with accurate details and comply with any additional verification requirements shown by the provider.

Official provider pages:
- [Create a free account](https://www.php.id/register.html)
- [Free hosting features](https://www.php.id/freehosting/)
- [Hosting terms](https://www.php.id/syarat.html)
- [Terms of Service](https://www.php.id/tos.html)
- [Registration instructions](https://www.php.id/registrasi.html)

### 1. Create the account and database

1. Open [PHP.ID registration](https://www.php.id/register.html). Enter your own real full name, WhatsApp number for the activation code, active Gmail/Yahoo email, and a strong unique password. Do not falsify identity details or create a duplicate free account.
2. Verify the email/activation request and sign in to the hosting control panel.
3. In cPanel, create a MySQL database and a database user. Grant that user privileges only on the database for ShadowSix. Record the exact database hostname, full database name, full database username, and password privately.
4. Open phpMyAdmin and import [`shadowsix.sql`](https://raw.githubusercontent.com/ridhorezkyanwar/shadowsix-lms/main/shadowsix.sql). This is **schema-only**: it creates `login`, `materi`, and `kontak`, but includes no existing accounts, password hashes, material rows, contact messages or uploaded images.
5. In the cPanel File Manager, create `public_html/config.local.php` by copying `config.local.example.php` and filling in the four database values. Keep the filled file on the server only; it is ignored by Git and excluded from deployment. Do not paste database credentials into chat, code, issues, or logs.

### 2. Configure safe automatic deployment

The repository has a manual GitHub Actions workflow that uploads application files via FTPS using strict TLS. It uses the standard cPanel document root `public_html/`, never does a destructive clean-slate sync, and excludes the SQL schema, local config files, HTML duplicates, tests, scripts, container files and uploaded image contents.

In GitHub, open **Settings → Secrets and variables → Actions → New repository secret** and set:

- `PHPID_FTP_SERVER`: the exact FTP/FTPS hostname shown in the PHP.ID/cPanel account. Enter only a hostname, not a URL or path.
- `PHPID_FTP_USERNAME`: the FTP username shown in the hosting control panel.
- `PHPID_FTP_PASSWORD`: the FTP password.

Then open **Actions → Deploy ShadowSix to PHP.ID cPanel → Run workflow**. First run with `dry_run=true`, inspect the proposed changes, and only run a second time with `dry_run=false` after confirming the host and destination are correct. If the provider does not support strict FTPS on port 21 for your account, stop rather than switching to unencrypted FTP; check the exact connection instructions in its control panel.

The workflow cannot create the hosting account, database, private `config.local.php`, or GitHub secrets. These require access to your own hosting control panel.

### 3. Verify the live deployment

After FTPS upload finishes, open the domain/subdomain assigned by PHP.ID over HTTPS and verify:

- Home page and subject/material pages load.
- `/health.php` returns only `{"status":"ok"}` when the database is reachable and a generic unavailable response otherwise.
- Registration and login/logout work using a test account.
- Admin authorization blocks ordinary users.
- Add/edit/delete material and image uploads work using test content.
- The contact form saves its test message.
- A newly created test material survives page reload and a later non-destructive file deployment.

The schema does not create an administrator account. Register your own test account first, then in phpMyAdmin grant the admin role only to that account using a statement such as `UPDATE login SET role = 'admin' WHERE email = 'your-own-registered-email@example.test';`. Replace the email placeholder with your own registered email.

## Local deployment with Docker Compose

Requirements: Docker Engine and the Docker Compose plugin.

1. Copy `.env.example` to `.env`.
2. Replace `DB_PASSWORD` and `DB_ROOT_PASSWORD` with different random values. Do not commit `.env`.
3. Start the services:

   ```sh
   docker compose up --build -d
   ```

4. Open `http://127.0.0.1:8080`. MariaDB imports the schema into a new database volume on first initialization.
5. Check status with `docker compose ps` or visit `http://127.0.0.1:8080/health.php`.

Named volumes `db_data` and `uploads_data` preserve database rows and uploaded images across application rebuilds. Stop services while preserving data with `docker compose down`; do not add `-v` unless you deliberately want to permanently delete both data volumes.

## Backup and restore for local Docker

Create a backup folder outside the repository, then export the database without printing its password:

```sh
mkdir -p ../shadowsix-backups
docker compose exec -T db sh -c 'mariadb-dump -u"$MARIADB_USER" -p"$MARIADB_PASSWORD" "$MARIADB_DATABASE"' > ../shadowsix-backups/shadowsix.sql
```

Restore only after verifying the target database and keeping an independent backup:

```sh
docker compose exec -T db sh -c 'mariadb -u"$MARIADB_USER" -p"$MARIADB_PASSWORD" "$MARIADB_DATABASE"' < ../shadowsix-backups/shadowsix.sql
```

Never commit real accounts, password hashes, contact messages, uploaded files, private database exports, or hosting credentials.

## Data migration and production limits

- The repository contains a schema-only SQL file, not a backup of the previous hosting database. If the old hosting account was deleted, existing accounts, materials, contact messages and uploaded images can only be restored from a backup you already own; this workflow cannot recreate lost data.
- PHP.ID says users are responsible for their own backups and can lose hosting data. Export periodic copies of the database and uploaded files to a location outside the provider.
- Free shared hosting is suitable for a student/portfolio project, not a guarantee of production-grade availability or compliance for sensitive student data.
- Before using real student information, review rate limiting, session cookie flags, admin provisioning, upload controls, backups and remaining legacy PHP flows. This project has not had an independent security review.
- Do not import the schema into an existing database with important records without backing it up and reviewing the SQL first. The supplied schema uses `CREATE TABLE IF NOT EXISTS` but is not a migration for existing tables.
