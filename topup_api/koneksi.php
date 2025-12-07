<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Konfigurasi Database
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_topup";

// Membuat Koneksi
$conn = new mysqli($host, $user, $pass, $db);

// Cek Koneksi
if ($conn->connect_error) {
    die(json_encode([
        "status" => "error", 
        "message" => "Gagal koneksi database: " . $conn->connect_error
    ]));
}
?>