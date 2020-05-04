<?php 
	include ("../seguridad.php");
	include("../includes.php");
	include("../../conexion.php"); //Nos conectamos a la base de datos
	include("enlaces.php");

$anoactual=date(Y);
$inicio=$anoactual-10;
$fin=$anoactual-80;

$id_articulo=$_GET['id_articulo'];

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////        GENERA LISTADO FAMILIAS      //////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

function generaFamilia()
{
	include("../../conexion.php"); //Nos conectamos a la base de datos
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////


?> 
<?php encabezado() ?>
<link href="../estilos.css" rel="stylesheet" type="text/css" />

<?php cabecera() ?>
<?php enlacesinternos() ?>
<?php contenido1() ?>

		<?php
		if ($_GET['error']=='si'){ 
		echo "<bgcolor=red><div id='error'><b>Error: Falta algun campo obligatorio</b></div>";
		}else{
		echo "Los campos que estan marcados con (*) son datos obligatorios";
		}
		?>

<?php

$criterio="id_articulo='$id_articulo'";
$ssql = "SELECT * FROM `$tabla2` WHERE ". $criterio;
$resultado = mysqli_query($conexion,$ssql);

//echo $ssql;

while ($registro=mysqli_fetch_row($resultado)){
	$id_articulo=$registro[0];
	$nombre_articulo=$registro[1];
	$ingredientes=$registro[2];
	$familia=$registro[3];
	$preciol=$registro[4];
	$precios=$registro[5];
	$imagen=$registro[6];
	
}
?>

<table border="0" width="100%">
	<tr>
		<td></td>
		<td widht="800" align="center">

<br>
<form action="modificar_articulos3.php" method="post">
<input type="hidden" name="id_articulo" value="<?php echo $id_articulo; ?>">
<input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
<table border="0" id="alta_clientes" >
	<tr>
		<td colspan="2" id="titulo_alta_clientes">MODIFICAR ARTICULOS</td>
	</tr>

	<tr>
		<td>Nombre:</td><td><input type="text" name="nombre_articulo" value="<?php echo $nombre_articulo; ?>"> *</td>
	</tr>

	<tr>
		<td>Familia:</td><td>
	<?php 
	$consulta=mysqli_query($conexion,"SELECT * FROM $tabla5");
	echo "<select name='familia' id='familia'>";
	echo "<option value='0'>Elige la familia</option>";
	while($registro_familia=mysqli_fetch_row($consulta))
	{
				echo "<option value='".$registro_familia[0]."'";
				if($registro_familia[0]==$familia){
				echo " selected='selected'";
				}
				echo ">".$registro_familia[1]."</option>";

	}
	echo "</select>";
	?>
		 *</td>
	</tr>

	<tr>
		<td>Ingredientes:</td><td><textarea name="ingredientes"> <?php echo $ingredientes; ?></textarea>
	</tr>

	<tr>
		<td>Precio L:</td><td><input type="text" name="preciol" value="<?php echo $preciol; ?>"> *</td>
	</tr>

	<tr>
		<td>Precio S:</td><td><input type="text" name="precios" value="<?php echo $precios; ?>"> *</td>
	</tr>

	<tr>
		<td>Imagen:</td><td><INPUT type="text" name="imagen" value="<?php echo $imagen; ?>"></td>
	</tr>

		<td colspan="2" align="right"><br><input type="submit" value="GUARDAR" id="boton"> <input type="reset" value="BORRAR" id="boton"></td>
	</tr>
	
</table>

</form>

	</td>
	<td></td>
	</table>
<?php contenido2() ?>

<?php pie() ?>