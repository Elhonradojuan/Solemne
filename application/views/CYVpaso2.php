<!------------------------- Funcion que oculta o despliega las tablas mediante un checkbox------------------------------>
<script type="text/javascript">
    function showContent(desplegar,box) {
        var element = document.getElementById(desplegar);
        var check = document.getElementById(box);
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
</script>



<script>
	function mostrarOcultarTablas(id){
		mostrado=0;
		elem = document.getElementById(id);
		if(elem.style.display=='block')mostrado=1;
		elem.style.display='none';
		if(mostrado!=1)elem.style.display='block';
	}
</script>
<!-- ------------------------------------- -->


<ol class="breadcrumb">
  <li><a href="<?=site_url('');?>">Inicio</a></li>  
  <li><a href="<?=site_url('transacciones/cargar_busqueda_vendedor');?>">Seleccionar cliente</a></li>
  <li><a href="<?=site_url('transacciones/buscar_transacciones_vendedor2/'.$datos_tx['rut']);?>">Seleccionar transaccion</a></li>
  <li><a href="<?=site_url('transacciones/editar_cyv/'.$datos_tx['rut'].'/'.$datos_tx['id_tx']);?>">Compra/Venta Paso 1</a></li>
  <li class="active">Compra/Venta Paso 2</li>
</ol>

<?php  //print_r ($precioypie); ?>
<!--
<div class="row">
<div class="col-sm-2">
         </div>
-->

<div class="col-sm-8">
  	<div class="panel panel-custom">
      <div class="panel-heading">
        <h3 class="panel-title">Precio y pie</h3>
         </div>
        <div class="panel-body">

<table>
<form method="post" action="<?=site_url('transacciones/precioypie');?>">
<input type="hidden" name="id_tx" value="<?php echo $datos_tx['id_tx']; ?>">
<input type="hidden" name="rut" value="<?php echo $datos_tx['rut']; ?>">
<tr>
<td>Precio Acordado:</td> 
<?php echo $precioypie['precioacordado'];?>
<td>
<?php echo $precioypie['Monedaprecioacordado']; ?>
</td>
</tr>
<tr>
<td>Forma de Pago:</td> 
<td>
<?php echo $precioypie['Forma']; ?>
</td>
</tr>
<tr>
<td>% de Pie de Pago:</td> 
<?php echo $precioypie['Ppie']; ?>
</tr>
<tr>
<td>% del Pago Cr&eacute;dito:</td> 
<?php echo $precioypie['Ppiec']; ?>
</tr>
<tr>
<td>Hipoteca:</td> 
<?php echo $precioypie['hipoteca']; ?>

<tr>
<td width=180px>Banco:</td> 
<?php echo $precioypie['Banco']; ?>
</tr>
<tr>
<td>Hipoteca Alzada:</td> 
<?php echo $precioypie['hipA']; ?>
</tr>

<tr>
<td width=180px>Escritura recibida:</td> 
<?php echo $precioypie['EscrituraR'];
 //echo $precioypie['ObsEscrituraR']; ?>
</tr>

</table>
<input type="submit" value="Guardar" />

</form>
</table>



            </div>
            </div>
          	</div>
<!---------------------------------------------------------------------------->

<div class="col-sm-4">
<p>Tipo de transaccion: Compra/Venta</p>
<p>Transaccion a nombre de <? echo "_SESSION['user_name']"; ?></p>
<p>Nombre vendedor: <?php echo "nombrevende"; ?></p>
<p>Fecha: <?php echo date("d/m/y"); ?></p>
</div>	
<!---------------------------------------------------------------------------->

<div class="col-sm-8">
  	<div class="panel panel-custom">
      <div class="panel-heading">
        <h3 class="panel-title">Persona natural</h3>
         </div>
        <div class="panel-body">

<table>
<form method="post" action="<?=site_url('transacciones/personanatural');?>">
<input type="hidden" name="id_tx" value="<?php echo $datos_tx['id_tx']; ?>">
<input type="hidden" name="rut" value="<?php echo $datos_tx['rut']; ?>">
<tr>
<td>Escritura Vigente:</td> 
<?php echo $personanatural['Escrituravigente'];
echo $personanatural['ObsEscrituravigente'];?>

</tr>
<tr>
<td>Certificado dominio vigente:</td> 
<?php echo $personanatural['CertificadoV'];
echo $personanatural['ObsCertificadoV'];?>
</tr>

<tr>
<td>Avaluo fiscal:</td> 
<?php echo $personanatural['Avaluo'];
echo $personanatural['ObsAvaluo'];?>
</tr>

<tr>
<td>Certificado deudas de contribuciones:</td> 
<?php echo $personanatural['Certificadodeudas'];
echo $personanatural['ObsCertificadodeudas'];?>
</tr>

<tr>
<td>No expropiacion municipal:</td> 
<?php echo $personanatural['Expmunicipal'];
echo $personanatural['ObsExpmunicipal']; ?>
</tr>

<tr>
<td>Certificado de gastos comunes:</td> 
<?php echo $personanatural['Certificadogastoscomunes'];
echo $personanatural['ObsCertificadogastoscomunes'];?>
</tr>

<tr>
<td>Escritura alzamiento:</td> 
<?php echo $personanatural['EscAlzamiento']; 
echo $personanatural['ObsEscAlzamiento']; ?>
</tr>

<tr>
<td>Escrituras anteriores:</td> 
<?php echo $personanatural['EscAnteriores'];
echo $personanatural['ObsEscAnteriores'];?>
</tr>

	
<tr>
<td>Certificado de matrimonio:</td> 
<?php echo $personanatural['Matrimonio'];
echo $personanatural['ObsMatrimonio'];?>
</tr>

<tr>
<td>Recepcion final municipal:</td> 
<?php echo $personanatural['RecMuni'];
echo $personanatural['ObsRecMuni']; 
?>
</tr>
    
<tr>
<td><input type="submit" value="Guardar" /></td>
</tr>
</form>
</table>



            </div>
            </div>
          	</div>





		
			
	     </div>	