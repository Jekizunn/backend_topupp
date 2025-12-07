<?php
require_once 'koneksi.php';

if (isset($_GET['email'])) {
    $email = $_GET['email'];
    
    $sql = "SELECT * FROM transaksi WHERE email = '$email' ORDER BY id DESC";
    $result = $conn->query($sql);

    $history = array();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $history[] = $row;
        }
        echo json_encode(["status" => "success", "data" => $history]);
    } else {
        echo json_encode(["status" => "empty", "data" => []]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Email dibutuhkan"]);
}
$conn->close();
?>