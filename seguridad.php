<?php
//Inicio la sesión
session_start();
//COMPRUEBA QUE EL USUARIO ESTA AUTENTICADO
if ($_SESSION["autenticado"] == "si") {
}else{
header("Location: index.php?error='4'");
//salimos de este script
exit();
}?>