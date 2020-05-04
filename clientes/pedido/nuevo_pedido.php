<?php

include("../../conexion.php"); //Nos conectamos a la base de datos
//include ("../../autenticacion");
include ("../../seguridad.php");
	
//$articulo_pedido=$_POST['id_articulo_pedido'];

$cliente=$_SESSION["id"];
//echo $cliente;

//////////////////////////////			GENERA EL ÚLTIMO      ///////////////////////////

$nuevo_pedido= mysqli_query($conexion,"SELECT MAX(id_pedido) FROM $tabla8 ");

	while ($registro_nuevo=mysqli_fetch_row($nuevo_pedido)){
	       foreach($registro_nuevo as $clave_nuevo){ 
	       //echo $clave;
	 	}
	 }

$pedido_nuevo=$clave_nuevo+1;

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////


//////////////////////////////			GENERA EL ÚLTIMO PEDIDO DEL CLIENTE      ///////////////////////////

$npedido= mysqli_query($conexion,"SELECT MAX(id_pedido) FROM $tabla8 WHERE id_usuario='$cliente'");

	while ($registro=mysqli_fetch_row($npedido)){
	       foreach($registro as $clave){ 
	       //echo $clave;
	 	}
	 }

$pedido=$clave+1;

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////			GENERA EL ÚLTIMO ARTICULO PEDIDO       ///////////////////////////

$nartpedido= mysqli_query($conexion,"SELECT MAX(id_articulo_pedido) FROM $tabla14");

	while ($registroap=mysqli_fetch_row($nartpedido)){
	       foreach($registroap as $claveap){ 
	       //echo $clave;
	 	}
	 }

$articulo_pedido=$claveap+1;

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

if($ingrediente_mas==0){
	$precio_ingrediente=0;
}else{
	$precio_ingrediente=0.20;
}

$precio_producto=$precio+$precio_ingrediente;
$subtotal=$precio_producto*$cantidad;
/*
echo "Articulo pedido: ".$articulo_pedido;
echo "<br>Articulo: ".$articulo;
echo "<br>cantidad: ".$cantidad;
echo "<br>Precio unitario: ".$precio;
echo "<br>Subtotal: ".$subtotal;
echo "<br>Pedido: ".$pedido;
echo "<br>cliente: ".$cliente;
echo "<br>fecha: ".$fecha;
echo "<br>pagina: ".$pagina;
*/

	$campos="id_pedido,id_usuario,precio_total,recogida,estado,fecha,hora";
	$datos="'$pedido_nuevo','$cliente','0','0','99','$fecha','$hora'";
//	$datos="'$pedido_nuevo','$cliente','0','0','99','$fecha','$hora'";
	$pedido=mysqli_query($conexion,"INSERT INTO $tabla8 ($campos) VALUES ($datos)");
	$prueba="INSERT INTO $tabla8 ($campos) VALUES ($datos)";
//	echo $prueba;

header ("Location: pedido.php");

?>