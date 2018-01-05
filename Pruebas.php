<?php
error_reporting(E_ALL ^ E_NOTICE);

session_start();
$id_usuario = $_SESSION['iduser'];
	if($id_usuario==0)
	{
		
		header("Location:login.php");
		
	}
$vsis = $_GET["sis"];
$rdbtn = $_REQUEST["typu"];
$selsist = $_REQUEST["tysis"];
//$id_usuario = $_SESSION['iduser'];


/*echo $rdbtn;
echo $selsist;
echo $_SESSION['iduser'];
echo $vsis;*/
?>
<script language="javascript">
		 function rdbtn()
		 {
				  var obtipop = document.getElementsByName("prueba");
				  var nomsist = document.getElementsByName("ns")[0].value;
				  for(var i=0; i<obtipop.length; i++ )
				  {
						  if(obtipop[i].checked)
						  {
						  window.location.href=("Pruebas.php?sis="+<?php echo $vsis;?>+"&typu="+obtipop[i].value+"&tysis="+nomsist);
						  //alert(obtipop[i].value);
						  }
				  }
		 } 
	  function val(frm)
	  {
		  	var seleccionado = false;
			for(var i=0; i<prueba.length; i++) 
			{    
			  if(prueba[i].checked)
			  {
    			seleccionado = true;
    		  break;
  			  }
			}
 
			if(!seleccionado)
			{
			alert("Selecciona una prueba");
  			return (false);
			}
		  
			if (frm.ns.value == "")
				{
					alert("Introduce el Nombre del Sistema");
					frm.ns.focus();
					return(false);
				}
			else 
				if (frm.visionsist.value == "")
				{
					alert("Introduce la Vision Sistematica");
					frm.visionsist.focus();
					return(false);
				}
			else
				if (frm.visiongen.value == "")
				{
					alert("Introduce la Vision General");
                    frm.visiongen.focus();
                    return(false);
				}
            else
				if (frm.planp.value == "")
				{
					alert("Introduce la Vision Sistematica");
					frm.planp.focus();
					return(false);
				}
			else
				if (frm.imagen.value == "")
				{
					alert("Introduce el Plan de Pruebas");
                    frm.imagen.focus();
                    return(false);
				}
            else
				if (frm.desc.value == "")
				{
					alert("Introduce la Descripcion");
                    frm.desc.focus();
                    return(false);
				}
            else
				if (frm.vresult.value == "")
				{
					alert("Introduce los Resultados");
                    frm.vresult.focus();
                    return(false);
				}
           
		   
		   
	}
	 
</script>

<HTML>
<HEAD>
 <TITLE>New Document</TITLE>
 <link rel="stylesheet" type="text/css" href="./css/estilotabla.css">
	
</HEAD>
<BODY>
		<form method="post" action="addprueba.php?idsist=<?php echo $selsist;?>&idp=<?php echo $rdbtn;?>" onSubmit="return val(this)" enctype="multipart/form-data">
          <table border="1"  align="center" class="prueba">
                <tr>
                  <td colspan>Nombre del Sistema</td>
                  
                  <td>
					  <?php 
                      if($vsis == 0){ ?>
                      <select name="ns" id="ns" style="alignment-adjust:middle">
                      <?php
                        require_once("Conexion/conexionphpaud.php");
                        mysql_select_db($database,$conexion);
                        $sql="select * from sistema";
                        $Rs=mysql_query($sql,$conexion) or die (mysql_error());
                        $row_Rs=mysql_fetch_assoc($Rs);
                        do{
							if($selsist==$row_Rs["id_sistema"]){
                      ?>
                      <option value="<?php echo $row_Rs["id_sistema"];?>" selected><?php echo $row_Rs["nombre"];?></option>
                      
                      
                      <?php 
							}
					  else
					  		{
					  ?>
                      
                      <option value="<?php echo $row_Rs["id_sistema"];?>" ><?php echo $row_Rs["nombre"];?></option>
                      
                      <?php }}while($row_Rs = mysql_fetch_assoc($Rs));
                      ?>
                      </select>
				   </td>
                   <td><a href="Pruebas.php?sis=1&typu=0&tysis=0" class="liga">Nuevo</a></td>
                </tr>
                	  <?php 
					  
					  }
					  else
					  {
					  ?>
                      	<input type="text" name="ns">
                      	<td><a href="Pruebas.php?sis=0&typu=0&tysis=0" class="liga">¿Ya existe?</a></td>

                      <?php
					  }
					  ?>
                		
                <tr>
                  <td colspan="3" align="center">Tipo de Prueba</td>
                </tr>
