<?php
	session_start();
	$id_usuario = $_SESSION['iduser'];
	if($id_usuario==0)
	{
		
		header("Location:login.php");
		
	}
	$idusu= $_SESSION['iduser'];
	$system = $_REQUEST['sist'];
	$test = $_REQUEST['pr'];
	$metric = $_REQUEST['met'];
	
	
	/*echo "sistema: ". $system;
	echo " prueba: ". $test;
	echo " metrica: ". $metric;
	echo " idususario: ". $idusu;
	*/
	?>

<script language="javascript">

	function val(frm)
	{
		var seleccionado = false;
		for(var i=0; i<prueba.length; i++) 
		{    
		  if(metricas[i].checked)
		  {
   			seleccionado = true;
   		  break;
		  }
		}	
		
		if(!seleccionado)
		{
			alert("Selecciona una Metrica");
  			return (false);
		}
		
		if (frm.ns.value == "")
			{
				alert("Introduce el Nombre del Sistema");
				frm.ns.focus();
				return(false);
			}
		else 
			if (frm.np.value == "")
			{
				alert("Introduce el Tipos de Prueba");
				frm.np.focus();
				return(false);
			}
		else
			if (frm.result.value == "")
			{
			alert("Introduce la Complejidad Tecnica");
                   frm.result.focus();
                   return(false);
			}
        else
			if (frm.coment.value == "")
			{
				alert("Introduce los comentarios");
				frm.coment.focus();
				return(false);
			}
	}
		
		

	function selchkbx(){
		
		var nomsist = getElementsByName("ns")[0].value;
		var pruebas = getElementsByName("np")[0].value;
		
		var metrica = getElementsByName("metricas");
		
					   }
					   
	function selmet()
	{		
		
		var getSistema = document.getElementsByName("ns")[0].value;
		var getPrueba = document.getElementsByName("np")[0].value;
		var getMetrica = document.getElementsByName("metricas");
		
		
		for(var i=0; i<getMetrica.length; i++ )
		{
			  if(getMetrica[i].checked)
			  {
				  window.location.href=("Metricas.php?sist="+getSistema+"&pr="+getPrueba+"&met="+getMetrica[i].value);
				  //alert(obtipop[i].value);
			  }
		}
		
		
	}
	
	function chsis()
	{
		
		var nomsistc = document.getElementsByName("ns")[0].value;
		var pruebasc = document.getElementsByName("np")[0].value;
		
		//var metricac = document.getElementsByName("metricas");
		//alert(nomsistc);
		window.location.href=("Metricas.php?sist="+nomsistc+"&pr="+pruebasc+"&met="+<?php echo $metric;?>);
		
	}

</script>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="./css/estilotabla.css">
</head>

