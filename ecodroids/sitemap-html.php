<?php
// Simple HTML Sitemap Generator for EcoDroids Website

// Base URL of the website
$baseUrl = 'https://ecodroids.com';

// List of main pages
$mainPages = [
    ['url' => '/', 'title' => 'Home'],
    ['url' => '/about', 'title' => 'About Us'],
    ['url' => '/services', 'title' => 'Services'],
    ['url' => '/contact', 'title' => 'Contact'],
    ['url' => '/quote', 'title' => 'Request a Quote'],
    ['url' => '/blog.php', 'title' => 'Blog'],
];

// List of services
$services = [
    ['url' => '/services/web-design', 'title' => 'Web Design'],
    ['url' => '/services/digital-marketing', 'title' => 'Digital Marketing'],
    ['url' => '/services/seo', 'title' => 'SEO Services'],
    ['url' => '/services/app-development', 'title' => 'App Development'],
    ['url' => '/services/content-writing', 'title' => 'Content Writing'],
    ['url' => '/services/graphic-design', 'title' => 'Graphic Design'],
];

// List of states and sample districts (for brevity, only a few)
$locations = [
    'Haryana' => ['Ambala', 'Sirsa', 'Gurugram'],
    'Andhra Pradesh' => ['Vijayawada', 'Visakhapatnam'],
    'Delhi' => ['New Delhi', 'South Delhi'],
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>HTML Sitemap - EcoDroids</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; background: #f9f9f9; }
        h1 { text-align: center; margin-bottom: 40px; }
        ul { list-style-type: none; padding-left: 0; }
        li { margin-bottom: 8px; }
        a { text-decoration: none; color: #1a73e8; }
        a:hover { text-decoration: underline; }
        .section { margin-bottom: 40px; }
        .section h2 { border-bottom: 2px solid #1a73e8; padding-bottom: 8px; margin-bottom: 20px; }
        .nested-list { margin-left: 20px; }
    </style>
</head>
<body>
    <h1>HTML Sitemap - EcoDroids</h1>

    <div class="section">
        <h2>Main Pages</h2>
        <ul>
            <?php foreach ($mainPages as $page): ?>
                <li><a href="<?php echo $page['url']; ?>"><?php echo $page['title']; ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="section">
        <h2>Services</h2>
        <ul>
            <?php foreach ($services as $service): ?>
                <li><a href="<?php echo $service['url']; ?>"><?php echo $service['title']; ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="section">
        <h2>Locations & Services</h2>
        <?php foreach ($locations as $state => $districts): ?>
            <h3><?php echo $state; ?></h3>
            <ul class="nested-list">
                <?php foreach ($districts as $district): ?>
                    <li>
                        <?php echo $district; ?>
                        <ul class="nested-list">
                            <?php foreach ($services as $service): 
                                // Build URL for location-specific service page
                                $stateSlug = strtolower(str_replace(' ', '-', $state));
                                $districtSlug = strtolower(str_replace(' ', '-', $district));
                                $serviceSlug = basename($service['url']);
                                $url = "/locations/$stateSlug/$districtSlug/$serviceSlug.php";
                            ?>
                                <li><a href="<?php echo $url; ?>"><?php echo $service['title']; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endforeach; ?>
    </div>
</body>
</html>
