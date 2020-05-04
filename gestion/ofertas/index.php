<?php 
	include ("../seguridad.php");
	include("../../conexion.php"); //Nos conectamos a la base de datos

if ($_GET['accion']=="mostrar"){
	$id_mostrar=$_GET['id'];
	$campos="visible='1'";
	$sentencia="UPDATE $base . `$tabla20` SET $campos WHERE $tabla20 . id_oferta=$id_mostrar ";
	$modifica=mysqli_query($conexion,$sentencia);
	mysqli_close($conexion);
	$pagina=$_GET['pagina'];
	header ("Location: index.php");
	exit;
}

if ($_GET['accion']=="ocultar"){
	$id_mostrar=$_GET['id'];
	$campos="visible='0'";
	$sentencia="UPDATE $base . `$tabla20` SET $campos WHERE $tabla20 . id_oferta=$id_mostrar ";
	$modifica=mysqli_query($conexion,$sentencia);
	mysqli_close($conexion);
	$pagina=$_GET['pagina'];
	header ("Location: index.php");
	exit;
}

if ($_GET['accion']=="activar"){
	$id_mostrar=$_GET['id'];
	$campos="activa='1'";
	$sentencia="UPDATE $base . `$tabla20` SET $campos WHERE $tabla20 . id_oferta=$id_mostrar ";
	$modifica=mysqli_query($conexion,$sentencia);
	mysqli_close($conexion);
	$pagina=$_GET['pagina'];
	header ("Location: index.php");
	exit;
}

if ($_GET['accion']=="desactivar"){
	$id_mostrar=$_GET['id'];
	$campos="activa='0'";
	$sentencia="UPDATE $base . `$tabla20` SET $campos WHERE $tabla20 . id_oferta=$id_mostrar ";
	$modifica=mysqli_query($conexion,$sentencia);
	mysqli_close($conexion);
	$pagina=$_GET['pagina'];
	header ("Location: index.php");
	exit;
}


	include("enlaces.php");
	include("../includes.php");
?> 
<?php encabezado() ?>
<link href="../estilos.css" rel="stylesheet" type="text/css" />

<?php cabecera() ?>
<?php enlacesinternos() ?>
<?php contenido1() ?>
<!--
<a><b>OFERTAS</b></a>
<p></p>

<table border='0' width='100%'>
<tr>

<td>&nbsp;
	
</td>

<td align='center'>

<table border='0' id='ofertas'>

	<tr>
		<td id='titulo_ofertas'>Titulo</td>
		<td id='titulo_ofertas'>Visible</td>
		<td id='titulo_ofertas'>Disponibles</td>
	</tr>


<?php

///////////////////////		GENERA LAS OFERTAS   ///////////////////////

$ssql_ofertas = "select * from `$tabla20`";

$resultado_ofertas = mysqli_query($conexion,$ssql_ofertas);
/*
while ($ofertas=mysqli_fetch_row($resultado_ofertas)){

	echo "<tr>";
		echo "<td>".$ofertas[1]."</td>";
		echo "<td>";
			if($ofertas[3]==1){
				echo "<a href='?accion=ocultar&id=$ofertas[0]'><div id='desactivar_oferta'>Ocultar oferta</div></a>";
			}else{
				echo "<a href='?accion=mostrar&id=$ofertas[0]'><div id='activar_oferta'>Mostrar oferta</div></a>";
			}
		
		echo "</td>";
		echo "<td>";
			if($ofertas[4]==1){
				echo "<a href='?accion=desactivar&id=$ofertas[0]'><div id='desactivar_oferta'>Desactivar oferta</div></a>";
			}else{
				echo "<a href='?accion=activar&id=$ofertas[0]'><div id='activar_oferta'>Activar oferta</div></a>";
			}		
		echo "</td>";
	echo "</tr>";

}
*/
?>

</table>
<br>
</td>

<td>&nbsp;
	
</td>

</tr>

</table>

(*) Cuando las ofertas estan visibles es cuando el cliente puede ver que existen, en modo informativo y para que las lleven a cabo. Si las ofertas est&aacute;n activas, el cliente puede usarlas.<br>
(**) Para que el cliente pueda usar las ofertas deben estar activas y visibles.<br><br>
-->
<a><b>LOTES DE AHORRO</b></a>
<p></p>

<table border='0' width='100%'>
<tr>

<td>&nbsp;
	
</td>

<td align='center'>

<table border='0' id='ofertas'>

	<tr>
		<td id='titulo_ofertas'>Lote</td>
		<td id='titulo_ofertas'>Visible</td>
		
	</tr>

<?php {
	include ("../seguridad.php");
//	include_once ("autenticacion");
	$usuario_auth=$_SESSION["usuario"];
include("../../conexion.php"); 
if ($_GET['accion']=="cambiar2"){
	$estado=$_GET['estado_lote'];
	$campos="id_estado='$estado'";
	$sentencia="UPDATE $base . `$tabla26` SET $campos";
	$modifica=mysqli_query($conexion,$sentencia);
	mysqli_close($conexion);
	//echo $sentencia;
	//header ("Location: index.php");
	//exit;
}

///////////////////////		GENERA LAS OFERTAS   ///////////////////////
include("../../conexion.php");
$ssql_estado_lote = "select id_estado from `$tabla26`";
$resultado_estado_lote = mysqli_query($conexion,$ssql_estado_lote);
while ($registro_estado_lote=mysqli_fetch_row($resultado_estado_lote)){
	$estado_lote=$registro_estado_lote[0];
	}

	echo "<tr>";

	echo "<td>LOTE 10&euro; </td>";
	echo "<td>";
	//echo $estado;
		if($estado==1){
						echo "<a href='?accion=cambiar2&estado_lote=0'><div id='desactivar_oferta'>Desactivar Lote</a></div>";
					}elseif($estado==0){
						echo "<a href='?accion=cambiar2&estado_lote=1'><div id='activar_oferta'>Activar Lote</a></div>";
					}
		
		echo "</td>";
}

/*	echo "<tr>";

	echo "<tr>";

	echo "<td> LOTE 18&euro; </td>";
	echo "<td>";
		if($estado==1){
						echo "<a href='?accion=cambiar&estado=0'><div id='desactivar_oferta'>Desactivar Lote</a></div>";
					}elseif($estado==0){
						echo "<a href='?accion=cambiar&estado=1'><div id='activar_oferta'>Activar Lote</a></div>";
					}
		
		echo "</td>";
		
	echo "<tr>";

*/

?>

</table>
<br>
</td>

<td>&nbsp;
	
</td>

</tr>

</table>


<?php contenido2() ?>

<?php pie() ?>
