# ShadowSix deployment guide

ShadowSix is a PHP 8.3 + Apache application using MySQLi. It is **not a static website**. Do not deploy it to PHP.ID; the repository's PHP.ID-specific workflow is being retired.

## Current cloud resources and deployment status

- **MySQL:** Aiven MySQL service `mysql-1f1668d` was previously reported as switched to **Free-1-1gb** and Running, with 1 GB storage and possible automatic power-off after inactivity. Verify its current status and connection settings in the Aiven console before using it.
- **Application:** **not yet live**. No Northflank application service has been created and there is no public application URL. Render service creation was blocked by that account requiring payment information.
- **Northflank setup:** onboarding completed with Google Sign-In, and the **Developer Sandbox / Free** platform plan was selected. The flow reached GitHub's Northflank Cloud - Build & Run app installation page, but the install authorization and repository selection are not yet complete. The intended repository is `ridhorezkyanwar/shadowsix-lms`, branch `main`.
- **Next required step:** in GitHub, install the Northflank Cloud - Build & Run app on the personal `ridhorezkyanwar` account and grant it access to only `ridhorezkyanwar/shadowsix-lms` if GitHub offers selected-repository access. Do not install it on the unrelated `opslogisticstest` organization or grant access to all repositories unless separately intended.
- **Free-plan/card status is inconsistent across official pages:** the [pricing page](https://northflank.com/pricing) currently advertises Sandbox as “No card needed”, with 2 free services, 2 free cron jobs, 1 free database and up to US$20/month of included resources. However, the [billing documentation](https://northflank.com/docs/v1/application/billing/pricing-on-northflank) says all users must add a payment method before creating resources. The account dashboard's actual prompt must resolve this discrepancy. Do not enter payment details without explicit approval. The service-creation flow previously opened with a compute choice that was not confirmed to be free; choose only a clearly included Sandbox resource and verify its estimate. Usage beyond included limits may be billed.
- **Credentials:** use the hosting provider's environment variables/secrets page. Never commit actual database passwords, private configuration, user data, or database dumps.

## Northflank: Docker deployment

The app includes a root-level Dockerfile, exposes port 80, and has `/health.php` for health checking.

1. Finish the GitHub App install described above, granting access only to `ridhorezkyanwar/shadowsix-lms` if available.
2. In Northflank, create a project, then create a **Combined Service** from GitHub.
3. Select repository `ridhorezkyanwar/shadowsix-lms`, branch `main`, Dockerfile build, Dockerfile path `/Dockerfile`, and Docker context `/` (repository root).
4. Expose port `80` over HTTP and mark it **Public** to get an HTTPS endpoint.
5. Before creating the service, verify the selected compute resource and estimated total price are explicitly **US$0**. Do not select paid compute.
6. Set the environment variables from the table in [NORTHFLANK_DEPLOYMENT.md](NORTHFLANK_DEPLOYMENT.md), verifying the actual database endpoint, port, username and database name in the Aiven console. Use a unique random application password. Do not paste secrets into GitHub, issues, logs, or chat.
7. Set a health check path of `/health.php` if the service setup exposes that setting.
8. Only after the connection settings and free-price check are confirmed, start deployment. The startup script initializes a fresh schema when `SHADOWSIX_AUTO_INIT_SCHEMA=1`. Do not run schema initialization against a database with valuable data without a verified backup.
9. After deployment, wait for image build/runtime completion. Open the actual public endpoint and verify `/health.php`, home page, registration/login, materials, admin permission, create/edit/delete, uploads, and contact form with test data. Do not describe the app as live until these checks pass.

Northflank's pricing and billing references: [pricing](https://northflank.com/pricing) and [billing documentation](https://northflank.com/docs/v1/application/billing/pricing-on-northflank). These official pages currently conflict about whether a payment method is needed for Sandbox. The dashboard prompt for the account determines the next step. Do not add payment details without explicit approval; keep usage within included limits to target US$0 hosting cost.

## Required environment variables

Verify the hostname, port, database name, and user against Aiven's current connection details before deploying. Previous setup notes listed `26573` for the port and `defaultdb` for the database; do not assume these values are correct without checking the console.

| Variable | Value |
| --- | --- |
| `DB_HOST` | Exact host from Aiven's connection details |
| `DB_PORT` | Exact port from Aiven's connection details |
| `DB_NAME` | Exact database name shown by Aiven |
| `DB_USER` | Application database user with least-privilege access |
| `DB_PASSWORD` | New strong random password for the app user |
| `DB_SSL` | `1` |
| `DB_SSL_CA` | Use the system CA bundle only if appropriate for the Aiven connection |
| `DB_BOOTSTRAP_HOST` | Same verified Aiven host as `DB_HOST` |
| `DB_BOOTSTRAP_USER` | Aiven account with permission to create/grant the app user (previous notes listed `avnadmin`; verify this) |
| `DB_BOOTSTRAP_PORT` | Same verified port as `DB_PORT` |
| `DB_BOOTSTRAP_SSL` | `1` |
| `DB_BOOTSTRAP_SSL_CA` | Use the system CA bundle only if appropriate for the Aiven connection |
| `DB_BOOTSTRAP_PASSWORD` | Private password for the bootstrap account from Aiven |
| `SHADOWSIX_AUTO_INIT_SCHEMA` | `1` for first initialization of a new, empty database only |

The bootstrap script uses separate bootstrap connection settings and TLS options, is designed to be rerunnable, and validates the required columns. If Aiven's admin account does not permit user/grant operations, startup may fail; use the provider console to provision a least-privilege app user instead. Do not expose the admin password in logs or to the public.

## Free-tier behavior and uploads

The Aiven Free tier has 1 GB storage and may automatically power off when inactive; confirm current status and usage in Aiven. Northflank Sandbox includes free resources within account limits, but official pricing and billing pages conflict about whether a payment method is needed. Monitor usage and do not add payment details without explicit approval. Uploaded images are written to the app's local `uploads/` directory; unless persistent storage or object storage is configured, files may be lost on restart/redeploy. Do not rely on local uploads for important data until persistent storage is configured.

The SQL file `shadowsix.sql` is **schema-only**. It does not restore previous accounts, materials, contact messages or uploaded files from any old host. Create test data only until a verified backup/migration exists.

## Render fallback

The repository also includes [`render.yaml`](render.yaml) for a free Render web service plus external MySQL. On October 29, 2026, service creation was rejected by the connected Render account with HTTP 402 because payment information was required. No Render service exists from that attempt. The [Render-specific guide](RENDER_DEPLOYMENT.md) documents that alternative.

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
