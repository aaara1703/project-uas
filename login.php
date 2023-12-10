<?php
session_start();

require_once('koneksi/database.php');
require_once('koneksi/auth.php');

if (checkLogin()) {
    header('location:index.php');
    exit;
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE username = '{$username}' AND password = '{$password}'";
    $result = mysqli_query($connectDb, $query);
    $data = mysqli_fetch_array($result);

    if ($data) {
        $_SESSION['is_login'] = true;
        $_SESSION['user'] = $data;
        header('location:admin.php?status=sukses');
        exit;
    } else {
        header('location:login.php?status=gagal');
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Slide Navbar</title>
	<link rel="stylesheet" type="text/css" href="stylelogin.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form  autocomplete="off"
                        action="login.php"
                        method="post"
                        class="needs-validation mt-4"
                        novalidate>
					<label for="chk" aria-hidden="true"> Login</label>
					<input type="text" name="username" placeholder="User name" required="">
					<input type="password" name="password" placeholder="Password" required="">
					<button type="submit">Login</button>
				</form>
			</div>

			
	</div>
	<script type="text/javascript">
        <?php 
        if (isset($_GET['status'])) {
            $status = $_GET['status'];	
            if ($status == 'sukses') : ?>
                alert('Login Berhasil.');
            <?php elseif ($status == 'gagal') : ?>
                alert('Login gagal. Username/Password Salah');
            <?php endif;
        }
        ?>
    </script>

</body>
</html>