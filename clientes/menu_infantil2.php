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


$ingrediente1=$_POST['ingrediente1'];
$ingrediente2=$_POST['select1'];
$ingrediente3=$_POST['select2'];
$ingrediente4=$_POST['select3'];
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


if($ingrediente1=="0" OR $ingrediente2=="0"){
	echo "<script>alert('Debe elegir al menos dos ingrediente');</script>"; 
   echo "<script type=\"text/javascript\">
	   history.go(-1);
      </script>";
	exit;
}
	$precio_base=4.50;
	

	$consulta1=mysqli_query($conexion,"SELECT * FROM $tabla6 WHERE id_ingrediente=$ingrediente1");
	while($registro=mysqli_fetch_row($consulta1))
	{		
		$nombre_ingrediente1=$registro[1];
		$precio_ingrediente1=$registro[2];
	
	
	}
if ($ingrediente2!="") {
	$consulta2=mysqli_query($conexion,"SELECT * FROM $tabla27 WHERE id_bebida=$ingrediente2");
	$registro=mysqli_fetch_row($consulta2);
			
		$nombre_ingrediente2=$registro[1];
		$precio_ingrediente2=$registro[2];

	}
if ($ingrediente3!="") {
		$consulta3=mysqli_query($conexion,"SELECT * FROM $tabla28 WHERE id_postre=$ingrediente3");
		$registro=mysqli_fetch_row($consulta3);
		
		$nombre_ingrediente3=$registro[1];
		$precio_ingrediente3=$registro[2];	
}
	
if ($ingrediente4!="") {
	$consulta4=mysqli_query($conexion,"SELECT * FROM $tabla29 WHERE id_sexo=$ingrediente4");
	$registro=mysqli_fetch_row($consulta4);
			
		$nombre_ingrediente4=$registro[1];
		$precio_ingrediente4=$registro[2];	
}

if ($ingrediente5!="") {
	$consulta5=mysqli_query($conexion,"SELECT * FROM $tabla6 WHERE id_ingrediente=$ingrediente5");
	$registro=mysqli_fetch_row($consulta5);
		 	
		$nombre_ingrediente5=$registro[1];
		$precio_ingrediente5=$registro[2];	
}



$select_familia=$_GET['cond'];
$url=$_SERVER['PHP_SELF'];  // el nombre y ruta de esta misma pÃ¡gina.
$pag="menu_infantil.php";


////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

if($ingrediente3=="0"){

	$ingredientes=$nombre_ingrediente1.", ".$nombre_ingrediente2;}

elseif($ingrediente4=="0"){

	$ingredientes=$nombre_ingrediente1.", ".$nombre_ingrediente2.", ".$nombre_ingrediente3;

}elseif($ingrediente5=="0"){

	$ingredientes=$nombre_ingrediente1.", ".$nombre_ingrediente2.", ".$nombre_ingrediente3.", ".$nombre_ingrediente4;

}else{

	$ingredientes=$nombre_ingrediente1.", ".$nombre_ingrediente2.", ".$nombre_ingrediente3.", ".$nombre_ingrediente4.", ".$nombre_ingrediente5;

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
<div id="titulo">TU MENU INFANTIL</div>
<table border="0">
	<tr>
		<td><strong>De comer => </strong></td>
		<td>
        HAMBURGUESA Carolina + PATATA Mediana
        </td>
	</tr>	
	<tr>
		<td><strong>De beber =></strong></td>
		<td><?php echo $nombre_ingrediente2; ?>
        <?php //echo "| Precio: $precio_ingrediente2 €"; ?>
        </td>
	</tr>
	

    <tr>

		<td><strong>Tu postre => </strong></td>
		
		<td>
		TARRINA HELADO
		</td>
	</tr>


	<tr>
		<td><strong>+ REGALO DE </strong> <td> <?php echo $nombre_ingrediente4; ?><td>
        
        
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

$nombre="Menu Infantil";

$campos="id_personalizada,id_pizza,id_cliente,nombre,ingredientes,familia,precios,preciol";
$datos="'$id_personalizada','$id_pizza','$id_cliente','$nombre','$ingredientes','99','$precios','$preciol'";

$sql_inserta="INSERT INTO $base.$tabla15 ($campos) VALUES ($datos)";
//echo $sql_inserta;

$inserta=mysqli_query($conexion,$sql_inserta);
$select_familia=99;
echo "<form action='carrito.php' method='POST'>";
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