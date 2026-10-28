# ShadowSix deployment notes

ShadowSix uses PHP + MySQL/MariaDB (MySQLi). It is not a static site and cannot run its database-backed flows on a static-only host.

## Local deployment with Docker Compose

Requirements: Docker Engine and the Docker Compose plugin.

1. Copy `.env.example` to `.env`.
2. Change `DB_PASSWORD` and `DB_ROOT_PASSWORD` to two different random passwords. Do not commit `.env`.
3. Start the stack:

   ```sh
   docker compose up --build -d
   ```

4. Open `http://127.0.0.1:8080`. The database schema is loaded into a new MariaDB volume on first initialization.
5. Check health with `docker compose ps` or `http://127.0.0.1:8080/health.php`.

Named volumes `db_data` and `uploads_data` keep MariaDB data and uploaded material images across app rebuilds. The database initializer only creates the three tables; it does not import private data or create an administrator account. Register your own account, then promote only that account using a deliberate SQL operation in the database you control.

To stop without deleting data, run `docker compose down`. Do not add `-v` unless you intend to permanently delete the local database and uploaded-image volumes.

## Backups and restore

Create a backup folder outside the repository, then export the database. The command reads database settings inside the running database container and does not print the password:

```sh
mkdir -p ../shadowsix-backups
docker compose exec -T db sh -c 'mariadb-dump -u"$MARIADB_USER" -p"$MARIADB_PASSWORD" "$MARIADB_DATABASE"' > ../shadowsix-backups/shadowsix.sql
```

Restore only after verifying the target database and keeping an independent backup:

```sh
docker compose exec -T db sh -c 'mariadb -u"$MARIADB_USER" -p"$MARIADB_PASSWORD" "$MARIADB_DATABASE"' < ../shadowsix-backups/shadowsix.sql
```

Never commit backups, real accounts, password hashes, contact messages, uploads or production credentials to GitHub.

## Hosting requirements

The production host must provide PHP 8.3+ or a compatible container runtime, MySQL/MariaDB, the `mysqli` extension, HTTPS, secret environment variables and persistent storage for uploaded images. Configure `DB_HOST`, `DB_USER`, `DB_PASSWORD` and `DB_NAME` in the host's secret/environment settings. The default MySQL port is 3306.

The included Dockerfile can be used by a container host. Do not point a live site at an empty database until a backup/restore and acceptance check are complete. Before switching the live domain, validate the home page, registration/login, student material view, admin create/edit/delete, image uploads, contact form, HTTPS and persistence across redeploys.

## Free-hosting warning

Some free hosts sleep, use ephemeral filesystems or expire free databases. Those constraints can delete database rows or uploaded images, so they are not suitable for dependable persistent student records. The connected Render workspace currently has no services/database, the connected Railway workspace has no ShadowSix service, and the available Supabase project belongs to another application and uses PostgreSQL rather than this project's MySQLi schema. Do not reuse that unrelated database.

No production database or hosting resource is provisioned by these repository files alone. A public deployment is complete only after a host and persistent MySQL/MariaDB database are configured and the live routes are verified.
