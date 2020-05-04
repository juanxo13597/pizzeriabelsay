<?php session_start();

	include("../conexion.php"); //Nos conectamos a la base de datos

	//include ("../autenticacion");

$cliente=$_SESSION["id"];

//////////////////////////////////////////////////////////////////////////////////////////
///////////////////         GENERA LA ÚTLIMA PERSONALIZADA           /////////////////////

$nperson= mysqli_query($conexion,"SELECT MAX(id_personalizada) FROM $tabla15");

	while ($registroperson=mysqli_fetch_row($nperson)){
	       foreach($registroperson as $claveperson){ 
		   global $claveperson;
	 	}
	 }

$nperson_cliente= mysqli_query($conexion,"SELECT MAX(id_pizza) FROM $tabla15 WHERE id_cliente=$cliente");

	while ($registroperson_cliente=mysqli_fetch_row($nperson_cliente)){
	       foreach($registroperson_cliente as $claveperson_cliente){ 
		   global $claveperson_cliente;
	 	}
	 }



$num_personalizada=$claveperson+1;
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



$ingrediente5=$_POST['select4'];
$ingrediente6=$_POST['select5'];

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


if ($ingrediente5!="") {
	$consulta5=mysqli_query($conexion,"SELECT * FROM $tabla30 WHERE id_postre=$ingrediente5");
	$registro=mysqli_fetch_row($consulta5);
		 	
		$nombre_ingrediente5=$registro[1];
		$precio_ingrediente5=$registro[2];	
}
if ($ingrediente6!="") {
	$consulta6=mysqli_query($conexion,"SELECT * FROM $tabla30 WHERE id_postre=$ingrediente6");
	$registro=mysqli_fetch_row($consulta6);
		 	
		$nombre_ingrediente6=$registro[1];
		$precio_ingrediente6=$registro[2];	
}

$precio_base=10;
/*
function generaIngrediente1()
{
	include '../conexion.php';
	// conectar();
	$consulta=mysqli_query($conexion,"SELECT id_ingrediente, nombre FROM $tabla6");
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
	$consulta=mysqli_query($conexion,"SELECT id_ingrediente, nombre FROM $tabla6");
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
*/


$select_familia=$_GET['cond'];
$url=$_SERVER['PHP_SELF'];  // el nombre y ruta de esta misma pÃ¡gina.
$pag="lotes_personalizados.php";


////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

if($ingrediente3=="0"){

	$ingredientes=$nombre_ingrediente1.", ".$nombre_ingrediente2;}

elseif($ingrediente4=="0"){

	$ingredientes=$nombre_ingrediente1.", ".$nombre_ingrediente2.", ".$nombre_ingrediente3;

}elseif($ingrediente5=="0"){

	$ingredientes=$nombre_ingrediente1.", ".$nombre_ingrediente2.", ".$nombre_ingrediente3.", ".$nombre_ingrediente4;

}elseif($ingrediente6=="0"){

	$ingredientes=$nombre_ingrediente1.", ".$nombre_ingrediente2.", ".$nombre_ingrediente3.", ".$nombre_ingrediente4.", ".$nombre_ingrediente5;

}else{

	$ingredientes=$nombre_ingrediente1.", ".$nombre_ingrediente2.", ".$nombre_ingrediente3.", ".$nombre_ingrediente4.", ".$nombre_ingrediente5.", ".$nombre_ingrediente6;

}

	include("../includes.php");
	include("enlaces.php");





?> 

<?php cabecera() ?>
<link href="../estilos.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
<script src="js/prototype.js" type="text/javascript"></script>
<script src="js/scriptaculous.js?load=effects,builder" type="text/javascript"></script>
<script src="js/lightbox.js" type="text/javascript"></script>
<?php encabezado() ?>
<?php enlaces1() ?>
<?php contenido1() ?>
<?php autent2() ?>
<?php centro1() ?>


<table border="0" width="100%">


<tr>

	<td>&nbsp;  </td>
	<td width="700" align="center" valign="top">
	

<div id="texto_gestion">

<?php
$fecha=date(Y."/".m."/".d);
$i=1;
?>
<div id="personalizar">
<div id="titulo">TU LOTE PERSONALIZADO</div>
<table border="0">


    <tr>

		<td><strong>Tu 1&deg; postre =></strong></td>
		
		<td>
			<?php echo $nombre_ingrediente5; ?>
            
              <?php /* if($nombre_ingrediente3==""){
			echo "";}
				elseif ($nombre_ingrediente3>=0){
				echo "| Precio: $precio_ingrediente3 €"; 
				}*/?>
		</td>
	</tr>
	<td><strong>Tu 2&deg; postre =></strong></td>
		
		<td>
			<?php echo $nombre_ingrediente6; ?>
            
              <?php /* if($nombre_ingrediente3==""){
			echo "";}
				elseif ($nombre_ingrediente3>=0){
				echo "| Precio: $precio_ingrediente3 €"; 
				}*/?>
		</td>
	</tr>


	<tr>
		<td><strong>Precio</strong></td>
		<td>
        <?php ; 
		
		//echo "$precio_base";
		
		?>
			<?php //echo $precio." &euro;" ?>
            <?php 
			/*
			if ($nombre_ingrediente5>=0){
						
//				echo "$precio_ingrediente1 "+" $precio_ingrediente2 "+" $precio_ingrediente3 "+" $precio_ingrediente4 "+" $precio_base";
				
				}
				
					elseif($nombre_ingrediente4>=0 ){
					
//					echo "$precio_ingrediente1 "+" $precio_ingrediente2 "+" $precio_ingrediente3 "+" $precio_base";	
					
					}
						elseif($nombre_ingrediente3>=0 ){
					
//						echo "$precio_ingrediente1 "+" $precio_ingrediente2 "+" $precio_base";	
						
						}
			*/
			$precios=$precio_base;
			echo "$precios &euro;";
				?>
						
		</td>
	</tr>
</table>
</div>
<?php

$id_personalizada=$num_personalizada;
$id_pizza=$num_person_cliente;
$id_cliente=$cliente;
$nombre="LOTE 3 - 10e";

$campos="id_personalizada,id_pizza,id_cliente,nombre,ingredientes,familia,precios,preciol";
$datos="'$id_personalizada','$id_pizza','$id_cliente','$nombre','$ingredientes','1000','$precios','$preciol'";

$sql_inserta="INSERT INTO $base.$tabla15 ($campos) VALUES ($datos)";
//echo $sql_inserta;

$inserta=mysqli_query($conexion,$sql_inserta);
$select_familia=1000;

echo "<form action='anadir_carro.php' method='POST'>";
echo "<input type='hidden' name='id_articulo' value='$id_personalizada'>";
echo "<input type='hidden' name='precio' value='$precios'>";
echo "<input type='hidden' name='cliente' value='$id_cliente'>";
echo "<input type='hidden' name='fecha' value='$fecha'>";
echo "<input type='hidden' name='pagina' value='$pag'>";
echo "<input type='hidden' name='familia' value='$select_familia'>";

?>


</div>
<br>

	<div id='enviar_carro'>Cant. <input type='text' name='cantidad' size='2' value='1'>
	<input type='image' src='../images_css/anadir.gif'></div>
</td>

<td align="left">&nbsp;</td>

</form>
</tr>

</table>
<?php centro2() ?>
<?php colDerecha1() ?>
  
    <?php if($_SESSION['autenticado']=='si'){ ?>
    
		<?php pedido()?>

<?php }?>

<?php colDerecha2() ?>
<?php pie() ?>
<br><br>