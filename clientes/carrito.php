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

$bocamix_bocata=$_POST['bocata'];
$bebida_p2=$_POST['bebida'];

$ingrediente1=$_POST['ingred1'];
$ingrediente2=$_POST['ingred2'];
$ingrediente3=$_POST['ingred3'];
$ingrediente4=$_POST['ingred4'];
$ingrediente5=$_POST['ingred5'];
$bebida_mix=$_POST['bebida_mix'];


//////////////////////////////////////////// TAMAÑO PIZZAS  MED/FAM //////////////////////////

if($tamano==1){
	$precio=$precioP;
}elseif($tamano==2){
	$precio=$precioM;
}elseif($tamano==3){
	$precio=$precioF;
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////			GENERA EL ÚLTIMO ARTICULO PEDIDO       ///////////////////////////

//$ssql_npedido="SELECT MAX(id_pedido) FROM $tabla8 WHERE id_usuario='$usuario' ";

$sentencia_nartpedido="SELECT MAX(id_articulo_pedido) FROM $tabla50";

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
////////////////////////////////////////////////////////////////////////////////////////// buscamos el ultimo pedido para ver el estado
	$ssql_estado="SELECT MAX(id_estado) FROM $tabla50 WHERE cliente=$usuario";
	
	$resultado = mysqli_query($conexion,$ssql_estado);
	
	while ($registro=mysqli_fetch_row($resultado)){
		$consulta_estado=$registro[0];
	}
//////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////// buscamos el ultimo pedido para ver el estado
	$ssql_pedido="SELECT MAX(pedido) FROM $tabla50 WHERE cliente=$usuario";
	
	$resultado2 = mysqli_query($conexion,$ssql_pedido);
	
	while ($registro2=mysqli_fetch_row($resultado2)){
		$consulta_pedido=$registro2[0];
	}
//////////////////////////////////////////////////////////////////////////////////////////


if ($consulta_estado!=99){ //si esta a 0 creamos un numero de pedido nuevo

	$sentencia_nartpedido="SELECT MAX(pedido) FROM $tabla50 WHERE cliente=$usuario";
	
	$nartpedido= mysqli_query($conexion,$sentencia_nartpedido);
	
	////////////////////////////////////////////////////////////////////////
		while ($registroap=mysqli_fetch_row($nartpedido)){
			   foreach($registroap as $claveap){ }
		}
	
	$id_pedido=$claveap+1;
	/////////////////////////////////////////////////////////////////////////	
	$id_estado=99;
	
		
	$campos="id_articulo_pedido,id_articulo,id_familia,cantidad,precio,pedido,cliente,fecha,tamano,bebida,id_estado,ingred1,ingred2,ingred3,ingred4,ingred5,bocamix,bebida_mix,bebida_p2,recogida";
	$datos="'$articulo_pedido','$articulo','$familia','$cantidad','$precio','$id_pedido','$cliente','$fecha','$tamano','$bebida','$id_estado','$ingrediente1','$ingrediente2','$ingrediente3','$ingrediente4','$ingrediente5','$bocamix_bocata','$bebida_mix','$bebida_p2','$recoger'";
	
	$sentencia_inserta="INSERT INTO $tabla50 ($campos) VALUES ($datos)";
	
	$inserta=mysqli_query($conexion,$sentencia_inserta);

	header ("Location: $pagina");

}else{
	
$id_estado=99;
$id_pedido=$consulta_pedido;

$campos="id_articulo_pedido,id_articulo,id_familia,cantidad,precio,pedido,cliente,fecha,tamano,bebida,id_estado,ingred1,ingred2,ingred3,ingred4,ingred5,bocamix,bebida_mix,bebida_p2,recogida";
$datos="'$articulo_pedido','$articulo','$familia','$cantidad','$precio','$id_pedido','$cliente','$fecha','$tamano','$bebida','$id_estado','$ingrediente1','$ingrediente2','$ingrediente3','$ingrediente4','$ingrediente5','$bocamix_bocata','$bebida_mix','$bebida_p2','$recoger'";

$sentencia_inserta="INSERT INTO $tabla50 ($campos) VALUES ($datos)";

$inserta=mysqli_query($conexion,$sentencia_inserta);

header ("Location: $pagina");
}
?>