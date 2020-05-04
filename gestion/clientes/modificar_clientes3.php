<?php 
include ("../seguridad.php");
include("../includes.php");
include("../../conexion.php"); //Nos conectamos a la base de datos
include("enlaces.php");

$id_usuario=$_POST['id_usuario'];
$nombre=$_POST['nombre'];
$apellido1=$_POST['apellido1'];
$apellido2=$_POST['apellido2'];
$dni=$_POST['dni'];
$mail=$_POST['mail'];
$pass=$_POST['pass'];
$telefono1=$_POST['telefono1'];
$telefono2=$_POST['telefono2'];
$calle=$_POST['calle'];
$numero=$_POST['numero'];
$bloque=$_POST['bloque'];
$puerta=$_POST['puerta'];
$metre=$_POST['metre'];
$ano=$_POST['ano'];
$mes=$_POST['mes'];
$dia=$_POST['dia'];
$fecha_nacimiento=$ano."-".$mes."-".$dia;
$diaalta=date("Y-m-d");
$horaalta=date("H:i:s");


/*
//////////////////////////////				GENERA EL ÚLTIMO USUARIO       ///////////////////////////

$nusuario= mysqli_query($conexion,"SELECT MAX(id_usuario) FROM $tabla1");

//echo "<table align=center border=2 id='tabla_consulta'>";

	while ($registro=mysqli_fetch_row($nusuario)){
	       foreach($registro as $clave){ 
	       //echo $clave;
	 	}
	 }

$num_usuario=$clave+1;

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////        	GENERA SI EL DNI ES UNICO     ///////////////////////////////////

$prueba_dni= mysqli_query($conexion,"SELECT COUNT(id_usuario) FROM $tabla1 WHERE dni='$dni'");
	while ($prueba2=mysqli_fetch_row($prueba_dni)){
	       foreach($prueba2 as $numero_dni){ 
	 	}
	 }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////        	GENERA SI EL MAIL ES UNICO     ///////////////////////////////////

$prueba_mail= mysqli_query($conexion,"SELECT COUNT(id_usuario) FROM $tabla1 WHERE mail='$mail'");
	while ($mail2=mysqli_fetch_row($prueba_mail)){
	       foreach($mail2 as $numero_mail){ 
	 	}
	 }
	 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

*/

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
<?php
/*
if($_POST['nombre']==""){
	echo "<script>alert('El nombre es un campo obligatorio');</script>"; 
   echo "<script type=\"text/javascript\">
	   history.go(-1);
      </script>";
	exit;
}elseif($_POST['apellido1']==""){
	echo "<script>alert('El primer apellido es un campo obligatorio');</script>"; 
   echo "<script type=\"text/javascript\">
	   history.go(-1);
      </script>";
	exit;
}elseif($_POST['dni']==""){
	echo "<script>alert('El DNI es un campo obligatorio');</script>"; 
   echo "<script type=\"text/javascript\">
	   history.go(-1);
      </script>";
	exit;
}elseif($_POST['mail']==""){
	echo "<script>alert('El correo electronico es un campo obligatorio');</script>"; 
   echo "<script type=\"text/javascript\">
	   history.go(-1);
      </script>";
	exit;
}elseif($_POST['pass']==""){
	echo "<script>alert('La contrasena es un campo obligatorio');</script>"; 
   echo "<script type=\"text/javascript\">
	   history.go(-1);
      </script>";
	exit;
}elseif($_POST['telefono1']==""){
	echo "<script>alert('Al menos debe poner un numero de movil');</script>"; 
   echo "<script type=\"text/javascript\">
	   history.go(-1);
      </script>";
	exit;
}elseif($numero_dni>0){
	echo "<script>alert('El DNI ya esta en uso');</script>"; 
   echo "<script type=\"text/javascript\">
	   history.go(-1);
      </script>";
}elseif($numero_mail>0){
	echo "<script>alert('El Correo electronico ya esta en uso');</script>"; 
   echo "<script type=\"text/javascript\">
	   history.go(-1);
      </script>"; 
}else{
*/
?>
<fieldset>
	<legend><img src="../imagenes/cliente.gif"> DATOS MODIFICADOS DEL USUARIO</legend>
<?php

echo "id: ".$id_usuario."<br>";
echo "ID METRE: ".$metre."<br>";
echo "nombre: ".$nombre."<br>";
echo "primer apellido: ".$apellido1."<br>";
echo "segundo pellido: ".$apellido2."<br>";
echo "DNI: ".$dni."<br>";
echo "correo: ".$mail."<br>";
echo "contrase&ntilde;a: ".$pass."<br>";
echo "movil: ".$telefono1."<br>";
echo "otro numero: ".$telefono2."<br>";
echo "calle: ".$calle."<br>";
echo "numero: ".$numero."<br>";
echo "bloque: ".$bloque."<br>";
echo "puerta: ".$puerta."<br>";

echo "Fecha de nacimiento: ".$fecha_nacimiento."<br>";



$campos="id_usuario,mail,pass,dni,nombre,apellido1,apellido2,calle,numero,telefono1,telefono2,localidad,bloque,puerta,fecha_nacimiento,dia_alta,hora_alta,id_metre";
$datos="'$num_usuario','$mail','$pass_enc','$dni','$nombre','$apellido1','$apellido2','$calle','$numero','$telefono1','$telefono2','$localidad','$bloque','$puerta','$fecha_nacimiento','$diaalta','$horaalta','$metre'";

$sentencia="UPDATE $datos . `$tabla1` SET $campos WHERE $tabla1 . id_usuario=$id_usuario ";

$modifica=mysqli_query($conexion,$sentencia);
//echo $sentencia;

if($modifica==1){
	echo "<br>Los datos han sido modificados con &eacute;xito en la base de datos";
}else{
	echo "<br>No ha sido posible modificar los datos en la base de datos";
	}

//$comprueba="INSERT INTO ".$tabla1."(".$campos.") VALUES (".$datos.")";
//echo $comprueba;

?>

</fieldset>
<!--</div>-->
	</td>
	<td></td>
	</table>
<?php contenido2() ?>

<?php pie() ?>
