<?php
include '../../../config/db.php';
?>

<?php
$bulan = $_GET['bulan'];

// tampilkan data mengajar
$kelasMengajar = mysqli_query($con, "SELECT * FROM tb_mengajar 
		INNER JOIN tb_guru ON tb_mengajar.id_guru=tb_guru.id_guru
		INNER JOIN tb_master_mapel ON tb_mengajar.id_mapel=tb_master_mapel.id_mapel
		INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas
		INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
		INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran

		WHERE tb_mengajar.id_mengajar='$_GET[pelajaran]' 
		AND tb_mengajar.id_mkelas='$_GET[kelas]' 
		AND tb_thajaran.status=1 
		AND tb_semester.status=1 ");

foreach ($kelasMengajar as $d)

	// tampilkan data absen
$qry = mysqli_query($con, "SELECT * FROM _logabsensi 
		INNER JOIN tb_siswa ON _logabsensi.id_siswa=tb_siswa.id_siswa
		INNER JOIN tb_mengajar ON _logabsensi.id_mengajar=tb_mengajar.id_mengajar
		INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
		INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran

		WHERE MONTH(tgl_absen)='$bulan' 
		AND tb_mengajar.id_mkelas='$_GET[kelas]'  
		AND tb_thajaran.status=1 
		AND tb_semester.status=1
	  GROUP BY _logabsensi.id_siswa 
		ORDER BY _logabsensi.id_siswa ASC ");

foreach ($qry as $db)

	// tampilkan data walikelas
$walikelas = mysqli_query($con, "SELECT * FROM tb_walikelas 
	INNER JOIN tb_guru ON tb_walikelas.id_guru=tb_guru.id_guru 

	WHERE tb_walikelas.id_mkelas='$_GET[kelas]' ");

foreach ($walikelas as $walas)

	// data kepsep
$kepsek = mysqli_query($con, "SELECT * FROM tb_kepsek");

foreach ($kepsek as $ks)

$tglBulan = $db['tgl_absen'];
$tanggal = $db['tgl_absen'];
$tglTerakhir = date('t', strtotime($tanggal));
?>

<style>
	body {
		font-family: arial;
	}
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
	.fs12 {
		font-size: 12px;
	}

	/* .b1 {
		border: 1px solid;
	}
	tr, td {
		border:1px solid;
	}
	tr {
		background-color: #b2b2b2;
	} */
</style>

<table class="fs18" width="100%">
	<tr>
		<td>
			<center>
				<h1>
					ABSESNSI SISWA <br>
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
					<!-- kelas -->
					<td colspan="2">
						<b style="border: 2px solid;padding: 7px;">
							KELAS <?= strtoupper($d['nama_kelas']) ?>
						</b> 
					</td>
					<!-- semester -->
					<td>
						<b style="border: 2px solid;padding: 7px;">
							<?= $d['semester'] ?> |
							<?= $d['tahun_ajaran'] ?>
						</b>
					</td>
					<!-- keterangan absen -->
					<td rowspan="5">
						<ul>
							<li>H = Hadir</li>
							<li>S = Sakit</li>
							<li>I = Izin</li>
							<li>A = Absen</li>
							<!-- <li>T = Terlambat</li> -->
							<!-- <li>C = Cabu</li> -->
						</ul>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Nama Guru </td>
					<td>:</td>
					<td><?= $d['nama_guru'] ?></td>
				</tr>
				<tr>
					<td>Mata Pelajaran</td>
					<td>:</td>
					<td><?= $d['mapel'] ?></td>
				</tr>
				<tr>
					<td>Wali Kelas </td>
					<td>:</td>
					<td><?= $walas['nama_guru'] ?></td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<hr style="height: 3px;border: 1px solid;">

<table width="100%" border="1" cellpadding="2" style="border-collapse: collapse;">
	<tr>
		<td rowspan="2" bgcolor="#EFEBE9" align="center">NO</td>
		<td rowspan="2" bgcolor="#EFEBE9">NAMA SISWA</td>
		<td rowspan="2" bgcolor="#EFEBE9" align="center">L/P</td>
		<td colspan="<?= $tglTerakhir; ?>" style="padding: 8px;">PERTEMUAN BULAN :
			<b style="text-transform: uppercase;"><?= namaBulan($bulan); ?> <?= date('Y', strtotime($tglBulan)); ?></b>
		</td>
		<td colspan="5" align="center" bgcolor="#EFEBE9">JUMLAH</td>
	</tr>
	<tr>
		<?php
		for ($i = 1; $i <= $tglTerakhir; $i++) {
			echo "<td bgcolor='#EFEBE9' align='center'>" . $i . "</td>";
		}
		?>
		<td bgcolor="#2196F3" align="center">H</td>
		<td bgcolor="#FFC107" align="center">S</td>
		<td bgcolor="#4CAF50" align="center">I</td>
		<td bgcolor="#D50000" align="center">A</td>
	</tr>
	<?php
	// tampilkan absen siswa
	$no = 1;
	foreach ($qry as $ds) {
		$warna = ($no % 2 == 1) ? "#ffffff" : "#f0f0f0";
	?>
		<tr>
		<tr bgcolor="<?= $warna; ?>">
			<td align="center"><?= $no++; ?></td>
			<td><?= $ds['nama_siswa']; ?></td>
			<td align="center"><?= $ds['jk']; ?></td>
			<?php
			for ($i = 1; $i <= $tglTerakhir; $i++) {
			?>
				<td align="center" bgcolor="white">
					<?php
					$ket = mysqli_query($con, "SELECT * FROM _logabsensi
						INNER JOIN tb_mengajar ON _logabsensi.id_mengajar=tb_mengajar.id_mengajar
						INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
						INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran

						WHERE DAY(tgl_absen)='$i' AND id_siswa='$ds[id_siswa]' AND _logabsensi.id_mengajar='$_GET[pelajaran]' AND MONTH(tgl_absen)='$bulan' AND tb_mengajar.id_mkelas='$_GET[kelas]'  AND tb_thajaran.status=1 AND tb_semester.status=1 GROUP BY DAY(tgl_absen) ");

					foreach ($ket as $h)

						// echo $h['ket'];

						if ($h['ket'] == 'H') {
							echo "<b style='color:#2196F3;'>H</b>";
						} else if ($h['ket'] == 'I') {
							echo "<b style='color:#4CAF50;'>I</b>";
						} else if ($h['ket'] == 'S') {
							echo "<b style='color:#FFC107;'>S</b>";
						} else if ($h['ket'] == 'A') {
							echo "<b style='color:#D50000;'>A</b>";
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

 						WHERE _logabsensi.id_siswa='$ds[id_siswa]' and _logabsensi.ket='S' and MONTH(tgl_absen)='$bulan' and _logabsensi.id_mengajar='$_GET[pelajaran]' AND tb_mengajar.id_mkelas='$_GET[kelas]'  AND tb_thajaran.status=1 AND tb_semester.status=1 "));
				echo $sakit['sakit'];
				?>
			</td>
			<td align="center" style="font-weight: bold;">
				<?php
				$izin = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(ket) AS izin FROM _logabsensi
						INNER JOIN tb_mengajar ON _logabsensi.id_mengajar=tb_mengajar.id_mengajar
						INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
						INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran

  					WHERE _logabsensi.id_siswa='$ds[id_siswa]' and _logabsensi.ket='I' and MONTH(tgl_absen)='$bulan' and _logabsensi.id_mengajar='$_GET[pelajaran]' AND tb_mengajar.id_mkelas='$_GET[kelas]'  AND tb_thajaran.status=1 AND tb_semester.status=1 "));
				echo $izin['izin'];
				?>
			</td align="center" style="font-weight: bold;">
			<td align="center" style="font-weight: bold;">
				<?php
				$alfa = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(ket) AS alfa FROM _logabsensi
						INNER JOIN tb_mengajar ON _logabsensi.id_mengajar=tb_mengajar.id_mengajar
						INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
						INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran

 						WHERE _logabsensi.id_siswa='$ds[id_siswa]' and _logabsensi.ket='A' and MONTH(tgl_absen)='$bulan' and _logabsensi.id_mengajar='$_GET[pelajaran]' AND tb_mengajar.id_mkelas='$_GET[kelas]'  AND tb_thajaran.status=1 AND tb_semester.status=1 "));
				echo $alfa['alfa'];
				?>
			</td>
			<!-- <td align="center" style="font-weight: bold;">
				<?php
				$tlambat = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(ket) AS tlambat FROM _logabsensi
						INNER JOIN tb_mengajar ON _logabsensi.id_mengajar=tb_mengajar.id_mengajar
						INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
						INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran

 						WHERE _logabsensi.id_siswa='$ds[id_siswa]' and _logabsensi.ket='T' and MONTH(tgl_absen)='$bulan' and _logabsensi.id_mengajar='$_GET[pelajaran]' AND tb_mengajar.id_mkelas='$_GET[kelas]'  AND tb_thajaran.status=1 AND tb_semester.status=1 "));
				echo $tlambat['tlambat'];
				?>
			</td> -->
			<!-- <td align="center" style="font-weight: bold;">
				<?php
				$cabut = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(ket) AS cabut FROM _logabsensi
						INNER JOIN tb_mengajar ON _logabsensi.id_mengajar=tb_mengajar.id_mengajar
						INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
						INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran

 						WHERE _logabsensi.id_siswa='$ds[id_siswa]' and _logabsensi.ket='C' and MONTH(tgl_absen)='$bulan' and _logabsensi.id_mengajar='$_GET[pelajaran]' AND tb_mengajar.id_mkelas='$_GET[kelas]'  AND tb_thajaran.status=1 AND tb_semester.status=1 "));
				echo $cabut['cabut'];
				?>
			</td> -->
		</tr>
	<?php } ?>
</table>

<p>
<table width="100%">
	<tr>
		<td class="text-start">
			<p>
				Mengetahui
			</p>
			<p>
				Wali Kelas
				<br>
				<br>
				<br>
				<?= $walas['nama_guru']; ?><br>
				-----------------------------<br>
				NIP : <?= $walas['nip']; ?><br>
			</p>
		</td>
		<td align="right">
			<p>
				<?= hari_ini($hari_ini); ?>, <?= date('d-F-Y'); ?>
			</p>
			<p>
				Kepala Sekolah
				<br>
				<br>
				<br>
				<?= $ks['nama_kepsek']; ?><br>
				----------------------<br>
				NIP : <?= $ks['nip']; ?>
			</p>
		</td>
	</tr>
</table>
</p>

<script>
	window.print();
</script>