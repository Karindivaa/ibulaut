<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    $conn = new mysqli("localhost", "root", "", "ibu_laut"); 
    if ($conn->connect_error) {
        die("Koneksi gagal");
    }

    // Cek apakah email sudah ada
    $cek = $conn->prepare("SELECT * FROM langganan WHERE email = ?");
    $cek->bind_param("s", $email);
    $cek->execute();
    $hasil = $cek->get_result();

    if ($hasil->num_rows > 0) {
        echo "Email sudah terdaftar.";
    } else {
        $stmt = $conn->prepare("INSERT INTO langganan (email) VALUES (?)");
        $stmt->bind_param("s", $email);
        if ($stmt->execute()) {
            echo "Berlangganan berhasil!";
        } else {
            echo "Gagal menyimpan data.";
        }
    }

    $cek->close();
    $conn->close();
}
?>
