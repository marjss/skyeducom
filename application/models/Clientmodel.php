<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientmodel extends MY_Model {

	public function enrollclient($data = array()){

		if(is_array($data)){
			// array_pop($data);
			extract($data);
			$this->load->helper('security');
			$passwordhash = !empty($membercontact)?do_hash($membercontact,'md5'):do_hash('client','md5');
			//first make enrollment of user and then enter detail on usermeta
			$username = 'member'.time(); 
			$userdata = ['username' => $username,'pass' => $passwordhash,'status' => 0,'type' => 'M'];
			$usermeta = ['membername' => $membername,'membergender' => $membergender,'memberemail' => $memberemail,'memberaddress' => $memberaddress,'membercity' => $membercity,'memberstate' => $memberstate,'memberpin' => $memberpin,'memberlandmark' => $memberlandmark,'membercontact' => $membercontact,'memberaltercontact' => $memberaltercontact,'memberpannum' => $memberpannum,'memberaadharnum' => $memberaadharnum,'memberalternatecorrespondance' => $memberalternatecorrespondance,'memberphoto' => $filename];
			// return $usermeta;
			$metasourcekey = 'membermeta';
			if(!isset($editmode)){
			$this->db->set('timestamp','NOW()',FALSE);
			$result = $this->db->insert('user',$userdata);
			}
			$reguserid = !empty($editmode)?$editmode:$this->db->insert_id();
			//return $usermeta;
			$err = [];
			if($reguserid){
				//update committee table for this member addition
				if(!empty($membercommittee)){
					$query_committee = $this->db->select('members')
												->where('id',$membercommittee)
												->get('committee');
					if($query_committee->num_rows()){
						$memberlimit = $query_committee->row()->members;
						$sql_countassign = "SELECT COUNT(*) AS memcount FROM {$this->db->dbprefix}members WHERE `committeeid` = $membercommittee";
						$query_countassign = $this->db->query($sql_countassign);
						if($query_countassign->memcount <= $memberlimit){
							$regtime = @date('Y-m-d h:i:s');
							$insertmemdata = ['memberid' => $reguserid,'committeeid' => $membercommittee,'status' => 1,'timestamp' => $regtime];
							$this->db->insert('members',$insertmemdata);
						}
						// $presentmembers = json_decode($query_committee->row()->membersid);
						// $presentmembers[] = $reguserid;
						// $updatedmembers = json_encode($presentmembers);
						// $this->db->set('membersid',$updatedmembers);
						// $this->db->where('id',$membercommittee);
						// $this->db->update('committee');
					}							
				}	
				$tbl = $this->db->dbprefix.'usermeta';

				//enter meta
				if(!empty($reguserid) && !empty($usermeta)){
					foreach($usermeta as $key => $value){
					if(!empty($value)){
						$sql = "INSERT INTO $tbl (`userid`,`metasourcekey`,`keyname`,`keyval`)VALUES  ($reguserid,'$metasourcekey','$key','$value') ON DUPLICATE KEY UPDATE `keyval` = '$value'";
						//$err[] = $sql;
						$resumeta = $this->db->query($sql);
							if(!$resumeta){
							$err[$key];	
							}
						}	
					}//end foreach
					if(empty($err)){
						return $reguserid;
					}else{
						return false;
					}
				}else {
					return false;
				}	
			}			      
		}else{
			return false;
		}

	}


	public function getclientdetail($userid){
		if(!empty($userid)){
			$this->load->model('usermodel');
			$result = $this->usermodel->usermetainsignleshot($userid);
			if($result){
				return $result;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public function getallmembers(){
		$this->load->model('usermodel');
		$query = $this->db->select('id')
						  ->where('type','M')
						  ->get('user');
		if($query->num_rows()){
			$members = [];
			foreach($query->result() as $record){
				$members[$record->id] = $this->usermodel->getusermeta($record->id,'membermeta','membername',true);
			}
			return  $members;	
		}else{
			return false;
		}				  
		
	}

	public function getSaleClientinvoice(){
		//get all balance for particular client from invoice table
		$tbl1 = $this->db->dbprefix.'invoice';
		$tbl2 = $this->db->dbprefix.'payment';
		$sql = "SELECT grp1.*,grp2.paidamt FROM (SELECT $tbl1.invclient,SUM($tbl1.invtotalamt) AS balance FROM $tbl1 GROUP BY $tbl1.invclient) AS grp1 LEFT JOIN (SELECT $tbl2.clientid,SUM($tbl2.paidamt) AS paidamt FROM $tbl2 WHERE paymenttype = 'S' GROUP BY clientid) AS grp2 ON grp1.invclient = grp2.clientid";
		$query = $this->db->query($sql);
		if($query->num_rows()){
			$this->load->model('usermodel');
			$clientdata = [];
			foreach($query->result_array() as $record){
				$clientid = $record['invclient'];
				$record['clientname'] = $this->usermodel->getusermeta($clientid,'clientmeta','clientname',true);
				$clientdata[] = (object)$record;
			}
			return (object) $clientdata;
		}else{
			return false;
		}
		
	}

	public function getPurchaseClientinvoice(){
		//get all balance for particular client from invoice table
		$tbl1 = $this->db->dbprefix.'purchase';
		$tbl2 = $this->db->dbprefix.'payment';
		$sql = "SELECT grp1.*,grp2.paidamt FROM (SELECT $tbl1.clientid,SUM($tbl1.grandtotal) AS balance FROM $tbl1 GROUP BY $tbl1.clientid) AS grp1 LEFT JOIN (SELECT $tbl2.clientid,SUM($tbl2.paidamt) AS paidamt FROM $tbl2 WHERE paymenttype = 'P' GROUP BY clientid) AS grp2 ON grp1.clientid = grp2.clientid";
		$query = $this->db->query($sql);
		if($query->num_rows()){
			$this->load->model('usermodel');
			$clientdata = [];
			foreach($query->result_array() as $record){
				$clientid = $record['clientid'];
				$record['clientname'] = $this->usermodel->getusermeta($clientid,'clientmeta','clientname',true);
				$clientdata[] = (object)$record;
			}
			return (object) $clientdata;
		}else{
			return false;
		}
		
	}
}