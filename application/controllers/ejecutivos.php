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


    function insertar()
	{
		$this->Ejecutivo_modelo->insertar_ejecutivo();
		//header( "Location: transacciones");
		redirect('transacciones');
	}

}
?>
