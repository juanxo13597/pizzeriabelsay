<?php include("../../conexion.php"); //Nos conectamos a la base de datos
	include ("../../seguridad.php");
//	include ("../../autenticacion");

$pag=$_SERVER['PHP_SELF'];  // el nombre y ruta de esta misma pÃ¡gina.
$usuario=$_SESSION["id"];

//////////////////////////////				GENERA EL DATOS DEL CLIENTE       ///////////////////////////

/////////////////////////////////////////////////////////////
$ssql = "select * from `$tabla1` WHERE id_usuario=$usuario";
$resultado = mysqli_query($conexion,$ssql);
/////////////////////////////////////////////////////////////

while ($registro=mysqli_fetch_row($resultado)){
	$id_usuario=$registro[0];
	$mail=$registro[1];
	$pass=$registro[2];
	$id_metre=$registro[3];
	$dni=$registro[4];
	$nombre=$registro[5];
	$apellido1=$registro[6];
	$apellido2=$registro[7];
	$calle=$registro[8];
	$numero_dir=$registro[9];
	$telefono1=$registro[10];
	$telefono2=$registro[11];
}
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////


//////////////////////////////				GENERA EL ÚLTIMO PEDIO       ///////////////////////////

$npedido= mysqli_query($conexion,"SELECT MAX(id_pedido) FROM $tabla8 WHERE id_usuario='$usuario'");

//echo "<table align=center border=2 id='tabla_consulta'>";

	while ($numero=mysqli_fetch_row($npedido)){
	       foreach($numero as $claven){ 
	       //echo $clave;
	 	}
	 }

$pedido=$claven;

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////
//////////////////////      SUMATORIO DE PRECIOS    ///////////////////////////

$precio = "SELECT SUM(precio) FROM $tabla14 WHERE pedido='$pedido' AND cliente='$usuario'";
$sumatorio = mysqli_query($conexion,$precio);
	while($suma=mysqli_fetch_row($sumatorio))
	{
		$total=$suma[0];
	}

///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////

$fecha=date("Y-m-d");
$hora=date("H:i:s");
$ssql = "select * from `$tabla8` WHERE id_usuario='$usuario' AND estado='99'";
$rs = mysqli_query($conexion,$ssql);
$num_total= mysqli_num_rows($rs);

/////////////////////		CUENTA LOS RESULTADOS 		/////////////////////

$ssql_cuenta = "select count(*) from `$tabla14` WHERE pedido='$pedido' AND cliente='$usuario' AND (id_familia='1' OR id_familia='99')";
$resultado_cuenta = mysqli_query($conexion,$ssql_cuenta);

while ($registro_cuenta=mysqli_fetch_row($resultado_cuenta)){
	$cuenta_pedidos=$registro_cuenta[0];
}

if($cuenta_pedidos==0){
	$cantidad_oferta=0;
}elseif($cuenta_pedidos==1){
	$cantidad_oferta=0;
}elseif($cuenta_pedidos==2){
	$cantidad_oferta=1;
}elseif($cuenta_pedidos==3){
	$cantidad_oferta=1;
}elseif($cuenta_pedidos==4){
	$cantidad_oferta=2;
}elseif($cuenta_pedidos==5){
	$cantidad_oferta=2;
}elseif($cuenta_pedidos==6){
	$cantidad_oferta=3;
}elseif($cuenta_pedidos==7){
	$cantidad_oferta=3;
}elseif($cuenta_pedidos==8){
	$cantidad_oferta=4;
}elseif($cuenta_pedidos==9){
	$cantidad_oferta=4;
}elseif($cuenta_pedidos==10){
	$cantidad_oferta=5;
}elseif($cuenta_pedidos==11){
	$cantidad_oferta=5;
}elseif($cuenta_pedidos==12){
	$cantidad_oferta=6;
}elseif($cuenta_pedidos==13){
	$cantidad_oferta=6;
}elseif($cuenta_pedidos==14){
	$cantidad_oferta=7;
}elseif($cuenta_pedidos==15){
	$cantidad_oferta=7;
}elseif($cuenta_pedidos==16){
	$cantidad_oferta=8;
}elseif($cuenta_pedidos==17){
	$cantidad_oferta=8;
}elseif($cuenta_pedidos==18){
	$cantidad_oferta=9;
}elseif($cuenta_pedidos==19){
	$cantidad_oferta=9;
}elseif($cuenta_pedidos==20){
	$cantidad_oferta=10;
}

$ssql_precio = "select precio, id_articulo_pedido from `$tabla14` WHERE pedido='$pedido' AND cliente='$usuario'  AND (id_familia='1' OR id_familia='99') ORDER BY precio LIMIT $cantidad_oferta";
$resultado_precio = mysqli_query($conexion,$ssql_precio);

while ($registro_precio=mysqli_fetch_row($resultado_precio)){
	$cuenta_precio=$registro_precio[0];
	$articulo_modificado=$registro_precio[1];

$precio_nuevo=$cuenta_precio/2;

$campos="precio='$precio_nuevo', oferta='1'";

$sentencia="UPDATE $base . `$tabla14` SET $campos WHERE $tabla14 . id_articulo_pedido=$articulo_modificado";
$modifica=mysqli_query($conexion,$sentencia);
//echo $campos."<br>";
//echo $sentencia."<br>";
}
header ("Location: resumen.php");

////////////////////////////////////////////////////////////////////////////

?>
