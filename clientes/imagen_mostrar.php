<?php
include("../conexion.php"); //Nos conectamos a la base de datos

# Buscamos la imagen a mostrar.

//////////////////// el id de la imagen esta puesto por defecto en 2, hay que hacer para que salga la imagen del formulario correspondiente////////////////////////
$numero=$_GET['cod_imagen'];
//$numero=2;

$result=mysqli_query($conexion,"SELECT * FROM `$tabla17` WHERE id_imagen=$numero");
$row=mysqli_fetch_array($result);

# Mostramos la imagen
header("Content-type:".$row["tipo"]);
echo $row["imagen"];
?>