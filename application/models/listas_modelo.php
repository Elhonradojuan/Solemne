<?php
class Listas_modelo extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
   
   function clientes(){
		$this->db->select('*');
		$this->db->from('cliente');
		$query = $this->db->get();
		
		return $query->result();
   }
      
   function ejecutivos(){
		$this->db->select('*');
		$this->db->from('fechome');
		$query = $this->db->get();
		
		return $query->result();
   }
     
   function transacciones(){
	  	$this->db->order_by('id_transaccion','desc');
		$this->db->select('*');
		$this->db->from('transaccion');
		$this->db->join('ubicacion', 'ubicacion.id_ubicacion = transaccion.ubicacion_id');
		$this->db->join('cliente', 'cliente.rut = transaccion.rut_cliente');
		$query = $this->db->get();
		
		return $query->result();
		
   }
      

}
?>