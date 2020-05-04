<?php 
include("../conexion.php"); //Nos conectamos a la base de datos
//Limito la busqueda
$TAMANO_PAGINA = 10;

//examino la p�gina a mostrar y el inicio del registro a mostrar
$pagina = $_GET["pagina"];
if (!$pagina) {
    $inicio = 0;
    $pagina=1;
}
else {
    $inicio = ($pagina - 1) * $TAMANO_PAGINA;
}


//miro a ver el n�mero total de campos que hay en la tabla con esa b�squeda
$ssql = "select * from usuarios";
$rs = mysqli_query($conexion,$ssql);
$num_total_registros = mysqli_num_rows($rs);
//calculo el total de p�ginas
$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);

//pongo el n�mero de registros total, el tama�o de p�gina y la p�gina que se muestra
echo "N�mero de registros encontrados: " . $num_total_registros . "<br>";
echo "Se muestran p�ginas de " . $TAMANO_PAGINA . " registros cada una<br>";
echo "Mostrando la p�gina " . $pagina . " de " . $total_paginas . "<p>"; 

//construyo la sentencia SQL
$ssql = "select * from usuarios limit " . $inicio . "," . $TAMANO_PAGINA;
$rs = mysqli_query($conexion,$ssql);

/*
while ($fila = mysqli_fetch_object($rs)){
    echo $fila->nombre_pais . "<br>";
}
*/


echo "<table border='2' id='tabla_gestion'>";

echo "<tr id='cabecera_tabla'> <td> <div id='texto_titulo'> ID </div></td> <td><div id='texto_titulo'> Nombre </div></td> <td><div id='texto_titulo'> Apellidos </div></td> <td><div id='texto_titulo'> Mail </div></td> <td><div id='texto_titulo'> Clave metre </div></td> <td><div id='texto_titulo'> Direccion </div></td> <td><div id='texto_titulo'> M&oacute;vil </div></td> <td><div id='texto_titulo'> Acci&oacute;n </div></td> </tr>";

$i=1;
while ($registro=mysqli_fetch_row($rs)){

$i++;
if($i%2==0){
	$estilo="fila_par";
}else{
	$estilo="fila_inpar";
	}

		echo "<tr id='".$estilo."'>";
			echo "<td>".$registro[0]."</td>";
			echo "<td>".$registro[5]."</td>";
			echo "<td>".$registro[6]." ".$registro[7]."</td>";
			echo "<td>".$registro[1]."</td>";
			echo "<td>".$registro[3]."</td>";
			echo "<td>".$registro[8].", ".$registro[9]." ".$registro[12]." ".$registro[13]."</td>";
			echo "<td>".$registro[10]."</td>";
			echo "<td> <a href='?accion=anadir&id=$registro[0]'> <div id='enlace'><img src='../imagenes/ficha.gif' name='ficha' alt='ficha' border='0'> </a>|";
			echo "<a href='?accion=modificar&id=$registro[0]'><img src='../imagenes/edit.gif' alt='editar' border='0'></a> <a href='?accion=borrar&id=$registro[0]'>|<img src='../imagenes/delete.gif' name='borrar' alt='borrar' border='0'></a></div></td>";
	 echo "</tr>";
	}
	echo "</table>";



//cerramos el conjunto de resultado y la conexi�n con la base de datos
mysqli_free_result($rs);
mysqli_close($connexion); 

//muestro los distintos �ndices de las p�ginas, si es que hay varias p�ginas
if ($total_paginas > 1){
    for ($i=1;$i<=$total_paginas;$i++){
       if ($pagina == $i)
          //si muestro el �ndice de la p�gina actual, no coloco enlace
          echo $pagina . " ";
       else
          //si el �ndice no corresponde con la p�gina mostrada actualmente, coloco el enlace para ir a esa p�gina
          echo "<a href='prueba.php?pagina=" . $i . "&criterio=" . $txt_criterio . "'>" . $i . "</a> ";
    }
} 

?>