<tr>
                <?php
                        require_once("Conexion/conexionphpaud.php");
                        mysql_select_db($database,$conexion);
                        $sqlp="select * from prueba";
                        $Rsp=mysql_query($sqlp,$conexion) or die (mysql_error());
                        $row_Rsp=mysql_fetch_assoc($Rsp);
                        do{
							if($rdbtn==$row_Rsp["id_prueba"]){
				?>	
						<?php 
					   if($row_Rsp ["id_prueba"] == 1 || $row_Rsp ["id_prueba"] == 6 ||  $row_Rsp ["id_prueba"] == 11){   
					   ?>
                        <td>
                        <?php }
						?>
                        
                        <input type="radio" name="prueba" id="prueba" value="<?php echo $row_Rsp ["id_prueba"];?>" onChange="rdbtn()" checked><?php echo $row_Rsp["tipo"];?><br>
                        <?php
							}
							else
							{
						
						?>
                        	
                       <?php 
					   if($row_Rsp ["id_prueba"] == 1 || $row_Rsp ["id_prueba"] == 6 ||  $row_Rsp ["id_prueba"] == 11){   
					   ?>
                        <td>
                        <?php }
						?>
                        <input type = "radio" name="prueba" id="prueba" value="<?php echo $row_Rsp ["id_prueba"];?>" onChange="rdbtn()"><?php echo $row_Rsp["tipo"];?><br>
                        <?php }if($row_Rsp ["id_prueba"] == 5 || $row_Rsp ["id_prueba"] == 15){   /**/?>
                        </td>
                        <?php }    ?>
                      


                        <?php }while($row_Rsp = mysql_fetch_assoc($Rsp));?>

</tr>
                
               <?php
               
			   
			   ?> 
                
                <?php
               // if($rdbtn<>0){
				 	if($vsis==0){$selsist= $selsist;}else{$selsist=0; $rdbtn=0; $id_usuario=0;}
					require_once("Conexion/conexionphpaud.php");
                    mysql_select_db($database,$conexion);
                    $sqlc="select * from funciones where id_prueba=". $rdbtn. " and id_usuario=". $id_usuario . " and id_sistema=" . $selsist;
                    $Rsc=mysql_query($sqlc,$conexion) or die (mysql_error());
                    $row_Rsc=mysql_fetch_assoc($Rsc);
				 	//echo $sqlc;
					if($row_Rsc<>0){
				?>
                	<tr>
                	<td colspan="2">Vision Sistematica</td>
                    <td><input type="text" name="visionsist" value="<?php echo $row_Rsc['v_sist'];?>" readonly></td>
                
                </tr>
                
                <tr>
                	<td colspan="2">Vision General</td>
                    <td><input type="text" name="visiongen" value="<?php echo $row_Rsc['v_gral'];?>" readonly></td>
                
                </tr>
                
                <tr>
                	<td>Plan de Prueba</td>
                    
                    <td colspan="2"><input type="text" name="planp" value="<?php echo $row_Rsc['plan_p'];?>" readonly></td>
                
                </tr>
                
                <tr>
                	<td height="38">Planes de Prueba</td>
                    
                  <td colspan="2"><input type="text" name="imagen"  value="<?php echo $row_Rsc['planes_p'];?>"readonly></td>
                
                </tr>
              
               
               <tr>
                	<td colspan="2">Descripcion</td>
                    <td colspan="2"><input type="text" name="desc" value="<?php echo $row_Rsc['descripcion'];?>" readonly></td>
                
                </tr>
                
                
                <tr>
                	<td colspan="2">Verificacion de Resultados</td>
                    <td><input type="text" name="vresult" value="<?php echo $row_Rsc['v_r'];?>" readonly></td>
                
                </tr>
               
               
                <tr>
                  <td colspan="3" align="center"><input type="submit" disabled ></td>
                
                <?php 
				}else{
				?>
                
                <tr>
                	<td colspan="2">Vision Sistematica</td>
                    <td><input type="text" name="visionsist"></td>
                
                </tr>
                
                <tr>
                	<td colspan="2">Vision General</td>
                    <td><input type="text" name="visiongen"></td>
                
                </tr>
                
                <tr>
                	<td>Plan de Prueba</td>
                    
                    <td colspan="2"><input type="text" name="planp" ></td>
                
                </tr>
                
                <tr>
                	<td>Planes de Prueba</td>
                    
                    <td colspan="2"><input type="text" name="imagen" ></td>
                
                </tr>
              
               
               <tr>
                	<td colspan="2">Descripcion</td>
                    <td colspan="2"><input type="text" name="desc"></td>
                
                </tr>
                
                
                <tr>
                	<td colspan="2">Verificacion de Resultados</td>
                    <td><input type="text" name="vresult"></td>
                
                </tr>
               
               
                <tr>
                  <td colspan="3" align="center"><input type="submit" ></td>
                  
                </tr>
                <?php }?>
        </table>
     </form>
</BODY>
</HTML>
