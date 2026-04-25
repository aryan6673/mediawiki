<?php
// MediaWiki 1.39 Configuration File

// Determine the server URL dynamically
if ( isset( $_SERVER['HTTP_HOST'] ) ) {
    $wgServer = 'http' . ( isset( $_SERVER['HTTPS'] ) ? 's' : '' ) . '://' . $_SERVER['HTTP_HOST'];
} else {
    $wgServer = "http://localhost";
}

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

// Path configuration
$wgScriptPath = "";
$wgArticlePath = "/wiki/$1";
$wgUsePathInfo = true;
$wgRedirectScript = "$wgScriptPath/redirect.php";

// Logo
$wgLogo = "$wgScriptPath/resources/assets/wiki.png";

// Language
$wgLanguageCode = "en";

// Timezone
date_default_timezone_set( 'UTC' );

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
$wgFileExtensions = array( 'png', 'gif', 'jpg', 'jpeg', 'webp', 'pdf', 'txt', 'doc', 'docx' );

// Permissions
$wgGroupPermissions['*']['read'] = true;
$wgGroupPermissions['*']['edit'] = false;
$wgGroupPermissions['*']['createaccount'] = true;
$wgGroupPermissions['user']['edit'] = true;
$wgGroupPermissions['user']['upload'] = true;
$wgGroupPermissions['user']['move'] = true;
$wgGroupPermissions['sysop']['edit'] = true;
$wgGroupPermissions['sysop']['upload'] = true;
$wgGroupPermissions['sysop']['delete'] = true;
$wgGroupPermissions['sysop']['undelete'] = true;
$wgGroupPermissions['sysop']['protect'] = true;
$wgGroupPermissions['sysop']['block'] = true;
$wgGroupPermissions['sysop']['move'] = true;

// Admin user
$wgGroupPermissions['bureaucrat']['bureaucrat'] = true;

// Security
$wgSecretKey = "change-this-to-a-random-string-12345678901234567890";
$wgUpgradeKey = "change-this-to-a-random-string-12345678901234567890";

// Cache settings
$wgMainCacheType = CACHE_NONE;
$wgParserCacheType = CACHE_NONE;
$wgSessionCacheType = CACHE_DB;

// Database cache
$wgUseFileCache = false;

// Logging
$wgDebugLogFile = false;

// Extensions (add more as needed)
// wfLoadExtension( 'VisualEditor' );
// wfLoadExtension( 'TemplateData' );

// Initialize images directory if needed
if ( !is_dir( $IP . '/images' ) ) {
    mkdir( $IP . '/images', 0777, true );
    mkdir( $IP . '/images/temp', 0777, true );
}

// End of configuration
?>
