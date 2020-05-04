<?php   /////////     POSICIONAMIENTO ENLACES    SIEMPRE 1�  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////


$directorio_actual=$_SERVER['PHP_SELF'];    

//echo $_SERVER['PHP_SELF'];
//inicio variable	

$palabras=explode("/",$directorio_actual);
$palabras_contadas=count($palabras);
//muestra por pantalla
//echo "El directorio <b>".$_GET['directorio_actual']."</b> tiene ".count($palabras)." /";

if ($palabras_contadas==4){
	$directorio_padre='../';
}elseif($palabras_contadas==3){
	$directorio_padre='/';
}elseif($palabras_contadas==2){
	$directorio_padre='';
}
	if ($_GET['accion']=="borrar"){
	include ('conexion.php');

	$id_borrar= $_GET['id'];
	$id_cliente= $_GET['cliente_borrar'];
	mysqli_query($conexion,"DELETE FROM `$tabla50` WHERE id_articulo_pedido='$id_borrar' and cliente='$id_cliente'") or die(mysqli_error($conexion));
	mysqli_close($conexion);
	header ("Location: http://www.pizzeriabelsay.es/cliente/index.php");
	exit;
	
	}
///////////////      FIN POSICIONAMIENTO   ///////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////
?>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
<?php  //////////////////////////// FORMULARIO  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	function formulario(){
	require_once('recaptcha/recaptchalib.php');
	$captcha_publickey = "6Lf7-dESAAAAAF46yi8cgOOc_kix8kQpSQAFaojl";
	$captcha_privatekey = "6Lf7-dESAAAAALPKpQ4_GtDh2-uDFZVU4iJcHkHN";
	$error_captcha=null;

$nombre=strtoupper($_POST['nombre']);

$apellido1=strtoupper($_POST['apellido1']);
$apellido2=strtoupper($_POST['apellido2']);
$dni=strtoupper($_POST['dni']);
$metre=strtoupper($_POST['metre']);
$mail=$_POST['mail'];
//$pass=$_POST['pass'];
$telefono1=$_POST['telefono1'];
$telefono2=$_POST['telefono2'];
$localidad=$_POST['localidad'];
$calle=strtoupper($_POST['calle']);
$numero=$_POST['numero'];
$bloque=$_POST['bloque'];
$puerta=$_POST['puerta'];
$ano=$_POST['ano'];
$mes=$_POST['mes'];
$dia=$_POST['dia'];
$fecha_nacimiento=$ano."-".$mes."-".$dia;
$diaalta=date("Y-m-d");
$horaalta=date("H:i:s");

		?>

