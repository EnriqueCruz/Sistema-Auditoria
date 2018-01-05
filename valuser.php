<?php
 $user= $_POST['usu'];
 $pass= $_POST['pass'];
 
  session_start();
  	  ob_start(); 
  require_once("Conexion/conexionphpaud.php");
  mysql_select_db($database,$conexion) or die ("No se enoontro la Base de Datos");
  $sql="select * from Usuario where login='" . $user . "' and password ='" . $pass . "'";
  $Rs=mysql_query($sql,$conexion) or die (mysql_error());
  $row_Rs=mysql_fetch_assoc($Rs);
  
  if($row_Rs["login"] == $user && $row_Rs["password"] == $pass){
 	  $_SESSION['usuario'] = $user;
	  $_SESSION['contraseña'] = $pass;
	  $_SESSION['iduser']=$row_Rs["id_usuario"] ;
	  //header("Location:Metricas.php?sist=0&pr=0&met=0");
	  //header("Location:Pagina Principal.php");
	  header("Location:Pagina Principal.php");
  
  }else
  {
     
	  header("Location:login.php");
	  ?>  
	   <script type="text/javascript">
	   alert("!Usuario o Contraseña Invalidos¡");
	   </script>
<?php  } ?>

