<?php
session_start();
include 'config.php';


if (!empty($_SESSION['keranjang'])) {
  $keranjang = $_SESSION['keranjang'];
} elseif (!empty($_SESSION['checkout'])) {
  $keranjang = $_SESSION['checkout'];
} else {
  $keranjang = [];
}



$total = 0;
$jumlahItem = count($keranjang);

$produk = [
  [
    'id' => 0,
    'nama' => 'Abon Ikan Tuna Premium',
    'harga' => 45000,
    'terjual' => 500,
    'rating' => 4.8,
    'gambar' => 'img/produk1.png',
    'unggulan' => true,
    'deskripsi' => 'Abon ikan tuna premium yang dibuat dari ikan tuna segar pilihan...',
    'diskon' => 'Rp 55,000'
  ],
  [
    'id' => 1,
    'nama' => 'Sarden Kaleng Ikan Lemuru',
    'harga' => 28000,
    'terjual' => 320,
    'rating' => 4.7,
    'gambar' => 'img/produk2.png',
    'unggulan' => false,
    'deskripsi' => 'Sarden kaleng dari ikan lemuru segar yang kaya nutrisi. Diproses...'
  ],
  [
    'id' => 2,
    'nama' => 'Sambal Cumi Pedas Manis',
    'harga' => 35000,
    'terjual' => 280,
    'rating' => 4.9,
    'gambar' => 'img/produk3.png',
    'unggulan' => false,
    'deskripsi' => 'Sambal cumi dengan perpaduan rasa pedas dan manis yang khas...'
  ],
  [
    'id' => 3,
    'nama' => 'Sea Salt Scrub Lavender',
    'harga' => 65000,
    'terjual' => 150,
    'rating' => 4.8,
    'gambar' => 'img/produk4.png',
    'unggulan' => false,
    'deskripsi' => 'Scrub alami dari garam laut dengan aroma lavender yang menenangkan...'
  ],
  [
    'id' => 4,
    'nama' => 'Nori Ibu Laut Premium',
    'harga' => 42000,
    'terjual' => 340,
    'rating' => 4.7,
    'gambar' => 'img/produk5.png',
    'unggulan' => true,
    'deskripsi' => 'Nori premium dari rumput laut terbaik yang diproses dengan...'
  ],
  [
    'id' => 5,
    'nama' => 'Dodol Rumput Laut Original',
    'harga' => 32000,
    'terjual' => 95,
    'rating' => 4.4,
    'gambar' => 'img/produk6.png',
    'unggulan' => false,
    'deskripsi' => 'Dodol tradisional dengan inovasi rumput laut yang kaya nutrisi..'
  ],
  [
    'id' => 6,
    'nama' => 'Agar-Agar Rumput Alami',
    'harga' => 18000,
    'terjual' => 220,
    'rating' => 4.5,
    'gambar' => 'img/produk7.png',
    'unggulan' => false,
    'deskripsi' => 'Agar-agar berkualitas tinggi dari rumput laut pilihan. Kaya serat dan...'
  ],
  [
    'id' => 7,
    'nama' => 'Garam Herbal Kunyit',
    'harga' => 22000,
    'terjual' => 180,
    'rating' => 4.6,
    'gambar' => 'img/produk8.png',
    'unggulan' => false,
    'deskripsi' => 'Garam laut alami yang diperkaya dengan kunyit untuk memberikan...'
  ]
];

$jumlahItem = count($keranjang);

$total=0;
function getProdukById($produk, $id) {
  foreach ($produk as $item) {
    if ($item['id'] == $id) return $item;
  }
  return null;
}


$_SESSION['produk'] = $produk;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['beli_sekarang'])) {
    $id = $_POST['produk_id'];
    $_SESSION['keranjang'] = [$id => 1]; // hanya produk ini
    header('Location: checkout.php');
    exit;
  }
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['add_to_cart'])) {
    $id = $_POST['produk_id'];
    if (!isset($_SESSION['keranjang'])) $_SESSION['keranjang'] = [];
    if (!isset($_SESSION['keranjang'][$id])) {
      $_SESSION['keranjang'][$id] = 1;
    } else {
      $_SESSION['keranjang'][$id] += 1;
    }
    header('Location: ' . $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING']);
    exit;
  } elseif (isset($_POST['hapus_item'])) {
    $id = $_POST['produk_id'];
    unset($_SESSION['keranjang'][$id]);
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
  }
}

if (!empty($_GET['cari'])) {
  $keyword = strtolower($_GET['cari']);
  $produk = array_filter($produk, function($item) use ($keyword) {
    return strpos(strtolower($item['nama']), $keyword) !== false;
  });
}

$sort = $_GET['sort'] ?? 'unggulan';
switch ($sort) {
  case 'terendah':
    usort($produk, fn($a, $b) => $a['harga'] <=> $b['harga']);
    break;
  case 'tertinggi':
    usort($produk, fn($a, $b) => $b['harga'] <=> $a['harga']);
    break;
  case 'terbaru':
    $produk = array_reverse($produk);
    break;
  case 'unggulan':
  default:
    usort($produk, fn($a, $b) => ($b['unggulan'] ?? false) <=> ($a['unggulan'] ?? false));
    break;
}

