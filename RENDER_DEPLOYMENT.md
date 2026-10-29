# ShadowSix on Render (free web service + external MySQL)

This Blueprint describes one free Render web service built from the repository's Dockerfile. It connects to an existing external MySQL-compatible database; it does not create a Render database or persistent disk.

## Current database

Aiven MySQL was created separately and changed to the **Free-1-1gb** tier, which the console confirmed at **US$0/month**. Use the exact connection host and port shown in the Aiven console. Do not paste the password into GitHub.

## Blueprint setup

1. Open the [Render Dashboard](https://dashboard.render.com/), choose **New → Blueprint**, and connect `ridhorezkyanwar/shadowsix-lms` on branch `main`.
2. Review `render.yaml`. The app is configured for the free web plan in Singapore and `/health.php` as health check.
3. Enter the requested environment values only in Render's private form:
   - `DB_HOST`: Aiven MySQL hostname
   - `DB_PORT`: Aiven MySQL port (pre-filled as `26573`)
   - `DB_NAME`: `defaultdb`
   - `DB_USER`: `shadowsix_app`
   - `DB_PASSWORD`: a new strong random password for the application database user
   - `DB_BOOTSTRAP_HOST`: same Aiven hostname
   - `DB_BOOTSTRAP_USER`: `avnadmin`
   - `DB_BOOTSTRAP_PASSWORD`: Aiven's current admin password
4. Keep `DB_SSL=1`. The application verifies the database server certificate using the system CA bundle.
5. Finish the Blueprint setup and wait for the deployment. The Docker entrypoint will run the schema bootstrap; the health endpoint should return `{"status":"ok"}` once the database is reachable.
6. Verify registration/login and database-backed pages using test data.

## Important limitations and account blocker

- **No Render service has been created from this repo yet.** On October 29, 2026, the connected Render account returned HTTP 402 with the message that payment information is required to complete service creation. The Blueprint is committed as configuration, but deployment remains blocked until Render accepts the account's setup.
- The free web service uses an ephemeral filesystem. Uploaded material/subject images may be lost when the service restarts, sleeps, or redeploys. Render's free plan does not support persistent disks.
- The Aiven Free database has 1 GB storage and may power off when inactive. It is suitable for testing/learning, not a high-availability production system.
- Never enter a payment method or select a paid plan unless you have independently decided to accept the charges.
- `shadowsix.sql` is schema only; it does not migrate old user accounts, materials, contact messages or images.
- This project has not undergone an independent security review. Use test data until the application is hardened and tested.

## Official documentation

- [Render free services and limitations](https://render.com/docs/free)
- [Render first deployment](https://render.com/docs/your-first-deploy)
- [Aiven MySQL console](https://console.aiven.io/)
