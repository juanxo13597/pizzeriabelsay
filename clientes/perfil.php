<?php 
include ("../seguridad.php");
include("../includes.php");
include("enlaces.php");
include("../conexion.php"); 

$cliente=$_SESSION["id"];
$fecha=date(Y."/".m."/".d);
$pag=$_SERVER['PHP_SELF'];

?>

<?php cabecera() ?>
<link href="../estilos.css" rel="stylesheet" type="text/css" />
<?php encabezado() ?>
<?php enlaces1() ?>
<?php contenido1() ?>
<?php autent2() ?>
<?php centro1() ?>

<?php 
/////////////////////////////////////////////////////////////
$ssql = "select * from `$tabla1` WHERE id_usuario=$cliente";
$resultado = mysqli_query($conexion,$ssql);
/////////////////////////////////////////////////////////////

while ($registro=mysqli_fetch_row($resultado)){
	$id_usuario=$registro[0];
	$mail=$registro[1];
	$pass=$registro[2];
	$id_metre=$registro[3];
	$dni=$registro[3];
	$nombre=$registro[5];
	$apellido1=$registro[5];
	$apellido2=$registro[6];
	$calle=$registro[7];
	$numero=$registro[8];
	$telefono1=$registro[9];
	$telefono2=$registro[10];
	$imagen=$registro[18];
	
$ano=substr ("$registro[15]", 0, 4);
$mes=substr ("$registro[15]", 5, 2);
$dia=substr ("$registro[15]", 8, 2);
	
	$fecha_nacimiento=$dia."/".$mes."/".$ano;

	
}

	if($_GET['msj']=='1'){
		echo "<div id='error'> Error: El nuevo mail que intenta guardar est&aacute; en uso </div>";
	}elseif($_GET['msj']=='2'){
		echo "<div id='bien'> El mail hay sido modificado con &eacute;xito </div>";
	}elseif($_GET['msj']=='3'){
		echo "<div id='error'> Error: El nuevo tel&eacute;fono que intenta guardar est&aacute; en uso </div>";
	}elseif($_GET['msj']=='4'){
		echo "<div id='bien'> El tel&eacute;fono hay sido modificado con &eacute;xito </div>";
	}elseif($_GET['msj']=='5'){
		echo "<div id='error'> La contrase&ntilde;a actual no es correcta </div>";
	}elseif($_GET['msj']=='6'){
		echo "<div id='error'> Los campos nueva contrase&ntilde;a y repetir contrase&ntilde;a deben ser iguales </div>";
	}elseif($_GET['msj']=='7'){
		echo "<div id='bien'> La contrase&ntilde;a ha sido modificada con &eacute;xito</div>";
	}

	

