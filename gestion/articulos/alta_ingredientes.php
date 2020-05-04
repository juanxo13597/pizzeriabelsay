<?php 
	include ("../seguridad.php");
	include("../../conexion.php"); //Nos conectamos a la base de datos

$anoactual=date(Y);
$pag=$_SERVER['PHP_SELF'];  // el nombre y ruta de esta misma pÃ¡gina.
$ingrediente=strtoupper($_POST['nombre']);
$precio=$_POST['precio'];

if ($_GET['accion']=="borrar"){
	$id_borrar= $_GET['id'];
	mysqli_query($conexion,"DELETE FROM $tabla6 WHERE id_ingrediente='$id_borrar'") or die(mysqli_error($conexion));
	mysqli_close($conexion);
	$pagina=$_GET['pagina'];
	header ("Location: $pag");
	exit;
}

	include("../includes.php");
	include("enlaces.php");

//////////////////////////////				GENERA EL ULTIMO INGREDIENTE       ///////////////////////////

$ningrediente= mysqli_query($conexion,"SELECT MAX(id_ingrediente) FROM $tabla6");

//echo "<table align=center border=2 id='tabla_consulta'>";

	while ($registro=mysqli_fetch_row($ningrediente)){
	       foreach($registro as $clave){ 
	       //echo $clave;
	 	}
	 }

$num_ingrediente=$clave+1;
//echo $num_ingrediente;
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
$ssql = "select * from `$tabla6`";
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

if($ingrediente==""){
	echo "Debe introducir los datos para crear un nuevo ingrediente";
}else{

$campos="id_ingrediente,nombre,precio";
$datos="'$num_ingrediente','$ingrediente','$precio'";

$inserta=mysqli_query($conexion,"INSERT INTO $tabla6 ($campos) VALUES ($datos)");

if($inserta==1){
	echo "<div id='correcto'>Los datos han sido introducidos con &eacute;xito en la base de datos</div>";
}else{
	echo "<div id='error'>No ha sido posible insertar los datos en la base de datos</div>";
	}

$comprueba="INSERT INTO ".$tabla6."(".$campos.") VALUES (".$datos.")";
echo $comprueba;
}
		?>

<table border="0" width="100%">
	<tr>
		<td></td>
		<td widht="300" align="center">

<br>
<form action="alta_ingredientes.php" method="post">
<table border="0" id="alta_clientes" >

	<tr>
		<td colspan="2" id="titulo_alta_clientes">Alta de ingredientes</td>
	</tr>

	<tr>
		<td>Nombre del ingrediente: </td>
		<td><input type="text" name="nombre" size="30"></td>
	</tr>
	<tr>
		<td>Precio: </td>
		<td><input type="text" name="precio" size="30" value="0.20"></td>
	</tr>
	
	<tr>
		<td colspan="2" align="right"><input type="submit" value="GUARDAR" id="boton"> <input type="reset" value="BORRAR" id="boton"></td>
	</tr>
	
</table>

</form>

	
<?php 


/////////////////////////////////////////////////////////////
$ssql = "select * from `$tabla6`";
$resultado = mysqli_query($conexion,$ssql);
/////////////////////////////////////////////////////////////

echo "<table border='0' id='tabla_gestion' width='500'>";

echo "<tr id='cabecera_tabla'> <td> <div id='texto_titulo'> ID </div></td> <td><div id='texto_titulo'> Nombre </div></td> <td width='100'> <div id='texto_titulo'> Precio </div></td> <td> <div id='texto_titulo'>  </div></td></tr>";

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
			echo "<td>";
			printf("%.2f", $registro[2]);
			echo " &euro; </td>";
			echo "<td><a href='?accion=borrar&id=$registro[0]'><img src='../imagenes/delete.gif' name='borrar' alt='borrar' border='0'></a></div></td>";
	 echo "</tr>";
	}
	echo "</table>";


//cerramos el conjunto de resultado y la conexión con la base de datos
mysqli_free_result($rs);

//muestro los distintos índices de las páginas, si es que hay varias páginas

?>
</div>
<br>

	</td>
	<td></td>
	</table>

<?php contenido2() ?>

<?php 
?>

<?php pie() ?>