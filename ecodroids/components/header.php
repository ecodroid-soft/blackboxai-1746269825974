<?php
require_once __DIR__ . '/../includes/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php'; ?>
</head>
<body class="bg-gray-50">
    <header class="bg-white shadow-md fixed w-full top-0 z-50">
        <nav class="container mx-auto px-6 py-4 flex items-center justify-between">
            <a href="/" class="text-3xl font-extrabold text-blue-600">EcoDroids</a>
            <div class="hidden md:flex space-x-8 items-center">
                <div class="relative group">
                    <button class="flex items-center text-gray-700 hover:text-blue-600 font-semibold">
                        Services
                        <svg class="ml-1 w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M5.25 7.5L10 12.25L14.75 7.5H5.25Z"/></svg>
                    </button>
                    <div class="absolute left-0 mt-2 w-96 bg-white rounded-lg shadow-lg py-6 hidden group-hover:block">
                        <div class="grid grid-cols-2 gap-6 px-6">
                            <?php foreach ($services as $slug => $service): ?>
                            <a href="/services/<?php echo $slug; ?>.php" class="flex items-start space-x-4 hover:bg-blue-50 rounded-md p-3">
                                <i class="<?php echo $service['icon']; ?> text-blue-600 text-2xl"></i>
                                <div>
                                    <h3 class="font-semibold text-gray-900"><?php echo $service['name']; ?></h3>
                                    <p class="text-sm text-gray-600"><?php echo $service['description']; ?></p>
                                </div>
                            </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="relative group">
                    <button class="flex items-center text-gray-700 hover:text-blue-600 font-semibold">
                        Locations
                        <svg class="ml-1 w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M5.25 7.5L10 12.25L14.75 7.5H5.25Z"/></svg>
                    </button>
                    <div class="absolute left-0 mt-2 w-96 bg-white rounded-lg shadow-lg py-6 max-h-96 overflow-y-auto hidden group-hover:block">
                        <?php
                        require_once __DIR__ . '/../locations/data/states.php';
                        $half = ceil(count($states) / 2);
                        $firstHalf = array_slice($states, 0, $half);
                        $secondHalf = array_slice($states, $half);
                        ?>
                        <div class="grid grid-cols-2 gap-6 px-6">
                            <div>
                                <?php foreach ($firstHalf as $state): ?>
                                <a href="/locations/<?php echo $state['slug']; ?>/index.php" class="block py-2 text-gray-800 hover:text-blue-600">
                                    <?php echo ucwords(strtolower($state['name'])); ?>
                                </a>
                                <?php endforeach; ?>
                            </div>
                            <div>
                                <?php foreach ($secondHalf as $state): ?>
                                <a href="/locations/<?php echo $state['slug']; ?>/index.php" class="block py-2 text-gray-800 hover:text-blue-600">
                                    <?php echo ucwords(strtolower($state['name'])); ?>
                                </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="/about.php" class="text-gray-700 hover:text-blue-600 font-semibold">About</a>
                <a href="/blog.php" class="text-gray-700 hover:text-blue-600 font-semibold">Blog</a>
                <a href="/contact.php" class="text-gray-700 hover:text-blue-600 font-semibold">Contact</a>
                <a href="/quote.php" class="bg-blue-600 text-white px-5 py-2 rounded-md hover:bg-blue-700 font-semibold">Get Quote</a>
            </div>
            <button class="md:hidden text-gray-700" onclick="toggleMobileMenu()">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="3" y1="6" x2="21" y2="6"/>
                    <line x1="3" y1="12" x2="21" y2="12"/>
                    <line x1="3" y1="18" x2="21" y2="18"/>
                </svg>
            </button>
        </nav>
        <div id="mobileMenu" class="hidden md:hidden bg-white shadow-md">
            <div class="px-6 py-4 space-y-4">
                <div>
                    <button onclick="toggleMobileSubmenu('mobileServices')" class="w-full flex justify-between items-center text-gray-700 font-semibold">
                        Services
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M5.25 7.5L10 12.25L14.75 7.5H5.25Z"/></svg>
                    </button>
                    <div id="mobileServices" class="hidden mt-2 space-y-2">
                        <?php foreach ($services as $slug => $service): ?>
                        <a href="/services/<?php echo $slug; ?>.php" class="block py-2 text-gray-700 hover:text-blue-600">
                            <?php echo $service['name']; ?>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div>
                    <button onclick="toggleMobileSubmenu('mobileLocations')" class="w-full flex justify-between items-center text-gray-700 font-semibold">
                        Locations
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M5.25 7.5L10 12.25L14.75 7.5H5.25Z"/></svg>
                    </button>
                    <div id="mobileLocations" class="hidden mt-2 space-y-2 max-h-64 overflow-y-auto">
                        <?php foreach ($states as $state): ?>
                        <a href="/locations/<?php echo $state['slug']; ?>/index.php" class="block py-2 text-gray-700 hover:text-blue-600">
                            <?php echo ucwords(strtolower($state['name'])); ?>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <a href="/about.php" class="block py-2 text-gray-700 hover:text-blue-600 font-semibold">About</a>
                <a href="/blog.php" class="block py-2 text-gray-700 hover:text-blue-600 font-semibold">Blog</a>
                <a href="/contact.php" class="block py-2 text-gray-700 hover:text-blue-600 font-semibold">Contact</a>
                <a href="/quote.php" class="block bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 font-semibold text-center">Get Quote</a>
            </div>
        </div>
    </header>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }
        function toggleMobileSubmenu(id) {
            const submenu = document.getElementById(id);
            submenu.classList.toggle('hidden');
        }
    </script>
</body>
</html>
