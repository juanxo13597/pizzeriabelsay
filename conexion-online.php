<?php
$servidor='localhost';
$usuario='c13belsay';
$contrasena='tXhdQCicY5_';
$base='c13belsay_ol';

$tabla1='usuarios';
$tabla2='articulo';
$tabla3='estado';
$tabla4='estado_pedido';
$tabla5='familias';
$tabla6='ingredientes';
$tabla7='pago';
$tabla8='pedidos';
$tabla9='privilegios';
$tabla10='recogida';
$tabla11='solicitud';
$tabla12='imagenes_articulos';
$tabla13='ingredientes';
$tabla14='articulo_pedido';
$tabla15='personalizada';
$tabla16='contador';
$tabla17='imagenes';
$tabla18='direcciones';
$tabla19='espera';
$tabla20='ofertas';
$tabla22='tipos_oferta';
$tabla23='hotdogs_personalizados';
$tabla24='ingredientes_hotdogs';
$tabla25='helados';

if($conexion=mysqli_connect($servidor, $usuario, $contrasena, $base) ){	
//	echo "<h2>conexión establecida con el servidor</h2><br>";
}else{
//	echo "<h2>no ha sido posible conectar con el servidor</h2>";
	}
	
?>
