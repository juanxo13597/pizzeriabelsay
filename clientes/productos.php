<?php session_start(); 
	  include("../conexion.php");
	  include("../includes.php"); ?>
      <meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
<?php include("enlaces.php"); //Nos conectamos a la base de datos


	//include ("../autenticacion");

$select_familia=$_GET['cond'];
$url=$_SERVER['PHP_SELF'];  // el nombre y ruta de esta misma página.
$pag=$url."?".cond."=".$select_familia;

/////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////      PAGINACI�N     //////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////


$TAMANO_PAGINA = 100;

//examino la p�gina a mostrar y el inicio del registro a mostrar
$pagina = $_GET["pagina"];
if (!$pagina) {
    $inicio = 0;
    $pagina=1;
}
else {
    $inicio = ($pagina - 1) * $TAMANO_PAGINA;
}


//miro a ver el n�mero total de campos que hay en la tabla con esa b�squeda
$ssql = "select * from `$tabla2` WHERE familia='$select_familia' ";
$rs = mysqli_query($conexion,$ssql);
$num_total_registros = mysqli_num_rows($rs);
//calculo el total de p�ginas
$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);

/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////        GENERA LISTADO INGREDIENTES  A�ADIDO    //////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

function IngredienteMas()
{
	include("../conexion.php"); //Nos conectamos a la base de datos
	$consulta_ingredientes=mysqli_query($conexion,"SELECT * FROM $tabla13");
	echo "<select name='ingrediente_mas'>";
	echo "<option value='0'>Elige el ingrediente</option>";
	while($registro_ingredientes=mysqli_fetch_row($consulta_ingredientes))
	{
		echo "<option value='".$registro_ingredientes[0]."'>".$registro_ingredientes[1]."</option>";
	}
	echo "</select>";
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////        GENERA LISTADO INGREDIENTES  RESTADO  //////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

function IngredienteMenos()
{
	include("../conexion.php"); //Nos conectamos a la base de datos
	$consulta_ingredientes=mysqli_query($conexion,"SELECT * FROM $tabla13");
	echo "<select name='ingrediente_menos'>";
	echo "<option value='0'>Elige el ingrediente</option>";
	while($registro_ingredientes=mysqli_fetch_row($consulta_ingredientes))
	{
		echo "<option value='".$registro_ingredientes[0]."'>".$registro_ingredientes[1]."</option>";
	}
	echo "</select>";
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////                  GENERA SALSAS MEXICANAS       //////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

function selectSalsas(){
	include("../conexion.php"); //Nos conectamos a la base de datos
	$consulta_salsas=mysqli_query($conexion,"SELECT * FROM $tabla2 WHERE familia='17'");
	
	echo "<table border='0' id='masa' width='350'><tr><td align='center'>";
	echo "<select id='salsa' name='salsa'>";
	echo "<option value='0'>Elige una salsa</option>";
	while($registro_salsas=mysqli_fetch_row($consulta_salsas))
	{
		echo "<option value='".$registro_salsas[0]."'>".$registro_salsas[1]."</option>";
	}
	echo "</select>";
	echo "</td></tr>";
	echo "</table>";

}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////                  GENERA SELECT HELADOS       //////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

function selectHelados(){
	include("../conexion.php"); //Nos conectamos a la base de datos
	$consulta_helados1=mysqli_query($conexion,"SELECT * FROM $tabla2 WHERE familia='18'");
	$consulta_helados2=mysqli_query($conexion,"SELECT * FROM $tabla2 WHERE familia='18'");
	
	echo "<table border='0' id='masa' width='350'>";
	echo "<tr>";
	echo "<td align='center'>";
	echo "<select id='helados' name='sabor1'>";
	echo "<option value='0'>Elige el sabor</option>";
	while($registro_helados1=mysqli_fetch_row($consulta_helados1))
	{
		echo "<option value='".$registro_helados1[0]."'>".$registro_helados1[1]."</option>";
	}
	echo "</select>";
	echo "</td>";

	echo "<td align='center'>";
	echo "<select id='helados' name='sabor2'>";
	echo "<option value='0'>Elige el sabor</option>";
	while($registro_helados2=mysqli_fetch_row($consulta_helados2))
	{
		echo "<option value='".$registro_helados2[0]."'>".$registro_helados2[1]."</option>";
	}
	echo "</select>";
	echo "</td>";
	echo "</tr>";
	echo "</table>";

}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////                  GENERA FAMILIA         //////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

	$consulta_familia=mysqli_query($conexion,"SELECT nombre_familia FROM $tabla5 WHERE id_familia=$select_familia");

	while($nombre_familia=mysqli_fetch_row($consulta_familia))
	{
		$familia=$nombre_familia[0];
	}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////


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

	<td> </td>
	<td align="center" valign="top">
	

<div id="texto_gestion">

<?php 	///////////////////////  FUNCION PARA PERSONALIZAR PIZZA  ////////////////////////
if($familia=="PIZZAS"){
echo "<div id='titulo_carta'>".$familia." </div><br>
<a href='personalizar.php'>PERSONALIZA TU PIZZA</a><br>";

}else{
echo "<div id='titulo_carta'>".$familia."</div><br>";
}
if($select_familia==1){
	/*echo "<table width='580' border='0'><tr><td align='right'>";
	echo "<div id='personaliza'><a href='personalizar.php'>Personaliza tu pizza</a></div>";
	echo "</td></tr></table>";
	*/
}

if($select_familia==3){
	/*echo "<table width='580' border='0'><tr><td align='right'>";
	echo "<div id='personaliza'><a href='personalizar_hotdogs.php'>Personaliza tu HOT DOG</a></div>";
	echo "</td></tr></table>";
	*/
}

/////////////////////////////////////////////////////////////
$ssql = "select * from `$tabla2` WHERE familia='$select_familia' limit " . $inicio . "," . $TAMANO_PAGINA;
$resultado = mysqli_query($conexion,$ssql);
/////////////////////////////////////////////////////////////
$fecha=date(Y."/".m."/".d);
$i=1;
echo "<hr>";
while ($registro=mysqli_fetch_row($resultado)){
	if($_SESSION['autenticado']=='si'){

echo "<form action='carrito.php' method='POST'>";
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////AKI LOTES ACTIV/DESAC//////////////////////
//////////////////////articulos////////////////////////////////////////////////////
$ssql_estado_articulo = "select activo from `$tabla2`";
$resultado_estado_articulo = mysqli_query($conexion,$ssql_estado_articulo);
while ($registro_estado_articulo=mysqli_fetch_row($resultado_estado_articulo)){
	$estado_articulo=$registro_estado_articulo[0];
	}
/////////////////////////lotes//////////////////////////////////////////////////
$ssql_estado_lote = "select id_estado from `$tabla26`";
$resultado_estado_lote = mysqli_query($conexion,$ssql_estado_lote);
while ($registro_estado_lote=mysqli_fetch_row($resultado_estado_lote)){
	$estado_lote=$registro_estado_lote[0];
	}

//////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////TERMINA///////////////////////////
echo "<table border='0' width='580'><tr>";
if($select_familia==105){
	echo "<td rowspan='3' width='50'></td>";
	echo "<td width='400'><div id='titulo_producto'>".$registro[1]."</div></td>";
	echo "<td width='80' align='center' rowspan='2'>";
}else{
//echo "<td rowspan='3' width='100'><a href='$registro[9]' rel='lightbox'><img src='$registro[8]' alt='' /></a></td>"; IMG FOTO PRODUCTO
echo "<td width='400'><div id='titulo_producto'>".$registro[1]."</div></td>";
echo "<td width='80' align='center' rowspan='2'>";
}


/*
if($select_familia==1){
	echo "<div id='precio'>L: ";
	printf("%.2f", $registro[4]);
	echo " &euro;</div>";
	echo "<div id='precio'>S: ";
	printf("%.2f", $registro[5]);
	echo " &euro;</div>";
}else{
*/
//$precio2=$registro[10]*2;
/*/////////////////// PRECIOS /////////////////////////////*/
if($registro[3]=="1"){                ////////////////////// pizza
	
		echo "<div id='precio'>";
		printf("%.2f", $registro[10]);
		echo " &euro; P</div><hr></hr>";
		
		echo "<div id='precio'>";
		printf("%.2f", $registro[11]);
		echo " &euro; M</div><hr></hr>";
		
		echo "<div id='precio'>";
		printf("%.2f", $registro[12]);
		echo " &euro; F</div>";	
	

}elseif($registro[3]=="2"){           /////////////////////chapata
		echo "<div id='precio'>";
		printf("%.2f", $registro[11]);
		echo " &euro; M</div><hr></hr>";
		
		echo "<div id='precio'>";
		printf("%.2f", $registro[12]);
		echo " &euro; F</div>";	
	
}
else{ ///// Precio para todos los demas productos  /////
		echo "<div id='precio'>";
		printf("%.2f", $registro[10]);
		echo " &euro;</div>";
}

	
echo "</td></tr>";
echo "<tr><td rowspan='1' valign='top'><div id='ingredientes'>".$registro[2]."</div></td></tr>";
echo "<tr>";
$cliente=$_SESSION["id"];
echo "<td colspan='2' align='right'>";

if($registro[3]=="1"){    //////////////PIZZASSSS /////////////////       
//echo $registro[3];
	
	
	echo "<table border='0' id='masa' width='350'>";
	echo "<tr><td>Tama&ntilde;o</td></tr>";
	echo "<tr><td>";
	
		echo "PEQ <input type='radio' name='tamano' value='1' checked='checked'>| ";
		
		echo "MED <input type='radio' name='tamano' value='2' >| ";

		echo "FAM <input type='radio' name='tamano' value='3' > ";
				
		echo "</td></tr>";
		
		echo "<tr><td>Bases</td></tr>";
		
		echo "<tr><td><input type='radio' name='base' value='1' checked='checked'>Base 1: Tomate, or&eacute;gano y mozzarella.</td></tr>";
		
		echo "<tr><td><input type='radio' name='base' value='2'>Base 2: Queso Philadelphia y mozzarella.</td></tr>";
		
		echo "<tr><td><input type='radio' name='base' value='3'>Base 3: Salsa Mexicana y mozzarella.</td></tr>";
		
		
	echo "</table>";


}elseif($registro[3]=="2"){    //////////////CHAPATA /////////////////       
//echo $registro[3];


	echo "<table border='0' id='masa' width='350'>";
	echo "<td>Tama&ntilde;o</td>";
	
	echo "<td>";
		
		echo "MED <input type='radio' name='tamano' value='2' checked>| ";

		echo "FAM <input type='radio' name='tamano' value='3' > ";
		
		echo "</td>";
	echo "</table>";

}else{    //////////////resto /////////////////       
//echo $registro[3];


	echo "<table border='0' id='masa' width='350'>";
	
	
	echo "<td>";
		
		echo "<input type='hidden' name='tamano' value='1'>";
		
	echo "</td>";
	
	echo "</table>";

}
if($registro[3]=="14"){    //////////////BURGERLANDIA /////////////////       

	
	
	echo "<table border='0' id='masa' width='350'>";
	echo "<td></td></tr>";
	echo "<tr><td>";
		
	
			$consulta_mysq_bbd="select * FROM $tabla2 WHERE familia=10";
            $resultado_consulta_mysq_bbd=mysqli_query($conexion,$consulta_mysq_bbd);
			
				echo "REFRESCO 33cl: <select name='bebida_mix'>";
				while($fila_bbd=mysqli_fetch_array($resultado_consulta_mysq_bbd)){
					echo "<option value='".$fila_bbd['nombre']."'>".$fila_bbd['nombre']."</option>";
			
				}
			
		
			echo "</td>";
		echo "</td></tr>";
	echo "</table>";


}
if($registro[3]=="15"){    //////////////BOCA MIX /////////////////       

	
	
	echo "<table border='0' id='masa' width='350'>";
	echo "<td></td></tr>";
	echo "<tr><td>";
	
			$consulta_mysql4="select * FROM $tabla2 WHERE familia=7";
            $resultado_consulta_mysql4=mysqli_query($conexion,$consulta_mysql4);
			
				echo "BOCATA: <select name='bocata'>";
				while($fila4=mysqli_fetch_array($resultado_consulta_mysql4)){
					echo "<option value='".$fila4['nombre']."'>".$fila4['nombre']."</option>";
				
				}
				echo "<td>";
		
	
			$consulta_mysq_bbd="select * FROM $tabla2 WHERE familia=10";
            $resultado_consulta_mysq_bbd=mysqli_query($conexion,$consulta_mysq_bbd);
			
				echo "REFRESCO: <select name='bebida_mix'>";
				while($fila_bbd=mysqli_fetch_array($resultado_consulta_mysq_bbd)){
					echo "<option value='".$fila_bbd['nombre']."'>".$fila_bbd['nombre']."</option>";
			
				}
			
		
			echo "</td>";
		echo "</td></tr>";
	echo "</table>";


}
if($registro[3]=="12"){    //////////////PARA 2 /////////////////       

	
	
	echo "<table border='0' id='masa' width='350'>";
	echo "<td></td></tr>";
	echo "<tr><td>";
	
			$consulta_mysql4="select * FROM $tabla13 ";
            $resultado_consulta_mysql4=mysqli_query($conexion,$consulta_mysql4);
			
				echo "<b>1º Ingrediente: &nbsp;&nbsp;&nbsp;&nbsp;</b><select name='ingred1'>";
				while($fila4=mysqli_fetch_array($resultado_consulta_mysql4)){
					echo "<option value='".$fila4['nombre']."'>".$fila4['nombre']."</option>";
				
				}
			echo "<td>";
			
			$consulta_mysql4="select * FROM $tabla13 ";
            $resultado_consulta_mysql4=mysqli_query($conexion,$consulta_mysql4);
			
				echo "<b>2º Ingrediente: &nbsp;&nbsp;&nbsp;&nbsp; </b><select name='ingred2'>";
				while($fila4=mysqli_fetch_array($resultado_consulta_mysql4)){
					echo "<option value='".$fila4['nombre']."'>".$fila4['nombre']."</option>";
				
				}
		
			echo "</td>";
			
			
		echo "<tr><td>";	
			
				
			$consulta_mysql4="select * FROM $tabla13 ";
            $resultado_consulta_mysql4=mysqli_query($conexion,$consulta_mysql4);
			
				echo "<b>3º Ingrediente: &nbsp;&nbsp;&nbsp;&nbsp;</b><select name='ingred3'>";
				while($fila4=mysqli_fetch_array($resultado_consulta_mysql4)){
					echo "<option value='".$fila4['nombre']."'>".$fila4['nombre']."</option>";
				
				}
				
			echo "<td>";
			
			
		
			echo "</td>";
			
		
			echo "</td></tr>";
		
			echo "<tr><td>";	
			
				
			$consulta_mysql4="select * FROM $tabla2 WHERE familia=10";
            $resultado_consulta_mysql4=mysqli_query($conexion,$consulta_mysql4);
			
				echo "<b>1� REFRESCO: </b><select name='bebida_mix'>";
				while($fila4=mysqli_fetch_array($resultado_consulta_mysql4)){
					echo "<option value='".$fila4['nombre']."'>".$fila4['nombre']."</option>";
				
				}
				
			echo "<td>";
			
			
			$consulta_mysq_bbd="select * FROM $tabla2 WHERE familia=10";
            $resultado_consulta_mysq_bbd=mysqli_query($conexion,$consulta_mysq_bbd);
			
				echo "<b>2º REFRESCO: </b><select name='bebida'>";
				while($fila_bbd=mysqli_fetch_array($resultado_consulta_mysq_bbd)){
					echo "<option value='".$fila_bbd['nombre']."'>".$fila_bbd['nombre']."</option>";
			
				}
			echo "</td>";
			
		
			echo "</td></tr>";
			
		echo "</td></tr>";
	echo "</table>";


}
if($registro[3]=="16"){    //////////////Menu FAMILIAR /////////////////       

	
	
	echo "<table border='0' id='masa' width='350'>";
	echo "<td></td></tr>";
	echo "<tr><td>";
	
			$consulta_mysql4="select * FROM $tabla13 ";
            $resultado_consulta_mysql4=mysqli_query($conexion,$consulta_mysql4);
			
				echo "<b>1º Ingrediente: &nbsp;&nbsp;&nbsp;&nbsp;</b><select name='ingred1'>";
				while($fila4=mysqli_fetch_array($resultado_consulta_mysql4)){
					echo "<option value='".$fila4['nombre']."'>".$fila4['nombre']."</option>";
				
				}
			echo "<td>";
			
			$consulta_mysql4="select * FROM $tabla13 ";
            $resultado_consulta_mysql4=mysqli_query($conexion,$consulta_mysql4);
			
				echo "<b>2º Ingrediente: &nbsp;&nbsp;&nbsp;&nbsp; </b><select name='ingred2'>";
				while($fila4=mysqli_fetch_array($resultado_consulta_mysql4)){
					echo "<option value='".$fila4['nombre']."'>".$fila4['nombre']."</option>";
				
				}
		
			echo "</td>";
			
			
		echo "<tr><td>";	
			
				
			$consulta_mysql4="select * FROM $tabla13 ";
            $resultado_consulta_mysql4=mysqli_query($conexion,$consulta_mysql4);
			
				echo "<b>3º Ingrediente: &nbsp;&nbsp;&nbsp;&nbsp;</b><select name='ingred3'>";
				while($fila4=mysqli_fetch_array($resultado_consulta_mysql4)){
					echo "<option value='".$fila4['nombre']."'>".$fila4['nombre']."</option>";
				
				}
				
			echo "<td>";
			
			
		
			echo "</td>";
			
		
			echo "</td></tr>";
		
			echo "<tr><td>";	
			
				
			$consulta_mysql4="select * FROM $tabla2 WHERE familia=10";
            $resultado_consulta_mysql4=mysqli_query($conexion,$consulta_mysql4);
			
				echo "<b>REFRESCO 2L: </b><select name='bebida_mix'>";
				while($fila4=mysqli_fetch_array($resultado_consulta_mysql4)){
					echo "<option value='".$fila4['nombre']."'>".$fila4['nombre']."</option>";
				
				}
				
			echo "<td>";
	
		
			echo "</td></tr>";
			
		echo "</td></tr>";
	echo "</table>";


}




/////////////////////////////////////////DESACTIVA TODOS LOS PRODUCTOS!!!////////////////////////////////////////////					
if ($registro[0] and $registro[6]==1){	
						
echo "<div id='producto_agotado'>";
echo "<a>Este producto esta agotado en estos momentos.</a>";
echo " </div>";
echo "</td></tr>";
echo "</table>";
echo "<hr>";	
echo "</form>";
}else{
/////////////////////////////////////////FIN ////////////////////////////////////////////	
	//echo $registro[0];
	//echo $estado_lote;
	if ($registro[0]==94 and $estado_lote==0){	
		
	echo "<div id='producto_agotado'>";
	echo "<a>Este producto esta agotado en estos momentos.</a>";
	echo " </div>";
	echo "</td></tr>";
	echo "</table>";
	echo "<hr>";	
	echo "</form>";
	}else{

		if ($registro[0]==146 and $estado_lote==0){	
			
		echo "<div id='producto_agotado'>";
		echo "<a>Este producto esta agotado en estos momentos.</a>";
		echo " </div>";
		echo "</td></tr>";
		echo "</table>";
		echo "<hr>";	
		echo "</form>";
		}else{

			if ($registro[0]==148 and $estado_lote==0){	
				
			echo "<div id='producto_agotado'>";
			echo "<a>Este producto esta agotado en estos momentos.</a>";
			echo " </div>";
			echo "</td></tr>";
			echo "</table>";
			echo "<hr>";	
			echo "</form>";
			}else{

					if ($registro[0]==170 and $estado_lote==0){	
						
					echo "<div id='producto_agotado'>";
					echo "<a>Este producto esta agotado en estos momentos.</a>";
					echo " </div>";
					echo "</td></tr>";
					echo "</table>";
					echo "<hr>";	
					echo "</form>";
					}else{

if ($registro[0]==148){  ////LOTE 3

?>

<a href="lotes_personalizados.php"> PEDIR</a>

<?php


}elseif ($registro[0]==170){ /////LOTE 4

?>

<a href="lotes_personalizados_2.php"> PEDIR</a>

<?php

}else{
	
echo "<div id='enviar_carro'>";
echo "Cant. <input type='text' name='cantidad' size='2' value='1'>";
echo "<input type='hidden' name='precioP' value='$registro[10]'>";

echo "<input type='image' src='../images_css/anadir.gif'></div>";
}
echo "</td></tr>";
echo "</table>";
echo "<hr>";

echo "<input type='hidden' name='id_articulo' value='$registro[0]'>";
echo "<input type='hidden' name='precioP' value='$registro[10]'>";
echo "<input type='hidden' name='precioM' value='$registro[11]'>";
echo "<input type='hidden' name='precioF' value='$registro[12]'>";
echo "<input type='hidden' name='cliente' value='$cliente'>";
echo "<input type='hidden' name='fecha' value='$fecha'>";
echo "<input type='hidden' name='pagina' value='$pag'>";
echo "<input type='hidden' name='familia' value='$select_familia'>";
echo "</form>";
					}
				}
			}
		}
	}

}



//cerramos el conjunto de resultado y la conexi�n con la base de datos
mysqli_free_result($rs);

//muestro los distintos �ndices de las p�ginas, si es que hay varias p�ginas
$pag_anterior=$pagina-1;
$pag_siguiente=$pagina+1;
?>
</div>
<br>



</td>
<td></td>

</tr>

</table>

<?php centro2() ?>
<?php colDerecha1() ?>
  
  <?php if($_SESSION['autenticado']=='si'){ ?>
<?php pedido() ?>

<?php }?>

<?php colDerecha2() ?>
<?php pie() ?>
<br><br>