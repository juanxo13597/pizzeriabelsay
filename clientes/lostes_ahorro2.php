<?php 

//include ("seguridad.php");
include("../includes.php");
include("../enlaces.php");
include("../conexion.php");
?>

<?php

$cliente=$_SESSION["id"];
$fecha=date(Y."/".m."/".d);
$pag=$_SERVER['PHP_SELF'];
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
$ssql = "select * from `$tabla23` WHERE id_cliente=$cliente";
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
<?php autent2() ?>
<?php centro1() ?>


<table border="0" id="carta">

<tr>
	<td colspan="4" height="30" align="center"><br><div id="titulo_carta">LOTES DE AHORRO</div><br></td>
</tr>

<tr valign="top" align="center">

	<td id="contenedor_seleccion"> 
    <br />
	<div id="descripcion_seleccion">	
		<div id="titulo_seccion">
			LOTE 1 - 18&euro; / 10&euro;
		</div>
			<div id="cuadro_imagen">
		<a href="clientes/productos.php?cond=8">
				<img src="../images_css/lotesahorro1.jpg" border="0">
		</a>
			</div>
	</div>
	</td>

	<td id="contenedor_seleccion"> 
    <br />
	<div id="descripcion_seleccion">	
		<div id="titulo_seccion">
			LOTE 2 - 18&euro; / 10&euro;
		</div>
		<div id="cuadro_imagen">
			<a href="clientes/productos.php?cond=9">
				<img src="../images_css/lotesahorro2.jpg" border="0">
			</a>
		</div>
	</div>
	</td>


</tr>	
<tr valign="top" align="center">

	<td id="contenedor_seleccion"> 
    <br />
	<div id="descripcion_seleccion">	
		<div id="titulo_seccion">
			LOTE 3 - 18&euro; / 10&euro;
		</div>

		<div id="cuadro_imagen">
			<a href="clientes/productos.php?cond=10">
				<img src="../images_css/lotesahorro3.jpg" border="0">
			</a>
		</div>
		
	</div>
	</td>

	<td id="contenedor_seleccion"> 
    <br />
	<div id="descripcion_seleccion">	
		<div id="titulo_seccion">
			LOTE 4 - 18&euro; / 10&euro;
		</div>
			<div id="cuadro_imagen">
				<a href="clientes/productos.php?cond=11">
					<img src="../images_css/lotesahorro4.jpg" border="0">
				</a>
			</div>
	</div>
    <br />
	</td>
</tr>

</table>



<?php centro2() ?>
<?php colDerecha1() ?>

<?php //pedido() ?>

<?php colDerecha2() ?>
<?php pie() ?>
<br><br>