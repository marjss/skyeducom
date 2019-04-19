<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Committee extends MY_Controller
{
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
		$pagedata = [];
		$this->viewpage('form-committee',$pagedata);
	}

	public function assignMember(){
		//get total committee detail
		$this->load->model('committeemodel');
		$this->load->model('clientmodel');
		$commt = $this->committeemodel->getCommitteeWithMemcount();
		//get total members detail
		
		$members = $this->clientmodel->getallmembers();
		// echo '<pre>';print_r($members);echo '</pre>';
		$pagedata = ['commt' => $commt,'membersname' => $members];
		$this->viewpage('form-assignmembers',$pagedata);
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

	public function process(){

		$referrer = $this->agent->referrer();
		if($referrer){
			$formname = $this->input->post('formname');
			if(!empty($formname)){
			$this->load->library('form_validation');
			$this->session->set_userdata('lastreferer',$referrer);
			switch ($formname) {

				case 'committeeregistration':
				case 'editcommitteeregistration':
				$formname = 'committeeregistration';
				if($this->form_validation->run($formname)){
					$posteddata = $this->input->post();
					// echo '<pre>';print_r($this->input->post());echo '</pre>';exit;
					$this->load->model('committeemodel','loadedmodel');
					$result = $this->loadedmodel->enrollcommittee($posteddata);
					// echo '<pre>';print_r($result);echo '</pre>';exit;
					$msgsuccess = !empty($posteddata['editmode'])?'Committee Updation Successfull.':'Committee Registration Successfull.';
					$msgfail = !empty($posteddata['editmode'])?'Committee Updation Fail.':'Committee Registration Fail.';
					if($result){
						$this->session->set_flashdata('success',$msgsuccess);
						if(!empty($posteddata['editmode'])){
							return redirect('listing/committee/'.$posteddata['editmode']);
						}else{
							return redirect('committee/enroll');
						}
						
					}else{
						$this->session->set_flashdata('error',$msgfail);
						if(!empty($posteddata['editmode'])){
							return redirect('listing/committee/'.$posteddata['editmode']);
						}else{
							return redirect('committee/enroll');
						}
					}
				}else{
					if(!empty($posteddata['editmode'])){
						$this->enroll($posteddata['editmode']);
					}else{
					$this->enroll();	
					}
					
				}

				break;

				case 'memberassign':
				if($this->form_validation->run($formname)){
					$posteddata = $this->input->post();
					// echo '<pre>';print_r($this->input->post());echo '</pre>';exit;
					$this->load->model('committeemodel','loadedmodel');
					$result = $this->loadedmodel->Assigncommittee($posteddata);
					$notassignedmembers = $this->loadedmodel->idnotassigned;
					$msgsuccess = 'Members Assigned Successfully.';
					$msgfail = 'Failed to Assign Members.';	
					if(!empty($notassignedmembers)){
						$msgsuccess .= 'with '.count($notassignedmembers).' members Not assigned';
					}
					if($result){
						$this->session->set_flashdata('success',$msgsuccess);
						return redirect('committee/assignMember');
						
					}else{
						$this->session->set_flashdata('error',$msgfail);
						return redirect('committee/assignMember');
					}
				}else{
					$this->assignMember();
				}
				break;

				
			}// end switch statement
			}else{
				//echo $referrer;
				return redirect($this->session->userdata('lastreferer'));
			}
		}else{
			return redirect('committee');
		}
		
		
	}
}