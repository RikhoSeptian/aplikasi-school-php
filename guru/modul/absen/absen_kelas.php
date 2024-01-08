<?php 
	// tampilkan data mengajar
	$kelasMengajar = mysqli_query($con,"SELECT * FROM tb_mengajar 
		INNER JOIN tb_master_mapel ON tb_mengajar.id_mapel=tb_master_mapel.id_mapel
		INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas

		INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
		INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
		WHERE tb_mengajar.id_guru='$data[id_guru]' AND tb_mengajar.id_mengajar='$_GET[pelajaran]'  AND tb_thajaran.status=1  ");

	foreach ($kelasMengajar as $d) 
?>

<!-- <div class="panel-header bg-primary-gradient">
	<div class="page-inner py-5">
	</div>
</div> -->

<div class="page-inner">
	<div class="page-header">
		<!-- <h4 class="page-title">KELAS (<?=strtoupper($d['nama_kelas']) ?> )</h4> -->
		<ul class="breadcrumbs" style="font-weight: bold;">
			<li class="nav-home">
				<a href="#">
					<i class="flaticon-home"></i>
				</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="#">KELAS <?=strtoupper($d['nama_kelas']) ?> </a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="#"><?=strtoupper($d['mapel']) ?></a>
			</li>
		</ul>
	</div>
	<div class="row">
		<!-- menjalankan php start -->
		<?php 
			// dapatkan pertemuan terakhir di tb izin
			$last_pertemuan = mysqli_query($con,"SELECT * FROM _logabsensi WHERE id_mengajar='$_GET[pelajaran]' GROUP BY pertemuan_ke ORDER BY pertemuan_ke DESC LIMIT 1  ");
			$cekPertemuan = mysqli_num_rows($last_pertemuan);
			$jml = mysqli_fetch_array($last_pertemuan);

			if ($cekPertemuan > 0 ) {
				$pertemuan = $jml['pertemuan_ke']+1;
			} else	{
				$pertemuan = 1;
			}
		?>
		<!-- menjalankan php end -->
		
		<div class="card card">
			<div class="card-body">
				<form action="" method="post">
					<p>
						<span class="badge badge-default" style="padding: 7px;font-size: 14px;">
							<b>Daftar Hadir Siswa</b>
						</span>
						<span class="badge badge-primary" style="padding: 7px;font-size: 14px;">
							Pertemuan : <b><?=$pertemuan; ?></b>
						</span>
					</p>
					<div class="card-list">
						<input type="date" name="tgl" class="form-control bg-primary-gradient" value="<?=date('Y-m-d') ?>" style="background-color: #212121;color: #FFEB3B;">
						<input type="hidden" name="pertemuan" class="form-control" value="<?=$pertemuan; ?>">
						<!-- menjalankan php start -->
						<?php 
							// tampilakan data siswa berdasarkan kelas yang dipilih
							$siswa = mysqli_query($con,"SELECT * FROM tb_siswa WHERE id_mkelas='$d[id_mkelas]' ORDER BY id_siswa ASC ");
							$jumlahSiswa = mysqli_num_rows($siswa);

							foreach ($siswa as $i =>$s) {
						?>
						<!-- menjalankan php end -->
							<div class="item-list">
								<div class="avatar">
									<img src="../assets/img/user/<?=$s['foto'] ?>" class="avatar-img rounded-circle">
								</div> 
								<div class="info-user">
									<div class="username">
										<b class="text-success"><?=$s['nama_siswa'] ?></b>
										<!-- menjalankan php start -->
										<?php 
											// tampilkan data yg sudah absen
											$tgl_hari_ini = date('Y-m-d');
											$siswa_telah_absen_hari_ini = mysqli_query($con,"SELECT * FROM _logabsensi 
											INNER JOIN tb_siswa ON _logabsensi.id_siswa=tb_siswa.id_siswa 

											WHERE _logabsensi.id_siswa='$s[id_siswa]' AND _logabsensi.tgl_absen='$tgl_hari_ini' AND _logabsensi.id_mengajar='$_GET[pelajaran]' AND _logabsensi.ket='' ");

											// if (mysqli_num_rows($siswa_telah_absen_hari_ini) > 1) {
											// 	echo '<span class="badge badge-success">Sudah Absen</span>';
											// } else {
											// 	echo '<span class="badge badge-danger">Belum Absen</span>';
											// }
										?>
										<!-- menjalankan php end -->
										(<code><?=$s['nis'] ?></code>)
										<input type="hidden" name="id_siswa-<?=$i;?>" value="<?=$s['id_siswa'] ?>">
										<input type="hidden" name="pelajaran" value="<?=$_GET['pelajaran'] ?>">
									</div>
									<div class="status mt-0">
										<div class="form-check">
											<label class="form-radio-label">
												<input name="ket-<?=$i;?>" class="form-radio-input" type="radio" value="H">
												<span class="form-radio-sign">
													<i class="text-primary">H : (Hadir)</i>
												</span>
											</label>
											<label class="form-radio-label">
												<input name="ket-<?=$i;?>" class="form-radio-input" type="radio" value="I" >
												<span class="form-radio-sign">
												<i class="text-info">I : (Izin)</i>
												</span>
											</label>
											<label class="form-radio-label">
												<input name="ket-<?=$i;?>" class="form-radio-input" type="radio" value="S" >
												<span class="form-radio-sign">
												<i class="text-warning">S : (Sakit)</i>
												</span>
											</label> 
											<label class="form-radio-label">
												<input name="ket-<?=$i;?>" class="form-radio-input" type="radio" value="A">
												<span class="form-radio-sign">
												<i class="text-danger">A : (Alfa)</i>
												</span>
											</label>
											<!-- <label class="form-check-label">
												<input name="ket-<?=$i;?>" class="form-check-input" type="checkbox" value="T">
												<span class="form-check-sign">T</span>
											</label> -->
											<!-- <label class="form-check-label">
												<input name="ket-<?=$i;?>" class="form-check-input" type="checkbox" value="C">
												<span class="form-check-sign">C</span>
											</label> -->
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
					<!-- <input type="submit" name="absen" class="btn btn-info"> -->
					<center>
						<button type="submit" name="absen" class="btn btn-success">
							<i class="fa fa-check"></i> Selesai
						</button>
						<a href="?page=absen&act=update&pelajaran=<?=$_GET['pelajaran']; ?>" class="btn btn-warning">
							<i class="fas fa-edit"></i> 
							Update Absesnsi
						</a>
						<!-- <a href="index.php" class="btn btn-default">
							<i class="fas fa-arrow-circle-left"></i> 
							Kembali
						</a> -->
					</center>
				</form>
			</div>
			<!-- menjalankan php -->
			<?php 
				if (isset($_POST['absen'])) {
					$total = $jumlahSiswa-1;
					$today = $_POST['tgl'];
					$pertemuan = $_POST['pertemuan'];

					for ($i =0; $i <=$total ; $i++) {
						$id_siswa = $_POST['id_siswa-'.$i];
						$pelajaran = $_POST['pelajaran'];
						$ket = $_POST['ket-'.$i];
						$cekAbsesnHariIni = mysqli_num_rows(mysqli_query($con,"SELECT * FROM _logabsensi WHERE tgl_absen='$today' AND id_mengajar='$pelajaran' AND id_siswa='$id_siswa' "));

						if ($cekAbsesnHariIni > 0) {


							echo "
								<script type='text/javascript'>
									setTimeout(function () { 
										swal('Sorry!', 'Absen Hari ini sudah dilakukan', {
											icon : 'error',
											buttons: {
												confirm: {
													className : 'btn btn-danger'
												}
											},
										});
									},10);
									window.setTimeout(function(){ 
										window.location.replace('?page=absen&pelajaran=$_GET[pelajaran]');
									} ,3000); 
								</script>
							";
						} else {
							$insert = mysqli_query($con,"INSERT INTO _logabsensi VALUES (NULL,'$pelajaran','$id_siswa','$today','$ket','$pertemuan')");
							if ($insert) {
								echo "
									<script type='text/javascript'>
										setTimeout(function () { 
											swal('Berhasil', 'Absen hari ini telah tersimpan!', {
												icon : 'success',
												buttons: {        			
													confirm: {
														className : 'btn btn-success'
													}
												},
											});
										},10);  
										window.setTimeout(function(){ 
											window.location.replace('?page=absen&pelajaran=$_GET[pelajaran]');
										} ,3000);   
									</script>
								";
							}
						}
					}
				}
			?>
			<!-- menjalankan php end -->
		</div>
	</div>
</div>