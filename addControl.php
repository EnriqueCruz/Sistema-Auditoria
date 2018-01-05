<?php
	session_start();
	$usuario = $_SESSION['iduser'];	
	
	$idprueba= $_REQUEST['pr'];
	$idsistema= $_REQUEST['sist'];
	$idmetrica= $_REQUEST['met'];
	$idcontrol= $_REQUEST['cont'];
	$objetivo= $_POST['objetivo'];
	$correccion= $_POST['correcion'];
	$resultado= $_POST['resultado'];
	
	     /*require_once("Conexion/conexionphpaud.php");
	     mysql_select_db($database,$conexion);
     	 $sqls="select * from funciones  where id_prueba=" . $idprueba . " and id_usuario=" . $usuario . " and id_sistema=" . $idsistema;
      	 $Rss=mysql_query($sqls,$conexion) or die (mysql_error());
       	 $row_Rss=mysql_fetch_assoc($Rss);
       	 $idfunc= $row_Rss['id_funciones'];
         echo "sqls=" .  $sqls . "<br>";*/
	     
         require_once("Conexion/conexionphpaud.php");
		 mysql_select_db($database,$conexion);
         $addControl="insert  into tipos_controles (id_control,id_sistema,id_metricas,
id_usuario,objetivo,correcion,resultado) values('$idcontrol','$idsistema','$idmetrica','$usuario','$objetivo','$correccion','$resultado')";
         $Rs=mysql_query($addControl,$conexion) or die(mysql_error());
         //$fil_met=mysql_fetch_assoc($Rs);

         header("Location:Controles.php?sist=0&pr=0&met=0&cont=0");
?>