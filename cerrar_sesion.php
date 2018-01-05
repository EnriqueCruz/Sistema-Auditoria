<?php
	session_start();
	
	echo "<script language='javascript'>
	top.window.location='login.php';
	</script>";
	session_destroy();
?>