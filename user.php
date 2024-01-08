<?php
session_start();
include 'config/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login | Absensi</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- css icon -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="assets/img/LOGO1.png" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/_login/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/_login/fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/_login/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/_login/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/_login/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/_login/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/_login/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/_login/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/_login/css/main.css">
	<!--===============================================================================================-->
</head>

<body>
	<div class="limiter">
		<!-- <a href="">admin</a> -->
		<div class="container-login100">
			<div class="wrap-login100">
				<!-- form login start -->
				<form method="post" action="" class="login100-form validate-form">
					<!-- judul login start -->
					<span class="login100-form-title p-b-">
						<img src="./assets/img/smakp.png" width="100">
					</span>
					<span class="login100-form-title p-b-20" style="font-size: 20px;">
						SMA KARYA PEMBANGUNAN
					</span>
					<!-- judul login end -->

					<!-- form input username,password & level start -->
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="username">
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>
					<div class="form-group mb-1">
						<!-- <input class="input100" type="text" name="username"> -->
						<!-- <span class="focus-input100" data-placeholder="Username"></span> -->
						<select class="form-control" name="level">
							<option>Level</option>
							<option value="2">Siswa</option>
							<option value="1">Guru</option>
						</select>
					</div>
					<!-- form input username, password & level end -->
					<!-- tombol masuk start -->
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" class="login100-form-btn">
								Login
							</button>
						</div>
					</div>
					<div class="container-login100-form-btn">
						<a href="index.php" class="btn btn-dark btn-sm"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
					</div>
					<!-- tombol masuk end -->
				</form>
				<!-- form login end -->

				<!-- memjalan kan php start -->
				<?php
				// pemngkondisian
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$level = $_POST['level'];
					$pass = sha1($_POST['password']);

					if ($level == 1) {
						// login guru
						$sqlCek = mysqli_query($con, "SELECT * FROM tb_guru WHERE nip='$_POST[username]' AND password='$pass' AND status='Y'");
						$jml = mysqli_num_rows($sqlCek);
						$d = mysqli_fetch_array($sqlCek);

						if ($jml > 0) {
							$_SESSION['guru'] = $d['id_guru'];
							// tampilan jika login berhasil
							echo "
									<script type='text/javascript'>
										setTimeout(function () { 
											swal('($d[nama_guru])', 'Login berhasil', {
												icon : 'success',
												buttons: {
													confirm: {
														className : 'btn btn-success'
													}
												},
											});    
										},10);  

										window.setTimeout(function(){ 
											window.location.replace('./guru/');
										} ,3000);   
									</script>
								";
						} else {
							// tampilan jika login gagal
							echo "
									<script type='text/javascript'>
										setTimeout(function () { 
											swal('Sorry!', 'Username / Password Salah', {
												icon : 'error',
												buttons: {        			
													confirm: {
														className : 'btn btn-danger'
													}
												},
											});    
										},10);  
										window.setTimeout(function(){ 
											window.location.replace('./siswa/');
										} ,3000);   
									</script>
								";
						}
					} else if ($level == 2) {
						// login siswa
						$sqlCek = mysqli_query($con, "SELECT * FROM tb_siswa WHERE nis='$_POST[username]' AND password='$pass' AND status='1'");
						$jml = mysqli_num_rows($sqlCek);
						$d = mysqli_fetch_array($sqlCek);

						if ($jml > 0) {
							$_SESSION['siswa'] = $d['id_siswa'];
							// tampilan jika login berhasil
							echo "
									<script type='text/javascript'>
										setTimeout(function () { 
											swal('($d[nama_siswa]) ', 'Login berhasil', {
												icon : 'success',
												buttons: {        			
													confirm: {
														className : 'btn btn-success'
													}
												},
											});    
										},10);  
										window.setTimeout(function(){ 
											window.location.replace('./siswa/');
										} ,3000);   
									</script>
								";
						} else {
							// tampilan jika login berhasil
							echo "
									<script type='text/javascript'>
										setTimeout(function () { 
											swal('Sorry!', 'Username / Password Salah', {
												icon : 'error',
												buttons: {        			
													confirm: {
														className : 'btn btn-danger'
													}
												},
											});    
										},10);  
										window.setTimeout(function(){ 
											window.location.replace('./siswa/');
										} ,3000);   
									</script>
								";
						}
					} else {
						// tampilan jika tidak memilih level
						echo "Tidak ada level yg dipilih";
					}
				}
				?>
				<!-- memjalan kan php end -->
			</div>
		</div>
	</div>

	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="assets/_login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="assets/_login/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="assets/_login/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/_login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="assets/_login/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="assets/_login/vendor/daterangepicker/moment.min.js"></script>
	<script src="assets/_login/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="assets/_login/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->

	<!-- Sweet Alert -->
	<script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>
	<script src="assets/_login/js/main.js"></script>
</body>

</html>