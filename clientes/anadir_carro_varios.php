<?php

include("../conexion.php"); //Nos conectamos a la base de datos

//$articulo_pedido=$_POST['id_articulo_pedido'];
$pedido_completo=$_POST['pedido'];
$cliente=$_POST['cliente'];
$pagina="index.php";
$fecha=date(Y."-".m."-".d);

$ssql = "select * from `$tabla14` WHERE cliente=$cliente AND pedido=$pedido_completo";
$resultado = mysqli_query($conexion,$ssql);

//echo $ssql;

while ($registro_datos=mysqli_fetch_row($resultado)){

$articulo=$registro_datos[1];
$familia=$registro_datos[2];
$cantidad=$registro_datos[3];
$precio=$registro_datos[4];
$masa=$registro_datos[8];
$tamano=$registro_datos[9];
$salsa=$registro_datos[11];
$sabor1=$registro_datos[12];
$sabor2=$registro_datos[13];

//////////////////////////////			GENERA EL ÚLTIMO PEDIDO       ///////////////////////////

$npedido= mysqli_query($conexion,"SELECT MAX(id_pedido) FROM $tabla8 WHERE id_usuario='$cliente'");

	while ($registro=mysqli_fetch_row($npedido)){
	       foreach($registro as $clave){ 
	       //echo $clave;
	 	}
	 }

$pedido=$clave;

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////			GENERA EL ÚLTIMO ESTADO PEDIDO       ///////////////////////////

$npedido_nuevo= mysqli_query($conexion,"SELECT estado FROM $tabla8 WHERE id_pedido='$pedido'");

	while ($registro_nuevo=mysqli_fetch_row($npedido_nuevo)){
	       foreach($registro_nuevo as $estado_pedido){ 
	       //echo $clave;
	 	}
	 }

$pedido_nuevo=$pedido+1;


if($estado_pedido!=99){
	$campos="id_pedido,id_usuario,precio_total,recogida,estado,fecha,hora";
	$datos="'$pedido_nuevo','$cliente','0','0','99','$fecha','$hora'";
	$crear_pedido=mysqli_query($conexion,"INSERT INTO $tabla8 ($campos) VALUES ($datos)");
	$prueba="INSERT INTO $tabla8 ($campos) VALUES ($datos)";
	$pedido=$pedido_nuevo;
}

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

$subtotal=$precio;
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
echo "<br>estado: ".$estado_pedido;
*/
$campos="id_articulo_pedido,id_articulo,id_familia,cantidad,precio,pedido,cliente,fecha,masa,tamano,salsa,sabor1,sabor2";
$datos="'$articulo_pedido','$articulo','$familia','$cantidad','$subtotal','$pedido','$cliente','$fecha',$masa,$tamano,'$salsa','$sabor1',$sabor2";

$inserta=mysqli_query($conexion,"INSERT INTO $tabla14 ($campos) VALUES ($datos)");

$prueba="INSERT INTO $tabla14 ($campos) VALUES ($datos)";
//echo "<br>".$prueba;

}

header ("Location: $pagina");

?>