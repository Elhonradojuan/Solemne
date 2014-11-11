<!DOCTYPE html>
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

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">		

	  
			<center>	 
			<table>
				<tr>
					<td><img src="http://docencia.eit.udp.cl/~17698677/Solemne/logo_FECHome.PNG" /></td>
					<td><h2>Bienvenido a FecPropiedades</h2></td>
				</tr>
			</table>
			</center>
			
			
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
          <!--  <li class="active"><a href="http://docencia.eit.udp.cl/~17698677/Solemne/">Inicio</a></li> -->
            <li class="active"><a href="<?=site_url('');?>">Inicio</a></li>

			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Clientes <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Nuevo Cliente</a></li>
                <li><a href="#">Editar Cliente</a></li>
              </ul>
            </li>
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Compra/Venta <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?=site_url('transacciones/cargar_cyv');?>">Inicio Compra/Venta</a></li>
                <li><a href="#">Busqueda Avanzada</a></li>
              </ul>
            </li>
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Arriendo <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Inicio Arriendo</a></li>
                <li><a href="#">Busqueda Avanzada</a></li>
              </ul>
            </li>
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ejecutivos <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?=site_url('ejecutivos');?>">Nuevo Ejecutivo</a></li>
                <li><a href="#">Editar Ejecutivo</a></li>
              </ul>
            </li>
            <li><a href="#contact">Balance</a></li>
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Listar <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Propiedades</a></li>
                <li><a href="#">Arriendos</a></li>
                <li><a href="#">Compra/Venta</a></li>
                <li><a href="#">Clientes</a></li>
                <li><a href="#">Ejecutivos</a></li>
              </ul>
            </li>
            <li><a href="<?=site_url('login/logout');?>">Salir</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
