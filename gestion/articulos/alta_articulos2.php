<?php 
include ("../seguridad.php");
include("../includes.php");
include("../../conexion.php"); //Nos conectamos a la base de datos
include("enlaces.php");

$nombre_articulo=strtoupper($_POST['nombre_articulo']);
$id_familia=$_POST['familia'];
$ingredientes=strtoupper($_POST['ingredientes']);
$precioP=$_POST['precioP'];
$precioM=$_POST['precioM'];
$precioF=$_POST['precioF'];

//////////////////////////////////////////////////////////////////////////////////////////
///////////////////     GENERA LA ÚTLIMA IMAGEN INTRODUCIDA         /////////////////////

$nimagen= mysqli_query($conexion,"SELECT MAX(id) FROM $tabla12");

//echo "<table align=center border=2 id='tabla_consulta'>";

	while ($registroimg=mysqli_fetch_row($nimagen)){
	       foreach($registroimg as $claveimg){ 
//	       echo $claveimg;
		   global $claveimg;
	 	}
	 }

$num_imagen=$claveimg+1;

//echo "<br><br><br> ultimo numero de imagen".$num_imagen."<br><br><br>";

//////////////////////////////////////////////////////////////////////////////////////////


//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////         GENERA NOMBRE FAMLIA       ////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

$consulta_familia=mysqli_query($conexion,"SELECT nombre_familia FROM $tabla5 WHERE id_familia=$id_familia");

while($registro=mysqli_fetch_row($consulta_familia))
	{
		$familia=$registro[0];
	}



//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////				GENERA EL ÚLTIMO ARTICULO       ///////////////////////////

$nusuario= mysqli_query($conexion,"SELECT MAX(id_articulo) FROM $tabla2");

//echo "<table align=center border=2 id='tabla_consulta'>";

	while ($registro=mysqli_fetch_row($nusuario)){
	       foreach($registro as $clave){ 
	       //echo $clave;
	 	}
	 }

$num_articulo=$clave+1;

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

}else{

?>
<div id="anadir"><a href="alta_articulos.php"><img src="../imagenes/add.gif" border="none"> A&ntilde;adir otro articulo</a></div>
<fieldset>
	<legend><img src="../imagenes/cliente.gif"> DATOS DEL NUEVO ARTICULO</legend>
<?php
	
echo "Id: ".$num_articulo."<br>";
echo "Nombre: ".$nombre_articulo."<br>";
echo "Familia: ".$familia."<br>";
echo "Ingredientes: ".$ingredientes."<br>";
echo "Precio P: ".$precioP." &euro;<br>";
echo "Precio M: ".$precioM." &euro;<br>";
echo "Precio F: ".$precioF." &euro;<br>";

$campos="id_articulo,nombre,ingredientes,familia,precioP,precioM,precioF,imagen";
$datos="'$num_articulo','$nombre_articulo','$ingredientes','$id_familia','$precioP','$precioM','$precioF','$num_imagen'";

$inserta=mysqli_query($conexion,"INSERT INTO $tabla2 ($campos) VALUES ($datos)");

if($inserta==1){
	echo "<div id='correcto'><br>Los datos han sido introducidos con &eacute;xito en la base de datos</div>";
}else{
	echo "<div id='error'><br>No ha sido posible insertar los datos en la base de datos</div>";
	}


if (is_uploaded_file($_FILES["userfile"]["tmp_name"]))
{
	# Cogemos el formato de la imagen
	if ($_FILES["userfile"]["type"]=="image/jpeg" || $_FILES["userfile"]["type"]=="image/pjpeg" || $_FILES["userfile"]["type"]=="image/gif" || $_FILES["userfile"]["type"]=="image/bmp" || $_FILES["userfile"]["type"]=="image/png")
	{
		# Cogemos la anchura y altura de la imagen
		$info=getimagesize($_FILES["userfile"]["tmp_name"]);
//		echo "<BR>anchura: ".$info[0]; //anchura
//		echo "<BR>altura: ".$info[1]; //altura
//		echo "<BR>tipo: ".$info[2]; //1-GIF, 2-JPG, 3-PNG
//		echo "<BR>cadena de texto: ".$info[3]; //cadena de texto para el tag <img

		$tipoimg=$_FILES['userfile']['type'];

		# Escapa caracteres especiales
		$imagenEscapes=mysqli_real_escape_string(file_get_contents($_FILES["userfile"]["tmp_name"]));
		//echo "<br>escapes: ".$imagenEscapes;
		# Agregamos la imagen a la base de datos
		$agregaimg=mysqli_query($conexion,"INSERT INTO `$tabla12` (id,anchura,altura,tipo,imagen,enlace) VALUES ('$num_imagen',$info[0],$info[1],'$tipoimg','$imagenEscapes','$num_articulo')");
//		$comprueba="INSERT INTO `$tabla2` (anchura,altura,tipo,imagen,enlace) VALUES ($info[0],$info[1],'$tipoimg','$imagenEscapes','$num_inmueble')";
//		echo $cumprueba;
		# Cogemos el identificador con que se ha guardado

		# Mostramos la imagen agregada

echo "</td><td>";
		echo "Imagen agregada con el id ".$num_imagen."<BR>";
		echo "<img src='../imagen_mostrar.php?id=".$num_imagen."' width='340' height='235'>";
	}else{
		$error="El formato de archivo tiene que ser JPG, GIF, BMP o PNG.";
	}
}else{
	$error="No ha seleccionado ninguna imagen. Se podr&aacute; por defecto el logo de la empresa";
	$num_imagen=0;
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