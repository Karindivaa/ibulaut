<?php
session_start();

$produk = [
  [
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
    'nama' => 'Sarden Kaleng Ikan Lemuru',
    'harga' => 28000,
    'terjual' => 320,
    'rating' => 4.7,
    'gambar' => 'img/produk2.png',
    'unggulan' => false,
    'deskripsi' => 'Sarden kaleng dari ikan lemuru segar yang kaya nutrisi. Diproses...'
  ],
  [
    'nama' => 'Sambal Cumi Pedas Manis',
    'harga' => 35000,
    'terjual' => 280,
    'rating' => 4.9,
    'gambar' => 'img/produk3.png',
    'unggulan' => false,
    'deskripsi' => 'Sambal cumi dengan perpaduan rasa pedas dan manis yang khas...'
  ],
  [
    'nama' => 'Sea Salt Scrub Lavender',
    'harga' => 65000,
    'terjual' => 150,
    'rating' => 4.8,
    'gambar' => 'img/produk4.png',
    'unggulan' => false,
    'deskripsi' => 'Scrub alami dari garam laut dengan aroma lavender yang menenangkan...'
  ],
  [
    'nama' => 'Nori Ibu Laut Premium',
    'harga' => 42000,
    'terjual' => 340,
    'rating' => 4.7,
    'gambar' => 'img/produk5.png',
    'unggulan' => true,
    'deskripsi' => 'Nori premium dari rumput laut terbaik yang diproses dengan...'
  ],
  [
    'nama' => 'Dodol Rumput Laut Original',
    'harga' => 32000,
    'terjual' => 95,
    'rating' => 4.4,
    'gambar' => 'img/produk6.png',
    'unggulan' => false,
    'deskripsi' => 'Dodol tradisional dengan inovasi rumput laut yang kaya nutrisi..'
  ],
  [
    'nama' => 'Agar-Agar Rumput Alami',
    'harga' => 18000,
    'terjual' => 220,
    'rating' => 4.5,
    'gambar' => 'img/produk7.png',
    'unggulan' => false,
    'deskripsi' => 'Agar-agar berkualitas tinggi dari rumput laut pilihan. Kaya serat dan...'
  ],
  [
    'nama' => 'Garam Herbal Kunyit',
    'harga' => 22000,
    'terjual' => 180,
    'rating' => 4.6,
    'gambar' => 'img/produk8.png',
    'unggulan' => false,
    'deskripsi' => 'Garam laut alami yang diperkaya dengan kunyit untuk memberikan...'
  ]
];

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

$produk = array_values($produk);


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


?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Produk | Ibu Laut</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f1faff;
      margin: 0;
      padding: 0;
    }

    .container {
  width: 90%;
  max-width: 1200px;
  margin: auto;
  display: flex;
  align-items: center;  /* Bikin semua isi sejajar tengah */
  justify-content: space-between;
}

.navbar {
  background: #ffffff;
  height: 70px; /* Tinggi tetap agar tidak melebar saat logo dibesarkan */
  display: flex;
  align-items: center;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
  position: sticky;
  top: 0;
  z-index: 1000;
}

/* Container logo + nama */
.brand {
  display: flex;
  align-items: center;
  gap: 0.6rem;
}

/* Logo bergoyang naik turun */
.logo {
  height: 60px;        /* Besarkan logo sesuai keinginan */
  width: auto;
  animation: floatUpDown 2.5s ease-in-out infinite;
  object-fit: contain;
}

/* Hanya teks, tidak ikut animasi */
.brand-name {
  font-size: 1.4rem;
  font-weight: 600;
  color: #005f73;
  font-family: 'Segoe UI', sans-serif;
}

/* Keyframes animasi naik-turun */
@keyframes floatUpDown {
  0%   { transform: translateY(0); }
  50%  { transform: translateY(-8px); }
  100% { transform: translateY(0); }
}


nav ul {
  list-style: none;
  display: flex;
  gap: 1.5rem;
}

