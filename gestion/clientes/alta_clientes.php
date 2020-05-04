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
<form action="alta_clientes2.php" method="post">
<table border="0" id="alta_clientes" >
	<tr>
		<td colspan="4" id="titulo_alta_clientes">ALTA DE CLIENTES</td>
	</tr>
	
	<tr>
		<td>Nombre:</td><td><input type="text" name="nombre"> *</td>
		<td>Primero apellido:</td><td><input type="text" name="apellido1"> *</td>
	</tr>
	<tr>
		<td>Segundo apellido:</td><td><input type="text" name="apellido2"></td>
		<td>DNI:</td><td><input type="text" name="dni"></td>	
	</tr>
	<tr>
		<td>Correo electronico:</td><td><input type="text" name="mail"> *</td>
		<td>Contrase&ntilde;a:</td><td><input type="text" name="pass" value='<?php echo $cad; ?>'> *</td>
	</tr>
	<tr>
		<td>M&oacute;vil:</td><td><input type="text" name="telefono1"></td>
		<td>Otro n&uacute;mero:</td><td><input type="text" name="telefono2"></td>
	</tr>
	<tr>
		<td>Calle:</td><td colspan="2"><input type="text" name="calle" size="40"></td>
		<td>N&uacute;mero: <input type="text" name="numero" size="5"></td>
	</tr>
	<tr>
		<td>Bloque:</td><td><input type="text" name="bloque"></td>
		<td>Puerta:</td><td><input type="text" name="puerta"></td>
	</tr>

	<tr>
		<td colspan="4" align="center">Fecha de nacimiento: 
			<select name="dia"> <?php for ($i=1;$i<32;$i++){
				echo "<option>$i</option>";
				} ?>		
			</select>
		<select name="mes">
		
		<?php 
		
			$j[1]="Enero";
			$j[2]="Febrero";
			$j[3]="Marzo";
			$j[4]="Abril";
			$j[5]="Mayo";
			$j[6]="Junio";
			$j[7]="Julio";
			$j[8]="Agosto";
			$j[9]="Septiembre";
			$j[10]="Octubre";
			$j[11]="Noviembre";
			$j[12]="Diciembre";

			for ($i=1;$i<13;$i++){
				?> <option value=<?php echo $i; ?> > <?php echo $j[$i]; ?> </option>;
			<?php 
			}			
	  ?>
			</select>

			<select name="ano">
				<?php	for ($i=$inicio;$i>$fin;$i--){
				echo "<option value=".$i.">".$i."</option>";
					}
				?>
			</select>
		
		
		</td>
	
	</tr>
	
	<tr>
		<td colspan="4" align="right"><br><input type="submit" value="GUARDAR" id="boton"> <input type="reset" value="BORRAR" id="boton"></td>
	</tr>
	
</table>

</form>

	</td>
	<td></td>
	</table>
<?php contenido2() ?>

<?php pie() ?>
