<script language="javascript">
     function cajatxt(frm){
			if (frm.usu.value == "")
			{
				alert("Introduce el Uusario");
				frm.usu.focus();
				return(false);
			}
			else
				if (frm.pass.value == "")
				{
					alert("Introduce la Contraseña");
                    frm.pass.focus();
                    return(false);
				}
           }

</script>



<HTML>
<HEAD>
 <TITLE>New Document</TITLE>
</HEAD>
<BODY>
   <form  action="valuser.php" method="post" onSubmit="return cajatxt(this)";>
      <table border="1" align="center">
      <tr>
          <td colspan="2" align="center">Bienvenido</td>

      </tr>
      <tr>
          <td colspan="2" align="center">Introduce tus Datos Por Favor</td>

      </tr>
      <tr>
          <td>Uusario</td>
          <td><input type="text" maxlength="50" name="usu"></td>
      </tr>
      <tr>
          <td>Password</td>
          <td><input type="password" maxlength="50" name="pass"></td>
      </tr>
      <tr align="center">
          <td colspan="2"><input type="Submit" onClick="return valida(this)" value="Entrar" ></td>

      </tr>
      </table>
   </form>
</BODY>
</HTML>
