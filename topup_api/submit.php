<?php
require_once 'koneksi.php';

$json_mentah = file_get_contents('php://input');
$data = json_decode($json_mentah, true);

if (!empty($data['game_id']) && !empty($data['jumlah_diamond']) && !empty($data['email'])) {
    
    $game_id    = $data['game_id'];
    $game_title = $data['game_title'];
    $diamond    = $data['jumlah_diamond'];
    $email      = $data['email'];
    
    $tanggal    = date('Y-m-d H:i:s'); 

    $sql = "INSERT INTO transaksi (game_id, game_title, jumlah_diamond, email, tanggal) 
            VALUES ('$game_id', '$game_title', '$diamond', '$email', '$tanggal')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Top Up Berhasil", "status" => "success"]);
    } else {
        echo json_encode(["message" => "Gagal: " . $conn->error, "status" => "error"]);
    }
} else {
    echo json_encode(["message" => "Data tidak lengkap", "status" => "error"]);
}
$conn->close();
?>