nav a {
  text-decoration: none;
  color: #0f3557;        /* Warna default teks menu */
  font-weight: 500;
  transition: color 0.2s ease-in-out;
}

nav a:hover {
  color: #f1670b;        /* Warna saat diarahkan kursor */
}

nav a:active {
  color: #00294f;        /* Warna saat diklik (tekan) */
}

.cart-btn {
  font-size: 1.5rem;
  text-decoration: none;
  color: #005f73;
  padding: 0.4rem;
  border-radius: 6px;
  transition: all 0.2s ease-in-out;
  background: none;
  border: none;
}

.cart-btn:hover {
  background-color: #e0f4f3;  /* Warna saat hover */
  transform: scale(1.1);
}

.cart-btn:active {
  background-color: #bde6e4;  /* Warna saat klik */
  transform: scale(0.95);
}

/* Gaya dasar tombol */
.btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 0.5rem;
  padding: 10px 16px;
  font-size: 0.95rem;
  font-weight: 600;
  border-radius: 8px;
  border: none;
  cursor: pointer;
  transition: all 0.3s ease;
  width: 100%;
  text-align: center;
  white-space: nowrap;
}

/* Tombol Keranjang */
.btn-keranjang {
  background-color: #f3f3f3;
  color: #333;
  border: 2px solid #ccc;
}

.btn-keranjang:hover {
  background-color: #e0e0e0;
  border-color: #aaa;
}

/* Tombol Beli */
.btn-beli {
  background-color: #00796b;
  color: #fff;
  margin-top: 8px;
}

.btn-beli:hover {
  background-color: #00695c;
}

/* Ikon emoji bisa diganti SVG jika dibutuhkan */


.btn-primary {
  background-color: #005f73;
  color: white;
  padding: 0.6rem 1.2rem;
  border-radius: 6px;
  text-decoration: none;
}

.btn-outline {
  padding: 0.6rem 1.2rem;
  border: 1px solid #005f73;
  border-radius: 6px;
  text-decoration: none;
  color: #005f73;
  margin-left: 1rem;
}
    .produk-navigasi {
      padding: 40px 20px 20px;
      text-align: center;
    }

    .produk-navigasi h2 {
      color: #075985;
      font-size: 28px;
      font-weight: bold;
      margin-bottom: 8px;
    }

    .produk-navigasi p {
      color: #64748b;
      margin-bottom: 30px;
    }

    .produk-toolbar {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 12px;
      margin-bottom: 16px;
    }

    .produk-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 20px;
  padding: 0 20px;
}

    .search-bar input {
      padding: 10px 14px;
      width: 240px;
      border: 1px solid #cbd5e1;
      border-radius: 6px;
      outline: none;
    }

    .sort-filter select,
    .btn-filter {
      padding: 10px 12px;
      border-radius: 6px;
      border: 1px solid #cbd5e1;
      background-color: white;
      cursor: pointer;
    }

    .btn-filter {
      border: 2px solid #0f172a;
    }

    .view-toggle button {
      padding: 10px 14px;
      background-color: white;
      border: 1px solid #cbd5e1;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
    }

    .view-toggle button.active {
      background-color: #075985;
      color: white;
    }

    .produk-info {
      margin-top: 12px;
      font-size: 14px;
      color: #475569;
    }

  
    .section-label {
  background-color: #ff884d;
  color: white;
  display: inline-block;
  padding: 5px 15px;
  border-radius: 20px;
  font-size: 14px;
  margin-bottom: 10px;
}

.section-title {
  font-size: 28px;
  color: #004b6b;
  font-weight: 700;
  margin-bottom: 10px;
}

.section-subtitle {
  font-size: 16px;
  color: #444;
  margin-bottom: 40px;
}

.produk-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 25px;
  justify-content: center;
}

.produk-card {
  width: 100%;
  max-width: 300px;
  border: 1px solid #ddd;
  border-radius: 12px;
  background: #fff;
  font-family: 'Segoe UI', sans-serif;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
  overflow: hidden;
  position: relative;
  margin: 16px auto;
}

