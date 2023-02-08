<?php
	$servername = "localhost";
	$username_db = "root";
	$password_db = "";
	$dbname = "sigap2";

	// Create connection
	$con = mysqli_connect($servername, $username_db, $password_db, $dbname);

	if(isset($_POST['simpan'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		$user_data = mysqli_query($con, "SELECT * FROM pegawai WHERE username = '$username' AND password = '$password'");
		$users = mysqli_fetch_array($user_data);
		if(!isset($users)){
			echo ("<script LANGUAGE='JavaScript'>
				window.location.href='pegawailist.php';
				</script>");
		}else{
			echo ("<script LANGUAGE='JavaScript'>
				window.alert('Email atau Password Salah !');
				window.location.href='login2.php';
				</script>");
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SIGAP</title>
	<link rel="stylesheet" type="text/css" href="login/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="login/css/fontawesome-all.min.css">
	<link rel="stylesheet" type="text/css" href="login/css/iofrm-style.css">
	<link rel="stylesheet" type="text/css" href="login/css/iofrm-theme9.css">
</head>
<body>
	<div class="form-body">
		<div class="row">
			<div class="img-holder">
				<div class="bg"></div>
				<div class="info-holder">
					<h3>SIGAP WACHID HAYSIM</h3>
					<p>Sistem Informasi Gaji Pegawai.</p>
					<img src="login/images/graphic5.svg" alt="">
				</div>
			</div>
			<div class="form-holder">
				<div class="form-content">
					<div class="form-items">
						<div class="website-logo-inside">
							<a href="">
								<h3>LOGIN PEGAWAI SIGAP WACHID HAYSIM</h3>
							</a>
						</div>
						<div class="page-links">
							<a href="login.php">Login Unit & Bendahara </a><a href="login2.php" class="active">Login Pegawai</a>
						</div>
						<form role="form" action="" method="post" enctype="multipart/form-data" class="login-box">
							<input class="form-control" type="text" name="username" placeholder="Username" required>
							<input class="form-control" type="password" name="password" placeholder="Password" required>
							<div class="form-button">
								<button id="submit" type="submit" name="simpan" class="ibtn">Login</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<script src="login/js/jquery.min.js"></script>
<script src="login/js/popper.min.js"></script>
<script src="login/js/bootstrap.min.js"></script>
<script src="login/js/main.js"></script>
</body>
</html>