<?php
session_start();
include("includes.php");
include("conexion.php");
include("contador.php");
//include ("autenticacion.php");
?>

<?php cabecera() ?>

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

<!--<div id='texto_inicio'>
  <p><br />
   EN ESTOS MOMENTOS NO ESTA DISPONIBLE.
  <p>&nbsp;</p>
</div> -->
<br>
<br>
<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.es/maps/ms?msa=0&amp;msid=213982731381806675555.0004c57e09ac432615665&amp;ie=UTF8&amp;t=m&amp;iwloc=0004c57e09ae0baaccf6b&amp;ll=37.468926,-5.344394&amp;spn=0,0&amp;output=embed"></iframe><br /><small>Ver <a href="https://maps.google.es/maps/ms?msa=0&amp;msid=213982731381806675555.0004c57e09ac432615665&amp;ie=UTF8&amp;t=m&amp;iwloc=0004c57e09ae0baaccf6b&amp;ll=37.468926,-5.344394&amp;spn=0,0&amp;source=embed" style="color:#0000FF;text-align:left">BELSAY</a> en un mapa m&aacute;s grande</small>


<?php centro2() ?>
<?php colDerecha1() ?>




<?php colDerecha2() ?>
<?php pie() ?>
<br><br>