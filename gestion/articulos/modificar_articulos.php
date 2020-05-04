<?php 
	include ("../seguridad.php");
	include("../../conexion.php"); //Nos conectamos a la base de datos

$pag=$_SERVER['PHP_SELF'];  // el nombre y ruta de esta misma pÃ¡gina.

if ($_GET['accion']=="borrar"){
	$id_borrar= $_GET['id'];
	mysqli_query($conexion,"DELETE FROM $tabla2 WHERE id_articulo='$id_borrar'") or die(mysqli_error($conexion));
	mysqli_close($conexion);
	$pagina=$_GET['pagina'];
	header ("Location: $pag");
	exit;
}

if ($_GET['accion']=="modificar"){
	$id_modificar= $_GET['id'];
	mysqli_close($conexion);
	header ("Location: modificar_articulos2.php?id_articulo=$id_modificar");
	exit;
}

if ($_GET['accion']=="anadir"){
	$id_piso= $_GET['id'];
	mysqli_close($conexion);

	header ("Location: alta_imagenes.php?id=$id_articulo");
	exit;
}

	include("../includes.php");
	include("enlaces.php");

/////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////      PAGINACIÓN     //////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////


$busca_familia=$_POST['familia'];

if($busca_familia==""){
	$criterio_familia='';
}else{
	$criterio_familia="WHERE familia='$busca_familia'";
	}

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
$ssql = "select * from `$tabla2` $criterio_familia";
//echo $ssql;
$rs = mysqli_query($conexion,$ssql);
$num_total_registros = mysqli_num_rows($rs);
//calculo el total de páginas
$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);

/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////        GENERA LISTADO FAMILIAS      //////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

function generaFamilia()
{
	echo "<form action='modificar_articulos.php' method='post'>";

	include("../../conexion.php"); //Nos conectamos a la base de datos
	$consulta=mysqli_query($conexion,"SELECT * FROM $tabla5");
	echo "<select name='familia' id='familia'>";
	echo "<option value='0'>Elige la familia</option>";
	while($registro=mysqli_fetch_row($consulta))
	{
		echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
	}
	echo "</select>";
	echo "<input type='submit' value='buscar'>";
	echo "</form>";
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////



?> 
<?php encabezado() ?>
<link href="../estilos.css" rel="stylesheet" type="text/css" />

<?php cabecera() ?>
<?php enlacesinternos() ?>
<?php contenido1() ?>


<table border="0" width="100%">

<tr>
	<td colspan="3">
	<div id='anadir'>Buscar por familias<?php generaFamilia(); ?></div>

	</td>
</tr>


<tr>

	<td></td>
	<td width="900" align="center" valign="top">
	

<div id="texto_gestion">

<?php


/*
echo "Número de registros encontrados: " . $num_total_registros . "<br>";
echo "Se muestran páginas de " . $TAMANO_PAGINA . " registros cada una<br>";
echo "Mostrando la página " . $pagina . " de " . $total_paginas . "<p>"; 
*/


//$resultado=mysqli_query($conexion,"SELECT * FROM `$tabla1`");

/////////////////////////////////////////////////////////////

$ssql = "select * from `$tabla2` $criterio_familia limit " . $inicio . "," . $TAMANO_PAGINA;
$resultado = mysqli_query($conexion,$ssql);
/////////////////////////////////////////////////////////////

echo "<table border='0' id='tabla_gestion' width='900'>";

echo "<tr id='cabecera_tabla'> <td> <div id='texto_titulo'> ID </div></td> <td><div id='texto_titulo'> Nombre </div></td> <td><div id='texto_titulo'> Ingredientes </div></td> <td><div id='texto_titulo'> Familia </div></td><td><div id='texto_titulo'> Precio </div></td> <td><div id='texto_titulo'> Acci&oacute;n </div></td></tr>";

$i=1;
while ($registro=mysqli_fetch_row($resultado)){

$i++;
if($i%2==0){
	$estilo="fila_par";
}else{
	$estilo="fila_inpar";
	}

		echo "<tr id='".$estilo."'>";
			echo "<td>".$registro[0]."</td>";
			echo "<td>".$registro[1]."</td>";
			echo "<td>".$registro[2]."</td>";
			echo "<td>";
				$select_familia = mysqli_query($conexion,"select nombre_familia from `$tabla5` WHERE id_familia='$registro[3]'");
					while ($nombre_familia=mysqli_fetch_row($select_familia)){
					$familia=$nombre_familia[0];
					echo $familia;
					}

			echo "</td>";
			echo "<td>";
			printf("%.2f", $registro[4]);
			echo" &euro;</td>";
			echo "<td><a href='?accion=modificar&id=$registro[0]'><img src='../imagenes/edit.gif' alt='editar' border='0'></a> <a href='?accion=borrar&id=$registro[0]'>";
			echo "<a href='?accion=borrar&id=$registro[0]'>|<img src='../imagenes/delete.gif' name='borrar' alt='borrar' border='0'></a></div></td>";
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
<br>
<table border="0" width="900">
<tr>
	<td width="200" align="left">

<?php
if($pagina==1){
	echo "&nbsp;";
}else{
echo "<a href='modificar_articulos.php?pagina=".$pag_anterior."'>P&aacute;gina anterior</a>";
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
          echo "<a href='modificar_articulos.php?pagina=".$i."'class=izquierda>".$i."</a> ";
    }
} 

?>
</td>

<td width="200" align="right">
	<?php

if($pagina==$total_paginas){
	echo "&nbsp;";
}else{
	echo "<a href='modificar_articulos.php?pagina=".$pag_siguiente."'>P&aacute;gina siguiente</a>";
}

	?>
</td>
</table>




</td>
<td></td>

</tr>

</table>
<?php contenido2() ?>

<?php pie() ?>