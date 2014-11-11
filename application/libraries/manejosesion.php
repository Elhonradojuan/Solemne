<?php
class Manejosesion {

public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
        $this->load->library('session');
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
	 
	 return $data;
   }
   else
   {
     redirect('login', 'refresh');
   }
 }
	
}
?>
