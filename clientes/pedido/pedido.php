<?php 

// POSICIONAMIENTO ENLACES

$directorio_actual=$_SERVER['PHP_SELF'];    

//echo $_SERVER['PHP_SELF'];
//inicio variable	

$palabras=explode("/",$directorio_actual);
$palabras_contadas=count($palabras);
//muestra por pantalla 
//echo "El directorio <b>".$_GET['directorio_actual']."</b> tiene ".count($palabras)." /";

if ($palabras_contadas==3){
	$directorio_padre='../';
}elseif($palabras_contadas==2){
	$directorio_padre='';
}

// FIN POSICIONAMIENTO    
	  $dir_conexion=$directorio_padre."conexion.php";
	  $dir_seguridad=$directorio_padre."seguridad.php";
	  
	include("$dir_conexion"); //Nos conectamos a la base de datos
	include ("$dir_seguridad");
//	include ("../../autenticacion");

$pag=$_SERVER['PHP_SELF'];  // el nombre y ruta de esta misma pÃ¡gina.


if ($_GET['accion']=="borrar"){
	$id_borrar= $_GET['id'];
	$id_cliente= $_GET['cliente_borrar'];
	mysqli_query($conexion,"DELETE FROM `$tabla50` WHERE id_articulo_pedido='$id_borrar' and cliente='$id_cliente'") or die(mysqli_error($conexion));
	mysqli_close($conexion);
	header ("Location: http://www.pizzeriabelsay.es/cliente/index.php");
	exit;
}

?>

<html>

<head>
<link href="../../estilos.css" rel="stylesheet" type="text/css" />
</head>

<body id="estilo_pedido">


<?php
$usuario=$_SESSION["id"];
$ssql = "select * from `$tabla50` WHERE cliente='$usuario' AND id_estado='99'";
$rs = mysqli_query($conexion,$ssql);
$num_total= mysqli_num_rows($rs);

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////        GENERA SI LA TIENDA ESTA ABIERTA    //////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

$consulta_estado=mysqli_query($conexion,"SELECT id_estado FROM $tabla3 WHERE nombre='estado'");

	while($nombre_estado=mysqli_fetch_row($consulta_estado))
	{
		$estado=$nombre_estado[0];
	}
//////////////////////////////				GENERA EL ÚLTIMO PEDIO       ///////////////////////////

$npedido= mysqli_query($conexion,"SELECT MAX(pedido) FROM $tabla50 WHERE cliente='$usuario'");

//echo "<table align=center border=2 id='tabla_consulta'>";

	while ($numero=mysqli_fetch_row($npedido)){
	       foreach($numero as $claven){ 
	       //echo $clave;
	 	}
	 }

$pedido=$claven;
//echo $npedido;
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

