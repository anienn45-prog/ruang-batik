<?php
include 'koneksi.php';
mysqli_query(
    $koneksi,
    "DELETE FROM data WHERE id='$_GET[id]'"
);
header("Location:index.php");
?>