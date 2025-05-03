<?php
require_once __DIR__ . '/../includes/config.php';
$services = [
    'web-design' => ['name' => 'Web Design', 'icon' => 'fas fa-laptop-code'],
    'digital-marketing' => ['name' => 'Digital Marketing', 'icon' => 'fas fa-chart-line'],
    'seo' => ['name' => 'SEO Services', 'icon' => 'fas fa-search'],
    'app-development' => ['name' => 'App Development', 'icon' => 'fas fa-mobile-alt'],
    'content-writing' => ['name' => 'Content Writing', 'icon' => 'fas fa-pen-nib'],
    'graphic-design' => ['name' => 'Graphic Design', 'icon' => 'fas fa-paint-brush'],
];
?>
<footer class="bg-gray-800 text-white py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Company Info -->
            <div>
                <h3 class="text-xl font-semibold mb-4">EcoDroids</h3>
                <p class="text-gray-400 mb-4">Professional digital solutions across India. We provide top-notch web design, development, and digital marketing services.</p>
            </div>

            <!-- Services -->
            <div>
                <h4 class="text-lg font-semibold mb-4">Our Services</h4>
                <ul class="space-y-2">
                    <?php foreach ($services as $slug => $service): ?>
                        <li>
                            <a href="/services/<?php echo $slug; ?>" class="text-gray-400 hover:text-white">
                                <i class="<?php echo $service['icon']; ?> mr-2"></i>
                                <?php echo $service['name']; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="/about" class="text-gray-400 hover:text-white">About Us</a></li>
                    <li><a href="/blog.php" class="text-gray-400 hover:text-white">Blog</a></li>
                    <li><a href="/services" class="text-gray-400 hover:text-white">Services</a></li>
                    <li><a href="/contact" class="text-gray-400 hover:text-white">Contact</a></li>
                    <li><a href="/quote" class="text-gray-400 hover:text-white">Get Quote</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h4 class="text-lg font-semibold mb-4">Contact Us</h4>
                <ul class="space-y-2 text-gray-400">
                    <li><i class="fas fa-envelope mr-2"></i> contact@ecodroids.com</li>
                    <li><i class="fas fa-envelope mr-2"></i> quote@ecodroids.com</li>
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
            <p>&copy; <?php echo date('Y'); ?> EcoDroids. All rights reserved.</p>
        </div>
    </div>
</footer>
