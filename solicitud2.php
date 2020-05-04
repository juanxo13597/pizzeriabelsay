<?php
session_start();
include("conexion.php"); //Nos conectamos a la base de datos 
?>
<?php

$nombre=strtoupper($_POST['nombre']);
$apellido1=strtoupper($_POST['apellido1']);
$apellido2=strtoupper($_POST['apellido2']);
$dni=strtoupper($_POST['dni']);
$mail=$_POST['mail'];
$pass=$_POST['pass'];
$telefono1=$_POST['telefono1'];
$telefono2=$_POST['telefono2'];
$calle=strtoupper($_POST['calle']);
$numero=$_POST['numero'];
$bloque=$_POST['bloque'];
$puerta=$_POST['puerta'];
$ano=$_POST['ano'];
$mes=$_POST['mes'];
$dia=$_POST['dia'];
$fecha_nacimiento=$ano."-".$mes."-".$dia;
$diaalta=date("Y-m-d");
$horaalta=date("H:i:s");
$nota=$_POST['aviso'];

//////////////////////////////				GENERA LA ULTIMA SOLICITUD       ///////////////////////////

$nsolicitud= mysqli_query($conexion,"SELECT MAX(id_solicitud) FROM $tabla11");

//echo "<table align=center border=2 id='tabla_consulta'>";

	while ($registro=mysqli_fetch_row($nsolicitud)){
	       foreach($registro as $clave){ 
	       //echo $clave;
	 	}
	 }

$num_solicitud=$clave+1;

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
}elseif($_POST['aviso']!="on"){
	echo "<script>alert('Debe aceptar las condiciones de uso');</script>"; 
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
}elseif($numero_metre>0){
	echo "<script>alert('Ese Numero de metre ya esta en uso');</script>"; 
   echo "<script type=\"text/javascript\">
	   history.go(-1);
      </script>"; 
}else{

?>
<?php include("includes.php") ?>
<?php cabecera() ?>
<?php encabezado() ?>
<?php enlaces_publico() ?>
<?php contenido1() ?>
<?php autent() ?>
<?php centro1() ?>

<fieldset id="solicitud_clientes">
	<legend>DATOS DE LA SOLICITUD DE ALTA</legend>
<?php
	
echo "nombre: ".$nombre."<br>";
echo "primer apellido: ".$apellido1."<br>";
echo "segundo pellido: ".$apellido2."<br>";
echo "DNI: ".$dni."<br>";
echo "numero en metre: ".$id_metre."<br>";
echo "correo: ".$mail."<br>";
echo "movil: ".$telefono1."<br>";
echo "otro numero: ".$telefono2."<br>";
echo "calle: ".$calle."<br>";
echo "numero: ".$numero."<br>";
echo "bloque: ".$bloque."<br>";
echo "puerta: ".$puerta."<br>";
echo "Fecha de nacimiento: ".$fecha_nacimiento."<br><br>";
$campos="id_solicitud,nombre,apellido1,apellido2,dni,mail,pass,telefono1,telefono2,calle,numero,bloque,puerta,fecha_nacimiento,dia_alta,hora_alta,estado_solicitud";
$datos="'$num_solicitud','$nombre','$apellido1','$apellido2','$dni','$mail','$pass','$telefono1','$telefono2','$calle','$numero','$bloque','$puerta','$fecha_nacimiento','$diaalta','$horaalta','1'";


$inserta=mysqli_query($conexion,"INSERT INTO $tabla11 ($campos) VALUES ($datos)");

if($inserta==1){
	echo "<div id='correcto'><b>Gracias por darse de alta. En 24 o 48 horas recibir&aacute; su contrase&ntilde;a en su correo electronico.</b><br><br></div>";
}else{
	echo "<div id='error'>No ha sido registrar su solicitud de alta. Por favor, pongase en contacto con el aministrador del portal.</div>";
	}

//$comprueba="INSERT INTO ".$tabla11."(".$campos.") VALUES (".$datos.")";
//echo $comprueba;


}

?>

</fieldset>

<?php centro2() ?>

<?php colDerecha1() ?>
<?php colDerecha2() ?>
<?php pie() ?>

