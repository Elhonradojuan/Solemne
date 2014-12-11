
<ol class="breadcrumb">
  <li><a href="<?=site_url('');?>">Inicio</a></li>
  <li class="active"><a href="<?=site_url('listas/cargar_lista_ejecutivos');?>">Listar ejecutivos</a></li>
</ol>

	
<div class="col-sm-3">
</div>

<div class="col-sm-7">
  	<div class="panel panel-custom">
            <div class="panel-heading">
              <h3 class="panel-title">Lista de ejecutivos</h3>
            </div>
            <div class="panel-body">
		<table class="table">
				<tr>
					<th width=80px>Rut</th>
					<th width=90px>Nombre</th>
					<th width=90px>Apellido</th>
					<th width=90px>ID Acceso</th>
					<th colspan="2" align="center">Acci&oacute;n</th>
				</tr>	

				
					<?php 
					foreach($ejecutivos as $ejecutivo)
					{ 
						echo "<tr>";
						echo "<td>".$ejecutivo->rut."</td>";
						echo "<td>".$ejecutivo->nombre."</td>";
						echo "<td>".$ejecutivo->apellido."</td>";
						echo "<td>".$ejecutivo->id_acceso."</td>";
						echo "<td><a class='btn btn-default' href=".site_url('ejecutivos/editar_ejecutivo_lista').'/'.$ejecutivo->rut." role='button'>Editar</a>";
						echo "<td><a class='btn btn-default' href=".site_url('ejecutivos/eliminar_ejecutivo_lista').'/'.$ejecutivo->rut." role='button'>Eliminar</a>";
						echo "</tr>";
					} 
					?>
				
		</table>
            </div>
            </div>
          	</div>





	     </div>	