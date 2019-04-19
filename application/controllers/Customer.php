<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/

class Customer extends MY_Controller
{
	public static $customerlist = '';

	public function __construct(){
		parent::__construct();

		if(!$this->session->userdata('user_id')){
			return false;
		}
	}

	private function customerFullList(){
		$this->load->model('mastermodel');
		$allcustomerdata = $this->mastermodel->ListCustomers();
		$this->customerlist = json_encode($allcustomerdata);

	}
}