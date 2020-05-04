<?php function encabezado(){
	include ("../seguridad.php");
//	include_once ("autenticacion");
	$usuario_auth=$_SESSION["usuario"];
	include("../../conexion.php"); //Nos conectamos a la base de datos
if ($_GET['accion']=="cambiar"){
	$estado=$_GET['estado'];
	$campos="id_estado='$estado'";
	$sentencia="UPDATE $base . `$tabla3` SET $campos";
	$modifica=mysqli_query($conexion,$sentencia);
	mysqli_close($conexion);
	//echo $sentencia;
	//header ("Location: index.php");
	//exit;
}

if ($_GET['accion2']=="cambiar2"){
	$estado2=$_GET['estado2'];
	$campos="id_estado='$estado2'";
	$sentencia="UPDATE $base . `$tabla31` SET $campos";
	$modifica=mysqli_query($conexion,$sentencia);
	mysqli_close($conexion);
	//echo $sentencia;
	//header ("Location: index.php");
	//exit;
}


?>

<html>

<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1"/>
<link href="estilos.css" rel="stylesheet" type="text/css" />

<?php } ?> 

<?php function cabecera(){ ?>
</head>

<body>
<?php
include("../../conexion.php"); /////// ABRIR ASADOR 
$ssql_estado = "select * from `$tabla3`";
$resultado_estado = mysqli_query($conexion,$ssql_estado);
while ($registro_estado=mysqli_fetch_row($resultado_estado)){
	$estado=$registro_estado[0];
	}
	
include("../../conexion.php"); ////// ABRIR REPARTO
$ssql_estado2 = "select * from `$tabla31`";
$resultado_estado2 = mysqli_query($conexion,$ssql_estado2);
while ($registro_estado2=mysqli_fetch_row($resultado_estado2)){
	$estado2=$registro_estado2[0];
	}
?>
<table border="0" height="100%" width="100%">

<tr> 
	<td>&nbsp;</td>

	<td width="1000" valign="top">
		<div id="cabecera">
			<div id="enlaces_sup">
			<?php
				echo "Usuario: <b>".$_SESSION["nombre"]."</b>";
				echo " | <a href='../../index.php' target='_blank'>Portal</a>";
				echo " | <a href='../../salir.php'>Salir</a>";
			?>
			</div>
			
			<div id='abrir'>
				<?php

					if($estado==1){
						echo "<a href='?accion=cambiar&estado=0'><div id='accion'>CERRAR PIZZERIA ONLINE</a></div>";
					}elseif($estado==0){
						echo "<a href='?accion=cambiar&estado=1'><div id='accion2'>ABRIR PIZZERIA ONLINE</a></div>";
					}
				
					if($estado2==1){
						echo "<a href='?accion2=cambiar2&estado2=0'><br><div id='accion21'>CERRAR REPARTO A DOMICILIO</a></div><br>";
					}elseif($estado2==0){
						echo "<a href='?accion2=cambiar2&estado2=1'><br><div id='accion21'>ABRIR REPARTO A DOMICILIO</a></div><br>";
					}
				?>
		</div>
	
		<div id="contenido">


<?php } ?>

<?php function enlaces(){ ?>
			<div id="enlaces">
					<table border="0" id="menu">
						<tr>
							<td valign="bottom" id="selected1"><div id="boton_menu_select"><a href="index.php" id="selected3">gestion</a></div></td>
							<td valign="bottom"><div id="boton_menu"><a href="clientes/alta_clientes.php"><img src="imagenes/cliente.gif" border="0"> Clientes</a></div></td>
							<td valign="bottom"><div id="boton_menu"><a href="http://www.google.es">texto</a></div></td>
							<td valign="bottom"><div id="boton_menu"><a href="http://www.google.es">texto</a></div></td>
						</tr>
					
					</table>				
			</div>
		
			<div id="franja"></div>

<?php } ?>

<?php function contenido1(){ ?>

			<div id="texto">  <!--oOoOoOoOoOoO      Cuadro de texto con todo el contenido 0oOoOoOoOoOoO-->
<?php } ?>
		
		
		
		
<?php function contenido2(){ ?>
			</div>
		
		</div>
<?php } ?>
	
<?php function pie(){ ?>

	<br>
	
	</td>

	<td>&nbsp;</td>
</tr>


</table>




</body>
</html>
<?php } ?>