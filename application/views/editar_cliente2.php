

<ol class="breadcrumb">
  <li><a href="<?=site_url('');?>">Inicio</a></li>
  <li class="active">Editar cliente</li>
</ol>

      <div class="row">
	  
        <div class="col-sm-12">
  	<div class="panel panel-custom">
            <div class="panel-heading">
              <h3 class="panel-title">Editar cliente</h3>
            </div>
            <div class="panel-body">

	<h3>Escriba los nuevos datos para el cliente</h3>
	<form name="Crear_usuario" id="Crear_usuario" action="<?=site_url('ejecutivos/modificar_cliente');?>" method="POST">
	<table>
	<tr>
	<td>Rut:</td> 
	<td><?php echo $datos_c[0]->rut; ?></td>
	</tr>

	<tr>
	<td>Nombre:</td> 
	<td><input type="text" name="nombre" value="<?php echo $datos_c[0]->nombre; ?>" required></td>
	</tr>

	<tr>
	<td>Apellidos:</td> 
	<td><input type="text" name="apellidos"  value="<?php echo $datos_c[0]->apellido; ?>" required></td>
	</tr>

	<tr>
	<td>Password:</td> 
	<td><input type="password" name="password" value="<?php echo $datos_c[0]->password; ?>" required></td>
	</tr>

	<tr>
	<input type="hidden" name="rut" value="<?php echo $datos_c[0]->rut; ?>">
	<td><input type="submit" id="submitbutton" value="Guardar" class="btn btn-default"/></td>

	</tr>

	</table>
	</form>

            </div>
            </div>
          	</div>


	     </div>	
