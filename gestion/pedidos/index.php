<?php
	include ("../seguridad.php");
	include("../../conexion.php"); //Nos conectamos a la base de datos
	$pag=$_SERVER['PHP_SELF'];  // el nombre y ruta de esta misma pÃ¡gina.


if ($_GET['accion']=="terminado"){
	$id_cambiar= $_GET['id'];
	$numero_pedido=$_GET['pedido'];
	$campos="id_estado='1'";
	$sentencia="UPDATE $base . `$tabla50` SET $campos WHERE cliente=$id_cambiar and pedido=$numero_pedido  ";
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
<meta http-equiv="refresh" content="20">
<?php cabecera() ?>

<?php
$ssql_duracion = "select * from `$tabla19`";
$resultado_duracion = mysqli_query($conexion,$ssql_duracion);
while ($registro_duracion=mysqli_fetch_row($resultado_duracion)){
	$duracion=$registro_duracion[0];
	}
?>
			<div id="enlaces">
					<table border="0" id="menu">
						<tr>
            <td valign="bottom"><div id="boton_menu_select"><a href="../pedidos/index.php"><img src="../imagenes/pedidos.gif" border="0"> Pedidos</a></div></td>
            <td valign="bottom"><div id="boton_menu"><a href="../clientes/alta_clientes.php"><img src="../imagenes/cliente.gif" border="0"> Clientes</a></div></td>
            <td valign="bottom"><div id="boton_menu"><a href="../articulos/alta_articulos.php"><img src="../imagenes/articulos.gif" border="0"> Articulos</a></div></td>
            <td valign="bottom"><div id="boton_menu"><a href="../estadisticas/index.php"><img src="../imagenes/estad.gif" border="0">  Estad&iacute;sticas</a></div></td>
            <td valign="bottom"><div id="boton_menu"><a href="../ofertas/index.php"><img src="../imagenes/ofertas.gif" border="0">  Ofertas y lotes</a></div></td>
					</tr>
				
				</table>

			</div>


<?php contenido1() ?>

<?php

/////////////////////////////////		MENSAJES 	/////////////////////////////////////////

function mensaje(){

?>

<script language='JavaScript'>
alert("Tiene PEDIDOS sin leer en su bandeja de entrada");
</script>


<?php } 

function mensaje_clientes(){

?>

<script language='JavaScript'>
alert("Tiene un nuevo CLIENTE ");

//window.open('nuevo_cliente.html',"CLIENTES","width=300,height=120,scrollbars=NO,")
</script>

<?php } 

/////////////////////////////////////////////////////////////////////////////////////////

$cuestion=mysqli_query($conexion,"SELECT count(id_estado) FROM `$tabla50` WHERE id_estado=0");

$cuestion_respuesta=mysqli_fetch_row($cuestion);

$cuestion2=mysqli_query($conexion,"SELECT count(estado_solicitud) FROM `$tabla11` WHERE estado_solicitud=1");

$cuestion_respuesta2=mysqli_fetch_row($cuestion2);

$fecha=date("Y-m-d");
$hora=date("H:i:s");


/////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////      PAGINACIÓN     //////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////


$TAMANO_PAGINA = 20;

//examino la página a mostrar y el inicio del registro a mostrar
$pagina = $_GET["pagina"];
if (!$pagina) {
    $inicio = 0;
    $pagina=1;
}
else {
    $inicio = ($pagina - 1) * $TAMANO_PAGINA;
}


//miro a ver el número total de campos que hay en la tabla con esa búsqueda
$ssql = "select * from `$tabla50` WHERE id_estado!=99 GROUP BY  cliente, pedido";
$rs = mysqli_query($conexion,$ssql);
$num_total_registros = mysqli_num_rows($rs);
//calculo el total de páginas

$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);

/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////

?>

<table border="0" width="100%">

<tr>

			</div>
<form action='espera.php' method='post'>
<input type='hidden' name='pagina' value='<?php echo $pag; ?>' >		
			
				
					<tr>
						Tiempo de espera aproximado: <input type="text" name="espera" id='bot_guardar' value='<?php echo $duracion;?> '><input type='submit' id='bot_guardar' value='guardar'><br />
					</tr>
                    <tr><br /></tr>
				
				
</form>

	<td></td>
	<td width="900" align="center" valign="top">
	

<div id="texto_gestion">

<?php

/////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////      DURACIÓN       //////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
$horaIni=$registro[7];
			
function restaHoras($horaIni, $hora){

return (date("H:i:s", strtotime("00:00:00") + strtotime($hora) - strtotime($registro[7]) ));

}

function segundos_tiempo($segundos){
				$minutos=$segundos/60;
				$horas=floor($minutos/60);
				$dias=floor($horas/24);
				$horas2=$horas;
				//if($horas2>24)$horas2=$horas-24;
				$horas2=$horas%24;
				$minutos2=$minutos%60;
				$segundos_2=$segundos%60%60%60;
				if($minutos2<10)$minutos2='0'.$minutos2;
				if($segundos_2<10)$segundos_2='0'.$segundos_2;
				
				if($segundos<60){ /* segundos */
				$resultado= round($segundos).' Segundos';
				}elseif($segundos>60 && $segundos<3600){/* minutos */
				$resultado= $minutos2.':'.$segundos_2.' Minutos';
				}elseif($segundos>3599 && $segundos<86400){/* horas */
				$resultado= $horas.':'.$minutos2.':'.$segundos_2.' Horas';
				}else{
				$resultado= $dias.' '.$horas2.':'.$minutos2.':'.$segundos_2.' Dia';
				}
				return $resultado;
				} 
				function calcula_hora($fecha_entrada,$fecha_salida) {
				$fecha1=strtotime($fecha_salida);
				$fecha2=strtotime($fecha_entrada);
				$diferencia=$fecha1-$fecha2;
				$total=date("Y-m-d H:i:s",$diferencia);
				return segundos_tiempo($diferencia);
				}

