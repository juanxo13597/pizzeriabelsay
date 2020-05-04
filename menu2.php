<?php
session_start();
include("includes.php"); ?>
<?php include("conexion.php"); //Nos conectamos a la base de datos

	//include ("../autenticacion");

$select_familia=$_GET['cond'];
$url=$_SERVER['PHP_SELF'];  // el nombre y ruta de esta misma pÃ¡gina.
$pag=$url."?".cond."=".$select_familia;

/////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////      PAGINACIÓN     //////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////


$TAMANO_PAGINA = 100;

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
$ssql = "select * from `$tabla2` WHERE familia='$select_familia' ";
$rs = mysqli_query($conexion,$ssql);
$num_total_registros = mysqli_num_rows($rs);
//calculo el total de páginas
$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);

/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////                  GENERA FAMILIA         //////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

	$consulta_familia=mysqli_query($conexion,"SELECT nombre_familia FROM $tabla5 WHERE id_familia=$select_familia");

	while($nombre_familia=mysqli_fetch_row($consulta_familia))
	{
		$familia=$nombre_familia[0];
	}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////


?> 
<?php cabecera() ?>
<link href="estilos.css" rel="stylesheet" type="text/css" />

<?php encabezado() ?>
<?php enlaces_publico() ?>
<?php contenido1() ?>
<?php autent2() ?>
<?php centro1() ?>

<table border="0" width="100%">


<tr>

	<td> </td>
	<td align="center" valign="top">
	

<div id="texto_gestion">

<?php
echo "<div id='titulo_carta'>".$familia."</div><br>";
if($select_familia==1){
	echo "<table width='580' border='0'><tr><td align='right'>";
	echo "<div id='personaliza'><a href='solicitud.php?error=5'>Personaliza tu pizza</a></div>";
	echo "</td></tr></table>";
}


/////////////////////////////////////////////////////////////
$ssql = "select * from `$tabla2` WHERE familia='$select_familia' limit " . $inicio . "," . $TAMANO_PAGINA;
$resultado = mysqli_query($conexion,$ssql);
/////////////////////////////////////////////////////////////
$fecha=date(Y."/".m."/".d);
$i=1;
echo "<hr>";
while ($registro=mysqli_fetch_row($resultado)){

echo "<table border='0' width='580'><tr>";
echo "<td colspan='3' width='500'>";
echo "<div id='titulo_producto'>".$registro[1]."</div></td>";
echo "<td width='80' align='center' rowspan='2'>";

if($select_familia==1){
	echo "<div id='precio'>L: ";
	printf("%.2f", $registro[4]);
	echo " &euro;</div>";
	echo "<div id='precio'>S: ";
	printf("%.2f", $registro[5]);
	echo " &euro;</div>";
}elseif($select_familia==13){
	echo "<div id='precio'>Entero: ";
	printf("%.2f", $registro[4]);
	echo " &euro;</div>";
	echo "<div id='precio'>1/2: ";
	printf("%.2f", $registro[5]);
	echo " &euro;</div>";
}else{
	echo "<div id='precio'>";
	printf("%.2f", $registro[4]);
	echo " &euro;</div>";

}
echo "</td></tr>";
echo "<tr><td rowspan='1' valign='top'><div id='ingredientes'>".$registro[2]."</div></td></tr>";
echo "<tr>";
$cliente=$_SESSION["id"];
echo "<td colspan='4' align='right'>";
if($select_familia==1){
	echo "<table border='0' id='masa' width='350'>";
	echo "<tr id='titulo'><td>Tipo de masa</td>";
	echo "<td>Tama&ntilde;o</td></tr>";
	echo "<tr><td>";
		echo "Fina<input type='radio' name='masa' value='1'>| ";
		echo "Normal<input type='radio' name='masa' value='2' checked>| ";
		echo "Gorda<input type='radio' name='masa' value='3'>";
	echo "</td>";
	echo "<td>";
		echo "S<input type='radio' name='tamano' value='2'>| ";
		echo "L<input type='radio' name='tamano' value='1' checked>";
	echo "</td></tr>";
	echo "</table>";
	}
echo "<div id='enviar_carro'>";
echo "Cant. <input type='text' name='cantidad' size='2' value='1'> ";
echo " <a href='solicitud.php?error=5'>'<img src='images_css/anadir.gif' border='0'></a></div>";

echo "</td></tr>";
echo "</table>";
echo "<hr>";
}
//cerramos el conjunto de resultado y la conexión con la base de datos
mysqli_free_result($rs);

//muestro los distintos índices de las páginas, si es que hay varias páginas
$pag_anterior=$pagina-1;
$pag_siguiente=$pagina+1;
?>
</div>
<br>



</td>
<td></td>

</tr>

</table>
<?php centro2() ?>
<?php colDerecha1() ?>

<?php colDerecha2() ?>
<?php pie() ?>
<br><br>