<?php
// Script to generate service pages dynamically based on service-template.php

require_once __DIR__ . '/../includes/config.php';

$templatePath = __DIR__ . '/../includes/templates/service-template.php';
$servicesDir = __DIR__ . '/../services/';

if (!file_exists($templatePath)) {
    die("Service template not found at $templatePath\n");
}

$templateContent = file_get_contents($templatePath);

global $services;

foreach ($services as $slug => $service) {
    $servicePagePath = $servicesDir . $slug . '.php';
    $content = str_replace(
        ['getServiceDetails(\'web-design\')', '$service = getServiceDetails(\'web-design\');'],
        ['$service = getServiceDetails(\'' . $slug . '\');', '$service = getServiceDetails(\'' . $slug . '\');'],
        $templateContent
    );
    file_put_contents($servicePagePath, $content);
    echo "Generated service page: $servicePagePath\n";
}
?>
