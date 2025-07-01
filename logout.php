<?php
session_start();
session_unset();     // Hapus semua variabel session
session_destroy();   // Hancurkan session

// Arahkan ke halaman utama
header("Location: index.html");
exit();
?>
