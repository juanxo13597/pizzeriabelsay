<?php
	include ("../seguridad.php");
	include("../includes.php");
	include("../../conexion.php"); //Nos conectamos a la base de datos
	include("enlaces.php");


$fecha=date("Y-m-d");	
$id_usuario=$_GET['id_usuario'];

$ssql_gastos = "select sum(precio_total) from `$tabla8` WHERE id_usuario=$id_usuario";
$resultado_gastos = mysqli_query($conexion,$ssql_gastos);

while ($registro_gastos=mysqli_fetch_row($resultado_gastos)){
	$gastos_cliente=$registro_gastos[0];
}

$ssql = "select * from `$tabla1` WHERE id_usuario=$id_usuario";
$resultado = mysqli_query($conexion,$ssql);

while ($registro=mysqli_fetch_row($resultado)){
	$id_usuario=$registro[0];
	$mail=$registro[1];
	$dni=$registro[4];
	$nombre=$registro[5];
	$apellido1=$registro[6];
	$apellido2=$registro[7];
	$calle=$registro[8];
	$numero=$registro[9];
	$telefono1=$registro[10];
	$telefono2=$registro[11];
	$bloque=$registro[12];
	$puerta=$registro[13];
		$ano_nacimiento=substr ("$registro[15]", 0, 4);
		$mes_nacimiento=substr ("$registro[15]", 5, 2);
		$dia_nacimiento=substr ("$registro[15]", 8, 2);
	$fecha_nacimiento=$dia_nacimiento."/".$mes_nacimiento."/".$ano_nacimiento;
		$ano_alta=substr ("$registro[16]", 0, 4);
		$mes_alta=substr ("$registro[16]", 5, 2);
		$dia_alta=substr ("$registro[16]", 8, 2);
	$fecha_alta=$dia_alta."/".$mes_alta."/".$ano_alta;
	$hora_alta=$registro[17];
	$imagen=$registro[18];
}

include("../estadisticas/calculos_dias.php");
include("../estadisticas/calculos_semana.php");
include("../estadisticas/calculos_meses.php");

  if(count($_REQUEST)) foreach($_REQUEST as $name => $val) eval('$' . $name . ' = "' . $val . '";');

  if(!$graphCreate) {
    $graphType = 'vBar';
    $graphShowValues = 1;
    $graphValues_dias = "$ganancias_clientes[6],$ganancias_clientes[5],$ganancias_clientes[4],$ganancias_clientes[3],$ganancias_clientes[2],$ganancias_clientes[1],$ganancias_clientes[0]";
    $graphLabels_dias = "$etiqueta_dia[6],$etiqueta_dia[5],$etiqueta_dia[4],$etiqueta_dia[3],$etiqueta_dia[2],$etiqueta_dia[1],$etiqueta_dia[0]";
    $graphValues_semana = "$clientes_semana[5],$clientes_semana[4],$clientes_semana[3],$clientes_semana[2],$clientes_semana[1],$clientes_semana[0]";
    $graphLabels_semana = 'Semana 1,Semana 2,Semana 3,Semana 4,Semana 5,Semana 6';
    $graphValues_mes = "$clientes_mes[5],$clientes_mes[4],$clientes_mes[3],$clientes_mes[2],$clientes_mes[1],$clientes_mes[0]";
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
<link href="../estilos.css" rel="stylesheet" type="text/css" />
<title><?php echo "CLIENTE: ".$nombre." ".$apellido1." ".$apellido2; ?></title>
</head>
<body>

<table border="0">
<tr>
<td></td>
<td width="643">
<div id="cuerpo_info">


<table border="0" id="contenido_info">
	<tr>
		<td rowspan="3" width="50%">
			<fieldset id="info_usuario">
				<legend>Informaci&oacute;n del usuario</legend>
			<table border="0" width="100%" height="100%">
				<tr>
					<td height="150"><?php echo "<img src='../../clientes/imagen_mostrar.php?cod_imagen=".$imagen."' width='200' height='150' border='1'>"; ?></td>
				</tr>
				<tr>
					<td><?php echo "Id del usuario: <b>".$id_usuario."</b>"; ?></td>
				</tr>
				<tr>
					<td><?php echo "Nombre: <b>".$nombre." ".$apellido1." ".$apellido2."</b>"; ?></td>
				</tr>
				<tr>
					<td><?php echo "Correo electr&oacute;nico: <b>".$mail."</b>"; ?></td>
				</tr>
				<tr>
					<td><?php echo "Tel&eacute;fonos: <b>".$telefono1." / ".$telefono2."</b>"; ?></td>
				</tr>
				<tr>
					<td><?php echo "Direcci&oacute;n: <b>".$calle.", ".$numero." ".$bloque." ".$puerta."</b>"; ?></td>
				</tr>
				<tr>
					<td><?php echo "Fecha de nacimiento: <b>".$fecha_nacimiento."</b>"; ?></td>
				</tr>
				<tr>
					<td><?php echo "Fecha de alta: <b>".$fecha_alta."</b>"; ?></td>
				</tr>
				<tr>
					<td>
						<?php echo "Gastos totales: <b>".$gastos_cliente." &euro;</b>"; ?>
					</td>				
				</tr>
				
			</table>
		</fieldset>
		</td>
		
		<td valign="top" id="estadisticas_clientes">
			<fieldset id="estad_usuario">		
				<legend>&Uacute;ltimos 7 d&iacute;as.</legend>
			
<?php 

 if($graphValues_dias) {
    include('../estadisticas/graphs.inc.php');
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
		</td>	

	</tr>

	<tr>
		<td id="estadisticas_clientes">
			<fieldset id="estad_usuario">
				<legend>&Uacute;ltimas 6 semanas.</legend>
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
		</td>
	</tr>

	<tr>
		<td id="estadisticas_clientes">
			<fieldset id="estad_usuario">
				<legend>&Uacute;ltimos 6 meses.</legend>
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
		</td>
	</tr>
</table>



</div>
</td>

<td></td>
</table>
</body>
</head>