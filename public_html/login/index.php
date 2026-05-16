<?php
session_start();
require_once __DIR__ . '/../../private/config.php';

$error = '';
$success = '';

// Handle Registration
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $first_name = trim($_POST['first_name']);
    $username   = trim($_POST['username']);
    $email      = trim($_POST['email']);
    $password   = $_POST['password'];

    if (!empty($first_name) && !empty($username) && !empty($email) && !empty($password)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        try {
            $stmt = $pdo->prepare("INSERT INTO users (first_name, username, email, password) VALUES (?, ?, ?, ?)");
            $stmt->execute([$first_name, $username, $email, $hashedPassword]);
            $success = "Account created successfully! You can now log in.";
        } catch (PDOException $e) {
            $error = "Error creating account. Username or email may already exist.";
        }
    } else {
        $error = "Please fill in all fields.";
    }
}

// Handle Login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email    = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['first_name'] = $user['first_name'];
        header("Location: /profile");
        exit;
    } else {
        $error = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login or Register • TechDesk Pro</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-zinc-950 text-zinc-200 flex items-center justify-center min-h-screen">

<div class="w-full max-w-md px-6">
    <div class="text-center mb-10">
        <h1 class="text-3xl font-semibold tracking-tight">Welcome to TechDesk Pro</h1>
        <p class="text-zinc-400 mt-2">Sign in or create your account</p>
    </div>

    <?php if ($error): ?>
        <div class="bg-red-500/10 border border-red-500/30 text-red-400 p-4 rounded-2xl mb-6"><?= $error ?></div>
    <?php endif; ?>
    <?php if ($success): ?>
        <div class="bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 p-4 rounded-2xl mb-6"><?= $success ?></div>
    <?php endif; ?>

    <!-- Login Form -->
    <div class="bg-zinc-900 border border-zinc-800 rounded-3xl p-8 mb-8">
        <h2 class="text-xl font-semibold mb-6">Sign In</h2>
        <form method="POST">
            <input type="email" name="email" placeholder="Email address" required 
                   class="w-full bg-zinc-950 border border-zinc-700 rounded-2xl px-4 py-3 mb-4 focus:outline-none focus:border-zinc-500">
            <input type="password" name="password" placeholder="Password" required 
                   class="w-full bg-zinc-950 border border-zinc-700 rounded-2xl px-4 py-3 mb-6 focus:outline-none focus:border-zinc-500">
            <button type="submit" name="login" 
                    class="w-full bg-white text-zinc-900 font-semibold py-3.5 rounded-3xl hover:bg-zinc-100 transition">
                Sign In
            </button>
        </form>
    </div>

    <!-- Register Form -->
    <div class="bg-zinc-900 border border-zinc-800 rounded-3xl p-8">
        <h2 class="text-xl font-semibold mb-6">Create Account</h2>
        <form method="POST">
            <input type="text" name="first_name" placeholder="First Name" required 
                   class="w-full bg-zinc-950 border border-zinc-700 rounded-2xl px-4 py-3 mb-4">
            <input type="text" name="username" placeholder="Username" required 
                   class="w-full bg-zinc-950 border border-zinc-700 rounded-2xl px-4 py-3 mb-4">
            <input type="email" name="email" placeholder="Email address" required 
                   class="w-full bg-zinc-950 border border-zinc-700 rounded-2xl px-4 py-3 mb-4">
            <input type="password" name="password" placeholder="Password" required 
                   class="w-full bg-zinc-950 border border-zinc-700 rounded-2xl px-4 py-3 mb-6">
            <button type="submit" name="register" 
                    class="w-full bg-white text-zinc-900 font-semibold py-3.5 rounded-3xl hover:bg-zinc-100 transition">
                Create Account
            </button>
        </form>
    </div>
</div>

</body>
</html>
