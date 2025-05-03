<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Dashboard | EcoDroids</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <header class="bg-blue-600 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">Admin Dashboard</h1>
            <a href="logout.php" class="bg-red-500 px-3 py-1 rounded hover:bg-red-600">Logout</a>
        </div>
    </header>
    <main class="container mx-auto p-4">
        <h2 class="text-2xl font-semibold mb-4">Welcome, <?php echo htmlspecialchars($_SESSION['admin_username']); ?>!</h2>
        <p>This is a simple admin dashboard. You can extend this to manage your website content.</p>
        <!-- Add admin management features here -->
    </main>
</body>
</html>
