<?php
include("../conexion.php");
include ("../seguridad.php");

$imagen=$_GET['imagen'];
$usuario=$_SESSION['id'];

//echo $imagen;

$ssql="UPDATE `$base`.`$tabla1` SET `imagen` = '$imagen' WHERE `$tabla1`.`id_usuario` =$usuario";
$modifica=mysqli_query($conexion,$ssql);
//echo $ssql;

header("Location: perfil.php");

?>