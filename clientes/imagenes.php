<?php
include ("../seguridad.php");
include("../conexion.php"); 

	if ($_GET['accion']=="borrar"){
	$id_borrar= $_GET['id'];
	mysqli_query($conexion,"DELETE FROM $tabla17 WHERE id_imagen='$id_borrar'") or die(mysqli_error($conexion));
	mysqli_close($conexion);
	header ("Location: imagenes.php");
//	exit;
}


include("../includes.php");
include("enlaces.php");

?>

<?php cabecera() ?>
<link href="../estilos.css" rel="stylesheet" type="text/css" />
<?php encabezado() ?>
<?php enlaces1() ?><!--  HAY QUE PONER LOS ENLACES 2   -->
<?php contenido1() ?>
<?php autent() ?>
<?php centro1() ?>
<?php

$cliente=$_SESSION["id"];

/////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////      PAGINACIÓN     //////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////


$TAMANO_PAGINA = 10;

//examino la página a mostrar y el inicio del registro a mostrar
$pagina = $_GET["pagina"];
if (!$pagina) {
    $inicio = 0;
    $pagina=1;
}
else {
    $inicio = ($pagina - 1) * $TAMANO_PAGINA;
}


//miro a ver el número total de campos que hay en la tabla con esa búsqueda
$ssql = "select * from `$tabla17` WHERE id_usuario='$cliente' ";
$rs = mysqli_query($conexion,$ssql);
$num_total_registros = mysqli_num_rows($rs);
//calculo el total de páginas
$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);

/////////////////////////////////////////////////////////////
$ssql = "select id_imagen from `$tabla17` WHERE id_usuario='$cliente' limit " . $inicio . "," . $TAMANO_PAGINA;
$resultado = mysqli_query($conexion,$ssql);
/////////////////////////////////////////////////////////////
//echo $ssql;
while ($registro=mysqli_fetch_row($resultado)){
	$foto[]=$registro[0];
}

//echo "numero imagen".$foto[3];
/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
?>

<form ENCTYPE="multipart/form-data" action="imagenes2.php" method="POST">
<table border='0' id='cambiar_imagen'>

	<tr>
		<td> <span class='titulo'>Elige una foto.</span><hr></td>
	</tr>
	
	<tr>
		<td class='texto'>Sube una foto.</td>
	</tr>
	
	<tr>
		<td><INPUT NAME="userfile" TYPE="file"></td>
	</tr>

	<tr>
		<td class='texto'>o selecciona una anterior (<?php echo $num_total_registros ?>).</td>
	</tr>
	
	<tr>
		<td>
		
		<table border='0' width='100%'>
			<tr>
<?php
	for($i=0;$i<=4;$i++){
		if($foto[$i]==0){
		echo " ";
		}else{
		echo "<td><a href='selecciona_imagen.php?imagen=".$foto[$i]."'><img src='imagen_mostrar.php?cod_imagen=".$foto[$i]."' width='100' height='75' border='1'></a><br>";
		echo "<a href='?accion=borrar&id=$foto[$i]'><img src='../images_css/delete2.gif' name='borrar' alt='borrar' border='0'></a></td>";
		}
	}
?>			
			</tr>		
		
			<tr>
<?php
	for($i=5;$i<=9;$i++){
		if($foto[$i]==0){
		echo " ";
		}else{
		echo "<td><a href='selecciona_imagen.php?imagen=".$foto[$i]."'><img src='imagen_mostrar.php?cod_imagen=".$foto[$i]."' width='100' height='75' border='1'></a><br>";
		echo "<a href='?accion=borrar&id=$foto[$i]'><img src='../images_css/delete2.gif' name='borrar' alt='borrar' border='0'></a></td>";
		}
	}
?>
			
			</tr>
		</table>
		
		</td>
	</tr>

	<tr>
		<td align='center'>

<?php
$pag_anterior=$pagina-1;
$pag_siguiente=$pagina+1;
?>
		
<table border="0" id='paginacion'>
<tr>
	<td align="left">

<?php
if($total_pagina==0){
echo " ";
}else{

if($pagina==1){
echo "<div class='inactivo'><<</div>";
}else{
echo "<a href='imagenes.php?pagina=".$pag_anterior."'><div class='boton'><<</div></a>";
}
echo "</td>";

echo "<td align='center'>";

if ($total_paginas > 1){
    for ($i=1;$i<=$total_paginas;$i++){
       if ($pagina == $i)
          //si muestro el índice de la página actual, no coloco enlace
          echo $pagina . " ";
       else
          //si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página
          echo "<a href='imagenes.php?pagina=" . $i . "'class=izquierda>" . $i . "</a> ";
    }
} 

?>
</td>

<td align="right">
	<?php

if($pagina==$total_paginas){
echo "<div class='inactivo'>>></div>";
}else{
	echo "<a href='imagenes.php?pagina=".$pag_siguiente."'><div class='boton'>>></div></a>";
}
}
?>
</td>
</table>
		
		<hr></td>
	</tr>
	
	<tr>
	<input type='hidden' name='usuario' value='<?php echo $_SESSION['id']; ?>'>
		<td align='right'><input type="submit" value="enviar" /></td>
	</tr>
	<?php
	$error=$_GET['error'];
	if($error==1){
	echo	"<tr>";
	echo "<td align='center' id='error'>Debe seleccionar una imagen</td>";
	echo "</tr>";
	}elseif($error==2){
	echo	"<tr>";
	echo "<td align='center' id='error'>";
	echo "El tama&ntilde;o de la imagen no debe de sobrepasar los 600 px de ancho ni los 450 px de alto<br>";
	echo "Por favor, utilice un programa de tratamiento de imagenes como GIMP o photoshop para redimensionarla y vuelta a intentarlo";
	echo "</td></tr>";
	}else{
	echo " ";
	}
	?>
</table>

</form>




<?php centro2() ?>
<?php colDerecha1() ?>

<?php pedido() ?>

<?php colDerecha2() ?>
<?php pie() ?>
<br><br>