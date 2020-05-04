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
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
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
	<td width="900" align="center" valign="top">
	

<div id="texto_gestion">

<?php
$fecha=date(Y."/".m."/".d);
$i=1;
?>
<form action="personalizar2.php" method="post">
<div id="personalizar">
<div id="titulo">
  <p>PIZZA PERSONALIZADA</p>
</div>
<table width="437" height="133" border="0">

	<tr>
		<td width="94">&nbsp;</td>
		<td width="111">&nbsp;</td>
		<td width="32"><div align="center">P </div></td>
		<td width="33"><div align="center">M </div></td>
		<td width="24"><div align="center">F </div></td>
	</tr>
    <tr>
    	<td>
         
        </td>
    <tr>	
	<tr>
		<td>BASE +</td>
		<td>
        <select name="select1">
        	<option value="" selected="selected">Seleciona n&ordm; ingredientes</option>
    		<option value="1">1 ingrediente</option>
    		<option value="2">2 ingrediente</option>
    		<option value="3">3 ingrediente</option>
   			<option value="4">4 ingrediente</option>
            <option value="5">5 ingrediente</option>
		</select>
	
		</td>
        
		<td><div align="center">
		  <input type="radio" value="pequeno" name="1" />
		  </div></td>
		<td><div align="center">
		  <input type="radio" value="mediano" name="2" />
		  </div></td>
		<td><div align="center">
		  <input type="radio" value="familiar" name="3" />
		  </div></td>
	</tr>
    <tr>
    	<td>
         
        </td>
    <tr>	
	<tr>
	<tr>
		<td>&nbsp;</td>
		<td align="center"><input type="submit" value="SIGUIENTE >>" align="right"></td>
		<td><div align="center"></div></td>
		<td><div align="center"></div></td>
		<td><div align="center"></div></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
        </td>
		<td><div align="center"></div></td>
		<td><div align="center"></div></td>
		<td><div align="center"></div></td>
	</tr>

</table>
</div>
</form>
</div>
<br>
<b>Base: Tomate, orégano y mozzarella</b>
<div class="nota"></div>
</td>
<td> </td>

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