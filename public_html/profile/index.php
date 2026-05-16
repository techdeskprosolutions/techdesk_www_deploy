<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: /login");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile • TechDesk Pro</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-zinc-950 text-zinc-200">
    <div class="max-w-4xl mx-auto px-6 pt-20">
        <h1 class="text-4xl font-semibold tracking-tight">
            Welcome, <?= htmlspecialchars($_SESSION['first_name']) ?>!
        </h1>
        <p class="text-zinc-400 mt-2">You're now logged into your TechDesk Pro account.</p>
        
        <div class="mt-10">
            <a href="/login" class="text-sm text-zinc-400 hover:text-white">Logout</a>
        </div>
    </div>
</body>
</html>
