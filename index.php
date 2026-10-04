<?php
include 'koneksi.php';
if (isset($_POST['simpan'])) {
    $n = $_POST['nama']; $e = $_POST['email']; $k = $_POST['komentar'];
    mysqli_query($koneksi, "INSERT INTO data (nama,email,komentar) VALUES ('$n','$e','$k')");
    header("Location:index.php");
}
$data = mysqli_query($koneksi, "SELECT * FROM data");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ruang batik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-white shadow-sm fixed-top container-fluid px-4">
    <a class="navbar-brand fw-bold" href="#"><img src="asset.foto/logo.jpg" width="30" height="30" class="align-top" alt="Logo">RuangBatik</a>
    <div class="navbar-nav ms-auto flex-row gap-3">
        <a class="nav-link p-0" href="#profil">Profil</a>
        <a class="nav-link p-0" href="#kursus">Kursus</a>
        <a class="nav-link p-0" href="#galeri">Galeri</a>
        <a class="nav-link p-0" href="#testimoni">Testimoni</a>
    </div>
</nav>

<section class="hero d-flex align-items-center">
    <div class="container">
        <div class="col-md-6">
            <h1 class="fw-bold display-5">Seni dalam Motif, Makna dalam Tradisi</h1>
            <p class="lead">Tempat belajar dan berkarya dalam seni batik.</p>
           <a href="#kursus" class="btn btn-lg fw-bold" style="background:#b8794b;color:white;">Lihat Kursus</a>
        </div>
    </div>
</section>

<section id="profil" class="py-5 text-center container">
    <h2 class="fw-bold">Tentang Ruang Batik</h2>
    <p class="text-muted">Ruang Batik berdiri pada 10 Januari 2024 sebagai ruang untuk mengenal, belajar, dan berkarya melalui seni batik. Dengan suasana belajar yang kreatif, peserta dapat mempelajari berbagai teknik membatik sambil mengenal lebih dekat keindahan budaya Indonesia.</p>
</section>

<section id="kursus" class="py-5 bg-light text-center">
    <div class="container">
        <h2 class="fw-bold mb-4">Pilihan Kursus</h2>
        <div class="row g-3">
            <?php 
            $kursus = [
                ['cating.jpg', 'Metode Cating', 'Membuat motif batik secara manual menggunakan canting dan malam, menghasilkan detail yang khas.', 'Rp75.000 / peserta.'],
                ['lukis.jpg', 'Metode Lukis', 'Batik Lukis adalah teknik membuat motif batik dengan cara melukis langsung pada kain menggunakan kuas dan pewarna.', 'Rp85.000 / peserta.'],
                ['cetak.jpg', 'Metode Cetak', 'Teknik membuat motif batik dengan menggunakan cap khusus yang diberi malam, kemudian dicetak pada kain.', 'Rp80.000 / peserta.']
            ];
            foreach($kursus as $k) { ?>
                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="asset.foto/<?= $k[0] ?>" class="img-fluid">
                        <div class="p-4"><h5><?= $k[1] ?></h5><p><?= $k[2] ?></p></div>
                        <p class="fw-bold" style="color:#b8794b;"><?= $k[3] ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<section id="galeri" class="py-5 text-center">
    <div class="container">
        <h2 class="fw-bold mb-4">Galeri</h2>
        <div class="row g-3">
            <div class="col-md-3"><img src="asset.foto/galeri1.jpg" class="img-fluid rounded shadow-sm"></div>
            <div class="col-md-3"><img src="asset.foto/galeri2.jpg" class="img-fluid rounded shadow-sm"></div>
            <div class="col-md-3"><img src="asset.foto/galeri3.jpg" class="img-fluid rounded shadow-sm"></div>
            <div class="col-md-3"><img src="asset.foto/galeri4.jpg" class="img-fluid rounded shadow-sm"></div>
        </div>
    </div>
</section>

<section id="testimoni" class="py-5 bg-light">
    <div class="container" style="max-width:500px">
        <h2 class="text-center fw-bold mb-4">Testimoni</h2>
        <form method="POST" class="mb-4">
            <input name="nama" class="form-control mb-2" placeholder="Nama" required>
            <input name="email" type="email" class="form-control mb-2" placeholder="Email" required>
            <textarea name="komentar" class="form-control mb-2" placeholder="Komentar" rows="3" required></textarea>
            <button name="simpan" class="btn btn-dark w-100">Kirim</button>
        </form>

        <?php while($d = mysqli_fetch_assoc($data)) { ?>
            <div class="card p-3 mb-2 shadow-sm">
                <b><?= htmlspecialchars($d['nama']) ?></b>
                <p class="mb-2"><?= htmlspecialchars($d['komentar']) ?></p>
                <div>
                    <a href="edit.php?id=<?= $d['id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                    <a href="hapus.php?id=<?= $d['id'] ?>" class="btn btn-sm btn-outline-danger">Hapus</a>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<section class="py-5 text-center bg-dark text-white">
    <h2>Hubungi Kami</h2>
    <p>Hubungi Ruang Batik melalui WhatsApp.</p>
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalWA">Chat WhatsApp</button>
</section>

<div class="modal fade" id="modalWA" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-4 text-center">
            <h4>Hubungi Ruang Batik</h4>
            <p class="text-muted">Silakan hubungi kami melalui WhatsApp.</p>
            <div class="d-flex justify-content-center gap-2">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="https://wa.me/628xxxxxxxxxx" target="_blank" class="btn btn-success">Buka WhatsApp</a>
            </div>
        </div>
    </div>
</div>

<footer class="text-center py-3 border-top"><small>&copy; 2026 Ruang Batik Indonesia</small></footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>