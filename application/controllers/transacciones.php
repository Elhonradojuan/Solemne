<?php
class Transacciones extends CI_Controller {
public function __construct()
	{
	parent::__construct();
      $this->load->helper('url');
	  $this->load->helper('form');
      $this->load->model('Transaccion_modelo');
      $this->load->model('user');
      $this->load->library('session');
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

 
function quitar($mensaje)
{
 $nopermitidos = array("'",".",'\\','<','>','-',"\"");
 $mensaje = str_replace($nopermitidos, "", $mensaje);
 return $mensaje;
}

//--------------------------------------------------------------------------------------------------
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
    $resultado3 = $this->Transaccion_modelo->comunas($_POST["Ciudad"]);
	foreach($resultado3 as $rowcomun){
    		 $comunas.='<option value="'.$rowcomun->id_comuna.'">'.$rowcomun->nombre.'</option>';
	}
	echo $comunas;
 }
 }
 
//--------------------------------------------------------------------------------------------------
   function regiones_edit($region){
 //se consultan todas las regiones insertadas en la bdd y se muestran como opciones en un select.
	$regiones = '<option value="0"> ----- </option>';
    $result = $this->Transaccion_modelo->regiones();
	//print_r($result);
	foreach($result as $row){
			//print_r($row);
			if ($row->id_region == $region)
			{
			$regiones.='<option value="'.$row->id_region.'" selected >'.$row->nombre.'</option>';
			}
			else
			{
    		 $regiones.='<option value="'.$row->id_region.'">'.$row->nombre.'</option>';
			 }
	}
	//$resultadociud = pg_query("SELECT * FROM ciudad WHERE id_region='$idregion'")
	return $regiones;
}
 
   function ciudades_edit($ciudad,$region)
 {
 //se consultan todas las ciudades insertadas en la bdd y se muestran como opciones en un select.

	$ciudades= "<option value='0'> ----- </option>";
    $resultado = $this->Transaccion_modelo->ciudades($region);
	foreach($resultado as $rowciud){
			if ($rowciud->id_ciudad == $ciudad)
			{
			$ciudades='<option value="'.$rowciud->id_ciudad.'" selected >'.$rowciud->nombre.'</option>';
			}
	}

	return $ciudades;
 }

   function comunas_edit($comuna,$ciudad)
 {
//se consultan todas las comunas insertadas en la bdd y se muestran como opciones en un select.
	$comunas= "<option value='0'> ----- </option>";
    $resultado3 = $this->Transaccion_modelo->comunas($ciudad);
	foreach($resultado3 as $rowcomun){
			if ($rowcomun->id_comuna == $comuna)
			{
    		 $comunas='<option value="'.$rowcomun->id_comuna.'" selected >'.$rowcomun->nombre.'</option>';
			}
	}
	return $comunas;
 
 }
 
//--------------------------------------------------------------------------------------------------

 function comprueba_rut(){
	 $listak = array("k","K");
	 #Guardamos rut
	 //$rut = '23766273-3';
	 $rut = $_POST["rut"];
	 #Guardamos un rut sin la k para consultar en la bdd
	 $rut2 = $this->quitar($rut);
	 
	 if (substr_count($rut, "k") > 0 or substr_count($rut, "K") > 0 )
	 {
		$rut2 = str_replace($listak, "", $rut2);
	 }
    //$consulta = pg_query("select rut from cliente where rut='$rut2'");
    //$row = pg_fetch_array($consulta); 
    $existe = $this->Transaccion_modelo->existe_rut($rut2);
	 if ( $this->valida_rut($rut) && $rut != ""){
		
		if ($existe == false) {
			echo 1;
		}
	   else 
		{
			echo 0;
		}
	}
	else {
		   echo 2;
	}
}
 
