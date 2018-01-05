 <?php

      $name = $_POST['nom'];
      $age = $_POST['edad'];
      $address = $_POST['dir'];
      $phone = $_POST['tel'];

      require_once("Conexion/conexionphp.php");
      mysql_select_db($database,$conexion) or die ("No se enoontro la Base de Datos");
      $sql= "insert into datos(Nombre,Edad,Direccion,Telefono) values('$name',$age,'$address',$phone)";
      mysql_query($sql);
      mysql_close($conexion);
      header("Location:Consulta.php");
      
      
      
 ?>



