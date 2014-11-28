<?php
class Ejecutivo_modelo extends CI_Model {

	function __construct()
	{
		parent::__construct();
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
		   
	function insertar_cliente()
	{
		$this->rut = $_POST['rut']; 
		$this->nombre = $_POST['nombre'];
		$this->apellido = $_POST['apellidos'];
		$this->password = $_POST['password'];
		$this->db->insert('cliente', $this);
	}		  
	
	function modificar_cliente()
	{
		$this->rut = $_POST['rut'];
		$this->nombre = $_POST['nombre'];
		$this->apellido = $_POST['apellidos'];
		$this->password = $_POST['password'];
		$this->db->where('rut', $this->rut);
		$this->db->update('cliente', $this);
	}
			
	function datos_cliente()
	{
		$rut = $_POST['rut_cliente'];		
		$this->db->select('*');
		$this->db->from('cliente');
		$this->db->where('rut =',$rut);
		$query = $this->db->get();
		return $query->result();
	}
  	
	function modificar_ejecutivo()
	{
		$this->rut = $_POST['rut'];
		$this->nombre = $_POST['nombre'];
		$this->apellido = $_POST['apellidos'];
		$this->password = $_POST['password'];
		$this->id_acceso = $_POST['ID'];
		$this->db->where('rut', $this->rut);
		$this->db->update('fechome', $this);
	}
			
	function datos_ejecutivo()
	{
		$rut = $_POST['rut_cliente'];		
		$this->db->select('*');
		$this->db->from('fechome');
		$this->db->where('rut =',$rut);
		$query = $this->db->get();
		return $query->result();
	}
  
}
?>
