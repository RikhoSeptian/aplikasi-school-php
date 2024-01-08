<!-- start -->
<div class="page-header">
	<ul class="breadcrumbs">
		<li class="nav-home">
			<a href="#">
				<i class="flaticon-home"></i>
			</a>
		</li>
		<li class="separator">
			<i class="flaticon-right-arrow"></i>
		</li>
		<li class="nav-item">
			<a href="#">Akun Saya</a>
		</li>
	</ul>
</div>
<!-- end -->

<!-- for ganti password start -->
<div class="col-md-6">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Pengaturan Akun</h4>
		</div>
		<div class="card-body">
			<ul class="nav nav-pills nav-secondary nav-pills-no-bd" id="pills-tab-without-border" role="tablist">
				<li class="nav-item">
					<a class="nav-link" id="pills-home-tab-nobd" data-toggle="pill" href="#pills-home-nobd" role="tab" aria-controls="pills-home-nobd" aria-selected="true">Ganti Password</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="pills-profile-tab-nobd" data-toggle="pill" href="#pills-profile-nobd" role="tab" aria-controls="pills-profile-nobd" aria-selected="false">Ganti Foto</a>
				</li>
			</ul>
			<div class="tab-content mt-2 mb-3" id="pills-without-border-tabContent">
				<div class="tab-pane fade show" id="pills-home-nobd" role="tabpanel" aria-labelledby="pills-home-tab-nobd">
					<hr>
					<form action="" method="post">
						<div class="form-group ">
							<label >Ganti Password</label>
							<input name="pass" type="password" class="form-control" placeholder="Password Lama">
						</div>
						<div class="form-group">
							<input name="pass1" type="password" class="form-control" placeholder="Password Baru">
						</div>
						<div class="form-group">
							<button name="changePassword" type="submit" class="btn btn-secondary btn-block">Ganti Password</button>
						</div>
					</form>

					<!-- menjalankan php start -->
					<?php 
					if (isset($_POST['changePassword'])) {
						$passLama = $data['password'];
						$pass = sha1($_POST['pass']);
						$newPass = sha1($_POST['pass1']);

						if ($passLama == $pass) {
							$set = mysqli_query($con,"UPDATE tb_siswa SET password='$newPass' WHERE id_siswa='$data[id_siswa]' ");
							// tampilan jika ganti password berhasil
							echo "
								<script type='text/javascript'>
									setTimeout(function () { 
										swal('Berhasil', 'Password Berhasil Diubah', {
											icon : 'success',
											buttons: {        			
												confirm: {
													className : 'btn btn-success'
												}
											},
										});    
									},10);  
									window.setTimeout(function(){ 
										window.location.replace('?page=change');
									} ,3000);   
								</script>";
												
						} else {
							// tampilan jika input gagal
							echo "
								<script type='text/javascript'>
									setTimeout(function () { 
										swal('Gagal', 'Password Lama Tidak cocok', {
											icon : 'error',
											buttons: {        			
												confirm: {
													className : 'btn btn-danger'
												}
											},
										});    
									},10);  
									window.setTimeout(function(){ 
										window.location.replace('?page=change');
									} ,3000);   
								</script>";
						}
					}
					?>
					<!-- menjalankan php end -->
				</div>
				<div class="tab-pane fade" id="pills-profile-nobd" role="tabpanel" aria-labelledby="pills-profile-tab-nobd">
					<hr>
					<form action="" method="post" enctype="multipart/form-data">
      			<div class="form-group">
      				<label>Foto Profile</label>
      				<p>
      					<center>
      						<img src="../assets/img/user/<?= $data['foto'] ?>" class="img-thumbnail" style="height: 90px;width: 90px;">
      					</center>
							</p>
      				<input type="file" name="foto"> 
      				<input type="hidden" name="id" value="<?=$data['id_siswa']; ?>">
      			</div> 
      			<div class="form-group">
        			<button name="updateProfile" type="submit" class="btn btn-dark btn-block">Simpan</button>
    				</div>
      		</form>

					<!-- menjalankan php start -->
      		<?php 
					if (isset($_POST['updateProfile'])) {

						$gambar = @$_FILES['foto']['name'];

						if (!empty($gambar)) {
							move_uploaded_file($_FILES['foto']['tmp_name'],"../assets/img/user/$gambar");
							$ganti = mysqli_query($con,"UPDATE tb_siswa SET foto='$gambar' WHERE id_siswa='$_POST[id]'");

					  	if ($ganti) {
								// tampilan jika ganti foto berhasil
                echo "
									<script type='text/javascript'>
										setTimeout(function () { 
											swal('Berhasil', 'Foto Berhasil Diubah', {
												icon : 'success',
												buttons: {        			
													confirm: {
														className : 'btn btn-success'
													}
												},
											});    
										},10);  
										window.setTimeout(function(){ 
											window.location.replace('?page=change');
										} ,3000);   
									</script>
								";
              }
						}
					}
					?>
					<!-- menjalankan php end -->
				</div>
				
			</div>
		</div>
	</div>
</div>
<!-- form ganti password end -->

	<a href="javascript:history.back()" class="btn btn-default btn-block mb-1"><i class="fas fa-arrow-circle-left"></i> Kembali</a>