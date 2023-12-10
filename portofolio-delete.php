<?php
require_once('koneksi/database.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM portofolio WHERE id='{$id}'";
    $result = mysqli_query($connectDb, $query);
    
    if ($result) {
        header('location:adminportofolio.php?delete=sukses');
    } else {
        header('location:adminportofolio.php?delete=gagal');
    }
}
else {
    header('location:adminportofolio.php');
}