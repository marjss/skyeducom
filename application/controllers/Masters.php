<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
/**
* 
*/
class Masters extends MY_Controller
{
	public function __construct(){
		parent::__construct();

		if(!$this->session->userdata('user_id')){
			return redirect('login');
		}
		$this->load->library('user_agent');
	}

	public function index(){
		return redirect('dashboard');
	}

	public function Cdetail($id = null){
		// $this->load->helper('user_helper');
		$pagedata = array();
		if(!empty($id)){
			//get use detail
			$this->load->model('usermodel');
			$userdetail = $this->usermodel->usermetainsignleshot($id);
			$pagedata = ['usermeta' => $userdetail,'editmode' => $id];
		}
		$this->viewpage('form-createcustomer',$pagedata);
		$this->load->view('footer');
	}

	public function Product(){
		$pagedata = array();
		$this->viewpage('form-createproduct',$pagedata);
		$this->load->view('footer');
	}

	public function Custype(){
		$pagedata = array();
		$this->viewpage('form-createcustomertype',$pagedata);
		$this->load->view('footer');
	}

	public function Zones(){
		$pagedata = array();
		$this->viewpage('form-createzones',$pagedata);
		$this->load->view('footer');
	}

	public function Apptype(){
		$pagedata = array();
		$this->viewpage('form-applicationtype',$pagedata);
		$this->load->view('footer');
	}

	public function Personinc(){
		$pagedata = array();
		$this->viewpage('form-personincharge',$pagedata);
		$this->load->view('footer');
	}

	public function Producttype(){
		$pagedata = array();
		$this->viewpage('form-createproducttype',$pagedata);
		$this->load->view('footer');
	}

	public function Incoterm(){
		$pagedata = array();
		$this->viewpage('form-createincoterm',$pagedata);
		$this->load->view('footer');
	}

	public function Currency(){
		$pagedata = array();
		$this->viewpage('form-createcurrency',$pagedata);
		$this->load->view('footer');
	}

	public function Production(){
		$pagedata = array();
		$this->viewpage('form-productioncenters',$pagedata);
		$this->load->view('footer');
	}

	public function Internaloffice(){
		$pagedata = array();
		$this->viewpage('form-internaloffice',$pagedata);
		$this->load->view('footer');
	}

	public function checkFile($str){
		$fileArray = $_FILES;
		//get first key of array
		$fileinputname = key($fileArray);
		//getting file control from $_FILES array
		$fileinputarray = $fileArray[$fileinputname];
		$postedfilename = $fileinputarray['name'];
		$postedfiletempname = $fileinputarray['tmp_name'];
		//check that posted file is empty
		if(!empty($postedfilename)){
		//get the extension and check
		if(strrchr($postedfilename,'.') == '.csv'){
			//check that all the headers of file matches with required input headers
			$headers = array_keys($this->csvheaders[$fileinputname]);
			//get posted CSV file headers
			$handle = fopen($postedfiletempname, "r");
			if($handle){
				while(($buffer = fgetcsv($handle, "\n")) !== false){
					$csv [] = $buffer;
					}
				}	
			$postedFileheader = array_shift($csv);
				if($headers == $postedFileheader){
					return true;
				}else{
					$this->form_validation->set_message('checkFile', '{field} headers does not match.');
					return false;
				}
			
			}else{
			$this->form_validation->set_message('checkFile', '{field} must be a CSV.');
			return false;
			}	
		}else{
			$this->form_validation->set_message('checkFile', 'The {field} can not be left blank.');
			return false;
		}

		
		//$filearray = $_FILES[]
		// if(!is_array($filename)){
		// 	//check that submitted filename is not empty
		// 	$Filename = $filename['name'];
		// 	if(!empty($Filename)){

		// 	}else{
		// 		$this->form_validation->
		// 	}
		// 	//get the file extension first and then match the headers of file
		// 	return true;
		// }return false;
	}

