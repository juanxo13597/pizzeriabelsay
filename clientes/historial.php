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
$ssql = "select * from `$tabla8` WHERE id_usuario=$cliente";
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
<?php autent2() ?>
<?php centro1() ?>
<?php 
/////////////////////////////////////////////////////////////
$ssql = "select * from `$tabla8` WHERE id_usuario=$cliente ORDER BY id_pedido DESC limit " . $inicio . "," . $TAMANO_PAGINA;
$resultado = mysqli_query($conexion,$ssql);
/////////////////////////////////////////////////////////////

echo "<table border='0' id='tabla_personalizadas' width='700'>";

echo "<tr id='cabecera_tabla'> <td> <div id='texto_titulo'> ID </div></td> <td><div id='texto_titulo'> Fecha </div></td> <td><div id='texto_titulo'> Hora </div></td> <td><div id='texto_titulo'> Precio </div></td> <td><div id='texto_titulo'> Estado </div></td><td><div id='texto_titulo'> &nbsp; </div></td></tr>";

$i=1;
while ($registro=mysqli_fetch_row($resultado)){

$ano=substr ("$registro[7]", 0, 4);
$mes=substr ("$registro[7]", 5, 2);
$dia=substr ("$registro[7]", 8, 2);

$fecha=$dia."-".$mes."-".$ano;

$i++;
if($i%2==0){
	$estilo="fila_par";
}else{
	$estilo="fila_impar";
	}

		echo "<tr id='".$estilo."' valign='middle'>";
			echo "<td>".$registro[0]."</td>";
			echo "<td>".$fecha."</td>";
			echo "<td>".$registro[8]."</td>";
			echo "<td>";
			printf("%.2f", $registro[2]);
			echo "&euro;</td>";
			echo "<td>";
				$select_estado = mysqli_query($conexion,"select nombre from `$tabla4` WHERE id_estado='".$registro[5]."'");
					while ($nombre_estado=mysqli_fetch_row($select_estado)){
					$estado=$nombre_estado[0];
					echo $estado;
			echo "</td>";
			echo "<td class='detalles'>";
			echo "<form action='detalles.php' name='detalles' method='post'>";
			echo "<input type='hidden' name='id_pedido' value='$registro[0]'>"; 
			echo "<input type='hidden' name='estado_pedido' value='$registro[5]'>"; 			
			echo "<input type='submit' value='Detalles'>";
			echo "</form>";
			}
			echo "</td>";
	 echo "</tr>";
	}
	echo "</table>";

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
echo "<a href='historial.php?pagina=".$pag_anterior."'>P&aacute;gina anterior</a>";
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
          echo "<a href='historial.php?pagina=" . $i . "'class=izquierda>" . $i . "</a> ";
    }
} 

?>
</td>

<td width="200" align="right">
	<?php

if($pagina==$total_paginas){
	echo "&nbsp;";
}else{
	echo "<a href='historial.php?pagina=".$pag_siguiente."'>P&aacute;gina siguiente</a>";
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