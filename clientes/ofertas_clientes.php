<?php
include ("../seguridad.php");
include("../conexion.php");

if($_GET['idof']==3){
	header ("Location: productos.php?cond=1");
}

include("../includes.php");
include("enlaces.php");


?>

<?php

$cliente=$_SESSION["id"];
$fecha=date(Y."/".m."/".d);
$pag=$_SERVER['PHP_SELF'];

$id_oferta=$_GET['idof'];

$ssql_datos_ofertas="SELECT * FROM $tabla20 WHERE id_oferta=$id_oferta";
$resultado_datos_ofertas = mysqli_query($conexion,$ssql_datos_ofertas);

while ($registro_datos_ofertas=mysqli_fetch_row($resultado_datos_ofertas)){	
	$titulo_oferta=$registro_datos_ofertas[1];
	$descripcion_oferta=$registro_datos_ofertas[2];
	$visible=$registro_datos_ofertas[3];
	$acitva=$registro_datos_ofertas[4];
	$tipo_oferta=$registro_datos_ofertas[5];	
	$familia_oferta=$registro_datos_ofertas[6];
	$articulo_oferta=$registro_datos_ofertas[7];
	$precio_oferta=$registro_datos_ofertas[8];
}
/////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////      PAGINACIÓN     //////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////


$TAMANO_PAGINA = 10;

//examino la página a mostrar y el inicio del registro a mostrar
$pagina = $_GET["pagina"];
if (!$pagina) {
    $inicio = 0;
    $pagina=1;
}
else {
    $inicio = ($pagina - 1) * $TAMANO_PAGINA;
}


//miro a ver el número total de campos que hay en la tabla con esa búsqueda
$ssql = "select * from `$tabla8` WHERE id_usuario=$cliente";
$rs = mysqli_query($conexion,$ssql);
$num_total_registros = mysqli_num_rows($rs);
//calculo el total de páginas
$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);

/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////

?>

<?php cabecera() ?>
<link href="../estilos.css" rel="stylesheet" type="text/css" />
<?php encabezado() ?>
<?php enlaces1() ?>
<?php contenido1() ?>
<?php autent() ?>
<?php centro1() ?>

<?php include("catalogo_ofertas.php") ?>

<?php centro2() ?>
<?php colDerecha1() ?>

<?php pedido() ?>

<?php colDerecha2() ?>
<?php pie() ?>
<br><br>