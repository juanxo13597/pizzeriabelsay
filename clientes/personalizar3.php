<?php

include("../conexion.php"); //Nos conectamos a la base de datos
session_start();

$P=$_POST;

$articulo_pedido=$P['id_articulo_pedido'];
$articulo=134;
//$ingrediente_mas=$_POST['ingrediente_mas'];
//$ingrediente_menos=$_POST['ingrediente_menos'];
$cantidad=$_POST['cantidad'];
$precio=$P['precio'];
$cliente=$_SESSION['id'];
$fecha=$P['fecha'];
$pagina=$P['pagina'];
$familia=101;
$usuario=$_SESSION["id"];
//$peso=$P['peso'];
$tamano=$_POST['tamano'];

$precioP=$_POST['precioP'];
$precioM=$_POST['precioM'];
$precioF=$_POST['precioF'];

$n_ingredientes1=$_POST['select2'];
$n_ingredientes2=$_POST['select3'];
$n_ingredientes3=$_POST['select4'];
$n_ingredientes4=$_POST['select5'];
$n_ingredientes5=$_POST['select6'];


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
//////////////////////////////////////////////////////////////////////////////////////////
///////////////////         GENERA LA ÚTLIMA PERSONALIZADA           /////////////////////

$nperson= mysqli_query($conexion,"SELECT MAX(id_personalizada) FROM $tabla15");

	while ($registroperson=mysqli_fetch_row($nperson)){
	       foreach($registroperson as $claveperson){ 
		   global $claveperson;
	 	}
	 }

$nperson_cliente= mysqli_query($conexion,"SELECT MAX(id_pizza) FROM $tabla15 WHERE id_cliente=$cliente");

	while ($registroperson_cliente=mysqli_fetch_row($nperson_cliente)){
	       foreach($registroperson_cliente as $claveperson_cliente){ 
		   global $claveperson_cliente;
	 	}
	 }



$num_personalizada=$claveperson+1;
$num_person_cliente=$claveperson_cliente+1;

//echo "<br><br><br> ultimo numero de imagen".$num_imagen."<br><br><br>";
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
	$cantidad=1;
	
		
	$campos="id_articulo_pedido,id_articulo,id_familia,cantidad,precio,pedido,cliente,fecha,tamano,bebida,id_estado,ingred1,ingred2,ingred3,ingred4,ingred5,bocamix,bebida_mix,bebida_p2,recogida";
	$datos="'$articulo_pedido','$articulo','$familia','$cantidad','$precio','$id_pedido','$cliente','$fecha','$tamano','$bebida','$id_estado','$n_ingredientes1','$n_ingredientes2','$n_ingredientes3','$n_ingredientes4','$n_ingredientes5','$bocamix_bocata','$bebida_mix','$bebida_p2','$recoger'";

	$sentencia_inserta="INSERT INTO $tabla50 ($campos) VALUES ($datos)";
	
	$inserta=mysqli_query($conexion,$sentencia_inserta);

	header ("Location: http://www.pizzeriabelsay.es/cliente/index.php");

}else{
	
$id_estado=99;
$id_pedido=$consulta_pedido;
$cantidad=1;

$campos="id_articulo_pedido,id_articulo,id_familia,cantidad,precio,pedido,cliente,fecha,tamano,bebida,id_estado,ingred1,ingred2,ingred3,ingred4,ingred5,bocamix,bebida_mix,bebida_p2,recogida";
$datos="'$articulo_pedido','$articulo','$familia','$cantidad','$precio','$id_pedido','$cliente','$fecha','$tamano','$bebida','$id_estado','$n_ingredientes1','$n_ingredientes2','$n_ingredientes3','$n_ingredientes4','$n_ingredientes5','$bocamix_bocata','$bebida_mix','$bebida_p2','$recoger'";

$sentencia_inserta="INSERT INTO $tabla50 ($campos) VALUES ($datos)";

$inserta=mysqli_query($conexion,$sentencia_inserta);

header ("Location: http://www.pizzeriabelsay.es/cliente/index.php");
}
?>