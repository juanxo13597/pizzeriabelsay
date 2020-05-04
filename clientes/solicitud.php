<?php include("../includes.php") ?>
<?php include("../conexion.php"); //Nos conectamos a la base de datos

require_once('../recaptcha/recaptchalib.php');
//Llaves de la captcha
$captcha_publickey = "6LfG08YSAAAAAOEBCahpZkFb15fY5aWIDJxiVdZm?.";
$captcha_privatekey = "6LfG08YSAAAAAIupiFUdrI5DYQGIf0mZ9AoIaNBv? ";
$error_captcha=null;
?>
<head>
<link href="../estilos.css" rel="stylesheet" type="text/css" />
</head>

<body id="estilo_pedido">
<?php cabecera() ?>
<?php encabezado() ?>
<?php enlaces1() ?>
<?php contenido1() ?>
<?php 

if($_POST){
	
	$captcha_respuesta = recaptcha_check_answer ($captcha_privatekey,
	$_SERVER["REMOTE_ADDR"],
	$_POST["recaptcha_challenge_field"],
	$_POST["recaptcha_response_field"]);
 	  if ($captcha_respuesta->is_valid) {
      //todo correcto
      //hacemos lo que se deba hacer una vez recibido el formulario v�lido
      echo "Todo correcto!";


$nombre=strtoupper($_POST['nombre']);
$apellido1=strtoupper($_POST['apellido1']);
$apellido2=strtoupper($_POST['apellido2']);
$dni=strtoupper($_POST['dni']);
$metre=strtoupper($_POST['metre']);
$mail=$_POST['mail'];
//$pass=$_POST['pass'];
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
    
    <fieldset>
	<legend> <img src="../clientes.gif"> </legend>
<?php

echo "<br>DATOS DE LA SOLICITUD DE ALTA<br>";
echo "<br></br>";
echo "Id: ".$num_usuario."<br>";
echo "Nombre: ".$nombre."<br>";
echo "Primer apellido: ".$apellido1."<br>";
echo "Segundo pellido: ".$apellido2."<br>";
echo "DNI: ".$dni."<br>";
echo "ID Cliente: ".$metre."<br>";
echo "Correo: ".$mail."<br>";
//echo "contrase&ntilde;a: ".$pass."<br>";
echo "Movil: ".$telefono1."<br>";
echo "Otro numero: ".$telefono2."<br>";
echo "Calle: ".$calle."<br>";
echo "Numero: ".$numero."<br>";
echo "Bloque: ".$bloque."<br>";
echo "Puerta: ".$puerta."<br>";
echo "Localidad: ".$localidad."<br>";
echo "Fecha de nacimiento: ".$fecha_nacimiento."<br>";
echo "D&iacute;a de alta: ".$diaalta."<br>";
echo "Hora de alta: ".$horaalta."<br><br>";


$campos="id_solicitud,nombre,apellido1,apellido2,dni,id_metre,mail,pass,telefono1,telefono2,calle,numero,bloque,puerta,fecha_nacimiento,dia_alta,hora_alta,estado_solicitud";
$datos="'$num_solicitud','$nombre','$apellido1','$apellido2','$dni','$metre','$mail','$pass','$telefono1','$telefono2','$calle','$numero','$bloque','$puerta','$fecha_nacimiento','$diaalta','$horaalta','1'";


$inserta=mysqli_query($conexion,"INSERT INTO $tabla11 ($campos) VALUES ($datos)");

if($inserta==1){
	echo "<div id='correcto'><b>Los datos han sido introducidos con &eacute;xito en la base de datos. <br>En breve el administrador le dara de alta.</b></br></div>
	<br></br>";
}else{
	echo "<div id='error'>No ha sido posible insertar los datos en la base de datos</div>
	<br></br>";
	}

//$comprueba="INSERT INTO ".$tabla11."(".$campos.") VALUES (".$datos.")";
//echo $comprueba;

}

?>
<?php
	  }else{
      //El c�digo de validaci�n de la imagen est� mal escrito.
?>

    <script language='JavaScript'>
			alert("Has escrito mal el texto. Por favor intentalo de nuevo");
	</script>
    
<?php
      $error_captcha = $captcha_respuesta->error;
	  formulario();
 	  }
}else{
	
formulario();


 } ?>
 
</fieldset>

<?php contenido2() ?>
<?php lateral1() ?>
<?php lateral2() ?>
<?php pie() ?>
<br><br>
</body>
</html>