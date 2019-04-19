<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Login extends MY_Controller
{
	
	// public function __construct()
	// {
	// 	parent::__construct();
		
	// }
	
	public function index(){

		if($this->session->userdata('user_id')){
			return redirect('dashboard');
		}else{
			$this->load->view('login');
		}

	}

	public function user(){
		$this->load->library('user_agent');
		$referer = $this->agent->referrer();
		if(null != $this->input->post('formname')){
			$formname = $this->input->post('formname');
			$this->load->library('form_validation');
			if($this->form_validation->run($formname)){
				$posteddata = $this->input->post();
				$this->load->model('usermodel');
				$result = $this->usermodel->checklogin($posteddata);
//				 echo '<pre>';print_r($result);echo '</pre>';exit;
				if($result){
					$usertype = $this->usermodel->usertype;
					$userstaus = $this->usermodel->status;
					$userinfo = $useralert = [];
					if($userstaus == 2){
						$useralert[] = 'Please complete your profile.';
					}
					$this->session->set_userdata('useralert',$useralert);
					if($userstaus != 0){
						
						$userinfo['fullname'] = $this->usermodel->userfullname;
						$userinfo['regdate'] = $this->usermodel->regdate;
						$userinfo['status'] = $userstaus;
						$userinfo['pcode'] = $this->usermodel->pcode;
						$username = $this->input->post('username');
						if($usertype != 'A'){
							$this->session->set_userdata('username',$username);
						}
						$this->session->set_userdata('user_id',$result);
						$this->session->set_userdata('usertype',$usertype);
						$this->session->set_userdata('userinfo',$userinfo);
						return redirect('dashboard');
					}else{
					$this->session->set_flashdata('error','User not authenticated to login.');
					return redirect('login');	
					}
					
				}else{
					$this->session->set_flashdata('error','Username or Password does not match.');
					return redirect('login');
				}
				
			}else{
				$this->index();
			}

		}else{
			return redirect($referer);
		}
	}

	public function logout(){

		$this->session->unset_userdata('user_id');
		$this->session->sess_destroy();
		return redirect('login');
	}
}