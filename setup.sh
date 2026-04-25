#!/bin/bash

set -euo pipefail

# MediaWiki Setup Script
cd /var/www/html

# Require admin credentials from environment
: "${ADMIN_USER:?ADMIN_USER is required}"
: "${ADMIN_PASS:?ADMIN_PASS is required}"

# Check if database is already set up
if [ ! -f "/var/www/html/.mw-installed" ]; then
    echo "Running MediaWiki installer..."

    php maintenance/install.php \
        --dbtype=postgres \
        --dbserver="${DB_SERVER}" \
        --dbport="${DB_PORT:-5432}" \
        --dbname="${DB_NAME}" \
        --dbuser="${DB_USER}" \
        --dbpass="${DB_PASSWORD}" \
        --scriptpath="" \
        --lang=en \
        --pass="${ADMIN_PASS}" \
        "My Company Wiki" \
        "${ADMIN_USER}"

    # Mark install complete
    touch /var/www/html/.mw-installed
    echo "Installer completed successfully."
fi

# Start Apache
exec apache2-foreground
