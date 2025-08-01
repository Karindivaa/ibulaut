<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Blog Ibu Laut</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #f0f8ff;
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

    .hero {
      text-align: center;
      padding: 60px 20px;
      background-color: #eaf6fc;
    }

    .hero h2 {
      color: #044e6e;
      font-size: 2.5rem;
      margin-bottom: 12px;
    }

    .hero p {
      color: #5b6f7c;
      max-width: 700px;
      margin: 0 auto;
      font-size: 1.1rem;
    }

    .title-row {
      max-width: 1200px;
      margin: 20px auto 10px;
      padding: 0 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .title-row h3 {
      color: #044e6e;
      margin: 0;
    }

    .featured-label {
      background-color: #f97316;
      color: white;
      padding: 5px 14px;
      border-radius: 16px;
      font-size: 0.8rem;
      font-weight: bold;
    }

    .artikel-section {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
    }

    .card-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
    }

    .card {
      width: 300px;
      background-color: #f5f5f5;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .blog-wrapper {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 24px;
  padding: 40px 20px;
  max-width: 1200px;
  margin: auto;
}

.card-blog {
  background-color: #f9f9f9;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
  overflow: hidden;
  transition: transform 0.3s ease;
}

.card-blog:hover {
  transform: translateY(-5px);
}

.card-blog img {
  width: 100%;
  height: 180px;
  object-fit: cover;
  display: block;
}

.konten-blog {
  padding: 20px;
}

.konten-blog .tanggal {
  font-size: 13px;
  color: #777;
  margin-bottom: 8px;
}

.konten-blog h3 {
  font-size: 18px;
  color: #004c6d;
  margin-bottom: 10px;
}

.konten-blog p {
  font-size: 14px;
  color: #333;
  margin-bottom: 10px;
}

.konten-blog a {
  font-weight: bold;
  color: #007bff;
  text-decoration: none;
}


    .card .image {
      height: 180px;
      background-color: #ddd;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .card img {
      width: 100px;
    }

    .card .content {
      padding: 16px;
    }

    .card h4 {
      color: #044e6e;
      margin: 10px 0 6px 0;
    }

    .card p {
      font-size: 0.9rem;
      color: #333;
    }

    .card small {
      color: #777;
    }

    .read-more {
      display: block;
      margin-top: 10px;
      font-weight: bold;
      text-decoration: none;
      color: #0c63e7;
    }

    .read-more:hover {
      text-decoration: underline;
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

  <section class="hero">
    <h2>Blog Ibu Laut</h2>
    <p>
      Jelajahi dunia kelautan Indonesia melalui artikel-artikel inspiratif tentang
      kelestarian laut, komunitas nelayan, dan inovasi produk laut berkelanjutan
    </p>
  </section>

  <div class="title-row">
    <h3>Artikel Unggulan</h3>
    <div class="featured-label">Featured</div>
  </div>

  <section class="artikel-section">
    <div class="card-container">

      <!-- Artikel 1 -->
      <div class="blog-wrapper">
        <div class="card-blog">
          <img src="img/blog1.png" alt="Gambar Blog">
          <div class="konten-blog">
            <p class="tanggal">20/1/2024 • 8 menit baca</p>
            <h3>🌊 MA Larang Ekspor Pasir Laut Demi Lingkungan</h3>
            <p>Mahkamah Agung (MA) Republik Indonesia resmi membatalkan Peraturan Pemerintah...</p>
            <a href="https://www.sapos.co.id/berita/2456202029/putusan-bersejarah-ma-ekspor-pasir-laut-resmi-dilarang-aturan-jokowi-dibatalkan-demi-lingkungan-maritim">Baca Selengkapnya</a>
          </div>
        </div>
      
        <div class="card-blog">
          <img src="img/blog2.png " alt="Gambar Blog">
          <div class="konten-blog">
            <p class="tanggal">18/1/2024 • 6 menit baca</p>
            <h3>🪸 Museum Siwalima Bangun Galeri Kelautan Maluku</h3>
            <p>Museum Siwalima memperkuat perannya sebagai pusat edukasi maritim...</p>
            <a href="https://www.liputan6.com/regional/read/6059572/museum-siwalima-pusat-informasi-budaya-dan-maritim-di-maluku">Baca Selengkapnya</a>
          </div>
        </div>
      
        <div class="card-blog">
          <img src="img/blog3.png" alt="Gambar Blog">
          <div class="konten-blog">
            <p class="tanggal">15/1/2024 • 7 menit baca</p>
            <h3>🚢 Peningkatan Pembajakan di Selat Singapura dan Malaka</h3>
            <p>Laporan dari IMO mencatat 43 insiden pembajakan di Asia...</p>
            <a href="https://container-news.com/piracy-and-ship-robbery-in-asian-waters-surge-in-early-2025/">Baca Selengkapnya</a>
          </div>
        </div>
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

</body>
</html>
