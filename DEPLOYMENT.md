# ShadowSix deployment guide

ShadowSix uses PHP + MySQL/MariaDB (MySQLi). It is not a static website.

## Free public hosting: HelioHost (Johnny)

This project is prepared for HelioHost's free PHP/MariaDB shared hosting. HelioHost's published Terms of Service state a minimum age of 13; use accurate account information and do not change your age to bypass another provider's rules. Free signups can be limited by server capacity, and the free Johnny service requires at least one login each month. Hosting is community-operated without a production SLA.

Official provider pages:
- [Sign up](https://heliohost.org/signup/)
- [Terms of Service](https://heliohost.org/terms/)
- [PHP / database features](https://wiki.helionet.org/What_HelioHost_Offers)
- [File transfer and server details](https://wiki.helionet.org/Uploading_Files)

### 1. Create the hosting account and database

1. Create an account using your real details at [HelioHost signup](https://heliohost.org/signup/), then request the free **Johnny** hosting plan and choose a domain/subdomain offered by the control panel. Do not create duplicate accounts.
2. After the hosting control panel is active, open Plesk and create a MariaDB database plus a database user with a strong, unique password.
3. Import the schema-only file [`shadowsix.sql`](https://raw.githubusercontent.com/ridhorezkyanwar/shadowsix-lms/main/shadowsix.sql) in the database's phpMyAdmin. It creates `login`, `materi`, and `kontak`; it contains no real user accounts, password hashes, contact messages, or teaching-material records.
4. In Plesk File Manager, create `httpdocs/config.local.php` from the repository's `config.local.example.php` template and replace every placeholder with the database hostname/name/username/password shown by Plesk. Keep this populated file on the server only: it is ignored by Git and explicitly excluded from deployments. Never paste its contents into chat, issues, logs, or the repository.
5. Use the Plesk file manager to confirm `httpdocs/.htaccess` is present after the first deployment. It blocks web requests to database configuration helpers, local config files, SQL exports and deployment scripts.

### 2. Configure automatic FTPS deployment

The repository includes a guarded GitHub Actions workflow that uses HelioHost's documented FTPS endpoint on port 21. It targets only `johnny.heliohost.org` and `httpdocs/`; it will not send deployment credentials to an arbitrary host.

In GitHub, open **Settings → Secrets and variables → Actions → New repository secret** and add:

- `HELIOHOST_FTP_USERNAME`: the hosting system user's FTP username from Plesk.
- `HELIOHOST_FTP_PASSWORD`: the corresponding FTP password.

Then open **Actions → Deploy ShadowSix to HelioHost → Run workflow**. First run with `dry_run=true`, review the changes, then run again with `dry_run=false` only when the target and uploaded file list are correct.

The workflow is intentionally guarded:
- It only runs when manually triggered and defaults to a dry run.
- It uses strict FTPS, does not clean the whole hosting directory, and targets the free Johnny host only.
- It excludes local DB config, schema/export files, source-control metadata, tests, scripts, container files, documentation, and uploaded image contents.
- It preserves `config.local.php` and `uploads/materi/` / `uploads/mapel/` content across normal deployments.

### 3. Verify the live app

After the upload completes, use the exact domain assigned in Plesk; no live hostname is assumed before the account exists. Check:
- Home page and subject pages load over HTTPS.
- `/health.php` returns only `{"status":"ok"}` when the database is reachable and a generic unavailable response otherwise.
- Registration, login/logout, viewing materials, admin authorization, add/edit/delete materials, image uploads, and the contact form work with test data.
- A new material survives a page reload and remains after a normal application redeploy.

The schema intentionally creates no administrator. Register your own test account, then in phpMyAdmin assign admin only to that account by running a statement such as `UPDATE login SET role = 'admin' WHERE email = 'your-own-registered-email@example.test';`. Replace the email placeholder with the account you registered yourself.

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

Named volumes `db_data` and `uploads_data` preserve database rows and uploaded images across application rebuilds. Stop services while preserving data with `docker compose down`; do not add `-v` unless you deliberately want to delete both data volumes.

## Backup and restore for local Docker

Create a backup directory outside the repository, then export the database without printing its password:

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

- The old hosting account is not connected to this deployment. The repository contains a **schema-only** SQL file, not a copy of the previous database. Existing accounts, materials, contact messages, and uploaded images can only be recovered from a backup you already have; this workflow cannot recreate lost data.
- The free host is suitable for a student/portfolio project, not a guarantee of production-grade availability or compliance for sensitive student records. Keep independent backups, and test restore procedures.
- Before using real student information, do a separate security review of rate limiting, session cookie flags, administrator provisioning, upload controls, backups, and remaining legacy PHP flows. The project has not had an independent security review.
- Do not import the schema into a database with important records without backing it up and reviewing the SQL first. The schema uses `CREATE TABLE IF NOT EXISTS` but is not a migration for existing tables.
