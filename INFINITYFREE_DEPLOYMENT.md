# ShadowSix on InfinityFree (PHP + MySQL)

## Live deployment status — October 30, 2026

- **Public website:** [https://shadowsix.free.je/](https://shadowsix.free.je/)
- **Hosting:** InfinityFree free shared PHP + MySQL hosting.
- **Database:** MySQL created in the same InfinityFree hosting account.
- **Private connection settings:** `config.local.php` on the server. It is intentionally not tracked by Git.
- **Authentication:** the owner reports successful registration and login testing.
- **Admin:** the owner reports that a separate administrator account can open `/dashboard_admin.php`.
- **Starter content:** the owner imported the 13-subject `shadowsix-starter-materi.sql` package.
- These status points are based on the owner's confirmation. They are not an independent uptime check or security audit.

## Release contents

The GitHub Actions workflow **Package InfinityFree deployment** creates an artifact named `shadowsix-infinityfree-release` containing:

- `shadowsix-infinityfree-site.zip` — PHP website files for `/htdocs`.
- `shadowsix-schema.sql` — schema-only file for a fresh database.
- `shadowsix-starter-materi.sql` — 13 original starter lessons.
- `INFINITYFREE_DEPLOYMENT.md` — this guide.

[Open the packaging workflow runs](https://github.com/ridhorezkyanwar/shadowsix-lms/actions/workflows/package-infinityfree.yml).

## Publishing a code update

A push to GitHub does not upload files to InfinityFree automatically.

1. Push code changes to branch `main`.
2. Wait for **Package InfinityFree deployment** to finish successfully.
3. Download `shadowsix-infinityfree-release` from the successful run.
4. Extract the artifact on your computer.
5. Back up the current website files, MySQL database, and uploaded images.
6. Upload and extract `shadowsix-infinityfree-site.zip` into `/htdocs`.
7. Preserve the production `config.local.php`. Do not replace it with `config.local.php.example`.
8. Do not import `shadowsix.sql` into the existing database during a routine code update; it is for a fresh database.
9. Do not re-import starter content unless needed. Its SQL skips exact subject/title pairs already present, but a backup is still recommended before any SQL import.
10. Test the homepage, login/logout, registration using a test account, admin dashboard, lesson pages, uploads, and contact form.

**Do not upload the ordinary GitHub Code → Download ZIP archive or a raw working copy.** Those include development files. Do not expose `.git`, `.github`, `docker`, `scripts`, `tests`, Docker files, internal documentation, or SQL exports in the public web root.

## Database configuration

The live website uses the MySQL database created in the same InfinityFree hosting account. The application reads settings from `config.local.php` through `config_loader.php`.

The server-side file follows this format; replace the values only inside the hosting File Manager and never commit the real file:

```php
<?php
declare(strict_types=1);

return [
    'DB_HOST' => 'HOST_FROM_INFINITYFREE_PANEL',
    'DB_USER' => 'USERNAME_FROM_INFINITYFREE_PANEL',
    'DB_PASSWORD' => 'PRIVATE_DATABASE_PASSWORD',
    'DB_NAME' => 'FULL_DATABASE_NAME_FROM_PANEL',
    'DB_PORT' => '3306',
    'DB_SSL' => '0',
    'DB_SSL_CA' => '',
];
```

The root `.htaccess` denies direct HTTP access to `config.local.php`. Do not create a public diagnostic page that prints configuration values.

## Schema, starter content, and admin

- `shadowsix.sql` creates the `login`, `materi`, and `kontak` tables on a new/empty database. It contains no real user or lesson records.
- `shadowsix-starter-materi.sql` contains one original introductory lesson for each of the 13 homepage subjects. It changes only the `materi` table and skips matching subject/title pairs already present.
- The administrator account is created by registering normally and then promoting only the owner's account in phpMyAdmin. There is no default admin password.

To inspect the subjects already present, run this read-only SQL in phpMyAdmin:

```sql
SELECT nama_pelajaran, COUNT(*) AS jumlah_materi
FROM materi
GROUP BY nama_pelajaran
ORDER BY nama_pelajaran;
```

After changing an account role, log out and sign in again so the new role is loaded into the session. Do not promote every account.

The 13 starter lessons are introductory content and should be reviewed and expanded to match the actual school curriculum. They are not a complete official syllabus or a restoration of old-host data.

## Health check and backups

- Public health endpoint: [https://shadowsix.free.je/health.php](https://shadowsix.free.je/health.php)
- Expected healthy response: `{"status":"ok"}`.
- Export the MySQL database regularly through phpMyAdmin and store the backup outside `/htdocs` and outside GitHub.
- Back up `uploads/` separately.
- Back up before schema/content imports or bulk SQL operations.

## Troubleshooting

- **Homepage works, but login/register does not:** check `config.local.php`, the `login` table, and database permissions. A working anonymous homepage does not prove all authentication queries work.
- **Invalid form session:** reload the form on the same HTTPS hostname with browser cookies enabled.
- **Registration rejected:** name and email must be valid; password length must be 12–72 bytes.
- **Email already registered:** use that account's password or another email.
- **Login says email/password is incorrect:** confirm the account exists in this database and use the password chosen at registration.
- **Admin dashboard redirects to login:** check that only the intended account's `role` is `admin`, then log out and sign in again.
- Never publish raw database errors, credentials, or PHP configuration values.

## Hosting limitations

InfinityFree is free shared hosting with provider-defined resource, upload, file-size, and fair-use limits. It is suitable for this educational project and light testing, not high-availability or sensitive production workloads. This project has not received an independent security audit.
