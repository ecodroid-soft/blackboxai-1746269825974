<?php
require_once 'includes/config.php';
$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=ecodroids_admin', DB_USER, DB_PASS);
$stmt = $pdo->query('SELECT * FROM blogs ORDER BY created_at DESC');
$blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Blog | EcoDroids</title>
    <meta name="description" content="Read the latest articles and updates on digital solutions, web design, digital marketing, and more from EcoDroids." />
    <meta name="keywords" content="digital solutions blog, web design articles, digital marketing tips, EcoDroids blog" />
    <meta property="og:title" content="EcoDroids Blog" />
    <meta property="og:description" content="Read the latest articles and updates on digital solutions, web design, digital marketing, and more from EcoDroids." />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo SITE_URL; ?>/blog.php" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50">
    <?php include 'components/header.php'; ?>
    <main class="container mx-auto px-4 py-16">
        <h1 class="text-4xl font-bold text-center mb-8 text-gray-800">Our Blog</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <?php foreach ($blogs as $blog): ?>
            <article class="bg-white p-6 rounded shadow hover:shadow-lg transition">
                <h2 class="text-2xl font-semibold mb-2"><?php echo htmlspecialchars($blog['title']); ?></h2>
                <p class="text-gray-600 mb-4"><?php echo nl2br(htmlspecialchars(substr($blog['content'], 0, 200))); ?>...</p>
                <p class="text-sm text-gray-500 mb-2">Category: <?php echo htmlspecialchars($blog['service_category']); ?></p>
                <a href="blog_post.php?id=<?php echo $blog['id']; ?>" class="text-blue-600 hover:underline">Read More</a>
            </article>
            <?php endforeach; ?>
        </div>
    </main>
    <?php include 'components/footer.php'; ?>
</body>
</html>
