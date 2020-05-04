<?php
session_start();
include_once("includes.php"); ?>
<?php include("conexion.php"); //Nos conectamos a la base de datos
?>

<?php cabecera() ?>
<link href="estilos.css" rel="stylesheet" type="text/css" />
<?php encabezado() ?>
<?php enlaces_publico() ?><!--  HAY QUE PONER LOS ENLACES 2   -->
<?php contenido1() ?>
<?php autent2() ?>
<?php centro1() ?>

<table border="0" id="carta">

<tr>
	<td colspan="4" height="30" align="center"><br><div id="titulo_carta">&iquest;QU&Eacute; QUIERES COMER HOY?</div><br></td>
</tr>

<tr valign="top" align="center">

	<td id="contenedor_seleccion"> 
	<div id="descripcion_seleccion">	
		<div id="titulo_seccion">
			PIZZAS
		</div>
			<div id="cuadro_imagen">
		<a href="menu2.php?cond=1">
				<img src="images_css/pizza2.png" border="0">
		</a>
			</div>
	</div>
	</td>

	<td id="contenedor_seleccion"> 
	<div id="descripcion_seleccion">	
		<div id="titulo_seccion">
			SANDWICHES
		</div>
		<div id="cuadro_imagen">
			<a href="menu2.php?cond=2">
				<img src="images_css/sandwich.png" border="0">
			</a>
		</div>
	</div>
	</td>

	<td id="contenedor_seleccion"> 
	<div id="descripcion_seleccion">	
		<div id="titulo_seccion">
			HOT-DOGS
		</div>
			<div id="cuadro_imagen">
				<a href="menu2.php?cond=3">
					<img src="images_css/hotdog.jpg" border="0">
				</a>
			</div>
	</div>
	</td>

</tr>	
<tr valign="top" align="center">

	<td id="contenedor_seleccion"> 
	<div id="descripcion_seleccion">	
		<div id="titulo_seccion">
			BURGUERS
		</div>

		<div id="cuadro_imagen">
			<a href="menu2.php?cond=4">
				<img src="images_css/burguer.png" border="0">
			</a>
		</div>
		
	</div>
	</td>

	<td id="contenedor_seleccion"> 
	<div id="descripcion_seleccion">	
		<div id="titulo_seccion">
			BAGUETTES
		</div>
			<div id="cuadro_imagen">
				<a href="menu2.php?cond=5">
					<img src="images_css/baguette.png" border="0">
				</a>
			</div>
	</div>
	</td>

	<td id="contenedor_seleccion"> 
	<div id="descripcion_seleccion">	
		<div id="titulo_seccion">
			COMIDA MEXICANA
		</div>
		<div id="cuadro_imagen">
			<a href="menu2.php?cond=8">
				<img src="images_css/mexicana.png" border="0">
			</a>		
		</div>
	</div>
	</td>

</tr>
<tr valign="top" align="center">

	<td id="contenedor_seleccion"> 
	<div id="descripcion_seleccion">	
		<div id="titulo_seccion">
			COMIDA ITALIANA
		</div>
		<div id="cuadro_imagen">
			<a href="menu2.php?cond=7">
				<img src="images_css/italiana.png" border="0">
			</a>
		</div>
	</div>
	</td>

	<td id="contenedor_seleccion"> 
	<div id="descripcion_seleccion">	
		<div id="titulo_seccion">
			ENSALADAS	
		</div>
		<div id="cuadro_imagen">
			<a href="menu2.php?cond=9">
				<img src="images_css/ensaladas.png" border="0">
			</a>
		</div>
	</div>
	</td>

	<td id="contenedor_seleccion"> 
	<div id="descripcion_seleccion">	
		<div id="titulo_seccion">
			POLLOS
		</div>
		<div id="cuadro_imagen">
			<a href="menu2.php?cond=13">
				<img src="images_css/pollos.jpg" border="0">
			</a>
		</div>
	</div>
	</td>

</tr>
<tr valign="top" align="center">

	<td id="contenedor_seleccion"> 
	<div id="descripcion_seleccion">	
		<div id="titulo_seccion">
			PESCAITO FRITO
		</div>
		<div id="cuadro_imagen">
			<a href="menu2.php?cond=16">
				<img src="images_css/pescaito.png" border="0">
			</a>
		</div>
	</div>
	</td>

	<td id="contenedor_seleccion"> 
	<div id="descripcion_seleccion">	
		<div id="titulo_seccion">
			SALSAS
		</div>
		<div id="cuadro_imagen">
			<a href="menu2.php?cond=17">
				<img src="images_css/salsas.jpg" border="0">
			</a>
		</div>
	</div>
	</td>
	
	<td id="contenedor_seleccion"> 
	<div id="descripcion_seleccion">	
		<div id="titulo_seccion">
			Y ADEM&Aacute;S...
		</div>
		<div id="cuadro_imagen">
			<a href="menu2.php?cond=10">
				<img src="images_css/ademas.png" border="0">
			</a>
		</div>
	</div>
	</td>

</tr>

<tr valign="top" align="center">

	<td id="contenedor_seleccion"> 
	<div id="descripcion_seleccion">	
		<div id="titulo_seccion">
			POSTRES
		</div>
		<div id="cuadro_imagen">
			<a href="menu2.php?cond=11">
				<img src="images_css/postres.png" border="0">
			</a>
		</div>
	</div>
	</td>

	<td id="contenedor_seleccion"> 
	<div id="descripcion_seleccion">	
		<div id="titulo_seccion">
			BEBIDAS
		</div>
		<div id="cuadro_imagen">
			<a href="menu2.php?cond=12">
				<img src="images_css/refrescos.jpg" border="0">
			</a>
		</div>
	</div>
	</td>

</tr>

</table>


<?php centro2() ?>
<?php colDerecha1() ?>

<?php colDerecha2() ?>
<?php pie() ?>
<br><br>