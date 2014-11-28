
<ol class="breadcrumb">
  <li><a href="<?=site_url('');?>">Inicio</a></li>
  <li class="active">Seleccionar cliente</li>
  <li class="active">Compra/Venta Paso 1</li>
  <li class="active">Compra/Venta Paso 2</li>
</ol>

<?php //print_r($data); ?>

<div class="row">
<div class="col-sm-2">
         </div>

<div class="col-sm-6">
  	<div class="panel panel-danger">
      <div class="panel-heading">
        <h3 class="panel-title">Paso uno</h3>
         </div>
        <div class="panel-body">

<h3>Datos basicos</h3>
<table>
<form method="post" action="<?=site_url('transacciones/insertarcyvpaso1');?>">
<tr align="left">
<td>Rol avaluo:</td> 
<td><input name="Rol" type="text" placeholder="xxx-xxx" required/></td>
</tr>

<tr>
<td>Pais:</td> 
<td><input name="Pais" type="text" value="Chile"  required/></td>
</tr>


<!-- REGION   -->

<tr>
<td>Region:</td> 
<td><select name="Region" id="Region">

<?php echo $regiones;?>

</select>
</td>
</tr>

<tr>
<td>Ciudad:</td> 
<td><select name="Ciudad" id="Ciudad">

</select>
</td>
</tr>


<tr>
<td>Comuna:</td> 
<td><select name="Comuna" id="Comuna">

</select>
</td>
</tr>


<tr>
<td>Direccion:</td> 
<td><input name="Direccion" type="text"  required/></td>
</tr>


<tr>
<td>Sector:</td> 
<td><input name="Sector" type="text" /></td>
</tr>


<tr>
<td>Numeracion:</td> 
<td><input name="Numeracion" type="text"  required/></td>
</tr>


<tr>
<td>Tipo de inmueble:</td> 
<td><select name="Tipo">
<option value="Casa">Casa</option>
<option value="Departamento">Departamento</option>
<option value="Sitio">Sitio</option>
<option value="Bodega">Bodega</option>
</select>
</td>
</tr>

<tr>
<td>Rut comprador:</td> 
<td><input name="rut" id="rut" type="text" required/></td><td><div id="msgUsuario"></div></td>
</tr>

<tr>
<td>Nombre del Captador:</td> 
<td><input name="nombrecaptador" type="text" required/></td>
</tr>

<tr>
<td>Fecha de Captacion:</td> 
<td><input name="fechacaptacion" type="date" required/></td>
</tr>


<tr>
<td  width="127">Estado:</td> 
<td><select name="Estado">
<option value="En Curso">EN CURSO</option>
<option value="Observacion">OBSERVACIÓN</option>
<option value="Finalizada">FINALIZADA</option>
</select>
</td>
</tr>

<input type="hidden" name="RutC" value="<?php echo 11111111; ?>">
<!--<input type="hidden" name="RutC" value="<?php// echo $rut_cliente; ?>">-->

<tr>
<td><input type="submit" id="submitbutton" value="Guardar" /></td>
</tr>

</form>
</table>


            </div>
            </div>
          	</div>



<div class="col-sm-4">
<p>Tipo de transaccion: Compra/Venta</p>
<p>Transaccion a nombre de <? echo "_SESSION['user_name']"; ?></p>
<p>Nombre vendedor: <?php echo "nombrevende"; ?></p>
<p>Fecha: <?php echo date("d/m/y"); ?></p>
</div>			
			
	     </div>	