.produk-gambar {
  width: 100%;
  height: 220px; /* tinggi tetap */
  overflow: hidden;
  border-bottom: 1px solid #eee;
  position: relative;
  background: #fff; /* putih atau sesuai tema */
  display: flex;
  align-items: center;
  justify-content: center;
  border-top-left-radius: 12px;
  border-top-right-radius: 12px;
}

.produk-gambar img {
  width: 100%;
  height: 100%;
  object-fit: contain; /* tidak zoom, tidak terpotong */
  display: block;
}


.produk-label {
  position: absolute;
  top: 10px;
  left: 10px;
  display: flex;
  flex-wrap: wrap;
  gap: 4px;
}

.label {
  font-size: 11px;
  padding: 3px 8px;
  border-radius: 12px;
  color: #fff;
  font-weight: 600;
}

.label.halal { background-color: #27ae60; }
.label.organik { background-color: #1abc9c; }
.label.diskon { background-color: #e74c3c; }

.icon-favorit {
  position: absolute;
  top: 10px;
  right: 10px;
  font-size: 20px;
  color: #ccc;
  cursor: pointer;
  transition: color 0.3s;
}
.icon-favorit:hover {
  color: #e74c3c;
}

.produk-info {
  padding: 14px;
}

.produk-info h3 {
  font-size: 15px;
  margin-bottom: 6px;
  color: #004d61;
}

.produk-info p {
  font-size: 13px;
  color: #555;
  margin-bottom: 8px;
}

.produk-rating {
  font-size: 13px;
  margin-bottom: 6px;
  color: #f39c12;
}

.terjual {
  color: #777;
  font-size: 12px;
}

.produk-harga {
  margin-bottom: 10px;
}

.produk-harga strong {
  font-size: 17px;
  color: #000;
}

.harga-coret {
  text-decoration: line-through;
  color: #aaa;
  font-size: 13px;
  margin-left: 10px;
}

.beli-wrapper {
  margin-top: 8px;
}

.btn-beli,
.btn-beli-outline {
  width: 100%;
  padding: 10px;
  border-radius: 8px;
  font-size: 14px;
  font-weight: bold;
  cursor: pointer;
  transition: all 0.3s ease;
}

.btn-beli {
  background-color: #005c63;
  color: white;
  border: none;
}

.btn-beli-outline {
  background-color: transparent;
  border: 2px solid #f4741f;
  color: #f4741f;
}

.btn-beli-outline:hover {
  background-color: #f4741f;
  color: white;
}

    .footer {
  background-color: #0f172a;
  color: white;
  padding: 40px 20px;
}

.footer-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  max-width: 1200px;
  margin: auto;
  gap: 24px;
}

.footer-col {
  flex: 1 1 200px;
}

.footer-col h4 {
  color: #fb7a3c;
  font-size: 18px;
  margin-bottom: 12px;
}

.footer-col ul {
  list-style: none;
  padding: 0;
}

.footer-col ul li {
  margin-bottom: 8px;
}

.footer-col ul li a {
  color: #cbd5e1;
  text-decoration: none;
  transition: color 0.3s;
}

.footer-col ul li a:hover {
  color: white;
}

.footer-col.brand h3 {
  font-size: 20px;
  margin-bottom: 12px;
}

.logo-text {
  display: flex;
  align-items: center;
  gap: 8px;
  margin-bottom: 10px;
}

.logo-text img {
  height: 30px;
}

.logo-text span {
  font-size: 20px;
  font-weight: bold;
  color: #fb7a3c;
}

.brand-description {
  color: #cbd5e1;
  font-size: 14px;
  line-height: 1.6;
  max-width: 280px;
}

.footer-bottom {
  background-color: #0f172a;
  color: #cbd5e1;
  text-align: center;
  padding: 20px;
  font-size: 14px;
}

.social-icons {
  margin-bottom: 12px;
}

.btn-sosmed {
  display: inline-block;
  padding: 6px 14px;
  border-radius: 6px;
  color: white;
  font-size: 14px;
  text-decoration: none;
  margin: 0 6px;
  border: 2px solid;
  background-color: transparent;
  transition: all 0.3s ease;
}

/* WhatsApp */
.btn-sosmed.wa {
  border-color: #25D366;
  color: #25D366;
}

.btn-sosmed.wa:hover,
.btn-sosmed.wa:focus {
  background-color: #25D366;
  color: #fff;
}

/* Instagram */
.btn-sosmed.ig {
  border-color: #dc2743;
  color: #dc2743;
}

.btn-sosmed.ig:hover,
.btn-sosmed.ig:focus {
  background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888);
  color: #fff;
}

/* Twitter */
.btn-sosmed.tw {
  border-color: #1DA1F2;
  color: #1DA1F2;
}

.btn-sosmed.tw:hover,
.btn-sosmed.tw:focus {
  background-color: #1DA1F2;
  color: #fff;
}

.footer-bottom hr {
  border: 0;
  border-top: 1px solid #1e293b;
  margin: 16px auto;
  width: 90%;
}

.footer-bottom .heart {
  color: #f43f5e;
  font-weight: bold;
}
/* POPUP STYLE */
.popup-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  z-index: 9999;
  display: flex;
  justify-content: center;
  align-items: center;
}

