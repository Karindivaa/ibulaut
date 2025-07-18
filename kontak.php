<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Kontak | Ibu Laut</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      background-color: #f7fbfc;
      color: #333;
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

    .info, .form {
      flex: 1;
      min-width: 320px;
      background-color: white;
      padding: 2rem;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .info h2, .form h2 {
      margin-top: 0;
      color: #007197;
    }

    .info-box {
      background-color: #f4fafe;
      border-radius: 10px;
      padding: 1rem;
      margin-bottom: 1rem;
      display: flex;
      gap: 1rem;
      align-items: flex-start;
    }

    .info-box-icon {
      font-size: 24px;
      padding: 0.5rem;
      border-radius: 50%;
      color: white;
    }

    .blue { background-color: #006080; }
    .orange { background-color: #ff6b35; }
    .gray { background-color: #567; }

    .info-box-content {
      flex: 1;
    }

    .info-box-content p {
      margin: 0.25rem 0;
    }

    .form label {
      display: block;
      margin-top: 1rem;
      font-weight: 500;
    }

    .form input, .form textarea {
      width: 100%;
      padding: 0.75rem;
      margin-top: 0.5rem;
      border: 1px solid #ccc;
      border-radius: 8px;
    }

    .form-row {
      display: flex;
      gap: 1rem;
    }

    .form-row > div {
      flex: 1;
    }

    .form button {
      margin-top: 1.5rem;
      padding: 0.75rem 2rem;
      background-color: #007197;
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
    }

    .form button:hover {
      background-color: #005d73;
    }

    @media (max-width: 768px) {
      .form-row {
        flex-direction: column;
      }
    }

    .hero {
      text-align: center;
      padding: 4rem 1rem 2rem;
    }
    .hero h2 {
      font-size: 2.5rem;
      color: #006080;
      margin-bottom: 0.5rem;
    }
    .hero span {
      color: #a06767;
    }
    .hero p {
      max-width: 600px;
      margin: auto;
      color: #555;
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
          <li><a href="user.html">Beranda</a></li>
          <li><a href="user.php">Marketplace</a></li>
          <li><a href="blog.php">Blog</a></li>
          <li><a href="kontak.php">Kontak</a></li>
        </ul>
      </nav>
  
      <!-- Kanan: Keranjang & Tombol -->
      <div class="nav-actions">
        
      <a href="logout.php" class="btn-primary">Logout</a>
      </div>
    </div>
  </header>
<section class="hero">
  <button style="background-color:#007b9e; color:#fff; border:none; padding: 0.5rem 1rem; border-radius:20px;">Hubungi Kami</button>
  <h2>Mari Terhubung dengan <span>Ibu Laut</span></h2>
  <p>
    Kami siap membantu Anda dengan pertanyaan tentang produk, kemitraan, atau informasi lainnya. Tim kami berkomitmen memberikan pelayanan terbaik untuk mendukung misi kelestarian laut bersama.
  </p>
</section>

<div class="container">
  <!-- Informasi Kontak -->
  <div class="info">
    <h2>Informasi Kontak</h2>
    <p>Kantor pusat kami berlokasi di Madura, dekat dengan sumber hasil laut terbaik. Kami juga melayani konsultasi online untuk seluruh Indonesia.</p>

    <div class="info-box">
      <div class="info-box-icon blue">📍</div>
      <div class="info-box-content">
        <strong>Alamat Kantor</strong>
        <p>Jl. Pantai Madura No. 123</p>
        <p>Bangkalan, Madura 69116</p>
        <p>Jawa Timur, Indonesia</p>
      </div>
    </div>

    <div class="info-box">
      <div class="info-box-icon orange">📞</div>
      <div class="info-box-content">
        <strong>Telepon & WhatsApp</strong>
        <p>+62 812-3456-7890</p>
        <p>+62 21-1234-5678</p>
      </div>
    </div>

    <div class="info-box">
      <div class="info-box-icon gray">✉️</div>
      <div class="info-box-content">
        <strong>Email</strong>
        <p>info@ibulaut.co.id</p>
        <p>support@ibulaut.co.id</p>
      </div>
    </div>
    <div class="info-box">
  <div class="info-box" style="background-color: #eef3fc;">
    <div class="info-box-icon" style="background-color: #2e7d32;">🕒</div>
    <div class="info-box-content">
      <strong>Jam Operasional</strong>
      <p>Senin – Jumat: 08:00 – 17:00 WIB</p>
      <p>Sabtu: 08:00 – 15:00 WIB</p>
      <p>Minggu: Tutup</p>
    </div>
  </div>
</div>
  </div>

  <!-- Form Kirim Pesan -->
  <div class="form">
    <h2>Kirim Pesan</h2>
    <p>Isi formulir di bawah ini dan kami akan merespons dalam 24 jam</p>
    <form action="#" method="POST">
      <div class="form-row">
        <div>
          <label for="nama_depan">Nama Depan *</label>
          <input type="text" id="nama_depan" name="nama_depan" required placeholder="Masukkan nama depan" />
        </div>
        <div>
          <label for="nama_belakang">Nama Belakang *</label>
          <input type="text" id="nama_belakang" name="nama_belakang" required placeholder="Masukkan nama belakang" />
        </div>
      </div>

      <label for="email">Email *</label>
      <input type="email" id="email" name="email" required placeholder="nama@email.com" />

      <label for="telepon">Nomor Telepon</label>
      <input type="text" id="telepon" name="telepon" placeholder="+62 812-3456-7890" />

      <label for="subjek">Subjek *</label>
      <input type="text" id="subjek" name="subjek" required placeholder="Tentang apa pesan Anda?" />

      <label for="pesan">Pesan *</label>
      <textarea id="pesan" name="pesan" rows="5" required placeholder="Tulis pesan Anda di sini..."></textarea>

      <button type="submit">Kirim Pesan</button>
    </form>
  </div>
</div>

<!-- FAQ -->
<<!-- Section FAQ -->
<section style="background-color: #eaf6fc; padding: 60px 20px; text-align: center;">
  <!-- Label -->
  <div style="display: flex; justify-content: center; margin-bottom: 10px;">
    <span style="
      background-color: #f97316;
      color: white;
      padding: 6px 16px;
      border-radius: 20px;
      font-weight: bold;
      font-size: 0.9rem;
    ">
      🔍 Pertanyaan Umum
    </span>
  </div>

  <!-- Judul -->
  <h2 style="font-size: 2rem; color: #044e6e; margin-bottom: 10px;">Pertanyaan yang Sering Diajukan</h2>

  <!-- Subjudul -->
  <p style="color: #5b6f7c; max-width: 600px; margin: 0 auto 40px auto;">
    Temukan jawaban untuk pertanyaan yang paling sering ditanyakan
  </p>

  <!-- FAQ Card 1 -->
  <div style="max-width: 800px; margin: 0 auto 20px auto; background: white; padding: 20px; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); text-align: left;">
    <strong>Bagaimana cara memesan produk Ibu Laut?</strong>
    <p>Anda dapat memesan produk kami melalui website ini dengan mengklik tombol "Beli" pada produk yang diinginkan. Kami juga melayani pemesanan melalui WhatsApp di +62 812-3456-7890.</p>
  </div>

  <!-- FAQ Card 2 -->
  <div style="max-width: 800px; margin: 0 auto 20px auto; background: white; padding: 20px; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); text-align: left;">
    <strong>Apakah Ibu Laut melayani pengiriman ke seluruh Indonesia?</strong>
    <p>Ya, kami melayani pengiriman ke seluruh Indonesia melalui layanan ekspedisi terpercaya. Estimasi waktu dan biaya pengiriman akan diinformasikan saat pemesanan.</p>
  </div>

   <!-- FAQ Card 3 -->
   <div style="max-width: 800px; margin: 0 auto 20px auto; background: white; padding: 20px; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); text-align: left;">
    <strong>Bagaimana jika produk yang diterima rusak?</strong>
    <p>Silakan hubungi tim support kami melalui email atau WhatsApp maksimal 2x24 jam setelah produk diterima, disertai bukti foto kerusakan. Kami akan bantu proses pengembalian atau penggantian produk.</p>
  </div>

   <!-- FAQ Card 4 -->
   <div style="max-width: 800px; margin: 0 auto 20px auto; background: white; padding: 20px; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); text-align: left;">
    <strong>Apakah semua produk Ibu Laut bersertifikat halal? </strong>
    <p>Ya, semua produk kami telah mendapatkan sertifikasi halal dari MUI. Kami juga memiliki sertifikasi organik untuk produk-produk tertentu.</p>
  </div>
</section>


<!-- Bagian Ajakan Bergabung -->
<section style="background-color: #015c7a; padding: 60px 20px; text-align: center; color: white;">
  <h2 style="font-size: 2.2rem; margin-bottom: 20px;">Siap Bergabung dengan Misi Kelestarian Laut?</h2>
  <p style="font-size: 1.1rem; max-width: 700px; margin: 0 auto 30px auto;">
    Mari bersama-sama melestarikan laut Indonesia sambil menikmati hasil laut berkualitas tinggi
  </p>
  
  <!-- Tombol Aksi -->
  <div style="display: flex; justify-content: center; gap: 20px; flex-wrap: wrap;">
    <a href="/marketplace" style="background-color: #f97316; color: white; padding: 12px 24px; border-radius: 8px; font-weight: bold; text-decoration: none;">
      Belanja Sekarang
    </a>
    <a href="/mitra" style="border: 2px solid white; color: white; padding: 12px 24px; border-radius: 8px; font-weight: bold; text-decoration: none;">
      🤝 Jadi Mitra
    </a>
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
    <a href="https://wa.me/your-number" class="btn-sosmed wa" target="_blank">📱 WhatsApp</a>
    <a href="https://instagram.com/yourusername" class="btn-sosmed ig" target="_blank">📷 Instagram</a>
    <a href="https://twitter.com/yourusername" class="btn-sosmed tw" target="_blank">🐦 Twitter</a>
  </div>
  <hr>
  <p>© 2024 Ibu Laut. Semua hak dilindungi. Dibuat dengan <span class="heart">❤️</span> untuk kelestarian laut Indonesia.</p>
</div>
</body>
</html>