<br>
<form action="solicitud.php" method="post">
<table border="0" id="solicitud_clientes" >
	<tr>
		<td colspan="2" id="titulo_solicitud_clientes">SOLICITUD DE ALTA</td>
	</tr>
	<tr>
		<td>Nombre:</td><td><input type="text" name="nombre" id="solicitud" value='<?php echo $nombre; ?>' > *</td>
	</tr>
	<tr>
		<td>Primer apellido:</td><td><input type="text" name="apellido1" value='<?php echo $apellido1; ?>'> *</td>
	</tr>

	<tr>		
		<td>Segundo apellido:</td><td><input type="text" name="apellido2" value='<?php echo $apellido2; ?>'></td>
	</tr>
	<tr>
		<td>DNI:</td><td><input type="text" name="dni" maxlength="9" value='<?php echo $dni; ?>'> *</td>
	</tr>
	<tr>
		<td>Correo electronico:</td><td><input type="text" name="mail" value='<?php echo $mail; ?>'> *</td>
	</tr>
	<tr>
		<td>M&oacute;vil:</td><td><input type="text" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" name="telefono1" value='<?php echo $telefono1; ?>'> *</td>
	</tr>
	<tr>
		<td>Otro n&uacute;mero:</td><td><input type="text" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" name="telefono2" value='<?php echo $telefono2; ?>'></td>
	</tr>
	<tr>
		<td>Calle:</td><td><input type="text" name="calle" size="40" value='<?php echo $calle; ?>'> *</td>
	</tr>
	<tr>
		<td>N&uacute;mero:</td><td><input type="text" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" name="numero" size="5" value='<?php echo $numero; ?>'></td>
	</tr>
    
	<tr>
		<td>Bloque:</td><td><input type="text" name="bloque" value='<?php echo $bloque; ?>'></td>
	</tr>
	<tr>
		<td>Puerta:</td><td><input type="text" name="puerta" value='<?php echo $puerta; ?>'></td>
	</tr>
    <tr>
		<td>Localidad:</td><td><input type="text" name="localidad" value='<?php echo $localidad; ?>'> *</td>
    </tr>
    <tr>
        <td>ID Cliente:</td><td><input type="text" name="metre" maxlength="10" value='<?php echo $metre; ?>'></td>
	</tr>

	<tr>
		<td colspan="2" align="center">Fecha de nacimiento: 
			<select name="dia"> <?php for ($i=1;$i<32;$i++){
				echo "<option ";
					if($i==$dia){
						echo "selected";
					}
				echo ">$i</option>";
				} ?>		
			</select>
		<select name="mes">
		
		<?php 
		
			$j[1]="Enero";
			$j[2]="Febrero";
			$j[3]="Marzo";
			$j[4]="Abril";
			$j[5]="Mayo";
			$j[6]="Junio";
			$j[7]="Julio";
			$j[8]="Agosto";
			$j[9]="Septiembre";
			$j[10]="Octubre";
			$j[11]="Noviembre";
			$j[12]="Diciembre";

			for ($i=1;$i<13;$i++){
				?> <option value=<?php echo $i; ?> 
                <?php if($i==$mes){
						echo " selected";
					} ?>
                > <?php echo $j[$i]; ?> </option>;
			<?php 
			}			
	  ?>
			</select>

			<select name="ano">
				<?php	
				$anoactual=date(Y);
				$inicio=$anoactual-10;
				$fin=$anoactual-80;
				for ($i=$inicio;$i>$fin;$i--){
					echo "<option value=".$i;
					if($i==$ano){
						echo " selected";
					}
					echo ">".$i."</option>";
				}
				?>
			</select>
		
		
		</td>
	
	</tr>
    
      <tr>
		<td colspan="2" class='aviso'><br><input type='checkbox' name='aviso'> He leido la <a href='#nota.php' target="_blank" onClick="window.open(this.href, this.target, 'width=600,height=600'); return false;">nota legal</a> y acepto las condiciones.<p>&nbsp;</p></td>
       
	</tr> 
    
	<tr>
    
 
		<td colspan="2" align="left">
 
             
   <a id="texto_normal_formulario">Introducir las dos palabras o numeros que salen en la imagen</a>
   <p></p>
   <a id="texto_normal_formulario">Con los espacios correspondientes.</a>     
   
<?php
//escribimos en la p�gina lo que nos devuelve recaptcha_get_html()
echo recaptcha_get_html($captcha_publickey, $error_captcha);
?>
<script type="text/javascript">
function nif(dni) {
  numero = dni.substr(0,dni.length-1);
  let = dni.substr(dni.length-1,1);
  numero = numero % 23;
  letra='TRWAGMYFPDXBNJZSQVHLCKET';
  letra=letra.substring(numero,numero+1);
  if (letra!=let)
    alert('Dni erroneo');
  else
    alert('Dni correcto');
}
</script>
        
        <br><input type="submit" value="GUARDAR" id="boton" onClick="nif(formulario.dni.value)"> <input type="reset" value="BORRAR" id="boton">
       
        </td>
        
	</tr>
    
</table>

</form>

<br>
	<?php }   /////////////////////////////////      FIN DE FORMULARIO   ////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php
function generaIngrediente1()
{
	include 'conexion.php';
	// conectar();
	$consulta=mysqli_query($conexion,"SELECT id_ingrediente, nombre FROM $tabla6 WHERE `id_ingrediente` NOT LIKE '2' AND `id_ingrediente` NOT LIKE '1'");
	// desconectar();

	// Voy imprimiendo el primer select compuesto por los paises
	echo "<select name='ingrediente1' id='ingrediente1'>";
	echo "<option value='0'>Elige que quieres comer...</option>";
	while($registro=mysqli_fetch_row($consulta))
	{
		
		echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
	}
	echo "</select>";
}

function generaSelect()
{
	include 'conexion.php';
	// conectar();
	$consulta=mysqli_query($conexion,"SELECT id_bebida, nombre FROM $tabla27 WHERE `id_bebida` NOT LIKE '2' AND `id_bebida` NOT LIKE '1'");
	// desconectar();

	// Voy imprimiendo el primer select compuesto por los paises
	echo "<select name='select1' id='ingrediente2' onChange='cargaContenido(this.id)'>";
	echo "<option value='0'>Elige que quieres beber...</option>";
	while($registro=mysqli_fetch_row($consulta))
	{
		
		echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
	}
	echo "</select>";
}