.popup-box {
  background: #fff;
  padding: 2rem;
  border-radius: 16px;
  max-width: 400px;
  width: 90%;
  text-align: center;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
  animation: popup-fade-in 0.3s ease-in-out;
}

@keyframes popup-fade-in {
  from {
    transform: translateY(-10px);
    opacity: 0;
  }
  to {
    transform: translateY(0);
    opacity: 1;
  }
}

.popup-box h3 {
  margin-bottom: 0.5rem;
  font-size: 1.4rem;
  color: #333;
}

.popup-box p {
  color: #666;
  margin-bottom: 1.5rem;
}

.popup-actions {
  display: flex;
  justify-content: center;
  gap: 1rem;
  flex-wrap: wrap;
}

.popup-button {
  padding: 0.6rem 1.2rem;
  border: none;
  border-radius: 8px;
  font-weight: 600;
  cursor: pointer;
  background: #ccc;
  color: #333;
  transition: background 0.3s ease;
}

.popup-button.utama {
  background: #00796B;
  color: white;
}

.popup-button:hover {
  opacity: 0.9;
}

.hidden {
  display: none;
}



  </style>
</head>
<body>

<header class="navbar">
    <div class="container">
      
      <!-- Kiri: Logo + Nama Brand -->
      <div class="brand">
        <img src="img/logo.png" alt="Ibu Laut" class="logo">
        <span class="brand-name">Ibu Laut</span>
      </div>
  
      <!-- Tengah: Menu Navigasi -->
      <nav class="menu">
        <ul>
          <li><a href="index.html">Beranda</a></li>
          <li><a href="produk.php">Marketplace</a></li>
          <li><a href="blog.html">Blog</a></li>
          <li><a href="kontak.html">Kontak</a></li>
        </ul>
      </nav>
  
      <!-- Kanan: Keranjang & Tombol -->
      <div class="nav-actions">
        
        <a href="login.html" class="btn-primary">Login</a>
        <a href="daftar.html" class="btn-primary">Daftar</a>
      </div>
  
    </div>
  </header>
  
  <div id="cartBox" style="display:none; position: fixed; top: 70px; right: 20px; background: #ffffff; border: 1px solid #ccc; padding: 10px; width: 280px; z-index: 999;">
  <h4>🛒 Keranjang</h4>
  <?php if (!empty($_SESSION['keranjang'])): ?>
    <ul style="list-style: none; padding: 0;">
      <?php foreach ($_SESSION['keranjang'] as $id => $qty): ?>
        <?php if (isset($produk[$id])): ?>
        <li style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
          <img src="<?= $produk[$id]['gambar'] ?>" alt="<?= $produk[$id]['nama'] ?>" style="width: 40px; height: 40px; object-fit: cover;">
          <div>
            <strong><?= $produk[$id]['nama'] ?></strong><br>
            Rp <?= number_format($produk[$id]['harga'], 0, ',', '.') ?> x <?= $qty ?>
          </div>
          <form method="post" style="margin-left:auto;">
            <input type="hidden" name="produk_id" value="<?= $id ?>">
            <button name="hapus_item" style="background: #dc3545; color: white; border: none; padding: 4px 8px; border-radius: 4px; cursor: pointer;">&times;</button>
          </form>
        </li>
        <?php endif; ?>
      <?php endforeach; ?>
    </ul>
  <?php else: ?>
    <p>Keranjang kosong.</p>
  <?php endif; ?>