<body id="tabmet">
	<form method="post" action="addmetrica.php?sist=<?php echo $system;?>&pr=<?php echo $test;?>&met=<?php echo $metric;?>" onSubmit="return val(this)">
    
    	<table border="1" align="center" class="metrica" >
        
        	<tr>
           		<td>Nombre del Sistema</td>
                <td>
                  <select name="ns" onChange="chsis()" onblur="chsis()">
                  <?php 
				  		require_once("Conexion/conexionphpaud.php");
					    mysql_select_db($database,$conexion);
					    $sqlns="select * from sistema";
					    $Rsns=mysql_query($sqlns,$conexion) or die(mysql_error());
					    $row_Rsns=mysql_fetch_assoc($Rsns);
					    do{
						    if($system==$row_Rsns['id_sistema'])
						    {	  
				  ?>
                	    		<option value="<?php echo $row_Rsns['id_sistema'];?>"  selected><?php echo $row_Rsns['nombre'];?></option>
				  <?php
                            }
                            else
                            {	
                  ?>                                
                         		<option value="<?php echo $row_Rsns['id_sistema'];?>"  ><?php echo $row_Rsns['nombre'];?></option>
                  <?php 
					  	    }
					    }while($row_Rsns=mysql_fetch_assoc($Rsns));?>	
                  </select>
                </td>
            </tr>
        
        	<tr>
           		<td>Tipo de Prueba</td>
                <td>
                	<select name="np">
                  <?php
                      	require_once("Conexion/conexionphpaud.php");
					    mysql_select_db($database,$conexion);
					    $sqlp="select *  from funciones inner join prueba on(funciones.id_prueba= prueba.id_prueba) where id_usuario = " .$idusu. " and id_sistema= " . $system;
						
						//select *  from funciones inner join prueba on(funciones.id_prueba= prueba.id_prueba) where id_usuario = 12 and id_sistema=12
					    $Rsp=mysql_query($sqlp,$conexion) or die(mysql_error());
					    $row_Rsp=mysql_fetch_assoc($Rsp);
						
					    do{
							if($test==$row_Rsp['id_prueba'])
							{
				  ?>
                      			<option value="<?php echo $row_Rsp['id_prueba'];?>" onChange="selmet()" selected><?php echo $row_Rsp['tipo'];?></option>
				  <?php
                            }
                            else
                            {	
                  ?>        	<option value="<?php echo $row_Rsp['id_prueba'];?>" onChange="selmet()" ><?php echo $row_Rsp['tipo'];?></option>
                  <?php 
					  	    }
					    }while($row_Rsp=mysql_fetch_assoc($Rsp));?>	   
                      
                	</select>
                </td>
            </tr>
            
            <tr>
            
            	<th colspan="2" align="center">METRICAS<th>
            
            </tr>
            
            <tr>
        		  <?php
                      	require_once("Conexion/conexionphpaud.php");
                      	mysql_select_db($database,$conexion);
                      	$sqls="select * from metricas";
                      	$Rss=mysql_query($sqls,$conexion) or die (mysql_error());
                      	$row_Rss=mysql_fetch_assoc($Rss);
                      	do{
							if($metric==$row_Rss['id_metricas'])
							{
								if($row_Rss['id_metricas']==1 || $row_Rss['id_metricas']==4)
								  {		
					  ?>
									<td>
					  <?php 
								  } 
					  ?>
							<input type="radio" name="metricas" value="<?php echo $row_Rss['id_metricas'];?>"  onChange="selmet()" title="<?php echo $row_Rss['descripcion'];?>" checked><?php echo $row_Rss['descripcion'];?> <br>
					  <?php 
								if($row_Rss['id_metricas']==3 || $row_Rss['id_metricas']==6)
								  { 
					  ?>
									</td>
					  <?php 	  }?>
                      
                      		
                      <?php      
                            }
                            else
                            {
                      ?>     
                      <?php     if($row_Rss['id_metricas']==1 || $row_Rss['id_metricas']==4)
								  {		
					  ?>
									<td>
					  <?php 
								  } 
					  ?>
							<input type="radio" name="metricas" value="<?php echo $row_Rss['id_metricas'];?>"  onChange="selmet()" title="<?php echo $row_Rss['descripcion'];?>"><?php echo $row_Rss['descripcion'];?> <br>
					  <?php 
								if($row_Rss['id_metricas']==3 || $row_Rss['id_metricas']==6)
								  { 
					  ?>
									</td>
					  <?php 	  }?>	
                      
                      <?php }   ?>
								  
					  <?php 		}while($row_Rss=mysql_fetch_assoc($Rss));	
					  ?> 
                      
                                       
            </tr>
            	   	  <?php
						require_once("Conexion/conexionphpaud.php");
						mysql_select_db($database,$conexion);
						$sqlmet="select * from tipos_metrica where id_usuario= " . $idusu . " and id_sistema= " . $system . " and id_metricas= " .  $metric;
						$Rssmet=mysql_query($sqlmet,$conexion) or die (mysql_error());
						$row_Rssmet=mysql_fetch_assoc($Rssmet);
						
						if($row_Rssmet<>0)
						{
				  	  ?>
           
            <tr>
            	<td>Complejidad Tecnica</td>
                <td><input type="tezt" name="result" value="<?php echo $row_Rssmet['resultado'];?>" disabled></td>
            
            </tr>
            
            <tr>
            	
                <td>Comentarios</td>
                <td><input type="tezt" name="coment" value="<?php echo $row_Rssmet['comentario'];?>" disabled></td>
            
            </tr>
            
            <tr>
            	
                <td colspan="2" align="center"><input type="submit" disabled ></td>
                
            
            </tr>
            	  <?php
					}
					else
					{
				  ?>

            <tr>
            	<td>Complejidad Tecnica</td>
                <td><input type="tezt" name="result" value=""></td>
            
            </tr>
            
            <tr>
            	
                <td>Comentarios</td>
                <td><input type="tezt" name="coment" value=""></td>
            
            </tr>
                  
            <tr>
            	
                <td colspan="2" align="center"><input type="submit" ></td>
                
            
            </tr>
                  
                  <?php 
					}
				  ?>        
            </table>
    
    </form>
	<?php 
	/*echo $sqlp;
		  echo "<br><br>";
		 echo  $sqlmet;*/
	?>
    
</body>
</html>