<?php
//include("../seguridad.php");	
include("../../conexion.php"); //Nos conectamos a la base de datos

$id_pedido=$_GET['id_pedido'];
$id_usuario=$_GET['id_usuario'];
$mensaje=$_GET['mensaje'];
$pag="informacion_pedido.php?pedido=$id_pedido";

if ($_GET['accion']=="terminado"){
	$id_cambiar= $_GET['id'];
	$numero_pedido=$_GET['pedido'];
	$campos="id_estado='1'";
	$sentencia="UPDATE $base . `$tabla50` SET $campos WHERE cliente=$id_cambiar and pedido=$numero_pedido  ";
	$modifica=mysqli_query($conexion, $sentencia);
	
	mysqli_close($conexion);
	//$pagina=$_GET['pagina'];
	header ("Location: http://www.pizzeriabelsay.es/gestion/pedidos/index.php");
	exit;
}

if($mensaje=='1'){
	$id_cambiar= $_GET['id_pedido'];
	$campos="mensaje='1'";
	$sentencia="UPDATE $base . `$tabla50` SET $campos WHERE $tabla50 . pedido=$id_cambiar ";
	$modifica=mysqli_query($conexion, $sentencia);
	}

if ($_GET['accion']=="sin_leer"){
	$id_cambiar= $_GET['id'];
	$numero_pedido=$_GET['pedido'];
	$campos="id_estado='0'";
	$sentencia="UPDATE $base . `$tabla50` SET $campos WHERE cliente=$id_cambiar and pedido=$numero_pedido  ";
	$modifica=mysqli_query($conexion, $sentencia);
	mysqli_close($conexion);
	//$pagina=$_GET['pagina'];
	header ("Location: http://www.pizzeriabelsay.es/gestion/pedidos/index.php");
	exit;
}

if ($_GET['accion']=="cocinandose"){
	$id_cambiar= $_GET['id'];
	$numero_pedido=$_GET['pedido'];
	$campos="id_estado='3'";
	$sentencia="UPDATE $base . `$tabla50` SET $campos WHERE cliente=$id_cambiar and pedido=$numero_pedido  ";
	$modifica=mysqli_query($conexion, $sentencia);
	mysqli_close($conexion);
	//$pagina=$_GET['pagina'];
	header ("Location: http://www.pizzeriabelsay.es/gestion/pedidos/index.php");
	exit;
}

if ($_GET['accion']=="anular"){
	$id_cambiar= $_GET['id'];
	$numero_pedido=$_GET['pedido'];
	$campos="id_estado='4'";
	$sentencia="UPDATE $base . `$tabla50` SET $campos WHERE cliente=$id_cambiar and pedido=$numero_pedido  ";
	$modifica=mysqli_query($conexion, $sentencia);
	mysqli_close($conexion);
	//$pagina=$_GET['pagina'];
	header ("Location: http://www.pizzeriabelsay.es/gestion/pedidos/index.php");
	exit;
}
?>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
<style media="print" type="text/css">
#text_head{ font-size:!important;; visibility:visible!important; margin-top:10px!important; margin-left:140px!important;}
#datos_cliente{font-size:!important;; visibility:visible!important; margin-top:25px!important; margin-left:10px!important; float:left!important; width:400px!important;}
#imprimir {
	visibility:hidden
}
#sin_leer_pedido{
	visibility:hidden
}
#cocinandose_pedido{
	visibility:hidden
}
#cerrar{
	visibility:hidden
}
#terminado_pedido{
	visibility:hidden	
}
#cabecera_pagina_datos1{
	visibility:hidden 
}
#cabecera_pagina_datos2{
	visibility:hidden
}	
	/*TABLA PEDIDOS*/
#tabla_pedidos{ 
	visibility:visible;
}	
#tabla-impr{
	/*width:400px!important; */
	}
