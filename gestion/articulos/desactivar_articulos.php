<?php 

	include ("../seguridad.php");
	include("../includes.php");
	include("../../conexion.php"); //Nos conectamos a la base de datos
	include("enlaces.php");

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//	include ("../seguridad.php");
//	include_once ("autenticacion");
//	$usuario_auth=$_SESSION["usuario"];

include("../../conexion.php"); 
if ($_GET['accion']=="cambiar"){
	$estado=$_GET['estado_lote'];
	$campos="activo='$estado'";
	$sentencia="UPDATE $base . `$tabla2` SET $campos ";
	$modifica=mysqli_query($conexion,$sentencia);
	mysqli_close($conexion);
	
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////

$anoactual=date(Y);
$inicio=$anoactual-10;
$fin=$anoactual-80;

$id_articulo=$_GET['id_articulo'];

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////        GENERA LISTADO FAMILIAS      //////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

function generaFamilia()
{
	
	include("../../conexion.php"); //Nos conectamos a la base de datos
	
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////


?> 
<?php encabezado() ?>
<link href="../estilos.css" rel="stylesheet" type="text/css" />

<?php cabecera() ?>
<?php enlacesinternos() ?>
<?php contenido1() ?>



<?php

$activado=0;
$desactivado=1;


$criterio="id_articulo='$id_articulo'";
$ssql = "SELECT * FROM `$tabla2` WHERE ". $criterio;
$resultado = mysqli_query($conexion,$ssql);

//echo $ssql;

while ($registro=mysqli_fetch_row($resultado)){
	$id_articulo=$registro[0];
	$nombre_articulo=$registro[1];
	$ingredientes=$registro[2];
	$familia=$registro[3];
	$preciol=$registro[4];
	$precios=$registro[5];
	$imagen=$registro[7];
	$activar=$registro[6];
	
}
?>

<table border="0" width="100%">
	<tr>
		<td></td>
		<td widht="800" align="center">

<br>
<form action="desactivar_articulos3.php" method="post">
<input type="hidden" name="id_articulo" value="<?php echo $id_articulo; ?>">
<input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
<table border="0" id="alta_clientes" >
	<tr>
		<td colspan="2" id="titulo_alta_clientes">MODIFICAR ARTICULOS</td>
	</tr>

	<tr>
		<td>Nombre:</td><td><?php echo $nombre_articulo; ?></td>
	</tr>

	<tr>
		<td>Familia:</td><td><?php echo $familia; ?></td>
	</tr>

	<tr>
    <?php if($activar==0){ ?>
		
        
        <input type="hidden" name="activo" value="1" readonly>
              
     </tr>   
    <?php }?>
        
        <?php if ($activar==1){ ?>
      
        <input type="hidden" name="activo" value="0" readonly>
        
        <?php }?>
        
        
     </tr>   
<?php {

///////////////////////		GENERA LAS OFERTAS   ///////////////////////
include("../../conexion.php");
$ssql_estado_lote = "select activo from `$tabla2`";
$resultado_estado_lote = mysqli_query($conexion,$ssql_estado_lote);
while ($registro_estado_lote=mysqli_fetch_row($resultado_estado_lote)){
	$estado_lote=$registro_estado_lote[0];
	}
		echo "
		<tr>
		<td colspan='2' align='right'><br>";
	if($activar==0){
			
		echo "<input type='submit' value='DESACTIVAR' id='boton'>"; 

		}else{
	
			echo "<input type='submit' value='ACTIVAR' id='boton'>";
		};
		
		echo "</td>
		
		</tr>";					
}
?>    
    
        
	</tr>

</table>

</form>

	</td>
	<td></td>
	</table>
<?php contenido2() ?>

<?php pie() ?>