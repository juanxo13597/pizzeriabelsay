<?php 
	include ("../seguridad.php");
	include("../includes.php");
	include("../../conexion.php"); //Nos conectamos a la base de datos
	include("enlaces.php");

$anoactual=date(Y);
$inicio=$anoactual-10;
$fin=$anoactual-80;
$id_articulo=$_GET['id'];

//////////////////////////////////////////////////////////////////////////////////////////
///////////////////     GENERA LA �TLIMA IMAGEN INTRODUCIDA         /////////////////////

$nimagen= mysqli_query($conexion,"SELECT MAX(id) FROM $tabla12");

//echo "<table align=center border=2 id='tabla_consulta'>";

	while ($registroimg=mysqli_fetch_row($nimagen)){
	       foreach($registroimg as $claveimg){ 
//	       echo $claveimg;
		   global $claveimg;
	 	}
	 }

$num_imagen=$claveimg+1;

//echo "<br><br><br> ultimo numero de imagen".$num_imagen."<br><br><br>";

//////////////////////////////////////////////////////////////////////////////////////////


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
<form ENCTYPE="multipart/form-data" action="alta_imagenes2.php" method="post">
<table border="0" id="alta_clientes" >
	<tr>
		<td colspan="2" id="titulo_alta_clientes">ALTA DE IMAGENES</td>
	</tr>

	<tr>
		<td>ID articulo:</td><td><input type="text" name="id_articulo" value="<?php echo $id_articulo; ?>"> *</td>
	</tr>

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
