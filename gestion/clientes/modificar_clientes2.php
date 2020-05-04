<?php 
	include ("../seguridad.php");
	include("../includes.php");
	include("../../conexion.php"); //Nos conectamos a la base de datos
	include("enlaces.php");

$anoactual=date(Y);
$inicio=$anoactual-10;
$fin=$anoactual-80;

$id_usuario=$_GET['id_usuario'];
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

/////////////////////////////////////////////////////////
$criterio="id_usuario='$id_usuario'";
$ssql = "SELECT * FROM `$tabla1` WHERE ". $criterio;
$resultado = mysqli_query($conexion,$ssql);

//echo $ssql;

while ($registro=mysqli_fetch_row($resultado)){
	$id_usuario=$registro[0];
	$mail=$registro[1];
	$pass=$registro[2];
	$dni=$registro[3];
	$nombre=$registro[4];
	$apellido1=$registro[5];
	$apellido2=$registro[6];
	$calle=$registro[7];
	$numero=$registro[8];
	$telefono1=$registro[9];
	$telefono2=$registro[10];
	$bloque=$registro[11];
	$puerta=$registro[12];
	$privilegios=$registro[13];
	$fecha_nacimiento=$registro[14];
	$dia_alta=$registro[15];
	$hora_alta=$registro[16];
	$metre=$registro[19];
	$ano_nacimiento=substr($fecha_nacimiento,0,4);
	$dia_nacimiento=substr($fecha_nacimiento,8,2);
	$mes_nacimiento=substr($fecha_nacimiento,5,2);
	echo $mes_nacimiento;
}
?>

<table border="0" width="100%">
	<tr>
    
		<td></td>
		<td widht="800" align="center">

<br>
<form action="modificar_clientes3.php" method="post">

<input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
<table border="0" id="alta_clientes" >
	<tr>
		<td colspan="4" id="titulo_alta_clientes">ALTA DE CLIENTES</td>
	</tr>
	<tr>
		<td>Nombre:</td><td><input type="text" name="nombre" size="30" value="<?php echo $nombre; ?>"> *</td>
		<td>Primero apellido:</td><td><input type="text" name="apellido1" value="<?php echo $apellido1; ?>"> *</td>
	</tr>

	<tr>
		<td>Segundo apellido:</td><td><input type="text" name="apellido2" value="<?php echo $apellido2; ?>"></td>
		<td>DNI:</td><td><input type="text" name="dni" value="<?php echo $dni; ?>"></td>
	</tr>
	<tr>
		<td>Correo electronico:</td><td><input type="text" name="mail" value="<?php echo $mail; ?>"> *</td>
		<td>Contrase&ntilde;a:</td><td><input type="text" name="pass" value='<?php echo $cad; ?>'> *</td>
	</tr>
	<tr>
		<td>M&oacute;vil:</td><td><input type="text" name="telefono1" value="<?php echo $telefono1; ?>"></td>
		<td>Otro n&uacute;mero:</td><td><input type="text" name="telefono2" value="<?php echo $telefono2; ?>"></td>
	</tr>
	<tr>
		<td>Calle:</td><td colspan="2"><input type="text" name="calle" size="40" value="<?php echo $calle; ?>"></td>
		<td>N&uacute;mero: <input type="text" name="numero" size="5" value="<?php echo $numero; ?>"></td>
	</tr>
	<tr>
		<td>Bloque:</td><td><input type="text" name="bloque" value="<?php echo $bloque; ?>"></td>
		<td>Puerta:</td><td><input type="text" name="puerta" value="<?php echo $puerta; ?>"></td>
	</tr>
    <tr>
		<td>Localidad:</td><td><input type="text" name="localidad" value="<?php echo $localidad; ?>"></td>
		<td>ID METRE:</td><td><input type="text" name="metre" value="<?php echo $metre; ?>"></td>
	</tr>


	<tr>
		<td colspan="2" align="center">Fecha de nacimiento:</td><td colspan="2"><input type="text" name="fecha_nacimiento" value="<?php echo $fecha_nacimiento; ?>"></td>
	
	</tr>

	<tr>
    
		<td colspan="4" align="right"><br><input type="submit" value="GUARDAR" id="boton"> <a href="?accion=borrar&id=<?php echo $id_borrar; ?>"><input type="button" value="BORRAR" id="boton"></a></td>
	</tr>
	
</table>


</form>

	</td>
	<td></td>
	</table>
<?php contenido2() ?>

<?php pie() ?>
