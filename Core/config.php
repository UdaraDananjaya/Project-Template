<?php

// Database configuration
define('DBNAME', 'sampledb'); // Database name
define('DBHOST', 'localhost'); // Database server hostname
define('DBUSER', 'root'); // Database username
define('DBPASS', ''); // Database password

// Site configuration
define('BASE', 'http://localhost/Project-Template/'); // Base URL for the site
define('ROOT', BASE . ''); // Root URL for the site
define('APP_NAME', "My Webiste"); // Site name
define('APP_DESC', "Best website on the planet"); // Site name

// Email configuration
define('SMTP_HOST', 'smtp.example.com'); // SMTP server hostname
define('SMTP_PORT', 587); // SMTP server port
define('SMTP_USERNAME', 'email@example.com'); // SMTP username
define('SMTP_PASSWORD', 'password'); // SMTP password
define('ADMIN_EMAIL', 'admin@example.com'); // Administrator email address

// Debug configuration
define('DEBUG', true); // Enable debug mode (true/false)

// Routes configuration
define('DEFCON', 'Admin'); // Default Controller
