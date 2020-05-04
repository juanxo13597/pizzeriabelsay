<?php 
include ("../seguridad.php");
include("../includes.php");
include("../conexion.php"); //Nos conectamos a la base de datos
include("enlaces.php");

$id_usuario=$_POST['usuario'];

//////////////////////////////////////////////////////////////////////////////////////////
///////////////////     GENERA LA ÚTLIMA IMAGEN INTRODUCIDA         /////////////////////

$nimagen= mysqli_query($conexion,"SELECT MAX(id_imagen) FROM $tabla17");

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


?>

<?php cabecera() ?>
<link href="../estilos.css" rel="stylesheet" type="text/css" />

<?php encabezado() ?>
<?php enlaces1() ?>
<?php contenido1() ?>
<?php autent() ?>
<?php centro1() ?>


<table border="0" width="100%">
	<tr>
		<td></td>
		<td widht="800" align="left">

<fieldset id='cambiar_imagen'>
	<legend>YA PODR&Aacute;S PONER ESTA IMAGEN EN TU PERFIL</legend>
<?php
	
/*
$campos="id_articulo='$num_articulo', imagen='$num_imagen'";

$sentencia="UPDATE $base . `$tabla2` SET $campos WHERE $tabla2 . id_articulo=$num_articulo ";
$modifica=mysqli_query($conexion,$sentencia);
//echo $sentencia;

if($modifica==1){
	echo "<br>Los datos han sido modificados con &eacute;xito en la base de datos";
}else{
	echo "<br>No ha sido posible modificar los datos en la base de datos";
	}
*/
if($_FILES["userfile"]["name"]){
	$foto=1;
	}else{
	$foto=0;
	}
	
$imagen=$_FILES["userfile"]["name"];
//echo "nombre de la imagen".$imagen."joe";

//echo $foto."foto";
if($foto==0){
	header("Location: imagenes.php?error=1");
}else{
	# Cogemos el formato de la imagen
	if ($_FILES["userfile"]["type"]=="image/jpeg" || $_FILES["userfile"]["type"]=="image/pjpeg" || $_FILES["userfile"]["type"]=="image/gif" || $_FILES["userfile"]["type"]=="image/bmp" || $_FILES["userfile"]["type"]=="image/png")
	{
		# Cogemos la anchura y altura de la imagen
		$info=getimagesize($_FILES["userfile"]["tmp_name"]);
//		echo "<BR>anchura: ".$info[0]; //anchura
//		echo "<BR>altura: ".$info[1]; //altura
//		echo "<BR>tipo: ".$info[2]; //1-GIF, 2-JPG, 3-PNG
//		echo "<BR>cadena de texto: ".$info[3]."<br>"; //cadena de texto para el tag <img

		$tipoimg=$_FILES['userfile']['type'];

		# Escapa caracteres especiales
		$imagenEscapes=mysqli_real_escape_string(file_get_contents($_FILES["userfile"]["tmp_name"]));
		//echo "<br>escapes: ".$imagenEscapes;
		# Agregamos la imagen a la base de datos
		if($info[0]>600 OR $info[1]>450){
			header("Location: imagenes.php?error=2");
			}elseif($info[0]<0 OR $info[1]<0){
			echo "No ha seleccionado ninguna imagen";
			}else{
		$agregaimg=mysqli_query($conexion,"INSERT INTO `$tabla17` (id_imagen,anchura,altura,tipo,imagen,id_usuario) VALUES ('$num_imagen',$info[0],$info[1],'$tipoimg','$imagenEscapes','$id_usuario')");

		//echo "Imagen agregada con el id ".$num_imagen."<BR>";
		echo "<img src='imagen_mostrar.php?cod_imagen=".$num_imagen."' width='400' height='300'>";
		}
	}else{
		$error="El formato de archivo tiene que ser JPG, GIF, BMP o PNG.";
	}
}

//$comprueba="INSERT INTO ".$tabla1."(".$campos.") VALUES (".$datos.")";
//echo $comprueba;



?>

</fieldset>
<!--</div>-->
	</td>
	<td></td>
	</table>
<?php centro2() ?>
<?php colDerecha1() ?>

<?php pedido() ?>

<?php colDerecha2() ?>
<?php pie() ?>