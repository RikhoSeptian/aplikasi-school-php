<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();

//kembali/redirect ke halaman login.php
?>
	<script>
		window.location='../user.php';
	</script>