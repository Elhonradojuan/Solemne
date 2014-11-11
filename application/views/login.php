 <html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de control de transacciones (proyecto solemne 2)</title>
	<!-- Esto lo puse yo porque no venia -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.1/js/bootstrap.min.js"></script>
    <!-- Bootstrap -->
    <link href="http://docencia.eit.udp.cl/~17698677/Solemne/css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
    <!-- FLAT UI
	<link href="http://docencia.eit.udp.cl/~17698677/Solemne/FlatUI/dist/css/vendor/bootstrap.min.css" rel="stylesheet">
	<link href="http://docencia.eit.udp.cl/~17698677/Solemne/FlatUI/dist/css/flat-ui.css" rel="stylesheet"> 
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
	<script src="http://docencia.eit.udp.cl/~17698677/Solemne/FlatUI/dist/js/flat-ui.min.js"></script>
 -->
  </head>
  
  
  <body>
     <div class="container">	
<center>	 
<table>
	<tr>
		<td><img src="http://docencia.eit.udp.cl/~17698677/Solemne/logo_FECHome.PNG" /></td>
		<td><h2>Bienvenido a FecPropiedades</h2></td>
	</tr>
</table>
</center>
<br>
			<div class="row">
			 <div class="col-sm-4">
        </div>
			 <div class="col-sm-4">
			   <?php echo form_open('login/verifylogin'); ?>
				<h3>Ingrese sus datos para continuar</h3>
				 <label for="rut">Rut:</label>
				 <input type="text" class="form-control"  size="20" id="rut" name="rut" placeholder="E.j. 20.545.222-4">
				 <br>
				 <label for="password">Password:</label>
				 <input type="password" class="form-control"  size="20" id="password" name="password" placeholder="password">
				 <br>
				 <input type="submit"  class="btn btn-lg btn-danger btn-block" value="Login"/>
			</form>
        </div>
		
		
        </div>
	  
			
			