</div>

<script>
  const toggleBtn = document.getElementById('toggleCart');
  const cartBox = document.getElementById('cartBox');
  toggleBtn.addEventListener('click', function() {
    cartBox.style.display = cartBox.style.display === 'none' ? 'block' : 'none';
  });
</script>



<section class="produk-navigasi">
  <h2>Produk Laut Berkualitas</h2>
  <p>Temukan berbagai produk olahan laut berkelanjutan dari Madura</p>

  <form method="get" style="display: flex; justify-content: center; align-items: center; gap: 12px; flex-wrap: wrap; margin-bottom: 20px;">

  <!-- Input Cari Produk -->
  <input 
    type="text" 
    name="cari" 
    placeholder="Cari produk..." 
    value="<?= htmlspecialchars($_GET['cari'] ?? '') ?>" 
    style="width: 200px; padding: 8px 12px; border: 1px solid #ccc; border-radius: 6px;"
  >

  <!-- Dropdown Kategori -->
  <select 
    name="sort" 
    onchange="this.form.submit()" 
    style="padding: 8px 12px; border-radius: 6px; border: 1px solid #ccc; background-color: #f8f9fa; cursor: pointer;"
  >
    <option value="unggulan" <?= $sort === 'unggulan' ? 'selected' : '' ?>>Produk Unggulan</option>
    <option value="terendah" <?= $sort === 'terendah' ? 'selected' : '' ?>>Harga Terendah</option>
    <option value="tertinggi" <?= $sort === 'tertinggi' ? 'selected' : '' ?>>Harga Tertinggi</option>
    <option value="terbaru" <?= $sort === 'terbaru' ? 'selected' : '' ?>>Terbaru</option>
  </select>

  <!-- Tombol Cari -->
  <button 
    type="submit" 
    style="padding: 8px 16px; background-color: #007bff; color: white; border: none; border-radius: 6px; cursor: pointer;"
  >Cari</button>

  <!-- Tombol Reset -->
  <a 
    href="produk.php" 
    style="padding: 8px 16px; background-color: #dc3545; color: white; text-decoration: none; border-radius: 6px;"
  >Reset</a>

</form>

</section>

<section class="produk-unggulan">
  <div class="container1">
    <div class="produk-grid">
    <?php foreach ($produk as $index => $p): ?>

  <div class="produk-card">
    <div class="produk-gambar">
      <img src="<?= $p['gambar'] ?>" alt="<?= $p['nama'] ?>">
      <div class="produk-label">
        <span class="label halal">Halal</span>
        <span class="label organik">Organik</span>
        <?php if (isset($p['diskon'])): ?>
        <span class="label diskon">HEMAT <?= number_format((1 - ($p['harga'] / (int)filter_var($p['diskon'], FILTER_SANITIZE_NUMBER_INT))) * 100, 0) ?>%</span>
        <?php endif; ?>
      </div>
      <div class="icon-favorit">🤍</div>
    </div>
    <div class="produk-info">
      <h3><?= $p['nama'] ?></h3>
      <p><?= $p['deskripsi'] ?></p>
      <div class="produk-rating">
        ⭐ <?= $p['rating'] ?> &nbsp;&nbsp; <span class="terjual"><?= $p['terjual'] ?> terjual</span>
      </div>
      <div class="produk-harga">
        <strong>Rp <?= number_format($p['harga'], 0, ',', '.') ?></strong>
        <?php if (isset($p['diskon'])): ?>
        <span class="harga-coret"><?= $p['diskon'] ?></span>
        <?php endif; ?>
      </div>
      <div class="beli-wrapper">
      <div class="produk-kartu">
  ...
  <button class="btn btn-keranjang">🛒 Tambahkan Ke Keranjang</button>
  <button class="btn btn-beli">⚡ Beli Sekarang</button>
