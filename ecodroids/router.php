<?php
// Router script for PHP built-in server to support extensionless URLs

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

$requested = __DIR__ . $uri;

if (file_exists($requested)) {
    return false; // Serve the requested resource as-is
}

if ($uri === '/') {
    $index = __DIR__ . '/index.php';
    if (file_exists($index)) {
        include $index;
        return true;
    }
}

$phpFile = $requested . '.php';
if (file_exists($phpFile)) {
    include $phpFile;
    return true;
}

// If file not found, return 404
header("HTTP/1.0 404 Not Found");
echo "404 Not Found";
return true;
?>
