<?php 
include ("../seguridad.php");
include("../includes.php");
include("../../conexion.php"); //Nos conectamos a la base de datos
include("enlaces.php");

$id_solicitud=$_POST['id_solicitud'];
$nombre=strtoupper($_POST['nombre']);
$apellido1=strtoupper($_POST['apellido1']);
$apellido2=strtoupper($_POST['apellido2']);
$dni=strtoupper($_POST['dni']);
$mail=$_POST['mail'];
$pass=$_POST['pass'];
$pass_enc=md5($pass);
$telefono1=$_POST['telefono1'];
$telefono2=$_POST['telefono2'];
$localidad=$_POST['localidad'];
$calle=strtoupper($_POST['calle']);
$numero=$_POST['numero'];
$bloque=$_POST['bloque'];
$puerta=$_POST['puerta'];
$metre=$_POST['metre'];
$ano=$_POST['ano'];
$mes=$_POST['mes'];
$dia=$_POST['dia'];
$diaalta=date("Y-m-d");
$horaalta=date("H:i:s");

if($ano==""){
	$fecha_nacimiento=$_POST['fecha_nacimiento'];
}else{
	$fecha_nacimiento=$ano."-".$mes."-".$dia;
	}


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

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////        	GENERA SI EL MOVIL ES UNICO     ///////////////////////////////////

$prueba_movil= mysqli_query($conexion,"SELECT COUNT(id_usuario) FROM $tabla1 WHERE telefono1='$telefono1'");
	while ($movil2=mysqli_fetch_row($prueba_movil)){
	       foreach($movil2 as $numero_movil){ 
	 	}
	 }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////



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
	exit;
}elseif($numero_mail>0){
	echo "<script>alert('El Correo electronico ya esta en uso');</script>"; 
   echo "<script type=\"text/javascript\">
	   history.go(-1);
      </script>"; 
	exit;
}elseif($numero_movil>0){
	echo "<script>alert('Ese Numero de telefono ya esta en uso');</script>"; 
   echo "<script type=\"text/javascript\">
	   history.go(-1);
      </script>";
	exit;
}else{

?>
<div id="anadir"><a href="alta_clientes.php"><img src="../imagenes/add.gif" border="none"> A&ntilde;adir otro usuario</a></div>
<fieldset>
	<legend><img src="../imagenes/cliente.gif"> DATOS DEL NUEVO USUARIO</legend>
<?php
	
echo "Id: ".$num_usuario."<br>";
echo "ID METRE: ".$metre."<br>";
echo "Nombre: ".$nombre."<br>";
echo "Primer apellido: ".$apellido1."<br>";
echo "Segundo pellido: ".$apellido2."<br>";
echo "DNI: ".$dni."<br>";
echo "Correo: ".$mail."<br>";
echo "Contrase&ntilde;a: ".$pass."<br>";
echo "Movil: ".$telefono1."<br>";
echo "Otro numero: ".$telefono2."<br>";
echo "Localidad: ".$localidad."<br>";
echo "Calle: ".$calle."<br>";
echo "Numero: ".$numero."<br>";
echo "Bloque: ".$bloque."<br>";
echo "Puerta: ".$puerta."<br>";
echo "Fecha de nacimiento: ".$fecha_nacimiento."<br>";
echo "D&iacute;a de alta: ".$diaalta."<br>";
echo "Hora de alta: ".$horaalta."<br><br>";
$imagen=1;//imagen por defecto

$campos="id_usuario,mail,pass,dni,nombre,apellido1,apellido2,calle,numero,telefono1,telefono2,localidad,bloque,puerta,fecha_nacimiento,dia_alta,hora_alta,imagen,id_metre";
$datos="'$num_usuario','$mail','$pass_enc','$dni','$nombre','$apellido1','$apellido2','$calle','$numero','$telefono1','$telefono2','$localidad','$bloque','$puerta','$fecha_nacimiento','$diaalta','$horaalta','$imagen','$metre'";

$inserta=mysqli_query($conexion,"INSERT INTO $tabla1 ($campos) VALUES ($datos)");

if($inserta==1){
	echo "<div id='correcto'>Los datos han sigo introducidos con &eacute;xito en la base de datos</div>";
}else{
	echo "<div id='error'>No ha sido posible insertar los datos en la base de datos</div>";
	}

//$comprueba="INSERT INTO ".$tabla1."(".$campos.") VALUES (".$datos.")";
//echo $comprueba;


$campos="estado_solicitud='3'";

$sentencia="UPDATE $base . `$tabla11` SET $campos WHERE $tabla11 . id_solicitud=$id_solicitud ";
$modifica=mysqli_query($conexion,$sentencia);

////////////////////  FUNCION MAIL    ////////////////////

$destino=$mail;
$remite="From: PizzeriaBelsay@PizzeriaBelsay.es;";

$asunto="Bienvenido a Pizzeria Belsay";

$mensaje="Hola <b>".$nombre.".</b><br><br>";
$mensaje.="Le damos la bienvenida al portal de <b>Pizzeria Belsay</b>.<br><br>";
$mensaje.="Sus claves de acceso son:<br><br>";
$mensaje.="mail: <b>".$mail."</b><br>";
$mensaje.="contrase&ntilde;a: <b>".$pass."</b><br>";
$mensaje.="Su Numero de cliente es: ".$metre. "<br>";
$mensaje.="El numero de cliente tambien te sirve para comprar por telfono. <br>";
$mensaje.="Puede entrar en su perfil para cambiar la contraseña y as&iacute; le resulta mas f&aacute;cil memorizarla.<br><br>";
$mensaje.="Ahora puede disfrutar de los servicios que le ofrecemos. Algunos de ellos son:<br><br>";
$mensaje.="<li> <b>Carrito Permanente</b> - Cualquier producto a&ntilde;adido a su carrito permanecera en el hasta que lo elimine, o hasta que realice la compra.</li><br>";
$mensaje.="<li> <b>Libro de Direcciones</b> - Podemos enviar su pedido a otras direcciones. Esto es perfecto para cuando estas reunido en casa de alg&uacute;n amigo y se os apetece pizza para cenar.</li><br>";
$mensaje.="<li> <b>Historial de Pedidos</b> - Vea los pedidos anteriores y vuelva a perdir lo mismo con un solo click.</li><br>";
$mensaje.="<li> <b>Evita colas y telefonos comunicando.</b> - Podr&aacute;s perdir tu pizza sin tener que esperar colas en la pizzeria o sin tener que esperar a que podamos atender el telefono.<br></li><br>";
$mensaje.="<li> <b>Promociones esclusivas.</b> - En un futuro tambi&eacute;n tendr&aacute;s disfrutar de promociones esclusivas, ofertas, etc. Que podr&aacute;s hacer efectiva desde la web.<br></li><br>";
$mensaje.="Para cualquier consulta sobre nuestros servicios, por favor escriba a: benjumea.jose@gmail.com.<br><br>";
$mensaje.="Nota: Esta direccion fue suministrada por uno de nuestros clientes. Si usted no se ha suscrito como socio, por favor comuniquelo a gesimar.marchena@gmail.com.<br>";

mail($destino, $asunto, $mensaje,'Content-type: text/html');

////////////////////////////

}

?>

</fieldset>
<!--</div>-->
	</td>
	<td></td>
	</table>
<?php contenido2() ?>

<?php pie() ?>