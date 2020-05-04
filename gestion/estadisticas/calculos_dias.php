<!--  o0o0o0o0o0o0o0o0o0o0     VISITANTES ANONIMOS POR DIA    o0o0o0o0o0o0o0o0o0o0   -->

<?php
	include_once("../../conexion.php"); //Nos conectamos a la base de datos
$hoy_dia=time();
$primer_dia = time()-(6*24*60*60);
//echo $hoy_dia."<br>";
//echo $primer_dia."<br>";
$hoy_dia_formato = date('Y-m-d', $hoy_dia);
$primer_dia_formato = date('Y-m-d', $primer_dia);
//echo $hoy_dia_formato."<br>";
//echo $primer_dia_formato."<br>";


//$numero_semana = $primera_semana; $numero_semana <= $ultima_semana; $numero_semana+=604800
for ($numero_dia = $primer_dia; $numero_dia <= $hoy_dia; $numero_dia+='86400') {     
	
	$formato_dia=date('Y-m-d', $numero_dia);  //Teniendo los segundos del primer dia, le da formato.
	//echo "dia: ".$formato_dia."<br>";

//////////////////////////////////////////////////////////////////////////
	$sentencia_ganancias_dia="SELECT sum(precio_total) FROM `$tabla8` WHERE fecha='$formato_dia' AND estado='0'";
//echo $sentencia_ganancias_dia;
	$sentencia="SELECT COUNT(id_contador) FROM `$tabla16` WHERE fecha_entrada='$formato_dia' AND usuario='0'";   //Genera la sentencia.
	$sentenciau="SELECT COUNT(DISTINCT(ip_remota)) FROM `$tabla16` WHERE fecha_entrada='$formato_dia' AND usuario='0'";   //Genera la sentencia para los visitantes unicos.

	$sentencia_registrados="SELECT COUNT(id_contador) FROM `$tabla16` WHERE fecha_entrada='$formato_dia' AND usuario not like '0'";   //Genera la sentencia.
	$sentenciau_registrados="SELECT COUNT(DISTINCT(ip_remota)) FROM `$tabla16` WHERE fecha_entrada='$formato_dia' AND usuario not like '0'";   //Genera la sentencia para los visitantes unicos.

	$sentencia_altas="SELECT COUNT(id_usuario) FROM `$tabla1` WHERE dia_alta='$formato_dia'";   //Genera la sentencia para los visitantes unicos.
	
	$sentencia_cliente="SELECT SUM(precio_total) FROM `$tabla8` WHERE id_usuario='$id_usuario' AND fecha='$formato_dia'";   //Genera la sentencia para los visitantes unicos.

	$sentencia_mensajes="SELECT COUNT(id_pedido) FROM `$tabla8` WHERE mensaje='1' AND fecha='$formato_dia'";   //Genera la sentencia para los visitantes unicos.

	
///////////////////  ESPACIO RESERVADO PARA LAS SENTENCIAS   /////////////////////////

	$respuesta_altas=mysqli_query($conexion,$sentencia_altas);
	$numero_altas=mysqli_fetch_row($respuesta_altas);
	
	$consulta_ganancias_dia=mysqli_query($conexion,$sentencia_ganancias_dia);
	$ganancias_dias_respuesta=mysqli_fetch_row($consulta_ganancias_dia);
	$ganancias_dia[]=number_format($ganancias_dias_respuesta[0],2,'.','');

	$visitantes_dia_concreto=mysqli_query($conexion,$sentencia);
	$visitantes_dia_concreto_respuesta=mysqli_fetch_row($visitantes_dia_concreto);

	$visitantesu_dia_concreto=mysqli_query($conexion,$sentenciau);
	$visitantesu_dia_concreto_respuesta=mysqli_fetch_row($visitantesu_dia_concreto);
	
	$registrados_dia_concreto=mysqli_query($conexion,$sentencia_registrados);
	$registrados_dia_concreto_respuesta=mysqli_fetch_row($registrados_dia_concreto);

	$registradosu_dia_concreto=mysqli_query($conexion,$sentenciau_registrados);
	$registradosu_dia_concreto_respuesta=mysqli_fetch_row($registradosu_dia_concreto);

	$respuesta_mensajes=mysqli_query($conexion,$sentencia_mensajes);
	$mensajes_dia=mysqli_fetch_row($respuesta_mensajes);

	$altas_dia[]=$numero_altas[0];

	$vis_dia[]=$visitantes_dia_concreto_respuesta[0];
	$vis_diau[]=$visitantesu_dia_concreto_respuesta[0];

	$reg_dia[]=$registrados_dia_concreto_respuesta[0];
	$reg_diau[]=$registradosu_dia_concreto_respuesta[0];

	$respuesta_clientes=mysqli_query($conexion,$sentencia_cliente);
	$gastos_dias_cliente=mysqli_fetch_row($respuesta_clientes);
	$ganancias_clientes[]=number_format($gastos_dias_cliente[0],2,'.','');

	$sms_dia[]=$mensajes_dia[0];


//////////////////   AHORA VAMOS A CALCULAR EL NOMBRE DEL DIA    /////////////////////////////

$nombre_numero_dia=date("w",$numero_dia);

if($nombre_numero_dia==0){
	$nombre_dia="Domingo";
}elseif($nombre_numero_dia==1){
	$nombre_dia="Lunes";
}elseif($nombre_numero_dia==2){
	$nombre_dia="Martes";
}elseif($nombre_numero_dia==3){
	$nombre_dia="Miercoles";
}elseif($nombre_numero_dia==4){
	$nombre_dia="Jueves";
}elseif($nombre_numero_dia==5){
	$nombre_dia="Viernes";
}elseif($nombre_numero_dia==6){
	$nombre_dia="S&aacute;bado";
}

$etiqueta_dia[]=$nombre_dia;

}
?>