<?php
include ("../seguridad.php");
include("../includes.php");
include("enlaces.php");
include("../conexion.php");


function generaSelect()
{
	include '../conexion.php';
	// conectar();
	$consulta=mysqli_query($conexion,"SELECT id_ingrediente, nombre FROM $tabla24");
	// desconectar();

	// Voy imprimiendo el primer select compuesto por los paises
	echo "<select name='select1' id='ingrediente2' onChange='cargaContenido(this.id)'>";
	echo "<option value='0'>Elige el ingrediente</option>";
	while($registro=mysqli_fetch_row($consulta))
	{
		
		echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
	}
	echo "</select>";
}



$select_familia=$_GET['cond'];
$url=$_SERVER['PHP_SELF'];  // el nombre y ruta de esta misma pÃ¡gina.
$pag=$url."?".cond."=".$select_familia;



?> 
<?php cabecera() ?>
<link href="../estilos.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="select_dependientes_3_niveles_hotdogs.js"></script>
<?php encabezado() ?>
<?php enlaces1() ?>
<?php contenido1() ?>
<?php autent() ?>
<?php centro1() ?>

<div id="texto_gestion">

<?php
$fecha=date(Y."/".m."/".d);
$i=1;
?>
<form action="personalizar_hotdogs2.php" method="post">
<fieldset id="personalizar">
<legend id="titulo">PERSONALIZA TU HOT-DOGS</legend>
<table border="0">

	<tr>
		<td>Ingrediente 2</td>
		<td><?php generaSelect(); ?></td>
	</tr>
	<tr>
		<td>Ingrediente 3</td>
		<td>
			<select disabled="disabled" name="select2" id="select2">
			<option value="0">Selecciona opci&oacute;n...</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>Ingrediente 4</td>
		<td>
			<select disabled="disabled" name="select3" id="select3">
			<option value="0">Selecciona opci&oacute;n...</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>Ingrediente 5</td>
		<td>
			<select disabled="disabled" name="select4" id="select4">
			<option value="0">Selecciona opci&oacute;n...</option>
			</select>
		</td>
	</tr>
		<tr>
		<td>Ingrediente 5</td>
		<td>
			<select disabled="disabled" name="select5" id="select5">
			<option value="0">Selecciona opci&oacute;n...</option>
			</select>
		</td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" value="pedir"></td>
	</tr>
</table>
<br>
<div class="nota">* Todas nuestras pizzas llevan Tomate, Queso y Oregano.<br></div>
<div class="nota">** Excepto las pizzas con salmorejo o nata que no llevar&aacute;n tomate.</div>
</fieldset>
</div>
</form>


<br>

</td>
<?php centro2() ?>
<?php colDerecha1() ?>

<?php pedido() ?>

<?php colDerecha2() ?>
<?php pie() ?>
<br><br>