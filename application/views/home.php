
      <div class="alert alert-success" role="alert">
	  <?php 
        echo 'Bienvenido/a.'.$data['nombre'].' '.$data['apellido'].'<br>';
		print_r ($data);
		?>
      </div>
      <div class="row">

		<?php foreach($transacciones as $ultimastx)
			{ 
			echo '<div class="col-sm-4"><div class="panel panel-danger"><div class="panel-heading">';
            echo '<h3 class="panel-title">Transaccion '.$ultimastx->id_transaccion.'</h3></div>';
            echo '<div class="panel-body">';
			
			echo '<b>Rut Comprador:</b>'.$ultimastx->rut_cliente_comprador.'<br>';
			echo '<b>Nombre Comprador:</b> ANA LUZ DURÁN BAEZ<br>';
			echo '<b>Nombre Vendedor:</b> JORGE IVÁN SANHUEZA SELPULVEDA<br>';
			echo '<b>Tipo Transaccion:</b> '.$ultimastx->tipo_transaccion.'<br>';
			echo '<b>Direccion:</b> '.$ultimastx->direccion.' '.$ultimastx->numeracion.'<br>';
			echo '<b>Tipo Inmueble:</b> '.$ultimastx->tipo_inmueble.'<br>';
			echo '<b>Estado:</b> '.$ultimastx->estado.'<br>';
			echo '<center><button type="button" class="btn btn-default">Ir</button></center>';
			
			echo '</div>';
			echo '</div>';
			echo '</div>';
			} 
			?>
		
	  
	    <!-- 
        <div class="col-sm-4">
            <div class="panel panel-danger">
            <div class="panel-heading">
              <h3 class="panel-title">Transaccion 114</h3>
            </div>
            <div class="panel-body">
				<b>Rut Comprador:</b> 86634767<br>
				<b>Nombre Comprador:</b> ANA LUZ DURÁN BAEZ<br>
				<b>Nombre Vendedor:</b> JORGE IVÁN SANHUEZA SELPULVEDA<br>
				<b>Tipo Transaccion:</b> CompraVenta<br>
				<b>Direccion:</b> Pastor Fernandez #16041<br>
				<b>Tipo Inmueble:</b> Casa<br>
				<b>Estado:</b> En Curso<br>
			  <center><button type="button" class="btn btn-danger">Ir</button></center>

            </div>
          </div>
        </div>
		<--
				
		
	  <!-- 
        <div class="col-sm-4">
            <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Transaccion 114</h3>
            </div>
            <div class="panel-body">
				<b>Rut Comprador:</b> 86634767<br>
				<b>Nombre Comprador:</b> ANA LUZ DURÁN BAEZ<br>
				<b>Nombre Vendedor:</b> JORGE IVÁN SANHUEZA SELPULVEDA<br>
				<b>Tipo Transaccion:</b> CompraVenta<br>
				<b>Direccion:</b> Pastor Fernandez #16041<br>
				<b>Tipo Inmueble:</b> Casa<br>
				<b>Estado:</b> En Curso<br>
			  <center><button type="button" class="btn btn-default">Ir</button></center>

            </div>
          </div>
	
        </div>
		
		-->
		
	 <!-- 
        <div class="col-sm-4">
            <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Transaccion 114</h3>
            </div>
            <div class="panel-body">
				<b>Rut Comprador:</b> 86634767<br>
				<b>Nombre Comprador:</b> ANA LUZ DURÁN BAEZ<br>
				<b>Nombre Vendedor:</b> JORGE IVÁN SANHUEZA SELPULVEDA<br>
				<b>Tipo Transaccion:</b> CompraVenta<br>
				<b>Direccion:</b> Pastor Fernandez #16041<br>
				<b>Tipo Inmueble:</b> Casa<br>
				<b>Estado:</b> En Curso<br>
			  <center><button type="button" class="btn btn-danger">Ir</button></center>

            </div>
          </div>
	
        </div>
		-->
		
        </div><!-- /.col-sm-4 -->


