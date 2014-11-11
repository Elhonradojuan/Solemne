<?php
class Transaccion_modelo extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
   
   function ultimos_tres(){
   
      //$ssql = "select * from transaccion order by id desc limit 3";
      //return mysql_query($ssql);
	  
	  	$this->db->order_by('id_transaccion','desc');
		
		$this->db->select('*');
		$this->db->from('transaccion');
		$this->db->join('ubicacion', 'ubicacion.id_ubicacion = transaccion.id_transaccion');
		$query = $this->db->get();

		//$query = $this->db->get('transaccion', 3);
		
		return $query->result();
		
   }
      
   function regiones(){
		$this->db->select('*');
		$this->db->from('region');
		$query = $this->db->get();
		return $query->result();
   }
   
      
   function ciudades($region){
		$this->db->select('*');
		$this->db->from('ciudad');
		$this->db->where('id_region =',$region);
		$query = $this->db->get();
		return $query->result();
   }
     
   
   
}
?>