echo "<br>";
echo "<fieldset id='datos'>";
echo "<legend>DATOS PERSONALES</legend>";
echo "<table border='0' width='500'>";

	echo "<tr>";
		echo "<td align='center'><img src='imagen_mostrar.php?cod_imagen=".$imagen."' width='133' height='100' border='1'></td>";
		echo "<td valign='bottom' align='right'>  <div class='boton'><a href='imagenes.php'>Cambiar imagen</a></div></td>";
	echo "</tr>";

	echo "<tr><td colspan='2'><hr></td></tr>";

	echo "<tr>";
		echo "<td id='campo'>* Nombre: </td>";
		echo "<td><input type='text' readonly name='nombre' value='".$nombre."'></td>";
	echo "</tr>";
	
	echo "<tr>";
		echo "<td id='campo'>* Apellidos: </td>";
		echo "<td><input type='text' readonly name='apellido1' value='".$apellido1." ".$apellido2."'> </td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td id='campo'>* DNI: </td>";
		echo "<td><input type='text' readonly name='dni' value='".$dni."'></td>";
	echo "</tr>";
	
	echo "<tr><td colspan='2'><hr></td></tr>";
	echo "<tr><td colspan='2' id='subtitulo'>Cambiar el n&uacute;mero de tel&eacute;fono:</td></tr>";
	echo "<tr>";
		echo "<form action='cambiar.php' method='POST'>";
		echo "<input type='hidden' name='campo' value='telefono'>";
		echo "<td id='campo'>Movil actual: </td>";
		echo "<td><input type='text' name='movil' readonly value='".$telefono1."'></td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td id='campo'>Movil nuevo: </td>";
		echo "<td><input type='text' name='movil_nuevo'></td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td id='campo'>Otro tel&eacute;fono: </td>";
		echo "<td><input type='text' name='telefono2' value='".$telefono2."'></td>";
	echo "</tr>";
	
	echo "<tr>";
		echo "<td colspan='2' align='right'><input type='submit' value='guardar' class='boton'></td>";
		echo "</form>";
	echo "</tr>";
	
	echo "<tr><td colspan='2'><hr></td></tr>";
	echo "<tr><td colspan='2' id='subtitulo'>Cambiar el correo electr&oacute;nico:</td></tr>";
	
	echo "<tr>";
		echo "<form action='cambiar.php' method='POST'>";
		echo "<input type='hidden' name='campo' value='mail'>";
		echo "<td id='campo'>E-mail actual: </td>";
		echo "<td><input type='text' name='mail' readonly value='".$mail."' id='campo_minuscula'></td>";
	echo "</tr>";
	
	echo "<tr>";
		echo "<td id='campo'>E-mail nuevo: </td>";
		echo "<td><input type='text' name='mail_nuevo' id='campo_minuscula'></td>";
	echo "</tr>";
	
	echo "<tr>";
		echo "<td colspan='2' align='right'><input type='submit' value='guardar' class='boton'></td>";
		echo "</form>";
	echo "</tr>";
	
	echo "<tr><td colspan='2'><hr></td></tr>";	
	echo "<tr>";
		echo "<td id='campo'>* Direcci&oacute;n: </td>";
		echo "<td><input type='text' name='calle' readonly value='".$calle." ".$numero."'></td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td id='campo'>* Bloque: </td>";
		echo "<td><input type='text' name='bloque' readonly value='".$bloque."' size='3'></td>";
	echo "</tr>";
	
	echo "<tr>";
		echo "<td id='campo'>* Puerta: </td>";
		echo "<td><input type='text' name='puerta' readonly value='".$puerta."' size='3'></td>";
	echo "</tr>";

	echo "<tr><td colspan='2'><hr></td></tr>";

	echo "<tr>";
		echo "<td id='campo'>* Fecha de nacimiento: </td>";
		echo "<td><input type='text' readonly name='fecha_nacimiento' value='".$fecha_nacimiento."'></td>";
	echo "</tr>";

	echo "<tr><td colspan='2'><hr></td></tr>";
	echo "<tr><td colspan='2' id='subtitulo'>Cambiar la contrase&ntilde;a:</td></tr>";
	
	echo "<tr>";
		echo "<form action='cambiar.php' method='POST'>";
		echo "<input type='hidden' name='campo' value='pass_nueva'>";
		echo "<td id='campo'>Contrase&ntilde;a actual: </td>";
		echo "<td><input type='password' name='pass_antigua' ></td>";
	echo "</tr>";
	
	echo "<tr>";
		echo "<td id='campo'>Nueva contrase&ntilde;a: </td>";
		echo "<td><input type='password' name='pass_nuevo'></td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td id='campo'>Repetir contrase&ntilde;a: </td>";
		echo "<td><input type='password' name='repetir_pass_nuevo'></td>";
	echo "</tr>";
	
	echo "<tr>";
		echo "<td colspan='2' align='right'><input type='submit' class='boton' value='guardar'></td>";
		echo "</form>";
	echo "</tr>";


echo "</table>";
echo "<br><div class='nota'>* Por el buen funcionamiento de la web, algunos de los datos no es posible cambiarlos personalmente, para ello, dirijase al local y el administrador le efectuar&aacute; los cambios.</div><br>";
echo "</div>";


//cerramos el conjunto de resultado y la conexión con la base de datos


//muestro los distintos índices de las páginas, si es que hay varias páginas
?>
</fieldset>
<br>

<?php centro2() ?>
<?php colDerecha1() ?>

<?php pedido() ?>

<?php colDerecha2() ?>
<?php pie() ?>
<br><br>