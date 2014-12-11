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
 
    function nuevo_cyv($rut)
 {
	$data = $this->user->esta_logeado();
	$data_cliente = $this->Transaccion_modelo->datos_vendedor($rut);
      $regiones = $this->regiones();
      $datos_vista = array('regiones' => $regiones, 'data' => $data, 'data_cliente' => $data_cliente);
	  
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
 
   function cargar_cyv2($id_tx,$rut)
 {
	$data = $this->user->esta_logeado();
	
	//Precio y pie
	//---------------precio y moneda----------------------------------------------------
	$precioac = $this->Transaccion_modelo->sacar_docitem_transc($id_tx,1);
	if ($precioac != NULL)
	{
		$precioacordado = "<td><input name='PrecioA' value=".$precioac[0]->valor." type='text'/></td>";
		$moneda = $precioac[0]->descripcion;
		    if($moneda=='UF')
			{
				$Monedaprecioacordado = "<select name='Monedaprecioacordado'><option value='UF' selected>UF</option><option value='USD'>USD</option><option value='CLP'>CLP</option></select>";
			} 
			if($moneda=='USD')
			{
				$Monedaprecioacordado = "<select name='Monedaprecioacordado'><option value='UF'>UF</option><option value='USD' selected>USD</option><option value='CLP'>CLP</option></select>";
			} 
			if($moneda=='CLP')
			{
				$Monedaprecioacordado = "<select name='Monedaprecioacordado'><option value='UF'>UF</option><option value='USD'>USD</option><option value='CLP' selected>CLP</option></select>";
			} 
	}
	else
	{
		$precioacordado = "<td><input name='PrecioA' type='text'/></td>"; 
		$Monedaprecioacordado = "<select name='Monedaprecioacordado'><option value='UF'>UF</option><option value='USD'>USD</option><option value='CLP'>CLP</option></select>";
    
	}
	
	//---------------------forma de pago----------------------------------------------
	$Form = $this->Transaccion_modelo->sacar_docitem_transc($id_tx,2);
	if ($Form != NULL)
	{
	$forma = $Form[0]->descripcion;

	if($forma=='Contado')
    {
       $Forma= "<select name='Forma'><option value='Contado' selected>Contado</option><option value='Credito'>Credito</option></select>";       
    }
     if($forma=='Credito')
    {
       $Forma= "<select name='Forma'><option value='Contado'>Contado</option><option value='Credito' selected>Credito</option></select>";       
    }
	}
	else
	{
		$Forma= "<select name='Forma'><option value='Contado'>Contado</option><option value='Credito'>Credito</option></select>";  
	}	
	
	//---------------Pie de pago----------------------------------------------------
	$ppago = $this->Transaccion_modelo->sacar_docitem_transc($id_tx,3);
	if ($ppago != NULL)
	{
		$Ppie="<td><input name='Ppie' type='text' value='".$ppago[0]->valor."' /></td>";

	}
	else
	{
		$Ppie="<td><input name='Ppie' type='text'  /></td>";
	}
		
	//---------------Pago credito----------------------------------------------------
	$pc = $this->Transaccion_modelo->sacar_docitem_transc($id_tx,4);
	if ($pc != NULL)
	{
		$Ppiec="<td><input name='Ppiec' type='text' value='".$pc[0]->valor."'/></td>";

	}
	else
	{
		$Ppiec="<td><input name='Ppiec' type='text'  /></td>";
	}
	
	//---------------Hipoteca----------------------------------------------------
	
	$hip = $this->Transaccion_modelo->sacar_docitem_transc($id_tx,5);
	if ($hip != NULL && $hip[0]->valor == 1)
	{
		$hipoteca="<td><input type='checkbox' name='Hipoteca' id='Hipoteca' value='1' onchange=".'"'."showContent('hip','Hipoteca')".'"'. " checked ></td></tr></table><table id='hip' style='display: block'>";
	}	
	else
	{
		$hipoteca="<td><input type='checkbox' name='Hipoteca' id='Hipoteca' value='1' onchange=".'"'."showContent('hip','Hipoteca')".'"'."></td></tr></table><table id='hip' style='display: none'>";     
	}
		
	//---------------Banco----------------------------------------------------
	$pc = $this->Transaccion_modelo->sacar_docitem_transc($id_tx,6);
	if ($pc != NULL)
	{
		$Banco="<td><input name='Banco' type='text' value='".$pc[0]->descripcion."'/></td>";

	}
	else
	{
		$Banco="<td><input name='Banco' type='text'  /></td>";
	}
		
	//---------------------------------------Hipoteca alzada----------------------------------------------------
	$hipotecaalzada = $this->Transaccion_modelo->sacar_docitem_transc($id_tx,7);
	if($hipotecaalzada != NULL && $hipotecaalzada[0]->valor == 1) 
	{
		//$hipA="<td><input type='checkbox' name='HipotecaA' id='HipotecaA' value='1' onchange=".'"'."showContent('hipA','HipotecaA')".'"'." checked ></td></tr><td><table id='hipA' style='display: block'>";    
		$hipA="<td><input type='checkbox' name='HipotecaA' id='HipotecaA' value='1' checked ></td></tr>";    
	}
	else
	{
		//$hipA="<td><input type='checkbox' name='HipotecaA' id='HipotecaA' value='1' onchange=".'"'."showContent('hipA','HipotecaA')".'"'."></td></tr><td><table id='hipA' style='display: none'>";
		$hipA="<td><input type='checkbox' name='HipotecaA' id='HipotecaA' value='1'></td></tr>";
	}
		
	//---------------------------------------Escritura recibida----------------------------------------------------
	$escritura = $this->Transaccion_modelo->sacar_docitem_transc($id_tx,8);
		if($escritura != NULL && $escritura[0]->valor == 1) 
		{
			$EscrituraR="<td><input type='checkbox' name='EscrituraR' value='1' checked></td></table></td>";   
			$ObsEscrituraR = "<td><input name='ObsEscrituraR' type='text' value='".$escritura[0]->descripcion."' /></td>";
		}
		else{
			$EscrituraR="<td><input type='checkbox' name='EscrituraR' value='1'></td></table></td>";
			$ObsEscrituraR = "<td><input name='ObsEscrituraR' type='text'/></td>";
		}

		
	//Persona natural
	
	//---------------------------------------Escritura vigente----------------------------------------------------
		$escritura = $this->Transaccion_modelo->sacar_docitem_transc($id_tx,16);
		
		if($escritura != NULL && $escritura[0]->valor == 1) 
		{
			$Escrituravigente="<td><input type='checkbox' value='1' name='Escrituravigente' checked></td>";   
			$ObsEscrituravigente="<td><input type='text' name='ObsEscrituravigente' value='".$escritura[0]->descripcion."'></td>";      
		}
		else{
			$Escrituravigente="<td><input type='checkbox' value='1' name='Escrituravigente'></td>";   
			$ObsEscrituravigente="<td><input type='text' name='ObsEscrituravigente' placeholder='Observación'></td>";      
		}

			
	//---------------------------------------Certificado dominio vigente----------------------------------------------------
		$escritura = $this->Transaccion_modelo->sacar_docitem_transc($id_tx,17);
		
		if($escritura != NULL && $escritura[0]->valor == 1) 
		{
			$CertificadoV="<td><input type='checkbox' value='1' name='CertificadoV' checked></td>";   
			$ObsCertificadoV="<td><input type='text' name='ObsCertificadoV' value='".$escritura[0]->descripcion."'></td>";     
		}
		else{
			$CertificadoV="<td><input type='checkbox' value='1' name='CertificadoV'></td>";   
			$ObsCertificadoV="<td><input type='text' name='ObsCertificadoV' placeholder='Observación'></td>";       
		}

			
	//---------------------------------------Avaluo fiscal----------------------------------------------------
		$escritura = $this->Transaccion_modelo->sacar_docitem_transc($id_tx,18);
		
		if($escritura != NULL && $escritura[0]->valor == 1) 
			{
				$Avaluo="<td><input type='checkbox' value='1' name='Avaluo' checked></td>";   
				$ObsAvaluo="<td><input type='text' name='ObsAvaluo' value='".$escritura[0]->descripcion."'></td>";     
			}
			else{
				$Avaluo="<td><input type='checkbox' value='1' name='Avaluo'></td>";   
				$ObsAvaluo="<td><input type='text' name='ObsAvaluo' placeholder='Observación'></td>";       
			}

			
	//---------------------------------------Certificado deudas de contribuciones----------------------------------------------------
		$escritura = $this->Transaccion_modelo->sacar_docitem_transc($id_tx,19);
		
		if($escritura != NULL && $escritura[0]->valor == 1) 
			{
				$Certificadodeudas="<td><input type='checkbox' value='1' name='Certificadodeudas' checked></td>";   
				$ObsCertificadodeudas="<td><input type='text' name='ObsCertificadodeudas' value='".$escritura[0]->descripcion."'></td>"; 
			}
			else{
				$Certificadodeudas="<td><input type='checkbox' value='1' name='Certificadodeudas'></td>";   
				$ObsCertificadodeudas="<td><input type='text' name='ObsCertificadodeudas' placeholder='Observación'></td>";      
			}

			
	//---------------------------------------No expropiacion municipal----------------------------------------------------
		$escritura = $this->Transaccion_modelo->sacar_docitem_transc($id_tx,20);
		
		if($escritura != NULL && $escritura[0]->valor == 1) 
			{
				$Expmunicipal="<td><input type='checkbox' value='1' name='Expmunicipal' checked></td>";   
				$ObsExpmunicipal="<td><input type='text' name='ObsExpmunicipal' value='".$escritura[0]->descripcion."'></td>";     
			}
			else{
				$Expmunicipal="<td><input type='checkbox' value='1' name='Expmunicipal'></td>";   
				$ObsExpmunicipal="<td><input type='text' name='ObsExpmunicipal' placeholder='Observación'></td>";       
			}

			
	//---------------------------------------Certificado de gastos comunes----------------------------------------------------
		$escritura = $this->Transaccion_modelo->sacar_docitem_transc($id_tx,21);
		
		if($escritura != NULL && $escritura[0]->valor == 1) 
			{
				$Certificadogastoscomunes="<td><input type='checkbox' value='1' name='Certificadogastoscomunes' checked></td>";   
				$ObsCertificadogastoscomunes="<td><input type='text' name='ObsCertificadogastoscomunes' value='".$escritura[0]->descripcion."'></td>";     
			}
			else{
				$Certificadogastoscomunes="<td><input type='checkbox' value='1' name='Certificadogastoscomunes'></td>";   
				$ObsCertificadogastoscomunes="<td><input type='text' name='ObsCertificadogastoscomunes' placeholder='Observación'></td>";       
			}

			
	//---------------------------------------Escritura alzamiento----------------------------------------------------
		$escritura = $this->Transaccion_modelo->sacar_docitem_transc($id_tx,22);
		
		if($escritura != NULL && $escritura[0]->valor == 1) 
		{
			$EscAlzamiento="<td><input type='checkbox' value='1' name='EscAlzamiento' checked></td>";   
			$ObsEscAlzamiento="<td><input type='text' name='ObsEscAlzamiento' value='".$escritura[0]->descripcion."'></td>";     
		}
		else{
			$EscAlzamiento="<td><input type='checkbox' value='1' name='EscAlzamiento'></td>";   
			$ObsEscAlzamiento="<td><input type='text' name='ObsEscAlzamiento' placeholder='Observación'></td>";       
		}

			
	//---------------------------------------Escrituras anteriores----------------------------------------------------
		$escritura = $this->Transaccion_modelo->sacar_docitem_transc($id_tx,23);
		
		if($escritura != NULL && $escritura[0]->valor == 1) 
			{
				$EscAnteriores="<td><input type='checkbox' value='1' name='EscAnteriores' checked></td>";   
				$ObsEscAnteriores="<td><input type='text' name='ObsEscAnteriores' value='".$escritura[0]->descripcion."'></td>";     
			}
			else{
				$EscAnteriores="<td><input type='checkbox' value='1' name='EscAnteriores'></td>";   
				$ObsEscAnteriores="<td><input type='text' name='ObsEscAnteriores' placeholder='Observación'></td>";       
			}

			
	//---------------------------------------Certificado de matrimonio----------------------------------------------------
		$escritura = $this->Transaccion_modelo->sacar_docitem_transc($id_tx,24);
		
		if($escritura != NULL && $escritura[0]->valor == 1) 
			{
				$Matrimonio="<td><input type='checkbox' value='1' name='Matrimonio' checked></td>";   
				$ObsMatrimonio="<td><input type='text' name='ObsMatrimonio' value='".$escritura[0]->descripcion."'></td>";     
			}
			else{
				$Matrimonio="<td><input type='checkbox' value='1' name='Matrimonio'></td>";   
				$ObsMatrimonio="<td><input type='text' name='ObsMatrimonio' placeholder='Observación'></td>";       
			}
			
	//---------------------------------------Recepcion final municipal----------------------------------------------------
		$escritura = $this->Transaccion_modelo->sacar_docitem_transc($id_tx,25);
		
		if($escritura != NULL && $escritura[0]->valor == 1) 
			{
				$RecMuni ="<td><input type='checkbox' value='1' name='RecMuni' checked></td>";   
				$ObsRecMuni="<td><input type='text' name='ObsRecMuni' value='".$escritura[0]->descripcion."'></td>";     
			}
			else{
				$RecMuni ="<td><input type='checkbox' value='1' name='RecMuni'></td>";   
				$ObsRecMuni="<td><input type='text' name='ObsRecMuni' placeholder='Observación'></td>";       
			}

		
		
		
		
	//------------El resto ----------------
	
	$precioypie = array(
      'precioacordado' => $precioacordado,
      'Forma' => $Forma,
      'Ppie' => $Ppie,
      'Ppiec' => $Ppiec,
      'Banco' => $Banco,
      'hipoteca' => $hipoteca,
      'hipA' => $hipA,
      'EscrituraR' => $EscrituraR,
      'Monedaprecioacordado' => $Monedaprecioacordado
    );
		
	$personanatural = array(
      'Escrituravigente' => $Escrituravigente,
      'ObsEscrituravigente' => $ObsEscrituravigente,
      'CertificadoV' => $CertificadoV,
      'ObsCertificadoV' => $ObsCertificadoV,
      'Avaluo' => $Avaluo,
      'ObsAvaluo' => $ObsAvaluo,
      'Certificadodeudas' => $Certificadodeudas,
      'ObsCertificadodeudas' => $ObsCertificadodeudas,
      'Expmunicipal' => $Expmunicipal,
      'ObsExpmunicipal' => $ObsExpmunicipal,
      'Certificadogastoscomunes' => $Certificadogastoscomunes,
      'ObsCertificadogastoscomunes' => $ObsCertificadogastoscomunes,
      'EscAlzamiento' => $EscAlzamiento,
      'ObsEscAlzamiento' => $ObsEscAlzamiento,
      'EscAnteriores' => $EscAnteriores,
      'ObsEscAnteriores' => $ObsEscAnteriores,
      'Matrimonio' => $Matrimonio,
      'ObsMatrimonio' => $ObsMatrimonio,
      'RecMuni' => $RecMuni,
      'ObsRecMuni' => $ObsRecMuni
    );
	
	$datos_tx = array(
      'id_tx' => $id_tx,
      'rut' => $rut,
    );
	
      $datos_vista = array('data' => $data, 'datos_tx' => $datos_tx, 'precioypie' => $precioypie, 'personanatural' => $personanatural);
	  
	 //Si todo esta bien, cargamos las vistas
      $this->load->view('header');
      $this->load->view('CYVpaso2', $datos_vista);
      $this->load->view('footer');

 }
	
	
		
    function precioypie()
	{
        if ($this->input->post('PrecioA')) //la funcion input devuelve el valor o null si no existe
		{
			$this->Transaccion_modelo->insertar_updatear_docitem($this->input->post('Monedaprecioacordado'), $this->input->post('PrecioA'), 1, $this->input->post('id_tx'));
		}
		
        if ($this->input->post('Forma')) //la funcion input devuelve el valor o null si no existe
		{
			$this->Transaccion_modelo->insertar_updatear_docitem($this->input->post('Forma')," ", 2, $this->input->post('id_tx'));
		}
		
        if ($this->input->post('Ppie')) //la funcion input devuelve el valor o null si no existe
		{
			$this->Transaccion_modelo->insertar_updatear_docitem(" ",$this->input->post('Ppie'), 3, $this->input->post('id_tx'));
		}
		
        if ($this->input->post('Ppiec')) //la funcion input devuelve el valor o null si no existe
		{
			$this->Transaccion_modelo->insertar_updatear_docitem(" ",$this->input->post('Ppiec'), 4, $this->input->post('id_tx'));
		}
		
        if ($this->input->post('Hipoteca')) //la funcion input devuelve el valor o null si no existe
		{
			$this->Transaccion_modelo->insertar_updatear_docitem(" ",$this->input->post('Hipoteca'), 5, $this->input->post('id_tx'));
		}
		else		
		{
			$this->Transaccion_modelo->insertar_updatear_docitem(" ",0, 5, $this->input->post('id_tx'));
		}
		
		
        if ($this->input->post('Banco')) //la funcion input devuelve el valor o null si no existe
		{
			$this->Transaccion_modelo->insertar_updatear_docitem($this->input->post('Banco')," ", 6, $this->input->post('id_tx'));
		}
		
			
        if ($this->input->post('HipotecaA')) //la funcion input devuelve el valor o null si no existe
		{
			$this->Transaccion_modelo->insertar_updatear_docitem(" ",$this->input->post('HipotecaA'), 7, $this->input->post('id_tx'));
		}
		else		
		{
			$this->Transaccion_modelo->insertar_updatear_docitem(" ",0, 7, $this->input->post('id_tx'));
		}			
			
        if ($this->input->post('EscrituraR')) //la funcion input devuelve el valor o null si no existe
		{
			$this->Transaccion_modelo->insertar_updatear_docitem(" ",$this->input->post('EscrituraR'), 8, $this->input->post('id_tx'));
		}
		else		
		{
			$this->Transaccion_modelo->insertar_updatear_docitem(" ",0, 8, $this->input->post('id_tx'));
		}	
		
		redirect('transacciones/cargar_cyv2/'.$this->input->post('id_tx').'/'.$this->input->post('rut'));
	}
		
    function personanatural()
	{
        if ($this->input->post('Escrituravigente')) //la funcion input devuelve el valor o null si no existe
		{
			$this->Transaccion_modelo->insertar_updatear_docitem($this->input->post('ObsEscrituravigente'),$this->input->post('Escrituravigente'), 16, $this->input->post('id_tx'));
		}
		else		
		{
			$this->Transaccion_modelo->insertar_updatear_docitem(" ",0, 16, $this->input->post('id_tx'));
		}
		//---------------------------------------------
        if ($this->input->post('CertificadoV')) //la funcion input devuelve el valor o null si no existe
		{
			$this->Transaccion_modelo->insertar_updatear_docitem($this->input->post('ObsCertificadoV'),$this->input->post('CertificadoV'), 17, $this->input->post('id_tx'));
		}
		else		
		{
			$this->Transaccion_modelo->insertar_updatear_docitem(" ",0, 17, $this->input->post('id_tx'));
		}
		//---------------------------------------------
        if ($this->input->post('Avaluo')) //la funcion input devuelve el valor o null si no existe
		{
			$this->Transaccion_modelo->insertar_updatear_docitem($this->input->post('ObsAvaluo'),$this->input->post('Avaluo'), 18, $this->input->post('id_tx'));
		}
		else		
		{
			$this->Transaccion_modelo->insertar_updatear_docitem(" ",0, 18, $this->input->post('id_tx'));
		}
		//---------------------------------------------
        if ($this->input->post('Certificadodeudas')) //la funcion input devuelve el valor o null si no existe
		{
			$this->Transaccion_modelo->insertar_updatear_docitem($this->input->post('ObsCertificadodeudas'),$this->input->post('Certificadodeudas'), 19, $this->input->post('id_tx'));
		}
		else		
		{
			$this->Transaccion_modelo->insertar_updatear_docitem(" ",0, 19, $this->input->post('id_tx'));
		}
		//---------------------------------------------
        if ($this->input->post('Expmunicipal')) //la funcion input devuelve el valor o null si no existe
		{
			$this->Transaccion_modelo->insertar_updatear_docitem($this->input->post('ObsExpmunicipal'),$this->input->post('Expmunicipal'), 20, $this->input->post('id_tx'));
		}
		else		
		{
			$this->Transaccion_modelo->insertar_updatear_docitem(" ",0, 20, $this->input->post('id_tx'));
		}
		//---------------------------------------------
        if ($this->input->post('Certificadogastoscomunes')) //la funcion input devuelve el valor o null si no existe
		{
			$this->Transaccion_modelo->insertar_updatear_docitem($this->input->post('ObsCertificadogastoscomunes'),$this->input->post('Certificadogastoscomunes'), 21, $this->input->post('id_tx'));
		}
		else		
		{
			$this->Transaccion_modelo->insertar_updatear_docitem(" ",0, 21, $this->input->post('id_tx'));
		}
		//---------------------------------------------
        if ($this->input->post('EscAlzamiento')) //la funcion input devuelve el valor o null si no existe
		{
			$this->Transaccion_modelo->insertar_updatear_docitem($this->input->post('ObsEscAlzamiento'),$this->input->post('EscAlzamiento'), 22, $this->input->post('id_tx'));
		}
		else		
		{
			$this->Transaccion_modelo->insertar_updatear_docitem(" ",0, 22, $this->input->post('id_tx'));
		}
		//---------------------------------------------
        if ($this->input->post('EscAnteriores')) //la funcion input devuelve el valor o null si no existe
		{
			$this->Transaccion_modelo->insertar_updatear_docitem($this->input->post('ObsEscAnteriores'),$this->input->post('EscAnteriores'), 23, $this->input->post('id_tx'));
		}
		else		
		{
			$this->Transaccion_modelo->insertar_updatear_docitem(" ",0, 23, $this->input->post('id_tx'));
		}
		//---------------------------------------------
        if ($this->input->post('Matrimonio')) //la funcion input devuelve el valor o null si no existe
		{
			$this->Transaccion_modelo->insertar_updatear_docitem($this->input->post('ObsMatrimonio'),$this->input->post('Matrimonio'), 24, $this->input->post('id_tx'));
		}
		else		
		{
			$this->Transaccion_modelo->insertar_updatear_docitem(" ",0, 24, $this->input->post('id_tx'));
		}
		//---------------------------------------------
        if ($this->input->post('RecMuni')) //la funcion input devuelve el valor o null si no existe
		{
			$this->Transaccion_modelo->insertar_updatear_docitem($this->input->post('ObsRecMuni'),$this->input->post('RecMuni'), 25, $this->input->post('id_tx'));
		}
		else		
		{
			$this->Transaccion_modelo->insertar_updatear_docitem(" ",0, 25, $this->input->post('id_tx'));
		}
		//---------------------------------------------
        if ($this->input->post('Escrituravigente')) //la funcion input devuelve el valor o null si no existe
		{
			$this->Transaccion_modelo->insertar_updatear_docitem($this->input->post('ObsEscrituravigente'),$this->input->post('Escrituravigente'), 16, $this->input->post('id_tx'));
		}
		else		
		{
			$this->Transaccion_modelo->insertar_updatear_docitem(" ",0, 16, $this->input->post('id_tx'));
		}
		//---------------------------------------------
		
		
		
		redirect('transacciones/cargar_cyv2/'.$this->input->post('id_tx').'/'.$this->input->post('rut'));
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
		redirect('transacciones/cargar_cyv2/'.$id_tx.'/'.$transaccion[rut_cliente]);
	}
		
    function updatearcyvpaso1()
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

	$id_ubicacion = $this->Transaccion_modelo->updatear_ubicacion($ubicacion);
	//$fecha = date("y-m-d");
	
	$transaccion = array(
      'ubicacion_id' => $this->input->post('id_ubic'),
      'rol_avaluo' => $this->input->post('Rol'),
      'rut_cliente' => $this->input->post('RutC'),
      'rut_fechome' => $this->input->post('Rut_fechome'),
      //'fecha' => $fecha,
      'tipo_transaccion' => 'CompraVenta',
      'estado' => $this->input->post('Estado'),
      'rut_cliente_comprador' => $this->input->post('rut'),
      'captador' => $this->input->post('nombrecaptador'),
      'fecha_captacion' => $this->input->post('fechacaptacion')
    );
		$id_tx = $this->input->post('id_tx');
		$this->Transaccion_modelo->updatear_cyv_paso1($transaccion);
		redirect('transacciones/cargar_cyv2/'.$id_tx.'/'.$transaccion[rut_cliente]);
	}
	

   }

?>
