<?php include("../conexion.php");
	session_start();
	include("../contador.php");

include_once("../includes.php"); ?>
<?php include_once("enlaces.php"); ?>


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
		<a href="productos.php?cond=8">
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
			<a href="productos.php?cond=9">
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
			<a href="productos.php?cond=10">
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
				<a href="productos.php?cond=11">
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

  <?php if($_SESSION['autenticado']=='si'){ ?>
    
		<?php pedido()?>

<?php }?>
		
<?php colDerecha2() ?>
<?php pie() ?>
<br><br>