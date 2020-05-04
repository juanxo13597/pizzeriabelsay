<?php
//Inicio la sesión
session_start();
//COMPRUEBA QUE EL USUARIO ESTA AUTENTICADO
if ($_SESSION["autentificado"] == 'si') {
echo "privilegios: ".$_SESSION["privilegios"];
}else{

//si el usuario no está autenticado
//redirigirlo a la página de inicio de sesión
header("Location: ../entrar.php?error='sinauth'");
//salimos de este script
exit();
}
?>