#tabla_contenido_pedidos{
	font-size:12px!important;
	font-weight:bold!important;
	float:left!important;
	width:200px!important;
	min-width:400px!important;
	max-width:400px!important;
	margin-left:1px!important;
	margin-top:-200px!important;
}
#cabecera_datos_pedido{
	width:400px!important;
	min-width:400px!important;
	max-width:400px!important;
	
	font-size:12px!important;
	margin-left:5px!important;
}
#tabla_contenido_pedidos2{
	float:left!important;
	width:400px!important;
	margin-left:5px!important;
	min-width:400px!important;
	max-width:400px!important;
}

h1 { font-size:16px!important; float:left!important; margin-left:130px!important; }
</style>

<?php 
///////////////////////////////////////////////////////////////////////////////////////////////suma precio de ese pedido y cliente
$ssql1 = "select precio from `$tabla50` WHERE pedido=$id_pedido AND cliente=$id_usuario ";
$resultado1 = mysqli_query($conexion, $ssql1);

while ($registro1=mysqli_fetch_array($resultado1)){
$precio_total1=$precio_total1+$registro1['precio'];
}

//////////////////////////////////////////////////////////////////////////////////////////////
$ssql = "select * from `$tabla50` WHERE pedido=$id_pedido AND cliente=$id_usuario";
$resultado = mysqli_query($conexion, $ssql);

while ($registro=mysqli_fetch_row($resultado)){
	$id_pedido=$registro[5];
	
	$precio_total=$registro[4];
	$recogida=$registro[26];
	$estado=$registro[14];
	$comentario=$registro[16];
	$hora=$registro[8];
		$ano_pedido=substr ("$registro[7]", 0, 4);
		$mes_pedido=substr ("$registro[7]", 5, 2);
		$dia_pedido=substr ("$registro[7]", 8, 2);
	$fecha_pedido=$dia_pedido."/".$mes_pedido."/".$ano_pedido;
		$hora_pedido=substr ("$registro[7]", 0, 2);
		$minuto_pedido=substr ("$registro[7]", 3, 2);
		$segundo_pedido=substr ("$registro[7]", 6, 2);
	$hora_pedido=$hora_pedido.":".$minuto_pedido.":".$segundo_pedido;
	$direccion=$registro[10];
}
	$select_cliente_telefono=mysqli_query($conexion, "select telefono1 from `$tabla1` WHERE id_usuario='".$id_usuario."'");
					while ($cliente_telefono=mysqli_fetch_row($select_cliente_telefono)){
					$telefono=$cliente_telefono[0];
					}
					
	$select_cliente_nombre=mysqli_query($conexion, "select nombre from `$tabla1` WHERE id_usuario='".$id_usuario."'");
					while ($cliente_nombre=mysqli_fetch_row($select_cliente_nombre)){
					$nombre2=$cliente_nombre[0];
					}
					
	$select_cliente_apellido=mysqli_query($conexion, "select apellido1 from `$tabla1` WHERE id_usuario='".$id_usuario."'");
					while ($cliente_apellido=mysqli_fetch_row($select_cliente_apellido)){
					$apellido2=$cliente_apellido[0];
					}
					
	$select_cliente_apellido2=mysqli_query($conexion, "select apellido2 from `$tabla1` WHERE id_usuario='".$id_usuario."'");
					while ($cliente_apellido2=mysqli_fetch_row($select_cliente_apellido2)){
					$apellido22=$cliente_apellido2[0];
					}
	
//////////////////////////////////////////////////////////////////////////////////

	$genera_dir_cliente=mysqli_query($conexion, "select calle,numero,bloque,puerta from `$tabla1` WHERE id_usuario='".$id_usuario."'");
					while ($dir_cliente=mysqli_fetch_row($genera_dir_cliente)){
						if($dir_cliente[2]!=""){
							$bloque="bloque ".$dir_cliente[2];
						}
						if($dir_cliente[3]!=""){
							$puerta="puerta ".$dir_cliente[3];
						}
						$calle_cliente=$dir_cliente[0].", ".$dir_cliente[1]." ".$bloque." ".$puerta;
					}

