<?php
	session_start();
	$usuario = $_SESSION['iduser'];	
	
	$idprueba= $_REQUEST['pr'];
	$idsistema= $_REQUEST['sist'];
	$idmetrica= $_REQUEST['met'];
	$comtec= $_POST['result'];
	$coments= $_POST['coment'];
	
	     /*require_once("Conexion/conexionphpaud.php");
	     mysql_select_db($database,$conexion);
     	 $sqls="select * from funciones  where id_prueba=" . $idprueba . " and id_usuario=" . $usuario . " and id_sistema=" . $idsistema;
      	 $Rss=mysql_query($sqls,$conexion) or die (mysql_error());
       	 $row_Rss=mysql_fetch_assoc($Rss);
       	 $idfunc= $row_Rss['id_funciones'];
         echo "sqls=" .  $sqls . "<br>";*/
	     
         require_once("Conexion/conexionphpaud.php");
		 mysql_select_db($database,$conexion);
         $addmet="insert  into tipos_metrica (id_metricas,id_sistema,id_usuario,
id_prueba,resultado,comentario) values('$idmetrica','$idsistema','$usuario','$idprueba','$comtec','$coments')";
         $Rs=mysql_query($addmet,$conexion) or die(mysql_error());
         //$fil_met=mysql_fetch_assoc($Rs);

         //header("Location:Controles.php?sist=0&pr=0&met=0&cont=0");
		 header("Location:Metricas.php?sist=0&pr=0&met=0");
?>