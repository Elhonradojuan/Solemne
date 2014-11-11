<?php
class Transacciones extends CI_Controller {
public function __construct()
	{
	parent::__construct();
      $this->load->helper('url');
      $this->load->model('Transaccion_modelo');
      $this->load->model('user');
      $this->load->library('session');
      //$this->load->library('Manejosesion');
	}
	
   function index()
 {
	$data = $this->user->esta_logeado();
 
	 //Si todo esta bien, cargamos las variables de la vista y de la sesion de usuario
      $ultimastx = $this->Transaccion_modelo->ultimos_tres();
      $datos_vista = array('transacciones' => $ultimastx, 'data' => $data);
	  
	 //Si todo esta bien, cargamos las vistas
      $this->load->view('header');
      $this->load->view('home', $datos_vista);
      $this->load->view('footer');

 }

 

   function regiones()
 {
 //se consultan todas las regiones insertadas en la bdd y se muestran como opciones en un select.
	$regiones = '<option value="0"> ----- </option>';
    $result = $this->Transaccion_modelo->regiones();
	//print_r($result);
	foreach($result as $row){
			//print_r($row);
    		 $regiones.='<option value="'.$row->id_region.'">'.$row->nombre.'</option>';
	}
	return $regiones;
}
 
   function ciudades()
 {
 //se consultan todas las ciudades insertadas en la bdd y se muestran como opciones en un select.
 if(isset($_POST["Region"]))
 {
	$ciudades= "<option value='0'> ----- </option>";
    $resultado = $this->Transaccion_modelo->ciudades($_POST["Region"]);
	foreach($resultado as $rowciud){
    		 $ciudades.='<option value="'.$rowciud->id_ciudad.'">'.$rowciud->nombre.'</option>';
	}
 }
	echo $ciudades;
 }

   function comunas()
 {
//se consultan todas las comunas insertadas en la bdd y se muestran como opciones en un select.
 if(isset($_POST["Ciudad"]))
 {
	$comunas= "<option value='0'> ----- </option>";
	$resultado3 = pg_query('SELECT * FROM comuna WHERE id_ciudad='.$_POST["Ciudad"]);
	while($rowcomun = pg_fetch_array($resultado3)){
    		 $comunas.='<option value="'.$rowcomun['id_comuna'].'">'.$rowcomun['nombre'].'</option>';
	}
	echo $comunas;
 }
 }

 
   function cargar_cyv()
 {
	$data = $this->user->esta_logeado();
 
      $regiones = $this->regiones();
      $datos_vista = array('regiones' => $regiones, 'data' => $data);
	  
	 //Si todo esta bien, cargamos las vistas
      $this->load->view('header');
      $this->load->view('CYVpaso1', $datos_vista);
      $this->load->view('footer');

 }

   }

?>
