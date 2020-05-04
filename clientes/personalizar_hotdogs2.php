<?php
include ("../seguridad.php");
include("../includes.php");
include("enlaces.php");
include("../conexion.php"); 

$cliente=$_SESSION["id"];

//////////////////////////////////////////////////////////////////////////////////////////
///////////////////         GENERA LA ÚTLIMA PERSONALIZADA           /////////////////////

$nperson= mysqli_query($conexion,"SELECT MAX(id_personalizado) FROM $tabla23");

	while ($registroperson=mysqli_fetch_row($nperson)){
	       foreach($registroperson as $claveperson){ 
		   global $claveperson;
	 	}
	 }

$nperson_cliente= mysqli_query($conexion,"SELECT MAX(id_hotdogs) FROM $tabla23 WHERE id_cliente=$cliente");

	while ($registroperson_cliente=mysqli_fetch_row($nperson_cliente)){
	       foreach($registroperson_cliente as $claveperson_cliente){ 
		   global $claveperson_cliente;
	 	}
	 }



$num_personalizado=$claveperson+1;
$num_person_cliente=$claveperson_cliente+1;

//echo "<br><br><br> ultimo numero de imagen".$num_imagen."<br><br><br>";

//////////////////////////////////////////////////////////////////////////////////////////

if ($_GET['accion']=="anadir_carro"){
	$id_pedido= $_GET['id_pedido'];
	$cliente=$_SESSION['id'];
	$id_articulo_pedido= $_GET['id_articulo'];
	$id_articulo= $_GET['id_articulo'];
	$id_ingrediente_mas= $_GET['id_ingrediente_mas'];
	$id_ingrediente_menos= $_GET['id_ingrediente_menos'];
	$id_cantidad= $_GET['id_cantidad'];
	$id_precio= $_GET['id_precio'];
	$fecha=date(Y."/".m."/".d);
	mysqli_query($conexion,"DELETE FROM $tabla2 WHERE id_articulo='$id_borrar'") or die(mysqli_error($conexion));
	mysqli_close($conexion);
	$pagina=$_GET['pagina'];
	header ("Location: $pag");
	exit;
}


$ingrediente1=$_POST['select1'];
$ingrediente2=$_POST['select2'];
$ingrediente3=$_POST['select3'];
$ingrediente4=$_POST['select4'];
$ingrediente5=$_POST['select5'];


/*
if($ingrediente3==0){
	$repeticion="$ingrediente1==$ingrediente2";
}elseif($ingrediente4==0){
	$repeticion=$ingrediente1==$ingrediente2;
	$repeticion.="OR".$ingrediente1==$ingrediente3;
	//$repeticion.=$ingrediente1==$ingrediente3; 
	//$repeticion.="OR".$ingrediente2==$ingrediente3; 
	//$repeticion=$ingrediente2==$ingrediente3;
}

elseif($ingrediente5=="0"){
	$repeticion="$ingrediente1==$ingrediente2 OR $ingrediente1==$ingrediente3 OR $ingrediente1==$ingrediente4";
	$repeticion.=" OR $ingrediente2==$ingrediente3 OR $ingrediente1==$ingrediente4";
	$repeticion.=" OR $ingrediente3==$ingrediente4";
}else{
	$repeticion="$ingrediente1==$ingrediente2 OR $ingrediente1==$ingrediente3 OR $ingrediente1==$ingrediente4 OR $ingrediente1==$ingrediente5";
	$repeticion.=" OR $ingrediente2==$ingrediente3 OR $ingrediente2==$ingrediente4 OR $ingrediente2==$ingrediente5";
	$repeticion.=" OR $ingrediente3==$ingrediente4 OR $ingrediente3==$ingrediente5";
	$repeticion.=" OR $ingrediente4==$ingrediente5";
}
*/
//echo "repeticion: ".$repeticion;



	$consulta1=mysqli_query($conexion,"SELECT * FROM $tabla24 WHERE id_ingrediente=$ingrediente1");
	while($registro1=mysqli_fetch_row($consulta1))
	{		
		$nombre_ingrediente1=$registro1[1];
	}
if($ingrediente2!=0){
	$consulta2=mysqli_query($conexion,"SELECT * FROM $tabla24 WHERE id_ingrediente=$ingrediente2");
	while($registro2=mysqli_fetch_row($consulta2))
	{		
		$nombre_ingrediente2=$registro2[1];
	}
}
	
if($ingrediente3!=0){
	$consulta3=mysqli_query($conexion,"SELECT * FROM $tabla24 WHERE id_ingrediente=$ingrediente3");
	while($registro3=mysqli_fetch_row($consulta3))
	{		
		$nombre_ingrediente3=$registro3[1];
	}
}

if($ingrediente4!=0){
	$consulta4=mysqli_query($conexion,"SELECT * FROM $tabla24 WHERE id_ingrediente=$ingrediente4");
	while($registro4=mysqli_fetch_row($consulta4))
	{		
		$nombre_ingrediente4=$registro4[1];
	}
}

if($ingrediente5!=0){
	$consulta5=mysqli_query($conexion,"SELECT * FROM $tabla24 WHERE id_ingrediente=$ingrediente5");
	while($registro5=mysqli_fetch_row($consulta5))
	{		
		$nombre_ingrediente5=$registro5[1];
	}
}


