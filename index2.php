<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
<?php	//include ("seguridad.php"); ?>
<?php include_once("includes.php"); ?>
<?php include("conexion.php"); //Nos conectamos a la base de datos

//	include ("../autenticacion");
	include("contador.php");
?>

<?php cabecera() ?>
<link href="../estilos.css" rel="stylesheet" type="text/css" />
<?php encabezado() ?>
<?php enlaces1() ?><!--  HAY QUE PONER LOS ENLACES 2   -->
<?php contenido1() ?>
<?php autent2() ?>
<?php centro1() ?>

<table border="0" id="carta">

<tr>
	<td colspan="4" height="30" align="center"><br><div id="titulo_carta">&iquest;QU&Eacute; QUIERES COMER HOY?</div><br></td>
</tr>

<tr valign="top" align="center">

	<td id="contenedor_seleccion"> 
    <br />
	<div id="descripcion_seleccion">	
		<div id="titulo_seccion">
			PIZZAS
		</div>
			<div id="cuadro_imagen">
		<a href="clientes/productos.php?cond=1">
				<img src="../images_css/pizza2.png" border="0">
		</a>
			</div>
	</div>
	</td>

	<td id="contenedor_seleccion"> 
    <br />
	<div id="descripcion_seleccion">	
		<div id="titulo_seccion">
			CHAPATA
		</div>
		<div id="cuadro_imagen">
			<a href="clientes/productos.php?cond=2">
				<img src="../images_css/chapata.jpg" border="0">
			</a>
		</div>
	</div>
	</td>

	<td id="contenedor_seleccion"> 
    <br />
	<div id="descripcion_seleccion">	
		<div id="titulo_seccion">
			ROSCA
		</div>
			<div id="cuadro_imagen">
				<a href="clientes/productos.php?cond=3">
					<img src="../images_css/rosca.jpg" border="0">
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
			PANNINIS
		</div>

		<div id="cuadro_imagen">
			<a href="clientes/productos.php?cond=4">
				<img src="../images_css/panninis.jpg" border="0">
			</a>
		</div>
		
	</div>
	</td>

	<td id="contenedor_seleccion"> 
    <br />
	<div id="descripcion_seleccion">	
		<div id="titulo_seccion">
			HOT DOG
		</div>
			<div id="cuadro_imagen">
				<a href="clientes/productos.php?cond=5">
					<img src="../images_css/hotdog.jpg" border="0">
				</a>
			</div>
	</div>
	</td>

	<td id="contenedor_seleccion"> 
 	   <br />
	<div id="descripcion_seleccion">	
		<div id="titulo_seccion">
			BOCATAS
			
		</div>
		<div id="cuadro_imagen">
			<a href="clientes/productos.php?cond=7">
				<img src="../images_css/baguette.png" border="0">
			</a>
		</div>
	</div>
    <br />
	</td>

</tr>
<tr valign="top" align="center">
<td id="contenedor_seleccion">

	    <br />
	<div id="descripcion_seleccion">	
		<div id="titulo_seccion">
			ENSALADAS 
			
		</div>
		<div id="cuadro_imagen">
			<a href="clientes/productos.php?cond=8">
				<img src="../images_css/ensalada.jpg" border="0">
			</a>
		</div>
	</div>
    <br />
 
	

</td>

    
    <td id="contenedor_seleccion"> 
    <br />
	<div id="descripcion_seleccion">	
		<div id="titulo_seccion">
			PATATAS 
			
		</div>
		<div id="cuadro_imagen">
			<a href="clientes/productos.php?cond=9">
				<img src="../images_css/patatas.jpg" border="0">
			</a>
		</div>
	</div>
    <br />
	</td>
    
        <td id="contenedor_seleccion"> 
		  <br />
	<div id="descripcion_seleccion">	
		<div id="titulo_seccion">
			POSTRES
			
		</div>
		<div id="cuadro_imagen">
			<a href="clientes/productos.php?cond=11">
				<img src="../images_css/postres.jpg" border="0">
			</a>
		</div>
	</div>
    <br />
		</td>

</tr>

<tr valign="top" align="center">
<td id="contenedor_seleccion">

	    <br />
    <div id="descripcion_seleccion">	
		<div id="titulo_seccion">
			SANDWICHS
			
		</div>
		<div id="cuadro_imagen">
			<a href="clientes/productos.php?cond=18">
				<img src="../images_css/sandwich.png" border="0">
			</a>
		</div>
	</div>

    <br />
  
	

</td>

    
    <td id="contenedor_seleccion"> 
  <br />
	<div id="descripcion_seleccion">	
		<div id="titulo_seccion">
			HAMBURGESAS 
			
		</div>
		<div id="cuadro_imagen">
			<a href="clientes/productos.php?cond=17">
				<img src="../images_css/burguer.png" border="0">
			</a>
		</div>
	</div>
    <br />
	</td>
    
    <td id="contenedor_seleccion"> 
     <br />
	<div id="descripcion_seleccion">	
		<div id="titulo_seccion">
			BEBIDAS
		</div>
		<div id="cuadro_imagen">
			<a href="clientes/productos.php?cond=10">
				<img src="../images_css/bebida.jpg" border="0">
			</a>
		</div>
	</div>
    <br />
	</td>

</tr>


</table>


<?php centro2() ?>
<?php colDerecha1() ?>
    
    
		<?php //pedido()?>


<?php colDerecha2() ?>


<?php pie() ?>
<br><br>