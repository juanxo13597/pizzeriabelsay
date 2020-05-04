<?php
include("../../conexion.php"); //Nos conectamos a la base de datos
$tiempo=$_POST['espera'];

$campos="espera='$tiempo'";

$sentencia="UPDATE $base . `$tabla19` SET $campos";
$modifica=mysqli_query($conexion,$sentencia);
$pagina=$_POST['pagina'];

//echo $sentencia;
//echo $pagina;
header ("Location: $pagina");
exit;
?>