<?php
session_start();
require_once('koneksi/auth.php');

onlyAdmin();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,0">
    <title>Admin </title>

    <!-- box icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- custom css -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- header design -->
    <?php include('header.php'); ?>

    <div class="admin-container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3><span class="text-primary"> Admin</span></h3>

                    <p>Hallo, <?= getUserLogin('username'); ?> selamat datang di halaman admin</p>
                </div>
            </div>
        </div>  
    </div>
   

    <!-- scroll reveal -->
    <script src="https:unkg.com/scrollreveal"></script>

    <!-- typed js -->

    <!-- custum js -->
    <script src="js/script.js"></script>
</body>

</html>