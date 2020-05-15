<?php
session_start();
include("includes.php");
include("conexion.php");
include("contador.php");
//include ("autenticacion.php");
?>

<?php cabecera() ?>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
<body>

<?php encabezado() ?>
<?php enlaces_publico() ?>
<?php contenido1() ?>
<?php autent2() ?>
<?php
/*
include("autenticacion.php");

echo $_SESSION["nombre"];
echo "<br>".$_SESSION["id"]."<br>";
echo $_SESSION["autenticado"]."<br>";


echo $sentencia;

echo "nuevo id usuario: ".$_SESSION["id"];
*/

?>


<?php centro11() ?>
<div id='texto_inicio'>
<img src="imagenes/qr.jpg" width="250">
  <p>
    BELSAY (Fuentes de andaluc&iacute;a) YA TIENE SU SITIO EN INTERNET. DESDE AHORA PODR&Aacute;S HACER TUS PEDIDOS ONLINE, REALIZAR PEDIDOS ANTERIORES CON UN SOLO CLICK DESDE TU HISTORIA Y MUCHAS M&Aacute;S COSAS.<br><br>
    SI AUN NO ERES USUARIO, SOLICITA YA EL ALTA <a id="link" href="solicitud.php"><strong>AQUI</strong></a> Y NO SEAS EL &Uacute;LTIMO</p>


  

    <hr>
    

  <p>Tarde/noche:<br>
    20:00 a 24:00 h.<br>
  Domingos y festivos<br>
  Mediodia:
  13:00 a 16:00 h.
  </p>
<hr>
 
  
  Reparto todos los dias.
</div>
<br></br>


<table border="0" align="right">
  <tr>
    <td width="20px">

	</td>
  
    <td width="20px"> 
  
  
 	</td>
  
    <td width="20px">
  <!--  Google -->
  	<script type="text/javascript" src="http://apis.google.com/js/plusone.js"></script>
  
  	<g:plusone></g:plusone>

    </td>
  </tr>
</table>
<br></br>


<?php centro2() ?>


<?php colDerecha1() ?>


<?php colDerecha2() ?>
<?php pie() ?>
<br><br>
