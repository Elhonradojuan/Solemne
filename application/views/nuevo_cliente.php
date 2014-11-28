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
                                $('#msgUsuario').html("");
                                $('#submitbutton').removeAttr('disabled')  
                              }
                            
                            
                            }
                        });
                    }
                });
                            });
</script>   

<ol class="breadcrumb">
  <li><a href="<?=site_url('');?>">Inicio</a></li>
  <li class="active">Nuevo cliente</li>
</ol>

      <div class="row">
	  
        <div class="col-sm-12">
  	<div class="panel panel-custom">
            <div class="panel-heading">
              <h3 class="panel-title">Nuevo cliente</h3>
            </div>
            <div class="panel-body">

	<h3>Escriba los datos para el nuevo cliente</h3>
	<form name="Crear_usuario" id="Crear_usuario" action="<?=site_url('ejecutivos/insertar_cliente');?>" method="POST">
	<table>
	<tr>
	<td>Rut:</td> 
	<td><input type="text" name="rut" id="rut" required /></td><td><div id="msgUsuario"></div></td>
	</tr>

	<tr>
	<td>Nombre:</td> 
	<td><input type="text" name="nombre" required></td>
	</tr>

	<tr>
	<td>Apellidos:</td> 
	<td><input type="text" name="apellidos" required></td>
	</tr>

	<tr>
	<td>Password:</td> 
	<td><input type="password" name="password" required></td>
	</tr>

	<tr>
	<td><input type="submit" id="submitbutton" value="Guardar" class="btn btn-default"/></td>

	</tr>

	</table>
	</form>

            </div>
            </div>
          	</div>


	     </div>	