?>
<head>

<link href="../estilos.css" rel="stylesheet" type="text/css" />

<title>Pizzeria Belsay</title>
</head>

<body>

<table border="0" width="100%" height="100%" id="tabla-impr">
<div id="text_head" style="visibility:hidden; height:0px;"> PIZZERIA BELSAY </div>

	<tr>
		<td colspan="2" height="40" id="imprimir">Estado del pedido: 
			<?php
				$select_estado=mysqli_query($conexion, "select nombre from `$tabla4` WHERE id_estado='".$estado."'");
				while ($estado_pedido=mysqli_fetch_row($select_estado)){
				echo "<span class='negrita'>".$estado_pedido[0]."</span>";
				}
			echo "<table border='0' width='100%' id='acciones'>";
				echo "<tr>";
					echo "<td>";
						echo "<a href='?accion=sin_leer&id=$id_usuario&pedido=$id_pedido' id='sin_leer_pedido'>Marcar como sin leer</a>";
					echo "</td>";
					echo "<td>";
						echo "<a href='?accion=cocinandose&id=$id_usuario&pedido=$id_pedido' id='cocinandose_pedido'>Marcar como cocinandose</a>";
					echo "</td>";
					echo "<td>";
						echo "<a href='?accion=terminado&id=$id_usuario&pedido=$id_pedido' id='terminado_pedido'>Marcar como terminado</a>";
					echo "</td>";
					echo "<td>";
						echo "<a href='?accion=anular&id=$id_usuario&pedido=$id_pedido' id='sin_leer_pedido'>Anular pedido</a>";
					echo "</td>";
					echo "<td>";
						echo "<input type='button' name='imprimir' value='IMPRIMIR' onclick='window.print();' id='sin_leer_pedido'>";
					echo "</td>";
				echo "</td>";
			echo "</table>";
			
			?>
		
		</td>

       
	</tr>
	<tr height="70">
		<td width="50%" id="cabecera_pagina_datos1"><?php echo "ID Pedido: <span class='negrita'>".$id_pedido ?>
        <br></br>
        
<?php ////////////////// consulta de ID METRE ////////////////////////////////////////////////////
$select_cliente_metre=mysqli_query($conexion,"select id_metre from `$tabla1` WHERE id_usuario='".$id_usuario."'");
while ($cliente_metre=mysqli_fetch_row($select_cliente_metre)){
$id_metre=$cliente_metre[0];
}
?>
        
        <?php echo "ID METRE: <span class='negrita'>".$id_metre ?>
        
         <?php echo "<br><br><span class='negrita'>".$nombre2." ".$apellido2." ".$apellido22 ?>
        </span></td>
        
       
		<td id="cabecera_pagina_datos2"><?php echo "Tel&eacute;fono: <span class='negrita'>".$telefono ?></span><br>Direcci&oacute;n: <span class='negrita'><?php echo $calle_cliente; ?></span></td>
	</tr>
