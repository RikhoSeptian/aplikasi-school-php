<div class="page-inner">
  <!-- start -->
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
        <a href="#">Tambah Guru</a>
      </li>
    </ul>
  </div>
  <!-- end -->

  <!-- halaman tambah data guru start -->
  <div class="row">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-header d-flex align-items-center">
          <h3 class="h4">Form Tambah Guru</h3>
        </div>
        <div class="card-body">
		      <form action="?page=guru&act=proses" method="post" enctype="multipart/form-data">
		      	<div class="form-group">
		      		<label>NIK</label>
		      		<input name="nip" type="text" class="form-control" placeholder="NIK" required>
		      	</div>
		      	<div class="form-group">
		      		<label>Nama Guru</label>
		      		<input name="nama" type="text" class="form-control" placeholder="Nama dan Gelar" required>
		      	</div>
		      	<div class="form-group">
		      		<label>Email</label>
		      		<input name="email" type="email" class="form-control" placeholder="Email" required>
		      	</div>
            <div class="form-group">
		      		<label>Password</label>
		      		<input name="password" type="password" class="form-control" placeholder="Password" required>
		      	</div>
		      	<div class="form-group">
		      		<label>Foto</label>
		      		<input class="form-control" type="file" name="foto" placeholder="Foto" required>
		      	</div>
		      	<div class="form-group">
		      		<button name="saveGuru" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
		      		<a href="javascript:history.back()" class="btn btn-warning"><i class="fa fa-chevron-left"></i> Batal</a>
		      	</div>
		      </form>
        </div>
      </div>
    </div>
  </div>
  <!-- halaman tambah data guru end -->
</div>
