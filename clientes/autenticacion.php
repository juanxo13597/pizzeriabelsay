<?php
session_start();
//Conectando a base de datos
	include("../conexion.php"); //Nos conectamos a la base de datos
//$con = mysqli_connect("hostname","username","password","basename")
//or die("<h3>No se ha podido establecer conexión con el servidor.</h3>");
//generando la consulta sobre el usuario y su contrasena

$mail=$_POST['mail'];
$pass=$_POST['pass'];
$pass_enc=md5($pass);

$qr = "SELECT id_usuario, mail, pass, nombre, apellido1, privilegios ";
$qr .= "FROM $tabla1 WHERE mail = '" . $mail;
$qr .= "' AND pass = '" . $pass_enc . "'";
//ejecutando la consulta
$rs = mysqli_query($conexion,$qr);
$row = mysqli_fetch_object($rs);
//verificando si hay un usuario con ese password mediante numrows
$nr = mysqli_num_rows($rs);

if($nr == 1){
//usuario y contraseña válidos
//se define una sesion y se guarda el dato session_start();
$_SESSION["autenticado"] = "si"; 
$_SESSION["usuario"] = $_POST['mail'];
$_SESSION["nombre"]=$row->nombre;
$_SESSION["apellido1"]=$row->apellido1;
$_SESSION["nombreusr"] = $row->nombre . " " . $row->apellido1;
$_SESSION["mail"]=$row->mail;
$_SESSION["privilegios"]=$row->privilegios;
$_SESSION["id"]=$row->id_usuario;


	if($_SESSION["privilegios"]=="1"){
	header ("Location: gestion/pedidos/index.php");
	}elseif($_SESSION['privilegios']=="0"){
		header ("Location: index.php");
	}

}else{
	header ("Location: index.php?error=1");
} 
?>