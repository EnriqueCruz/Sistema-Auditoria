<?php

	if (empty($_POST['campos']))
	{
		echo "Ningun registro seleccionado";
	}
	else
	{
		$vid=$_POST['campos'];
		require_once("Conexion/conexionphp.php");
		mysql_select_db($database,$conexion) or die ("No se encontro BD");
		$sql = "delete from datos where id_campo in(".Implode(",",$vid).")";
		mysql_query($sql);
		mysql_close($conexion);
		header("location:Consulta.php");
	}
?>


