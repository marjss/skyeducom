<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
/**
* 
*/
class Ajaxpost extends MY_Controller
{
	

	public function __construct(){
		parent::__construct();

		if(!$this->session->userdata('user_id')){
			return false;
		}
	}

	public function prodsap(){
		if(isset($_POST) && !empty($_POST['typenum'])){
			$typenum = $_POST['typenum'];
			$this->load->model('mastermodel');
			$prosap = $this->mastermodel->getProdDetailbytypenum($typenum);
			if($prosap){
				echo json_encode($prosap);
			}else{
				echo 0;
			}
		}
	}
}