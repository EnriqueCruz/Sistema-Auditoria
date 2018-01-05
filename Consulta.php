  <?php
  require_once("Conexion/conexionphp.php");
  mysql_select_db($database,$conexion);
  $sql="select * from datos";
  $Rs=mysql_query($sql,$conexion) or die (mysql_error());
  $row_Rs=mysql_fetch_assoc($Rs);
?>

<script language="javascript">
	function alta()
	{
		window.location.href=("alta.php")
	}
	


</script>

<HTML>
<HEAD>
 <TITLE>Agenda_Consulta</TITLE>
</HEAD>
<BODY bgcolor="#FFFFC0" text="#202020">
      &nbsp;
      <center> 

	  </center>
   &nbsp;

      <form method = "POST" action= "eliminar.php">
      <table border="3" align="center" width="65%" text="#FF8080s">
              <tr align="right" border ="0" colspan= "5">

                  <center>

                  <td colspan= "6"><input type="button" onClick="alta()" value="Nuevo Registro" style="color:#000" align= "Center">
                  <input type="submit" value="Eliminar Registro" ></td>

                  </CENTER>
              </tr>

              <tr align="center" bordercolor="">

                 <td><b><font color ="#F95E13">Id_Campo</font></b></td>
                 <td><b><font color ="#F95E13">Nombre</font></b></td>
                 <td><b><font color ="#F95E13">Edad</font></b></td>
                 <td><b><font color ="#F95E13">Direccion</font></b></td>
                 <td><b><font color ="#F95E13">Telefono</font></b></td>
             </tr>

             <?php do{ ?>
                <tr align="center">

                    <td><input type="checkbox" name="campos[]" value ="<?php echo $row_Rs["Id_Campo"];?>"></td>
                    <?php echo "<td> <a href='actualizacion.php?Id=".$row_Rs["Id_Campo"]."'>".$row_Rs["Id_Campo"]."</a> </td>"; ?>

                    <td> <?php echo $row_Rs["Nombre"]; ?> </td>
                    <td> <?php echo $row_Rs["Edad"]; ?> </td>
                    <td> <?php echo $row_Rs["Direccion"]; ?> </td>
                    <td> <?php echo $row_Rs["Telefono"]; ?> </td>
                </tr>
             <?php }while($row_Rs=mysql_fetch_assoc($Rs)); ?>
      </table>
      </form>

</BODY>
</HTML>
