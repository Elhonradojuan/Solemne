<?php
class Transaccion_modelo extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
   
   function ultimos_tres(){
	  	$this->db->order_by('id_transaccion','desc');
	  	$this->db->limit('3');
		$this->db->select('*');
		$this->db->from('transaccion');
		$this->db->join('ubicacion', 'ubicacion.id_ubicacion = transaccion.ubicacion_id');
		$this->db->join('cliente', 'cliente.rut = transaccion.rut_cliente');
		$query = $this->db->get();
		
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
     
   
   function comunas($ciudad){
		$this->db->select('*');
		$this->db->from('comuna');
		$this->db->where('id_ciudad =',$ciudad);
		$query = $this->db->get();
		return $query->result();
   }
       
   function existe_rut($rut){
		$this->db->select('rut');
		$this->db->from('cliente');
		$this->db->where('rut =',$rut);
		$query = $this->db->get();
		//return $query->row();
		if ($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
   }
     
//-------------------------------Esta funcion quita los caracteres invalidos--------------------------------
function quitar($mensaje)
{
 $nopermitidos = array("'",'k','K','\\','<','>','-',"\"");
 $mensaje = str_replace($nopermitidos, "", $mensaje);
 return $mensaje;
}

//-------------------------------Esta funcion quita los caracteres invalidos de un rol--------------------------------
function quitarrol($mensaje)
{
 $nopermitidos = array("'",'\\','<','>',"\"",'q','w','e','r','t','y','u','i','o','p','a','s','d','f','g','h','j','k','l','ñ','z','x','c','v','b','n','m','Q','W','E','R','T','Y','U','I','O','P','A','S','D','F','G','H','J','K','L','Ñ','Z','X','C','V','B','N','M','*','+','^','|','@','#','~','{','[',']','}','(',')','&','%','$');
 $mensaje = str_replace($nopermitidos, "", $mensaje);
 return $mensaje;
}


function insertar_ubicacion($ubicacion)
	{
    $this->db->insert('ubicacion', $ubicacion);
	$id_ubicacion = $this->db->insert_id();
		return $id_ubicacion;
	}
		 
	    
	function insertar_cyv_paso1($transaccion)
	{
	$this->db->insert('transaccion', $transaccion);
	$id_tx = $this->db->insert_id();
		return $id_tx;
	}

	
   function datos_vendedor($rut){
		$this->db->select('*');
		$this->db->from('cliente');
		$this->db->where('rut =',$rut);
		$query = $this->db->get();
		return $query->result();
		}

   function consulta_transacciones_cv($rut){
   	
		
		$this->db->select('*');
		$this->db->from('transaccion');
		$this->db->join('ubicacion', 'transaccion.ubicacion_id = ubicacion.id_ubicacion');
		$this->db->where('rut_cliente =',$rut);
		$this->db->where('tipo_transaccion =',"CompraVenta");
		$query = $this->db->get();
		return $query->result();
		}
		
		function cargar_tx($idtx){
 		
		$this->db->select('*');
		$this->db->from('transaccion');
		$this->db->join('ubicacion', 'transaccion.ubicacion_id = ubicacion.id_ubicacion');
		$this->db->where('id_transaccion =',$idtx);
		$query = $this->db->get();
		return $query->result();
		}
	

}
?>