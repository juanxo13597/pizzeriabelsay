<?php 
include ("../seguridad.php");
include("../includes.php");
include("../../conexion.php"); //Nos conectamos a la base de datos
include("enlaces.php");

$id_articulo=$_POST['id_articulo'];
$nombre_articulo=$_POST['nombre_articulo'];
$ingredientes=$_POST['ingredientes'];
$familia=$_POST['familia'];
$preciol=$_POST['preciol'];
$precios=$_POST['precios'];
$imagen=$_POST['imagen'];
$activo=$_POST['activo'];

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

<fieldset>
	<legend><img src="../imagenes/cliente.gif"> DATOS MODIFICADOS DEL ARTICULO</legend>
<?php

echo "Id: ".$id_articulo."<br>";

if ($activo==0){
	echo "ACTIVADO:".$nombre_articulo."<br>";
	echo "<br></br>";
}else{
echo "DESACTIVADO:".$nombre_articulo."<br>";
echo "<br></br>";
}
////////////////////////////////////////////////////
if ($activo==0){
	echo "SU PRODUCTO HA SIDO ACTIVADO";
	echo "<br></br>";
}else{
echo "SU PRODUCTO HA SIDO DESACTIVADO";
echo "<br></br>";
}
/*echo "Nombre: ".$nombre_articulo."<br>";
echo "Familia: ".$familia."<br>";
echo "Ingredientes: ".$ingredientes."<br>";
echo "Precio L: ".$preciol."<br>";
echo "Precio S: ".$precios."<br>";
echo "Imagen: ".$imagen."<br>";*/

$campos="activo='$activo'";

$sentencia="UPDATE $base . `$tabla2` SET $campos WHERE $tabla2 . id_articulo=$id_articulo ";
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