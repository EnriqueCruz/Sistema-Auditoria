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
				if (frm.edad.value == 0 || frm.edad.value >= 100)
			{
					alert("Rango de Edad no Admitido");
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
	
	function onlynum(evt)
       {
            evt = (evt) ? evt : window.event
            var charCode = (evt.which) ? evt.which : evt.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                status = "This field accepts numbers only."
                return false
            }
            status = ""
            return true
        }
</script>

<html>
<head>
<title>Agenda_Alta</title>
</head>
  <!--alta.php -->
<body bgcolor="#80FF80" text="#FF8040">
	&nbsp;
    <form method="post" action="agregar.php" onSubmit="return valida(this);">
        <table border="3" align="center">
            <tr>
                <td align="justify"><b>Nombre</b></td>
                <td><input type="text" name="nom"></td>
            </tr>
            <tr>
                <td align="justify"><b>Edad</b> </td>
                <td><input type="text" maxlength="3" name="edad" onKeyPress="return onlynum(event)"></td>
            </tr>
            <tr>
                <td align="justify"><b>Direccion</b> </td>
                <td><input type="text" name="dir"></td>
            </tr>
            <tr>
                <td align="justify"><b>Telefono</b> </td>
                <td><input  maxlength="12" name="tel" onKeyPress="return onlynum(event)"></td>
            </tr>
            <tr>
                <td colspan="2">
                <center>
                    <input type="button" value="Cancelar" style="color:#000" onClick="cancelar()">
                    <input type="submit" value="Aceptar" style="color:#000">
                    <input type="reset" value="Reestablecer" style="color:#000">
                </center>
                </td>
            </tr>
        </table>
	</form>
</body>
</html>



