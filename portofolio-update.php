<?php
require_once('koneksi/database.php');

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];

    $query = "UPDATE user SET nama = '{$nama}',deskripsi = '{$deskripsi}' WHERE id='{$id}'";
   
    $result = mysqli_query($connectDb, $query);
    mysqli_close($connectDb);

    if ($result) {
        header('location:adminportofolio.php?update=sukses');
    } else {
        header('location:adminportofolio.php?update=gagal');
    }
} else {
    header('location:adminportofolio.php');
}