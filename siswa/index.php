<?php
@session_start();
include '../config/db.php';

if (!isset($_SESSION['siswa'])) {
?> 
<script>
	alert('Maaf ! Anda Belum Login !!');
	window.location = '../user.php';
</script>
<?php } ?>


<?php
  $id_login = @$_SESSION['siswa'];
  $sql = mysqli_query($con, "SELECT * FROM tb_siswa
  	INNER JOIN tb_mkelas ON tb_siswa.id_mkelas=tb_mkelas.id_mkelas
   WHERE tb_siswa.id_siswa = '$id_login'") or die(mysqli_error($con));
  $data = mysqli_fetch_array($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Siswa | Aplikasi Presensi</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../assets/img/smakp.png" type="image/x-icon" />

	<!-- Fonts and icons -->
	<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Lato:300,400,700,900"]
			},
			custom: {
				"families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
				urls: ['../assets/css/fonts.min.css']
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../assets/css/demo.css">
</head>

<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				<a href="index.php" class="logo">
					<!-- <img src="../assets/img/mts.png" alt="navbar brand" class="navbar-brand" width="40"> -->
					<b class="text-white">SMA KP MARGAHAYU</b>
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

				<div class="container-fluid">
					<!-- 	<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form>
					</div> -->
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<!-- <li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li> -->
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="../assets/img/user/<?= $data['foto']; ?>" alt="profil" class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="../assets/img/user/<?= $data['foto']; ?>" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4><?= $data['nama_siswa']; ?></h4>
												<p class="text-muted"><?= $data['nip']; ?></p>
												<!-- <a href="?page=jadwal" class="btn btn-xs btn-secondary btn-sm">Jadwal Mengajar</a> -->
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="?page=change">Ganti Password</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="logout.php">Logout</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="../assets/img/user/<?= $data['foto']; ?>" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?= $data['nama_siswa'] ?>
									<span class="user-level">Kelas <?= $data['nama_kelas'] ?></span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="?page=change">
											<span class="link-collapse">Ganti Password</span>
										</a>
									</li>

								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item active">
							<a href="index.php" class="collapsed">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Main Utama</h4>
						</li>

						<li class="nav-item">
							<a href="?page=kehadiran">
								<i class="fas fa-clipboard-list"></i>
								<p>Absen</p>
							</a>
						</li>
						<!-- <li class="nav-item">
							<a href="?page=kehadiran&act=data">
								<i class="fas fa-clipboard-list"></i>
								<p>Data Absen</p>
							</a>
						</li> -->
						<li class="nav-item">
							<a href="?page=kehadiran&act=rekap">
								<i class="fas fa-clipboard-list"></i>
								<p>Rekap Absen</p>
							</a>
						</li>

						<li class="nav-item active mt-3">
							<a href="logout.php" class="collapsed">
								<i class="fas fa-arrow-alt-circle-left"></i>
								<p>Logout</p>
							</a>
						</li>

						<!-- 
						<li class="mx-4 mt-2">
							<a href="logout.php" class="btn btn-primary btn-block"><span class="btn-label"> <i class="fas fa-arrow-alt-circle-left"></i> </span> Logout</a> 
						</li> -->
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">

				<!-- Halaman dinamis -->
				<?php
				error_reporting();
				$page = @$_GET['page'];
				$act = @$_GET['act'];

				if ($page == 'izin') {
					if ($act == '') {
						include 'modul/izin/ajukan_izin.php';
					} else if ($act == 'surat_view') {
						include 'modul/izin/view_surat_izin.php';
					}
				} else if ($page == 'kehadiran') {
					if ($act == '') {
						include 'modul/absen/absen.php';
					} else if ($act == 'rekap') {
						include 'modul/absen/kehadiran.php';
					} else if ($act = 'data') {
            include 'modul/absen/data_absen.php';
          }
				} else if ($page == 'change') {
					include 'modul/user/ganti_password.php';
				} else if ($page == '') {
					include 'modul/home.php';
				} else {
					echo "<b>Tidak ada Halaman</b>";
				}


				?>
        <!-- menjalankan php absen -->
				<?php
          date_default_timezone_set('asia/jakarta');
          
          if (isset($_POST['submit'])) {
          	$tgl = date('Y-m-d');

          	if ($_GET['a'] == 'M') {
          		date_default_timezone_set('asia/jakarta');

          		$s = $_SESSION['nama_siswa'];
          		$a_masuk = date("H:i:s");
          		$w_masuk = new DateTime('6:00:00');
          		// echo $w_masuk->format('d-m-y : H:i:s');
          		$now = new DateTime('now');
          		  $j = $w_masuk->diff($now)->h;
          		  $m = $w_masuk->diff($now)->i;
                $d = $w_masuk->diff($now)->s;

          		if ($m < 10) {
          			$m = 0 . $m;
          		} if ($now < $w_masuk) {
          			$late = "0.00";
          		} else {
          			$late = $m.'.'.$d;
          			// $late = number_format($late);
          		}

		          $saveAbsen = mysqli_query($con, "INSERT INTO tb_absen  VALUES (NULL, '$s', '$a_masuk', '$late', NULL, NULL, '$tgl') ");
		          if ($saveAbsen) {
		          	echo "
		          		<script type='text/javascript'>
		          			setTimeout(function () { 
		          				swal('$s', 'Berhasil Absen Hari Ini', {
		          					icon : 'success',
		          					buttons: {
		          						confirm: {
		          							className : 'btn btn-success'
		          						}
		          					},
		          				});
		          			},10);
		          			window.setTimeout(function(){ 
		          				window.location.replace('index.php');
		          			} ,3000);   
		          		</script>
		          	";
                  
		          	// header('location: absen.php');
		          }
	          } else if ($_GET['a'] == 'P') {
	          	$s = $_SESSION['nama_siswa'];
	          	$a_pulang = date("H:i");
	          	$w_pulang = new DateTime("8:00");
	          	$now = new DateTime();
	          	$j = $now->diff($w_pulang)->h;
	          	$m = $now->diff($w_pulang)->i;
              $d = $now->diff($w_pulang)->s;
	          	if ($m < 10) {
	          		$m = 0 . $m;
	          	} if ($now < $w_pulang) {
	          		$over = 0.00;
	          	} else {
	          		$over = $m.'.'.$d;
	          	}
	          	// print($over); die
	          	$queryUpdate = mysqli_query($con, "UPDATE tb_absen SET pulang = '$a_pulang', lembur = '$over' WHERE nama_siswa = '$s' AND tgl_absen = '$tgl' ");
	          	// ($con,"UPDATE tb_guru SET nama_guru='$_POST[nama]',email='$_POST[email]' WHERE id_guru='$_POST[id]' ");
	          	if ($queryUpdate) {
	          		echo "
	          			<script type='text/javascript'>
	          				setTimeout(function () { 
	          					swal('$s', 'Hati hati di jalan', {
	          						icon : 'success',
	          						buttons: {
	          							confirm: {
	          								className : 'btn btn-success'
	          							}
	          						},
	          					});
	          				},10);
	          				window.setTimeout(function(){ 
	          					window.location.replace('?page=kehadiran');
	          				} ,3000);   
	          			</script>
	          		";
	          	}
	          }else {
	          	header('Location: absen.php');
	          }
          } else {
	          header('Location: absen.php');
          }
        ?>


				<!-- end -->

			</div>
			<footer class="footer">
				<div class="container">
					<div class="copyright ml-auto">
						&copy; <?= date('Y'); ?> Absensi Siswa SMA KARYA PEMBANGUNAN MARGAHAYU ( <a href="https://stmik-mi.ac.id/"><code>STMIK MARDIRAN INDONESIA</code></a> | <?= date('Y'); ?> )
					</div>
				</div>
			</footer>
		</div>


	</div>
	<!--   Core JS Files   -->
	<script src="../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../assets/js/core/popper.min.js"></script>
	<script src="../assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Datatables -->
	<script src="../assets/js/plugin/datatables/datatables.min.js"></script>



	<!-- Sweet Alert -->
	<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="../assets/js/atlantis.min.js"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="../assets/js/setting-demo.js"></script>


</body>

</html>