<?php
require_once('koneksi/database.php');

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "UPDATE user SET username = '{$username}' ";
    if($_POST['password']!= '') {
        $query .= ", password = '{$password}' ";
    }
    $query .= "WHERE id='{$id}'";
    $result = mysqli_query($connectDb, $query);
    mysqli_close($connectDb);

    if ($result) {
        header('location:adminuser.php?update=sukses');
    } else {
        header('location:adminuser.php?update=gagal');
    }
} else {
    header('location:adminuser.php');
}