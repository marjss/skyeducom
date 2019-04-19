<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
/**
* 
*/

class User extends MY_Controller
{
	public function __construct(){
		parent::__construct();

		if(!$this->session->userdata('user_id')){
			return redirect('login');
		}
		$this->load->library('user_agent');
	}
	
	public function index(){
		$this->profile();
	}

	public function profile(){
		$this->load->model('usermodel');
		$agentmode = $this->uri->segment(3);
		$agentid = $this->uri->segment(4);
		if(!empty($agentmode) && !empty($agentid)){
			if($this->session->userdata('user_id') == 1){
				$usermeta = ($this->usermodel->usermetainsignleshot($agentid))?$this->usermodel->usermetainsignleshot($agentid):'';
				if(!empty($usermeta)){
				$pagedata = array('usermeta' => $usermeta,'agentmode' => false,'agentid' => $agentid);
				$this->viewpage('form-userdetail',$pagedata);
				}else{
				$pagedata = array('erronotice' => 'Oops! Agent not found.');
				$this->viewpage('handling',$pagedata);
				}
			}else{
				$pagedata = array('erronotice' => 'Authorization not found to access');
				$this->viewpage('handling',$pagedata);
			}
			
			
		}else{
			$userid = $this->session->userdata('user_id');
			if($userid != 1){
				$metasourcekey = 'agentmeta';
				$agentmode = true;
			}else{
				$metasourcekey = 'adminmeta';
				$agentmode = false;
			}
			// $usermeta = $this->usermodel->getusermeta($userid,$metasourcekey);
			$usermeta = $this->usermodel->usermetainsignleshot($userid);
			$pagedata = array('usermeta' => $usermeta,'agentmode' => $agentmode);
			$this->viewpage('form-userdetail',$pagedata);
		}
		
		// echo '<pre>';var_dump($usermeta);echo '</pre>';exit;
		
		$this->load->view('footer');
	}

	public function updatepassword(){
		$pagedata = array();
		$this->viewpage('form-changepassword',$pagedata);
		$this->load->view('footer');
	}

	public function enroll(){
		$pagedata = array();
		$this->viewpage('form-createuser',$pagedata);
		$this->load->view('footer');
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
				$this->load->model('usermodel','loadedmodel');
				$result = $this->loadedmodel->enrollUser($posteddata);
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
			
			break;
			}
		}else{
			return redirect($referer);
		}
	}


}