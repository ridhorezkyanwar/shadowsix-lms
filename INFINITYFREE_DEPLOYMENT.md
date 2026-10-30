# InfinityFree deployment guide (PHP + MySQL)

This guide deploys the existing PHP/MySQL app to a new shared-hosting account. It does not migrate data from the deleted host and does not invent an admin account. The committed `shadowsix.sql` is schema-only.

## 1. Create a hosting account

1. Open [InfinityFree signup](https://dash.infinityfree.com/register) and sign in or register using your own account.
2. Create a new hosting account/site and choose an available free subdomain. Keep the account owner email under your control.
3. Open its control panel. Confirm PHP 8.x and MySQL/MariaDB are available.

The app is not live until a hosting account has been created and the files below are uploaded to that account.

InfinityFree advertises free PHP + MySQL hosting, SSL and a free subdomain without a credit card. Its current homepage advertises PHP 8.4, MySQL 8.0 / MariaDB 11.4 and 5 GB disk; confirm the actual PHP version in your account's control panel. This is shared PHP hosting, not a Docker service.

## 2. Create a clean database

1. In the hosting control panel, open MySQL Databases and create a new database and database user if the panel offers separate creation steps.
2. Record the exact database host, database name, username, and password displayed by the host. InfinityFree may prefix the database and username; copy the complete values instead of guessing them.
3. Use this local InfinityFree database for the website. Do not use the separate Aiven MySQL server on this free hosting plan: InfinityFree blocks outbound connections to remote MySQL ports, so the PHP application cannot connect to Aiven over its MySQL port.
3. Open phpMyAdmin for that database, select the newly created empty database, and import the separate `shadowsix-schema.sql` file from the deployment artifact.
4. Confirm that the `login`, `materi`, and `kontak` tables exist.

Do not import the schema into an existing database with valuable data. The schema does not include existing users, hashed passwords, contact messages, or material records.

## 3. Upload the website

1. Download the deployment artifact produced by the GitHub Actions workflow named **Package InfinityFree deployment**.
2. Extract `shadowsix-infinityfree-site.zip` on your computer.
3. Upload the ZIP to the hosting account and extract it into the website document root (usually `htdocs`), or upload the ZIP contents with the file manager/FTP client.
4. Make sure `index.php`, `.htaccess`, `config_loader.php`, and the `uploads`, `img`, and subject folders sit directly in the document root—not inside an additional nested folder.
5. The package excludes the schema dump, Docker files, CI workflows, tests, and database exports from the public web root. Keep the separate schema file outside the document root.

## 4. Set private database configuration

In the document root, copy `config.local.php.example` to `config.local.php` using the hosting file manager. Edit the new `config.local.php` and fill the values from step 2:

- `DB_HOST`: the exact database host shown in the control panel.
- `DB_USER`: full database username.
- `DB_PASSWORD`: database password.
- `DB_NAME`: full database name.
- `DB_PORT`: normally `3306`.
- `DB_SSL`: leave `0` unless the provider explicitly requires TLS.

Never commit or share the real `config.local.php`. Root `.htaccess` blocks HTTP access to the configuration file, documentation, schema dumps, dotfiles, and internal tooling.

## 5. Bootstrap and verify the administrator

1. Open the new website URL over HTTPS.
2. Register a normal account using your own test email.
3. In phpMyAdmin, run the following only after replacing the email with the exact email of the account you just registered:

   ```sql
   UPDATE login SET role = 'admin' WHERE email = 'YOUR_OWN_REGISTERED_EMAIL';
   ```

4. Sign out and back in. Verify that only your intended account shows the admin dashboard.

The project does not seed an administrator or default password intentionally. Do not use a public demo password.

## 6. Smoke tests before calling it live

- Home page loads over HTTPS without PHP warnings or database details in the response.
- `/health.php` returns `{"status":"ok"}` when the database is reachable.
- Registration, login, logout, subject pages, and material viewing work.
- Admin create/edit/delete works with a test material.
- Upload a harmless JPG/PNG/GIF test image; verify that executable/script files cannot run from `uploads`.
- Contact form stores a test message.
- Refresh/reopen the site and verify test records and uploaded images remain present.

If any test fails, inspect host error logs and the database values configured in `config.local.php`; do not paste passwords into GitHub issues or chat.

## Status and limitations

This is a free shared-hosting deployment target for a school/portfolio project. Free hosting can impose resource, email, backup, and support limits. The current application is an educational project and has not had an independent security review; do not store sensitive student data or treat this as production-grade school infrastructure.

The old hosting environment was removed, and no old database credentials or production records are available in this repository. A live site and database must be confirmed on the new hosting account after upload and the smoke tests above.


## Important: do not upload the raw Git repository

Do **not** use GitHub's ordinary **Code → Download ZIP** archive or upload a complete checked-out repository directly into `/htdocs`. That archive contains development-only content such as `.git`, `.github`, Docker files, scripts, tests, and internal documentation. It is not the shared-hosting release package.

Use only the GitHub Actions artifact named `shadowsix-infinityfree-release` from the successful **Package InfinityFree deployment** workflow:
[Open the workflow runs](https://github.com/ridhorezkyanwar/shadowsix-lms/actions/workflows/package-infinityfree.yml).

The artifact contains:
- `shadowsix-infinityfree-site.zip` — the selected PHP website files for `/htdocs`.
- `shadowsix-schema.sql` — schema-only SQL to import through phpMyAdmin, kept outside the public web root.
- `INFINITYFREE_DEPLOYMENT.md` — this guide.

If the raw repository has already been uploaded into `/htdocs`, download a backup first if there are any files you changed manually. Then remove the uploaded `.git` directory immediately because repository history should not be exposed from a public web root. Remove other development-only folders such as `.github`, `docker`, `scripts`, and `tests`, as well as root Docker and documentation files, before extracting the release ZIP directly into `/htdocs`. Do not remove application folders such as `img`, `kontak`, or the subject/material directories; these are included in the release ZIP.

The site ZIP intentionally does not contain the active `config.local.php`. Create it on the hosting account by copying `config.local.php.example` to `config.local.php` and entering the private MySQL values from the InfinityFree control panel.
