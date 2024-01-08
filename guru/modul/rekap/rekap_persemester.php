<?php
$time = time();
// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excell
// header("Content-type: application/vnd-ms-excel");
// header("Content-Disposition: attachment; filename=DAFTAR-HADIR-$time.xls");
?>

<?php
include '../../../config/db.php';
?>
<style>
	.fs20 {
		font-size: 20px;
	}

	.fs18 {
		font-size: 18px;
	}

	.fs16 {
		font-size: 16px;
	}

	.fs14 {
		font-size: 14px;
	}

	.b1 {
		border: 1px solid;
	}

	td.rotate {
		transform:
			/*nomor magic*/
			translate(1px, 1px) rotate(270deg);
		/*width: 3px;*/
		padding: 0px;
		word-spacing: none;
		white-space: nowrap;
		/*	padding:0px;
		white-space: nowrap;
		position: absolute;
		height: 40px;
		-webkit-transform: rotate(270deg);
		-moz-transform: rotate(270deg);
		-ms-transform: rotate(270deg);
		-o-transform: rotate(270deg);
		transform: rotate(270deg);*/

		/*transform: 
		translate(0px,0px)
		rotate(270deg);
		padding: 0px;
		word-spacing:none;
		white-space: nowrap;*/
	}
</style>
<?php

