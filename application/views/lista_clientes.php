
<ol class="breadcrumb">
  <li><a href="<?=site_url('');?>">Inicio</a></li>
  <li class="active"><a href="<?=site_url('listas/cargar_lista_clientes');?>">Listar clientes</a></li>
</ol>

	
<div class="col-sm-3">
</div>

<div class="col-sm-5">
  	<div class="panel panel-custom">
            <div class="panel-heading">
              <h3 class="panel-title">Lista de clientes</h3>
            </div>
            <div class="panel-body">
		<table class="table">
				<tr>
					<th width=80px>Rut</th>
					<th width=90px>Nombre</th>
					<th width=90px>Apellido</th>
					<th colspan="2" align="center">Acci&oacute;n</th>
				</tr>	

				
					<?php 
					foreach($clientes as $cliente)
					{ 
						echo "<tr>";
						echo "<td>".$cliente->rut."</td>";
						echo "<td>".$cliente->nombre."</td>";
						echo "<td>".$cliente->apellido."</td>";
						echo "<td><a class='btn btn-default' href=".site_url('ejecutivos/editar_cliente_lista').'/'.$cliente->rut." role='button'>Editar</a>";
						echo "<td><a class='btn btn-default' href=".site_url('ejecutivos/eliminar_cliente_lista').'/'.$cliente->rut." role='button'>Eliminar</a>";
						echo "</tr>";
					} 
					?>
				
		</table>
            </div>
            </div>
          	</div>





	     </div>	