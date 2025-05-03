<?php
require_once 'includes/config.php';
require_once 'includes/mail.php';

$success = $error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verify CSRF token
    if (!isset($_POST['csrf_token']) || !validateCSRFToken($_POST['csrf_token'])) {
        $error = "Invalid form submission.";
    } else {
        try {
            $mailHandler = new MailHandler();
            
            // Send contact email
            if ($mailHandler->sendContactEmail($_POST)) {
                // Send auto-reply
                $mailHandler->sendAutoReply($_POST['email'], $_POST['name'], 'contact');
                $success = "Thank you! Your message has been sent successfully.";
            }
        } catch (Exception $e) {
            $error = "Sorry, there was an error sending your message. Please try again later.";
            error_log("Contact Form Error: " . $e->getMessage());
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | <?php echo SITE_NAME; ?></title>
    
    <!-- Meta Tags -->
    <meta name="description" content="Contact EcoDroids for professional digital solutions. Get in touch with us for web design, development, and digital marketing services.">
    <meta name="keywords" content="contact, digital solutions, web design, development, digital marketing, India">
    
    <!-- Open Graph Tags -->
    <meta property="og:title" content="Contact Us | EcoDroids">
    <meta property="og:description" content="Get in touch with EcoDroids for professional digital solutions">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo SITE_URL; ?>/contact">
    
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
    <!-- Header will be included here -->
    <?php include 'components/header.php'; ?>

    <!-- Page Header -->
    <section class="pt-24 pb-12 bg-gradient-to-br from-blue-50 to-indigo-50">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">Contact Us</h1>
                <p class="text-xl text-gray-600">Get in touch with us for professional digital solutions</p>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-5xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Contact Information -->
                    <div class="bg-white rounded-lg shadow-md p-8">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">Get in Touch</h2>
                        
                        <div class="space-y-6">
                            <div class="flex items-start space-x-4">
                                <div class="text-blue-600 text-xl mt-1">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800">Email Us</h3>
                                    <p class="text-gray-600">contact@ecodroids.com</p>
                                    <p class="text-gray-600">quote@ecodroids.com</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4">
                                <div class="text-blue-600 text-xl mt-1">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800">Business Hours</h3>
                                    <p class="text-gray-600">Monday - Friday: 9:00 AM - 6:00 PM</p>
                                    <p class="text-gray-600">Saturday: 10:00 AM - 2:00 PM</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4">
                                <div class="text-blue-600 text-xl mt-1">
                                    <i class="fas fa-globe"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800">Service Areas</h3>
                                    <p class="text-gray-600">Available across all states and cities in India</p>
                                </div>
                            </div>
                        </div>

                        <!-- Social Media Links -->
                        <div class="mt-8">
                            <h3 class="font-semibold text-gray-800 mb-4">Connect With Us</h3>
                            <div class="flex space-x-4">
                                <a href="#" class="text-gray-600 hover:text-blue-600 text-xl">
                                    <i class="fab fa-facebook"></i>
                                </a>
                                <a href="#" class="text-gray-600 hover:text-blue-600 text-xl">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="text-gray-600 hover:text-blue-600 text-xl">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                                <a href="#" class="text-gray-600 hover:text-blue-600 text-xl">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Form -->
                    <div class="bg-white rounded-lg shadow-md p-8">
                        <?php if ($success): ?>
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                                <?php echo $success; ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($error): ?>
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                                <?php echo $error; ?>
                            </div>
                        <?php endif; ?>

<form action="/contact.php" method="POST" class="space-y-6">
                            <input type="hidden" name="csrf_token" value="<?php echo generateCSRFToken(); ?>">
                            
                            <div>
                                <label for="name" class="block text-gray-700 font-medium mb-2">Full Name *</label>
                                <input type="text" id="name" name="name" required
                                    class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Your name">
                            </div>

                            <div>
                                <label for="email" class="block text-gray-700 font-medium mb-2">Email Address *</label>
                                <input type="email" id="email" name="email" required
                                    class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="your@email.com">
                            </div>

                            <div>
                                <label for="phone" class="block text-gray-700 font-medium mb-2">Phone Number *</label>
                                <input type="tel" id="phone" name="phone" required
                                    class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Your phone number">
                            </div>

                            <div>
                                <label for="subject" class="block text-gray-700 font-medium mb-2">Subject *</label>
                                <input type="text" id="subject" name="subject" required
                                    class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Message subject">
                            </div>

                            <div>
                                <label for="message" class="block text-gray-700 font-medium mb-2">Message *</label>
                                <textarea id="message" name="message" rows="5" required
                                    class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Your message"></textarea>
                            </div>

                            <button type="submit"
                                class="w-full bg-blue-600 text-white py-3 px-6 rounded-md hover:bg-blue-700 transition duration-300">
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer will be included here -->
    <?php include 'components/footer.php'; ?>

    <!-- JavaScript for form validation -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Basic validation
                const name = document.getElementById('name').value.trim();
                const email = document.getElementById('email').value.trim();
                const phone = document.getElementById('phone').value.trim();
                const subject = document.getElementById('subject').value.trim();
                const message = document.getElementById('message').value.trim();
                
                let isValid = true;
                let errorMessage = '';
                
                // Name validation
                if (name.length < 2) {
                    isValid = false;
                    errorMessage = 'Name must be at least 2 characters long';
                }
                
                // Email validation
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(email)) {
                    isValid = false;
                    errorMessage = 'Please enter a valid email address';
                }
                
                // Phone validation
                const phoneRegex = /^[0-9]{10}$/;
                if (!phoneRegex.test(phone)) {
                    isValid = false;
                    errorMessage = 'Please enter a valid 10-digit phone number';
                }
                
                // Subject validation
                if (subject.length < 5) {
                    isValid = false;
                    errorMessage = 'Subject must be at least 5 characters long';
                }
                
                // Message validation
                if (message.length < 10) {
                    isValid = false;
                    errorMessage = 'Message must be at least 10 characters long';
                }
                
                if (!isValid) {
                    alert(errorMessage);
                } else {
                    form.submit();
                }
            });
        });
    </script>
</body>
</html>
