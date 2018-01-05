<?php
	session_start();
	$id_usuario = $_SESSION['iduser'];
	if($id_usuario==0)
	{	
		header("Location:login.php");	
	}

	$system= $_REQUEST['sist'];
	$test= $_REQUEST['pr'];
	$metric= $_REQUEST['met'];
	$control= $_REQUEST['cont'];
	
	/*echo "sistema: " . $system;
	echo "  prueba: " . $test;
	echo "  metrica: " . $metric;
	echo "  control: " . $control;
	echo "<br>Id usuario: " . $id_usuario;
	*/

?>

<script language="javascript">
	
	function val(frm)
	{
		var seleccionado = false;
				for(var i=0; i<control.length; i++) 
				{    
				  if(control[i].checked)
				  {
					seleccionado = true;
				  break;
				  }
				}
	 
				if(!seleccionado)
				{
				alert("Selecciona un Tipo de Control");
				return (false);
				}
			  
				if (frm.ns.value == "")
					{
						alert("Introduce el Nombre del Sistema");
						frm.ns.focus();
						return(false);
					}
				else 
					if (frm.np.value == "" || frm.np.value == 0)
					{
						alert("Introduce la Prueba");
						frm.np.focus();
						return(false);
					}
				else
					if (frm.nm.value == "" || frm.nm.value == 0)
					{
						alert("Introduce la Metrica");
						frm.nm.focus();
						return(false);
					}
				else
					if (frm.objetivo.value == "")
					{
						alert("Introduce el objetivo");
						frm.objetivo.focus();
						return(false);
					}
				else
					if (frm.correcion.value == "")
					{
						alert("Introduce a correccion");
						frm.correcion.focus();
						return(false);
					}
				else
					if (frm.resultado.value == "")
					{
						alert("Introduce el resultado");
						frm.resultado.focus();
						return(false);
					}
	}
	
	
	function cont()
	{
		var nomsistc = document.getElementsByName("ns")[0].value;
		var pruebasc = document.getElementsByName("np")[0].value;
		var metric = document.getElementsByName("nm")[0].value;
		var getControl = document.getElementsByName("control");
		
		pruebasc = (pruebasc!="") ?  pruebasc:0;	
		metric = (metric!="") ?  metric:0;
		
		for(var i=0; i<getControl.length; i++ )
		{
			  if(getControl[i].checked)
			  {		
			  	  //	alert(getControl[i].value);  
				  window.location.href=("Controles.php?sist="+nomsistc+"&pr="+pruebasc+"&met="+metric+"&cont="+getControl[i].value);
			  }
		}
	}
		
		
	function chsis()
	{
		
		var nomsistc = document.getElementsByName("ns")[0].value;
		var pruebasc = document.getElementsByName("np")[0].value;
		var metric = document.getElementsByName("nm")[0].value;
		
		pruebasc = (pruebasc!="") ?  pruebasc:0;	
		metric = (metric!="") ?  metric:0;
	
		//alert(nomsistc);
		window.location.href=("Controles.php?sist="+nomsistc+"&pr="+pruebasc+"&met="+metric+"&cont="+<?php echo $control; ?>);	
			
	}