if($num_total=='0'){
echo "<div id='nuevo_pedido'><a>Empieza tu pedido!!!</a></div>";
	
}else{

?>

	<div id="libreta_centro">
<div class="tu_pedido">Tu pedido</div><hr>
<?php

///////////////////////////////////////////////////////////////////////////////
//////////////////////      SUMATORIO DE ARTICULOS    ///////////////////////////
/////////////////////////////////////////////////////////////
//$ssql = "select * from `$tabla14` WHERE pedido='$pedido' AND cliente='$usuario'";
//$resultado = mysqli_query($conexion,$ssql);

$ssql = "select id_articulo_pedido,id_articulo,id_familia,SUM(cantidad),SUM(precio) from `$tabla50` WHERE pedido='$pedido' AND cliente='$usuario' and id_estado='99' GROUP BY id_articulo";

$resultado = mysqli_query($conexion,$ssql);

$cuenta= mysqli_num_rows($resultado);

//echo $cuenta;
/////////////////////////////////////////////////////////////


//$ssql_cuenta = "select id_articulo_pedido from `$tabla14` WHERE pedido='$pedido' AND cliente='$usuario'";

//echo $ssql_cuenta;

//$resultado_cuenta = mysqli_query($conexion,$ssql_cuenta);

//$cuenta= mysqli_num_rows($resultado_cuenta);

/////////////////////////////////////////////////////////////

if($cuenta=='0'){
	echo "<div id='saludo'>Hola <b>".$_SESSION['nombre']."</b> estamos esperando a que nos digas lo que quieres ;-)<hr>";
}else{
echo "<div id='saludo'>Hola <b>".$_SESSION['nombre']."</b> este es tu pedido.</div><hr>";
}

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
                $nombre_familia="Menu Infantil";
	}
}elseif($registro[2]==1000){
	$datos_articulo=mysqli_query($conexion,"SELECT * FROM $tabla15 WHERE id_personalizada='$registro[1]'");
	while($datos=mysqli_fetch_row($datos_articulo))
	{
		$id_personalizada=$datos[0];
		$nombre=$datos[3];
		$ingredientes=$datos[4];
		$familia=$datos[5];
                $nombre_familia="LOTE 3 - 10e";
	}
}elseif($registro[2]==1001){
	$datos_articulo=mysqli_query($conexion,"SELECT * FROM $tabla15 WHERE id_personalizada='$registro[1]'");
	while($datos=mysqli_fetch_row($datos_articulo))
	{
		$id_personalizada=$datos[0];
		$nombre=$datos[3];
		$ingredientes=$datos[4];
		$familia=$datos[5];
                $nombre_familia="LOTE 4 - 10e";
	}
}elseif($registro[2]==100){
	$datos_articulo=mysqli_query($conexion,"SELECT * FROM $tabla23 WHERE id_personalizado='$registro[1]'");
	while($datos=mysqli_fetch_row($datos_articulo))
	{
		$id_personalizado=$datos[0];
		$nombre=$datos[3];
		$ingredientes=$datos[4];
		$familia=$datos[5];
                $nombre_familia="HOT DOGS";
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

if($familia!=99){
	$ssql_nombre_familia="SELECT nombre_familia FROM $tabla5 WHERE id_familia=$familia";
//	echo $ssql_nombre_familia;
	$nombre_familia2=mysqli_query($conexion,$ssql_nombre_familia);
	while($datosf=mysqli_fetch_row($nombre_familia2))
	{
		$nombre_familia=$datosf[0];
	}
}

///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////
////////////////////  GENERA NOMBRE INGREDIENTE MAS ///////////////////////////
/*
if($registro[2]==0){
	$ingrediente_mas=" ";
}else{
	$datos_ingrediente_mas=mysqli_query($conexion,"SELECT nombre FROM $tabla6 WHERE id_ingrediente='$registro[2]'");
	while($datosmas=mysqli_fetch_row($datos_ingrediente_mas))
	{
		$ingrediente_mas="+ ".$datosmas[0];
	}
}

if($registro[3]==0){
	$ingrediente_menos=" ";
}else{
	$datos_ingrediente_menos=mysqli_query($conexion,"SELECT nombre FROM $tabla6 WHERE id_ingrediente='$registro[3]'");
	while($datosmenos=mysqli_fetch_row($datos_ingrediente_menos))
	{
		$ingrediente_menos="- ".$datosmenos[0];
	}
}
*/

///////////////////////////////////////////////////////////////////////////////
//////////////////////      SUMATORIO DE PRECIOS    ///////////////////////////
$precio = "SELECT SUM(precio) FROM $tabla50 WHERE pedido='$pedido' AND cliente='$usuario'";
$sumatorio = mysqli_query($conexion,$precio);
	while($suma=mysqli_fetch_row($sumatorio))
	{
		$total=$suma[0];
	}

///////////////////////////////////////////////////////////////////////////////
//$registro2==1;

//$consulta_id = "select identificador from `$tabla2` where identificador='1' ";

//$resultado2 = mysqli_query($conexion,$consulta_id);

//$resultado_consulta= mysqli_num_rows($resultado2);

//echo $resultado_consulta;


///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////

echo "<table border='0' id='tabla_articulo'>";
	echo "<tr>";
	
		echo "<td rowspan='4' class='cantidad' width='15'><input type='text' value='".$registro[3]."' id='campo_cantidad' readonly></td>";
	
	echo "</tr>";
	echo "<tr>";
		echo "<td><span class='familia'>".$nombre_familia."</span> <span class='articulo'>".$nombre."</span></td>";
		echo "<td rowspan='2' class='precio' width='40'>";
		
		printf("%.2f", $registro[4]);
		
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		
	echo "</tr>";
	echo "<tr>";
		echo "<td colspan='3' align=right><a href='?accion=borrar&id=$registro[0]&cliente_borrar=$usuario'><img src='../../images_css/delete2.gif' name='borrar' alt='borrar' border='0'></a></td>";
	echo "</tr>";	
echo "</table><hr>";

}

if($total_art=='0'){
	echo "<br>";
}else{
echo "<table border='0' id='tabla_articulo'>";
	echo "<tr>";
		echo "<td width='20'>TOTAL:</td>";
		echo "<td width='100' align='right'> <div id='precio_total'>";
		printf("%.2f",$total);
		echo " &euro;";
		echo "</div></td>";	
	echo "</tr>";
?>
<?php
echo "<tr><td align='center' colspan='2'><br>";


if($estado==1){
?>
<a href="pedido/resumen2.php" >SIGUENTE >></a>
<BR>
<?php
	
	}else{
		echo "<br>La Pizzeria est&aacute; cerrada en estos momentos.";
	}

echo "</form>";

echo "</td></tr></table>";
echo "<br>";
}
?>
	
	</div>

	
<?php } ?>
</div>
</body>

</body>
</html>