/////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////// consulta numero de pedido y cliente
$ssql_consulta = "select * from `$tabla50`";
$resultado_consulta = mysqli_query($conexion,$ssql_consulta);
while ($registro_consulta=mysqli_fetch_row($resultado_consulta)){
	$n_pedido=$registro_consulta[5];
	$n_cliente=$registro_consulta[6];
}
/////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////// consulta agrupada por numero de cliente
$ssql = "select * from `$tabla50` WHERE id_estado!=99  GROUP BY  cliente, pedido ORDER BY fecha DESC, hora DESC limit " . $inicio . "," . $TAMANO_PAGINA;
$resultado = mysqli_query($conexion,$ssql);
////////////////////////////////////////////////////////////
echo "<table border='0' id='tabla_gestion' width='900'>";

echo "<tr id='cabecera_tabla'> <td> <div id='texto_titulo'> Pedido </div></td> <td><div id='texto_titulo'> Cliente </div></td> <td><div id='texto_titulo'> M&oacute;vil </div></td> <td><div id='texto_titulo'> Hora de pedido </div></td> <td><div id='texto_titulo'> Duraci&oacute;n </div></td> <td><div id='texto_titulo'> Acci&oacute;n </div></td> </tr>";

$i=1;
while ($registro=mysqli_fetch_row($resultado)){
	$estado=$registro[14];
$i++;

if($estado==0){
	$estilo="sin_leer_pedido";
}elseif($estado==2){
	$estilo="cocinandose_pedido";
}else{
	if($i%2==0){
		$estilo="fila_par";
	}else{
		$estilo="fila_inpar";
	}
}
		echo "<tr id='".$estilo."'>";
			echo "<td>".$registro[5]."</td>";
			echo "<td>";
				$select_usuario=mysqli_query($conexion,"select nombre,apellido1,id_metre,telefono1 from `$tabla1` WHERE id_usuario='".$registro[6]."'");
					while ($nombre_usuario=mysqli_fetch_row($select_usuario)){
					$usuario=$nombre_usuario[0]." ".$nombre_usuario[1];
					$metre=$nombre_usuario[2];
					$movil=$nombre_usuario[3];
					echo $usuario;
					}
					?>
			<a target="_blank" onClick="window.open(this.href, this.target, 'width=1120,height=662'); return false;" style="text-decoration: none" href="../clientes/informacion_usuarios.php?id_usuario=<?php echo $registro[1]; ?>"> | <img src='../imagenes/ficha.gif' alt='editar' border='0'></a>
			<?php
			echo "</td>";
			echo "<td>".$movil."</td>";
			echo "<td>".$registro[15]."</td>";//hora
			echo "<td>";
			

			if($estado==0 or $estado==2){
				echo restaHoras($horaIni, $hora);
			}elseif($estado==4){
				echo "Anulado";
			}elseif($estado==1){
				echo "Terminado";
			}elseif($estado==3){
				echo "...Cocinandose";
			}

			echo "</td>";


?>
			<td> <a href="informacion_pedido.php?id_pedido=<?php echo $registro[5]; ?>&id_usuario=<?php echo $registro[6]; ?>"><img src='../imagenes/view.png' alt='editar' border='0'></a>
<?php			
		if($estado==0 or $estado==2){
			echo " |<a href='?accion=terminado&id=$registro[6]&pedido=$registro[5]' class='boton_terminar'>Terminar</a></td>";
		}
	 echo "</tr>";
	}
	echo "</table>";


//cerramos el conjunto de resultado y la conexión con la base de datos
mysqli_free_result($rs);

//muestro los distintos índices de las páginas, si es que hay varias páginas
$pag_anterior=$pagina-1;
$pag_siguiente=$pagina+1;
?>
</div>
<br>
<table border="0" width="900">
<tr>
	<td width="200" align="left">

<?php
if($pagina==1){
	echo "&nbsp;";
}else{
echo "<a href='index.php?pagina=".$pag_anterior."'>P&aacute;gina anterior</a>";
}
echo "</td>";

echo "<td align='center'>";
if ($total_paginas > 1){
    for ($i=1;$i<=$total_paginas;$i++){
       if ($pagina == $i)
          //si muestro el índice de la página actual, no coloco enlace
          echo $pagina . " ";
       else
          //si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página
          echo "<a href='index.php?pagina=" . $i . "'class=izquierda>" . $i . "</a> ";
    }
} 

?>
</td>

<td width="200" align="right">
	<?php

if($pagina==$total_paginas){
	echo "&nbsp;";
}else{
	echo "<a href='index.php?pagina=".$pag_siguiente."'>P&aacute;gina siguiente</a>";
}

	?>
</td>
<td>TOTAL DE PEDIDOS <b><? echo $num_total_registros; ?></b></td>
</table>

</td>
<td></td>

</tr>

</table>

<?php contenido2() ?>
<?php pie() ?>

<?php 
if($cuestion_respuesta[0]>=1){
	mensaje();
}

if($cuestion_respuesta2[0]>=1){
	mensaje_clientes();

}
?>