	public function process(){
		$formname = (null != $this->input->post('formname'))?$this->input->post('formname'):false;
		$referer =  $this->agent->referrer();
		if($formname){
			$this->load->library('form_validation');
			$this->session->set_userdata('lastreferer',$referer);
			switch($formname){
			case 'createloginuser':
			if($this->form_validation->run($formname)){
				$posteddata = $this->input->post();
				// echo '<pre>';print_r($posteddata);echo '</pre>';exit;
				// $this->load->model('usermodel','loadedmodel');
				// $result = $this->loadedmodel->enrollmeta($posteddata);
				//echo '<pre>';print_r($result);echo '</pre>';exit;
				$result = true;
				if($result){
					$this->session->set_flashdata('success','Client detail Registration Successfull.');
					return redirect($this->session->userdata('lastreferer'));
				}else{
					$this->session->set_flashdata('error','Client detail Registration Fail.');
					return redirect($this->session->userdata('lastreferer'));
				}
			}else{
				$this->enroll();
			}

			case 'createcustomerbycsv':
			if($this->form_validation->run($formname)){
				$posteddata = $this->input->post();
				if(isset($_FILES['createcustomercsv'])){
					$postedfile = $_FILES;
					$postedfileControl = key($postedfile);
					//echo strrchr($postedfile['createcustomercsv']['name'],'.');
					$handle = fopen($_FILES[$postedfileControl]['tmp_name'], "r");
					if($handle){
						while(($buffer = fgetcsv($handle, "\n")) !== false){
							$csvdata [] = $buffer;
							}
						
						}
					$headers = array_values($this->csvheaders[$postedfileControl]);
					//removing headers in csv
					$csvkeys = array_shift($csvdata); 
					//combining control names to csv data
					foreach($csvkeys as $key){
						$inputkey[] = $this->csvheaders[$postedfileControl][$key];
					}
					//assign new key to all csvdata
					foreach ($csvdata as $i=>$data) {
						$csvnewdata[$i] = array_combine($inputkey, $data);
						}
					// echo '<pre>';print_r($csvnewdata);echo '</pre>';exit;
				}
				$this->load->model('mastermodel','loadedmodel');
				$result = $this->loadedmodel->enrollCustomerbyCSV($csvnewdata);
				// echo '<pre>';print_r($result);echo '</pre>';exit;
				//$result = true;
				if($result){
					$this->session->set_flashdata('success','CSV uploaded successfully.');
					return redirect($this->session->userdata('lastreferer'));
				}else{
					$this->session->set_flashdata('error','CSV upload fail.');
					return redirect($this->session->userdata('lastreferer'));
				}
			}else{
				$this->Cdetail();
			}	
			
			break;

			case 'createcustomer':
			if($this->form_validation->run($formname)){
				$posteddata = $this->input->post();
				// echo '<pre>';print_r($posteddata);echo '</pre>';exit;
				$this->load->model('mastermodel','loadedmodel');
				if(!empty($posteddata['editmode'])){
					$result = $this->loadedmodel->editCustomer($posteddata);
				}else{
					$result = $this->loadedmodel->enrollCustomer($posteddata);
				}
				
				//echo '<pre>';print_r($result);echo '</pre>';exit;
				// $result = true;
				if($result){
					$msg = !empty($posteddata['editmode'])?'Client detail updated successfully.':'Client detail Registration Successfull.';
					$this->session->set_flashdata('success',$msg);
					if(!empty($posteddata['editmode'])){
						return redirect('masters/Cdetail/'.$posteddata['editmode']);
					}else{
					return redirect($this->session->userdata('lastreferer'));	
					}
					
				}else{
					$msg = !empty($posteddata['editmode'])?'Failed to update detail.':'Client detail Registration Fail.';
					$this->session->set_flashdata('error',$msg);
					if(!empty($posteddata['editmode'])){
						return redirect('masters/Cdetail/'.$posteddata['editmode']);
					}else{
					return redirect($this->session->userdata('lastreferer'));	
					}
				}
			}else{
				$this->Cdetail();
			}	
			
			break;

			case 'createproductbycsv':
			if($this->form_validation->run($formname)){
				$posteddata = $this->input->post();
				$posteddata = $this->input->post();
				if(isset($_FILES['createproductcsv'])){
					$postedfile = $_FILES;
					$postedfileControl = key($postedfile);
					//echo strrchr($postedfile['createcustomercsv']['name'],'.');
					$handle = fopen($_FILES[$postedfileControl]['tmp_name'], "r");
					if($handle){
						while(($buffer = fgetcsv($handle, "\n")) !== false){
							$csvdata [] = $buffer;
							}
						
						}
					$headers = array_values($this->csvheaders[$postedfileControl]);
					//removing headers in csv
					$csvkeys = array_shift($csvdata); 
					//combining control names to csv data
					foreach($csvkeys as $key){
						$inputkey[] = $this->csvheaders[$postedfileControl][$key];
					}
					//assign new key to all csvdata
					foreach ($csvdata as $i=>$data) {
						$csvnewdata[$i] = array_combine($inputkey, $data);
						}
					// echo '<pre>';print_r($csvnewdata);echo '</pre>';exit;
				}
				$this->load->model('mastermodel','loadedmodel');
				$result = $this->loadedmodel->enrollProductbyCSV($csvnewdata);
				// echo '<pre>';print_r($result);echo '</pre>';exit;

				if($result){
					$this->session->set_flashdata('success','Product Registration Successfull.');
					return redirect($this->session->userdata('lastreferer'));
				}else{
					$this->session->set_flashdata('error','Product Registration Fail.');
					return redirect($this->session->userdata('lastreferer'));
				}
			}else{
				$this->Product();
			}	
			
			break;

			case 'createproduct':
			//if($this->form_validation->run($formname)){
				$posteddata = $this->input->post();
				echo '<pre>';print_r($posteddata);echo '</pre>';exit;
				// $this->load->model('usermodel','loadedmodel');
				// $result = $this->loadedmodel->enrollmeta($posteddata);
				//echo '<pre>';print_r($result);echo '</pre>';exit;
				$result = true;
				if($result){
					$this->session->set_flashdata('success','Product Registration Successfull.');
					return redirect($this->session->userdata('lastreferer'));
				}else{
					$this->session->set_flashdata('error','Product Registration Fail.');
					return redirect($this->session->userdata('lastreferer'));
				}
			// }else{
			// 	$this->enroll();
			// }	
			
			break;
			case 'createcustomertypebycsv':
			if($this->form_validation->run($formname)){
				$posteddata = $this->input->post();
				$posteddata = $this->input->post();
				if(isset($_FILES['createcustomertypecsv'])){
					$postedfile = $_FILES;
					$postedfileControl = key($postedfile);
					//echo strrchr($postedfile['createcustomercsv']['name'],'.');
					$handle = fopen($_FILES[$postedfileControl]['tmp_name'], "r");
					if($handle){
						while(($buffer = fgetcsv($handle, "\n")) !== false){
							$csvdata [] = $buffer;
							}
						
						}
					$headers = array_values($this->csvheaders[$postedfileControl]);
					//removing headers in csv
					$csvkeys = array_shift($csvdata); 
					//combining control names to csv data
					foreach($csvkeys as $key){
						$inputkey[] = $this->csvheaders[$postedfileControl][$key];
					}
					//assign new key to all csvdata
					foreach ($csvdata as $i=>$data) {
						$csvnewdata[$i] = array_combine($inputkey, $data);
						}
					// echo '<pre>';print_r($csvnewdata);echo '</pre>';exit;
				}
				$this->load->model('mastermodel','loadedmodel');
				$result = $this->loadedmodel->enrollCustomerTypebyCSV($csvnewdata);
				// echo '<pre>';print_r($result);echo '</pre>';exit;

				if($result){
					$this->session->set_flashdata('success','Customer Type Registration Successfull.');
					return redirect($this->session->userdata('lastreferer'));
				}else{
					$this->session->set_flashdata('error','Customer Type Registration Fail.');
					return redirect($this->session->userdata('lastreferer'));
				}
			}else{
				$this->Custype();
			}	
			
			break;
			case 'createzonetypebycsv':
			if($this->form_validation->run($formname)){
				$posteddata = $this->input->post();
				$posteddata = $this->input->post();
				if(isset($_FILES['createzonecsv'])){
					$postedfile = $_FILES;
					$postedfileControl = key($postedfile);
					//echo strrchr($postedfile['createcustomercsv']['name'],'.');
					$handle = fopen($_FILES[$postedfileControl]['tmp_name'], "r");
					if($handle){
						while(($buffer = fgetcsv($handle, "\n")) !== false){
							$csvdata [] = $buffer;
							}
						
						}
					$headers = array_values($this->csvheaders[$postedfileControl]);
					//removing headers in csv
					$csvkeys = array_shift($csvdata); 
					//combining control names to csv data
					foreach($csvkeys as $key){
						$inputkey[] = $this->csvheaders[$postedfileControl][$key];
					}
					//assign new key to all csvdata
					foreach ($csvdata as $i=>$data) {
						$csvnewdata[$i] = array_combine($inputkey, $data);
						}
					// echo '<pre>';print_r($csvnewdata);echo '</pre>';exit;
				}
				$this->load->model('mastermodel','loadedmodel');
				$result = $this->loadedmodel->enrollZoneTypebyCSV($csvnewdata);
				// echo '<pre>';print_r($result);echo '</pre>';exit;

				if($result){
					$this->session->set_flashdata('success','Zone Type Registration Successfull.');
					return redirect($this->session->userdata('lastreferer'));
				}else{
					$this->session->set_flashdata('error','Zone Type Registration Fail.');
					return redirect($this->session->userdata('lastreferer'));
				}
			}else{
				$this->Zones();
			}	
			
			break;
			case 'createapplicationtypebycsv':
			if($this->form_validation->run($formname)){
				$posteddata = $this->input->post();
				$posteddata = $this->input->post();
				if(isset($_FILES['createapplicationtypecsv'])){
					$postedfile = $_FILES;
					$postedfileControl = key($postedfile);
					//echo strrchr($postedfile['createcustomercsv']['name'],'.');
					$handle = fopen($_FILES[$postedfileControl]['tmp_name'], "r");
					if($handle){
						while(($buffer = fgetcsv($handle, "\n")) !== false){
							$csvdata [] = $buffer;
							}
						
						}
					$headers = array_values($this->csvheaders[$postedfileControl]);
					//removing headers in csv
					$csvkeys = array_shift($csvdata); 
					//combining control names to csv data
					foreach($csvkeys as $key){
						$inputkey[] = $this->csvheaders[$postedfileControl][$key];
					}
					//assign new key to all csvdata
					foreach ($csvdata as $i=>$data) {
						$csvnewdata[$i] = array_combine($inputkey, $data);
						}
					// echo '<pre>';print_r($csvnewdata);echo '</pre>';exit;
				}
				$this->load->model('mastermodel','loadedmodel');
				$result = $this->loadedmodel->enrollApplicationTypebyCSV($csvnewdata);
				// echo '<pre>';print_r($result);echo '</pre>';exit;

				if($result){
					$this->session->set_flashdata('success','Application Type Registration Successfull.');
					return redirect($this->session->userdata('lastreferer'));
				}else{
					$this->session->set_flashdata('error','Application Type Registration Fail.');
					return redirect($this->session->userdata('lastreferer'));
				}
			}else{
				$this->Apptype();
			}	
			
			break;
			case 'createpersoninchargebycsv':
			if($this->form_validation->run($formname)){
				$posteddata = $this->input->post();
				$posteddata = $this->input->post();
				if(isset($_FILES['createpersoninchargecsv'])){
					$postedfile = $_FILES;
					$postedfileControl = key($postedfile);
					//echo strrchr($postedfile['createcustomercsv']['name'],'.');
					$handle = fopen($_FILES[$postedfileControl]['tmp_name'], "r");
					if($handle){
						while(($buffer = fgetcsv($handle, "\n")) !== false){
							$csvdata [] = $buffer;
							}
						
						}
					$headers = array_values($this->csvheaders[$postedfileControl]);
					//removing headers in csv
					$csvkeys = array_shift($csvdata); 
					//combining control names to csv data
					foreach($csvkeys as $key){
						$inputkey[] = $this->csvheaders[$postedfileControl][$key];
					}
					//assign new key to all csvdata
					foreach ($csvdata as $i=>$data) {
						$csvnewdata[$i] = array_combine($inputkey, $data);
						}
					// echo '<pre>';print_r($csvnewdata);echo '</pre>';exit;
				}
				$this->load->model('mastermodel','loadedmodel');
				$result = $this->loadedmodel->enrollPersonInchbyCSV($csvnewdata);
				// echo '<pre>';print_r($result);echo '</pre>';exit;

				if($result){
					$this->session->set_flashdata('success','Person Incharge Type Registration Successfull.');
					return redirect($this->session->userdata('lastreferer'));
				}else{
					$this->session->set_flashdata('error','Person Incharge Type Registration Fail.');
					return redirect($this->session->userdata('lastreferer'));
				}
			}else{
				$this->Personinc();
			}	
			
			break;
			case 'createproducttypebycsv':
			if($this->form_validation->run($formname)){
				$posteddata = $this->input->post();
				$posteddata = $this->input->post();
				if(isset($_FILES['createproducttypecsv'])){
					$postedfile = $_FILES;
					$postedfileControl = key($postedfile);
					//echo strrchr($postedfile['createcustomercsv']['name'],'.');
					$handle = fopen($_FILES[$postedfileControl]['tmp_name'], "r");
					if($handle){
						while(($buffer = fgetcsv($handle, "\n")) !== false){
							$csvdata [] = $buffer;
							}
						
						}
					$headers = array_values($this->csvheaders[$postedfileControl]);
					//removing headers in csv
					$csvkeys = array_shift($csvdata); 
					//combining control names to csv data
					foreach($csvkeys as $key){
						$inputkey[] = $this->csvheaders[$postedfileControl][$key];
					}
					//assign new key to all csvdata
					foreach ($csvdata as $i=>$data) {
						$csvnewdata[$i] = array_combine($inputkey, $data);
						}
					// echo '<pre>';print_r($csvnewdata);echo '</pre>';exit;
				}
				$this->load->model('mastermodel','loadedmodel');
				$result = $this->loadedmodel->enrollProductTypebyCSV($csvnewdata);
				// echo '<pre>';print_r($result);echo '</pre>';exit;

				if($result){
					$this->session->set_flashdata('success','Product Type Registration Successfull.');
					return redirect($this->session->userdata('lastreferer'));
				}else{
					$this->session->set_flashdata('error','Product Type Registration Fail.');
					return redirect($this->session->userdata('lastreferer'));
				}
			}else{
				$this->Producttype();
			}	
			
			break;
			case 'createincotermbycsv':
			if($this->form_validation->run($formname)){
				$posteddata = $this->input->post();
				$posteddata = $this->input->post();
				if(isset($_FILES['createincotermcsv'])){
					$postedfile = $_FILES;
					$postedfileControl = key($postedfile);
					//echo strrchr($postedfile['createcustomercsv']['name'],'.');
					$handle = fopen($_FILES[$postedfileControl]['tmp_name'], "r");
					if($handle){
						while(($buffer = fgetcsv($handle, "\n")) !== false){
							$csvdata [] = $buffer;
							}
						
						}
					$headers = array_values($this->csvheaders[$postedfileControl]);
					//removing headers in csv
					$csvkeys = array_shift($csvdata); 
					//combining control names to csv data
					foreach($csvkeys as $key){
						$inputkey[] = $this->csvheaders[$postedfileControl][$key];
					}
					//assign new key to all csvdata
					foreach ($csvdata as $i=>$data) {
						$csvnewdata[$i] = array_combine($inputkey, $data);
						}
					// echo '<pre>';print_r($csvnewdata);echo '</pre>';exit;
				}
				$this->load->model('mastermodel','loadedmodel');
				$result = $this->loadedmodel->enrollIncoTermbyCSV($csvnewdata);
				// echo '<pre>';print_r($result);echo '</pre>';exit;

				if($result){
					$this->session->set_flashdata('success','Inco Term Registration Successfull.');
					return redirect($this->session->userdata('lastreferer'));
				}else{
					$this->session->set_flashdata('error','Inco Term Registration Fail.');
					return redirect($this->session->userdata('lastreferer'));
				}
			}else{
				$this->Incoterm();
			}	
			
			break;
			case 'createcurrencytypebycsv':
			if($this->form_validation->run($formname)){
				$posteddata = $this->input->post();
				$posteddata = $this->input->post();
				if(isset($_FILES['createcurrencycsv'])){
					$postedfile = $_FILES;
					$postedfileControl = key($postedfile);
					//echo strrchr($postedfile['createcustomercsv']['name'],'.');
					$handle = fopen($_FILES[$postedfileControl]['tmp_name'], "r");
					if($handle){
						while(($buffer = fgetcsv($handle, "\n")) !== false){
							$csvdata [] = $buffer;
							}
						
						}
					$headers = array_values($this->csvheaders[$postedfileControl]);
					//removing headers in csv
					$csvkeys = array_shift($csvdata); 
					//combining control names to csv data
					foreach($csvkeys as $key){
						$inputkey[] = $this->csvheaders[$postedfileControl][$key];
					}
					//assign new key to all csvdata
					foreach ($csvdata as $i=>$data) {
						$csvnewdata[$i] = array_combine($inputkey, $data);
						}
					// echo '<pre>';print_r($csvnewdata);echo '</pre>';exit;
				}
				$this->load->model('mastermodel','loadedmodel');
				$result = $this->loadedmodel->enrollCurrencyCSV($csvnewdata);
				// echo '<pre>';print_r($result);echo '</pre>';exit;

				if($result){
					$this->session->set_flashdata('success','Currency Registration Successfull.');
					return redirect($this->session->userdata('lastreferer'));
				}else{
					$this->session->set_flashdata('error','Currency Registration Fail.');
					return redirect($this->session->userdata('lastreferer'));
				}
			}else{
				$this->Currency();
			}	
			
			break;
			case 'createproductioncentersbycsv':
			if($this->form_validation->run($formname)){
				$posteddata = $this->input->post();
				$posteddata = $this->input->post();
				if(isset($_FILES['createproductioncentercsv'])){
					$postedfile = $_FILES;
					$postedfileControl = key($postedfile);
					//echo strrchr($postedfile['createcustomercsv']['name'],'.');
					$handle = fopen($_FILES[$postedfileControl]['tmp_name'], "r");
					if($handle){
						while(($buffer = fgetcsv($handle, "\n")) !== false){
							$csvdata [] = $buffer;
							}
						
						}
					$headers = array_values($this->csvheaders[$postedfileControl]);
					//removing headers in csv
					$csvkeys = array_shift($csvdata); 
					//combining control names to csv data
					foreach($csvkeys as $key){
						$inputkey[] = $this->csvheaders[$postedfileControl][$key];
					}
					//assign new key to all csvdata
					foreach ($csvdata as $i=>$data) {
						$csvnewdata[$i] = array_combine($inputkey, $data);
						}
					// echo '<pre>';print_r($csvnewdata);echo '</pre>';exit;
				}
				$this->load->model('mastermodel','loadedmodel');
				$result = $this->loadedmodel->enrollProductioncenterCSV($csvnewdata);
				// echo '<pre>';print_r($result);echo '</pre>';exit;

				if($result){
					$this->session->set_flashdata('success','Production Center Registration Successfull.');
					return redirect($this->session->userdata('lastreferer'));
				}else{
					$this->session->set_flashdata('error','Production Center Registration Fail.');
					return redirect($this->session->userdata('lastreferer'));
				}
			}else{
				$this->Production();
			}	
			
			break;
			case 'createinternalofficebycsv':
			if($this->form_validation->run($formname)){
				$posteddata = $this->input->post();
				$posteddata = $this->input->post();
				if(isset($_FILES['createinternalofficecsv'])){
					$postedfile = $_FILES;
					$postedfileControl = key($postedfile);
					//echo strrchr($postedfile['createcustomercsv']['name'],'.');
					$handle = fopen($_FILES[$postedfileControl]['tmp_name'], "r");
					if($handle){
						while(($buffer = fgetcsv($handle, "\n")) !== false){
							$csvdata [] = $buffer;
							}
						
						}
					$headers = array_values($this->csvheaders[$postedfileControl]);
					//removing headers in csv
					$csvkeys = array_shift($csvdata); 
					//combining control names to csv data
					foreach($csvkeys as $key){
						$inputkey[] = $this->csvheaders[$postedfileControl][$key];
					}
					//assign new key to all csvdata
					foreach ($csvdata as $i=>$data) {
						$csvnewdata[$i] = array_combine($inputkey, $data);
						}
					// echo '<pre>';print_r($csvnewdata);echo '</pre>';exit;
				}
				$this->load->model('mastermodel','loadedmodel');
				$result = $this->loadedmodel->enrollInternalOfficeCSV($csvnewdata);
				// echo '<pre>';print_r($result);echo '</pre>';exit;

				if($result){
					$this->session->set_flashdata('success','Internal Office Registration Successfull.');
					return redirect($this->session->userdata('lastreferer'));
				}else{
					$this->session->set_flashdata('error','Internal Office Registration Fail.');
					return redirect($this->session->userdata('lastreferer'));
				}
			}else{
				$this->Internaloffice();
			}	
			
			break;

			}
		}else{
			return redirect($referer);
		}
	}
}