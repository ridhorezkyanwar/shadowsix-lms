# ShadowSix deployment guide

ShadowSix is a PHP 8.3 + Apache application using MySQLi. It is **not a static website**. Do not deploy it to PHP.ID; the repository's PHP.ID-specific workflow is being retired.

## Current cloud resources

- **MySQL:** Aiven MySQL service `mysql-1f1668d`, changed to **Free-1-1gb** and confirmed Running. The console showed US$0/month, 1 GB storage, and automatic power-off after inactivity.
- **Application:** not yet live. Render service creation was blocked by that account requiring payment information. The preferred no-card route is Northflank Sandbox; follow [NORTHFLANK_DEPLOYMENT.md](NORTHFLANK_DEPLOYMENT.md) after connecting the account.
- **Credentials:** use the hosting provider's environment variables/secrets page. Never commit actual database passwords, private configuration, user data, or database dumps.

## Northflank: Docker deployment

Use the Northflank web dashboard. The app already includes a root-level Dockerfile, exposes port 80, and has `/health.php` for health checking.

1. Connect your GitHub account to Northflank and authorize the repository `ridhorezkyanwar/shadowsix-lms`.
2. Create a project, then create a **Combined Service** from GitHub.
3. Select repository `ridhorezkyanwar/shadowsix-lms`, branch `main`, Dockerfile build, Dockerfile path `/Dockerfile`, and Docker context `/` (repository root).
4. Expose port `80` over HTTP and mark it **Public** to get an HTTPS endpoint.
5. Set the environment variables from the table in [NORTHFLANK_DEPLOYMENT.md](NORTHFLANK_DEPLOYMENT.md), using a unique random application password. Do not paste secrets into GitHub, issues, logs, or chat.
6. Set a health check path of `/health.php` if the service setup exposes that setting.
7. Start the deployment and wait for the image build and runtime to complete. The startup script initializes a fresh schema when `SHADOWSIX_AUTO_INIT_SCHEMA=1`. Check logs if the app does not become healthy.
8. Open the public endpoint and verify `/health.php`, home page, registration/login, materials, admin permission, create/edit/delete, uploads, and contact form with test data.

Northflank's Sandbox plan advertises no card requirement and up to US$20/month of resource usage. Confirm the actual resource/usage estimate in the dashboard before creating the service; the free sandbox has resource limits. See [Northflank pricing](https://northflank.com/pricing) and [Docker/Git deployment guide](https://www.northflank.ai/docs/v1/application/getting-started/build-and-deploy-your-code).

## Required environment variables

| Variable | Value |
| --- | --- |
| `DB_HOST` | Exact host from Aiven's connection details |
| `DB_PORT` | `26573` |
| `DB_NAME` | `defaultdb` |
| `DB_USER` | `shadowsix_app` |
| `DB_PASSWORD` | New strong random password for the app user |
| `DB_SSL` | `1` |
| `DB_SSL_CA` | Leave empty to use the container's system CA bundle |
| `DB_BOOTSTRAP_HOST` | Same exact Aiven host as `DB_HOST` |
| `DB_BOOTSTRAP_USER` | `avnadmin` |
| `DB_BOOTSTRAP_PORT` | `26573` |
| `DB_BOOTSTRAP_SSL` | `1` |
| `DB_BOOTSTRAP_SSL_CA` | Empty string to use the system CA bundle |
| `DB_BOOTSTRAP_PASSWORD` | Current Aiven admin password from Aiven console |
| `SHADOWSIX_AUTO_INIT_SCHEMA` | `1` for first deployment so the startup script creates schema and grants the app account |

The bootstrap script uses the separate bootstrap port and verified TLS settings, is designed to be rerunnable and validates the required columns. If Aiven's admin account does not permit the user/grant operations, startup will fail safely; inspect provider logs and provision a least-privilege app user through the database provider console instead. Do not expose the admin password in logs or to the public.

## Free-tier behavior and uploads

The Aiven Free tier is 1 GB and may automatically power off when inactive. Northflank Sandbox has limited compute resources. Uploaded images are written to the app's local `uploads/` directory; unless a persistent volume or object store is configured, files may be lost on restart/redeploy. Do not rely on local uploads for important data until persistent storage is configured.

The SQL file `shadowsix.sql` is **schema-only**. It does not restore previous accounts, materials, contact messages or uploaded files from any old host. Create test data only until a verified backup/migration exists.

## Render fallback

The repository also includes [`render.yaml`](render.yaml) for a free Render web service plus external MySQL. On October 29, 2026, service creation was rejected by the connected Render account with HTTP 402 because payment information was required. No Render service exists from this attempt. The [Render-specific guide](RENDER_DEPLOYMENT.md) documents that alternative.

## Local Docker Compose

Requirements: Docker Engine and Docker Compose plugin.

1. Copy `.env.example` to `.env`.
2. Replace `DB_PASSWORD` and `DB_ROOT_PASSWORD` with different random values. Never commit `.env`.
3. Run:

   ```sh
   docker compose up --build -d
   ```

4. Open `http://127.0.0.1:8080`. MariaDB imports the schema into a new database volume on first startup.
5. Check `docker compose ps` or `http://127.0.0.1:8080/health.php`.

Named volumes `db_data` and `uploads_data` preserve local data across container rebuilds. `docker compose down` preserves volumes; `docker compose down -v` permanently deletes them.

## Safety and production readiness

- The repository has not had an independent security review. Do not use real student records until access control, rate limiting, upload security, session settings, backups and application flows have been reviewed.
- The schema does not create an administrator account. Register a test account and explicitly grant the admin role only to your own account in a database you control.
- Take a verified backup before any schema operation on a database with valuable data. The schema is for a fresh database and is not a migration.