</script>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
	
    <form method="post" action="addControl.php?sist=<?php echo $system;?>&pr=<?php echo $test;?>&met=<?php echo $metric;?>&cont=<?php echo $control;?>" onsubmit="return val(this)">
    	<table border="1" align="center">
        
        	<tr>
            	<td>Nombre del Sistema</td>
                <td colspan="2" ><select name="ns" onChange="chsis()" onblur="chsis()">
                <?php 
					require_once("Conexion/conexionphpaud.php");
					mysql_select_db($database,$conexion);
					$sqlsist="select * from sistema";
					$Rs= mysql_query($sqlsist,$conexion) or die(mysql_error()); 
					$row_Rs = mysql_fetch_assoc($Rs);
					
					do{
						if($system==$row_Rs['id_sistema'])
						{	
				?>
                			<option value="<?php echo $row_Rs['id_sistema'];?>" selected><?php echo $row_Rs['nombre']; ?></option>
                            
                <?php
                        }
                        else
                        {
                ?>
                			<option value="<?php echo $row_Rs['id_sistema'];?>"><?php echo $row_Rs['nombre']; ?></option>     
                <?php
						}
					}while($row_Rs=mysql_fetch_assoc($Rs)); 
				?>
                
                </select>
                </td>
            </tr>
        	
            <tr>
            	<td>Prueba</td>
                <td colspan="2">
                 <select name="np"  onChange="chsis()" onBlur="chsis()">
                  <?php
                      	require_once("Conexion/conexionphpaud.php");
					    mysql_select_db($database,$conexion);
					    $sqlp="select *  from funciones inner join prueba on(funciones.id_prueba= prueba.id_prueba) where id_usuario = " .$id_usuario. " and id_sistema= " . $system;
					    $Rsp=mysql_query($sqlp,$conexion) or die(mysql_error());
					    $row_Rsp=mysql_fetch_assoc($Rsp);
						
					    do{
							if($test==$row_Rsp['id_prueba'])	
							{
				  ?>
                      			<option value="<?php echo $row_Rsp['id_prueba'];?>" onChange="slc()" selected><?php echo $row_Rsp['tipo'];?></option>
				  <?php
                            }
                            else
                            {	
                  ?>        	<option value="<?php echo $row_Rsp['id_prueba'];?>" onChange="slc()" ><?php echo $row_Rsp['tipo'];?></option>
                  <?php 
					  	    }
					    }while($row_Rsp=mysql_fetch_assoc($Rsp));
				  ?>	   
                      
                	</select>
                   </td>
            </tr>
            
            <tr>
            	<td>Metrica</td>
                <td colspan="2"><select name="nm" onChange="chsis()" onBlur="chsis()">
                	<?php
                      	require_once("Conexion/conexionphpaud.php");
					    mysql_select_db($database,$conexion);
					    $sqlcon="select * from tipos_metrica inner join metricas on(tipos_metrica.id_metricas= metricas.id_metricas) where id_usuario = " .$id_usuario. "  and id_sistema= " . $system . " and id_prueba=" . $test ;
					    $Rspcon=mysql_query($sqlcon,$conexion) or die(mysql_error());
					    $row_Rspcon=mysql_fetch_assoc($Rspcon);
						
					    do{
							if($metric==$row_Rspcon['id_metricas'])
							{
				  ?>
                      			<option value="<?php echo $row_Rspcon['id_metricas'];?>" onChange="chsis()" selected><?php echo $row_Rspcon['descripcion'];?></option>
				  <?php
                            }
                            else
                            {	
                  ?>        	<option value="<?php echo $row_Rspcon['id_metricas'];?>"  onchange="chsis()"><?php echo $row_Rspcon['descripcion'];?></option>
                  <?php 
					  	    }
					    }while($row_Rspcon=mysql_fetch_assoc($Rspcon));
				  ?>	
                
                <?php echo $sqlcon;?>
                </select></td>
            </tr>
        
        	<tr>
            	<th align="center" colspan="3">Tipos de Control</th>
            </tr>
            
            <tr>
            	<?php
                      	require_once("Conexion/conexionphpaud.php");
                      	mysql_select_db($database,$conexion);
                      	$sqls="select * from controles";
                      	$Rss=mysql_query($sqls,$conexion) or die (mysql_error());
                      	$row_Rss=mysql_fetch_assoc($Rss);
                      	do{
							if($control==$row_Rss['id_control'])
							{
								if($row_Rss['id_control']==1 || $row_Rss['id_control']==4 || $row_Rss['id_control']==7)
								  {		
					  ?>
									<td>
					  <?php 
								  } 
					  ?>
							<input type="radio" name="control" id="control" value="<?php echo $row_Rss['id_control'];?>"  title="control<?php echo $row_Rss['descripcion'];?>" onChange="cont()" checked><?php echo $row_Rss['descripcion'];?> <br>
					  <?php 
								if($row_Rss['id_control']==3 || $row_Rss['id_control']==6 )
								  { 
					  ?>
									</td>
					  <?php 	  }?>
                      
                      		
                      <?php      
                            }
                            else
                            {
                      ?>     
                      <?php     if($row_Rss['id_control']==1 || $row_Rss['id_control']==4 || $row_Rss['id_control']==7)
								  {		
					  ?>
									<td>
					  <?php 
								  } 
					  ?>
							<input type="radio" name="control" value="<?php echo $row_Rss['id_control'];?>"   title="<?php echo $row_Rss['descripcion'];?>" onChange="cont()"><?php echo $row_Rss['descripcion'];?> <br>
					  <?php 
								if($row_Rss['id_control']==3 || $row_Rss['id_control']==6 )
								  { 
					  ?>
									</td>
					  <?php 	  }?>	
                      
                      <?php }   ?>
								  
					  <?php 		
					    }while($row_Rss=mysql_fetch_assoc($Rss));	
					  ?> 
            </tr>
            		  <?php
						require_once("Conexion/conexionphpaud.php");
						mysql_select_db($database,$conexion);
						$sqlctrl="select * from tipos_controles where id_usuario= " . $id_usuario . " and id_sistema= " . $system . " and id_metricas= " .  $metric. " and id_control=" . $control;
						$Rssctrl=mysql_query($sqlctrl,$conexion) or die (mysql_error());
						$row_Rssctrl=mysql_fetch_assoc($Rssctrl);
						
						if($row_Rssctrl	<>0)
						{
				  	  ?>
            <tr>
            	<td>Objetivo</td>
                <td colspan="2"><input type="text" name="objetivo" value="<?php echo $row_Rssctrl['objetivo'];?>" disabled></td>
            </tr>
            
            <tr>
            	<td>Que se va a Corregir</td>
                <td colspan="2"><input type="text" name="correcion" value="<?php echo $row_Rssctrl['correcion'];?>" disabled></td>
            </tr>
            
            <tr>
            	<td>Resultado</td>
                <td colspan="2"><input type="text" name="resultado" value="<?php echo $row_Rssctrl['resultado'];?>" disabled></td>
            </tr>
            
            <tr>
            	<td align="center" colspan="3"><input type="submit" value="Aceptar" disabled="disabled"></td>
            </tr>
            
            		  <?php
						}
						else
						{
					  ?>
            
            <tr>
            	<td>Objetivo</td>
                <td colspan="2"><input type="text" name="objetivo"></td>
            </tr>
            
            <tr>
            	<td>Que se va a Corregir</td>
                <td colspan="2"><input type="text" name="correcion"></td>
            </tr>
            
            <tr>
            	<td>Resultado</td>
                <td colspan="2"><input type="text" name="resultado"></td>
            </tr>
            
            <tr>	
            	<td align="center" colspan="3"><input type="submit" value="Aceptar"></td>
            </tr>          
            
                      <?php 
						}
				  	  ?>  
        
        </table>
    
    </form>

</body>
</html>