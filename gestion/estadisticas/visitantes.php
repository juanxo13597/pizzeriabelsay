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

?>



<?php

  if(count($_REQUEST)) foreach($_REQUEST as $name => $val) eval('$' . $name . ' = "' . $val . '";');

  // initialize values
  if(!$graphCreate) {
    $graphType = 'vBar';
    $graphShowValues = 1;
    $graphValues_dias = "$vis_dia[6],$vis_dia[5],$vis_dia[4],$vis_dia[3],$vis_dia[2],$vis_dia[1],$vis_dia[0]";
    $graphValues_diasu = "$vis_diau[6],$vis_diau[5],$vis_diau[4],$vis_diau[3],$vis_diau[2],$vis_diau[1],$vis_diau[0]";
    $graphLabels_dias = "$etiqueta_dia[6],$etiqueta_dia[5],$etiqueta_dia[4],$etiqueta_dia[3],$etiqueta_dia[2],$etiqueta_dia[1],$etiqueta_dia[0]";
    $graphValues_semana = "$vis_semana[5],$vis_semana[4],$vis_semana[3],$vis_semana[2],$vis_semana[1],$vis_semana[0]";
    $graphValues_semanau = "$vis_semanau[5],$vis_semanau[4],$vis_semanau[3],$vis_semanau[2],$vis_semanau[1],$vis_semanau[0]";
    $graphLabels_semana = 'Semana 1,Semana 2,Semana 3,Semana 4,Semana 5,Semana 6';
    $graphValues_visitantes_mes = "$vis_mes[5],$vis_mes[4],$vis_mes[3],$vis_mes[2],$vis_mes[1],$vis_mes[0]";
    $graphValues_unicos_mes = "$unicos_mes[5],$unicos_mes[4],$unicos_mes[3],$unicos_mes[2],$unicos_mes[1],$unicos_mes[0]";
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

	<legend>Visitantes anonimos</legend>
	
<!--  oOoOoOoOoOoOoOoOoOoOoOoOoOoOoOoO    CUADRO DE VENTAS   oOoOoOoOoOoOoOoOoOoOoOoOoOoOoOoO  -->

<?php 

$dia_desde=$_POST['dia_desde'];
$mes_desde=$_POST['mes_desde'];
$ano_desde=$_POST['ano_desde'];

$dia_hasta=$_POST['dia_hasta'];
$mes_hasta=$_POST['mes_hasta'];
$ano_hasta=$_POST['ano_hasta'];


$fecha1=$ano_desde."-".$mes_desde."-".$dia_desde;
$fecha2=$ano_hasta."-".$mes_hasta."-".$dia_hasta;


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

$sentencia_fecha="SELECT COUNT(id_contador) FROM `$tabla16` WHERE usuario='0' AND fecha_entrada<='$fecha2' AND fecha_entrada>'$fecha1'";

$visitantes_total=mysqli_query($conexion,$sentencia_fecha);
$visitantes_total_respuesta=mysqli_fetch_row($visitantes_total);

$unicos_total=mysqli_query($conexion,"SELECT COUNT(DISTINCT(ip_remota)) FROM `$tabla16` WHERE usuario='0' AND fecha_entrada<='$fecha2' AND fecha_entrada>'$fecha1'");
$unicos_total_respuesta=mysqli_fetch_row($unicos_total);

echo "<br>Total de visitantes: ".$visitantes_total_respuesta[0];
echo "<br>Total de visitantes &uacute;nicos: ".$unicos_total_respuesta[0];

?>




</fieldset>

<fieldset id="ventas">

	<legend>Visitantes anonimos de los &uacute;ltimos 7 d&iacute;as</legend>

<br>
Totales
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
<br>
&Uacute;nicos

<?php
  if($graphValues_diasu) {

    $graph = new BAR_GRAPH($graphType);
    $graph->values = $graphValues_diasu;
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

	<legend>Visitantes anonimos semanales</legend>

<br>
Totales
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
<br>
&Uacute;nicos

<?php
  if($graphValues_semanau) {

    $graph = new BAR_GRAPH($graphType);
    $graph->values = $graphValues_semanau;
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

	<legend>Visitantes an&oacute;nimos mensuales</legend>

<br>
Totales
<?php
  if($graphValues_visitantes_mes) {
    $graph = new BAR_GRAPH($graphType);
    $graph->values = $graphValues_visitantes_mes;
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

echo "<br>&Uacute;nicos";
  if($graphValues_unicos_mes) {
    $graph = new BAR_GRAPH($graphType);
    $graph->values = $graphValues_unicos_mes;
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