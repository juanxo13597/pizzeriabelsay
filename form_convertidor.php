<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Convertidor</title>
</head>

<body>


<form method="post" action="convertidor.php" >
      <fieldset >
      	<legend >Convertidor</legend>
        <ol>
       		 <li><input type='radio' name='hombre' value='Hombre'>Hombre</li>
             
              <li><input type='radio' name='mujer' value='Mujer'>Mujer</li>
              
              <li>Marca: 
              <?php generaSelect(); ?></li>
              
        	<li><label>Numero en cm:</label><input type="text" size="30" name="talla" /></li>
           
        </ol>
        <input type="submit"   name="mysubmit" value="Enviar" />
      </fieldset>
</div>
</form>
<?php 
function generaSelect(){
	
include 'conexion.php';
	$consulta=mysqli_query($conexion,"SELECT id_marca, marca FROM $tabla34 WHERE `marca` NOT LIKE '2' AND `marca` NOT LIKE '1'"); // LISTA DE MARCAS OJO!!! TABLA 34
	// desconectar();

	// Voy imprimiendo el primer select 
	echo "<select name='select2' onChange='cargaContenido(this.id)'>";
	echo "<option value='0'>Elije la marca...</option>";
	while($registro=mysqli_fetch_row($consulta))
	{
		
		echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
	}
	echo "</select>";
	
}
?>
</body>
</html>