function generaSelect1()
{
	include 'conexion.php';
	// conectar();
	$consulta=mysqli_query($conexion,"SELECT id_postre, nombre FROM $tabla28 WHERE `id_postre` NOT LIKE '2' AND `id_postre` NOT LIKE '1'");
	// desconectar();

	// Voy imprimiendo el primer select compuesto por los paises
	echo "<select name='select2' id='ingrediente3' onChange='cargaContenido(this.id)'>";
	echo "<option value='0'>Elige que quieres de postre...</option>";
	while($registro=mysqli_fetch_row($consulta))
	{
		
		echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
	}
	echo "</select>";
}

function generaSelect2()
{
	include 'conexion.php';
	// conectar();
	$consulta=mysqli_query($conexion,"SELECT id_sexo, nombre FROM $tabla29 WHERE `id_sexo` NOT LIKE '2' AND `id_sexo` NOT LIKE '1'");
	// desconectar();

	// Voy imprimiendo el primer select compuesto por los paises
	echo "<select name='select3' id='ingrediente4' onChange='cargaContenido(this.id)'>";
	echo "<option value='0'>Ni&ntilde;o O Ni&ntilde;a...</option>";
	while($registro=mysqli_fetch_row($consulta))
	{
		
		echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
	}
	echo "</select>";
}

/////////////////////////////////////////LOTESSS Postre///////////////////////////////////////////////////////////////////////////////////////////////////

function generaSelect3()
{
	include 'conexion.php';
	// conectar();
	$consulta=mysqli_query($conexion,"SELECT id_postre, nombre FROM $tabla30 WHERE `id_postre` NOT LIKE '2' AND `id_postre` NOT LIKE '1'");
	// desconectar();

	// Voy imprimiendo el primer select compuesto por los paises
	echo "<select name='select4' id='ingrediente5' onChange='cargaContenido(this.id)'>";
	echo "<option value='0'>1� Postre...</option>";
	while($registro=mysqli_fetch_row($consulta))
	{
		
		echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
	}
	echo "</select>";
}

function generaSelect4()
{
	include 'conexion.php';
	// conectar();
	$consulta=mysqli_query($conexion,"SELECT id_postre, nombre FROM $tabla30 WHERE `id_postre` NOT LIKE '2' AND `id_postre` NOT LIKE '1'");
	// desconectar();

	// Voy imprimiendo el primer select compuesto por los paises
	echo "<select name='select5' id='ingrediente6' onChange='cargaContenido(this.id)'>";
	echo "<option value='0'>2� Postre...</option>";
	while($registro=mysqli_fetch_row($consulta))
	{
		
		echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
	}
	echo "</select>";
}

function generaSelect5()
{
	include 'conexion.php';
	// conectar();
	$consulta=mysqli_query($conexion,"SELECT id_pizza, nombre FROM $tabla32 WHERE `id_pizza` NOT LIKE '2' AND `id_pizza` NOT LIKE '1'");
	// desconectar();

	// Voy imprimiendo el primer select compuesto por los paises
	echo "<select name='select6' id='ingrediente7' onChange='cargaContenido(this.id)'>";
	echo "<option value='0'>Tu pizza...</option>";
	while($registro=mysqli_fetch_row($consulta))
	{
		
		echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
	}
	echo "</select>";
}


?>

