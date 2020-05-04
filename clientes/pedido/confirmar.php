<?php include("../../conexion.php"); //Nos conectamos a la base de datos
	include ("../../seguridad.php");
//	include ("../../autenticacion");

$pag=$_SERVER['PHP_SELF'];  // el nombre y ruta de esta misma pÃ¡gina.

?>

<html>

<head>
<link href="../../estilos.css" rel="stylesheet" type="text/css" />
</head>

<body id="estilo_resumen">


<?php
$usuario=$_SESSION["id"];
$precio_total=$_POST['precio_total'];
$comentario=$_POST['comentario'];
$llevar=$_POST['llevar'];
$lugar=$_POST['lugar'];
$direccion=$_POST['direcciones'];
$fecha=date("Y-m-d");
$hora=date("H:i:s");
$ssql = "select * from `$tabla50` WHERE cliente='$usuario' AND id_estado='99'";
$rs = mysqli_query($conexion,$ssql);
$num_total= mysqli_num_rows($rs);
$accion=$_POST['accion'];
//echo $num_total;

//echo $llevar;

if($llevar=='opcion1' and $precio_total<8){


	echo "<br><br>";
	echo "<div id='pedido_minimo' align='center'>Pedido minimo 8&euro;<div>";

}else{
	

//////////////////////////////				GENERA MINUTOS DE ESPERA       ///////////////////////////

$ssql_minutos= mysqli_query($conexion,"SELECT espera FROM $tabla19");

	while ($minutos=mysqli_fetch_row($ssql_minutos)){
		$espera=$minutos[0];
	}

///////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////				GENERA EL ÚLTIMO PEDIO       ///////////////////////////

$npedido= mysqli_query($conexion,"SELECT MAX(pedido) FROM $tabla50 WHERE cliente='$usuario'");

//echo "<table align=center border=2 id='tabla_consulta'>";

	while ($numero=mysqli_fetch_row($npedido)){
	       foreach($numero as $claven){ 
	       //echo $clave;
	 	}
	 }

$pedido=$claven;

//////////////////////////////		GENERA LA ULTIMA DIRECCION       ///////////////////////////

	$ssql_ultima_dir= mysqli_query($conexion,"SELECT MAX(id_direccion) FROM $tabla18");
		while ($nultima_dir=mysqli_fetch_row($ssql_ultima_dir)){
			foreach($nultima_dir as $clave_dir){
	   		
	   	}
	 }
$nueva_dir=$clave_dir+1;

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

if($accion=='almacenar_dir'){
	$calle=$_POST['calle'];
	$numero=$_POST['numero'];
	$bloque=$_POST['bloque'];
	$puerta=$_POST['puerta'];
	$campos="id_direccion,id_cliente,calle,numero,bloque,puerta";
	$datos="'$nueva_dir','$usuario','$calle','$numero','$bloque','$puerta'";

	$inserta=mysqli_query($conexion,"INSERT INTO $tabla18 ($campos) VALUES ($datos)");
	
	$llevar='opcion1';
	$lugar='opcion2';
	$direccion=$nueva_dir;

}

//////////////////////////////		GENERA LAS DIRECCIONES DEL CLIENTE       ///////////////////////////

	$ssql_direccion= mysqli_query($conexion,"SELECT * FROM $tabla18 WHERE id_direccion='$direccion'");
		while ($ndireccion=mysqli_fetch_row($ssql_direccion)){
			if($ndireccion[4]!=""){
				$bloque=" bloque ".$ndireccion[4];
			}
			if($ndireccion[5]!=""){
				$puerta=" puerta ".$ndireccion[5];
			}
	   	$calle=$ndireccion[2].", ".$ndireccion[3]." ".$bloque." ".$puerta;
	 }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////			GENERA EL ÚLTIMO ARTICULO PEDIDO       ///////////////////////////

$nartpedido= mysqli_query($conexion,"SELECT MAX(id_articulo_pedido) FROM $tabla50");

	while ($registroap=mysqli_fetch_row($nartpedido)){
	       foreach($registroap as $claveap){ 
	       //echo $clave;
	 	}
	 }

$articulo_pedido=$claveap+1;

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>
<table width="100%" border="0">
<tr>
	<td>&nbsp;</td>

	<td align="center">
<br><br>
<?php
if($num_total!='1'){
	echo "No tienes ning&uacute;n pedido pendiente de confirmaci&oacute;n";
}else{

/////////////////////////////////////////////////////////////
$ssql = "select * from `$tabla50` WHERE pedido='$pedido' AND cliente='$usuario'";
$resultado = mysqli_query($conexion,$ssql);
/////////////////////////////////////////////////////////////


$i=1;
while ($registro=mysqli_fetch_row($resultado)){

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
	$nombre_familia="Pizza";
}else{
	$nombre_familia2=mysqli_query($conexion,"SELECT nombre_familia FROM $tabla5 WHERE id_familia='$familia'");
	while($datosf=mysqli_fetch_row($nombre_familia2))
	{
		$nombre_familia=$datosf[0];
	}
}
}
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////

/*
echo "id_pedido: ".$pedido;
echo "<br>id_usuario: ".$usuario;
echo "<br>precio total: ".$precio_total;
echo "<br>fecha: ".$fecha;
echo "<br>hora: ".$hora;
*/

if($llevar=='opcion1'){
	if($lugar=='opcion1'){
		echo "Su pedido ser&aacute; enviado en aproximadamente ".$espera." minutos a su lugar habitual.";
		$dir=0;
		
$campos="id_articulo_pedido,id_articulo,id_familia,cantidad,precio,pedido,cliente,fecha,masa,tamano,salsa,sabor1,sabor2";
$datos="'$articulo_pedido','120','19','1','1','$pedido','$usuario','$fecha','0','0','0','0','0'";

$inserta=mysqli_query($conexion,"INSERT INTO $tabla50 ($campos) VALUES ($datos)");

$precio_total=$precio_total+1;

	}elseif($lugar=='opcion2'){
		echo "Su pedido ser&aacute; enviado en aproximadamente ".$espera." minutos a la direcci&oacute;n:<br>";
		echo "<div class='direccion'>".$calle."</div>";
		$recogida=1;
		$dir=$direccion;

$campos="id_articulo_pedido,id_articulo,id_familia,cantidad,precio,pedido,cliente,fecha,masa,tamano,salsa,sabor1,sabor2";
$datos="'$articulo_pedido','120','19','1','1','$pedido','$usuario','$fecha','0','0','0','0','0'";

$inserta=mysqli_query($conexion,"INSERT INTO $tabla50 ($campos) VALUES ($datos)");

$precio_total=$precio_total+1;

	}else{
		echo "Indique el lugar deseado a continuaci&oacute;n.<br>Este lugar se almacenar&aacute; en la base de datos y no tendra que volver a ponerlo la proxima vez.<br><br>";
		//$dir=$nueva_dir;
		echo "<form action='confirmar.php' method='post'>";
		echo "<fieldset id='tabla_dir'>";
		echo "<legend>A&ntilde;adir direcci&oacute;n.</legend>";
		echo "<table border='0'>";
			echo "<tr>";
				echo "<td>Calle</td>";
				echo "<td><input type='text' name='calle'></td>";
			echo "</tr><tr>";
				echo "<td>N&ordm;</td>";
				echo "<td><input type='text' name='numero'></td>";
			echo "</tr><tr>";
				echo "<td>Bloque</td>";
				echo "<td><input type='text' name='bloque'></td>";
			echo "</tr><tr>";
				echo "<td>Puerta</td>";
				echo "<td><input type='text' name='puerta'></td>";
			echo "</tr>";
		echo "</table>";
		echo "<input type='submit' value='SIGUIENTE>>'>";		
		echo "</fieldset>";
		echo "<input type='hidden' name='accion' value='almacenar_dir'>";
		echo "<input type='hidden' name='precio_total' value='$precio_total'>";
		echo "<input type='hidden' name='comentario' value='$comentario'>";
		echo "</form>";
		exit;
	}
}else{
	echo "Su pedido estar&aacute; listo aproximadamente ".$espera." minutos.<br><br> Pase a recogerlo en la Pizzeria Belsay, C/Falla, 18, Fuente de Andalucía(sevilla).<br><br> Gracias por su compra.";
	$recogida=1;
}


$campos="precio_total='$precio_total',estado='0',fecha='$fecha',hora='$hora',comentario='$comentario',direccion='$dir'";
$datos="'$pedido','$usuario','$precio_total','0','0','$fecha','$hora','$dir'";

//$inserta=mysqli_query($conexion,"INSERT INTO $tabla8 ($campos) VALUES ($datos)");

$sentencia="UPDATE $base . `$tabla50` SET $campos WHERE $tabla8 . pedido=$pedido ";
$modifica=mysqli_query($conexion,$sentencia);

//echo $sentencia;
//$prueba="INSERT INTO $tabla14 ($campos) VALUES ($datos)";
//echo "<br>".$prueba;


?>


<br>

<?php } 

}?>
<br><br><br>
	</td>
	<td>&nbsp;</td>
</tr>
	<tr>
		<td></td><td align="center" class="cerrar"><a href="javascript:close()">Cerrar ventana</a> </td><td></td>
	</tr>

</table>


</div>

</body>
</html>