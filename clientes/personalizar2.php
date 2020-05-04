<?php session_start();

	include("../conexion.php"); //Nos conectamos a la base de datos
	include("../includes.php");

$cliente=$_SESSION["id"];

$n_ingredientes=$_POST['select1'];
$tamano1=$_POST['1'];
$tamano2=$_POST['2'];
$tamano3=$_POST['3'];

$url=$_SERVER['PHP_SELF'];  // el nombre y ruta de esta misma página.
$pag="personalizar.php";

?> 

<?php cabecera() ?>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
<link href="../estilos.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
<script src="js/prototype.js" type="text/javascript"></script>
<script src="js/scriptaculous.js?load=effects,builder" type="text/javascript"></script>
<script src="js/lightbox.js" type="text/javascript"></script>
<?php encabezado() ?>
<?php enlaces1() ?>
<?php contenido1() ?>
<?php autent2() ?>
<?php centro1() ?>


<table border="0" width="100%">


<tr>

	<td> </td>
	<td width="900" align="center" valign="top">
	

<div id="texto_gestion">

<?php
$fecha=date(Y."/".m."/".d);
$i=1;
?>
<form action="personalizar3.php" method="post">
<div id="personalizar">
<div id="titulo">
  <p>PIZZA PERSONALIZADA</p>
