<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechDesk Pro • Tools & Resources</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="bg-zinc-950 text-zinc-200">

    <!-- Navbar -->
    <nav class="border-b border-zinc-800">
        <div class="max-w-7xl mx-auto px-6 py-5 flex justify-between items-center">
            <div class="flex items-center gap-x-3">
                <div class="w-9 h-9 bg-white rounded-xl flex items-center justify-center">
                    <span class="text-zinc-900 font-bold text-2xl">T</span>
                </div>
                <span class="font-semibold text-2xl tracking-tight">TechDesk Pro</span>
            </div>
            
            <div>
                <a href="/login" 
                   class="px-5 py-2.5 rounded-2xl bg-white text-zinc-900 font-medium hover:bg-zinc-100 transition">
                    Login / Register
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="max-w-5xl mx-auto px-6 pt-20 pb-16 text-center">
        <div class="inline-flex items-center gap-x-2 px-4 py-1.5 rounded-3xl bg-zinc-900 border border-zinc-800 mb-6">
            <div class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></div>
            <span class="text-sm text-zinc-400">Now in early access</span>
        </div>
        
        <h1 class="text-6xl font-semibold tracking-tighter mb-6">
            Professional tools.<br>
            Built for serious creators.
        </h1>
        <p class="max-w-xl mx-auto text-xl text-zinc-400 mb-10">
            A curated suite of powerful tools and resources across multiple niches — 
            designed to help you work faster and smarter.
        </p>
        
        <div class="flex justify-center gap-x-4">
            <a href="/login" 
               class="px-8 py-4 rounded-3xl bg-white text-zinc-900 font-semibold text-lg hover:bg-zinc-100 transition">
                Get Started Free
            </a>
            <a href="#tools" 
               class="px-8 py-4 rounded-3xl border border-zinc-700 hover:bg-zinc-900 transition font-medium">
                Explore Tools
            </a>
        </div>
    </div>

    <!-- Tools / Niches Section -->
    <div id="tools" class="max-w-6xl mx-auto px-6 pb-20">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-semibold tracking-tight">Tools for every niche</h2>
            <p class="text-zinc-400 mt-3">One platform. Multiple powerful solutions.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            <!-- Tool Cards -->
            <div class="bg-zinc-900 border border-zinc-800 rounded-3xl p-8">
                <div class="w-12 h-12 bg-blue-500/10 text-blue-400 rounded-2xl flex items-center justify-center mb-6">
                    <i class="fa-solid fa-chart-line text-3xl"></i>
                </div>
                <h3 class="text-2xl font-semibold mb-3">Analytics Suite</h3>
                <p class="text-zinc-400">Deep insights and reporting tools for data-driven decision making.</p>
            </div>

            <div class="bg-zinc-900 border border-zinc-800 rounded-3xl p-8">
                <div class="w-12 h-12 bg-purple-500/10 text-purple-400 rounded-2xl flex items-center justify-center mb-6">
                    <i class="fa-solid fa-users text-3xl"></i>
                </div>
                <h3 class="text-2xl font-semibold mb-3">Creator Tools</h3>
                <p class="text-zinc-400">Everything content creators need to grow, manage, and monetize their audience.</p>
            </div>

            <div class="bg-zinc-900 border border-zinc-800 rounded-3xl p-8">
                <div class="w-12 h-12 bg-orange-500/10 text-orange-400 rounded-2xl flex items-center justify-center mb-6">
                    <i class="fa-solid fa-briefcase text-3xl"></i>
                </div>
                <h3 class="text-2xl font-semibold mb-3">Business Resources</h3>
                <p class="text-zinc-400">Templates, automation, and systems built for modern entrepreneurs.</p>
            </div>
        </div>
    </div>

    <footer class="border-t border-zinc-800 py-8 text-center text-sm text-zinc-500">
        © <?= date('Y') ?> TechDesk Pro. All rights reserved.
    </footer>

</body>
</html>
