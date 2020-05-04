<?php
include ("../seguridad.php");
include("../includes.php");
include("enlaces.php");
include("../conexion.php");


?>

<?php

$cliente=$_SESSION["id"];
$fecha=date(Y."/".m."/".d);
$pag=$_SERVER['PHP_SELF'];
$pedido_detalle=$_POST['id_pedido'];

?>

<?php cabecera() ?>
<link href="../estilos.css" rel="stylesheet" type="text/css" />
<?php encabezado() ?>
<?php enlaces1() ?>
<?php contenido1() ?>
<?php autent() ?>
<?php centro1() ?>

<?php 

///////////////////////////////////////////////////////////////////////////////
//////////////////////      SUMATORIO DE PRECIOS    ///////////////////////////

$precio = "SELECT SUM(precio) FROM $tabla14 WHERE pedido='$pedido_detalle' AND cliente='$cliente'";
$sumatorio = mysqli_query($conexion,$precio);
	while($suma=mysqli_fetch_row($sumatorio))
	{
		$total=$suma[0];
	}

///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////
$ssql = "select * from `$tabla14` WHERE cliente=$cliente AND pedido=$pedido_detalle";
$resultado = mysqli_query($conexion,$ssql);
///////////////////////////////////////////////////////////// 

echo "<br>";

echo "<table border='0' id='tabla_personalizadas' width='700'>";

echo "<tr id='cabecera_tabla'> <td> <div id='texto_titulo'> Articulo </div></td> <td colspan='2'><div id='texto_titulo'> Ingredientes </div></td> <td width='100'><div id='texto_titulo'> precio </div></td>";

while ($registro=mysqli_fetch_row($resultado)){

///////////////////////////////////////////////////////////////////////////////
//////////////////////      SABORES DE LOS HELADOS    ///////////////////////////

$ssql_sabor1 = "select nombre from `$tabla2` WHERE id_articulo=$registro[12]";
$resultado_sabor1 = mysqli_query($conexion,$ssql_sabor1);
while ($registro_sabor1=mysqli_fetch_row($resultado_sabor1)){
	$sabor1=$registro_sabor1[0];
}

$ssql_sabor2 = "select nombre from `$tabla2` WHERE id_articulo=$registro[13]";
$resultado_sabor2 = mysqli_query($conexion,$ssql_sabor2);
while ($registro_sabor2=mysqli_fetch_row($resultado_sabor2)){
	$sabor2=$registro_sabor2[0];
}


if($registro[12]!=0){
	$sabores1=" DE ".$sabor1;
}
if($registro[13]!=0){
	$sabores2=" Y ".$sabor2;
}


///////////////////////////////////////////////////////////////////////////////
//////////////////////      NOMBRE FAMILIAS    ///////////////////////////

if($registro[2]==99){
	$familia="PIZZAS";
}else{
$select_familia = mysqli_query($conexion,"select nombre_familia from `$tabla5` WHERE id_familia='".$registro[2]."'");
				while ($nombre_familia=mysqli_fetch_row($select_familia)){
				$familia=$nombre_familia[0];
				}
}

if($registro[3]==1){
$familia=substr($familia,0 ,strlen($familia)-1);
}
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////
//////////////////////      INGREDIENTES PRODUCTOS   ///////////////////////////

if($registro[2]==99){
	$select_nombre = mysqli_query($conexion,"select nombre,ingredientes from `$tabla15` WHERE id_personalizada='".$registro[1]."'");
					while ($nombre_articulo=mysqli_fetch_row($select_nombre)){
					$articulo=$nombre_articulo[0];
					$ingredientes=$nombre_articulo[1];
					}
}else{
	$select_nombre = mysqli_query($conexion,"select nombre,ingredientes from `$tabla2` WHERE id_articulo='".$registro[1]."'");
					while ($nombre_articulo=mysqli_fetch_row($select_nombre)){
					$articulo=$nombre_articulo[0];
					$ingredientes=$nombre_articulo[1];
					}
}

///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////

echo "<tr id='fila_detalles'>";
echo "<td width='200'> ";
echo "<input type='text' value='".$registro[3]."' readonly class='precio'> ";
echo "<span class='familia'>".$familia."</span> ";
echo "<span class='nombre'>".$articulo."</span><br>";
echo "<span class='tamano'>";
	if($registro[9]==1){
	echo "Tama&ntilde;o L";
	}elseif($registro[9]==2){
	echo "Tama&ntilde;o S";
	}else{
	echo " ";
	}
	
	if($registro[8]==1){
	echo "<br>Masa fina";
	}elseif($registro[8]==2){
	echo "<br>Masa normal";
	}elseif($registro[8]==3){
	echo "<br>Masa gorda";
	}else{
	echo " ";
	}
echo "</span>";
echo "</td>";
echo "<td colspan='2'><span class='nombre'>";
echo $ingredientes." ".$sabores1." ".$sabores2;
echo "</span></td>";
echo "<td align='center' class='precio'>";
	printf("%.2f", $registro[4]);
echo " &euro;</td>";
echo "</tr>";
$oferta_pedido=$registro[10];
}

echo "<tr><td colspan='4'><hr></td></tr>";

echo "<tr id='fila_detalles'>";
	echo "<td></td><td></td>";
	echo "<td align='right'>";
	echo "TOTAL: &nbsp;&nbsp;";
	echo "</td>";
	echo "<td align='center' class='total'>";
		printf("%.2f", $total);
	echo " &euro;</td>";
echo "</tr>";

echo "<tr><td colspan='4' align='right'>";
echo "<br>";
echo "<form action='anadir_carro_varios.php' method='post'>";

echo "<input type='hidden' name='pedido' value='$pedido_detalle'>";
echo "<input type='hidden' name='cliente' value='$cliente'>";

if($oferta_pedido==0){
	if($_POST['estado_pedido']!=99){
	echo "<input type='submit' value='quiero este mismo pedido >>'>";
	}
}else{
	echo "*No puedes realizar este mismo pedido porque tiene ofertas aplicadas.";
}
echo "</form>";
echo "</td></tr>";

echo "</table>";



?>

</div>
<br>



<?php centro2() ?>
<?php colDerecha1() ?>

<?php pedido() ?>

<?php colDerecha2() ?>
<?php pie() ?>
<br><br>