<?php
	include ("../seguridad.php");
	include("../includes.php");
	include("../../conexion.php"); //Nos conectamos a la base de datos
	include("enlaces.php");
	include("calculos_dias.php");
	include("calculos_semana.php");
	include("calculos_meses.php");
	include("calendario.php");
	include("navegacion.php");
?>

<?php
$fecha=date("Y-m-d");

  if(count($_REQUEST)) foreach($_REQUEST as $name => $val) eval('$' . $name . ' = "' . $val . '";');

  // initialize values
  if(!$graphCreate) {
    $graphType = 'vBar';
    $graphShowValues = 1;
    $graphValues_dias = "$ganancias_dia[6],$ganancias_dia[5],$ganancias_dia[4],$ganancias_dia[3],$ganancias_dia[2],$ganancias_dia[1],$ganancias_dia[0]";
    $graphLabels_dias = "$etiqueta_dia[6],$etiqueta_dia[5],$etiqueta_dia[4],$etiqueta_dia[3],$etiqueta_dia[2],$etiqueta_dia[1],$etiqueta_dia[0]";
    $graphValues_semana = "$ganancias_semana[5],$ganancias_semana[4],$ganancias_semana[3],$ganancias_semana[2],$ganancias_semana[1],$ganancias_semana[0]";
    $graphLabels_semana = 'Semana 1,Semana 2,Semana 3,Semana 4,Semana 5,Semana 6';
    $graphValues_mes = "$ganancias_mes[5],$ganancias_mes[4],$ganancias_mes[3],$ganancias_mes[2],$ganancias_mes[1],$ganancias_mes[0]";
    $graphLabels_mes = "$nombre_mes[5],$nombre_mes[4],$nombre_mes[3],$nombre_mes[2],$nombre_mes[1],$nombre_mes[0]";
    $graphBarWidth = 20;
    $graphBarLength = '1.0';
    $graphLabelSize = 12;
    $graphValuesSize = 12;
    $graphPercSize = 12;
    $graphPadding = 10;
    $graphBGColor = '#777';
    $graphBorder = '1px solid #BBB';
    $graphBarColor = '#ffc452';
    $graphBarBGColor = '#f6ffc2';
    $graphBarBorder = '2px outset #EEE';
    $graphLabelColor = '#000000';
    $graphLabelBGColor = '#ffc452';
    $graphLabelBorder = '2px groove white';
    $graphValuesColor = '#000000';
    $graphValuesBGColor = '#FFFFFF';
    $graphValuesBorder = '2px groove white';
  }
  else {
    if($graphBarWidth == '') $graphBarWidth = 0;
    if($graphBarLength == '') $graphBarLength = 0;
    if($graphLabelSize == '') $graphLabelSize = 0;
    if($graphValuesSize == '') $graphValuesSize = 0;
    if($graphPercSize == '') $graphPercSize = 0;
    if($graphPadding == '') $graphPadding = 0;
  }



?>

<?php encabezado() ?>
<link href="../estilos.css" rel="stylesheet" type="text/css" />

<?php cabecera() ?>
<?php enlacesinternos() ?>
<?php contenido1() ?>


<?php
$fecha=date("Y-m-d");
$hora=date("H:i:s");
?>

<table border="0">

<tr>
	<td valign="top">
	
<?php calendario() ?>
<?php navegacion() ?>


</td>

<td valign="top">

<fieldset id="ventas">

	<legend>Ventas</legend>
	
<!--  oOoOoOoOoOoOoOoOoOoOoOoOoOoOoOoO    CUADRO DE VENTAS   oOoOoOoOoOoOoOoOoOoOoOoOoOoOoOoO  -->

<?php 

$dia=$_GET['dia'];

$dia_desde=$_POST['dia_desde'];
$mes_desde=$_POST['mes_desde'];
$ano_desde=$_POST['ano_desde'];

$dia_hasta=$_POST['dia_hasta'];
$mes_hasta=$_POST['mes_hasta'];
$ano_hasta=$_POST['ano_hasta'];


$fecha1=$ano_desde."-".$mes_desde."-".$dia_desde;
$fecha2=$ano_hasta."-".$mes_hasta."-".$dia_hasta;


//echo "fecha1: ".$fecha1."<br>";
//echo "fecha2: ".$fecha2."<br>";

if($ano_desde==""){
	$fecha1="0000-00-00";
}else{
	echo "Desde: ".$dia_desde."/".$mes_desde."/".$ano_desde." ";
	}

if($ano_hasta==""){
	$fecha2="9999-12-31";
}else{
	echo "Hasta: ".$dia_hasta."/".$mes_hasta."/".$ano_hasta."<br>";
	}

$ssql_terminados="SELECT count(id_estado) FROM `$tabla50` WHERE id_estado=1 AND fecha<='$fecha2' AND fecha>'$fecha1'";
//echo $ssql_terminados."<br>";
$terminados=mysqli_query($conexion,"$ssql_terminados");
$terminados_respuesta=mysqli_fetch_row($terminados);

$anulados=mysqli_query($conexion,"SELECT count(id_estado) FROM `$tabla50` WHERE id_estado=4 AND fecha<='$fecha2' AND fecha>'$fecha1'");
$anulados_respuesta=mysqli_fetch_row($anulados);

$ganancias=mysqli_query($conexion,"SELECT sum(precio) FROM `$tabla50` WHERE id_estado=1 AND fecha<='$fecha2' AND fecha>'$fecha1'");
$ganancias_respuesta=mysqli_fetch_row($ganancias);

