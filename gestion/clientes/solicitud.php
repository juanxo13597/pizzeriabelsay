<?php 
	include ("../seguridad.php");
	include("../../conexion.php"); //Nos conectamos a la base de datos

$pag=$_SERVER['PHP_SELF'];  // el nombre y ruta de esta misma pÃ¡gina.

if ($_GET['accion']=="borrar"){
	$id_borrar= $_GET['id'];
	mysqli_query($conexion,"DELETE FROM $tabla11 WHERE id_solicitud='$id_borrar'") or die(mysqli_error($conexion));
	mysqli_close($conexion);
	$pagina=$_GET['pagina'];
	header ("Location: $pag");
	exit;
}

if ($_GET['accion']=="descartar"){
	$id_modificar= $_GET['id'];
	$campos="estado_solicitud='4'";
	$sentencia="UPDATE $base . `$tabla11` SET $campos WHERE $tabla11 . id_solicitud=$id_modificar ";
	$modifica=mysqli_query($conexion,$sentencia);
	mysqli_close($conexion);	
	$pagina=$_GET['pagina'];
	header ("Location: $pag");
	exit;
}

if ($_GET['accion']=="anadir"){
	$id_info= $_GET['id'];
	mysqli_close($conexion);

	header ("Location: alta_imagenes.php?id_usuario=$id_info");
	exit;
}
 
	include("../includes.php");
	include("enlaces.php");

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
$ssql = "select * from `$tabla11`";
$rs = mysqli_query($conexion,$ssql);
$num_total_registros = mysqli_num_rows($rs);
//calculo el total de páginas
$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);

/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////

?> 
<?php encabezado() ?>
<link href="../estilos.css" rel="stylesheet" type="text/css" />

<?php cabecera() ?>
<?php enlacesinternos() ?>
<?php contenido1() ?>


<table border="0" width="100%">

<tr>
	<td colspan="3">
	<div id='anadir'><a href='alta_clientes.php'><img src='../imagenes/add.gif' border='none'> A&ntilde;adir otro usuario</a></div>

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
$ssql = "select * from `$tabla11` ORDER BY id_solicitud DESC limit " . $inicio . "," . $TAMANO_PAGINA;
$resultado = mysqli_query($conexion,$ssql);
/////////////////////////////////////////////////////////////


echo "<table border='0' id='tabla_gestion' width='900'>";

echo "<tr id='cabecera_tabla'> <td><div id='texto_titulo'> Nombre </div></td> <td><div id='texto_titulo'> Apellidos </div></td> <td><div id='texto_titulo'> Mail </div></td> <td><div id='texto_titulo'> Direccion </div></td> <td><div id='texto_titulo'> Localidad </div></td> <td><div id='texto_titulo'> Tel&eacute;fono </div></td> <td><div id='texto_titulo'> Dia de alta </div></td>  <td><div id='texto_titulo'> hora de alta </div></td> <td><div id='texto_titulo'> Acci&oacute;n </div></td></tr>";

while ($registro=mysqli_fetch_row($resultado)){

if($registro[17]==1){
	$estilo='sin_leer';
}elseif($registro[17]==2){
	$estilo='leida';
}elseif($registro[17]==3){
	$estilo='aceptada';
}elseif($registro[17]==4){
	$estilo='rechazada';
}

		echo "<tr id='".$estilo."'>";
			echo "<td>".$registro[4]."</td>";
			echo "<td>".$registro[5]." ".$registro[6]."</td>";
			echo "<td>".$registro[1]."</td>";
			echo "<td>".$registro[7]." ".$registro[8]."</td>";
			echo "<td>".$registro[11]."</td>";
			echo "<td>".$registro[9]."</td>";
			echo "<td>".$registro[14]."</td>";
			echo "<td>".$registro[15]."</td>";		
			echo "<td valign='middle'><a href='usuario_solicitud.php?id_solicitud=$registro[0]'><img src='../imagenes/add.gif' alt='anadir' border='0'></a>";
			echo "<a href='?accion=descartar&id=$registro[0]'>|<img src='../imagenes/desc.gif' alt='descartar' border='0'></a>";
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
echo "<a href='solicitud.php?pagina=".$pag_anterior."'>P&aacute;gina anterior</a>";
}
echo "</td>";

echo "<td align='center'>";
if ($total_paginas >= 1){
    for ($i=1;$i<=$total_paginas;$i++){
       if ($pagina == $i)
          //si muestro el índice de la página actual, no coloco enlace
          echo $pagina . " ";
       else
          //si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página
          echo "<a href='solicitud.php?pagina=" . $i . "'class=izquierda>" . $i . "</a> ";
    }
} 

?>
</td>

<td width="200" align="right">
	<?php

if($pagina==$total_paginas){
	echo "&nbsp;";
}else{
	echo "<a href='solicitud.php?pagina=".$pag_siguiente."'>P&aacute;gina siguiente</a>";
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