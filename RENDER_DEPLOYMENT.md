# Render deployment — archived / not used

Render was evaluated as an alternative host for ShadowSix, but it was **not used for the live deployment**.

## Outcome — October 29–30, 2026

- A request to create a Docker web service from `ridhorezkyanwar/shadowsix-lms`, branch `main`, using the Free plan, was rejected by the connected Render account with HTTP 402.
- Render's response stated that payment information was required to complete service creation.
- No Render service, build, deployment, database, or public URL was created from that attempt.
- The user selected a no-card hosting route instead.

The active website is [https://shadowsix.free.je/](https://shadowsix.free.je/) on InfinityFree. See [INFINITYFREE_DEPLOYMENT.md](INFINITYFREE_DEPLOYMENT.md) for current hosting and maintenance instructions.

The repository may retain `render.yaml` as a reference, but it does not indicate that a Render deployment exists. Do not add payment information or select paid compute to follow this archived path.
