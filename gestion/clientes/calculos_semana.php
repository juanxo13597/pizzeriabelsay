<?php
$fecha=date("Y-m-d");


//  o0o0o0o0o0o0o0o0o0o0     VISITANTES ANONIMOS     o0o0o0o0o0o0o0o0o0o0 

//////////////////////////    VISITANTES TOTALES    /////////////////////////////

$dias_pasados=date("w",time());

$ultima_semana=time()-(($dias_pasados)*24*60*60);
$primera_semana = time()-(($dias_pasados+35)*24*60*60);
//echo $primera_semana."<br>";
//echo $ultima_semana."<br>";
$dia_primera_semana = date('Y-m-d', $primera_semana);
//echo $dia_primera_semana."<br>";


for ($numero_semana = $primera_semana; $numero_semana <= $ultima_semana; $numero_semana+=604800) {     
	$formato_semana=date('Y-m-d', $numero_semana);  //Teniendo los segundos de la primera semana, le da formato.
	
	$fin_semana=$numero_semana+604800;   //Calcula el final de la semana.
	$formato_fin_semana=date('Y-m-d', $fin_semana);   //Le da formato al final de la semana

//////////    ESPACIO RESERVADO PARA LAS SENTENCIAS     ////////////
	
	$consulta_altas_semana=mysqli_query($conexion,"SELECT COUNT(id_usuario) FROM `$tabla1` WHERE dia_alta>'$formato_semana' AND dia_alta<'$formato_fin_semana'");
	
	$consulta_ganancias_semana=mysqli_query($conexion,"SELECT sum(precio_total) FROM `$tabla8` WHERE fecha>'$formato_semana' AND fecha<'$formato_fin_semana' AND estado='0'");

	$sentencia_visitantes="SELECT COUNT(id_contador) FROM `$tabla16` WHERE fecha_entrada>'$formato_semana' AND fecha_entrada<'$formato_fin_semana' AND usuario='0'";   //Genera la sentencia.
	
	$sentencia_unicos="SELECT COUNT(DISTINCT(ip_remota)) FROM `$tabla16` WHERE fecha_entrada>'$formato_semana' AND fecha_entrada<'$formato_fin_semana' AND usuario='0'";   //Genera la sentencia.	

	$sentencia_registrados="SELECT COUNT(id_contador) FROM `$tabla16` WHERE fecha_entrada>'$formato_semana' AND fecha_entrada<'$formato_fin_semana' AND usuario not like '0'";   //Genera la sentencia.
	
	$sentencia_unicos_reg="SELECT COUNT(DISTINCT(ip_remota)) FROM `$tabla16` WHERE fecha_entrada>'$formato_semana' AND fecha_entrada<'$formato_fin_semana' AND usuario not like '0'";   //Genera la sentencia.	

///////////   EJECUTAMOS LAS SENTENCIAS   ///////////////////////////////
	
	$ganancias_semana_respuesta=mysqli_fetch_row($consulta_ganancias_semana);
	$ganancias_semana[]=number_format($ganancias_semana_respuesta[0],2,'.','');
	
	$altas_semana_respuesta=mysqli_fetch_row($consulta_altas_semana);
	$altas_semana[]=$altas_semana_respuesta[0];

	$visitantes_semana_concreta=mysqli_query($conexion,$sentencia_visitantes);
	$visitantes_semana_concreta_respuesta=mysqli_fetch_row($visitantes_semana_concreta);
	$vis_semana[]=$visitantes_semana_concreta_respuesta[0];
	
	$unicos_semana_concreta=mysqli_query($conexion,$sentencia_unicos);
	$unicos_semana_concreta_respuesta=mysqli_fetch_row($unicos_semana_concreta);
	$vis_semanau[]=$unicos_semana_concreta_respuesta[0];
	
	$registrados_semana_concreta=mysqli_query($conexion,$sentencia_registrados);
	$registrados_semana_concreta_respuesta=mysqli_fetch_row($registrados_semana_concreta);
	$reg_semana[]=$registrados_semana_concreta_respuesta[0];
	
	$unicos_reg_semana_concreta=mysqli_query($conexion,$sentencia_unicos_reg);
	$unicos_reg_semana_concreta_respuesta=mysqli_fetch_row($unicos_reg_semana_concreta);
	$reg_semanau[]=$unicos_reg_semana_concreta_respuesta[0];
	
}


?>