<?php function cabecera(){ ?>
<?php
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta name="revisit-after" content="30 days" />
	<meta name="distribution" content="global" />
	<meta name="resource-type" content="document" />
	<!--<meta name="robots" content="all" />-->
   <meta name="GOOGLEBOT" content="NOODP" />
	<meta name="ROBOTS" content="NOODP" />
<meta name="google-site-verification" content="LD5fnPyV_zjflnDHlyVa0PlciKhDUqPoNTPlzv9K_7g" />
	<title>BELSAY (Fuentes de Andaluc�a) PIZZAS , BOCATAS , CHAPATA, HAMBURGESAS, PANNINIS -</title>
	<link href="estilos.css" rel="stylesheet" type="text/css" />
	<link rel="icon" type="image/ico" href="icono.ico" />	
	<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1"/>
	<meta name="keywords" content="Fuentes de Andaluc�a, pizzas, pizza, pizzerias, pizzeria, comida a domicilio, comida para llevar, pedido, menu, menu pizza, pasta, pizza menu, ofertas, pedir pizza, pedido online, patatas fritas, croquetas caseras, minis, kebab, salsas, combo, ensalada, mediterranea, barbacoa, pasta, marinera, carbonara, hamburguesas, bebidas, postres, helados, Sevilla." />
	<meta name="Description" content="Pizzeria Belsay, Comida a domicilio, pedidos online: pizzas, hamburguesas, pasta, ensaladas, menus, aperitivos, postres y bebidas. + Barato, + r�pido, + c�modo. Fuentes de andalucia" />


<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-33282602-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<?php } ?>
<?php function encabezado(){ ?>
</head>

<body>


<table width="100%" height="100%" id="cuerpo">

	<tr height="180" id="cabecera">
		<td>&nbsp; </td>
<?php } ?>
<?php function enlaces1(){ ?>
		<td align="center" id="enlaces" >
        <div id="cabecera_img"> 
		<a href="index.php"><img src='../logo.png'></a>
       </div> 
             <div id="cabecera_img2"> 
            <a href="index.php"><img src='../cabecera.png'></a>
            </div>
        
        
<!--
			<table id='enlaces_cabecera' width='100%'>
				<tr>
					<td><a href='../index.php'><img src="../images_css/logo.png" border='0'></a></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td><div id="enlace"><a href="../index.php">INICIO</a></div></td>
					<td><div id="enlace"><a href="../menu.php">MENU;</a></div></td>
					<td><div id="enlace"><a href="../ofertas.php">OFERTAS</a></div></td>
					<td><div id="enlace"><a href="mailto:info@pizza-house.es">CONTACTO</a></div></td>
					<td><div id="enlace"><a href="../solicitud.php">ALTA</a></div></td>
					<td><div id='telefonos'>95 584 67 60 <br> 692 560 525 </div></td>
					
				</tr>
			</table>
-->			
		</td>
		<td>&nbsp; </td>	
	</tr>
	<tr><td colspan="3" id="franja"></td></tr>
<?php } ?>

<?php function enlaces_publico(){ ?>
		<td align="center" id="enlaces" >
		 <div id="cabecera_img"> 
		<a href="index.php"><img src='logo.png'></a>
        </div>
             <div id="cabecera_img2"> 
            <a href="index.php"><img src='cabecera.png'></a>
            </div>
        	
		</td>
		<td>&nbsp; </td>	
	</tr>
	<tr><td colspan="3" id="franja"></td></tr>
<?php } ?>

<?php function contenido1(){ ?>
	<tr>
		<td>&nbsp; </td>
		<td width="1000" height="500" id="contenido">

<table border="0" width="100%" height="100%">

	<tr>
<?php } ?>

