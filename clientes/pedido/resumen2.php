<?php include("../../conexion.php"); //Nos conectamos a la base de datos
	include ("../../seguridad.php");
//	include ("../../autenticacion");

$pag=$_SERVER['PHP_SELF'];  // el nombre y ruta de esta misma pÃ¡gina.
$usuario=$_SESSION["id"];
$dia_finde=date('l')  ; ////// calcula el dia que estamos en ingles

//////////////////////////////				GENERA SI HAY OFERTAS DISPONIBLES       ///////////////////////////

$ssql_ofertas="SELECT * FROM $tabla20 WHERE visible=1 AND tipo_oferta=3";
$resultado_ofertas = mysqli_query($conexion,$ssql_ofertas);

while ($registro_ofertas=mysqli_fetch_row($resultado_ofertas)){
	$oferta_disponible=$registro_ofertas[3];
	$titulo_oferta=$registro_ofertas[1];
	$familia_oferta=$registro_ofertas[6];
}
//echo $oferta_disponible;
////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
$ssql2 = "select * from `$tabla2` ";
$resultado2 = mysqli_query($conexion,$ssql2);
/////////////////////////////////////////////////////////////
$registro2=mysqli_fetch_row($resultado2);
	
//////////////////////////////				GENERA EL DATOS DEL CLIENTE       ///////////////////////////

/////////////////////////////////////////////////////////////
$ssql = "select * from `$tabla1` WHERE id_usuario=$usuario";
$resultado = mysqli_query($conexion,$ssql);
/////////////////////////////////////////////////////////////

while ($registro=mysqli_fetch_row($resultado)){
	$id_usuario=$registro[0];
	$mail=$registro[1];
	$pass=$registro[2];
	$id_metre=$registro[20];
	$dni=$registro[3];
	$nombre=$registro[4];
	$apellido1=$registro[5];
	$apellido2=$registro[6];
	$calle=$registro[7];
	$numero_dir=$registro[8];
	$telefono1=$registro[9];
	$telefono2=$registro[10];
}
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////


//////////////////////////////				GENERA EL ÚLTIMO PEDIO       ///////////////////////////

$npedido= mysqli_query($conexion,"SELECT MAX(pedido) FROM $tabla50 WHERE cliente='$usuario'");

//echo "<table align=center border=2 id='tabla_consulta'>";

	while ($numero=mysqli_fetch_row($npedido)){
	       foreach($numero as $claven){ 
	       //echo $clave;
	 	}
	 }

$pedido=$claven;

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////		CUENTA LOS RESULTADOS OFERTA 		/////////////////////

$ssql_cuenta = "select sum(cantidad) from `$tabla14` WHERE pedido='$pedido' AND cliente='$usuario' AND (id_familia='$familia_oferta' OR id_familia='99')";
$resultado_cuenta = mysqli_query($conexion,$ssql_cuenta);

while ($registro_cuenta=mysqli_fetch_row($resultado_cuenta)){
	$cuenta_total_articulos=$registro_cuenta[0];
}
//echo $cuenta_total_articulos;
//////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////		COMPROBAR SI LA OFERTA ESTA REALIZADA       ///////////////////////////

$ssql_comprueba_oferta = "select SUM(oferta) from `$tabla14` WHERE pedido='$pedido' AND cliente='$usuario'";
$resultado_comprueba_oferta= mysqli_query($conexion,$ssql_comprueba_oferta);

while ($registro_comprueba_oferta=mysqli_fetch_row($resultado_comprueba_oferta)){
	$oferta_realizada=$registro_comprueba_oferta[0];
}
//echo "numero de ofertas".$oferta_realizada."<br>";

///////////////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////
//////////////////////      SUMATORIO DE PRECIOS    ///////////////////////////

$precio = "SELECT SUM(precio) FROM $tabla50 WHERE pedido='$pedido' AND cliente='$usuario' and id_estado='99'";
$sumatorio = mysqli_query($conexion,$precio);
	while($suma=mysqli_fetch_row($sumatorio))
	{
		$total=$suma[0];
	}

///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////

?>

<html>

