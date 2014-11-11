<?php
Class User extends CI_Model
{
 function login($rut, $password)
 {
	   $this->db->select('rut, id_acceso, nombre, apellido, password, rutk');
	   $this->db->from('fechome');
	   $this->db->where('rut', $rut);
	   //$this->db->where('password', MD5($password));
	   $this->db->where('password',$password);
	   $this->db->limit(1);

   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }

   
 function esta_logeado()
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