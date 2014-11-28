<!-- Funcion que comprueba si es un rut valido o existente -->
<script type="text/javascript" src="../BDD/jquery.js"></script>
<script>
            $(document).ready(function(){
                $('#rut').focusout( function(){
                    if($('#rut').val()!= ""){
                        $.ajax({
                            type: "POST",
                            url: "<?=site_url('transacciones/comprueba_rut');?>",
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
							    //$('#msgUsuario').html("<a href='/SCT/UsuariosyClientes/Crear_cliente2.php?cl="+$('#rut').val()+"'>Crear vendedor</a>");
                                $('#msgUsuario').html("<a href='<?=site_url('ejecutivos/nuevo_cliente');?>'>Crear vendedor</a>");
                                $("#submitbutton").attr('disabled','-1');
                              }
                            
                            
                            }
                        });
                    }
                });
                            });
</script>   

<ol class="breadcrumb">
  <li><a href="<?=site_url('');?>">Inicio</a></li>
  <li class="active"><a href="<?=site_url('transacciones/cargar_busqueda_vendedor');?>">Seleccionar cliente</a></li>
</ol>

    <div class="col-sm-2">
	</div>
    <div class="col-sm-8">
  	<div class="panel panel-custom">
            <div class="panel-heading">
              <h3 class="panel-title">Seleccionar vendedor</h3>
            </div>
            <div class="panel-body">
				<?php 
				  echo 'Transaccion a nombre de '.$data['nombre'].' '.$data['apellido'].'<br>';
				  echo "Fecha: ".date("d/m/y")."<br><br>";
					?>

				<form action="<?=site_url('transacciones/buscar_transacciones_vendedor');?>" method="post">                     
				
					Escriba aqui el rut del cliente vendedor de la transaccion:<br>
					Rut vendedor: <input name="rut"  id="rut" type="text" size="20" placeholder="Ejemplo: 123045678" required> (sin puntos ni gui&oacute;n)<div id="msgUsuario"></div><br><br>
				<input type="submit" id="submitbutton" value="Continuar" class="btn btn-default"/>

				</form>
				<br>
				
			</div>
            </div>
          	</div>


	     </div>	