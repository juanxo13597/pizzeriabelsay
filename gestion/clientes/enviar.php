<?php 
	include ("../seguridad.php");
	//include ("../../../autenticacion");
	include("../includes.php");
	include("../../conexion.php"); //Nos conectamos a la base de datos
	include("enlaces.php");

$anoactual=date(Y);
$inicio=$anoactual-10;
$fin=$anoactual-80;
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

/////////////////////////   GENERAR CONTRASEÑA ALEATORIA    ////////////////////////////////

$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
$cad = "";
for($i=0;$i<6;$i++) {
$cad .= substr($str,rand(0,62),1);
}

?>


<?php

	$usuario_auth=$_SESSION["mail"];
	//echo "usuario1: ".$usuario_auth;
	//echo "<br>usuario2: ".$_SESSION["nombre"];
	

?>
<table border="0" width="100%">
	<tr>
		<td></td>
		<td widht="800" align="center">

<br>
<form action="enviar2.php" method="post">
<table border="0" id="alta_clientes" >
	<tr>
		<td colspan="4" id="titulo_alta_clientes">ENVIAR CORREO AL CLIENTE</td>
	</tr>
	
	<tr>
		<td>Asunto:</td><td><input type="text" name="asunto"> *</td>
	
	</tr>
	<tr>
		<td>Correo electronico:</td><td><input type="text" name="mail"> *</td>
	</tr>
	<tr>
		<td>Comentario:</td><td><textarea name="comentario" cols="100" rows="6"></textarea></td>

	</tr>

	<tr>
		<td colspan="4" align="right"><br><input type="submit" value="Enviar" id="boton"> <input type="reset" value="BORRAR" id="boton"></td>
	</tr>
	
</table>

</form>

	</td>
	<td></td>
	</table>
<?php contenido2() ?>

<?php pie() ?>
