<?php
require_once('koneksi/database.php');

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];

    $query = "INSERT INTO portofolio(nama, deskripsi) VALUES('{$nama}', '{$deskripsi}')";
    $result = mysqli_query($connectDb, $query);
    mysqli_close($connectDb);

    if ($result) {
        header('location:adminportofolio.php?tambah=sukses');
    } else {
        header('location:adminportofolio.php?tambah=gagal');
    }
} else {
    header('location:adminportofolio.php');
}