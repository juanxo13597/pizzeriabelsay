<?php
include("../seguridad.php");	
include("../../conexion.php"); //Nos conectamos a la base de datos

$id_pedido=$_GET['id_pedido'];
$mensaje=$_GET['mensaje'];
$pag="mensaje.php?id_pedido=$id_pedido";


	$id_cambiar= $_GET['id_pedido'];
	$campos="mensaje='1'";
	$sentencia="UPDATE $base . `$tabla8` SET $campos WHERE $tabla8 . id_pedido=$id_cambiar ";
	$modifica=mysqli_query($conexion, $sentencia);


$ssql_mensaje = "select mensaje from `$tabla8` WHERE id_pedido=$id_pedido";
$resultado_mensaje = mysqli_query($conexion, $ssql_mensaje);

while ($registro_sms=mysqli_fetch_row($resultado_mensaje)){
	$mensaje_mostrar=$registro_sms[0];
	}

$ssql = "select * from `$tabla8` WHERE id_pedido=$id_pedido";
$resultado = mysqli_query($conexion, $ssql);


while ($registro=mysqli_fetch_row($resultado)){
	$id_pedido=$registro[0];
	$id_usuario=$registro[1];
	$precio_total=$registro[2];
	$recogida=$registro[4];
	$estado=$registro[5];
	$comentario=$registro[6];
	$hora=$registro[8];
		$ano_pedido=substr ("$registro[8]", 0, 4);
		$mes_pedido=substr ("$registro[8]", 5, 2);
		$dia_pedido=substr ("$registro[8]", 8, 2);
	$fecha_pedido=$dia_pedido."/".$mes_pedido."/".$ano_pedido;
		$hora_pedido=substr ("$registro[7]", 0, 2);
		$minuto_pedido=substr ("$registro[7]", 3, 2);
		$segundo_pedido=substr ("$registro[7]", 6, 2);
	$hora_pedido=$hora_pedido.":".$minuto_pedido.":".$segundo_pedido;
	$direccion=$registro[10];
}

$select_cliente=mysqli_query($conexion, "select * from `$tabla1` WHERE id_usuario='".$id_usuario."'");
	while ($datos_cliente=mysqli_fetch_row($select_cliente)){
		$nombre=$datos_cliente[5];
		$telefono=$datos_cliente[10];
	}

//////////////////////////////////////////////////////////////////////////////////



?>
<head>

<link href="../estilos.css" rel="stylesheet" type="text/css" />

</head>

<body>
		
<table width='100%' height='100%'>

	<tr>
		<td></td>
	</tr>

	<tr>
	<td align='center'>
	
<form method="post" action="https://www.esendex.com/secure/messenger/formpost/SendSMS.aspx" onSubmit="informacion_pedido.php">


				<INPUT name="EsendexUsername" type="hidden" value="gesimar@gesimar.es">
				<INPUT name="EsendexPassword" type="hidden" value="NDX9538">
				<INPUT name="EsendexAccount" type="hidden" value="EX0065174">
				<INPUT name="EsendexOriginator" type="hidden" value="Pizza House">
				<INPUT name="EsendexRecipient" type="hidden" value="<?php echo $telefono; ?>">
				<TEXTAREA name="EsendexBody" rows="5" cols="100"><?php
				echo "Hola ".$nombre.". Tu pedido está listo para recoger en Pizza House. Te recordamos que el importe es de ".$precio_total." €. Gracias por tu compra.";
				?></TEXTAREA><br>
				<input type="submit" value="Enviar mensaje">


</form>
	</td>
	</tr>
	
	<tr>
		<td colspan="2" align="center"><a href="javascript:close()">Cerrar ventana</a> </td>
	</tr>

	<tr>
		<td></td>
	</tr>

</table>

</body>
</html>