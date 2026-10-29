#!/usr/bin/env bash
set -euo pipefail

# Deploy only the PHP application and public assets into this cPanel account.
# This is intentionally non-destructive: it never deletes destination files.
REPO_ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
HOME_DIR="${HOME:-}"
if [[ -z "$HOME_DIR" || ! -d "$HOME_DIR" ]]; then
  echo "ERROR: HOME is not set to a valid cPanel home directory." >&2
  exit 1
fi

DEPLOY_PATH="${HOME_DIR%/}/public_html"
mkdir -p "$DEPLOY_PATH" \
  "$DEPLOY_PATH/uploads/materi" \
  "$DEPLOY_PATH/uploads/mapel"

if ! command -v rsync >/dev/null 2>&1; then
  echo "ERROR: rsync is unavailable on this hosting account; refusing an unsafe fallback copy." >&2
  exit 1
fi

rsync -av \
  --exclude='/.git/' \
  --exclude='/.github/' \
  --exclude='/README*' \
  --exclude='/DEPLOYMENT.md' \
  --exclude='/Dockerfile' \
  --exclude='/.dockerignore' \
  --exclude='/docker-compose.yml' \
  --exclude='/.env' \
  --exclude='/.env.*' \
  --exclude='/config.local.php' \
  --exclude='/config.local.example.php' \
  --exclude='/scripts/' \
  --exclude='/tests/' \
  --exclude='/docker/' \
  --exclude='/*.sql' \
  --exclude='/*.sql.gz' \
  --exclude='/*.dump' \
  --exclude='/*.log' \
  --exclude='/*.bak' \
  --exclude='/*.example' \
  --exclude='/*.html' \
  --exclude='/dist/' \
  --exclude='/.cpanel.yml' \
  --exclude='/*.lock' \
  --exclude='/uploads/materi/***' \
  --exclude='/uploads/mapel/***' \
  "$REPO_ROOT/" "$DEPLOY_PATH/"

test -f "$DEPLOY_PATH/index.php"
test -f "$DEPLOY_PATH/.htaccess"
test -f "$DEPLOY_PATH/config_loader.php"
test -f "$DEPLOY_PATH/uploads/.htaccess"

echo "PASS: ShadowSix application files synced to $DEPLOY_PATH without deleting existing files or uploads."
