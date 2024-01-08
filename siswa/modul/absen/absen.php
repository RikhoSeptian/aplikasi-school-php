  <div class="card">
    <div class="card-body">

      <h4 class="card-title">Absen Hari Ini | <b style="text-transform: uppercase;"><code> <?= $_SESSION['nama_siswa'] ?> </code></b></h4>
      <hr>
      <div class="row">
        <div class="col-xl-12">
          <div class="card text-left">
            <div class="card-body">
              <!-- Senin, 10-01-2019 <b>Hadir</b> -->
              <b class="text-primary" style="text-transform: uppercase;"><?= date('d-m-Y'); ?></b>
              <!-- <hr> -->
              <table cellpadding="5" width="100%">
                <?php
                session_start();

                if (empty($_SESSION['siswa'])) {
                  header("Location: ../../index.php");
                  exit;
                }

                $id_login = @$_SESSION['siswa'];
                $sql = mysqli_query($con, "SELECT * FROM tb_siswa
	                INNER JOIN tb_mkelas ON tb_siswa.id_mkelas=tb_mkelas.id_mkelas
                  WHERE tb_siswa.id_siswa = '$id_login'") or die(mysqli_error($con));
                $data = mysqli_fetch_array($sql);

                $_SESSION['nama_siswa'] = $data['nama_siswa'];
                ?>

                <!-- begin page content -->
                <div class="container-fluid">
                  <!-- page heading -->
                  <div class="d-sm-flex align-items-center justify-content-between mb-4">
                  </div>

                  <!-- content row -->
                  <?php

                  date_default_timezone_set('asia/jakarta');

                  $s = $_SESSION['nama_siswa'];
                  $tgl = date('Y-m-d');
                  $query_siswa = mysqli_query($con, "SELECT * FROM tb_absen WHERE nama_siswa = '$s' AND tgl_absen = '$tgl'");
                  $data = mysqli_fetch_array($query_siswa);
                  $cek = mysqli_num_rows($query_siswa);
                  $now = date('H:i');
                  // $now = "10:00";
                  // echo $query_siswa;
                  if ($cek != 1) {
                    $set_buka = "06:30";
                    $set_tutup = "12:00";
                    // $jam_masuk = "12:01;

                    if ($now < $set_buka) {
                  ?>
                      <h4 class="card-title"><b style="text-transform: capitalize;"><code> absen masuk di buka jam 06:30 </code></b></h4>
                    <?php
                    } else if ($now <= $set_tutup) {
                    ?>
                      <h4 class="card-title"><b style="text-transform: capitalize;"><code> Absen Masuk Ditutup Jam 12:00</code></b></h4>

                      <form action="?a=M" method="POST">
                        <button type="submit" name="submit" class="btn btn-success btn-block btn-lg">
                          <h4 class="card-title"><b style="text-transform: uppercase;"><code style=" color: #000;">Absen Masuk</code></b></h4>
                        </button>
                      </form>
                    <?php } ?>

                    <?php } else if ($cek == 1) {
                    $buka_pulang = '12:01';
                    $set_pulang_akhir = '23:59';

                    if ($data['pulang'] !== null) {
                    ?>
                      <h4 class="card-title"><b style="text-transform: capitalize;"><code> Absen hari ini telah selesai </code></b></h4>
                      <?php
                    } else {
                      if ($now < $buka_pulang) {
                      ?>
                        <h4 class="card-title"><b style="text-transform: capitalize;"><code> Absen Pulang Dibuka Jam 12:00 </code></b></h4>
                      <?php } else { ?>
                        <h4 class="card-title"><b style="text-transform: capitalize;"><code>Silahkan Absen Pulang</code></b></h4>
                        <form action="?a=P" method="POST">
                          <button type="submit" name="submit" class="btn btn-success btn-block btn-lg">
                            <h4 class="card-title"><b style="text-transform: uppercase;"><code style=" color: #000;">Absen Pulang</code></b></h4>
                          </button>
                        </form>

                      <?php } ?>

                  <?php }
                  } 
                  ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <a href="javascript:history.back()" class="btn btn-default btn-block"><i class="fas fa-arrow-circle-left"></i> Kembali</a>