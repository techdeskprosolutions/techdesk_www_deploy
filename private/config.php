<?php
// private/config.php

$host = 'mariadb';           // Docker service name
$db   = 'techdeskpro';
$user = 'root';              // We'll change this to a limited user later
$pass = 'wE37b*fX96v`]@(^|0sx;;/q62'; // ← Change this to your real password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
