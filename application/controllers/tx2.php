<?php
class Transacciones extends CI_Controller {
public function __construct()
	{
	parent::__construct();
      $this->load->helper('url');
      $this->load->model('Transaccion_modelo');
	}
	
   function index()
 {
   if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['rut'] = $session_data['rut'];
     $data['nombre'] = $session_data['nombre'];
     $data['apellido'] = $session_data['apellido'];
     $data['id_acceso'] = $session_data['id_acceso'];
     $data['rutk'] = $session_data['rutk'];

	 //Si todo esta bien, cargamos las variables de la vista y de la sesion de usuario
      $ultimastx = $this->Transaccion_modelo->ultimos_tres();
      $datos_vista = array('transacciones' => $ultimastx, 'data' => $data);
	  
	 //Si todo esta bien, cargamos las vistas
      $this->load->view('header');
      $this->load->view('home', $datos_vista);
      $this->load->view('footer');
	 
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }
   
   

   }

?>
