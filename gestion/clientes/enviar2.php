<?php 
include ("../seguridad.php");
include("../includes.php");
include("../../conexion.php"); //Nos conectamos a la base de datos
include("enlaces.php");

$id_solicitud=$_POST['id_solicitud'];
$asunto2=strtoupper($_POST['asunto']);
$mail=$_POST['mail'];
$pass=$_POST['pass'];
$pass_enc=md5($pass);
$telefono1=$_POST['telefono1'];
$telefono2=$_POST['telefono2'];
$comentario=strtoupper($_POST['comentario']);
$numero=$_POST['numero'];
$bloque=$_POST['bloque'];
$puerta=$_POST['puerta'];
$ano=$_POST['ano'];
$mes=$_POST['mes'];
$dia=$_POST['dia'];
$diaalta=date("Y-m-d");
$horaalta=date("H:i:s");

?>

<?php encabezado() ?>
<link href="../estilos.css" rel="stylesheet" type="text/css" />

<?php cabecera() ?>
<?php enlacesinternos() ?>
<?php contenido1() ?>


<table border="0" width="100%">
	<tr>
		<td></td>
		<td widht="800" align="left">
<fieldset>
	<legend><img src="../imagenes/cliente.gif"> Envio mensaje </legend>
<?php
	
echo "Asunto: ".$asunto2."<br>";
echo "<br></br>";
echo "Correo: ".$mail."<br>";
echo "<br></br>";
echo "Comentario: ".$comentario."<br>";

//$comprueba="INSERT INTO ".$tabla1."(".$campos.") VALUES (".$datos.")";
//echo $comprueba;


////////////////////  FUNCION MAIL    ////////////////////

$destino=$mail;
$remite="From: pizzeriabelsay@pizzeriabelsay.es;";

$asunto="Administrador Pizzeria Belsay";

$mensaje.="".$asunto2."<br><br>";

$mensaje="Hola <b>".$mail.".</b><br><br>";

$mensaje.="Pizzeria Belsay le informa:<br></br>".$comentario."<br><br>";

$mensaje.="Para cualquier consulta sobre nuestros servicios, por favor escriba a: benjumea.jose@gmail.com<br><br>";
$mensaje.="Nota: Esta direccion fue suministrada por uno de nuestros clientes. Si usted no se ha suscrito como socio, por favor comuniquelo a benjumea.jose@gmail.com<br>";

mail($destino, $asunto, $mensaje,'Content-type: text/html');

////////////////////////////

?>

</fieldset>
<!--</div>-->
	</td>
	<td></td>
	</table>
<?php contenido2() ?>

<?php pie() ?>