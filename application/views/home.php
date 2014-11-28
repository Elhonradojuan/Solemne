
      <div class="well" >
	  <?php 
        echo 'Bienvenido/a .'.$data['nombre'].' '.$data['apellido'].'<br>';
		echo "Fecha: ".date("d/m/y");
		//print_r ($data);
		?>
      </div>
      <div class="row">

		<?php foreach($transacciones as $ultimastx)
			{ 
			echo '<div class="col-sm-4"><div class="panel panel-custom"><div class="panel-heading">';
            echo '<h3 class="panel-title">Transaccion '.$ultimastx->id_transaccion.'</h3></div>';
            echo '<div class="panel-body">';
			
			echo '<b>Nombre Vendedor:</b> '.$ultimastx->nombre.' '.$ultimastx->apellido.'<br>';
			echo '<b>Rut Vendedor:</b> '.$ultimastx->rut_cliente.'<br>';
			echo '<b>Rut Comprador:</b> '.$ultimastx->rut_cliente_comprador.'<br>';
			echo '<b>Tipo Transaccion:</b> '.$ultimastx->tipo_transaccion.'<br>';
			echo '<b>Direccion:</b> '.$ultimastx->direccion.' '.$ultimastx->numeracion.'<br>';
			echo '<b>Tipo Inmueble:</b> '.$ultimastx->tipo_inmueble.'<br>';
			echo '<b>Estado:</b> '.$ultimastx->estado.'<br>';
			//echo '<center><button type="button" class="btn btn-custom">Ir</button></center>';    
			echo "<center><a class='btn btn-custom' href='".site_url('transacciones/editar_cyv').'/'.$ultimastx->rut_cliente.'/'.$ultimastx->id_transaccion."' role='button'>Ir</a></center>";

			
			echo '</div>';
			echo '</div>';
			echo '</div>';
			} 
			?>
		
	
		
        </div><!-- /.col-sm-4 -->


