<?php
require_once 'includes/config.php';
require_once 'includes/mail.php';

$success = $error = '';

$prefillService = isset($_GET['service']) ? htmlspecialchars($_GET['service']) : '';
$prefillLocation = isset($_GET['location']) ? htmlspecialchars($_GET['location']) : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verify CSRF token
    if (!isset($_POST['csrf_token']) || !validateCSRFToken($_POST['csrf_token'])) {
        $error = "Invalid form submission.";
    } else {
        try {
            $mailHandler = new MailHandler();
            
            // Handle file upload
            $attachments = [];
            if (!empty($_FILES['attachment']) && $_FILES['attachment']['error'] === UPLOAD_ERR_OK) {
                $attachments[] = $_FILES['attachment'];
            }
            
            // Send quote request email
            if ($mailHandler->sendQuoteEmail($_POST, $attachments)) {
                // Send auto-reply
                $mailHandler->sendAutoReply($_POST['email'], $_POST['contact_person'], 'quote');
                $success = "Thank you! Your quote request has been sent successfully.";
            }
        } catch (Exception $e) {
            $error = "Sorry, there was an error sending your quote request. Please try again later.";
            error_log("Quote Form Error: " . $e->getMessage());
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request a Quote | <?php echo SITE_NAME; ?></title>
    
    <!-- Meta Tags -->
    <meta name="description" content="Request a quote for professional digital solutions from EcoDroids. Get custom pricing for web design, development, and digital marketing services.">
    <meta name="keywords" content="quote, pricing, digital solutions, web design, development, digital marketing, India">
    
    <!-- Open Graph Tags -->
    <meta property="og:title" content="Request a Quote | EcoDroids">
    <meta property="og:description" content="Get custom pricing for professional digital solutions">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo SITE_URL; ?>/quote">
    
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
                <h1 class="text-4xl font-bold text-gray-800 mb-4">Request a Quote</h1>
                <p class="text-xl text-gray-600">Get custom pricing for your digital solution needs</p>
            </div>
        </div>
    </section>

    <!-- Quote Form Section -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto">
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

<form action="/includes/generate-quotation.php" method="POST" enctype="multipart/form-data" class="space-y-6">
                        <input type="hidden" name="csrf_token" value="<?php echo generateCSRFToken(); ?>">
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="company_name" class="block text-gray-700 font-medium mb-2">Company Name *</label>
                            <input type="text" id="company_name" name="company_name" required
                                    class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Your company name" value="<?php echo isset($_GET['company_name']) ? htmlspecialchars($_GET['company_name']) : ''; ?>">
                            </div>

                            <div>
                                <label for="contact_person" class="block text-gray-700 font-medium mb-2">Contact Person *</label>
                                <input type="text" id="contact_person" name="contact_person" required
                                    class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Your name">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
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
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                            <!-- Removed Service Type, Quantity, Rate, and Discount fields as per user request -->
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                            <!-- Removed Discount input as per user request -->
                        </div>

                        <div>
                            <label for="service_type" class="block text-gray-700 font-medium mb-2">Service Type *</label>
                            <select id="service_type" name="service_type" required
                                class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Select a service</option>
                                <?php foreach ($services as $key => $service): ?>
                                    <option value="<?php echo $service['name']; ?>" <?php echo ($prefillService === $service['name']) ? 'selected' : ''; ?>><?php echo $service['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div>
                            <label for="requirements" class="block text-gray-700 font-medium mb-2">Project Requirements *</label>
                            <textarea id="requirements" name="requirements" rows="5" required
                                class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Please describe your project requirements"></textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="budget" class="block text-gray-700 font-medium mb-2">Budget Range *</label>
                                <select id="budget" name="budget" required
                                    class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Select budget range</option>
                                    <option value="0-50k">Below ₹50,000</option>
                                    <option value="50k-1L">₹50,000 - ₹1,00,000</option>
                                    <option value="1L-5L">₹1,00,000 - ₹5,00,000</option>
                                    <option value="5L+">Above ₹5,00,000</option>
                                </select>
                            </div>

                            <div>
                                <label for="timeline" class="block text-gray-700 font-medium mb-2">Expected Timeline *</label>
                                <select id="timeline" name="timeline" required
                                    class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Select timeline</option>
                                    <option value="1-month">Within 1 Month</option>
                                    <option value="1-3-months">1-3 Months</option>
                                    <option value="3-6-months">3-6 Months</option>
                                    <option value="6-months+">More than 6 Months</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label for="attachment" class="block text-gray-700 font-medium mb-2">Attachment (Optional)</label>
                            <input type="file" id="attachment" name="attachment"
                                class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
                            <p class="text-sm text-gray-500 mt-1">Max file size: 5MB. Allowed formats: PDF, DOC, DOCX, JPG, PNG</p>
                        </div>

                        <div>
                            <label for="additional_notes" class="block text-gray-700 font-medium mb-2">Additional Notes</label>
                            <textarea id="additional_notes" name="additional_notes" rows="3"
                                class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Any additional information you'd like to share"></textarea>
                        </div>

                        <button type="submit"
                            class="w-full bg-blue-600 text-white py-3 px-6 rounded-md hover:bg-blue-700 transition duration-300">
                            Submit Quote Request
                        </button>
                    </form>
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
                const companyName = document.getElementById('company_name').value.trim();
                const contactPerson = document.getElementById('contact_person').value.trim();
                const email = document.getElementById('email').value.trim();
                const phone = document.getElementById('phone').value.trim();
                const serviceType = document.getElementById('service_type').value;
                const requirements = document.getElementById('requirements').value.trim();
                const budget = document.getElementById('budget').value;
                const timeline = document.getElementById('timeline').value;
                
                let isValid = true;
                let errorMessage = '';
                
                // Company name validation
                if (companyName.length < 2) {
                    isValid = false;
                    errorMessage = 'Company name must be at least 2 characters long';
                }
                
                // Contact person validation
                if (contactPerson.length < 2) {
                    isValid = false;
                    errorMessage = 'Contact person name must be at least 2 characters long';
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
                
                // Service type validation
                if (!serviceType) {
                    isValid = false;
                    errorMessage = 'Please select a service type';
                }
                
                // Requirements validation
                if (requirements.length < 10) {
                    isValid = false;
                    errorMessage = 'Project requirements must be at least 10 characters long';
                }
                
                // Budget validation
                if (!budget) {
                    isValid = false;
                    errorMessage = 'Please select a budget range';
                }
                
                // Timeline validation
                if (!timeline) {
                    isValid = false;
                    errorMessage = 'Please select an expected timeline';
                }
                
                // File validation
                const attachment = document.getElementById('attachment').files[0];
                if (attachment) {
                    const maxSize = 5 * 1024 * 1024; // 5MB
                    const allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'image/jpeg', 'image/png'];
                    
                    if (attachment.size > maxSize) {
                        isValid = false;
                        errorMessage = 'File size must be less than 5MB';
                    }
                    
                    if (!allowedTypes.includes(attachment.type)) {
                        isValid = false;
                        errorMessage = 'Invalid file type. Please upload PDF, DOC, DOCX, JPG, or PNG files only';
                    }
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
