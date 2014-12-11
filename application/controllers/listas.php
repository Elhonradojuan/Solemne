<?php
class Listas extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Listas_modelo');
		$this->load->model('user');
	}
 
   function index()
   {
   	$data = $this->user->esta_logeado();

     $this->load->view('header');
     $this->load->view('lista_clientes');
     $this->load->view('footer');
   } 


   function cargar_lista_clientes()
 {
	$data = $this->user->esta_logeado();
 
	  $clientes = $this->Listas_modelo->clientes();
      $datos_vista = array('data' => $data, 'clientes' => $clientes);
	  
	  //Si todo esta bien, cargamos las vistas
      $this->load->view('header');
      $this->load->view('lista_clientes', $datos_vista);
      $this->load->view('footer');

 }

   function cargar_lista_ejecutivos()
 {
	$data = $this->user->esta_logeado();
 
	  $ejecutivos = $this->Listas_modelo->ejecutivos();
      $datos_vista = array('data' => $data, 'ejecutivos' => $ejecutivos);
	  
	  //Si todo esta bien, cargamos las vistas
      $this->load->view('header');
      $this->load->view('lista_ejecutivos', $datos_vista);
      $this->load->view('footer');

 }

   function cargar_lista_compraventa()
 {
	$data = $this->user->esta_logeado();
 
	  $compraventas = $this->Listas_modelo->transacciones();
      $datos_vista = array('data' => $data, 'compraventas' => $compraventas);
	  
	  //Si todo esta bien, cargamos las vistas
      $this->load->view('header');
      $this->load->view('lista_compraventas', $datos_vista);
      $this->load->view('footer');

 }

}
?>
