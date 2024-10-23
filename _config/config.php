<?php
// Konfigurasi database
define('DB_HOST', 'localhost');
define('DB_USER', 'root');        // Username default MySQL di XAMPP
define('DB_PASS', '');            // Password default di XAMPP adalah kosong
define('DB_NAME', 'pos-apriori'); // Nama database Anda

// Fungsi base_url untuk mendapatkan URL dasar aplikasi
function base_url($path = '') {
    return "http://localhost/penjualan-apriori/" . $path;
}

// Koneksi ke database
$con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($con->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
