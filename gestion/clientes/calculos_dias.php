<!--  o0o0o0o0o0o0o0o0o0o0     VISITANTES ANONIMOS POR DIA    o0o0o0o0o0o0o0o0o0o0   -->

<?php

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
		
	$sentencia_cliente="SELECT SUM(precio_total) FROM `$tabla8` WHERE id_usuario='$id_usuario' AND fecha='$formato_dia'";   //Genera la sentencia para los visitantes unicos.
	
///////////////////  ESPACIO RESERVADO PARA LAS SENTENCIAS   /////////////////////////

	$respuesta_clientes=mysqli_query($conexion,$sentencia_cliente);
	$gastos_dias_cliente=mysqli_fetch_row($respuesta_clientes);
	$ganancias_clientes[]=number_format($gastos_dias_cliente[0],2,'.','');


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

echo $sentencia_cliente;
?>