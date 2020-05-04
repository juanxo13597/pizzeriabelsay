<html>

<head>

</head>

<body>


<?php

$paco=$_POST['nombre'];

echo "El nombre es: ".$paco;


?>

<form action="prueba.php" method="post">

nombre <input type="text" name="nombre">
<input type="submit">

</form>

</body>
</html>