<div id="datos_cliente" style="visibility:hidden;height:0px">Nombre: <? echo $nombre2." ".$apellido2." ".$apellido22  ?></div>
<div id="datos_cliente" style="visibility:hidden;height:0px">Dirección: <? echo $calle_cliente ?></div>
<div id="datos_cliente" style="visibility:hidden; height:0px">TLF: <? echo $telefono ?></div>
<div id="datos_cliente" style="visibility:hidden; height:0px">ID Pedido: <? echo $id_pedido ?></div>

	<tr valign="top" align="center" >
		<td colspan="2">
        <div id="tabla_pedidos" >
			<table border="0" width="100%" id="tabla_contenido_pedidos" align="center">
			<tr id="cabecera_datos_pedido" align="center" >
				<td>Cantidad</td><td>Familia</td><td>Nombre</td><td>Ingredientes</td><td>Precio</td>
			</tr>
			
			<?php 
			$ssql_pedidos = "select * from `$tabla50` WHERE pedido=$id_pedido and cliente=$id_usuario";
			$resultado_pedidos = mysqli_query($conexion,$ssql_pedidos);
			
			while ($articulos=mysqli_fetch_row($resultado_pedidos)){

///////////////////////////////////////////////////////////////////////////////
//////////////////////      SABORES DE LOS HELADOS    ///////////////////////////

$ssql_sabor1 = "select nombre from `$tabla2` WHERE id_articulo=$articulos[12]";
$resultado_sabor1 = mysqli_query($conexion,$ssql_sabor1);
while ($registro_sabor1=mysqli_fetch_row($resultado_sabor1)){
	$sabor1=$registro_sabor1[0];
}

$ssql_sabor2 = "select nombre from `$tabla2` WHERE id_articulo=$articulos[13]";
$resultado_sabor2 = mysqli_query($conexion,$ssql_sabor2);
while ($registro_sabor2=mysqli_fetch_row($resultado_sabor2)){
	$sabor2=$registro_sabor2[0];
}


if($articulos[12]!=0){
	$sabores1="<br> DE ".$sabor1;
}
if($articulos[13]!=0){
	$sabores2=" Y ".$sabor2;
}


$i++;
if($i%2==0){
	$estilo="fila_par";
}else{
	$estilo="fila_inpar";
	}

			echo "<tr id='".$estilo."'>";  //////////////// AKI $registro == $articulos ////// OjO ////
	/*if ($articulos[3]==1 OR $articulos[3]==2 OR $articulos[3]==13 OR $articulos[3]==19 OR $articulos[3]==20 OR $articulos[3]==27){
		if ($articulos[3]==1){
		echo "<td>1/4</td>";
		}
		if ($articulos[3]==2){
		echo "<td>1/2</td>";
		}
		if ($articulos[3]==4){
		echo "<td>1Kg</td>";
		}
		if ($articulos[3]==6){
		echo "<td>1.5Kg</td>";
		}
	
	
	}else{*/
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////CANTIDAD
		echo "<td>".$articulos[3]."</td>"; 
	
	//}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////FAMILIA			
				echo "<td>";
					$select_familia=mysqli_query($conexion,"select nombre_familia from `$tabla5` WHERE id_familia='".$articulos[2]."'");
					while ($nombre_familia=mysqli_fetch_row($select_familia)){
					$familia=$nombre_familia[0];
					
					if ($familia=="PIZZAS"){
						if ($articulos[8]==1){
							echo "PEQUE�A ";
						}elseif($articulos[8]==2){
							echo "MEDIANA ";
						}elseif($articulos[8]==3)
							echo "FAMILIAR ";
							
					}
					if ($familia=="CHAPATAS"){
						
						if($articulos[8]==2){
							echo "MEDIANA ";
						}elseif($articulos[8]==3)
							echo "FAMILIAR ";
							
					}
					
				}
				echo $familia;
				
				echo "</td>";
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// NOMBRE				
				echo "<td>";

				if($articulos[2]==99){
					$select_datos_articulo=mysqli_query($conexion,"select nombre,ingredientes from `$tabla15` WHERE id_personalizada='".$articulos[1]."'");
				}elseif($articulos[2]==1000){
					$select_datos_articulo=mysqli_query($conexion,"select nombre,ingredientes from `$tabla15` WHERE id_personalizada='".$articulos[1]."'");
				}elseif($articulos[2]==1001){
					$select_datos_articulo=mysqli_query($conexion,"select nombre,ingredientes from `$tabla15` WHERE id_personalizada='".$articulos[1]."'");
				}elseif($articulos[2]==100){
						$select_datos_articulo=mysqli_query($conexion,"select nombre,ingredientes from `$tabla23` WHERE id_personalizado='".$articulos[1]."'");
				}else{
						$select_datos_articulo=mysqli_query($conexion,"select nombre,ingredientes from `$tabla2` WHERE id_articulo='".$articulos[1]."'");
				}
					while ($datos_articulo=mysqli_fetch_row($select_datos_articulo)){
					$nombre=$datos_articulo[0];
					$ingredientes=$datos_articulo[1];
					
					echo $nombre;
					}
				echo "</td>";
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// INGREDIENTES
					
					$select_burgerlandia=mysqli_query($conexion,"select * from `$tabla50` WHERE pedido=$id_pedido AND cliente=$id_usuario AND id_familia=14 ");
				
					while ($datos_articulo_burgerlandia=mysqli_fetch_row($select_burgerlandia)){
					
					$bebida_mix3=$datos_articulo_burgerlandia[24];
					}
				
					$select_bocamix=mysqli_query($conexion,"select * from `$tabla50` WHERE pedido=$id_pedido AND cliente=$id_usuario AND id_familia=15 ");
				
					while ($datos_articulo_bocamix=mysqli_fetch_row($select_bocamix)){
					$bocata_mix=$datos_articulo_bocamix[23];
					$bebida_mix=$datos_articulo_bocamix[24];
					}
					
					$select_p2=mysqli_query($conexion,"select * from `$tabla50` WHERE pedido=$id_pedido AND cliente=$id_usuario AND id_familia=12 ");
				
					while ($datos_articulo_p2=mysqli_fetch_row($select_p2)){
					$ingred1=$datos_articulo_p2[18];
					$ingred2=$datos_articulo_p2[19];
					$ingred3=$datos_articulo_p2[20];
					
					$bebida_mix2=$datos_articulo_p2[24];
					$bebida_p2=$datos_articulo_p2[25];
					
					
					}
					
					$select_mf=mysqli_query($conexion,"select * from `$tabla50` WHERE pedido=$id_pedido AND cliente=$id_usuario AND id_familia=16 ");
				
					while ($datos_articulo_mf=mysqli_fetch_row($select_mf)){
					$ingred1=$datos_articulo_mf[18];
					$ingred2=$datos_articulo_mf[19];
					$ingred3=$datos_articulo_mf[20];
					
					$bebida_mix2=$datos_articulo_mf[24];
					
					}
					
					$select_ps=mysqli_query($conexion,"select * from `$tabla50` WHERE pedido=$id_pedido AND cliente=$id_usuario AND id_familia=101 ");
				
					while ($datos_articulo_ps=mysqli_fetch_row($select_ps)){
					$ingred1=$datos_articulo_ps[18];
					$ingred2=$datos_articulo_ps[19];
					$ingred3=$datos_articulo_ps[20];
					$ingred4=$datos_articulo_ps[21];
					$ingred5=$datos_articulo_ps[22];
					
					}
			
				echo "<td id='ingredientes'>".$ingredientes." ".$sabores1." ".$sabores2.""; /// INGREDIENTES
				
				if ($familia=="BOCA MIX"){
					echo "
				<b>(".$bocata_mix.", ".$bebida_mix.")</b> ";
				};
				if ($familia=="PARA 2"){
					echo "
				<b>(".$ingred1.", ".$ingred2.", ".$ingred3." + ".$bebida_mix2." y ".$bebida_p2.")</b> ";
				};
				if ($familia=="MENU FAMILIAR"){
					echo "
				<b>(".$ingred1.", ".$ingred2.", ".$ingred3." + ".$bebida_mix2." )</b> ";
				};
				if ($familia=="BURGERLANDIA"){
					echo "
				<b>(".$bebida_mix3.")</b> ";
				};
				if ($articulos[2]==101){
					echo "
				<b>(".$ingred1.", ".$ingred2.", ".$ingred3.", ".$ingred4.", ".$ingred5." )</b> ";
				};
				
				echo "</td>";
				
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// PRECIO
				echo "<td>";
				printf("%.2f", $articulos[4]);
				echo " &euro;</td>";
							
			}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// LINEA DIVISORA				
				
				echo "<tr><td colspan='10'><hr></td></tr>";
	
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// TOTAL 
					echo "<td colspan='5' align='right' class='texto_total'>TOTAL: ";
					echo "<span class='total'>";
					printf("%.2f", $precio_total1);
					echo " &euro;</span></td>";
					
				//}
			
