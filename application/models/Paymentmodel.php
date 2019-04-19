<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paymentmodel extends MY_Model {

	public $committeetenure = '';
	public function getLatestpaymentDetail($committeeid = null,$memberid = null){
		$tbl = $this->db->dbprefix.'payment';
		if(!empty($committeeid) && !empty($memberid)){
			$sql = "SELECT * FROM $tbl WHERE id IN(SELECT grp5.id FROM (SELECT $tbl.* FROM $tbl ) AS grp5 JOIN (SELECT MAX($tbl.paymentdate) AS paiddate,$tbl.memberid FROM $tbl WHERE memberid = $memberid AND committeeid = $committeeid) AS grp4 ON grp5.memberid = grp4.memberid AND grp5.paymentdate = grp4.paiddate)";
		}else{
			$sql = "SELECT * FROM $tbl WHERE id IN(SELECT grp5.id FROM (SELECT $tbl.* FROM $tbl ) AS grp5 JOIN (SELECT MAX($tbl.paymentdate) AS paiddate,$tbl.memberid FROM $tbl GROUP BY memberid) AS grp4 ON grp5.memberid = grp4.memberid AND grp5.paymentdate = grp4.paiddate)";
		}
		// return $sql;
		$query = $this->db->query($sql);
		if($query->num_rows()){
			if(!empty($committeeid) && !empty($memberid)){
				$this->load->model('committeemodel');
				$tenure = $this->committeemodel->getcommiteedetail($committeeid)->tenure;
				$detail = $query->row_array();
				$detail['tenure'] = $tenure;
				return $detail;
			}else{
				return $query->result();
			}
		}else{
			return false;
		}
	}

	public function enrollPayment($data = array()){
		if(!empty($data)){
			extract($data);
			$paymentdate = @date('Y-m-d',strtotime($paymentdate)).' '.date('h:i:s');
			$timestamp = @date('Y-m-d h:i:s');
			$paymentdata = ['memberid' => $paymentmembername,'committeeid' => $paymentcommittee,'eminum' => $paymentinstallment,'payment' => $paymenttotal,'paymentdate' => $paymentdate,'paymentmode' => $paymentmode,'panelty' => $paymentfine,'status' => 1,'timestamp' => $timestamp];
			$result = $this->db->insert('payment',$paymentdata);
			if($result){
				$recordid = $this->db->insert_id();
				//check for payment type and insert record in chq payment table
				if($paymentmode == 'CQ'){
					$paymentchqdate = @date('Y-m-d',strtotime($paymentchqdate));
					$chqdata = ['chqnum' => $paymentchqnumber,'bank' => $paymentcqbankname,'chqdate' => $paymentchqdate,'recordid' => $recordid,'status' => 1,'timestamp' => $timestamp];
					$this->db->insert('chqpayment',$chqdata);
				}else if($paymentmode == 'B' || $paymentmode == 'O'){
					$paymentchqdate = @date('Y-m-d',strtotime($paymentchqdate));
					$chqdata = ['chqnum' => $paymenttransactionum,'chqdate' => $paymentchqdate,'recordid' => $recordid,'status' => 2,'timestamp' => $timestamp];
					$this->db->insert('chqpayment',$chqdata);
				}
				return $recordid;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public function enrollPrize($data = array()){
		if(!empty($data)){
			extract($data);
			if(!empty($prizecommittee) && !empty($prizemembername)){
				$drawdate = !empty($prizedate)?@date('Y-m-d',strtotime($prizedate)):@date('Y-m-d');
				$this->db->set('drawstatus',1);
				$this->db->set('drawdate',$drawdate);
				if(!empty($prizebalance)){
					$this->db->set('drawbal',$prizebalance);
				}
				if(!empty($prizeremark)){
					$this->db->set('drawremark',$prizeremark);
				}
				$this->db->set('status',2);
				$this->db->where(array('memberid' => $prizemembername,'committeeid' => $prizecommittee));
				$result = $this->db->update('members');
				if($result){
					//update prize count inside committee table
					$this->db->set('prizecount','IF(prizecount <> NULL,prizecount+1,1)',false);
					$this->db->where('id',$prizecommittee);
					$this->db->update('committee');
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public function removePayment($id){
		if(!empty($id)){
			$this->db->where('id',$id);
			$result = $this->db->delete('payment');
			if($result){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
}