<head>
<link href="../../estilos.css" rel="stylesheet" type="text/css" />
</head>

<body id='resumen'>
<div id="estilo_resumen">


<?php

$fecha=date("Y-m-d");
$hora=date("H:i:s");
$ssql = "select * from `$tabla50` WHERE cliente='$usuario' AND id_estado='99'";
$rs = mysqli_query($conexion,$ssql);
$num_total= mysqli_num_rows($rs);

/////////////////////////////////////////////////////////////


/////////////////////////////////////////////////////////////

echo "<table border='0' width='100%'><tr><td>&nbsp;</td><td align='center'>";

echo "<div id='titulo'>";

echo "<br>Nombre de usuario: ".$nombre." ".$apellido1." ".$apellido2."<br>";
echo "Direcci&oacute;n: ".$calle." ".$numero_dir."<br>";
echo "Tel&eacute;fono de contacto: ".$telefono1."<br><br>";
echo "</div>";

echo "<table border='0' id='tabla_resumen'>";
echo "<tr id='titulo_resumen'><td>Cantidad</td><td>&nbsp;Familia</td><td>Articulo</td><td>Ingredientes</td><td>Subtotal</td></tr>";

$i=1;

if($cod_sabor1==0){
$ssql = "select id_articulo_pedido,id_articulo,id_familia,cantidad,precio,ingred1,ingred2,ingred3,ingred4,ingred5,bocamix,bebida_mix,bebida_p2, SUM(cantidad),SUM(precio),sabor1,sabor2 from `$tabla50` WHERE pedido='$pedido' AND cliente='$usuario' and id_estado='99' GROUP BY id_articulo";
}else{
$ssql = "select id_articulo_pedido,id_articulo,id_familia,cantidad,precio,sabor1,sabor2,ingred1,ingred2,ingred3,ingred4,ingred5,bocamix,bebida_mix,bebida_p2, from `$tabla50` WHERE pedido='$pedido' AND cliente='$usuario' and id_estado='99'";
}

$resultado = mysqli_query($conexion,$ssql);

