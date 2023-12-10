<?php
require_once('koneksi/database.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM bukutamu WHERE id='{$id}'";
    $result = mysqli_query($connectDb, $query);
    
    if ($result) {
        header('location:adminbukutamu.php?delete=sukses');
    } else {
        header('location:adminbukutamu.php?delete=gagal');
    }
}
else {
    header('location:adminbukutamu.php');
}