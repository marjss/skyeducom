<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Committeemodel extends MY_Model {

	public $idnotassigned = [];

	public function enrollcommittee($data = array()){

		if(is_array($data)){
			array_pop($data);
			extract($data);
			$regdate = @date('Y-m-d');
			$regtimestamp = @date('Y-m-d h:i:s');
			$committeestartdate = @date('Y-m-d',strtotime($committeestartdate));
			$committeeenddate = @date('Y-m-d',strtotime($committeeenddate));
			$committeepaymentdate = @date('Y-m-d',strtotime($committeepaymentdate));
			$committeedata = ['name' => $committeename,'amt' => $committeetotalamt,'members' => $committeememberslimit,'tenure' => $committeetenure,'emi' => $committeeemi,'emipermem' => $committeeemipermember,'startdate' => $committeestartdate,'enddate' => $committeeenddate,'opendate' => $committeeopendatetime,'paydate' => $committeepaymentdate,'panelty' => $committeelatefine,'bonusamt' => $committeeluckdraw,'status' => 1,'registerdate' => $regdate,'timestamp' => $regtimestamp];
			if(!empty($editmode)){
				$this->db->where('id',$editmode);
			$result = $this->db->update('committee',$committeedata);	
			}else{
			$result = $this->db->insert('committee',$committeedata);	
			}
			
			if($result){
				return !empty($editmode)?$editmode:$this->db->insert_id();
			}else{
				return false;
			}

		}else{
			return false;
		}

	}

	public function getCommitteeWithMemcount(){
		$query = $this->db->select('id,name,emipermem,startdate')
						  ->get('committee');
		$tbl1 = $this->db->dbprefix.'committee';
		$tbl2 = $this->db->dbprefix.'members';				  
		$sql = "SELECT grp1.*,grp2.membercount FROM (SELECT id,name,emipermem,startdate FROM $tbl1 WHERE $tbl1.status = 1) AS grp1 LEFT JOIN (SELECT COUNT(memberid) AS membercount,committeeid FROM $tbl2 WHERE $tbl2.status = 1 GROUP BY committeeid) AS grp2 ON grp1.id = grp2.committeeid";
		$query = $this->db->query($sql);				  
		if($query->num_rows()){
			// $committee = [];
			// foreach($query->result_array() as $record){
			// 	if(!empty($record['membersid'])){
			// 		$members = json_decode($record['membersid']);
			// 		$record['membercount'] = count($members);
			// 	}else{
			// 		$record['membercount'] = '';
			// 	}
				
			// 	$committee[] = (object)$record;
			// }
			return $query->result();
		}else{
			return false;
		}				  
	}

	public function getcommiteedetail($id){
		$query =  $this->db->where('id',$id)->get('committee');
		if($query->num_rows()){
			return $query->row();
		}else{
			return false;
		}
	}

	public function Assigncommittee($data = array()){
		if(!empty($data)){
			extract($data);
			$err = [];
			//get limit of members to committee
			$query_committee = $this->db->select('members')
										->where('id',$committeename)
										->get('committee');
			$memberlimit = 	$query_committee->row()->members;
									
			if(!empty($membername)){
				$i = 1;
				foreach($membername as $memberid){
					if($i <= $memberlimit){
						$sql = "INSERT INTO {$this->db->dbprefix}members (`memberid`,`committeeid`,`status`,`timestamp`) VALUES ($memberid,$committeename,1,NOW()) ON DUPLICATE KEY UPDATE `id` = `id` ";
						$result = $this->db->query($sql);
						if(!$result){
							$err[] = $memberid;	
						}
					}else{
						$this->idnotassigned[] = $memberid;
					}
					
				$i++;}
										
				if(empty($err)){
					return true;
				}else{
					return false;
				}
			}
		}else{
			return false;
		}
	}
	
	//checking total number of members alloted
	public function memberChk($id){
		$tbl1 = $this->db->dbprefix.'committee';
		$tbl2 = $this->db->dbprefix.'members';
		$query = $this->db->select("$tbl1.members,COUNT($tbl2.memberid) AS membercount")
						  ->from($tbl1)
						  ->join("$tbl2","$tbl1.id = $tbl2.committeeid",'left')
						  ->where("$tbl1.id",$id)
						  ->where("$tbl2.committeeid",$id)
						  ->get();
		if($query->num_rows()){
			//$members = count(json_decode($query->row()->membersid));
			return $query->row();
		}else{
			return false;
		}				  
	}

	public function getMembers($id){
		if(!empty($id)){
			$query = $this->db->select('memberid')
							  ->where(array('committeeid'=>$id,'status' => 1))
							  ->get('members');
			if($query->num_rows()){
				$this->load->model('usermodel');
				$memberdata = [];
				foreach($query->result_array() as $record){
					$record['membername'] = $this->usermodel->getusermeta($record['memberid'],'membermeta','membername',true);
					$memberdata[] = (object) $record;
				}
				return $memberdata;
			}else{
				return false;
			}				  
		}else{
			return false;
		}
	}

	
}