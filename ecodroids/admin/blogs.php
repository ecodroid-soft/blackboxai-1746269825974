<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

require_once '../includes/config.php';
$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=ecodroids_admin', DB_USER, DB_PASS);

$services = [];
$stmt = $pdo->query('SELECT slug, name FROM services');
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $services[$row['slug']] = $row['name'];
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';
    $service_category = $_POST['service_category'] ?? '';

    if (!$title || !$content || !$service_category) {
        $error = 'Please fill in all required fields.';
    } else {
        $stmt = $pdo->prepare('INSERT INTO blogs (title, content, service_category) VALUES (?, ?, ?)');
        if ($stmt->execute([$title, $content, $service_category])) {
            $success = 'Blog post added successfully.';
        } else {
            $error = 'Failed to add blog post.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Manage Blogs | Admin | EcoDroids</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <header class="bg-blue-600 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">Manage Blogs</h1>
            <a href="dashboard.php" class="bg-gray-200 text-gray-800 px-3 py-1 rounded hover:bg-gray-300">Dashboard</a>
            <a href="logout.php" class="bg-red-500 px-3 py-1 rounded hover:bg-red-600">Logout</a>
        </div>
    </header>
    <main class="container mx-auto p-4">
        <?php if ($error): ?>
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        <?php if ($success): ?>
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4"><?php echo htmlspecialchars($success); ?></div>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="mb-4">
                <label class="block mb-2 font-semibold" for="title">Title</label>
                <input class="w-full p-2 border border-gray-300 rounded" type="text" id="title" name="title" required />
            </div>
            <div class="mb-4">
            <label class="block mb-2 font-semibold" for="content">Content</label>
            <textarea class="w-full p-2 border border-gray-300 rounded" id="content" name="content" rows="6" required></textarea>
            <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
            <script>
                tinymce.init({
                    selector: '#content',
                    height: 300,
                    menubar: false,
                    plugins: [
                        'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                        'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                        'insertdatetime', 'media', 'table', 'help', 'wordcount'
                    ],
                    toolbar: 'undo redo | blocks | bold italic underline | alignleft aligncenter alignright alignjustify | ' +
                             'bullist numlist outdent indent | removeformat | help'
                });
            </script>
            </div>
            <div class="mb-4">
                <label class="block mb-2 font-semibold" for="service_category">Service Category</label>
                <select class="w-full p-2 border border-gray-300 rounded" id="service_category" name="service_category" required>
                    <option value="">Select a category</option>
                    <?php foreach ($services as $slug => $name): ?>
                        <option value="<?php echo htmlspecialchars($slug); ?>"><?php echo htmlspecialchars($name); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition" type="submit">Add Blog Post</button>
        </form>
    </main>
</body>
</html>
