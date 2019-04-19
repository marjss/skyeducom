<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('userid')){
			return redirect('login');
		}
		$this->load->library('user_agent');
	}

	public function index(){

		$this->enroll();
	}	

	public function enroll(){
		//get committee list from table
		$this->load->model('committeemodel');
		$commt = $this->committeemodel->getCommitteeWithMemcount();
		$pagedata = ['commt' => $commt];
		$this->viewpage('form-client',$pagedata);
	}

	public function checkMember($str){
		if(!empty($str)){
			$committeId = $str;
			$this->load->model('committeemodel');
			$members = $this->committeemodel->memberChk($committeId);
			$membercount = $members->membercount;
			if($membercount > 0){
				$memberlimit = intval($members->members);
				if($membercount < $memberlimit){
					return true;
				}else{
				$this->form_validation->set_message('checkMember', 'Maximum member Filled');
				return false;
				}
			}else{
				return true;
			}

		}
		return true;
		// else{
		// $this->form_validation->set_message('checkMember', 'The {field} can not be left blank.');
		// 	return false;
		// }
	}

	//on ajax post of invoice
	public function clientSelect(){
		$this->load->model('clientmodel');
		if(null != $this->input->post()){
			$clientid = (null != $this->input->post('clientid'))?$this->input->post('clientid'):0;
			if(!empty($clientid)){
				$result = $this->clientmodel->getclientdetail($clientid);
				if($result){
					print_r(json_encode($result));
				}
			}else{
				echo 0;
			}
		}else{
			echo 0;
		}
	}

	public function process(){

		$referrer = $this->agent->referrer();
		if($referrer){
			$formname = $this->input->post('formname');
			if(!empty($formname)){
			$this->load->library('form_validation');
			$this->session->set_userdata('lastreferer',$referrer);
			switch ($formname) {

				case 'memberregistration':
				if($this->form_validation->run($formname)){
					$posteddata = $this->input->post();
					
					$posteddata['filename'] = '';
						if(isset($_FILES['memberphoto'])){
						$config = ['upload_path' => './upload','allowed_types' => 'jpg|gif|jpeg|png'];
						$this->load->library('upload',$config);
						$key = key($_FILES);
							$this->upload->do_upload($key);
			                // Code After Files Upload Success GOES HERE
			                $data_name = $this->upload->data();
			                $filename = $data_name['file_name'];
			                $posteddata['filename'] = $filename;
				           
						}
					// echo '<pre>';print_r($posteddata);echo '</pre>';exit;	
					$this->load->model('clientmodel','loadedmodel');
					$result = $this->loadedmodel->enrollclient($posteddata);
					// echo '<pre>';print_r($result);echo '</pre>';exit;
					$msgsuccess = !empty($posteddata['editmode'])?'Member Updation Successfull.':'Member Registration Successfull.';
					$msgfail = !empty($posteddata['editmode'])?'Member Updation Fail.':'Member Registration Fail.';
					if($result){
						$this->session->set_flashdata('success',$msgsuccess);
						if(!empty($posteddata['editmode'])){
							return redirect('listing/members/'.$posteddata['editmode']);
						}else{
							return redirect('client/enroll');
						}
						
					}else{
						$this->session->set_flashdata('error',$msgfail);
						if(!empty($posteddata['editmode'])){
							return redirect('listing/members/'.$posteddata['editmode']);
						}else{
							return redirect('client/enroll');
						}
					}
				}else{
					$this->enroll();
				}

				break;

				
			}// end switch statement
			}else{
				//echo $referrer;
				return redirect($this->session->userdata('lastreferer'));
			}
		}else{
			return redirect('client');
		}
		
		
	}
}