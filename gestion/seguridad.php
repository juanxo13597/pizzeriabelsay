<?php
//Inicio la sesión
session_start();
//COMPRUEBA QUE EL USUARIO ESTA AUTENTICADO
if ($_SESSION["privilegios"]=='1') {
}else{

//si el usuario no está autenticado
//redirigirlo a la página de inicio de sesión
header("Location: ../../index.php?error=2");
//salimos de este script
exit();
}
?>