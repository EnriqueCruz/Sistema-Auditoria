<?php
  $id =$_GET['Id'];
  require_once("Conexion/conexionphp.php");
  mysql_select_db($database,$conexion);
  $sql="select * from datos where id_campo=".$id;
  $Rs=mysql_query($sql,$conexion) or die (mysql_error());
  $row_Rs=mysql_fetch_assoc($Rs);
?>

<script language="javascript">
		function valida(frm)
		{
			if (frm.nom.value == "")
			{
				alert("Introduce el Nombre");
				frm.nom.focus();
				return(false);
			}
			else
				if (frm.edad.value == "")
				{
					alert("Introduce la Edad");
                    frm.edad.focus();
                    return(false);
				}
			else
				if (frm.dir.value == "")
				{
					alert("Introduce la Direccion");
                    frm.dir.focus();
                    return(false);
				}
			else
				if (frm.tel.value == "")
				{
					alert("Introduce el Telefono");
                    frm.tel.focus();
                    return(false);
				}
		}

		function cancelar()
	{
		window.location.href=("Consulta.php")
	}
</script>

<html>
<head>
<title>Actualizar Registro</title>
</head>
  <!--alta.php -->
<body bgcolor="#FD607B" text="#FFFFFF">
	&nbsp;
    <form method="POST" action="modificacion.php?id=<?php echo $id;?>" onSubmit="return valida(this);">
        <table border="3" align="center">


            <tr>
                <td align="justify"><b>Nombre</b></td>
                <td><input type="text" name="nom" value="<?php echo $row_Rs["Nombre"];?>"></td>
            </tr>
            <tr>
                <td align="justify"><b>Edad</b> </td>
                <td><input type="text" name="edad" value="<?php echo $row_Rs["Edad"];?>" readonly></td>
            </tr>
            <tr>
                <td align="justify"><b>Direccion</b> </td>
                <td><input type="text" name="dir" value="<?php echo $row_Rs["Direccion"];?>"></td>
            </tr>
            <tr>
                <td align="justify"><b>Telefono</b> </td>
                <td><input type="text" maxlength = "12" name="tel" value="<?php echo $row_Rs["Telefono"];?>"></td>
            </tr>
            <tr>
                <td colspan="2">
                <center>
                    <input type="submit" value="Aceptar" style="color:#000" >

                    <input type="button" value="Cancelar" style="color:#000" onClick="cancelar()">
                                        <!--<input type="reset" value="Reestablecer" style="color:#000">
                    onClick = "location.ref= 'modificacion.php?Id= <?php echo $id?>'"-->
                </center>
                </td>
            </tr>
        </table>
	</form>
</body>
</html>



