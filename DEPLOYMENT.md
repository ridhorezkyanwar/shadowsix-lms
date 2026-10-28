# ShadowSix deployment guide

ShadowSix uses PHP + MySQL/MariaDB (MySQLi). It is not a static website. The repository supports two deployment paths: local Docker Compose for repeatable development, and InfinityFree for free shared PHP/MySQL hosting.

## Free public hosting: InfinityFree

The repository includes a manual GitHub Actions workflow that uploads application files over FTPS. **A hosting account and database still need to be created in the provider's dashboard before a live deployment can be completed.**

1. Create a free account at https://dash.infinityfree.com/register and create a hosting account with a free subdomain. No paid plan is required.
2. In the hosting control panel, create a MySQL database. Write down the database host, complete database name, complete database username, and password from the control panel.
3. Open phpMyAdmin for that database and import `shadowsix.sql` from a local download of this repository. This schema-only file creates the `login`, `materi`, and `kontak` tables. It creates no account, password hash, or contact-message records.
4. In the host's file manager, create `htdocs/config.local.php` by copying `config.local.example.php` and replacing every placeholder with the database connection details. The populated file is ignored by Git, excluded from FTPS deployment, and denied by the root `.htaccess`. Do not paste its credentials into source code, issues, logs, or chat.
5. In GitHub repository **Settings → Secrets and variables → Actions**, add the following repository secrets from the hosting panel:
   - `FTP_SERVER`: the FTP hostname only, with no scheme or path.
   - `FTP_USERNAME`: the full FTP username.
   - `FTP_PASSWORD`: the FTP password.
   - `FTP_SERVER_DIR`: exactly `htdocs/`.
6. Open **Actions → Deploy ShadowSix to InfinityFree → Run workflow** with `dry_run=true`. Inspect the proposed file changes. If the target is correct, run the workflow again with `dry_run=false` to upload the application.
7. Open the HTTPS subdomain, test registration/login and the material pages, then open `/health.php`. A healthy database returns only `{"status":"ok"}`; an unavailable database returns a generic status without revealing credentials.
8. Register your own user account. The schema does not create an administrator. Use phpMyAdmin on your own database to assign the admin role to the account you created, e.g. `UPDATE login SET role = 'admin' WHERE email = 'your-own-registered-email@example.test';`. Replace the placeholder with your own registered email.

The workflow is intentionally guarded:
- It only runs manually, not on every push.
- The default is a dry run.
- It uses FTPS and fails unless the configured destination is `htdocs/`.
- It excludes `shadowsix.sql`, local config files, source-control metadata, scripts, tests, Docker files, documentation, and upload contents.
- It does not use the destructive clean-slate option and excludes `uploads/materi/` and `uploads/mapel/` from syncing so future deploys do not remove user-uploaded images.

## Local Docker Compose deployment

Requirements: Docker Engine and the Docker Compose plugin.

1. Copy `.env.example` to `.env`.
2. Replace `DB_PASSWORD` and `DB_ROOT_PASSWORD` with different random passwords. Do not commit `.env`.
3. Start the services:

   ```sh
   docker compose up --build -d
   ```

4. Open `http://127.0.0.1:8080`. MariaDB loads the schema into a new volume on its first initialization.
5. Check health with `docker compose ps` or `http://127.0.0.1:8080/health.php`.

Named volumes `db_data` and `uploads_data` preserve database rows and uploaded images across application rebuilds. The local initializer creates tables only; it does not import private data or create an administrator account.

Stop services without removing data using `docker compose down`. Do not add `-v` unless you intend to permanently delete both named volumes.

## Backup and restore for local Docker

Create a backup folder outside the repository, then export the database without printing its password:

```sh
mkdir -p ../shadowsix-backups
docker compose exec -T db sh -c 'mariadb-dump -u"$MARIADB_USER" -p"$MARIADB_PASSWORD" "$MARIADB_DATABASE"' > ../shadowsix-backups/shadowsix.sql
```

Restore only after checking the target database and keeping an independent backup:

```sh
docker compose exec -T db sh -c 'mariadb -u"$MARIADB_USER" -p"$MARIADB_PASSWORD" "$MARIADB_DATABASE"' < ../shadowsix-backups/shadowsix.sql
```

Never commit exports, real accounts, password hashes, contact messages, uploaded files, or production credentials.

## Important limits

- InfinityFree provides a free PHP/MySQL shared-hosting environment. It is suitable for a portfolio or student project, not a guarantee of production-grade availability or sensitive student-data compliance.
- Free hosting providers can have fair-use limits and support constraints. Keep backups outside the provider and test restores periodically.
- The FTPS workflow prepares deployment but cannot create the host account, database, GitHub secrets, or populated private `config.local.php` by itself. Those require access to the user's hosting account.
- Before using the app with real student records, review rate limiting, secure cookie flags, admin provisioning, upload controls, backups, and remaining legacy PHP flows. The project has not had an independent security review.
- Do not import the schema into a database containing important records without taking a backup and reviewing the SQL first. The supplied schema uses `CREATE TABLE IF NOT EXISTS` but is not a migration for existing tables.
