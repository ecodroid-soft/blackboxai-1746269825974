<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoDroids - Digital Solutions Across India</title>
    
    <!-- Meta Tags -->
    <meta name="description" content="EcoDroids provides professional digital solutions including web design, development, and digital marketing services across all states and cities in India.">
    <meta name="keywords" content="digital solutions, web design, web development, digital marketing, India">
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    <link rel="alternate icon" href="/favicon.ico">
    
    <!-- Open Graph Tags -->
    <meta property="og:title" content="EcoDroids - Digital Solutions Across India">
    <meta property="og:description" content="Professional digital solutions across all states and cities in India">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://ecodroids.com">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <!-- Custom Styles -->
    <link rel="stylesheet" href="/css/main.css">
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <?php include __DIR__ . '/components/header.php'; ?>

    <!-- Hero Section -->
    <section class="pt-24 pb-12 md:pt-32 md:pb-20 bg-gradient-to-br from-blue-50 to-indigo-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">
                    Digital Solutions for Every Corner of India
                </h1>
                <p class="text-xl text-gray-600 mb-8">
                    Professional web design, development, and digital marketing services available across all states and cities.
                </p>
                <div class="flex flex-col md:flex-row justify-center gap-4">
                    <a href="/services" class="bg-blue-600 text-white px-8 py-3 rounded-md hover:bg-blue-700 transition duration-300">
                        Our Services
                    </a>
                    <a href="/locations" class="bg-white text-blue-600 px-8 py-3 rounded-md border-2 border-blue-600 hover:bg-blue-50 transition duration-300">
                        Find Your Location
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Location Selector -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Find Services in Your Area</h2>
            <div class="max-w-3xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="relative">
                    <label for="serviceSelect" class="block text-sm font-medium text-gray-700 mb-1">Select Service</label>
                    <select id="serviceSelect" class="w-full p-3 border rounded-md bg-white cursor-pointer text-gray-700 text-base">
                        <option value="">Select Service</option>
                        <option value="web-design">Web Design</option>
                        <option value="digital-marketing">Digital Marketing</option>
                        <option value="seo">SEO Services</option>
                        <option value="app-development">App Development</option>
                        <option value="content-writing">Content Writing</option>
                        <option value="graphic-design">Graphic Design</option>
                    </select>
                </div>
                <div class="relative">
                    <label for="stateSelect" class="block text-sm font-medium text-gray-700 mb-1">Select State</label>
                    <div class="relative">
                        <select id="stateSelect" class="w-full p-3 border rounded-md bg-white transition-all duration-200 hover:border-blue-500 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 cursor-pointer text-gray-700 text-base">
                            <option value="">Select State</option>
                        </select>
                        <div class="absolute right-3 top-1/2 transform -translate-y-1/2 pointer-events-none flex items-center space-x-2">
                            <div class="loading-spinner hidden">
                                <i class="fas fa-circle-notch fa-spin text-blue-600"></i>
                            </div>
                            <i class="fas fa-chevron-down text-gray-400"></i>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <label for="districtSelect" class="block text-sm font-medium text-gray-700 mb-1">Select District</label>
                    <div class="relative">
                        <select id="districtSelect" class="w-full p-3 border rounded-md bg-white transition-all duration-200 hover:border-blue-500 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed text-gray-700 text-base" disabled>
                            <option value="">Select District</option>
                        </select>
                        <div class="absolute right-3 top-1/2 transform -translate-y-1/2 pointer-events-none flex items-center space-x-2">
                            <div class="loading-spinner hidden">
                                <i class="fas fa-circle-notch fa-spin text-blue-600"></i>
                            </div>
                            <i class="fas fa-chevron-down text-gray-400"></i>
                        </div>
                    </div>
                </div>
            </div>
                <!-- Error message container -->
                <div id="locationError" class="mt-4 text-center hidden">
                    <p class="text-red-600 text-sm bg-red-50 py-2 px-4 rounded-md inline-block"></p>
                </div>
                <!-- Success message container -->
                <div id="locationSuccess" class="mt-4 text-center hidden">
                    <p class="text-green-600 text-sm bg-green-50 py-2 px-4 rounded-md inline-block"></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Our Services</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Web Design -->
                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300">
                    <div class="text-blue-600 text-3xl mb-4">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Web Design</h3>
                    <p class="text-gray-600 mb-4">Custom website design solutions tailored to your business needs.</p>
                    <a href="/services/web-design" class="text-blue-600 hover:text-blue-700">Learn More →</a>
                </div>

                <!-- Digital Marketing -->
                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300">
                    <div class="text-blue-600 text-3xl mb-4">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Digital Marketing</h3>
                    <p class="text-gray-600 mb-4">Comprehensive digital marketing strategies to grow your business.</p>
                    <a href="/services/digital-marketing" class="text-blue-600 hover:text-blue-700">Learn More →</a>
                </div>

                <!-- SEO Services -->
                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300">
                    <div class="text-blue-600 text-3xl mb-4">
                        <i class="fas fa-search"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">SEO Services</h3>
                    <p class="text-gray-600 mb-4">Improve your search engine rankings and online visibility.</p>
                    <a href="/services/seo" class="text-blue-600 hover:text-blue-700">Learn More →</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-semibold mb-4">EcoDroids</h3>
                    <p class="text-gray-400">Professional digital solutions across India.</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="/about" class="text-gray-400 hover:text-white">About Us</a></li>
                        <li><a href="/services" class="text-gray-400 hover:text-white">Services</a></li>
                        <li><a href="/contact" class="text-gray-400 hover:text-white">Contact</a></li>
                        <li><a href="/quote" class="text-gray-400 hover:text-white">Get Quote</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Contact</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><i class="fas fa-envelope mr-2"></i> contact@ecodroids.com</li>
                        <li><i class="fas fa-envelope mr-2"></i> quote@ecodroids.com</li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Follow Us</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white text-xl"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white text-xl"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white text-xl"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white text-xl"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2024 EcoDroids. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/js/service-location-dropdown.js"></script>
    <script>
        // Mobile Menu Toggle
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }

        // Location Selectors
        document.addEventListener('DOMContentLoaded', function() {
            const stateSelect = document.getElementById('stateSelect');
            const districtSelect = document.getElementById('districtSelect');

            // Loading state handler
            function setLoading(element, isLoading) {
                const spinner = element.parentNode.querySelector('.loading-spinner');
                element.disabled = isLoading;
                if (isLoading) {
                    element.classList.add('opacity-50', 'cursor-wait');
                    spinner.classList.remove('hidden');
                } else {
                    element.classList.remove('opacity-50', 'cursor-wait');
                    spinner.classList.add('hidden');
                }
            }

            // Message display handlers
            function showError(message) {
                const errorContainer = document.getElementById('locationError');
                const errorMessage = errorContainer.querySelector('p');
                const successContainer = document.getElementById('locationSuccess');
                
                successContainer.classList.add('hidden');
                errorMessage.textContent = message;
                errorContainer.classList.remove('hidden');
                
                setTimeout(() => {
                    errorContainer.classList.add('hidden');
                }, 5000);
            }

            function showSuccess(message) {
                const successContainer = document.getElementById('locationSuccess');
                const successMessage = successContainer.querySelector('p');
                const errorContainer = document.getElementById('locationError');
                
                errorContainer.classList.add('hidden');
                successMessage.textContent = message;
                successContainer.classList.remove('hidden');
                
                setTimeout(() => {
                    successContainer.classList.add('hidden');
                }, 3000);
            }

            // Fetch states from API
            async function fetchStates() {
                try {
                    setLoading(stateSelect, true);
                    console.log('Fetching states...');
                    const response = await fetch('/includes/location-api.php?type=states');
                    if (!response.ok) throw new Error('Failed to fetch states');
                    
                    const data = await response.json();
                    console.log('API Response:', data);
                    
                    if (!data.success) throw new Error(data.error || 'Failed to load states');

                    // Create a document fragment for better performance
                    const fragment = document.createDocumentFragment();
                    const defaultOption = document.createElement('option');
                    defaultOption.value = '';
                    defaultOption.textContent = 'Select State';
                    fragment.appendChild(defaultOption);
                    
                    if (!Array.isArray(data.data)) {
                        throw new Error('States data is not an array');
                    }
                    
                    // Sort states alphabetically
                    const sortedStates = [...data.data].sort((a, b) => 
                        a.name.toLowerCase().localeCompare(b.name.toLowerCase())
                    );
                    
                    sortedStates.forEach(state => {
                        const option = document.createElement('option');
                        option.value = state.id;
                        option.textContent = state.name;
                        option.dataset.slug = state.slug;
                        fragment.appendChild(option);
                    });

                    // Clear and update the select element
                    stateSelect.innerHTML = '';
                    stateSelect.appendChild(fragment);
                    showSuccess('States loaded successfully');
                } catch (error) {
                    showError(error.message);
                } finally {
                    setLoading(stateSelect, false);
                }
            }

            // Fetch districts for selected state
            async function fetchDistricts(stateId) {
                try {
                    setLoading(districtSelect, true);
                    districtSelect.innerHTML = '<option value="">Select District</option>';

                    const response = await fetch(`/includes/location-api.php?type=districts&state=${stateId}`);
                    if (!response.ok) throw new Error('Failed to fetch districts');

                    const data = await response.json();
                    if (!data.success) throw new Error(data.error || 'Failed to load districts');

                    if (data.data && data.data.districts) {
                        data.data.districts.forEach(district => {
                            const option = document.createElement('option');
                            option.value = district.id;
                            option.textContent = district.name;
                            option.dataset.slug = district.slug;
                            districtSelect.appendChild(option);
                        });
                        districtSelect.disabled = false;
                        showSuccess('Districts loaded successfully');
                    }
                } catch (error) {
                    showError(error.message);
                    districtSelect.disabled = true;
                } finally {
                    setLoading(districtSelect, false);
                }
            }

            // Initialize states
            fetchStates();

            // Handle state selection
            stateSelect.addEventListener('change', function() {
                const stateId = this.value;
                districtSelect.disabled = !stateId;
                if (stateId) {
                    fetchDistricts(stateId);
                } else {
                    districtSelect.innerHTML = '<option value="">Select District</option>';
                }
            });

            // Handle district selection
            districtSelect.addEventListener('change', function() {
                if (this.value) {
                    const stateOption = stateSelect.selectedOptions[0];
                    const districtOption = this.selectedOptions[0];
                    const url = `/locations/${stateOption.dataset.slug}/${districtOption.dataset.slug}/`;
                    window.location.href = url;
                }
            });
        });
    </script>
</body>
</html>
