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
$ssql = "select * from `$tabla15` WHERE id_cliente=$cliente";
$rs = mysqli_query($conexion,$ssql);
$num_total_registros = mysqli_num_rows($rs);
//calculo el total de páginas
$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);

/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////

?>

<?php cabecera() ?>
<link href="../estilos.css" rel="stylesheet" type="text/css" />
<?php encabezado() ?>
<?php enlaces1() ?>
<?php contenido1() ?>
<?php autent() ?>
<?php centro1() ?>

<?php 
//echo $cliente;
/////////////////////////////////////////////////////////////
$ssql = "select * from `$tabla15` WHERE id_cliente=$cliente limit " . $inicio . "," . $TAMANO_PAGINA;
$resultado = mysqli_query($conexion,$ssql);

$cuentassql="select COUNT(id_personalizada) from `$tabla15` WHERE id_cliente=$cliente";
$resultadocuenta=mysqli_query($conexion,$ssql);
$numero_personalizadas=mysqli_fetch_row($resultadocuenta);

/////////////////////////////////////////////////////////////
if($numero_personalizadas[0]==0){
	echo "<div id='no_resultados'>";
	echo "Aun no tienes pizzas personalizadas<br>";
	echo "Puedes empezar a configurar las pizzas a tu gusto haciendo click <a href='personalizar.php'>aqu&iacute;</a>";
	echo "</div>";
}else{

echo "<br>";
echo "<div id='titulo_carta'>PIZZAS PERSONALIZADAS</div><br>";
echo "<table border='0' id='tabla_personalizadas' width='600'>";


$i=1;
while ($registro=mysqli_fetch_row($resultado)){
echo "<tr><td colspan='4'><hr id='linea_personalizadas'></td></tr>";
$i++;
if($i%2==0){
	$estilo="fila_par";
}else{
	$estilo="fila_impar";
	}

		echo "<tr'>";
			echo "<td><div id='titulo_producto'>".$registro[3]."</div></td>";
			echo "<td rowspan='1' valign='top'><div id='ingredientes'>&nbsp;".$registro[4]."</div></td>";
			
			echo "<td align='right'><div id='precio'>S: ";
			printf("%.2f", $registro[6]);
			echo" &euro;</div>";
			echo "<div id='precio'>L: ";
			printf("%.2f", $registro[7]);
			echo" &euro;</div></td>";

	 echo "</tr>";
echo "<form action='anadir_carro.php' method='POST'>";
echo "<input type='hidden' name='id_articulo' value='$registro[0]'>";
echo "<input type='hidden' name='cliente' value='$cliente'>";
echo "<input type='hidden' name='fecha' value='$fecha'>";
echo "<input type='hidden' name='pagina' value='$pag'>";
echo "<input type='hidden' name='familia' value='99'>";

echo "<tr>";

echo "<td colspan='2'>";

	echo "<table border='0' id='masa' width='100%'>";
	echo "<tr id='titulo'><td>&nbsp;&nbsp;Tipo de masa</td>";
	echo "<td>Tama&ntilde;o</td></tr>";
	echo "<tr><td>";
		echo "&nbsp;&nbsp;Fina<input type='radio' name='masa' value='1'>| ";
		echo "Normal<input type='radio' name='masa' value='2' checked>| ";
		echo "Gorda<input type='radio' name='masa' value='3'>";
	echo "</td>";
	echo "<td>";
		echo "S<input type='radio' name='tamano' value='2'>| ";
		echo "L<input type='radio' name='tamano' value='1' checked>";
	echo "</td></tr>";
	echo "</table>";

echo "</td>";
echo "<td>";
echo "<div id='enviar_carro' align='center'>Cant.<input type='text' name='cantidad' size='2' value='1'>";
echo "<input type='image' src='../images_css/anadir.gif'></div>";
echo "</td></tr>";
echo "</form>";
	}

	echo "</table>";

}
//cerramos el conjunto de resultado y la conexión con la base de datos
mysqli_free_result($rs);

//muestro los distintos índices de las páginas, si es que hay varias páginas
$pag_anterior=$pagina-1;
$pag_siguiente=$pagina+1;
?>
</div>
<br><br>
<table border="0" width="600" id='pagin_person'>
<tr>
	<td width="200" align="left">

<?php

if($pagina==1){
	echo "&nbsp;";
}else{
echo "<a href='lista_personalizadas.php?pagina=".$pag_anterior."'>P&aacute;gina anterior</a>";
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
          echo "<a href='lista_personalizadas.php?pagina=" . $i . "'class=izquierda>" . $i . "</a> ";
    }
} 

?>
</td>

<td width="200" align="right">
	<?php

if($pagina==$total_paginas){
	echo "&nbsp;";
}else{
	echo "<a href='lista_personalizadas.php?pagina=".$pag_siguiente."'>P&aacute;gina siguiente</a>";
}


	?>
</td>
</table>
<br>
<?php centro2() ?>
<?php colDerecha1() ?>

<?php pedido() ?>

<?php colDerecha2() ?>
<?php pie() ?>
<br><br>