$produk = array_values($produk);

// Proses form pembayaran
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nama'])) {
  $nama   = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $metode = $_POST['metode'];
  $keranjang = $_SESSION['keranjang'] ?? [];

  $produk_beli = '';
  $total = 0;

  foreach ($keranjang as $id => $qty) {
    if (isset($produk[$id])) {
      $produk_beli .= $produk[$id]['nama'] . " x" . $qty . ", ";
      $total += $produk[$id]['harga'] * $qty;
    }
  }

  $produk_beli = rtrim($produk_beli, ', ');

  if (!$conn) die("Koneksi ke database gagal.");

  $stmt = $conn->prepare("INSERT INTO transaksi (nama, alamat, metode, produk, total) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("ssssi", $nama, $alamat, $metode, $produk_beli, $total);
  $stmt->execute();

  // Sekarang baru hapus keranjang
  unset($_SESSION['keranjang']);

  header("Location: user.php");
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Checkout</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(to right, #e0f7fa, #ffffff);
      margin: 0;
      padding: 0;
    }
    .checkout-container {
      max-width: 960px;
      margin: 40px auto;
      background: #ffffff;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
      border-radius: 12px;
      padding: 30px;
    }
    .checkout-container h2, h3 {
      color: #00796b;
    }
    .checkout-container table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 30px;
    }
    .checkout-container th,
    .checkout-container td {
      padding: 12px 15px;
      border-bottom: 1px solid #ddd;
      text-align: left;
    }
    .checkout-container thead {
      background-color: #e0f2f1;
      font-weight: bold;
    }
    .checkout-container img {
      width: 60px;
      height: 60px;
      object-fit: cover;
      border-radius: 6px;
    }
    .checkout-container input,
    .checkout-container textarea,
    .checkout-container select {
      width: 100%;
      padding: 10px;
      margin-bottom: 16px;
      border: 1px solid #ccc;
      border-radius: 6px;
      box-sizing: border-box;
      font-size: 14px;
    }
    .checkout-container button {
      background: #00796b;
      color: white;
      padding: 14px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      width: 100%;
      font-size: 16px;
      transition: background 0.3s ease;
    }
    .checkout-container button:hover {
      background: #004d40;
    }
  </style>
</head>
<body>
  <div class="checkout-container">
    <h2>Checkout</h2>
    <h3>Ringkasan Belanja</h3>

<?php if ($jumlahItem === 1): ?>
  <!-- Tabel sederhana jika 1 produk -->
  <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
    <thead>
      <tr style="background-color: #e0f7fa;">
        <th style="padding: 8px;">Produk</th>
        <th style="padding: 8px;">Qty</th>
        <th style="padding: 8px;">Harga</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($keranjang as $id => $qty): ?>
        <?php if (isset($produk[$id])): ?>
        <tr>
          <td style="padding: 8px;"><?= $produk[$id]['nama'] ?></td>
          <td style="padding: 8px;"><?= $qty ?></td>
          <td style="padding: 8px;">Rp <?= number_format($produk[$id]['harga'] * $qty, 0, ',', '.') ?></td>
        </tr>
        <?php $total += $produk[$id]['harga'] * $qty; ?>
        <?php endif; ?>
      <?php endforeach; ?>
    </tbody>
  </table>

<?php elseif ($jumlahItem > 1): ?>
  <!-- Tabel lebih kompleks jika lebih dari 1 produk -->
  <div class="table-responsive">
    <table border="1" cellspacing="0" cellpadding="10" style="width: 100%; border-collapse: collapse; background-color: #fff;">
      <thead style="background-color: #d1e7dd;">
        <tr>
          <th>No</th>
          <th>Nama Produk</th>
          <th>Qty</th>
          <th>Harga Satuan</th>
          <th>Subtotal</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; ?>
        <?php foreach ($keranjang as $id => $qty): ?>
          <?php if (isset($produk[$id])): ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= $produk[$id]['nama'] ?></td>
            <td><?= $qty ?></td>
            <td>Rp <?= number_format($produk[$id]['harga'], 0, ',', '.') ?></td>
            <td>Rp <?= number_format($produk[$id]['harga'] * $qty, 0, ',', '.') ?></td>
          </tr>
          <?php $total += $produk[$id]['harga'] * $qty; ?>
          <?php endif; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
<?php else: ?>
  <p>Keranjang kosong.</p>
<?php endif; ?>

<!-- Total -->
<?php if ($jumlahItem > 0): ?>
  <p><strong>Total: Rp <?= number_format($total, 0, ',', '.') ?></strong></p>
<?php endif; ?>


    <h3>Formulir Pembayaran</h3>
    <form method="post">
      <label>Nama Lengkap:</label>
      <input type="text" name="nama" required>
      <label>Alamat Pengiriman:</label>
      <textarea name="alamat" required></textarea>
      <label>Metode Pembayaran:</label>
      <select name="metode">
        <option value="Transfer Bank">Transfer Bank</option>
        <option value="COD">Bayar di Tempat (COD)</option>
        <option value="QRIS">QRIS</option>
      </select>
      <button type="submit">Bayar Sekarang</button>
    </form>
  </div>
</body>
</html>
