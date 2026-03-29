<?php
// config/database.php - Koneksi Database XAMPP
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "hiker_bestt"; // Pastikan DB ini ada di phpMyAdmin

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("❌ Koneksi gagal: " . $conn->connect_error);
}

// Set charset
$conn->set_charset("utf8mb4");

echo "✅ Database terkoneksi!"; // Test message (hapus nanti)
?>