// tampilkan data mengajar
$kelasMengajar = mysqli_query($con, "SELECT * FROM tb_mengajar 

		INNER JOIN tb_guru ON tb_mengajar.id_guru=tb_guru.id_guru
		INNER JOIN tb_master_mapel ON tb_mengajar.id_mapel=tb_master_mapel.id_mapel
		INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas
		INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
		INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran

		WHERE tb_mengajar.id_mengajar='$_GET[pelajaran]' 
		AND tb_mengajar.id_mkelas='$_GET[kelas]'  AND tb_thajaran.status=1 
		AND tb_semester.status=1 ");

foreach ($kelasMengajar as $d)
	// tampilkan data absen
	$qry = mysqli_query($con, "SELECT * FROM _logabsensi 

		INNER JOIN tb_siswa ON _logabsensi.id_siswa=tb_siswa.id_siswa
		INNER JOIN tb_mengajar ON _logabsensi.id_mengajar=tb_mengajar.id_mengajar

		INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas
		INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
		INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran

		WHERE tb_mengajar.id_mengajar='$_GET[pelajaran]' AND tb_mengajar.id_mkelas='$_GET[kelas]'  AND tb_thajaran.status=1 AND tb_semester.status=1 GROUP BY _logabsensi.id_siswa  ORDER BY _logabsensi.id_siswa ASC  ");

// tampilkan data walikelas
$walikelas = mysqli_query($con, "SELECT * FROM tb_walikelas 

		INNER JOIN tb_guru ON tb_walikelas.id_guru=tb_guru.id_guru 

		WHERE tb_walikelas.id_mkelas='$_GET[kelas]' ");

foreach ($walikelas as $walas)

$tglTerakhir = date('t', strtotime($tglBulan));
$tglTerakhir = 25;
$tglBulan = 25;
?>
<style>
	body {
		font-family: arial;
	}
</style>
<table width="100%">
	<tr>
		<td>
			<img src="../../../assets/img/smakp.png" width="130">
		</td>
		<td>
			<center>
				<h1 class="fs20">
					ABSEN SISWA
					<br>
					<small> SMA Karya Pembangunan Margahayu</small>
				</h1>
				<hr>
				<em class="fs16">
					Jl. Terusan Kopo No.399A Margahayu Kab. Bandung (022) 5404396 - 40226<br>
					<b>Email : smakpmghy@gmail.com Telp.089508314708</b>
				</em>
			</center>
		</td>
		<td>
			<table width="100%">
				<tr>
					<td colspan="2">
						<b style="border: 2px solid; padding: 7px;">
							KELAS <?= strtoupper($d['nama_kelas']) ?>
						</b>
					</td>
					<td>
						<b style="border: 2px solid; padding: 7px;">
							<?= $d['semester'] ?> | <?= $d['tahun_ajaran'] ?>
						</b>
					</td>
					<td rowspan="5">
						<ul>
							<li class="fs18">H= Hadir</li>
							<li class="fs18">S = Sakit</li>
							<li class="fs18">I = Izin</li>
							<li class="fs18">T = Terlambat</li>
							<li class="fs18">A = Absen</li>
							<!-- <li>C = Cabut</li> -->
						</ul>
						<!-- <p>H= Hadir</p>
						<p>I = Izin</p>
						<p>S = Sakit</p>
						<p>A = Absesn </p> -->
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td class="fs18">Nama Guru</td>
					<td class="fs18">:</td>
					<td class="fs18"><?= $d['nama_guru'] ?></td>
				</tr>
				<tr>
					<td class="fs18">Bidang Studi </td>
					<td class="fs18">:</td>
					<td class="fs18"><?= $d['mapel'] ?></td>
				</tr>
				<tr>
					<td class="fs18">Wali Kelas </td>
					<td class="fs18">:</td>
					<td class="fs18"><?= $walas['nama_guru'] ?></td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<hr style="height: 3px;border: 1px solid;">

<table width="100%" border="1" cellpadding="2" style="border-collapse: collapse;">
	<tr>
		<td class="fs14" rowspan="2" bgcolor="#EFEBE9" align="center">NO</td>
		<td class="fs14" rowspan="2" bgcolor="#EFEBE9">NAMA SISWA</td>
		<td class="fs14" rowspan="2" bgcolor="#EFEBE9" align="center">L/P</td>
		<td class="fs18" colspan="<?= $tglTerakhir; ?>" style="padding: 5px;"><b>Pertemuan Ke -</b></td>
		<td class="fs14" colspan="5" align="center" bgcolor="#EFEBE9">JUMLAH</td>
	</tr>
	<tr>
		<?php
		for ($i = 1; $i <= $tglTerakhir; $i++) {
			echo "<td bgcolor='#EFEBE9' align='center' class='fs14'>" . $i . "</td>";
		}
		?>
		<td bgcolor="#2196F3" align="center" class="fs14">H</td>
		<td bgcolor="#FFC107" align="center" class="fs14">S</td>
		<td bgcolor="#4CAF50" align="center" class="fs14">I</td>
		<td bgcolor="#D50000" align="center" class="fs14">T</td>
		<td bgcolor="#76FF03" align="center" class="fs14">A</td>
		<!-- <td bgcolor="#9C27B0" align="center" class="fs14">C</td> -->
	</tr>
	<?php
	// tampilkan absen siswa
	$no = 1;
	foreach ($qry as $ds) {
		$warna = ($no % 2 == 1) ? "#ffffff" : "#f0f0f0";
	?>
		<tr>
		<tr bgcolor="<?= $warna; ?>">
			<td class="fs14" align="center"><?= $no++; ?></td>
			<td class="fs14"><?= $ds['nama_siswa']; ?></td>
			<td class="fs14" align="center"><?= $ds['jk']; ?></td>
			<?php
			for ($i = 1; $i <= $tglTerakhir; $i++) {
			?>
				<td class="fs14" align="center" bgcolor="white">
					<?php
					$ket = mysqli_query($con, "SELECT * FROM _logabsensi
						INNER JOIN tb_mengajar ON _logabsensi.id_mengajar=tb_mengajar.id_mengajar

						INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
						INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran

						WHERE _logabsensi.pertemuan_ke='$i' AND _logabsensi.id_siswa='$ds[id_siswa]' AND _logabsensi.id_mengajar='$_GET[pelajaran]' AND tb_mengajar.id_mkelas='$_GET[kelas]'  AND tb_thajaran.status=1 AND tb_semester.status=1 GROUP BY pertemuan_ke ");

					foreach ($ket as $h)

						// echo $h['ket'];
						if ($h['ket'] == 'H') {
							echo "<b class='fs14' style='color:#2196F3;'>H</b>";
						} else if ($h['ket'] == 'I') {
							echo "<b class='fs14' style='color:#4CAF50;'>I</b>";
						} else if ($h['ket'] == 'S') {
							echo "<b class='fs14' style='color:#FFC107;'>S</b>";
						} else if ($h['ket'] == 'A') {
							echo "<b class='fs14' style='color:#D50000;'>A</b>";
						} else {
							echo "<b class='fs14' style='color:#76FF03;'>T</b>";
						}
					?>
				</td>
			<?php } ?>
			<td align="center" style="font-weight: bold;">
				<?php
				$hadir = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(ket) AS hadir FROM _logabsensi
						INNER JOIN tb_mengajar ON _logabsensi.id_mengajar=tb_mengajar.id_mengajar

						INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
						INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran

 						WHERE _logabsensi.id_siswa='$ds[id_siswa]' and _logabsensi.ket='H' and _logabsensi.id_mengajar='$_GET[pelajaran]' AND tb_mengajar.id_mkelas='$_GET[kelas]'  AND tb_thajaran.status=1 AND tb_semester.status=1 "));
				echo $hadir['hadir'];
				?>
			</td>
			<td align="center" style="font-weight: bold;">
				<?php
				$sakit = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(ket) AS sakit FROM _logabsensi
						INNER JOIN tb_mengajar ON _logabsensi.id_mengajar=tb_mengajar.id_mengajar

						INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
						INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran

 						WHERE _logabsensi.id_siswa='$ds[id_siswa]' and _logabsensi.ket='S' and _logabsensi.id_mengajar='$_GET[pelajaran]' AND tb_mengajar.id_mkelas='$_GET[kelas]'  AND tb_thajaran.status=1 AND tb_semester.status=1 "));
				echo $sakit['sakit'];
				?>
			</td>
			<td align="center" style="font-weight: bold;">
				<?php
				$izin = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(ket) AS izin FROM _logabsensi
						INNER JOIN tb_mengajar ON _logabsensi.id_mengajar=tb_mengajar.id_mengajar
						INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
						INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
						WHERE _logabsensi.id_siswa='$ds[id_siswa]' and _logabsensi.ket='I' and _logabsensi.id_mengajar='$_GET[pelajaran]' AND tb_mengajar.id_mkelas='$_GET[kelas]'  AND tb_thajaran.status=1 AND tb_semester.status=1 "));
				echo $izin['izin'];
				?>
			</td align="center" style="font-weight: bold;">
			<td align="center" style="font-weight: bold;">
				<?php
				$tlambat = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(ket) AS terlambat FROM _logabsensi
						INNER JOIN tb_mengajar ON _logabsensi.id_mengajar=tb_mengajar.id_mengajar
						INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
						INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
						WHERE _logabsensi.id_siswa='$ds[id_siswa]' and _logabsensi.ket='T' and _logabsensi.id_mengajar='$_GET[pelajaran]' AND tb_mengajar.id_mkelas='$_GET[kelas]'  AND tb_thajaran.status=1 AND tb_semester.status=1 "));
				echo $tlambat['terlambat'];
				?>
			</td>
			<td align="center" style="font-weight: bold;">
				<?php
				$alfa = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(ket) AS alfa FROM _logabsensi
						INNER JOIN tb_mengajar ON _logabsensi.id_mengajar=tb_mengajar.id_mengajar
						INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
						INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
						WHERE _logabsensi.id_siswa='$ds[id_siswa]' and _logabsensi.ket='A' and _logabsensi.id_mengajar='$_GET[pelajaran]' AND tb_mengajar.id_mkelas='$_GET[kelas]'  AND tb_thajaran.status=1 AND tb_semester.status=1 "));
				echo $alfa['alfa'];
				?>
			</td>

		</tr>
	<?php } ?>
	<!-- <tr>
			<td colspan="3" align="center" style="font-size: 14px;">Tanggal Pertemuan</td>
				<?php
				for ($i = 1; $i <= $tglTerakhir; $i++) {
				?> 
			<td align="center">
				<em style="font-size: 12px;">
					<?php
					$ket = mysqli_query($con, "SELECT * FROM _logabsensi
							INNER JOIN tb_mengajar ON _logabsensi.id_mengajar=tb_mengajar.id_mengajar
							INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
							INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
							WHERE _logabsensi.pertemuan_ke='$i' AND _logabsensi.id_siswa='$ds[id_siswa]' AND _logabsensi.	id_mengajar='$_GET[pelajaran]' AND tb_mengajar.id_mkelas='$_GET[kelas]'  AND tb_thajaran.status=1 AND tb_semester.status=1 GROUP BY pertemuan_ke ");

					foreach ($ket as $h)
						$tgl = date('d m Y', strtotime($h['tgl_absen']));
					// echo "".namahari($tgl).",";
					echo $tgl;
					?>
				</em>
			</td>
				<?php } ?>
		</tr> -->
	</tr>
</table>
<p>
<table width="100%" class="fs18">
	<tr>
		<td align="left">
			<p>
				Mengetahui
			</p>
			<p>
				Kepala Sekolah
				<br>
				<br>
				<br>
				<br>
				<br>
				-----------------------------
			</p>
		</td>
		<td align="right">
			<p>
				<?= hari_ini($hari_ini); ?>, <?php echo date('d-F-Y'); ?>
			</p>
			<p>
				<?php $kepsek = mysqli_query($con, "SELECT * FROM tb_kepsek"); ?>
				<br>
				<br>
				<br>
				<br>
				<br>
				<?= $kepsep['nama_kepsek']; ?><br>
				----------------------<br>
				NIP.197411092002102003
			</p>
		</td>
	</tr>
</table>
</p>

<script>
	window.print();
</script>