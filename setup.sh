#!/bin/bash

# MediaWiki Setup Script
cd /var/www/html

# Check if database is already set up
if [ ! -f "LocalSettings.php.bak" ]; then
    echo "Running MediaWiki installer..."
    
    # Run the installer
    php maintenance/install.php \
        --dbtype=postgres \
        --dbserver="${DB_SERVER}" \
        --dbport="${DB_PORT}" \
        --dbname="${DB_NAME}" \
        --dbuser="${DB_USER}" \
        --dbpass="${DB_PASSWORD}" \
        --scriptpath="" \
        --lang=en \
        --pass=admin123 \
        "My Company Wiki" \
        "Admin"
    
    # Backup the generated LocalSettings.php
    cp LocalSettings.php LocalSettings.php.generated
    echo "Installer completed!"
fi

# Start Apache
exec apache2-foreground
