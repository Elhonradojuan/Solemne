
<ol class="breadcrumb">
  <li><a href="<?=site_url('');?>">Inicio</a></li>
  <li class="active"><a href="<?=site_url('ejecutivos/editar_cliente2');?>">Seleccionar cliente</a></li>
</ol>

    <div class="col-sm-2">
	</div>
    <div class="col-sm-8">
  	<div class="panel panel-custom">
            <div class="panel-heading">
              <h3 class="panel-title">Seleccionar cliente</h3>
            </div>
            <div class="panel-body">
				<form action="<?=site_url('ejecutivos/editar_cliente2');?>" method="post">                     
					Escriba aqui el rut del cliente que desea modificar:<br>
					Rut cliente: <input name="rut_cliente"  id="rut_cliente" type="text" size="20" placeholder="Ejemplo: 123045678" required> (sin puntos ni gui&oacute;n)<br><br>
				<input type="submit" id="submitbutton" value="Continuar" class="btn btn-default"/>

				</form>
				<br>
				
			</div>
            </div>
          	</div>


	     </div>	