while ($registro=mysqli_fetch_row($resultado)){
	
$ingred1=$registro[5];
$ingred2=$registro[6];
$ingred3=$registro[7];
$ingred4=$registro[8];
$ingred5=$registro[9];

$bocata_mix=$registro[10];
$bebida_mix=$registro[11];

$bebida_p2=$registro[12];
///////////////////////////////////////////////////////////////////////////////
////////////////////////  GENERA DATOS ARTICULO  ///////////////////////////////
if($registro[2]==99){
	$datos_articulo=mysqli_query($conexion,"SELECT * FROM $tabla15 WHERE id_personalizada='$registro[1]'");
	while($datos=mysqli_fetch_row($datos_articulo))
	{
		$id_personalizada=$datos[0];
		$nombre=$datos[3];
		$ingredientes=$datos[4];
		$familia=$datos[5];
	}
}elseif($registro[2]==1000){
	$datos_articulo=mysqli_query($conexion,"SELECT * FROM $tabla15 WHERE id_personalizada='$registro[1]'");
	while($datos=mysqli_fetch_row($datos_articulo))
	{
		$id_personalizada=$datos[0];
		$nombre=$datos[3];
		$ingredientes=$datos[4];
		$familia=$datos[5];
	}
}elseif($registro[2]==1001){
	$datos_articulo=mysqli_query($conexion,"SELECT * FROM $tabla15 WHERE id_personalizada='$registro[1]'");
	while($datos=mysqli_fetch_row($datos_articulo))
	{
		$id_personalizada=$datos[0];
		$nombre=$datos[3];
		$ingredientes=$datos[4];
		$familia=$datos[5];
	}
}elseif($registro[2]==100){
	$datos_articulo=mysqli_query($conexion,"SELECT * FROM $tabla23 WHERE id_personalizado='$registro[1]'");
	while($datos=mysqli_fetch_row($datos_articulo))
	{
		$id_personalizado=$datos[0];
		$nombre=$datos[3];
		$ingredientes=$datos[4];
		$familia=$datos[5];
	}
}else{
	$datos_articulo=mysqli_query($conexion,"SELECT * FROM $tabla2 WHERE id_articulo='$registro[1]'");
	while($datos=mysqli_fetch_row($datos_articulo))
	{
		$id_articulo=$datos[0];
		$nombre=$datos[1];
		$ingredientes=$datos[2];
		$familia=$datos[3];
	}
}


if($familia==99){
	$nombre_familia="Menu Infantil";
}elseif($familia==100){
	$nombre_familia="HOT DOGS";
}else{
	$nombre_familia2=mysqli_query($conexion,"SELECT nombre_familia FROM $tabla5 WHERE id_familia='$familia'");
	while($datosf=mysqli_fetch_row($nombre_familia2))
	{
		$nombre_familia=$datosf[0];
	}
}

///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////


	echo "<tr>";

		echo "<td class='cantidad' width='70' align='center'>".$registro[3]."</td>";
		
		echo "<td width='100'>&nbsp;<span class='familia'>";
		if ($nombre=="PERSONALIZADA"){
		echo "PIZZA";
		}else{
		echo $nombre_familia;
		};
		echo "</span></td>";
		echo "<td width='180'> <span class='articulo'>".$nombre."</span></td>";
		echo "<td class='ingredientes' width='300'>".$ingredientes." ".$sabores1." ".$sabores2.", ".$bocata_mix." , ".$bebida_mix."";
		
		if ($nombre=="PARA 2"){
		echo	"<b> (".$ingred1." , ".$ingred2." , ".$ingred3." + ".$bebida_p2." y ".$bebida_mix." )</b></td>";
		}
		if ($nombre_familia=="MENU FAMILIAR"){
		echo	"<b> (".$ingred1." , ".$ingred2." , ".$ingred3." + ".$bebida_mix." 2L )</b></td>";
		}
		if ($nombre=="PERSONALIZADA"){
		echo	"<b> (".$ingred1." , ".$ingred2." , ".$ingred3." , ".$ingred4." , ".$ingred5." )</b></td>";
		}
		echo "<td width='30' align='right'>";
		printf("%.2f", $registro[4]);
		echo " &euro; </td>";
	echo "</tr>";	 
}
//////////////////////////////////////////////////////////////////////////////////////////////////
$ssq_consulta_precios = "select preciol from `$tabla2` ";
$resultados_precios = mysqli_query($conexion,$ssq_consulta_precios);
while ($registro_precios_articulo=mysqli_fetch_row($resultados_precios)){
	$precio_articulo=$registro_precios_articulo[0];
	}

/////////////////////////////////////////////////////////////////////////////////////////////////
$lote3="LOTE 3 Comb.2 - 10e";
$lote4="LOTE 4 Comb.2 - 10e";

	echo "<tr><td colspan='5'><hr></td></tr>";

	
	
	if ($nombre==$lote3){
		echo "<tr>";
		echo "<td colspan='4' align='right' class='precio'>TOTAL(con descuento aplicado): &nbsp;</td>";
		echo "<td align='right' class='precio'>";
			
		printf("%.2f",$total-1.5);
		echo " &euro;";
		echo "</td>";	
		
		}else{
			
			if ($nombre==$lote4){
				echo "<tr>";
				echo "<td colspan='4' align='right' class='precio'>TOTAL(con descuento aplicado): &nbsp;</td>";
				echo "<td align='right' class='precio'>";
		
				printf("%.2f",$total-5.8);
				echo " &euro;";
				echo "</td>";	
		
					}else{
						echo "<tr>";
						
						
						if ($dia_finde=="Friday" OR $dia_finde=="Sunday" OR $dia_finde=="Saturday" ){
					echo "<td colspan='4' align='right' class='precio'>TOTAL: &nbsp;</td>";
					echo "<td align='right' class='precio'>";
				
						printf("%.2f",$total);
						echo " &euro; ";
						
						echo "</td>";
						}else{
					echo "<td colspan='4' align='right' class='precio'>TOTAL: &nbsp;</td>";
					echo "<td align='right' class='precio'>";
							printf("%.2f",$total);
						echo " &euro;";
			
						echo "</td>";
						}
		}
	}
	echo "</tr>";
	
