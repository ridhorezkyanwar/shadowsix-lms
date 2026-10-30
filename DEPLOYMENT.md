# ShadowSix deployment and maintenance

ShadowSix is a PHP + MySQL application. Its active deployment is InfinityFree shared hosting; the host runs PHP directly and does not run the repository's Dockerfile.

## Current deployed site

- **Public URL:** https://shadowsix.free.je/
- **Host:** InfinityFree free PHP + MySQL shared hosting.
- **Database:** MySQL created inside the same InfinityFree hosting account.
- **Connection settings:** private `config.local.php` in the hosting document root. Never commit it or copy its password into GitHub.
- **Admin:** the owner created a separate admin account by registering normally and promoting only that account's `login.role` to `admin`.
- **Learning content:** the owner imported `shadowsix-starter-materi.sql`, the 13-subject starter set.

The site owner reported that the homepage, registration/login, admin dashboard, and initial material import were working on October 30, 2026. This status is based on the owner's confirmation, not an independent external uptime or security audit.

## Publishing code updates to the live site

A GitHub push triggers CI and the packaging workflow, but it does **not** directly upload files to InfinityFree.

1. Push the code change to `main`.
2. Wait for **Package InfinityFree deployment** to complete successfully: [GitHub Actions](https://github.com/ridhorezkyanwar/shadowsix-lms/actions/workflows/package-infinityfree.yml).
3. Download the latest `shadowsix-infinityfree-release` artifact and extract it on your computer.
4. Back up the live website files, database, and uploaded images before replacing anything.
5. Extract `shadowsix-infinityfree-site.zip` into `/htdocs`.
6. **Preserve** the live `config.local.php`, the MySQL database, and existing user uploads. Do not replace them with example configuration or an empty database.
7. Test the public homepage, login/logout, registration using a test account, admin dashboard, material pages, uploads, and contact form.

Do not upload the ordinary GitHub **Code → Download ZIP** archive or a raw Git working directory into `/htdocs`. Use the filtered release artifact only. Never expose `.git`, `.github`, Docker, test, script, or database-export files in the public document root.

## Database and content

The live application uses MySQL hosted by the same InfinityFree account. The former Aiven MySQL instance is not connected to the live website.

Repository SQL files:
- `shadowsix.sql`: schema only for a fresh database; no accounts or lessons.
- `shadowsix-starter-materi.sql`: 13 original introductory lessons. It inserts into `materi` only, does not modify accounts/roles, and skips an exact subject/title pair already present.

The initial subjects are Bahasa Indonesia, Bahasa Inggris, DK RPL, Seni Rupa, Coding & AI, Sejarah, PJOK, BK, Pendidikan Agama, PPKN, Matematika, IPAS, and Informatika.

The admin account is not seeded into SQL. The owner created it by registering normally and updating only that account's `login.role` to `admin`. Do not promote all users. After changing a role, log out and log in again because the role is copied into the session at sign-in.

## Private database configuration

InfinityFree database values are stored only in the host's private `config.local.php`. The repository includes `config.local.php.example` as a template. Do not commit the live configuration or password. The root `.htaccess` denies direct HTTP access to the real config file.

Database health endpoint:

`https://shadowsix.free.je/health.php`

Expected healthy response:

```json
{"status":"ok"}
```

Do not publish a diagnostic page that prints credentials, connection errors, SQL, or account information.

## Backups and free-host limits

- Export the MySQL database regularly through phpMyAdmin and store the backup outside `/htdocs` and outside GitHub.
- Back up `uploads/` separately if uploaded images matter.
- Before importing schema or running bulk SQL, export a database backup.
- Keep `config.local.php` private.
- InfinityFree free hosting has provider-defined resource, upload, file-size, and fair-use limits. Do not treat it as high-availability infrastructure.
- This project has not undergone an independent security audit. Avoid sensitive student data until access control, upload restrictions, session settings, backups, and application flows have been reviewed.

## Alternative hosts not used

- **Northflank:** not deployed. The account's create-service form required payment-card verification; the user chose not to provide a card.
- **Render:** not deployed. The connected account's create-service request returned HTTP 402 requiring payment information.
- **Aiven:** not connected to this website.
- **PHP.ID:** not used.

## Local Docker Compose

For local testing only:

1. Copy `.env.example` to `.env`.
2. Use different random values for `DB_PASSWORD` and `DB_ROOT_PASSWORD`.
3. Run `docker compose up --build -d`.
4. Open `http://127.0.0.1:8080`.

Named volumes `db_data` and `uploads_data` preserve local data. `docker compose down` preserves them; `docker compose down -v` deletes them.
