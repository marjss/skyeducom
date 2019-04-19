<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
/**
* 
*/
class Dashboard extends MY_Controller
{
	
	public function index(){
		$this->userdash();
	}

	public function userdash(){
		$pagedata = array();
		$this->viewpage('page-dashboard',$pagedata);
		$this->load->view('footer');
	}
}