
<ol class="breadcrumb">
  <li><a href="<?=site_url('');?>">Inicio</a></li>
  <li class="active">Nuevo ejecutivo</li>
</ol>

      <div class="row">
	  
        <div class="col-sm-12">
  	<div class="panel panel-danger">
            <div class="panel-heading">
              <h3 class="panel-title">Nuevo usuario del sistema</h3>
            </div>
            <div class="panel-body">

	<h3>Escriba los datos para el nuevo usuario</h3>
	<form name="Crear_usuario" id="Crear_usuario" action="<?=site_url('ejecutivos/insertar');?>" method="POST">
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
	<td>Nivel de acceso:</td> 
	<td><select name="ID">
	<option value=4 >Administrador</option>
	<option value=3 >Gestion</option>
	<option value=2 >Ejecutivo</option>
	</select>
	</td>
	</tr>

	<tr>
	<td><input type="submit" id="submitbutton" value="Guardar" /></td>
	</tr>

	</table>
	</form>

            </div>
            </div>
          	</div>


	     </div>	
