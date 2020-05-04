<?php
session_start();
$_SESSION = array();
session_destroy();
header ("Location: ../index.php");
?>
<html>
<head>
<title>Contenido no seguro</title>
</head>

<body>
Ahora estás fuera de la aplicación segura.
<br>
<br>
<?php

?>
</body>