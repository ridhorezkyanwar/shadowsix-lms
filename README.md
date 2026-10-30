# ShadowSix LMS

ShadowSix is a PHP + MySQL learning-management system for a school competency assessment. It provides subject pages, lesson materials, registration/login, an admin dashboard, material management, and a contact form.

> **Project type:** educational/portfolio project. It has not received an independent security review. Do not store sensitive student records or use it as production-grade school infrastructure without further hardening, testing, and backups.

## Live website

**Published URL:** [https://shadowsix.free.je/](https://shadowsix.free.je/)

**Hosting:** InfinityFree free PHP + MySQL shared hosting.

**Status reported by the site owner — October 30, 2026:**
- The homepage is published and opens at the URL above.
- Registration and login were tested successfully.
- The owner's separate administrator account can access `dashboard_admin.php`.
- The owner imported the 13-subject starter-material SQL package into the InfinityFree database.
- These are owner-confirmed results. The assistant could not independently retrieve the live website during the final documentation update, so no independent uptime or security-audit claim is made.

The production database is the MySQL database created inside the same InfinityFree account. The application reads its connection settings from a private `config.local.php` file on the host. **That file must never be committed to GitHub.** The former Aiven MySQL service is not connected to this website.

## Features

- Browse 13 school subject areas and their lesson materials.
- Register and sign in with hashed passwords.
- Role-based access to the admin material-management area.
- Create, edit, and delete material records.
- Optional material and subject image uploads.
- Contact form backed by MySQL.
- Responsive HTML/CSS interface.

## Technology

- PHP 8.x with MySQLi
- MySQL/MariaDB
- Apache
- HTML, CSS, and JavaScript

## Initial subjects and starter lessons

The first content import includes one original introductory lesson for each subject: Bahasa Indonesia, Bahasa Inggris, DK RPL, Seni Rupa, Coding & AI, Sejarah, PJOK, BK, Pendidikan Agama, PPKN, Matematika, IPAS, and Informatika.

- [Starter material SQL](shadowsix-starter-materi.sql)
- [InfinityFree deployment and maintenance guide](INFINITYFREE_DEPLOYMENT.md)

The starter material is a foundation, not a complete official syllabus or a restoration of previous-host content. Review and expand it for the school's curriculum. The starter SQL inserts only into `materi`, does not alter accounts or roles, and skips exact subject/title pairs already present.

## Deployment and updates

The active host is InfinityFree. This is **shared PHP hosting**, so it runs the PHP files directly and does not use the repository's Dockerfile.

The GitHub Actions workflow **Package InfinityFree deployment** builds a release artifact containing:
- `shadowsix-infinityfree-site.zip`: website files only.
- `shadowsix-schema.sql`: schema for a fresh database.
- `shadowsix-starter-materi.sql`: 13 original starter lessons.
- `INFINITYFREE_DEPLOYMENT.md`: hosting instructions.

[Open the packaging workflow runs](https://github.com/ridhorezkyanwar/shadowsix-lms/actions/workflows/package-infinityfree.yml).

**GitHub pushes do not automatically upload files to InfinityFree.** To publish a code update, download the latest successful artifact and upload/extract the website ZIP to `/htdocs`, taking a backup first. Preserve the private `config.local.php`, database contents, and user-uploaded images. Never upload GitHub's raw repository ZIP or expose the `.git` folder in the web root.

## Database and secret handling

- `shadowsix.sql` is schema-only; it contains no user accounts, passwords, contact messages, or lesson rows.
- `shadowsix-starter-materi.sql` contains 13 introductory lessons and no user credentials.
- The live database connection is configured through private `config.local.php` on InfinityFree.
- Never commit `config.local.php`, database passwords, exports, user records, password hashes, or contact messages.
- Keep separate backups of the MySQL database and uploaded files.

## Project structure

```text
.
├── index.php                    # Home and subject overview
├── login.php                    # Sign-in
├── register.php                 # Account registration
├── dashboard_admin.php          # Admin material list
├── tambah_materi.php            # Create a material
├── edit_materi.php              # Update a material
├── hapus_materi.php             # Delete a material
├── view_materi.php              # Material details
├── databasecpnel.php            # Shared database connection
├── config_loader.php            # Loads private DB settings
├── config.local.php.example     # Safe shared-hosting template
├── shadowsix.sql                # Schema only
├── shadowsix-starter-materi.sql  # 13 starter lessons
├── INFINITYFREE_DEPLOYMENT.md
├── kontak/                      # Contact page and stylesheet
├── materi-*/                    # Subject/chapter pages
└── img/                         # Subject images
```

## Local development with Docker Compose

The repository also includes a PHP/Apache Docker runtime and MariaDB for local development.

1. Install Docker Engine and the Compose plugin.
2. Copy `.env.example` to `.env`.
3. Replace both example passwords in `.env` with different random values; do not commit `.env`.
4. Run:

   ```sh
   docker compose up --build -d
   ```

5. Open `http://127.0.0.1:8080`. Check `docker compose ps` or `http://127.0.0.1:8080/health.php`.

MariaDB imports `shadowsix.sql` on first startup. The named `db_data` and `uploads_data` volumes preserve local records and uploaded images across rebuilds. The schema does not create an administrator account. For local testing, register your own account and assign the admin role only to that account in your development database.

To stop services while preserving data, use `docker compose down`. Do not use `docker compose down -v` unless permanent deletion is intended.

## Local development with XAMPP

1. Clone this repository into `xampp/htdocs/shadowsix-lms`.
2. Start Apache and MySQL/MariaDB.
3. Create an empty database named `shadowsix` in phpMyAdmin.
4. Import `shadowsix.sql`; optionally import `shadowsix-starter-materi.sql` to populate the 13 initial lessons.
5. Configure local database settings using your development setup. Never copy production credentials into a local file or commit secrets.

## CI and release artifacts

GitHub Actions checks PHP syntax, schema and application behavior, runs the Docker/MariaDB smoke test, and packages the InfinityFree release. CI success verifies repository code and packaging only; it does not prove that the live hosting account, production database, or public website is healthy.

## Hosting history

- **InfinityFree:** active shared PHP/MySQL host for the published site.
- **Northflank:** not used; the account's service-creation form required payment-card verification.
- **Render:** not used; the connected account's service-creation request returned HTTP 402 requiring payment information.
- **Aiven:** not connected to the live InfinityFree website.
- **PHP.ID:** not used.

See [DEPLOYMENT.md](DEPLOYMENT.md) for the current deployment summary and [INFINITYFREE_DEPLOYMENT.md](INFINITYFREE_DEPLOYMENT.md) for publishing and backup procedures.
