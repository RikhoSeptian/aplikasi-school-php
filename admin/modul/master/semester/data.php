<div class="page-inner">
  <!-- halaman header start -->
  <div class="page-header">
    <h4 class="page-title">Semester</h4>
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
        <a href="#">Data Umum</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Daftar Semester</a>
      </li>
    </ul>
  </div>
  <!-- halaman header end -->
  <!-- halaman data semester start -->
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title">
            <!-- tombol tambah data start -->
            <a href="" class="btn btn-primary btn-sm text-white" data-toggle="modal" data-target="#addSemester">
              <i class="fa fa-plus"></i> 
              Tambah
            </a>
            <!-- tombol tambah data end -->
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <!-- menampilkan tabel data semester start -->
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Semester</th>
                  <th>Status</th>
                  <th>Opsi</th>
                </tr>
              </thead>  
              <tbody>
                <!-- menjalankan php start -->
                <?php 
                  $no=1;
			            $semester = mysqli_query($con,"SELECT * FROM tb_semester");

                  foreach ($semester as $k) {
                ?>
                <!-- menjalankan php end -->
                <tr>
                  <td><?=$no++;?>.</td>
                  <td><?=$k['semester'];?></td>
                  <td>
                    <!-- menjalankan php start -->
                    <?php 
                      if ($k['status'] == 0) {
                        echo "<span class='badge badge-danger'>Tidak Aktif</span>";
                      } else {
                        echo "<span class='badge badge-success'>Aktif</span>";
                      }
                    ?>
                    <!-- menjalankan php end -->
                  </td>
                  <td> 
                    <!-- menampilkan tombol aktif, edit & delet start -->
                    <!-- pengkondisian start -->
                    <?php 
                      if ($k['status'] == 0) {
                    ?>
                      <a onclick="return confirm('Yakin Aktifkan Semester  ??')" href="?page=master&act=set_semester&id=<?=$k['id_semester'] ?>&status=1" class="btn btn-success btn-sm"><i class="fas fa-check-circle"></i> Aktifkan</a>
                    <?php
                    } else {
                    ?>
                      <a onclick="return confirm('Yakin NonAktifkan Semester  ??')" href="?page=master&act=set_semester&id=<?=$k['id_semester'] ?>&status=0" class="btn btn-danger btn-sm"><i class="far fa-times-circle"></i> Nonaktif</a>
                    <?php } ?>
                    <!-- pengkondisian end -->

                    <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit<?=$k['id_semester'] ?>">
                      <i class="far fa-edit"></i> 
                      Edit
                    </a>
                    <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ??')" href="?page=master&act=delsemester&id=<?=$k['id_semester'] ?>">
                      <i class="fas fa-trash"></i> 
                      Del
                    </a>
                    <!-- menampilkan tombol aktif, edit & delet end -->

                    <!-- tampilan edit start -->
                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit<?=$k['id_semester'] ?>" class="modal fade" style="display: none;">
                      <!-- menampilkan dialog start -->
                      <div class="modal-dialog">
                        <!-- menampilkan content start -->
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 id="exampleModalLabel" class="modal-title">Edit semester</h4>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close">
                              <span aria-hidden="true">×</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <!-- form edit start -->
                            <form action="" method="post">
                              <div class="row">
                                <div class="col-md-10">
                                  <div class="form-group">
                                    <label>Semester</label>
                                    <input name="id" type="hidden" value="<?=$k['id_semester'] ?>">
                                    <input name="semester" type="text" value="<?=$k['semester'] ?>" class="form-control">
                                  </div>
                                  <div class="form-group">                    
                                    <button name="edit" class="btn btn-primary" type="submit">Edit</button>
                                  </div>                        
                                </div>                      
                              </div>
                            </form>
                            <!-- form edit end -->
                            <!-- menjalankan php start -->
                            <?php 
                              if (isset($_POST['edit'])) {
                                $save= mysqli_query($con,"UPDATE tb_semester SET semester='$_POST[semester]' WHERE id_semester='$_POST[id]' ");

                                if ($save) {
                                  echo "
                                    <script>
                                      alert('Data diubah !');
                                      window.location='?page=master&act=semester';
                                    </script>
                                  ";
                                }
                              }
                            ?>
                            <!-- menjalankan php end -->
                          </div>
                        </div>
                        <!-- menampilkan content end -->
                      </div>
                      <!-- menampilkan dialog end -->
                    </div>
                    <!-- menampilkan edit end -->
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
            <!-- menampilkan tabel data semester end -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- halaman data semester end -->
</div>

<!-- halaman tambah data start -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="addSemester" class="modal fade" style="display: none;">
  <!-- menampilkan dialog start -->
  <div class="modal-dialog">
    <!-- menampilkan content start -->
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="exampleModalLabel" class="modal-title">Tambah semester</h4>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- form tambah data start -->
        <form action="" method="post" class="form-horizontal">
          <div class="form-group">
            <label>Semester</label>
            <input name="semester" type="text" placeholder="Nama semester .." class="form-control">
          </div>
          <div class="form-group">                     
            <button name="save" class="btn btn-primary" type="submit">Save</button>
          </div>
        </form>
        <!-- form tambah data end -->
        <!-- menjalankan php start -->
        <?php 
          if (isset($_POST['save'])) {
            $save = mysqli_query($con,"INSERT INTO tb_semester VALUES(NULL,'$_POST[semester]', '1') ");
            if ($save) {
              echo "
                <script>
                  alert('Data tersimpan !');
                  window.location='?page=master&act=semester';
                </script>
              ";
            }
          }
        ?>
        <!-- menjalankan php end -->
        </div>
      </div>
      <!-- menamplkan content end -->
    </div>
    <!-- menampilkan dialog end -->
</div>
<!-- halaman tambah data end -->


