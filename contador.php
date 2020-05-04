<?php

//////////////////////////////			GENERA EL ÚLTIMO PEDIDO DEL CLIENTE      ///////////////////////////

$nregistro= mysqli_query($conexion,"SELECT MAX(id_contador) FROM $tabla16");

	while ($registro=mysqli_fetch_row($nregistro)){
	       foreach($registro as $clave){ 
	       //echo $clave;
	 	}
	 }

$id_contador=$clave+1;

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

$ip = $_SERVER['REMOTE_ADDR'];
$fecha=date("Y-m-d");
$hora=date("H:i:s");
//include ("autenticacion.php");
if($_SESSION["autenticado"]!="si"){
	$_SESSION["id"]="0";
}else{
	//echo "usuario: ".$_SESSION["id"];
}


$usuario=$_SESSION["id"];

$campos='id_contador,ip_remota,fecha_entrada,hora_entrada,usuario';
$valores="$id_contador,'$ip','$fecha','$hora','$usuario'";

$sentencia="INSERT INTO $tabla16 ($campos) VALUES ($valores)";
$anadir_contador=mysqli_query($conexion,"$sentencia");

?>