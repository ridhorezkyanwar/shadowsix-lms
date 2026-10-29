# ShadowSix on Northflank + Aiven MySQL

This is the no-card deployment path prepared for the PHP Docker application. Keep all passwords in Northflank's environment-variable/secret UI.

## 1. Connect the repository

1. Open [Northflank](https://app.northflank.com/).
2. Connect GitHub and authorize `ridhorezkyanwar/shadowsix-lms`.
3. Create a project and a **Combined Service** using repository `ridhorezkyanwar/shadowsix-lms`, branch `main`.
4. Choose Dockerfile build, root Dockerfile `/Dockerfile`, repository root as context.
5. Expose container port `80` as a public HTTP port. Northflank should generate an HTTPS endpoint. Use the service networking section if port auto-detection does not create a public route.
6. Choose the smallest available Sandbox resource allocation that supports the PHP/Apache container. The pricing page currently advertises a free Sandbox with no card and up to US$20/month resource usage; verify the actual usage shown before creating resources.

## 2. Add the environment variables

Use these exact keys in the **runtime** environment variables/secret settings. Use the host shown for Aiven service `mysql-1f1668d`; do not put passwords in GitHub.

| Key | Value |
| --- | --- |
| `DB_HOST` | Aiven service hostname from the connection details |
| `DB_PORT` | `26573` |
| `DB_NAME` | `defaultdb` |
| `DB_USER` | `shadowsix_app` |
| `DB_PASSWORD` | Create a unique random password for the app DB user |
| `DB_SSL` | `1` |
| `DB_SSL_CA` | Empty string, allowing the system CA bundle |
| `DB_BOOTSTRAP_HOST` | Same Aiven host as `DB_HOST` |
| `DB_BOOTSTRAP_USER` | `avnadmin` |
| `DB_BOOTSTRAP_PORT` | `26573` |
| `DB_BOOTSTRAP_SSL` | `1` |
| `DB_BOOTSTRAP_SSL_CA` | Empty string, allowing the system CA bundle |
| `DB_BOOTSTRAP_PASSWORD` | Admin password currently shown in Aiven |
| `SHADOWSIX_AUTO_INIT_SCHEMA` | `1` during the first deployment to initialize a new empty database |

The app password is written into MySQL by `scripts/bootstrap_railway.php`; set the same app password in `DB_PASSWORD`. Keep `DB_BOOTSTRAP_PASSWORD` separate and private. The bootstrap gives the app account CRUD permissions only on the configured database. The script was initially written for Railway MySQL; if Aiven rejects the user/grant operations, use Aiven's database/user controls to create `shadowsix_app` with required permissions and then set `SHADOWSIX_AUTO_INIT_SCHEMA=0`.

## 3. Health check and first run

- The image exposes port `80`.
- Set health check path to `/health.php` if available.
- The health endpoint checks a real MySQL connection and returns `{"status":"ok"}` only when the database is reachable.
- Inspect build/runtime logs for errors. Never copy logs containing credentials into an issue or chat.
- Confirm registration/login, material pages, admin permissions, material CRUD, uploads and contact form with test data.

## 4. Limitations

- Aiven Free is 1 GB storage and may power off after inactivity; it is not a high-availability database.
- The application stores uploaded images in the local `uploads/` directory. Without persistent storage/object storage, uploads can be lost on restart or redeploy.
- The SQL file `shadowsix.sql` is schema only; it has no old account rows, materials, messages, or uploaded files.
- Northflank Sandbox has resource ceilings; verify usage/limits in the dashboard. Do not add paid resources without reviewing the price.

Official documentation: [Northflank pricing](https://northflank.com/pricing), [Northflank Git/Docker deployment](https://www.northflank.ai/docs/v1/application/getting-started/build-and-deploy-your-code), [Aiven console](https://console.aiven.io/).
