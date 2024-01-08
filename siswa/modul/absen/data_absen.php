<div class="page-inner">
  <div class="page-header">
    <h4 class="page-title">Guru</h4>
    <ul class="breadcrumbs">
      <li class="nav-home">
        <a href="dashboard.php">
          <i class="flaticon-home"></i>
        </a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Data Guru</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Daftar Guru</a>
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
            <table id="basic-datatables" class="display table table-striped table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Siswa</th>
                  <th>Masuk</th>
                  <th>Terlambat</th>
                  <th>Keluar</th>
                  <th>lembur</th>
                  <th>Tanggal Absen</th>
                  <!-- <th>Opsi</th> -->
                </tr>
              </thead>
              <tfoot>
              <tr>
                  <th>#</th>
                  <th>Nama Siswa</th>
                  <th>Masuk</th>
                  <th>Terlambat</th>
                  <th>Keluar</th>
                  <th>lembur</th>
                  <th>Tanggal Absen</th>
                  <!-- <th>Opsi</th> -->
                </tr>
              </tfoot>
              <tbody>
                <?php
                $no = 1;
              //   $Absen = mysqli_query($con, "SELECT * FROM tb_absen
              //   INNER JOIN tb_siswa ON tb_absen.id_siswa=tb_siswa.id_siswa
              //   ORDER BY id_absen ASC
              //  ");
                $Absen = mysqli_query($con,"SELECT * FROM tb_absen 

                  ORDER BY nama_siswa ASC");
                  foreach ($Absen as $g) { ?>
                    <tr>
                      <td><?= $no++; ?>.</td>
                      <td><?= $g['nama_siswa']; ?></td>
                      <td><?= $g['masuk']; ?></td>
                      <td><?= $g['terlambat']; ?></td>
                      <td><?= $g['pulang'];?></td>
                      <td><?= $g['lembur'];?></td>
                      <td><?= $g['tgl_absen'];?></td>
                      <!-- <td>
                        <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ??')" href="?page=kehadiran&act=del&id=<?=$g['id_absen'] ?>">
                          <i class="fas fa-trash"></i>
                        </a>
                      </td> -->
                    </tr>
                  <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>