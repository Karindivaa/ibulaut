<?php
$conn = new mysqli("localhost", "root", "", "ibu_laut");

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    // Cek apakah password dan konfirmasi sama
    if ($password !== $confirm) {
        echo "<script>alert('Password dan konfirmasi tidak cocok'); window.location.href='daftar.html';</script>";
        exit();
    }

    // Cek apakah username sudah ada
    $sql = "SELECT * FROM user WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Username sudah digunakan'); window.location.href='daftar.html';</script>";
        exit();
    }

    // Masukkan user baru ke tabel (tanpa hash, bisa ditambah jika ingin lebih aman)
    $sql = "INSERT INTO user (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location.href='login.html';</script>";
    } else {
        echo "<script>alert('Gagal registrasi.'); window.location.href='daftar.html';</script>";
    }

    $stmt->close();
}

$conn->close();
?>