function valida_rut($r)
{
	//$r=strtoupper(ereg_replace('\.|,|-','',$r));
	$r=strtoupper(preg_replace('/\.|,|-/','',$r));
	$sub_rut=substr($r,0,strlen($r)-1);
	$sub_dv=substr($r,-1);
	$x=2;
	$s=0;
	for ( $i=strlen($sub_rut)-1;$i>=0;$i-- )
	{
		if ( $x >7 )
		{
			$x=2;
		}
		$s += $sub_rut[$i]*$x;
		$x++;
	}
	$dv=11-($s%11);
	if ( $dv==10 )
	{
		$dv='K';
	}
	if ( $dv==11 )
	{
		$dv='0';
	}
	if ( $dv==$sub_dv )
	{
		return true;
	}
	else
	{
		return false;
	}
}

   function cargar_busqueda_vendedor()
 {
	$data = $this->user->esta_logeado();
 
      $datos_vista = array('data' => $data);
	  
	  //Si todo esta bien, cargamos las vistas
      $this->load->view('header');
      $this->load->view('buscar_cliente_compraventa', $datos_vista);
      $this->load->view('footer');

 }
 
   function buscar_transacciones_vendedor()
 {
	$data = $this->user->esta_logeado();
   	$rut = $_POST['rut'];
	$data_cliente = $this->Transaccion_modelo->datos_vendedor($rut);
	$transaccion = $this->Transaccion_modelo->consulta_transacciones_cv($rut);

    $datos_vista = array('transacciones' => $transaccion, 'data' => $data, 'data_cliente' => $data_cliente);

      $this->load->view('header');
      $this->load->view('cargar_clientetx_compraventa', $datos_vista);
      $this->load->view('footer');
	
 }
  //Esta fnucion se llama desde el breadcrumb
   function buscar_transacciones_vendedor2($rut)
 {
	$data = $this->user->esta_logeado();
	$data_cliente = $this->Transaccion_modelo->datos_vendedor($rut);
	$transaccion = $this->Transaccion_modelo->consulta_transacciones_cv($rut);

    $datos_vista = array('transacciones' => $transaccion, 'data' => $data, 'data_cliente' => $data_cliente);

      $this->load->view('header');
      $this->load->view('cargar_clientetx_compraventa', $datos_vista);
      $this->load->view('footer');
	
 }
   function cargar_cyv($rut,$id_tx)
 {
	$data = $this->user->esta_logeado();
	$datos_tx = $this->Transaccion_modelo->cargar_tx($id_tx);
	$data_cliente = $this->Transaccion_modelo->datos_vendedor($rut);
      $regiones = $this->regiones();
      $datos_vista = array('regiones' => $regiones, 'data' => $data, 'datos_tx' => $datos_tx, 'data_cliente' => $data_cliente);
	  
	 //Si todo esta bien, cargamos las vistas
      $this->load->view('header');
      $this->load->view('CYVpaso1', $datos_vista);
      $this->load->view('footer');

 }
 
    function editar_cyv($rut,$id_tx)
 {
	$data = $this->user->esta_logeado();
	$data_cliente = $this->Transaccion_modelo->datos_vendedor($rut);
	
	$datos_tx = $this->Transaccion_modelo->cargar_tx($id_tx);
      $regiones = $this->regiones_edit($datos_tx[0]->region);
	  $ciudades = $this->ciudades_edit($datos_tx[0]->ciudad,$datos_tx[0]->region);
	  $comunas = $this->comunas_edit($datos_tx[0]->comuna,$datos_tx[0]->ciudad);
      $datos_vista = array('regiones' => $regiones, 'ciudades' => $ciudades, 'comunas' => $comunas, 'data' => $data, 'datos_tx' => $datos_tx, 'data_cliente' => $data_cliente);
	  //$datos_vista = array('regiones' => $regiones, 'data' => $data, 'datos_tx' => $datos_tx, 'data_cliente' => $data_cliente);
	  
	 //Si todo esta bien, cargamos las vistas
      $this->load->view('header');
      $this->load->view('CYVpaso1edit', $datos_vista);
      $this->load->view('footer');
	
	
  }
 
   function debug()
 {
 //Esta funcion es para ver errores
      $this->load->view('debug');
	  $this->comprueba_rut();
	
 }
 
   function cargar_cyv2($id_tx)
 {
	$data = $this->user->esta_logeado();
 
      $regiones = $this->regiones();
      $datos_vista = array('regiones' => $regiones, 'data' => $data);
	  
	 //Si todo esta bien, cargamos las vistas
      $this->load->view('header');
      $this->load->view('CYVpaso2', $datos_vista);
      $this->load->view('footer');

 }
	
    function insertarcyvpaso1()
	{
	  $ubicacion = array(
      'pais' => $this->input->post('Pais'),
      'region' => $this->input->post('Region'),
      'ciudad' => $this->input->post('Ciudad'),
      'comuna' => $this->input->post('Comuna'),
      'direccion' => $this->input->post('Direccion'),
      'sector' => $this->input->post('Sector'),
      'numeracion' => $this->input->post('Numeracion'),
      'tipo_inmueble' => $this->input->post('Tipo')
    );

	$id_ubicacion = $this->Transaccion_modelo->insertar_ubicacion($ubicacion);
	$fecha = date("y-m-d");
	
	$transaccion = array(
      'ubicacion_id' => $id_ubicacion,
      'rol_avaluo' => $this->input->post('Rol'),
      'rut_cliente' => $this->input->post('RutC'),
      'rut_fechome' => $this->input->post('Rut_fechome'),
      'fecha' => $fecha,
      'tipo_transaccion' => 'CompraVenta',
      'estado' => $this->input->post('Estado'),
      'rut_cliente_comprador' => $this->input->post('rut'),
      'captador' => $this->input->post('nombrecaptador'),
      'fecha_captacion' => $this->input->post('fechacaptacion')
    );		
		$id_tx = $this->Transaccion_modelo->insertar_cyv_paso1($transaccion);
		redirect('transacciones/cargar_cyv2/id_tx');
	}
	

   }

?>
