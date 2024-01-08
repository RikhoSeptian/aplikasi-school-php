<div class="page-inner">
  <!-- halaman header start -->
  <div class="page-header">
    <h4 class="page-title">Siswa</h4>
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
        <a href="#">Data Siswa</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Tambah Siswa</a>
      </li>
    </ul>
  </div>
  <!-- halaman header end -->
  <!-- halaman data tambah siswa start -->
  <div class="row">
    <div class="col-12 col-md-12 col-sm-12 col-lg-12">
      <div class="card">
        <div class="card-header d-flex align-items-center">
          <h3 class="h4">Data Siswa</h3>
        </div>
        <div class="card-header">
          <div class="card-title">
            <a href="?page=siswa&act=add" class="btn btn-primary btn-sm text-white">
              <i class="fa fa-plus"></i>
              Tambah Siswa
            </a>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="basic-datatables" class="display table table-striped table-hover ">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>NIS/NISN</th>
                  <th>Nama Siswa</th>
                  <th>Tempat Tanggal Lahir</th>
                  <th>Kelas</th>
                  <th>Alamat</th>
                  <th>Tahun Masuk</th>
                  <th>Status</th>
                  <th>Foto</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No.</th>
                  <th>NIS/NISN</th>
                  <th>Nama Siswa</th>
                  <th>Tempat Tanggal Lahir</th>
                  <th>Kelas</th>
                  <th>Alamat</th>
                  <th>Tahun Masuk</th>
                  <th>Status</th>
                  <th>Foto</th>
                  <th>Opsi</th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                $no = 1;
                $siswa = mysqli_query($con, "SELECT * FROM tb_siswa 
                  INNER JOIN tb_mkelas ON tb_siswa.id_mkelas=tb_mkelas.id_mkelas 
                  
                  ORDER BY id_siswa ASC");

                foreach ($siswa as $g) {
                ?>
                  <tr>
                    <td><?= $no++; ?>.</td>
                    <td><?= $g['nis']; ?></td>
                    <td><?= $g['nama_siswa']; ?></td>
                    <td><?= $g['tempat_lahir']; ?>, <?= $g['tgl_lahir'];?></td>
                    <td><?= $g['nama_kelas']; ?></td>
                    <td><?= $g['alamat']; ?></td>
                    <td><?= $g['th_angkatan']; ?></td>
                    <td>
                      <?php if ($g['status'] == 1) {
                        echo "<span class='badge badge-success'>Aktif</span>";
                      } else {
                        echo "<span class='badge badge-danger'>Off</span>";
                      }
                      ?>
                    </td>
                    <td>
                      <img src="../assets/img/siswa/<?= $g['foto'] ?>" width="45" height="45">
                    </td>
                    <td>
                      <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ??')" href="?page=siswa&act=del&id=<?= $g['id_siswa'] ?>">
                        <i class="fas fa-trash"></i>
                      </a>
                      <a class="btn btn-info btn-sm" href="?page=siswa&act=edit&id=<?= $g['id_siswa'] ?>">
                        <i class="far fa-edit"></i>
                      </a>
                    </td>
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