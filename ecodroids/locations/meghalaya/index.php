<?php
require_once '../../includes/config.php';
require_once '../../locations/data/districts.php';

$state = 'Haryana';
$stateId = '6'; // Haryana's ID
$districts = isset($districts[$stateId]) ? $districts[$stateId] : [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Services in <?php echo $state; ?> | <?php echo SITE_NAME; ?></title>
    
    <!-- Meta Tags -->
    <meta name="description" content="Professional digital solutions including web design, development, and digital marketing services across <?php echo $state; ?>.">
    <meta name="keywords" content="digital services <?php echo $state; ?>, web design <?php echo $state; ?>, digital marketing <?php echo $state; ?>, SEO services <?php echo $state; ?>">
    
    <!-- Open Graph Tags -->
    <meta property="og:title" content="Digital Services in <?php echo $state; ?> | EcoDroids">
    <meta property="og:description" content="Professional digital solutions across <?php echo $state; ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo SITE_URL; ?>/locations/<?php echo strtolower($state); ?>">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <?php include '../../components/header.php'; ?>

    <!-- Breadcrumb -->
    <div class="bg-gray-100 py-2">
        <div class="container mx-auto px-4">
            <div class="flex items-center text-sm text-gray-600">
                <a href="/" class="hover:text-blue-600">Home</a>
                <span class="mx-2">/</span>
                <span class="text-gray-800"><?php echo $state; ?></span>
            </div>
        </div>
    </div>

    <!-- Hero Section -->
    <section class="pt-16 pb-12 bg-gradient-to-br from-blue-50 to-indigo-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">
                    Digital Solutions in <?php echo $state; ?>
                </h1>
                <p class="text-xl text-gray-600 mb-8">
                    Professional web design, development, and digital marketing services across <?php echo $state; ?>
                </p>
                <div class="flex flex-col md:flex-row justify-center gap-4">
                    <a href="/quote" class="bg-blue-600 text-white px-8 py-3 rounded-md hover:bg-blue-700 transition duration-300">
                        Get a Quote
                    </a>
                    <a href="/contact" class="bg-white text-blue-600 px-8 py-3 rounded-md border-2 border-blue-600 hover:bg-blue-50 transition duration-300">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Districts Grid -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Our Services Across <?php echo $state; ?></h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <?php foreach ($districts as $district): ?>
                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300">
                    <h3 class="text-xl font-semibold mb-4"><?php echo $district['name']; ?></h3>
                    <ul class="space-y-2">
                        <?php foreach ($services as $slug => $service): ?>
                        <li>
                            <a href="/locations/<?php echo strtolower($state); ?>/<?php echo strtolower($district['name']); ?>/<?php echo $slug; ?>" 
                               class="flex items-center text-gray-600 hover:text-blue-600">
                                <i class="<?php echo $service['icon']; ?> mr-2"></i>
                                <span><?php echo $service['name']; ?></span>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <a href="/locations/<?php echo strtolower($state); ?>/<?php echo strtolower($district['name']); ?>" 
                       class="inline-block mt-4 text-blue-600 hover:text-blue-700">
                        View All Services <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Why Choose Us in <?php echo $state; ?>?</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                <!-- Local Presence -->
                <div class="text-center">
                    <div class="text-blue-600 text-3xl mb-4">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Local Presence</h3>
                    <p class="text-gray-600">Strong presence across <?php echo $state; ?> with local support</p>
                </div>

                <!-- Expert Team -->
                <div class="text-center">
                    <div class="text-blue-600 text-3xl mb-4">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Expert Team</h3>
                    <p class="text-gray-600">Skilled professionals with local market knowledge</p>
                </div>

                <!-- Customized Solutions -->
                <div class="text-center">
                    <div class="text-blue-600 text-3xl mb-4">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Customized Solutions</h3>
                    <p class="text-gray-600">Tailored services for <?php echo $state; ?> businesses</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-blue-600">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center text-white">
                <h2 class="text-3xl font-bold mb-4">Ready to Get Started?</h2>
                <p class="text-xl mb-8">Contact us today for a free consultation about your project in <?php echo $state; ?></p>
                <div class="flex flex-col md:flex-row justify-center gap-4">
                    <a href="/quote" class="bg-white text-blue-600 px-8 py-3 rounded-md hover:bg-gray-100 transition duration-300">
                        Request a Quote
                    </a>
                    <a href="/contact" class="border-2 border-white text-white px-8 py-3 rounded-md hover:bg-blue-700 transition duration-300">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Schema Markup -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "EcoDroids",
        "description": "Professional digital solutions provider in <?php echo $state; ?>",
        "areaServed": {
            "@type": "State",
            "name": "<?php echo $state; ?>"
        },
        "hasOfferCatalog": {
            "@type": "OfferCatalog",
            "name": "Digital Services in <?php echo $state; ?>",
            "itemListElement": [
                <?php 
                $i = 0;
                foreach ($services as $slug => $service): 
                    if ($i > 0) echo ",";
                ?>
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "<?php echo $service['name']; ?> in <?php echo $state; ?>",
                        "description": "<?php echo $service['description']; ?>"
                    }
                }
                <?php 
                    $i++;
                endforeach; 
                ?>
            ]
        }
    }
    </script>

    <!-- Footer -->
    <?php include '../../components/footer.php'; ?>
</body>
</html>
