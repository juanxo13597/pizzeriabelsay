<?php 
	include ("../seguridad.php");
	include("../includes.php");
	include("../../conexion.php"); //Nos conectamos a la base de datos
	include("enlaces.php");

$anoactual=date(Y);
$inicio=$anoactual-10;
$fin=$anoactual-80;

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////				GENERA EL ULTIMO ARTICULO       ////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

$nusuario= mysqli_query($conexion,"SELECT MAX(id_articulo) FROM $tabla2");

//echo "<table align=center border=2 id='tabla_consulta'>";

	while ($registro=mysqli_fetch_row($nusuario)){
	       foreach($registro as $clave){ 
	       //echo $clave;
	 	}
	 }

$num_familia=$clave+1;

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////        GENERA LISTADO FAMILIAS      //////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

function generaFamilia()
{
	include("../../conexion.php"); //Nos conectamos a la base de datos
	$consulta=mysqli_query($conexion,"SELECT * FROM $tabla5");
	echo "<select name='familia' id='familia'>";
	echo "<option value='0'>Elige la familia</option>";
	while($registro=mysqli_fetch_row($consulta))
	{
		echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
	}
	echo "</select>";
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

<table border="0" width="100%">
	<tr>
		<td></td>
		<td widht="800" align="center">

<br>
<form ENCTYPE="multipart/form-data" action="alta_articulos2.php" method="post">
<table border="0" id="alta_clientes" >
	<tr>
		<td colspan="2" id="titulo_alta_clientes">ALTA DE ARTICULOS</td>
	</tr>

	<tr>
		<td>Nombre:</td><td><input type="text" name="nombre_articulo"> *</td>
	</tr>

	<tr>
		<td>Familia:</td><td><?php generaFamilia(); ?> *</td>
	</tr>

	<tr>
		<td>Ingredientes:</td><td><textarea name="ingredientes" cols="60" rows="8"></textarea>
	</tr>

	<tr>
		<td>Precio P:</td><td><input type="text" name="precioP"> *</td>
	<tr>

	<tr>
		<td>Precio M:</td><td><input type="text" name="precioM"></td>
	<tr>
    <tr>
		<td>Precio F:</td><td><input type="text" name="precioF"></td>
	<tr>

	<tr>
		<td>Imagen:<br> <div id="consejo">Tama&ntilde;o idoneo 640 * 480 pixeles</div></td><td><INPUT NAME="userfile" TYPE="file"></td>
	</tr>
	<tr>
		<td colspan="2" align="right"><br><input type="submit" value="GUARDAR" id="boton"> <input type="reset" value="BORRAR" id="boton"></td>
	</tr>
	
</table>

</form>

	</td>
	<td></td>
	</table>
<?php contenido2() ?>

<?php pie() ?>