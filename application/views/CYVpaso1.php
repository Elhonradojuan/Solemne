

<!-- Funciones que muestran select dependientes, ciudades dependiendo region, y comunas segun la ciudad escogida-->
<script type="text/javascript">
  $(document).ready(function(){
    $("#Region").change(function(){
    $.ajax({
      url:"<?=site_url('transacciones/ciudades');?>",
      type: "POST",
      data:"Region="+$("#Region").val(),
      success: function(opciones){
        $("#Ciudad").html(opciones);
      }
    })
  });
});

  $(document).ready(function(){
    $("#Ciudad").change(function(){
    $.ajax({
      url:"<?=site_url('transacciones/comunas');?>",
      type: "POST",
      data:"Ciudad="+$("#Ciudad").val(),
      success: function(opciones2){
        $("#Comuna").html(opciones2);
      }
    })
  });
});
</script>
<!-- Funcion que comprueba si es un rut valido o existente 
<script type="text/javascript" src="../BDD/jquery.js"></script>
<script>
            $(document).ready(function(){
                $('#rut').focusout( function(){
                    if($('#rut').val()!= ""){
                        $.ajax({
                            type: "POST",
                            url: "<?=site_url('transacciones/rut_valido');?>",
                            data: "rut="+$('#rut').val(),
                  
                            beforeSend: function(){
                              $('#msgUsuario').html(' Verificando...');
                                $("#submitbutton").attr('disabled','-1');
                            },
                            success: function( respuesta ){
                              if(respuesta == 2){
                                $('#msgUsuario').html("Este no es un Rut valido");
                                $("#submitbutton").attr('disabled','-1');
                            }
                              if(respuesta == 0){
                                $('#msgUsuario').html("");
                                $('#submitbutton').removeAttr('disabled')                                
                            }
                              if(respuesta == 1){
                                $('#msgUsuario').html("<a href='/SCT/UsuariosyClientes/Crear_cliente2.php?cl="+$('#rut').val()+"'>Crear vendedor</a>");
                                $("#submitbutton").attr('disabled','-1');
                              }
                            
                            
                            }
                        });
                    }
                });
                            });
</script>   
-->




<ol class="breadcrumb">
  <li><a href="<?=site_url('');?>">Inicio</a></li>
  <li class="active">Seleccionar cliente</li>
  <li class="active">Compra/Venta Paso 1</li>
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
<form method="post" action="BDD/Compra_paso1_ingresar_propiedad.php">
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