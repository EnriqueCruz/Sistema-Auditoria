<?php
      $cve = $_REQUEST['id'];
      $namem = $_POST['nom'];
      $agem = $_POST['edad'];
      $addressm = $_POST['dir'];
      $phonem = $_POST['tel'];

      require_once("Conexion/conexionphp.php");
      mysql_select_db($database,$conexion) or die ("No se enoontro la Base de Datos");
      //$sql= "insert into datos(Nombre,Edad,Direccion,Telefono) values('$name',$age,'$address',$phone)";
      $sql= "update datos  set Nombre ='$namem',Edad=$agem , Direccion='$addressm', Telefono=$phonem where Id_Campo = $cve";
      mysql_query($sql);
      mysql_close($conexion);
      header("Location:Consulta.php");
?>

