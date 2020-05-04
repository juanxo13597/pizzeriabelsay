<?php
include("../conexion.php");

$url=$_SERVER['PHP_SELF'];  // el nombre y ruta de esta misma pÃ¡gina.
$pag=$url."?".idof."=".$id_oferta;

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////                  GENERA FAMILIA         //////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

	$consulta_familia=mysqli_query($conexion,"SELECT nombre_familia FROM $tabla5 WHERE id_familia=$familia_oferta");

	while($nombre_familia=mysqli_fetch_row($consulta_familia))
	{
		$familia=$nombre_familia[0];
	}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////



echo "<br>";
if($tipo_oferta==1){
/////////////////////////////////		TIPO DE OFERTAS 2X1	////////////////////

$ssql = "select * from `$tabla2` WHERE familia='$familia_oferta'";
$resultado = mysqli_query($conexion,$ssql);

echo "<div id='titulo_carta'>".$familia."</div><br>";
if($select_familia==1){
	echo "<table width='580' border='0'><tr><td align='right'>";
	echo "<div id='personaliza'><a href='personalizar.php'>Personaliza tu pizza</a></div>";
	echo "</td></tr></table>";
}

while ($registro=mysqli_fetch_row($resultado)){
echo "<form action='anadir_carro.php' method='POST'>";
echo "<table border='0' width='580'><tr>";
echo "<td rowspan='3' width='100'>Foto</td>";
echo "<td width='400'><div id='titulo_producto'>".$registro[1]."</div></td>";
echo "<td width='80' align='center' rowspan='2'>";

if($select_familia==1){
	echo "<div id='precio'>L: ";
	printf("%.2f", $registro[4]);
	echo " &euro;</div>";
	echo "<div id='precio'>S: ";
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
echo "<td colspan='2' align='right'>";
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
echo "Cant. <input type='text' name='cantidad' size='2' value='2' readonly> ";
echo " <input type='image' src='../images_css/anadir.gif'></div>";

echo "</td></tr>";
echo "</table>";
echo "<hr>";
echo "<input type='hidden' name='id_articulo' value='$registro[0]'>";
echo "<input type='hidden' name='precio' value='$registro[4]'>";
echo "<input type='hidden' name='cliente' value='$cliente'>";
echo "<input type='hidden' name='fecha' value='$fecha'>";
echo "<input type='hidden' name='pagina' value='$pag'>";
echo "<input type='hidden' name='oferta' value='$tipo_oferta'>";
echo "<input type='hidden' name='familia' value='$select_familia'>";
echo "</form>";

}

/////////////////////////////////////////////////////////////////////////////////////
}elseif($id_oferta==2){

/////////////////////////////////		TIPO DE OFERTAS PRECIO ESPECIAL	////////////////////

$ssql = "select * from `$tabla2` WHERE id_articulo='$articulo_oferta'";
$resultado = mysqli_query($conexion,$ssql);

echo "<div id='titulo_carta'>".$familia."</div><br>";
if($select_familia==1){
	echo "<table width='580' border='0'><tr><td align='right'>";
	echo "<div id='personaliza'><a href='personalizar.php'>Personaliza tu pizza</a></div>";
	echo "</td></tr></table>";
}

while ($registro=mysqli_fetch_row($resultado)){
echo "<form action='anadir_carro.php' method='POST'>";
echo "<table border='0' width='580'><tr>";
echo "<td rowspan='3' width='100'>Foto</td>";
echo "<td width='400'><div id='titulo_producto'>".$registro[1]."</div></td>";
echo "<td width='80' align='center' rowspan='2'>";

if($select_familia==1){
	echo "<div id='precio'>L: ";
	printf("%.2f", $registro[4]);
	echo " &euro;</div>";
	echo "<div id='precio'>S: ";
	printf("%.2f", $registro[5]);
	echo " &euro;</div>";
}else{
	echo "<div id='precio'>";
	printf("%.2f", $precio_oferta);
	echo " &euro;</div>";

}
echo "</td></tr>";
echo "<tr><td rowspan='1' valign='top'><div id='ingredientes'>".$registro[2]."</div></td></tr>";
echo "<tr>";
$cliente=$_SESSION["id"];
echo "<td colspan='2' align='right'>";
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
echo " <input type='image' src='../images_css/anadir.gif'></div>";

echo "</td></tr>";
echo "</table>";
echo "<hr>";
echo "<input type='hidden' name='id_articulo' value='$registro[0]'>";
echo "<input type='hidden' name='precio_oferta' value='$precio_oferta'>";
echo "<input type='hidden' name='cliente' value='$cliente'>";
echo "<input type='hidden' name='fecha' value='$fecha'>";
echo "<input type='hidden' name='pagina' value='$pag'>";
echo "<input type='hidden' name='oferta' value='$tipo_oferta'>";
echo "<input type='hidden' name='familia' value='$select_familia'>";
echo "</form>";

}


}
?>