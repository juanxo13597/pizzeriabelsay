<?php
$fecha=date("Y-m-d");

$i=5;


for($i=5; $i>=0; $i--){
	//echo "numero del i: ".$i."<br>";
	$resta_mes=strtotime('-'.$i.' month', time());  // nos calcula el mes en segundos trancurridos. $i son los meses que se deben restar cada vez.
	$formato_mes=date('Y-m-d', $resta_mes);  // nos da formato de fecha normal a ese xorro de numeros.
	//echo "formato del mes: ".$formato_mes."<br>";
///////////   YA TENEMOS EL MES, AHORA VAMOS A DECIRLE QUE COJEMOS DESDE EL DIA 1 AL 31    /////////////////
	
	$separa_formato_mes = explode('-',$formato_mes);
	$primer_mes = $separa_formato_mes[1];
	$primer_dia = $separa_formato_mes[2];
	$primer_ano = $separa_formato_mes[0];

//////////    HEMOS SEPARADO LAS CANTIDADES, PARA TENER DIA, MES Y AÑO POR SEPARADO   /////////////////

	$fecha_inicio=$primer_ano."-".$primer_mes."-1";
	$fecha_fin=$primer_ano."-".$primer_mes."-31";

	//echo "fecha de inicio: ".$fecha_inicio."<br>";
	//echo "fecha de fin: ".$fecha_fin."<br>";

if ($primer_mes==01){
$nombre_mes[]="&nbsp; Ene. &nbsp;";
} else if ($primer_mes==2){
$nombre_mes[]= "&nbsp; Feb. &nbsp;";
} else if ($primer_mes==3){
$nombre_mes[]= "&nbsp; Mar. &nbsp;";
} else if ($primer_mes==4){
$nombre_mes[]= "&nbsp; Abr. &nbsp;";
} else if ($primer_mes==5){
$nombre_mes[]= "&nbsp; May. &nbsp;";
} else if ($primer_mes==6){
$nombre_mes[]= "&nbsp; Jun. &nbsp;";
} else if ($primer_mes==7){
$nombre_mes[]= "&nbsp; Jul. &nbsp;";
} else if ($primer_mes==8){
$nombre_mes[]= "&nbsp; Ago. &nbsp;";
} else if ($primer_mes==9){
$nombre_mes[]= "&nbsp; Sep. &nbsp;";
} else if ($primer_mes==10){
$nombre_mes[]= "&nbsp; Oct. &nbsp;";
} else if ($primer_mes==11){
$nombre_mes[]= "&nbsp; Nov. &nbsp;";
} else if ($primer_mes==12){
$nombre_mes[]= "&nbsp; Dic. &nbsp;";
}

//////////    HEMOS PUESTO NOMBRE A CADA UNO DE LOS MESES   ///////////////////////////

	$sentencia_altas="SELECT COUNT(id_usuario) FROM `$tabla1` WHERE dia_alta<='$fecha_fin' AND dia_alta>='$fecha_inicio'";

	$sentencia_ganancias="SELECT sum(precio_total) FROM `$tabla8` WHERE fecha<='$fecha_fin' AND fecha>='$fecha_inicio' AND estado='0'";

	$sentencia_visitantes="SELECT COUNT(id_contador) FROM `$tabla16` WHERE fecha_entrada<='$fecha_fin' AND fecha_entrada>='$fecha_inicio' AND usuario='0'";
	$sentencia_unicos="SELECT COUNT(DISTINCT(ip_remota)) FROM `$tabla16` WHERE fecha_entrada<='$fecha_fin' AND fecha_entrada>='$fecha_inicio' AND usuario='0'";

	$sentencia_visitantes_reg="SELECT COUNT(id_contador) FROM `$tabla16` WHERE fecha_entrada<='$fecha_fin' AND fecha_entrada>='$fecha_inicio' AND usuario NOT LIKE'0'";
	$sentencia_unicos_reg="SELECT COUNT(DISTINCT(ip_remota)) FROM `$tabla16` WHERE fecha_entrada<='$fecha_fin' AND fecha_entrada>='$fecha_inicio' AND usuario NOT LIKE '0'";

	$sentencia_cliente_mes="SELECT SUM(precio_total) FROM `$tabla8` WHERE fecha<='$fecha_fin' AND fecha>='$fecha_inicio' AND id_usuario='$id_usuario'";   //Genera la sentencia para los visitantes unicos.

	$sentencia_mensajes_mes="SELECT COUNT(id_pedido) FROM `$tabla8` WHERE fecha<='$fecha_fin' AND fecha>='$fecha_inicio' AND mensaje='1'";   //Genera la sentencia para los visitantes unicos.

//////////    ESPACIO RESERVADO PARA LAS SENTENCIAS     ////////////


	$consulta_ganancias_mes=mysqli_query($conexion,$sentencia_ganancias);
	$ganancias_mes_respuesta=mysqli_fetch_row($consulta_ganancias_mes);
	$ganancias_mes[]=number_format($ganancias_mes_respuesta[0],2,'.','');

	$consulta_altas_mes=mysqli_query($conexion,$sentencia_altas);
	$altas_mes_respuesta=mysqli_fetch_row($consulta_altas_mes);
	$altas_mes[]=$altas_mes_respuesta[0];

	$visitantes_mes=mysqli_query($conexion,$sentencia_visitantes);
	$visitantes_mes_respuesta=mysqli_fetch_row($visitantes_mes);
	$vis_mes[]=$visitantes_mes_respuesta[0];
	
	$consulta_unicos_mes=mysqli_query($conexion,$sentencia_unicos);
	$unicos_mes_respuesta=mysqli_fetch_row($consulta_unicos_mes);
	$unicos_mes[]=$unicos_mes_respuesta[0];

	$registrados_mes=mysqli_query($conexion,$sentencia_visitantes_reg);
	$registrados_mes_respuesta=mysqli_fetch_row($registrados_mes);
	$reg_mes[]=$registrados_mes_respuesta[0];
	
	$consulta_unicos_mes_reg=mysqli_query($conexion,$sentencia_unicos_reg);
	$unicos_mes_respuesta_reg=mysqli_fetch_row($consulta_unicos_mes_reg);
	$unicos_mes_reg[]=$unicos_mes_respuesta_reg[0];

	$respuesta_clientes_mes=mysqli_query($conexion,$sentencia_cliente_mes);
	$gastos_dias_cliente_mes=mysqli_fetch_row($respuesta_clientes_mes);
	$clientes_mes[]=number_format($gastos_dias_cliente_mes[0],2,'.','');
	
	$consulta_mensajes_mes=mysqli_query($conexion,$sentencia_mensajes_mes);
	$mensajes_mes_respuesta=mysqli_fetch_row($consulta_mensajes_mes);
	$sms_mes[]=$mensajes_mes_respuesta[0];
}

?>