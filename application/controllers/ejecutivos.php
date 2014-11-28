<?php
class Ejecutivos extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Ejecutivo_modelo');
		$this->load->model('user');
	}
 
   function index()
   {
   	$data = $this->user->esta_logeado();

     $this->load->view('header');
     $this->load->view('nuevo_fechome');
     $this->load->view('footer');
   } 
   
   function nuevo_cliente()
   {
   	$data = $this->user->esta_logeado();

     $this->load->view('header');
     $this->load->view('nuevo_cliente');
     $this->load->view('footer');
   }
   
   function editar_cliente1()
   {
   	$data = $this->user->esta_logeado();
     $this->load->view('header');
     $this->load->view('editar_cliente1');
     $this->load->view('footer');
   }
   
   function editar_cliente2()
   {
   	$data = $this->user->esta_logeado();
	
    $data_cliente = $this->Ejecutivo_modelo->datos_cliente();
	$datos_vista = array('datos_c' => $data_cliente, 'data' => $data);
	  
     $this->load->view('header');
     $this->load->view('editar_cliente2', $datos_vista);
     $this->load->view('footer');
   }

    function modificar_cliente()
	{
		$this->Ejecutivo_modelo->modificar_cliente();
		//header( "Location: transacciones");
		redirect('transacciones');
	}


   function editar_ejecutivo1()
   {
   	$data = $this->user->esta_logeado();
     $this->load->view('header');
     $this->load->view('editar_ejecutivo1');
     $this->load->view('footer');
   }
   
   function editar_ejecutivo2()
   {
   	$data = $this->user->esta_logeado();
	
    $data_cliente = $this->Ejecutivo_modelo->datos_ejecutivo();
	$datos_vista = array('datos_c' => $data_cliente, 'data' => $data);
	  
     $this->load->view('header');
     $this->load->view('editar_ejecutivo2', $datos_vista);
     $this->load->view('footer');
   }

    function modificar_ejecutivo()
	{
		$this->Ejecutivo_modelo->modificar_ejecutivo();
		//header( "Location: transacciones");
		redirect('transacciones');
	}

    function insertar()
	{
		$this->Ejecutivo_modelo->insertar_ejecutivo();
		redirect('transacciones');
	}

    function insertar_cliente()
	{
		$this->Ejecutivo_modelo->insertar_cliente();
		redirect('transacciones');
	}

}
?>
