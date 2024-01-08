<?php 
	$del = mysqli_query($con,"DELETE FROM tb_absen WHERE id_absen='$_GET[id]'");
	if ($del) {
		echo "
				<script type='text/javascript'>
					setTimeout(function () { 
						swal('Berhasil di konfirmasi admin', {
							icon : 'success',
							buttons: {
								confirm: {
									className : 'btn btn-success'
								}
							},
						});    
					},10);  
					window.setTimeout(function(){ 
						window.location.replace('?page=presensi');
					} ,3000);   
				</script>
			";
	}
 ?>