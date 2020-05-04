<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Convertidor de tallas</title>
</head>

<body>
<?php 

include("conexion.php");

$in_talla=$_POST['talla'];

$in_marca=$_POST['select2'];

$in_sexo_h=$_POST['hombre'];

$in_sexo_m=$_POST['mujer'];

if ($in_marca!="") { // NOS DEVUELVE EL VALOR DEL ID CON SU RESPECTIVO NOMBRE !!!
	$consulta2=mysqli_query($conexion,"SELECT * FROM $tabla34 WHERE id_marca=$in_marca");
	$registro2=mysqli_fetch_row($consulta2);
		 	
		$nombre_marca=$registro2[1];
}

///////////////////////////////////////////////////////////////////////////CONSULTA A LA BD ( OJO TABLA 33) ///////////////////////////////
$ssql = "select * from `$tabla33` WHERE marca='$nombre_marca' ";
$consulta = mysqli_query($conexion,$ssql);
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo "<h2><b>".$nombre_marca."</b></h2>";
echo "<b>Para: </b>".$in_sexo_m . $in_sexo_h;
echo "<table border='0' width='650'>";
// LA SEÑORA TABLA !!!!
echo "<tr> <td> <div align='center'> Modelo</div></td>
<td><div align='center'> Talla1 </div></td> 
<td><div align='center'> Talla2 </div></td>
<td><div align='center'> Talla3 </div></td>
<td><div align='center'> Talla4 </div></td> 
<td><div align='center'> Talla5 </div></td> 
<td><div align='center'> Talla6 </div></td> 
<td><div align='center'> Talla7 </div></td> 
<td><div align='center'> Talla8 </div></td> 
<td><div align='center'> Talla9 </div></td> 
 
</tr>";

while ($row=mysqli_fetch_object($consulta)){ // CONSULTA PARA MOSTRAR POR PANTALLA

// LE ASINGNO UNAS VARIABLES 
$marca=$row->marca;
$modelo=$row->modelo;
$sexo=$row->sexo;

$talla1=$row->talla1;
$talla2=$row->talla2;
$talla3=$row->talla3;
$talla4=$row->talla4;
$talla5=$row->talla5;
$talla6=$row->talla6;
$talla7=$row->talla7;
$talla8=$row->talla8;
$talla9=$row->talla9;
$talla10=$row->talla10;

		echo "<tr id='".$estilo."'>";
		
		// IMPRIMO POR PANTALLA LOS RESULTADOS SEGUN LOS CM QUE NOS A DADO 
			echo "<td align='center'>".$modelo."</td>";
			
			if ($in_talla<=$talla1){ //25.4
			echo "<td align='center'>40</td>";
			}else{
				echo "<td align='center'> - </td>";
			}
			if ($in_talla<=$talla2 AND $in_talla>=$talla1 ){ // 26.0
			echo "<td align='center'>41</td>";
			}else{
				echo "<td align='center'> - </td>";
			}
			if ($in_talla<=$talla3 AND $in_talla>=$talla2 ){  // 26.7
			echo "<td align='center'>42</td>";
			}else{
				echo "<td align='center'> - </td>";
			}
			if ($in_talla<=$talla4 AND $in_talla>=$talla3 ){ //27.3
			echo "<td align='center'>43</td>";
			}else{
				echo "<td align='center'> - </td>";
			}
			if ($in_talla<=$talla5 AND $in_talla>=$talla4 ){  // 27.9
			echo "<td align='center'>44</td>";
			}else{
				echo "<td align='center'> - </td>";
			}
			if ($in_talla<=$talla6 AND $in_talla>=$talla5 ){  // 28.6 
			echo "<td align='center'>45</td>";
			}else{
				echo "<td align='center'> - </td>";
			}
			if ($in_talla<=$talla7 AND $in_talla>=$talla6 ){  // 29.2 
			echo "<td align='center'>46</td>";
			}else{
				echo "<td align='center'> - </td>";
			}
			if ($in_talla<=$talla8 AND $in_talla>=$talla7 ){  // 29.8 
			echo "<td align='center'>47</td>";
			}else{
				echo "<td align='center'> - </td>";
			}
			if ($in_talla<=$talla9 AND $in_talla>=$talla8 ){ // 30.5
			echo "<td align='center'>47</td>";
			}else{
				echo "<td align='center'> - </td>";
			}
			
			//echo "<td align='left'>".$talla10."</td>";
			
	 echo "</tr>";
	}
	echo "</table>";

//cerramos el conjunto de resultado y la conexión con la base de datos

?>
</body>
</html>