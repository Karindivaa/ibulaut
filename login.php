<?php
session_start();
$conn = new mysqli("localhost", "root", "", "ibu_laut");

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query user
    $sql = "SELECT * FROM user WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Cek hasil query
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        // Verifikasi password tanpa hashing
        if ($password === $row['password']) {
            $_SESSION['username'] = $username;

            if ($username === "admin") {
                header("Location: admin.html");
            } else {
                header("Location: user.html");
            }
            exit();
        } else {
            echo "<script>alert('Username atau password salah'); window.location.href='login.html';</script>";
        }
    } else {
        echo "<script>alert('Username atau password salah'); window.location.href='login.html';</script>";
    }

    $stmt->close();
}

$conn->close();
?>
