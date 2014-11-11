<?php
class Ejecutivo_modelo extends CI_Model {

	function __construct()
	{
		parent::__construct();
		//$this->load->driver('session');
	}
   
	function insertar_ejecutivo()
	{
		$this->rut = $_POST['rut']; 
		$this->nombre = $_POST['nombre'];
		$this->apellido = $_POST['apellidos'];
		$this->password = $_POST['password'];
		$this->id_acceso = $_POST['ID'];
		$this->db->insert('fechome', $this);
	}
		
  
}
?>
