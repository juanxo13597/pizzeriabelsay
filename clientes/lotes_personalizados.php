<?php session_start(); 
	  include("../conexion.php"); //Nos conectamos a la base de datos
	//include("../seguridad.php");
	//include ("../autenticacion");


$select_familia=$_GET['cond'];
$url=$_SERVER['PHP_SELF'];  // el nombre y ruta de esta misma pÃ¡gina.
$pag=$url."?".cond."=".$select_familia;


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

<?php
///////////////////// SELECIONA EL ARTICULO //////////////////////
	$ssql_pedidos = "select * from `$tabla5`";
	$resultado_pedidos = mysqli_query($conexion,$ssql_pedidos);
	
	while ($articulos=mysqli_fetch_row($resultado_pedidos)){

//echo $articulos[0];
	
?>
<?php 
if($articulos[0]==1000){
?>	
<table border="0" width="100%">


<tr>

	<td> </td>
	<td width="900" align="center" valign="top">
	

<div id="texto_gestion">


<form action="lotes_personalizados2.php" method="post">
<div id="personalizar">
<div id="titulo">
  <p>TU LOTE PERSONALIZADO</p>
</div>
<table border="0">

	<tr>
		<td>
        PESCAO FRITO 
<br />
<br />
		ENSALADILLA RUSA 
<br />
<br />
		+ 2 Postre 
        
        
        </td>
		
	</tr>

		<td>Postre 1: </td>
		<td>
			<?php generaSelect3(); ?>
		</td>
      <tr>  
        	<td>Postre 2:</td>
		<td>
			<?php generaSelect4(); ?>
		</td>
       </tr>
	</tr>
    
    
	<tr>
	
	
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" value="PEDIR"></td>
	</tr>
</table>
</div>
</form>
</div>
<br>

<div class="nota"></div>
</td>
<td> </td>

</tr>

</table>
<?php }?>

<?php 
if($articulos[0]==1001){
?>
<!--	
<table border="0" width="100%">


<tr>

	<td> </td>
	<td width="900" align="center" valign="top">
	

<div id="texto_gestion">


<form action="lotes_personalizados2.php" method="post">
<div id="personalizar">
<div id="titulo">
  <p>TU LOTE PERSONALIZADO</p>
</div>
<table border="0">

	<tr>
		<td>
        1/4 NUGUETT
<br />
<br />
		ENSALADILLA RUSA 
<br />
<br />
	1 PIZZA FAMILIAR A ELEGIR
        
        </td>
		
	</tr>

		<td>Pizza: </td>
		<td>
			<?php generaSelect5(); ?>
		</td>
 
	</tr>
    
    
	<tr>
	
	
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" value="PEDIR"></td>
	</tr>
</table>
</div>
</form>
</div>
<br>

<div class="nota"></div>
</td>
<td> </td>

</tr>

</table>
-->
<?php }?>

<?php } ?>
<?php centro2() ?>
<?php colDerecha1() ?>
  
  <?php if($_SESSION['autenticado']=='si'){ ?>
<?php pedido() ?>

<?php }?>

<?php colDerecha2() ?>
<?php pie() ?>
<br><br>