echo "";// CIERRE TABLA DE PEDIDO
?>

</table>
</div>
<br>
<?php if ($recogida==0){ ?>

	<div align="center"><a><h1> ENVIAR A DOMICILIO </h1></a> </div>
    
<?php	} ?>

<?php if ($recogida==1){ ?>

	<div align="center"><a><h1> RECOGIDA EN PIZZERIA </h1></a> </div>
    
<?php	} ?>

<table border="0" width="100%" id="tabla_contenido_pedidos2">
<tr id="cabecera_datos_pedido"><td>COMENTARIOS</td></tr>
<tr id="fila_par"><td align="left"><?php echo $comentario; ?></td></tr>
</table>

<br />
<?php 
	if($direccion==0){
?>
	<table border="0" width="100%" id="tabla_contenido_pedidos2">
	<tr id="cabecera_datos_pedido"><td>Direccion de envio</td></tr>
	<tr id="fila_par"><td align="left"><?php echo $calle_cliente; ?></td></tr>
	</table>
<?php
}else{

//////////////////////////////		GENERA LAS DIRECCIONES DEL CLIENTE       ///////////////////////////
	$ssql_direccion= mysqli_query($conexion,"SELECT * FROM $tabla18 WHERE id_direccion='$direccion'");
		while ($ndireccion=mysqli_fetch_row($ssql_direccion)){
			if($ndireccion[4]!=""){
				$bloque=" bloque ".$ndireccion[4];
			}
			if($ndireccion[5]!=""){
				$puerta=" puerta ".$ndireccion[5];
			}
	   	$callealt=$ndireccion[2].", ".$ndireccion[3]." ".$bloque." ".$puerta;
	 }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>
	<table border="0" width="100%" id="tabla_contenido_pedidos2">
	<tr id="cabecera_datos_pedido"><td>Direccion de envio <b>alternativa</b></td></tr>
	<tr id="fila_par"><td align="left"><?php echo $callealt; ?></td></tr>
	</table>
<?php } ?>


