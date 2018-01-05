<?php
	session_start();
	$id_usuario = $_SESSION['iduser'];
	if($id_usuario==0)
	{	
		header("Location:login.php");	
	}

	$system= $_REQUEST['sist'];
	
	/*echo "sistema: " . $system;
	echo "  prueba: " . $test;
	echo "  metrica: " . $metric;
	echo "  control: " . $control;
	echo "<br>Id usuario: " . $id_usuario;*/

?>

<script language="javascript">

		
	function chsis()
	{
		
		var nomsistc = document.getElementsByName("sistema")[0].value;
	
		//alert(nomsistc);
		window.location.href=("Impresion.php?sist="+nomsistc);	
			
	}

</script>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>

</head>

	<body>

		<form action="" method="POST">
            <table border="2" align="center" width="1000">
            <tr>
            	<td colspan="3" align="center"><h2 style="color:#F00">Auditoria</h2></td>
            </tr>
            
            <tr>
            
            	<td>
            		Nombre del sistemas
                </td>
                
            	<td colspan="2">
                <select name="sistema" onchange="chsis()" onblur="chsis()">
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
            
            <tr align="char">
                	<th><h4>Pruebas</h4></th>
                    <th><h4>Metricas</h4></th>
                    <th><h4>Controles</h4></th>
            </tr>
            
            	  <?php
					  require_once("Conexion/conexionphpaud.php");
					  mysql_select_db($database,$conexion);
					  $sqlpr="SELECT * FROM funciones inner join prueba on(funciones.id_prueba=prueba.id_prueba) where id_sistema=". $system." and id_usuario=" . $id_usuario;
					  	
					  $Rspr=mysql_query($sqlpr,$conexion) or die(mysql_error());
					  $row_Rspr=mysql_fetch_assoc($Rspr);
						
					  require_once("Conexion/conexionphpaud.php");
					  mysql_select_db($database,$conexion);
					  $sqlmet="
select * from tipos_metrica inner join metricas on(tipos_metrica.id_metricas= metricas.id_metricas) where id_usuario =" . $id_usuario . " and id_sistema=" . $system;
					  $Rsmet=mysql_query($sqlmet,$conexion) or die(mysql_error());
					  $row_Rsmet=mysql_fetch_assoc($Rsmet);
					  
					  
					  require_once("Conexion/conexionphpaud.php");
					  mysql_select_db($database,$conexion);
					  $sqlcont="
select * from tipos_controles inner join controles on(tipos_controles.id_control= controles.id_control) where id_usuario =" . $id_usuario . " and id_sistema=". $system;
					  $Rscont=mysql_query($sqlcont,$conexion) or die(mysql_error());
					  $row_Rscont=mysql_fetch_assoc($Rscont);
				  
				  	
				  		if($row_Rspr==0){
							echo "<td align='center'>";
            	  ?>
							          		  
                      			No hay Pruebas Realizadas                    
                      
                  <?php
							echo "</td>";
						}
						else
						{
							echo "<td align='left'>";
				  ?>	
							
							<?php 
								do{
								//echo "<tr><td bgcolor='#CCCCCC'>". $row_Rspr['tipo'] ."</td></tr>";
							?>
								
                                  	<h4 style="background-color:#999">Tipo de Prueba:  <?php echo $row_Rspr['tipo']?></h4><br>
                                    Vision Sistematica <input type="text" style="background:#red" name="visionsist" value="<?php echo $row_Rspr['v_sist'];?>" readonly><br>
                                    Vision General <input type="text" name="visiongen" value="<?php echo $row_Rspr['v_gral'];?>" readonly> <br>
                                    Plan de Pruebas <input type="text" name="planp" value="<?php echo $row_Rspr['plan_p'];?>" readonly><br>
                                    Planes de Prueba <input type="text" name="imagen"  value="<?php echo $row_Rspr['planes_p'];?>"readonly><br>
                                    Descripcion <input type="text" name="desc" value="<?php echo $row_Rspr['descripcion'];?>" readonly><br>
                                    Verificacion de Resultados <input type="text" name="vresult" value="<?php echo $row_Rspr['v_r'];?>" readonly><br>
                                  
                                
							<?php		
                            	}while($row_Rspr=mysql_fetch_assoc($Rspr));
							?>                      	
            
            	  <?php
							echo "</td>";			  
						}
						
						if($row_Rsmet==0){
							echo "<td align='center'>";
								
				  ?>	
		                      	No hay Metricas Realizadas		          
                  <?php
							echo "</td>";
						}
						else
						{
							echo "<td align='left'>";
				  ?> 
                  
                                
                  <?php 
                                    do{
										//echo $row_Rsmet['descripcion'] . "<br>";
				  ?>
                  					
                                       	
                                        <h4 style="background-color:#999">Tipo de metrica: <?php echo $row_Rsmet['descripcion'];?></h4> <br>
                                        Complejidad Tecnica <input type="tezt" name="result" value="<?php echo $row_Rsmet['resultado'];?>" disabled><br>
                                        Comentarios <input type="tezt" name="coment" value="<?php echo $row_Rsmet['comentario'];?>" disabled><br>                                                             
                  <?php
                                    }while($row_Rsmet=mysql_fetch_assoc($Rsmet));
                  ?>
                                
                            
                  <?php
				  			echo "</td>";
						}
						
						if($row_Rscont==0){
							echo "<td align='center'>";
				  ?> 
                      	No hay Controles Realizados

                  <?php
							echo "</td>";
						}
						else
							
						{
							echo "<td align='left'>";
				  ?>
							<?php 
								do{
							?>
                                    <h4 style="background-color:#999">Tipo de Control:   <?php echo $row_Rscont['descripcion'];?></h4><br>
                                    Objetivo <input type="text" name="objetivo" value="<?php echo $row_Rscont['objetivo'];?>" readonly><br>
                                    Que se va a Corregir <input type="text" name="correcion" value="<?php echo $row_Rscont['correcion'];?>" readonly><br>
                                    Comentarios <input type="text" name="resultado" value="<?php echo $row_Rscont['resultado'];?>" readonly="readonly"><br>
                                    
                            <?php	
                                }while($row_Rscont=mysql_fetch_assoc($Rscont));
							?>
            	  <?php
							echo "</td>";
						}
   					?>
              
          </table>
        </form>    
              
     
</body>


</html>