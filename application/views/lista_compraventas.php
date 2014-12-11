
<ol class="breadcrumb">
  <li><a href="<?=site_url('');?>">Inicio</a></li>
  <li class="active"><a href="<?=site_url('listas/cargar_lista_compraventa');?>">Listar Compra/Venta</a></li>
</ol>

	
<div class="col-sm-1">
</div>

<div class="col-sm-10">
  	<div class="panel panel-custom">
            <div class="panel-heading">
              <h3 class="panel-title">Lista de Transacciones</h3>
            </div>
            <div class="panel-body">
		<table class="table">
				<tr>
					<th width=70px># Caso</th>
					<th width=90px>Fecha</th>
					<th width=90px>Rut Comprador</th>
					<th width=90px>Rut Vendedor</th>
					<th width=90px>Tipo Inmueble</th>
					<th width=90px>Direccion</th>
					<th width=90px>Numeracion</th>
					<th width=90px>Estado</th>
					<th colspan="1" align="center">Acci&oacute;n</th>
				</tr>	

				
					<?php 
					foreach($compraventas as $compraventa)
					{ 
						echo "<tr>";
						echo "<td>".$compraventa->id_transaccion."</td>";
						echo "<td>".$compraventa->fecha."</td>";
						echo "<td>".$compraventa->rut_cliente_comprador."</td>";
						echo "<td>".$compraventa->rut_cliente."</td>";
						echo "<td>".$compraventa->tipo_inmueble."</td>";
						echo "<td>".$compraventa->direccion."</td>";
						echo "<td>".$compraventa->numeracion."</td>";
						echo "<td>".$compraventa->estado."</td>";
						echo "<td><a class='btn btn-default' href=".site_url('transacciones/editar_cyv').'/'.$compraventa->rut_cliente.'/'.$compraventa->id_transaccion." role='button'>Editar</a>";
						echo "</tr>";
					} 
					?>
				
		</table>
            </div>
            </div>
          	</div>





	     </div>	