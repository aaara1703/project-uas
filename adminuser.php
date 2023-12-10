<?php
session_start();
require_once('koneksi/database.php');
require_once('koneksi/auth.php');

onlyAdmin();

$query = "SELECT * FROM user ORDER BY id DESC";
$result = mysqli_query($connectDb, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  
  <!-- FOnt Google -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
  <!-- VENDOR -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css"> -->
  <link href="assets/boostrap/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/boxicons/css/boxicons.min.css" rel="stylesheet">

  <!-- Fontawesome -->
  <script src="https://kit.fontawesome.com/503704af2c.js" crossorigin="anonymous"></script>
  <!-- Main css -->
  <link rel="stylesheet" href="style.css">
  <!-- bOOStap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">


  </head>
  <body>
    <?php include('header.php'); ?>
    <br><br><br><br><br><br>
    <div class="container my-5">
            <div class="row">
                <div class="col">
                    <h3>Manajemen <span class="text-primary"> User</span></h3>
                    <a href="users-add.php" class="btn btn-primary">Tambah User</a>
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">username</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $no = 1;
                        while ($data = mysqli_fetch_array($result)) : ?>
                            <tr>
                                <td><?= $no; ?></th>
                                <td><?= $data['username']; ?></td>
                                <td>
                                    <a href="users-edit.php?id=<?= $data['id']; ?>" class="btn btn-outline-primary">Edit</a>
                                    <a href="users-delete.php?id=<?= $data['id']; ?>" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php $no++; endwhile; ?>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>  
       

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
    <script type="text/javascript">
        <?php 
        if (isset($_GET['tambah'])) {
            $statusTambah = $_GET['tambah'];
            if ($statusTambah == 'sukses') : ?>
                alert('Sukses menambah user');
            <?php elseif ($statusTambah == 'gagal') : ?>
                alert('Gagal menambah user');
            <?php endif;
        }

        if (isset($_GET['update'])) {
            $statusUpdate = $_GET['update'];
            if ($statusUpdate == 'sukses') : ?>
                alert('Sukses update user');
            <?php elseif ($statusUpdate == 'gagal') : ?>
                alert('Gagal update user');
            <?php endif;
        }

        if (isset($_GET['delete'])) {
            $statusDelete = $_GET['delete'];
            if ($statusDelete == 'sukses') : ?>
                alert('Sukses menghapus user');
            <?php elseif ($statusDelete == 'gagal') : ?>
                alert('Gagal menghapus user');
            <?php endif;
        }
        ?>
    </script>
    
  </body>
</html>
<?php 
    mysqli_close($connectDb);