function generaIngrediente1()
{
	include '../conexion.php';
	// conectar();
	$consulta=mysqli_query($conexion,"SELECT id_ingrediente, nombre FROM $tabla24");
	// desconectar();

	// Voy imprimiendo el primer select compuesto por los paises
	echo "<select name='ingrediente1' id='ingrediente1'>";
	echo "<option value='0'>Elige el ingrediente</option>";
	while($registro=mysqli_fetch_row($consulta))
	{
		
		echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
	}
	echo "</select>";
}

function generaSelect()
{
	include '../conexion.php';
	// conectar();
	$consulta=mysqli_query($conexion,"SELECT id_ingrediente, nombre FROM $tabla24");
	// desconectar();

	// Voy imprimiendo el primer select compuesto por los paises
	echo "<select name='select1' id='pais' onChange='cargaContenido(this.id)'>";
	echo "<option value='0'>Elige el pais</option>";
	while($registro=mysqli_fetch_row($consulta))
	{
		
		echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
	}
	echo "</select>";
}



$select_familia=$_GET['cond'];
$url=$_SERVER['PHP_SELF'];  // el nombre y ruta de esta misma pÃ¡gina.
$pag="personalizar_hotdogs.php";


////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

if($ingrediente1=="0"){
	$preciol=2.00;
}elseif($ingrediente2=="0"){
	$preciol=2.55;
	$ingredientes=$nombre_ingrediente1;
}elseif($ingrediente3=="0"){
	$preciol=3.10;
	$ingredientes=$nombre_ingrediente1.", ".$nombre_ingrediente2;
}elseif($ingrediente4=="0"){
	$preciol=3.65;
	$ingredientes=$nombre_ingrediente1.", ".$nombre_ingrediente2.", ".$nombre_ingrediente3;
}elseif($ingrediente5=="0"){
	$preciol=4.20;
	$ingredientes=$nombre_ingrediente1.", ".$nombre_ingrediente2.", ".$nombre_ingrediente3.", ".$nombre_ingrediente4;
}else{
	$preciol=4.75;
	$ingredientes=$nombre_ingrediente1.", ".$nombre_ingrediente2.", ".$nombre_ingrediente3.", ".$nombre_ingrediente4.", ".$nombre_ingrediente5;
}


?> 
<?php cabecera() ?>
<link href="../estilos.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="select_dependientes_3_niveles_hotdogs.js"></script>
<?php encabezado() ?>
<?php enlaces1() ?>
<?php contenido1() ?>
<?php autent() ?>
<?php centro1() ?>

<table border="0" width="100%">


<tr>

	<td> &nbsp; </td>
	<td width="700" align="center" valign="top">
	

<div id="texto_gestion">

<?php
$fecha=date(Y."/".m."/".d);
$i=1;
?>
<fieldset id="personalizar">
<legend id="titulo">PERSONALIZA TU HOT DOG</legend>
<table border="0">
	<tr>
		<td>Ingrediente 1 =></td>
		<td><?php echo $nombre_ingrediente1; ?></td>
	</tr>	
	<tr>
		<td>Ingrediente 2 =></td>
		<td><?php echo $nombre_ingrediente2; ?></td>
	</tr>
	<tr>
		<td>Ingrediente 3 =></td>
		<td>
			<?php echo $nombre_ingrediente3; ?>
		</td>
	</tr>
	<tr>
		<td>Ingrediente 4 =></td>
		<td>
			<?php echo $nombre_ingrediente4; ?>
		</td>
	</tr>
	<tr>
		<td>Ingrediente 5 =></td>
		<td>
			<?php echo $nombre_ingrediente5; ?>
		</td>
	</tr>
	<tr>
		<td>Precio L</td>
		<td>
			<?php echo $preciol." &euro"; ?>
		</td>
	</tr>
</table>
</fieldset>
<?php

$id_personalizado=$num_personalizado;
$id_hotdogs=$num_person_cliente;
$id_cliente=$cliente;
$nombre="HOT DOG Personalizado ".$id_hotdogs;

$campos="id_personalizado,id_hotdogs,id_cliente,nombre,ingredientes,familia,preciol";
$datos="'$id_personalizado','$id_hotdogs','$id_cliente','$nombre','$ingredientes','100','$preciol'";

$sql_inserta="INSERT INTO $base.$tabla23 ($campos) VALUES ($datos)";
$inserta=mysqli_query($conexion,$sql_inserta);
$select_familia=100;

echo "<form action='anadir_carro.php' method='POST'>";
echo "<input type='hidden' name='id_articulo' value='$id_personalizado'>";
echo "<input type='hidden' name='preciol' value='$preciol'>";
echo "<input type='hidden' name='cliente' value='$id_cliente'>";
echo "<input type='hidden' name='fecha' value='$fecha'>";
echo "<input type='hidden' name='pagina' value='$pag'>";
echo "<input type='hidden' name='familia' value='100'>";

?>

<br>
	<div id='enviar_carro'>


Cant. <input type='text' name='cantidad' size='2' value='1'>
	<input type='image' src='../images_css/anadir.gif'></div>

</td>

<td align="left">&nbsp;</td>

</form>
</tr>

</table>

<?php centro2() ?>
<?php colDerecha1() ?>

<?php pedido() ?>

<?php colDerecha2() ?>
<?php pie() ?>

<br><br>