<?php function autent2(){ ?>

		<td width="250" height="600" id="botones_usuarios" valign="top" align="center">
			<div id="entrar">

<?php 
include("conexion.php");
$cliente=$_SESSION['id'];

if($_SESSION["autenticado"]=="si"){

$ssql = "select * from `$tabla1` WHERE id_usuario=$cliente";
$resultado = mysqli_query($conexion,$ssql);

while ($registro=mysqli_fetch_row($resultado)){
	$id_usuario=$registro[0];
	$nombre=$registro[5];
	$apellido1=$registro[6];
	$apellido2=$registro[7];
	$imagen=$registro[18];
}
echo "<table>";
echo "<tr><td align='center'><img src='../clientes/imagen_mostrar.php?cod_imagen=".$imagen."' width='133' height='100' border='1'><br></td></tr>";

echo "<tr><td align='center'><div id='datos'>".$nombre." ".$apellido1."</div></td></tr>";
?>
<tr><td align="right"><a href="<?php echo $directorio_padre; ?>salir.php" class="salir">Salir</a>&nbsp;</td></tr>
</table>

<br>
</div>

<div id="enlaces_izda">
	<a href="<?php echo $directorio_padre; ?>index2.php">CARTA</a>
 
    <!--<a style="color:#F00" href="<?php echo $directorio_padre; ?>../navidad.php">CARTA DE NAVIDAD</a>-->
        <div id='sub_enlaces_izda'>    	
            <a href="<?php echo $directorio_padre; ?>../clientes/productos.php?cond=12">- PARA 2</a>
            <a href="<?php echo $directorio_padre; ?>../clientes/menu_infantil.php">- INFANTIL</a>
            <a href="<?php echo $directorio_padre; ?>../clientes/productos.php?cond=15">- BOCA MIX</a>
            <a href="<?php echo $directorio_padre; ?>../clientes/productos.php?cond=16">- MENU FAMILIAR</a>
            <a href="<?php echo $directorio_padre; ?>../clientes/productos.php?cond=14">- BURGUELANDIA</a>
        </div>    
    <!--<a href="<?php echo $directorio_padre; ?>../cliente/#historial.php">HISTORIAL</a>-->
	<a href="<?php echo $directorio_padre; ?>../cliente/perfil.php">TU PERFIL</a>
</div>

<?php

}else{

?>
				<div class="pregunta">&iquest;Eres cliente?</div>
				<div class="pedido">Haz tu pedido online</div><br>
				
				<form action="<?php echo $directorio_padre; ?>autenticacion.php" method="post">
					<input type="text" name="mail" value="correo electronico" onClick="this.value=''" class="campo"/>
					<input type="password" name="pass" value="e-amil" onClick="this.value=''" class="campo"/>
				<div class="olvido"><a href="<?php echo $directorio_padre; ?>olvido.php" target="_blank" onClick="window.open(this.href, this.target, 'width=600,height=400'); return false;">&iquest;Olvidaste tu contrase&ntilde;a?</a></div>
				<input type="submit" name="enviar" value="Entrar" id="boton">
				</form>
			
			<?php
			$error=$_GET[error];
			//echo $error;
			if($error==1){
				echo "<div id='error'>Usuario o contrase&ntilde;a incorrectos</div>";
			}elseif($error==2){
				echo "<div id='error'>No puede entrar en esa secci&oacute;n</div>";
			}
			?>
            
			</div>
	<div id="enlaces_izda">
	<a href="<?php echo $directorio_padre; ?>index2.php">CARTA</a>
  
	<div id='sub_enlaces_izda'>    	
            <a id="sub_enlaces_izda" href="<?php echo $directorio_padre; ?>../clientes/productos.php?cond=12">- PARA 2</a>
            <a id="sub_enlaces_izda" href="<?php echo $directorio_padre; ?>../clientes/productos.php?cond=13">- INFANTIL</a>
            <a id="sub_enlaces_izda" href="<?php echo $directorio_padre; ?>../clientes/productos.php?cond=15">- BOCA MIX</a>
            <a id="sub_enlaces_izda" href="<?php echo $directorio_padre; ?>../clientes/productos.php?cond=16">- MENÚ INFANTIL</a>
            <a id="sub_enlaces_izda" href="<?php echo $directorio_padre; ?>../clientes/productos.php?cond=14">- BURGUELANDIA</a>
    </div> 

    <a href="<?php echo $directorio_padre; ?>localizacion.php">LOCALIZACION</a>
    <a href="<?php echo $directorio_padre; ?>../solicitud.php">REGISTRO</a> 
    
    
    <div
</div>
</td>

<?php

}?>                
        </div>



<?php }
 ?>		

<?php function centro1(){ ?>		
		<td width="600" height="auto" id="carta" align="center" valign="top">
<?php } ?>
<?php function centro11(){ ?>		
		<td width="600" height="auto" id="carta" align="center" valign="top">
<?php } ?>
<?php function centro2(){ ?>
		</td>
<?php } ?>
<?php function colDerecha1(){ ?>
		<td widht="200"  height="auto" id="col_derecha" align="right" valign="top">
		
<?php } ?>

<?php function pedido(){ 

?>

<div id="pedido">
<?php
include("pedido/pedido.php");
?>
</div>


<?php } ?>	

<?php function colDerecha2(){ ?>
		</td>	
	</tr>

</table>		
<?php } ?>


<?php function pie(){ ?>		
		</td>
		<td>&nbsp; </td>	
	</tr>

	<tr>
		<td>&nbsp; </td>
		<td>
			<hr>
<table width='100%' border='0' id='nota_pie'>
	<tr>
		<td width="26%" class='telefonos'>
			95 483 81 00
		</td>
		<td width="47%">&nbsp;</td>
		<td width="100%" id='aviso' algin='left'>
			Belsay - <a href='#nota.php' target="_blank" onClick="window.open(this.href, this.target, 'width=600,height=600'); return false;">Nota legal</a> - <a href='mailto:info@elpolloandaluz.es'>Contacto</a>
		</td>	
	</tr>

	<tr>
		<td colspan='3' align='center' class='diseno'> <a href='http://www.gesimar.es' target='_blank'> Design by Gesimar Inform&aacute;tica</a></td>
	</tr>

</table>

<br>
		</td>
		<td>&nbsp;</td>
	</tr>

</table>

</body>

</html>
<?php } ?>