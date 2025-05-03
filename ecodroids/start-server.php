<?php
echo "Starting EcoDroids development server...\n\n";

// Generate location pages
echo "Generating location pages...\n";
require_once 'includes/generate-location-pages.php';
echo "Location pages generated successfully!\n\n";

// Generate sitemaps
echo "Generating sitemaps...\n";
require_once 'includes/generate-sitemap.php';
echo "Sitemaps generated successfully!\n\n";

// Create logs directory if it doesn't exist
if (!file_exists('logs')) {
    mkdir('logs', 0755, true);
    echo "Created logs directory\n";
}

// Create uploads directory if it doesn't exist
if (!file_exists('assets/uploads')) {
    mkdir('assets/uploads', 0755, true);
    echo "Created uploads directory\n";
}

// Check if port 8000 is in use
$connection = @fsockopen('localhost', 8000);
if (is_resource($connection)) {
    fclose($connection);
    echo "Port 8000 is in use. Attempting to kill the process...\n";
    exec('lsof -t -i:8000 | xargs kill -9 2>/dev/null');
    echo "Process killed.\n";
}

// Start PHP development server
echo "\nStarting PHP development server on http://localhost:8000\n";
echo "Press Ctrl+C to stop the server\n\n";
$docRoot = realpath(__DIR__ . '/../ecodroids');
chdir($docRoot);
passthru("php -S localhost:8000 router.php");
