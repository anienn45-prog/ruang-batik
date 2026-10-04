<?php
include 'koneksi.php';

$id = $_GET['id'];
$d = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM data WHERE id=$id"));

if (isset($_POST['simpan'])) {
    mysqli_query($koneksi, "UPDATE data SET nama='$_POST[nama]', email='$_POST[email]', komentar='$_POST[komentar]' WHERE id=$id");
    header("Location:index.php#testimoni");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Testimoni</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
<div class="container mt-5" style="max-width:500px">

    <div class="card p-4 shadow-sm">
        <h3>Edit Testimoni</h3>

        <form method="POST">
            <input name="nama" class="form-control mb-2" value="<?= $d['nama'] ?>" required>
            <input name="email" class="form-control mb-2" value="<?= $d['email'] ?>" required>
            <textarea name="komentar" class="form-control mb-2" required><?= $d['komentar'] ?></textarea>

            <button name="simpan" class="btn btn-dark">Simpan</button>
            <a href="index.php#testimoni" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

</div>
</body>
</html>