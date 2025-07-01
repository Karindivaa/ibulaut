<?php
session_start();
include 'produk.php';

$keranjang = $_SESSION['keranjang'] ?? [];
?>

<h2>Keranjang Belanja</h2>
<ul>
  <?php foreach ($keranjang as $id => $qty): ?>
    <li><?= $produk[$id]['nama'] ?> x <?= $qty ?></li>
  <?php endforeach; ?>
</ul>
