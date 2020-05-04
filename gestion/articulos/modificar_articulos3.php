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

if($_POST['nombre_articulo']==""){
	echo "<script>alert('El nombre del articulo es un campo obligatorio');</script>"; 
   echo "<script type=\"text/javascript\">
	   history.go(-1);
      </script>";
	exit;
}elseif($_POST['familia']=="0"){
	echo "<script>alert('La familia es un campo obligatorio');</script>"; 
   echo "<script type=\"text/javascript\">
	   history.go(-1);
      </script>";
	exit;
}elseif($_POST['preciol']==""){
	echo "<script>alert('El precio es un campo obligatorio');</script>"; 
   echo "<script type=\"text/javascript\">
	   history.go(-1);
      </script>";
	exit;
}else{

?>
<fieldset>
	<legend><img src="../imagenes/cliente.gif"> DATOS MODIFICADOS DEL ARTICULO</legend>
<?php

echo "Id: ".$id_articulo."<br>";
echo "Nombre: ".$nombre_articulo."<br>";
echo "Familia: ".$familia."<br>";
echo "Ingredientes: ".$ingredientes."<br>";
echo "Precio L: ".$preciol."<br>";
echo "Precio S: ".$precios."<br>";
echo "Imagen: ".$imagen."<br>";

$campos="nombre='$nombre_articulo', familia='$familia', ingredientes='$ingredientes', preciol='$preciol', precios='$precios', imagen='$imagen'";

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

}

?>

</fieldset>
<!--</div>-->
	</td>
	<td></td>
	</table>
<?php contenido2() ?>

<?php pie() ?>