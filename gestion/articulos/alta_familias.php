<?php 
	include ("../seguridad.php");
	include("../../conexion.php"); //Nos conectamos a la base de datos

$anoactual=date(Y);
$pag=$_SERVER['PHP_SELF'];  // el nombre y ruta de esta misma pÃ¡gina.
$familia=strtoupper($_POST['nombre']);

if ($_GET['accion']=="borrar"){
	$id_borrar= $_GET['id'];
	mysqli_query($conexion,"DELETE FROM $tabla5 WHERE id_familia='$id_borrar'") or die(mysqli_error($conexion));
	mysqli_close($conexion);
	$pagina=$_GET['pagina'];
	header ("Location: $pag");
	exit;
}

	include("../includes.php");
	include("enlaces.php");

//////////////////////////////				GENERA LA ULTIMA FAMILIA       ///////////////////////////

$nusuario= mysqli_query($conexion,"SELECT MAX(id_familia) FROM $tabla5 WHERE id_familia<'99'");

//echo "<table align=center border=2 id='tabla_consulta'>";

	while ($registro=mysqli_fetch_row($nusuario)){
	       foreach($registro as $clave){ 
	       //echo $clave;
	 	}
	 }

$num_familia=$clave+1;

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////


/////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////      PAGINACIÓN     //////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////


$TAMANO_PAGINA = 10000;

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
$ssql = "select * from `$tabla5`";
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

<?php

if($familia==""){
	echo "Debe introducir los datos para crear una nueva familia de articulos";
}else{

$campos="id_familia,nombre_familia";
$datos="'$num_familia','$familia'";

$inserta=mysqli_query($conexion,"INSERT INTO $tabla5 ($campos) VALUES ($datos)");

if($inserta==1){
	echo "<div id='correcto'>Los datos han sido introducidos con &eacute;xito en la base de datos</div>";
}else{
	echo "<div id='error'>No ha sido posible insertar los datos en la base de datos</div>";
	}

$comprueba="INSERT INTO ".$tabla5."(".$campos.") VALUES (".$datos.")";
echo $comprueba;
}
		?>

<table border="0" width="100%">
	<tr>
		<td></td>
		<td widht="300" align="center">

<br>
<form action="alta_familias.php" method="post">
<table border="0" id="alta_clientes" >

	<tr>
		<td colspan="2" id="titulo_alta_clientes">Crear familia de articulos</td>
	</tr>

	<tr>
		<td>Nombre de la familia: </td>
		<td><input type="text" name="nombre" size="30"></td>
	</tr>
	
	<tr>
		<td colspan="2" align="right"><input type="submit" value="GUARDAR" id="boton"> <input type="reset" value="BORRAR" id="boton"></td>
	</tr>
	
</table>

</form>

	
<?php 


/////////////////////////////////////////////////////////////
$ssql = "select * from `$tabla5` limit " . $inicio . "," . $TAMANO_PAGINA;
$resultado = mysqli_query($conexion,$ssql);
/////////////////////////////////////////////////////////////

echo "<table border='0' id='tabla_gestion' width='500'>";

echo "<tr id='cabecera_tabla'> <td> <div id='texto_titulo'> ID </div></td> <td><div id='texto_titulo'> Nombre </div></td> <td> <div id='texto_titulo'>  </div></td></tr>";

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
			echo "<td><a href='?accion=borrar&id=$registro[0]'><img src='../imagenes/delete.gif' name='borrar' alt='borrar' border='0'></a></div></td>";
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
<table border="0" width="500">
<tr>
	<td width="200" align="left">

<?php
if($pagina==1){
	echo "&nbsp;";
}else{
echo "<a href='gestion_clientes.php?pagina=".$pag_anterior."'>P&aacute;gina anterior</a>";
}
echo "</td>";

echo "<td align='center'>";
if ($total_paginas > 1){
    for ($i=1;$i<$total_paginas;$i++){
       if ($pagina == $i)
          //si muestro el índice de la página actual, no coloco enlace
          echo $pagina . " ";
       else
          //si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página
          echo "<a href='gestion_clientes.php?pagina=" . $i . "'class=izquierda>" . $i . "</a> ";
    }
} 

?>
</td>

<td width="200" align="right">
	<?php

if($pagina==$total_paginas){
	echo "&nbsp;";
}else{
	echo "<a href='gestion_clientes.php?pagina=".$pag_siguiente."'>P&aacute;gina siguiente</a>";
}

	?>
</td>
</table>


	</td>
	<td></td>
	</table>

<?php contenido2() ?>

<?php 
?>

<?php pie() ?>