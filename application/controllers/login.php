<?php
class Login extends CI_Controller {

public function __construct()
 {
   parent::__construct();
   $this->load->helper('url');
   $this->load->model('user','',TRUE);
 }
 
   function index()
   {
     $this->load->helper(array('form'));
     $this->load->view('login');
     $this->load->view('footer');
   }
   
 function logout()
 {
 $this->session->unset_userdata('logged_in');
     $this->load->helper(array('form'));
     $this->load->view('login');
     $this->load->view('footer');
 }
 
 
 function verifylogin()
 {
   //Field validation succeeded.  Validate against database
   $rut = $this->input->post('rut');
   $password = $this->input->post('password');

   //query the database
   $result = $this->user->login($rut, $password);

   if($result==TRUE)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'rut' => $row->rut,
         'nombre' => $row->nombre,
         'apellido' => $row->apellido,
         'id_acceso' => $row->id_acceso,
         'rutk' => $row->rutk
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     redirect('transacciones');
   }
   else
   {
     redirect('login');
   }
 } 
 
   
}
?>