</div>
</div>

    
    </div>
  </div>
<?php endforeach; ?>
    </div>
  </div>
</section>
      
<!-- FOOTER -->
<footer class="footer">
  <div class="footer-container">
    <div class="footer-col brand">
      <div class="footer-col ">
        <div class="logo-text">
          <img src="img/logo.png" alt="Logo Ibu Laut">
          <span>Ibu Laut</span>
        </div>
        <p class="brand-description">
          Menghadirkan hasil laut berkualitas tinggi sambil melestarikan ekosistem laut dan memberdayakan masyarakat pesisir Madura.
        </p>
      </div>
      

    <div class="footer-col">
      <h4>Produk</h4>
      <ul>
        <li><a href="#">Abon Ikan</a></li>
        <li><a href="#">Sarden Kaleng</a></li>
        <li><a href="#">Sambal Cumi</a></li>
        <li><a href="#">Garam Herbal</a></li>
      </ul>
    </div>

    <div class="footer-col">
      <h4>Perusahaan</h4>
      <ul>
        <li><a href="#">Tentang Kami</a></li>
        <li><a href="#">Blog</a></li>
        <li><a href="#">Kontak</a></li>
        <li><a href="#">Karir</a></li>
      </ul>
    </div>

    <div class="footer-col">
      <h4>Bantuan</h4>
      <ul>
        <li><a href="#">FAQ</a></li>
        <li><a href="#">Pengiriman</a></li>
        <li><a href="#">Kebijakan Privasi</a></li>
        <li><a href="#">Syarat & Ketentuan</a></li>
      </ul>
    </div>
  </div>
</footer>

<div class="footer-bottom">
<div class="social-icons">
    <a href="https://wa.me/+6289512944500" class="btn-sosmed wa" target="_blank">📱 WhatsApp</a>
    <a href="https://instagram.com/arumicahyoo" class="btn-sosmed ig" target="_blank">📷 Instagram</a>
  </div>
  <hr>
  <p>© 2024 Ibu Laut. Semua hak dilindungi. Dibuat dengan <span class="heart">❤️</span> untuk kelestarian laut Indonesia.</p>
</div>

<!-- Popup Notifikasi Login -->
<div id="popup-login" class="popup-overlay hidden">
  <div class="popup-box">
    <h3>Anda belum login</h3>
    <p>Silakan login atau daftar terlebih dahulu untuk melanjutkan transaksi.</p>
    <div class="popup-actions">
      <a href="login.php" class="popup-button utama">Login Sekarang</a>
      <button onclick="closePopup()" class="popup-button">Nanti Saja</button>
    </div>
  </div>
</div>

</body>
<script>
  // Fungsi membuka popup
  function showPopup() {
    document.getElementById("popup-login").classList.remove("hidden");
  }

  // Fungsi menutup popup
  function closePopup() {
    document.getElementById("popup-login").classList.add("hidden");
  }

  // Tambahkan event listener ke semua tombol beli dan keranjang
  document.querySelectorAll('.btn-beli, .btn-keranjang').forEach(btn => {
    btn.addEventListener('click', function (e) {
      e.preventDefault(); // Hindari aksi default
      showPopup();        // Tampilkan popup
    });
  });
</script>

</html>