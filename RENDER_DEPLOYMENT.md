# ShadowSix on Render (full stack)

This repository now includes `render.yaml`, a Render Blueprint for the complete PHP + MySQL stack.

## Resources created by the Blueprint

- **`shadowsix-app`**: PHP 8.3 + Apache built from this repository's `Dockerfile`; public HTTPS web service; health check at `/health.php`.
- **`shadowsix-db`**: private MySQL 8 service based on the official `render-examples/mysql` template. It is not exposed directly to the public internet.
- **Database disk**: 10 GB at `/var/lib/mysql`, so database files survive service restarts and deployments.
- **Uploads disk**: 1 GB at `/var/www/html/uploads`, so uploaded material/subject images survive app deployments.
- **Database bootstrap**: the app's entrypoint runs the schema-only `shadowsix.sql` against a fresh database, creates a dedicated app user with CRUD permissions, and retries startup while MySQL becomes ready. Render generates the DB passwords; no credentials are stored in Git.

Both services use the Singapore region to keep the app and database together and close to Indonesian users.

## Launch it

1. Open the [Render Dashboard](https://dashboard.render.com/).
2. Choose **New → Blueprint** and connect the GitHub repository `ridhorezkyanwar/shadowsix-lms`, branch `main`.
3. Review `render.yaml`: it creates two paid Starter compute services and two persistent disks. Apply it only after confirming the estimated charges in Render.
4. Wait until `shadowsix-app` is deployed and `/health.php` returns `{"status":"ok"}`.
5. Smoke-test the home page, registration/login, reading materials, admin authorization, material create/edit/delete, uploads, and the contact form using test data.

The repository update alone does not create Render resources. A first-time Blueprint must be created in the Render Dashboard. After the Blueprint is connected, application pushes to `main` can auto-deploy the app service; the MySQL service has auto-deploy disabled to avoid unnecessary database-image updates.

## Estimated minimum recurring cost

Using Render's currently published prices as of October 29, 2026:

- App Starter compute: about **US$7/month**
- MySQL Starter compute: about **US$7/month**
- MySQL disk, 10 GB × US$0.25/GB-month: about **US$2.50/month**
- Upload disk, 1 GB × US$0.25/GB-month: about **US$0.25/month**

**Estimated total: US$16.75/month**, before bandwidth overages, taxes, or any other account-level charges. Check the current [Render pricing page](https://render.com/pricing) before applying the Blueprint. Persistent disks require a paid service plan; this design intentionally does not use ephemeral storage for database files or uploads.

## Database/data migration notes

`shadowsix.sql` is a **schema-only** file. The Blueprint initializes empty `login`, `materi`, and `kontak` tables; it does not recover existing user accounts, passwords, course materials, contact messages, or uploaded files from a former host. If existing data must be preserved, export it from the original host and plan a reviewed migration/restore before directing users to the new site. Do not import a schema over a non-empty database without a verified backup.

This project is an educational/portfolio prototype and has not undergone an independent security review. Use test data until production hardening, backups, and application security testing are complete.
