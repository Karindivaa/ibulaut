<?php
// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "ibu_laut"); // Ganti nama database sesuai milikmu

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Ambil data dari form
$nama_depan = $_POST['nama_depan'];
$nama_belakang = $_POST['nama_belakang'];
$email = $_POST['email'];
$telepon = $_POST['telepon'];
$subjek = $_POST['subjek'];
$pesan = $_POST['pesan'];

// Simpan ke tabel pesan_kontak
$sql = "INSERT INTO pesan_kontak (nama_depan, nama_belakang, email, telepon, subjek, pesan)
        VALUES ('$nama_depan', '$nama_belakang', '$email', '$telepon', '$subjek', '$pesan')";

if ($koneksi->query($sql) === TRUE) {
    header("Location: kontak.html"); // Kembali ke halaman form setelah kirim
    exit();
} else {
    echo "Gagal menyimpan: " . $koneksi->error;
}

$koneksi->close();
?>
