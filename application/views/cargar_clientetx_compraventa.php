
<ol class="breadcrumb">
  <li><a href="<?=site_url('');?>">Inicio</a></li>
  <li><a href="<?=site_url('transacciones/cargar_busqueda_vendedor');?>">Seleccionar cliente</a></li>
  <li class="active"><a href="<?=site_url('transacciones/buscar_transacciones_vendedor');?>">Seleccionar transaccion</a></li>
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
				  echo 'Nombre vendedor: '.$data_cliente[0]->nombre.' '.$data_cliente[0]->apellido.'<br>';
				  $rut_cliente = $data_cliente[0]->rut;
				  echo "Fecha: ".date("d/m/y")."<br><br>";
					?>
<br>
		<table class="table">

		<tr>
			<th width=120px>Fecha</th>
			<th width=120px>Tipo inmueble</th>
			<th width=120px>Direcci&oacute;n</th>
			<th width=120px>Estado</th>                        
			<th colspan="2">Acci&oacute;n</th>
		</tr>
		
			<?php 

			foreach($transacciones as $transaccion)
			{
				echo '<tr>';
				echo '<td>'.$transaccion->fecha.'</td>';
				echo '<td>'.$transaccion->tipo_inmueble.'</td>';
				echo '<td>'.$transaccion->direccion.' '.$transaccion->numeracion.'</td>';
				echo '<td>'.$transaccion->estado.'</td>';
				//echo '<td><button onclick="window.location.href=';site_url('transacciones/editar_cyv');echo '/'.$rut_cliente.'/'.$transaccion->id_transaccion."> Editar </button>"';
				echo "<td><a class='btn btn-default' href='".site_url('transacciones/editar_cyv').'/'.$rut_cliente.'/'.$transaccion->id_transaccion."' role='button'>Editar</a></td>";
				echo '</tr>';
			 }
			?>
			
			</tr>
				
	</table>
	
			 <?php
			 if ($transacciones == NULL)
			 {
				echo '----No hay transacciones de compra/venta para este usuario----';
			 }
			 ?>
			 
	<br><br>
	Para iniciar un nuevo proceso de Compra/Venta presione el siguiente bot&oacute;n<br>
    <a class='btn btn-default' href="<?php echo site_url('transacciones/nuevo_cyv').'/'.$rut_cliente; ?>" role='button'>Comenzar</a>



            </div>
            </div>
          	</div>


	     </div>	