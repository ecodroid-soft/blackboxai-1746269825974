<?php
require_once 'includes/config.php';

$service = isset($_GET['service']) ? htmlspecialchars($_GET['service']) : '';
$location = isset($_GET['location']) ? htmlspecialchars($_GET['location']) : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process purchase form submission
    // For demo, just show a success message
    $success = "Thank you for purchasing the $service service for $location. We will contact you shortly.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Checkout - <?php echo htmlspecialchars($service); ?> | EcoDroids</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="description" content="Purchase <?php echo htmlspecialchars($service); ?> services for <?php echo htmlspecialchars($location); ?> from EcoDroids. Secure and easy online checkout.">
    <meta name="keywords" content="<?php echo htmlspecialchars($service); ?> purchase, checkout, digital services, <?php echo htmlspecialchars($location); ?>">
    <meta property="og:title" content="Checkout - <?php echo htmlspecialchars($service); ?> | EcoDroids">
    <meta property="og:description" content="Purchase <?php echo htmlspecialchars($service); ?> services for <?php echo htmlspecialchars($location); ?> from EcoDroids.">
</head>
<body class="bg-gray-50">
    <?php include 'components/header.php'; ?>

    <section class="pt-24 pb-12 bg-gradient-to-br from-blue-50 to-indigo-50">
        <div class="container mx-auto px-4 max-w-3xl">
            <h1 class="text-4xl font-bold text-gray-800 mb-6">Checkout - <?php echo htmlspecialchars($service); ?></h1>
            <?php if (!empty($success)): ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    <?php echo $success; ?>
                </div>
            <?php endif; ?>
            <form method="POST" class="bg-white p-6 rounded shadow space-y-6">
                <div>
                    <label class="block mb-2 font-semibold">Service</label>
                    <input type="text" name="service" value="<?php echo htmlspecialchars($service); ?>" readonly class="w-full border p-2 rounded bg-gray-100" />
                </div>
                <div>
                    <label class="block mb-2 font-semibold">Location</label>
                    <input type="text" name="location" value="<?php echo htmlspecialchars($location); ?>" readonly class="w-full border p-2 rounded bg-gray-100" />
                </div>
                <div>
                    <label class="block mb-2 font-semibold">Name</label>
                    <input type="text" name="name" required class="w-full border p-2 rounded" placeholder="Your full name" />
                </div>
                <div>
                    <label class="block mb-2 font-semibold">Email</label>
                    <input type="email" name="email" required class="w-full border p-2 rounded" placeholder="Your email address" />
                </div>
                <div>
                    <label class="block mb-2 font-semibold">Phone</label>
                    <input type="tel" name="phone" required class="w-full border p-2 rounded" placeholder="Your phone number" />
                </div>
                <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700 transition">Purchase</button>
            </form>
        </div>
    </section>

    <?php include 'components/footer.php'; ?>
</body>
</html>
