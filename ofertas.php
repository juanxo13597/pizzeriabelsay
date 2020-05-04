<?php
session_start();
include("includes.php");
include("conexion.php");
include("contador.php");
//include ("autenticacion.php");
?>

<?php cabecera() ?>

<body>

<?php encabezado() ?>
<?php enlaces_publico() ?>
<?php contenido1() ?>
<?php autent2() ?>

<?php centro1() ?>

<?php
$ssql_ofertas="SELECT * FROM $tabla20 WHERE visible=1";
$resultado_ofertas = mysqli_query($conexion,$ssql_ofertas);

echo "<table border='0' width='580' id='tabla_ofertas'>";
while ($registro_ofertas=mysqli_fetch_row($resultado_ofertas)){
	echo "<tr>";
		echo "<td valign='top'>";
			echo "<span class='titulo_ofertas'>".$registro_ofertas[1]."</span><br>";
			echo "<span class='texto_ofertas'>".$registro_ofertas[2]."</span><br>";
			if($_SESSION['autenticado']!='si'){
			echo "<br><span class='enlace_ofertas'><a href='solicitud.php'>Para acceder a las ofertas desde la web debes ser cliente, si aun no lo eres haz click aqu&iacute;.</a></span>";
			}else{
				if($registro_ofertas[4]==1){
				echo "<span class='enlace_ofertas'><a href='clientes/ofertas_clientes.php?idof=".$registro_ofertas[0]."'>ir a la oferta</a></span>";
				}else{
				echo "<span class='enlace_ofertas'>Esta oferta no esta disponible hoy ;-(</span>";
				}
			}
		echo "</td>";
	echo "</tr>";
	echo "<tr><td><hr></td></tr>";
}
?>
</table>

<div class="nota">&nbsp;&nbsp;&nbsp;&nbsp;*Las ofertas estar&aacute;n disponibles en funci&oacute;n al criterio establecido desde el local.</div><br><br>

<?php centro2() ?>
<?php colDerecha1() ?>




<?php colDerecha2() ?>
<?php pie() ?>
<br><br>
