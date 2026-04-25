<?php
// MediaWiki 1.39 Configuration File

// Site name and namespace
$wgSitename = "My Company Wiki";
$wgMetaNamespace = "Project";

// Database configuration
$wgDBtype = "mysql";
$wgDBserver = getenv('DB_SERVER') ?: "localhost";
$wgDBname = getenv('DB_NAME') ?: "mediawiki";
$wgDBuser = getenv('DB_USER') ?: "mediawiki";
$wgDBpassword = getenv('DB_PASSWORD') ?: "password";
$wgDBprefix = "";

// URL configuration
$wgScriptPath = "";
$wgArticlePath = "/wiki/$1";
$wgUsePathInfo = true;

// Logo
$wgLogo = "$wgResourceBasePath/resources/assets/wiki.png";

// Language
$wgLanguageCode = "en";

// Timezone
date_default_timezone_set('UTC');

// Email configuration
$wgEnableEmail = true;
$wgEnableUserEmail = true;
$wgEmergencyContact = "admin@example.com";
$wgPasswordSender = "noreply@example.com";

// File uploads
$wgEnableUploads = true;
$wgUploadDirectory = "$IP/images";
$wgUploadPath = "$wgScriptPath/images";
$wgMaxUploadSize = 1073741824; // 1GB

// Permissions
$wgGroupPermissions['*']['read'] = true;
$wgGroupPermissions['*']['edit'] = false;
$wgGroupPermissions['user']['edit'] = true;
$wgGroupPermissions['user']['upload'] = true;

// Security
$wgSecretKey = "change-this-to-a-random-string-12345678901234567890";
$wgUpgradeKey = "change-this-to-a-random-string-12345678901234567890";

// Cache settings
$wgMainCacheType = CACHE_ACCEL;
$wgParserCacheType = CACHE_ACCEL;

// Extensions (add more as needed)
// wfLoadExtension( 'VisualEditor' );
// wfLoadExtension( 'TemplateData' );

// End of configuration
?>
