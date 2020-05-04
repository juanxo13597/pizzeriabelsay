<?php function calendario(){ ?>
<?php $pag=$_SERVER['PHP_SELF'];  ?>
<fieldset id="calendario">
	<legend><img src="../imagenes/calendario.png"> Calendario</legend>
	<form action="<?php $pag; ?>" method="post">
		<table border="0" id="tabla_calendario">
			<tr>
				<td>
					
				</td>
			</tr>

			<tr>
				<td class="titulo">Desde:</td>
			</tr>
			
			<tr>
				<td align="center"><input type="text" name="dia_desde" size="2">/<input type="text" name="mes_desde" size="2">/<input type="text" name="ano_desde" size="4"><br>dia / mes / a&ntilde;o</td>
			</tr>
			
			<tr>
				<td class="titulo">Hasta:</td>
			</tr>

			<tr>
				<td align="center"><input type="text" name="dia_hasta" size="2">/<input type="text" name="mes_hasta" size="2">/<input type="text" name="ano_hasta" size="4"><br>dia / mes / a&ntilde;o</td>
			</tr>
			
			<tr>
				<td align="right"><input type="submit" name="buscar" value="buscar"></td>
			</tr>
		
		</table>
	</form>
</fieldset>
<?php } ?>