$mas_grande=mysqli_query($conexion,"SELECT MAX(precio) FROM `$tabla50` WHERE id_estado=1 AND fecha<='$fecha2' AND fecha>'$fecha1'");
$mas_grande_respuesta=mysqli_fetch_row($mas_grande);

$mas_pequeno=mysqli_query($conexion,"SELECT MIN(precio) FROM `$tabla50` WHERE id_estado=1 AND fecha<='$fecha2' AND fecha>'$fecha1'");
$mas_pequeno_respuesta=mysqli_fetch_row($mas_pequeno);

echo "<br>Total de pedidos terminados: ".$terminados_respuesta[0];
echo "<br>Total de pedidos anulados: ".$anulados_respuesta[0];
echo "<br>Total de ganancias: ";
printf("%.2f", $ganancias_respuesta[0]);
echo " &euro;<br><br>";


?>
<table border="0" id="tabla_estadisticas" align="center">
	<tr>
		<td id="titulo"> </td><td id="titulo">Total de pedidos entregados:</td>
	</tr>
	<tr>
		<td id="titulo">Volumen de ventas: </td><td align="right"> <?php printf("%.2f", $ganancias_respuesta[0]); ?> &euro;</td>
	</tr>
	<tr>
		<td id="titulo">El pedido m&aacute;s grande: </td><td align="right"> <?php printf("%.2f", $mas_grande_respuesta[0]); ?> &euro;</td>
	</tr>
	<tr>
		<td id="titulo">Pedido m&aacute;s peque&ntilde;o: </td><td align="right"> <?php printf("%.2f", $mas_pequeno_respuesta[0]); ?> &euro;</td>
	</tr>

</table>




</fieldset>

<fieldset id="ventas">

	<legend>Ventas de los &uacute;ltimos 7 d&iacute;as</legend>

<br>

<?php
  if($graphValues_dias) {
    include('graphs.inc.php');
    $graph = new BAR_GRAPH($graphType);
    $graph->values = $graphValues_dias;
    $graph->labels = $graphLabels_dias;
    $graph->showValues = $graphShowValues;
    $graph->barWidth = $graphBarWidth;
    $graph->barLength = $graphBarLength;
    $graph->labelSize = $graphLabelSize;
    $graph->absValuesSize = $graphValuesSize;
    $graph->percValuesSize = $graphPercSize;
    $graph->graphPadding = $graphPadding;
    $graph->graphBGColor = $graphBGColor;
    $graph->graphBorder = $graphBorder;
    $graph->barColors = $graphBarColor;
    $graph->barBGColor = $graphBarBGColor;
    $graph->barBorder = $graphBarBorder;
    $graph->labelColor = $graphLabelColor;
    $graph->labelBGColor = $graphLabelBGColor;
    $graph->labelBorder = $graphLabelBorder;
    $graph->absValuesColor = $graphValuesColor;
    $graph->absValuesBGColor = $graphValuesBGColor;
    $graph->absValuesBorder = $graphValuesBorder;
    echo $graph->create();
  }
  else echo '<h4>No values!</h4>';
?>


</fieldset>

<fieldset id="ventas">

	<legend>Ventas semanales</legend>

<br>

<?php
  if($graphValues_semana) {
    $graph = new BAR_GRAPH($graphType);
    $graph->values = $graphValues_semana;
    $graph->labels = $graphLabels_semana;
    $graph->showValues = $graphShowValues;
    $graph->barWidth = $graphBarWidth;
    $graph->barLength = $graphBarLength;
    $graph->labelSize = $graphLabelSize;
    $graph->absValuesSize = $graphValuesSize;
    $graph->percValuesSize = $graphPercSize;
    $graph->graphPadding = $graphPadding;
    $graph->graphBGColor = $graphBGColor;
    $graph->graphBorder = $graphBorder;
    $graph->barColors = $graphBarColor;
    $graph->barBGColor = $graphBarBGColor;
    $graph->barBorder = $graphBarBorder;
    $graph->labelColor = $graphLabelColor;
    $graph->labelBGColor = $graphLabelBGColor;
    $graph->labelBorder = $graphLabelBorder;
    $graph->absValuesColor = $graphValuesColor;
    $graph->absValuesBGColor = $graphValuesBGColor;
    $graph->absValuesBorder = $graphValuesBorder;
    echo $graph->create();
  }
  else echo '<h4>No values!</h4>';
?>


</fieldset>

<fieldset id="ventas">

	<legend>Ventas mensuales</legend>

<br>

<?php
  if($graphValues_mes) {
    $graph = new BAR_GRAPH($graphType);
    $graph->values = $graphValues_mes;
    $graph->labels = $graphLabels_mes;
    $graph->showValues = $graphShowValues;
    $graph->barWidth = $graphBarWidth;
    $graph->barLength = $graphBarLength;
    $graph->labelSize = $graphLabelSize;
    $graph->absValuesSize = $graphValuesSize;
    $graph->percValuesSize = $graphPercSize;
    $graph->graphPadding = $graphPadding;
    $graph->graphBGColor = $graphBGColor;
    $graph->graphBorder = $graphBorder;
    $graph->barColors = $graphBarColor;
    $graph->barBGColor = $graphBarBGColor;
    $graph->barBorder = $graphBarBorder;
    $graph->labelColor = $graphLabelColor;
    $graph->labelBGColor = $graphLabelBGColor;
    $graph->labelBorder = $graphLabelBorder;
    $graph->absValuesColor = $graphValuesColor;
    $graph->absValuesBGColor = $graphValuesBGColor;
    $graph->absValuesBorder = $graphValuesBorder;
    echo $graph->create();
  }
  else echo '<h4>No values!</h4>';
?>


</fieldset>

</tr>

</table>



<?php contenido2() ?>
<?php pie() ?>