<?php
	session_start();
	//variables post, variable de sesion de usuarios
	$idsist= $_REQUEST['idsist'];// con $_REQUEST se puede recuperar tanto  $_GET y $_POST
	$idpr= $_REQUEST['idp'];
	$namesyst= $_POST['ns'];
	$test= $_POST['prueba'];
	
	$usuario = $_SESSION['iduser'];	
	$systview= $_POST['visionsist'];
	$gralview= $_POST['visiongen'];
	$plan_p= $_POST['planp'];
	//$image= addslashes(file_get_contents($_FILES['imagen']['tmp']));
	$image= $_POST['imagen'];
	$descr= $_POST['desc'];
	$result= $_POST['vresult'];
	
	if(empty($idsist) || $idsist==0 )
		{
			require_once("Conexion/conexionphpaud.php");
    		mysql_select_db($database,$conexion) or die ("No se enoontro la Base de Datos");
		    $sql= "insert into sistema(nombre) values('$namesyst')";	
			mysql_query($sql);
			
			mysql_select_db($database,$conexion) or die ("No se enoontro la Base de Datos");
  			$sqlS="select * from sistema where nombre='" . $namesyst . "'";
  			$RsS=mysql_query($sqlS,$conexion) or die (mysql_error());
  			$row_RsS=mysql_fetch_assoc($RsS);

			$idsist= $row_RsS['id_sistema'];
			
		}
		require_once("Conexion/conexionphpaud.php");
    		mysql_select_db($database,$conexion) or die ("No se enoontro la Base de Datos");
			$sqlpr="insert into funciones(id_prueba,id_sistema,v_sist,v_gral,plan_p,planes_p,descripcion,v_r,id_usuario) values('$idpr','$idsist','$systview','$gralview','$plan_p','$image','$descr','$result','$usuario')";
				
			mysql_query($sqlpr);
			header("Location:Pruebas.php?sis=0&typu=0&tysis=0");
			echo "<script type='text/javascript'>
	   				alert('!Prueba Agregada¡');
			      </script>";
    //mysql_close($conexion);

?>