echo "</table>";

if($cuenta_total_articulos>=2){
	if($oferta_disponible==1){
		//if($oferta_realizada>=1){
			//echo "<br><span id='realizar_oferta'>Ya tiene una oferta aplicada</span><br><br>";
		//}else{
		//	echo "<br><a href='oferta3.php' id='realizar_oferta'>Aplicar oferta (".$titulo_oferta.")</a><br><br>";
		//}
	}
}

?>
<br></br>
<div id="comentario">
<hr>
Si desea comentar algo <b>(ingredientes, bebidas, ensaladas, etc..)</b>, p&oacute;ngalo continuaci&oacute;n:
</div>

<form action='confirmar2.php' method='post'>

<textarea name="comentario" cols="100" rows="6"></textarea>
<br><br>

<hr>
<table border='0' width='800' id='opciones'>
<tr>
	<td colspan='2' class='titulo'>&iquest;Te lo llevamos o vienes?<br></td>
</tr>
<tr>


<?php //if($dia_finde=="Friday" OR $dia_finde=="Sunday" OR $dia_finde=="Saturday" ){ 
$consulta_estado=mysqli_query($conexion,"SELECT id_estado FROM $tabla31 WHERE nombre='estado'");

	while($nombre_estado=mysqli_fetch_row($consulta_estado))
	{
		$estado=$nombre_estado[0];
	}

if($estado==1){

?>
	<td width='220'><input type='radio' name='llevar' value='opcion1' CHECKED>Env&iacute;o a domicilio *</td>
    <td><input type='radio' name='llevar' value='opcion2'>Recoger en la pizzeria</td>
    </tr>
</table>

<hr>
<table border='0' width='800' id='opciones'>
<tr>
	<td colspan='2' class='titulo'>&iquest;En qu&eacute; lugar?<br></td>
</tr>
<tr>
	<td colspan='2'><input type='radio' name='lugar' value='opcion1' CHECKED>Mi lugar habitual.</td>
</tr>
<tr>
<?php
$ndireccion= mysqli_query($conexion,"SELECT COUNT(id_direccion) FROM $tabla18 WHERE id_cliente='$usuario'");
	while ($direccion=mysqli_fetch_row($ndireccion)){
		if($direccion[0]==0){
			$valido="disabled";
		}
	}
?>

	<td colspan='2'><input type='radio' name='lugar' value='opcion2' <?php echo $valido; ?>>Otro ya elegido anteriormete.
		<?php 
		echo "<select name='direcciones' id='direcciones'>";
			$ndireccion= mysqli_query($conexion,"SELECT * FROM $tabla18 WHERE id_cliente='$usuario'");
				while ($direccion=mysqli_fetch_row($ndireccion)){
	   			echo "<option value='$direccion[0]'>$direccion[2] $direccion[3] $direccion[4] $direccion[5]</option>";
	 			}
		echo "</select>";
		?>
	</td>
</tr>
<tr>
	<td colspan='2'><input type='radio' name='lugar' value='opcion3'>Un lugar nuevo.</td>
</tr>
</table>
<hr>
<table border='0' width='800' id='opciones'>
<tr><td colspan='2' align='center'>

<?php }else{ ?>

	<td><input type='radio' name='llevar' value='opcion2' checked >Recoger en asador</td>
    
<?php }?>

<?php
echo "<input type='hidden' name='pedido' value='$pedido'>";
echo "<input type='hidden' name='precio_total' value='$total'>";


echo "<a href='/clientes/index.php'><button size='100' ><< VOLVER</button></a> <input type='submit' value='SIGUIENTE >>' size='100'>";
echo "</form>";
?>
</td></tr>
</table>

<table border='0' width='800' id='opciones'>
<tr><td colspan='2'>
<br><br>
** Reparto a domicilio solo Viernes, Sabado, Domingo festivos y dia anterior a efectivos.
<br></br>

</td></tr>
</table>


</td><td>&nbsp;</td></tr></table>

</div>
</body>
</html>