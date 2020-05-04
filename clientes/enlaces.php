<?php function enlaces2(){

?>			
				<div id="enlaces_sup">

					<a href="perfil.php"><?php echo $_SESSION["nombre"]." ".$_SESSION["apellido1"]; ?> |</a> 
					<a href="perfil.php">Ficha personal |</a> 
					Contacte con nosotros |
					<a href="../salir.php">Salir</a>
				</div>
			</div>			
			
			<div id="cabecera_caja">
				<div align="bottom">
					<table border="0" id="menu">
						<tr>
							<td valign="bottom" width="110"><div id="seccion_menu"><a href="solicitud.php">alta</a></div></td>
							<td valign="bottom" width="110"><div id="seccion_menu"><a href="../index.php">texto</a></div></td>
							<td valign="bottom" width="110"><div id="seccion_menu">texto</div></td>
							<td valign="bottom" width="110"><div id="seccion_menu">texto</div></td>
							<td valign="bottom" width="110"><div id="seccion_menu">texto</div></td>
							<td valign="bottom" width="110"><div id="seccion_menu">texto</div></td>
							<td valign="bottom"></td>
						</tr>
					
					</table>				
				</div>


<div id="entrar" align="center" valign="middle"><a href="../entrar.php">ZONA CLIENTES</a></div>

			</div>

<div id="subenlaces_clientes">
	<div id="subenlaces_top"></div>
		<div id="texto">
	<a href="index.php">Carta</a>|<a href="historial.php">Historial</a>|<a href="lista_personalizadas.php">Pizzas personalizadas</a>|<a href="perfil.php">Tus datos</a>
		</div>
</div>
		
			<div id="caja">
<?php } ?>