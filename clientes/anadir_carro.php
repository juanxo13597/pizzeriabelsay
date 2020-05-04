<?php

include("../conexion.php"); //Nos conectamos a la base de datos
session_start();

$P=$_POST;

$articulo_pedido=$P['id_articulo_pedido'];
$articulo=$P['id_articulo'];
//$ingrediente_mas=$_POST['ingrediente_mas'];
//$ingrediente_menos=$_POST['ingrediente_menos'];
$cantidad=$_POST['cantidad'];
$precio=$P['precio'];
$cliente=$_SESSION['id'];
$fecha=$P['fecha'];
$pagina=$P['pagina'];
$familia=$P['familia'];
$usuario=$_SESSION["id"];
//$peso=$P['peso'];
$tamano=$_POST['tamano'];

$precioP=$_POST['precioP'];
$precioM=$_POST['precioM'];
$precioF=$_POST['precioF'];


//////////////////////////////////////////// TAMAÑO PIZZAS  MED/FAM //////////////////////////

if($tamano==1){
	$precio=$precioP;
}elseif($tamano==2){
	$precio=$precioM;
}elseif($tamano==3){
	$precio=$precioF;
}

//////////////////////////////////////////// 1/4,1/2,1kg y 1.5kg //////////////////////////// 
/*
if($peso==''){
	$cantidad=$P['cantidad'];
}
	elseif($peso==1){
		$cantidad=$P['cantidad']*1;
	}elseif($peso==2){
		$cantidad=$P['cantidad']*2;
	}elseif($peso==3){
		$cantidad=$P['cantidad']*4;
	}elseif($peso==4){
		$cantidad=$P['cantidad']*6;
	
}
*/
////////////////////////////////////////////////////////////////////////////////////////////////

  	
//////////////////////////////			GENERA EL ÚLTIMO PEDIDO       ///////////////////////////


//$ssql_npedido="SELECT MAX(id_pedido) FROM $tabla8 WHERE id_usuario='$usuario' ";

$ssql_npedido="SELECT MAX(id_pedido) FROM $tabla8 ";
$npedido= mysqli_query($conexion,$ssql_npedido);
$row_npedido=mysqli_fetch_row($npedido);

$pedido=$row_npedido[0];
$id_pedido_nuevo=$pedido+1;

//echo "ola6";
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////


//////////////////////////////			GENERA EL ÚLTIMO ESTADO PEDIDO       ///////////////////////////


$sentencia_ultimo_pedido="SELECT MAX(id_pedido) FROM $tabla8 WHERE id_usuario=$cliente";
$resultado_ultimo_pedido=mysqli_query($conexion,$sentencia_ultimo_pedido);
$row_u_p=mysqli_fetch_row($resultado_ultimo_pedido);
$ultimo_pedido_cliente=$row_u_p[0];



if($row_u_p[0]==""){
	$estado_ultimo_pedido=0;
	//echo "ola7";
}else{
//echo "ola8";
$sentencia_estado_ultimo_pedido="SELECT estado FROM $tabla8 WHERE id_pedido=$ultimo_pedido_cliente";

$ssql_estado_ultimo_pedido=mysqli_query($conexion,$sentencia_estado_ultimo_pedido);
$resultado=mysqli_fetch_object($ssql_estado_ultimo_pedido);
$estado_ultimo_pedido=$resultado->estado;



}


if($estado_ultimo_pedido!=99){
	$campos="id_pedido,id_usuario,precio_total,recogida,estado,fecha,hora";
	$datos="'$id_pedido_nuevo','$cliente','0','0','99','$fecha','$hora'";
	$sentencia_crea_pedido="INSERT INTO $tabla8 ($campos) VALUES ($datos)";
	$crea_pedido=mysqli_query($conexion,$sentencia_crea_pedido);
	$prueba="INSERT INTO $tabla8 ($campos) VALUES ($datos)";
	$id_pedido=$id_pedido_nuevo;
	
//	echo "ola9";

}else{
	$id_pedido=$pedido;
//echo "ola10";
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////			GENERA EL ÚLTIMO ARTICULO PEDIDO       ///////////////////////////

//$ssql_npedido="SELECT MAX(id_pedido) FROM $tabla8 WHERE id_usuario='$usuario' ";

$sentencia_nartpedido="SELECT MAX(id_articulo_pedido) FROM $tabla14";

$nartpedido= mysqli_query($conexion,$sentencia_nartpedido);


	while ($registroap=mysqli_fetch_row($nartpedido)){
	       foreach($registroap as $claveap){ 
	       //echo $clave;
	 	}
//		$pedido=$registro[1];
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
echo "<br>estado: ".$estado_pedido;
*/
$campos="id_articulo_pedido,id_articulo,id_familia,cantidad,precio,pedido,cliente,fecha,peso,bebida";
$datos="'$articulo_pedido','$articulo','$familia','$cantidad','$precio','$id_pedido','$cliente','$fecha','$peso','$bebida'";

$sentencia_inserta="INSERT INTO $tabla14 ($campos) VALUES ($datos)";

$inserta=mysqli_query($conexion,$sentencia_inserta);

//$prueba="INSERT INTO $tabla14 ($campos) VALUES ($datos)";
//echo "<br>".$prueba;

header ("Location: $pagina");

?>