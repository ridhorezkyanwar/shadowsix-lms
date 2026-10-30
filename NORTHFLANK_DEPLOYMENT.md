# ShadowSix on Northflank + Aiven MySQL

This guide describes the intended **Developer Sandbox / free allowance** deployment path for the PHP Docker application. Keep all passwords in Northflank's environment-variable/secret UI.

## Verified status — October 30, 2026

- Northflank onboarding was completed with Google Sign-In and the **Developer Sandbox / Free** platform plan.
- **No ShadowSix application service has been created, built, or deployed yet. There is no live public URL.**
- The deployment flow reached GitHub's **Northflank Cloud - Build & Run** app installation page. The pending step is to install it on the personal account `ridhorezkyanwar`, then grant access to **only** `ridhorezkyanwar/shadowsix-lms` if GitHub offers the selected-repositories option. Do not install it on the unrelated `opslogisticstest` organization or grant all-repository access unless separately intended.
- After the GitHub app installation is approved, return to Northflank and select repository `ridhorezkyanwar/shadowsix-lms`, branch `main`, and the root `/Dockerfile`.
- **Free-plan/card information is inconsistent across official pages:** the [pricing page](https://northflank.com/pricing) currently labels Sandbox “No card needed” and advertises 2 free services, 2 free cron jobs, 1 free database, and up to US$20/month of included resources. However, the [billing documentation](https://northflank.com/docs/v1/application/billing/pricing-on-northflank) says all users must add a payment method before creating resources, regardless of plan. Treat the actual message shown in this account's dashboard as decisive. Do not enter payment details without the account owner's explicit approval. The service-creation flow previously opened with a compute choice that was not verified as free; choose only a clearly included Sandbox option and verify its estimate before creating the resource. Usage outside included limits may be billed.

## 1. Connect the repository

1. Open [Northflank](https://app.northflank.com/).
2. Connect GitHub and authorize `ridhorezkyanwar/shadowsix-lms` only.
3. Create a project and a **Combined Service** using repository `ridhorezkyanwar/shadowsix-lms`, branch `main`.
4. Choose Dockerfile build, root Dockerfile `/Dockerfile`, repository root as context.
5. Expose container port `80` as a public HTTP port. Northflank should generate an HTTPS endpoint. Use the service networking section if port auto-detection does not create a public route.
6. Before creating the resource, confirm the compute plan and estimated price are explicitly **US$0**. The Sandbox platform plan has resource limits; do not select a paid compute plan.

## 2. Add the environment variables

Use these exact keys in the **runtime** environment variables/secret settings. Before entering them, check Aiven's current connection details for the service `mysql-1f1668d`; use the actual hostname, port, database and credentials displayed there. Do not assume these example values are correct without comparing them to Aiven's console, and do not put passwords in GitHub.

| Key | Value |
| --- | --- |
| `DB_HOST` | Exact Aiven hostname from the connection details |
| `DB_PORT` | Port shown in Aiven's connection details (previous setup notes listed `26573`; verify before use) |
| `DB_NAME` | Database name shown in Aiven (previous setup notes listed `defaultdb`; verify before use) |
| `DB_USER` | Application database user; create it with least-privilege permissions if it does not exist |
| `DB_PASSWORD` | Strong, unique password for the app database user |
| `DB_SSL` | `1` |
| `DB_SSL_CA` | Empty only if the container's system CA bundle is appropriate for the Aiven connection |
| `DB_BOOTSTRAP_HOST` | Same verified Aiven host as `DB_HOST` |
| `DB_BOOTSTRAP_USER` | Aiven admin/user account permitted to create the app database user and grant permissions (previous notes listed `avnadmin`; verify this) |
| `DB_BOOTSTRAP_PORT` | Same verified connection port as `DB_PORT` |
| `DB_BOOTSTRAP_SSL` | `1` |
| `DB_BOOTSTRAP_SSL_CA` | Empty only if using the container's appropriate system CA bundle |
| `DB_BOOTSTRAP_PASSWORD` | Private password for the bootstrap account from Aiven |
| `SHADOWSIX_AUTO_INIT_SCHEMA` | `1` only for the first deployment to a new, empty database |

The app password is written into MySQL by `scripts/bootstrap_railway.php`; set the same app password in `DB_PASSWORD`. Keep `DB_BOOTSTRAP_PASSWORD` separate and private. The bootstrap script was initially written for Railway MySQL. If Aiven rejects user/grant operations, use Aiven's database/user controls to create an application user with the required least-privilege permissions and then set `SHADOWSIX_AUTO_INIT_SCHEMA=0`. Do not run schema initialization against a database with valuable data without a verified backup.

## 3. Health check and first run

- The image exposes port `80`.
- Set health check path to `/health.php` if available.
- The health endpoint checks a real MySQL connection and returns `{"status":"ok"}` only when the database is reachable.
- Inspect build/runtime logs for errors. Never copy logs containing credentials into an issue or chat.
- Confirm registration/login, material pages, admin permissions, material CRUD, uploads and contact form with test data.

## 4. Limitations

- Aiven Free is 1 GB storage and may power off after inactivity; it is not a high-availability database. Check its current status in Aiven before deploying.
- The application stores uploaded images in the local `uploads/` directory. Without persistent storage/object storage, uploads can be lost on restart or redeploy.
- The SQL file `shadowsix.sql` is schema only; it has no old account rows, materials, messages, or uploaded files.
- Northflank Sandbox currently advertises included free resources, with plan limits; usage beyond its allowance can be billed. Its pricing page and billing documentation conflict about whether a card is required. Follow the actual dashboard prompt and do not add payment details or paid resources without explicit approval.

Official documentation: [Northflank pricing](https://northflank.com/pricing), [Northflank pricing/billing docs](https://northflank.com/docs/v1/application/billing/pricing-on-northflank), [Northflank Git/Docker deployment](https://www.northflank.ai/docs/v1/application/getting-started/build-and-deploy-your-code), [Aiven console](https://console.aiven.io/).
