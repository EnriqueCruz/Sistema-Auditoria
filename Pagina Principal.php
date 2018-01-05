<?php
	session_start();
	$id_usuario = $_SESSION['iduser'];
	if($id_usuario==0)
	{
		
		header("Location:login.php");
		
	}


?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t�tulo</title>
</head>

<frameset rows="15%,*" cols="460*">
  <frame name="titulo" src="BIENVENIDA.php">
<frameset rows="*" cols="26%,*">
  <frame name="menu" src="ppMenu.php">
  <frame name="centro" src="Pruebas.php?sis=0&typu=0&tysis=0" >
</frameset>

</frameset><noframes></noframes>
</html>
