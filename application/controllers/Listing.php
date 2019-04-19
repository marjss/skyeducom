<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
/**
* 
*/
class Listing extends MY_Controller
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

	public function Users(){
		$pagedata = array();
		$this->load->model('usermodel');
		$this->load->helper('user_helper');
		$allusers = $this->usermodel->getAllusers();
		$pagedata = ['allusers' => $allusers ];
		$this->viewpage('list-users',$pagedata);
		$this->load->view('footer');
	}

	public function Products(){
		$pagedata = array();
		$this->load->model('mastermodel');
		$totalproducts = $this->mastermodel->ListProducts();
		$pagedata = ['totalproducts' => $totalproducts];
		$this->viewpage('list-products',$pagedata);
		$this->load->view('footer');
	}
	public function customers(){
		$pagedata = array();
		$this->load->model('mastermodel');
		$allcustomers = $this->mastermodel->ListCustomers();
		// echo '<pre>';print_r($allcustomers);echo '</pre>';exit;
		$pagedata = ['allcustomers' => $allcustomers ];
		$this->viewpage('list-customers',$pagedata);
		$this->load->view('footer');
	}

	public function listsok(){
		$pagedata = array();
		$this->load->model('listingmodel');
		$SOKcreated = $this->listingmodel->ListSOK();
		// echo '<pre>';print_r($SOKcreated);echo '</pre>';exit;
		$pagedata = ['allsok' => $SOKcreated ];
		$this->viewpage('list-sok',$pagedata);
		$this->load->view('footer');
	}

	

	
}