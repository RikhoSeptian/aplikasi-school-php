<div class="page-inner">
  <div class="page-header">
    <h4 class="page-title">PRESENSI</h4>
    <ul class="breadcrumbs">
      <li class="nav-home">
        <a href="dashboard.php">
          <i class="flaticon-home"></i>
        </a>
      </li>
      <!-- <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Presensi</a>
      </li> -->
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Data Absen</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header d-flex align-items-center">
          <h3 class="h4">Data Absen Siswa</h3>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <form action="" method="POST">
              <table id="basic-datatables" class="display table table-striped table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama Siswa</th>
                    <th>Masuk</th>
                    <th>Terlambat</th>
                    <th>Keluar</th>
                    <!-- <th>lembur</th> -->
                    <th>Tanggal Absen</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Nama Siswa</th>
                    <th>Masuk</th>
                    <th>Terlambat</th>
                    <th>Keluar</th>
                    <!-- <th>lembur</th> -->
                    <th>Tanggal Absen</th>
                    <th>Opsi</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php
                  $no = 1;
                  $ambildata = mysqli_query($con, "SELECT * FROM tb_absen");
                  while ($tampil = mysqli_fetch_array($ambildata)) {
                    echo "
                      <tr>
                        <td>$no</td>
                        <td>$tampil[nama_siswa]</td>
                        <td>$tampil[masuk]</td>
                        <td>$tampil[terlambat]</td>
                        <td>$tampil[pulang]</td>
                        <td>$tampil[tgl_absen]</td>
                        <td>
                          <a class='btn btn-success btn-sm' href='?page=presensi&act=del&id=$tampil[id_absen]'>
                            <i class='fas fa-check'></i>
                          </a>
                        </td>
                      </tr>
                    ";
                    $no++;
                  }
                  ?>
                </tbody>
              </table>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>