</div>
<table width="437" height="133" border="0">

	<tr>
		<td width="94">&nbsp;</td>
		<td width="111">&nbsp;</td>
		<td width="32">&nbsp;</td>
		<td width="33"><div align="center"></div></td>
		<td width="24"><div align="center"></div></td>
	</tr>
    <tr>
    	<td>
         
        </td>
    <tr>
		<td>BASE +</td>
		<td>
  
			<?php


	if ($n_ingredientes==1){
            $consulta_mysql="select * FROM $tabla13 ";
            $resultado_consulta_mysql=mysqli_query($conexion,$consulta_mysql);
             
            echo "<select name='select2'>";
            while($fila=mysqli_fetch_array($resultado_consulta_mysql)){
                echo "<option value='".$fila['nombre']."'>".$fila['nombre']."</option>";
            }
            echo "</select>"; 
			
	}elseif($n_ingredientes==2){
		
			$consulta_mysql="select * FROM $tabla13 ";
            $resultado_consulta_mysql=mysqli_query($conexion,$consulta_mysql);
             
				echo "<select name='select3'>";
				while($fila=mysqli_fetch_array($resultado_consulta_mysql)){
					echo "<option value='".$fila['nombre']."'>".$fila['nombre']."</option>";
				
				}
				echo "</select>";
				 
			$consulta_mysql2="select * FROM $tabla13 ";
            $resultado_consulta_mysql2=mysqli_query($conexion,$consulta_mysql2);
			
				echo "<select name='select4'>";
				while($fila2=mysqli_fetch_array($resultado_consulta_mysql2)){
					echo "<option value='".$fila2['nombre']."'>".$fila2['nombre']."</option>";
				
				}
				echo "</select>"; 		
	}elseif($n_ingredientes==3){
		
			$consulta_mysql="select * FROM $tabla13 ";
            $resultado_consulta_mysql=mysqli_query($conexion,$consulta_mysql);
             
				echo "<select name='select2'>";
				while($fila=mysqli_fetch_array($resultado_consulta_mysql)){
					echo "<option value='".$fila['nombre']."'>".$fila['nombre']."</option>";
				
				}
				echo "</select>";
				 
			$consulta_mysql2="select * FROM $tabla13 ";
            $resultado_consulta_mysql2=mysqli_query($conexion,$consulta_mysql2);
			
				echo "<select name='select3'>";
				while($fila2=mysqli_fetch_array($resultado_consulta_mysql2)){
					echo "<option value='".$fila2['nombre']."'>".$fila2['nombre']."</option>";
				
				}
				echo "</select>";
				
			$consulta_mysql3="select * FROM $tabla13 ";
            $resultado_consulta_mysql3=mysqli_query($conexion,$consulta_mysql3);
			
				echo "<select name='select4'>";
				while($fila3=mysqli_fetch_array($resultado_consulta_mysql3)){
					echo "<option value='".$fila3['nombre']."'>".$fila3['nombre']."</option>";
				
				}
				echo "</select>";  		
	}elseif($n_ingredientes==4){
		
			$consulta_mysql="select * FROM $tabla13 ";
            $resultado_consulta_mysql=mysqli_query($conexion,$consulta_mysql);
             
				echo "<select name='select2'>";
				while($fila=mysqli_fetch_array($resultado_consulta_mysql)){
					echo "<option value='".$fila['nombre']."'>".$fila['nombre']."</option>";
				
				}
				echo "</select>";
				 
			$consulta_mysql2="select * FROM $tabla13 ";
            $resultado_consulta_mysql2=mysqli_query($conexion,$consulta_mysql2);
			
				echo "<select name='select3'>";
				while($fila2=mysqli_fetch_array($resultado_consulta_mysql2)){
					echo "<option value='".$fila2['nombre']."'>".$fila2['nombre']."</option>";
				
				}
				echo "</select>";
				
			$consulta_mysql3="select * FROM $tabla13 ";
            $resultado_consulta_mysql3=mysqli_query($conexion,$consulta_mysql3);
			
				echo "<select name='select4'>";
				while($fila3=mysqli_fetch_array($resultado_consulta_mysql3)){
					echo "<option value='".$fila3['nombre']."'>".$fila3['nombre']."</option>";
				
				}
				echo "</select>";
			
			$consulta_mysql4="select * FROM $tabla13 ";
            $resultado_consulta_mysql4=mysqli_query($conexion,$consulta_mysql4);
			
				echo "<select name='select5'>";
				while($fila4=mysqli_fetch_array($resultado_consulta_mysql4)){
					echo "<option value='".$fila4['nombre']."'>".$fila4['nombre']."</option>";
				
				}
				echo "</select>";  	
	}elseif($n_ingredientes==5){
		
			$consulta_mysql="select * FROM $tabla13 ";
            $resultado_consulta_mysql=mysqli_query($conexion,$consulta_mysql);
             
				echo "<select name='select2'>";
				while($fila=mysqli_fetch_array($resultado_consulta_mysql)){
					echo "<option value='".$fila['nombre']."'>".$fila['nombre']."</option>";
				
				}
				echo "</select>";
				 
			$consulta_mysql2="select * FROM $tabla13 ";
            $resultado_consulta_mysql2=mysqli_query($conexion,$consulta_mysql2);
			
				echo "<select name='select3'>";
				while($fila2=mysqli_fetch_array($resultado_consulta_mysql2)){
					echo "<option value='".$fila2['nombre']."'>".$fila2['nombre']."</option>";
				
				}
				echo "</select>";
				
			$consulta_mysql3="select * FROM $tabla13 ";
            $resultado_consulta_mysql3=mysqli_query($conexion,$consulta_mysql3);
			
				echo "<select name='select4'>";
				while($fila3=mysqli_fetch_array($resultado_consulta_mysql3)){
					echo "<option value='".$fila3['nombre']."'>".$fila3['nombre']."</option>";
				
				}
				echo "</select>";
			
			$consulta_mysql4="select * FROM $tabla13 ";
            $resultado_consulta_mysql4=mysqli_query($conexion,$consulta_mysql4);
			
				echo "<select name='select5'>";
				while($fila4=mysqli_fetch_array($resultado_consulta_mysql4)){
					echo "<option value='".$fila4['nombre']."'>".$fila4['nombre']."</option>";
				
				}
				echo "</select>";
				
			$consulta_mysql5="select * FROM $tabla13 ";
            $resultado_consulta_mysql5=mysqli_query($conexion,$consulta_mysql5);
			
				echo "<select name='select6'>";
				while($fila5=mysqli_fetch_array($resultado_consulta_mysql5)){
					echo "<option value='".$fila5['nombre']."'>".$fila5['nombre']."</option>";
				
				}
				echo "</select>";  	
	}
            ?>
		</td>
        
		<td colspan="3">
        <div align="center">
        <?
		if ($n_ingredientes==1 and $tamano1=="pequeno"){
			$precio_personalizada=4.90;
			echo "Precio: 4.90€";
			echo "<input type='hidden' name='precio' value='$precio_personalizada'>";
		}elseif($n_ingredientes==1 and $tamano2=="mediano"){
			$precio_personalizada=6.90;
			echo "Precio: 6.90€";
			echo "<input type='hidden' name='precio' value='$precio_personalizada'>";
		}elseif($n_ingredientes==1 and $tamano3=="familiar"){
			$precio_personalizada=8.20;
			echo "Precio: 8.20€";
			echo "<input type='hidden' name='precio' value='$precio_personalizada'>";
		}elseif($n_ingredientes==2 and $tamano1=="pequeno"){
			$precio_personalizada=5.90;
			echo "Precio: 5.90€";
			echo "<input type='hidden' name='precio' value='$precio_personalizada'>";
		}elseif($n_ingredientes==2 and $tamano2=="mediano"){
			$precio_personalizada=8.20;
			echo "Precio: 8.20€";
			echo "<input type='hidden' name='precio' value='$precio_personalizada'>";
		}elseif($n_ingredientes==2 and $tamano3=="familiar"){
			$precio_personalizada=9.75;
			echo "Precio: 9.75€";
			echo "<input type='hidden' name='precio' value='$precio_personalizada'>";
		}
		
		elseif($n_ingredientes==3 and $tamano1=="pequeno"){
			$precio_personalizada=6.90;
			echo "Precio: 6.90€";
			echo "<input type='hidden' name='precio' value='$precio_personalizada'>";
		}elseif($n_ingredientes==3 and $tamano2=="mediano"){
			$precio_personalizada=9.50;
			echo "Precio: 9.50€";
			echo "<input type='hidden' name='precio' value='$precio_personalizada'>";
		}elseif($n_ingredientes==3 and $tamano3=="familiar"){
			$precio_personalizada=11.30;
			echo "Precio: 11.30€";
			echo "<input type='hidden' name='precio' value='$precio_personalizada'>";
		}
		
		elseif($n_ingredientes==4 and $tamano1=="pequeno"){
			$precio_personalizada=7.90;
			echo "Precio: 7.90€";
			echo "<input type='hidden' name='precio' value='$precio_personalizada'>";
		}elseif($n_ingredientes==4 and $tamano2=="mediano"){
			$precio_personalizada=10.80;
			echo "Precio: 10.80€";
			echo "<input type='hidden' name='precio' value='$precio_personalizada'>";
		}elseif($n_ingredientes==4 and $tamano3=="familiar"){
			$precio_personalizada=12.85;
			echo "Precio: 12.85€";
			echo "<input type='hidden' name='precio' value='$precio_personalizada'>";
		}
		
		elseif($n_ingredientes==5 and $tamano1=="pequeno"){
			$precio_personalizada=8.90;
			echo "Precio: 8.90€";
			echo "<input type='hidden' name='precio' value='$precio_personalizada'>";
		}elseif($n_ingredientes==5 and $tamano2=="mediano"){
			$precio_personalizada=12.10;
			echo "Precio: 12.10€";
			echo "<input type='hidden' name='precio' value='$precio_personalizada'>";
		}elseif($n_ingredientes==5 and $tamano3=="familiar"){
			$precio_personalizada=14.40;
			echo "Precio: 14.40€";
			echo "<input type='hidden' name='precio' value='$precio_personalizada'>";
		}
		
		?>
        
        </div>
        </td>
        
		</tr>
    <tr>
    	<td>
         
        </td>
    <tr>
		<td>&nbsp;</td>
		<td align="center"></td>
        
       <input type='hidden' name='cliente' value='$id_cliente'>
		<td colspan="3"><div align="center"><input type='image' src='../images_css/anadir.gif'></div></td>
		</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
        </td>
		<td><div align="center"></div></td>
		<td><div align="center"></div></td>
		<td><div align="center"></div></td>
	</tr>

</table>
</div>
</form>
</div>
<br>

<div class="nota"></div>
</td>
<td> </td>

</tr>

</table>
<?php centro2() ?>
<?php colDerecha1() ?>
  
  <?php if($_SESSION['autenticado']=='si'){ ?>
<?php pedido() ?>

<?php }?>

<?php colDerecha2() ?>
<?php pie() ?>
<br><br>