<!--<table border="0" width="100%">

	<tr>
		<td align="center">
			<?php /*
			if($mensaje_mostrar==0){
				echo "<div id='no'>Aun no se ha enviado el mensaje de confirmaci&oacute;n</div>";
				echo "</td>	</tr>	<tr>";
				echo "<td align='center'><a href='mensaje.php?id_pedido=".$id_pedido."'>";
				echo "<input type='button' value='enviar mensaje ahora'></td>	</tr>";
			}elseif($mensaje_mostrar==1){
				echo "<div id='ok'>El mensaje de confirmaci&oacute;n ya ha sido enviado</div> </td>	</tr>";
			}	*/					
			?>
		
</table>
-->		

	<tr>
		<td colspan="5" align="center" ><h1><a href="index.php" id="cerrar"> Cerrar ventana </a></h1>
    
	<!--
            <form action="factura_belsay.php" method="post" />
            	<input type="hidden" name="id_pedido" value="<? echo $id_pedido ?>" />
            	<input type="hidden" name="id_usuario" value="<? echo $id_usuario ?>" />
                
                <input type="hidden" name="telefono" value="<? echo $telefono ?>" />
                <input type="hidden" name="calle_cliente" value="<? echo $calle_cliente ?>" />
                <input type="hidden" name="nombre2" value="<? echo $nombre2 ?>" />
                <input type="hidden" name="apellido2" value="<? echo $apellido2 ?>" />
                
                <input type='submit' name='imprimir' value='IMPRIMIR' id='sin_leer_pedido' />
            </form>
     -->
    	</td>
    </tr>

	
</table>

</body>
</html>