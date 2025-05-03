<?php
// Script to generate missing location-specific service pages for all states and districts

$services = [
    'web-design' => 'Web Design',
    'digital-marketing' => 'Digital Marketing',
    'seo' => 'SEO Services',
    'app-development' => 'App Development',
    'content-writing' => 'Content Writing',
    'graphic-design' => 'Graphic Design'
];

$locationsDir = __DIR__ . '/../locations';
$servicesDir = __DIR__ . '/../services';
$templatePath = __DIR__ . '/../includes/templates/service-template.php';

function createServicePage($filePath, $state, $city, $serviceSlug) {
    global $templatePath;
    
    if (file_exists($filePath)) {
        echo "File already exists: $filePath\n";
        return;
    }

    // Create the content using GET parameters that will be handled by the template
    $content = "<?php
\$_GET['service'] = '$serviceSlug';
\$_GET['state'] = '$state';
\$_GET['city'] = '$city';

require_once __DIR__ . '/../../../../includes/templates/service-template.php';
?>";

    if (!is_dir(dirname($filePath))) {
        mkdir(dirname($filePath), 0777, true);
    }
    
    file_put_contents($filePath, $content);
    echo "Created: $filePath\n";
}

function scanLocations($dir, $state = '', $city = '') {
    global $services;
    $items = scandir($dir);
    
    foreach ($items as $item) {
        if ($item === '.' || $item === '..') continue;
        
        $path = $dir . '/' . $item;
        if (is_dir($path)) {
            $itemName = ucwords(str_replace('-', ' ', $item));
            
            // If it's a state directory (direct child of locations)
            if (dirname($dir) === dirname(__DIR__) . '/locations') {
                scanLocations($path, $itemName, '');
            }
            // If it's a city directory (child of a state directory)
            else if (dirname(dirname($dir)) === dirname(__DIR__) . '/locations') {
                scanLocations($path, $state, $itemName);
            }
        } elseif ($item === 'index.php' && $state && $city) {
            // For each city, create service pages if missing
            $folder = dirname($path);
            foreach ($services as $slug => $name) {
                $serviceFile = $folder . '/' . $slug . '.php';
                createServicePage($serviceFile, $state, $city, $slug);
            }
        }
    }
}

// Start scanning from locations directory
scanLocations($locationsDir);

echo "Service pages generation completed.\n";
?>
