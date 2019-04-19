<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Usermodel extends MY_Model
{
	public $usertype = '',
		   $userfullname = '',
		   $regdate = '',
		   $pcode = '',
		   $status = '',
		   $usercount = 0,
		   $downlineid = [],
		   $agentinfoarray = '',
		   $latestres = '',
		   $agentseparateinfo = [],
		   $agentdirectinfo = [],
		   $nodeChilds = [];
	
	public function checklogin($data = array()){
            
		if(is_array($data)){
			array_pop($data);
			extract($data);
			$this->load->helper('security');
			$this->load->helper('user_helper');
			$usertype = $this->chkusertype($username);                        
			if($usertype != 'A'){
				$passwordhash = encryptIt($password);
			}else{
				$passwordhash = do_hash($password,'md5');
			}
			
			$query = $this->db->where(['username' => $username,'pass' => $passwordhash])
						      ->get('user');			      
			if($query->num_rows()){
				$this->usertype = $query->row()->type;
				$this->status = $query->row()->status;
				$this->regdate = $query->row()->registerdate;
				$userid = $query->row()->id;
				//get usermeta here
				if($usertype != 'A'){
					$meta = $this->getusermeta($userid,'agentmeta','userfullname');
					$this->userfullname = $meta->keyval;
								   
				}else{
					$meta = $this->getusermeta($userid,'adminmeta','userfullname');
					$this->userfullname = $meta->keyval;
				}
				
				return $userid;
			}else{
				return false;
			}			      
		}else{
			return false;
		}

	}

	private function chkusertype($username){
            
		if(!empty($username)){
			$query = $this->db->select('type')
							  ->where('username',$username)
							  ->get('user');
			if($query->num_rows()){
				return $query->row()->type;
			}				  
		}else{
			return true;
		}
	}

	public function changepassword($oldpassword,$newpassword){
		if(!empty($oldpassword) && !empty($newpassword)){
			$this->load->helper('security');
			$this->load->helper('user_helper');
			$usertype = $this->session->userdata('usertype');
			$userid = $this->session->userdata('user_id');
			if($usertype != 'A'){
				$passwordhash = encryptIt($oldpassword);
				$newpasshash = encryptIt($newpassword);
			}else{
				$passwordhash = do_hash($oldpassword,'md5');
				$newpasshash = do_hash($newpassword,'md5');
			}
			//first check that old password match in database
			$query = $this->db->where(['id' => $userid,'pass' => $passwordhash])
						      ->get('user');
			if($query->num_rows()){
				//update password to new password
				$this->db->set('pass',$newpasshash);
				$this->db->where('id',$userid);
				$result = $this->db->update('user');
				if($result){
					return true;
				}else{
					return false;
				}
			}			      
		}else{ 
			return false;
		}
	}

	public function enrollUser($data = array(),$status = true){
		if(is_array($data)){
			extract($data);
			//encrypt the password here
			$this->load->helper('user_helper');
			$password = encryptIt($loginpassword);
			$registerdate = @date('Y-m-d');
			$status = ($status)?1:0;
			$insertuserdata = ['username' => $loginusername,'pass' =>$password,'type' => $loginusertype,'status' => 1,'registerdate' => $registerdate ];
			$this->db->set('timestamp','NOW()',false);
			$result = $this->db->insert('user',$insertuserdata);
			if($result){
				return true;
			}else{
				return false;
			}
			
		}else{
			return false;
		}
	}
	

	public function enrollagent($data = array()){
		if(is_array($data)){
			extract($data);
			$insertuserdata = [];


			$loggeduserid = $this->session->userdata('user_id');
			$sponserid = $this->getsponserId($agentsponserid,true)->id;
			//encrypt the password here
			$this->load->helper('user_helper');
			// $password = $this->encryption->encrypt($agentmobilenum);
			$password = encryptIt($agentmobilenum);
			$registerdate = @date('Y-m-d');
			$insertuserdata = ['username' =>$agentusername,'pass' =>$password,'type' =>'U','status' =>2,'registerdate' =>$registerdate];
			//enter user info in user table
			$this->db->set('timestamp','NOW()',false);
			$result = $this->db->insert('user',$insertuserdata);
			if($result){
				//get inserted user id 
				$newuserid = $this->db->insert_id();
				//insert name into usermeta
				 $insertmetakeys = ['userfullname' => $agentfullname,'userregisterphonenum' => $agentmobilenum];
				 $metasourcekey = 'agentmeta';
				 foreach($insertmetakeys as $key => $value){
				 	$insertmeta[] = ['userid' => $newuserid,'metasourcekey' => $metasourcekey,'keyname' => $key,'keyval' => $value,'timestamp' => 'NOW()' ];
				 }
				 
				 $this->db->insert_batch('usermeta',$insertmeta);
				//get id of latest agent on proposed side
				 $this->checklatestjoinonside($sponserid,$agentjoiningside);
				 if(!empty($this->latestres)){
				 	$agentparentid = $this->latestres->userid;
				 }else{
				 	$agentparentid = $sponserid;
				 }
				//insert information in userpinsummary table
				$pinsummarydata = ['sponserid' => $sponserid,'parentid' => $agentparentid,'userid' => $newuserid,'productid' => $agentproductid,'joiningside' => $agentjoiningside,'joindate' => $registerdate,];
				$this->db->set('timestamp','NOW()',false);
				$result = $this->db->insert('userpinsummary',$pinsummarydata);
				//if logged in user is not admin then add used pin to that user pindist table.
				if($loggeduserid != 1){
				// $updateqty = ['qtyused' => 'qtyused+1'];
				$this->db->set('qtyused','qtyused+1',false);
				$this->db->where(['userid' => $loggeduserid,'productid' => $agentproductid]);
				$result = $this->db->update('userpindist');
				}
				
				if($result){
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
	public function enrollmeta($data = array()){
		if(is_array($data)){
			extract($data);
			$insertdata = $updatedata = $emptykey = [];
			$metasourcekey = ($userid != 1)?'agentmeta':'adminmeta';
			foreach($data as $key=>$value){
				if($key != 'formname' && $key != 'submit'){
					if(!empty($value)){
						//insert into usermeta table
						//$insertdata[] = ['userid' => $userid,'metasourcekey' => $metasourcekey,'keyname' => $key,'keyval' => $value,'timestamp' => 'NOW()'];
						$querystring = "INSERT INTO `{$this->db->dbprefix}usermeta` (`userid`,`metasourcekey`,`keyname`,`keyval`,`timestamp`) VALUES ($userid,'$metasourcekey',
'$key','$value','NOW()') ON DUPLICATE KEY UPDATE `keyval` = '$value' ";
						$result = $this->db->query($querystring);
					}else{
						$emptykey[] = $key;
					}
				}
			}
			//return $emptykey;exit;
			//update status of user in user table if no empty meta key is available
			if(empty($emptykey)){
				$this->db->set('status', 1);
				$this->db->where('id', $userid);
				$this->db->update('user');
			}
			if($result){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public function checkmetaexist($userid,$metasourcekey,$keyname){
		if(!empty($userid)&&!empty($metasourcekey)&&!empty($keyname)){
			$query = $this->db->where(['userid' => $userid,'metasourcekey' => $metasourcekey,'keyname' => $keyname])
							  ->get('usermeta');
			if($query->num_rows()){
				return true;
			}else{
				return false;
			}				  
		}else{
			return false;
		}
	}

	public function getusermeta($userid,$metasourcekey,$keyname = null,$keyval = false){
		if(!empty($userid) && !empty($metasourcekey)){
			if(!empty($keyname)){
				$condition = ['metasourcekey' => $metasourcekey,'userid' =>$userid,'keyname' => $keyname];
			}else{
				$condition = ['metasourcekey' => $metasourcekey,'userid' =>$userid];
			}
		$query = $this->db->where($condition)
						     ->get('usermeta');
		if($query->num_rows()){
			if(!empty($keyname)){
				if($keyval){
				return $query->row()->keyval;	
				}else{
				return $query->row();	
				}
			}else{
				return $query->result();
			}
		}				     	
		}else{
			return false;
		}
	}


public function usersokinsignleshot($userid){
		if(!empty($userid)){
			$allmetakeys = $this->getallmetakeysforsok($userid);
			$querystring = "SELECT sokid,";
			if($allmetakeys){
				foreach($allmetakeys as $metakey){
				$querystring .= 'MAX(IF(metakey = \''.$metakey->metakey.'\',metaval,NULL)) AS '.$metakey->metakey.',';
				}
				$querystring = rtrim($querystring,',');
				if(substr_count($userid, ',') > 0){
				$querystring .= ' FROM `'.$this->db->dbprefix.'sokmeta` WHERE sokid IN ('.$userid.') GROUP BY userid';	
				}else{
				$querystring .= ' FROM `'.$this->db->dbprefix.'sokmeta` WHERE userid = '.$sokid;	
				}
				// return $querystring;
				$query = $this->db->query($querystring);
				if($query->num_rows()){
					if(substr_count($userid, ',') > 0){
						return $query->result();
					}else{
						return $query->row();
					}
					
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


	public function usermetainsignleshot($userid){
		if(!empty($userid)){
			$allmetakeys = $this->getallmetakeysforuser($userid);
			$querystring = "SELECT userid,";
			if($allmetakeys){
				foreach($allmetakeys as $metakey){
				$querystring .= 'MAX(IF(keyname = \''.$metakey->keyname.'\',keyval,NULL)) AS '.$metakey->keyname.',';
				}
				$querystring = rtrim($querystring,',');
				if(substr_count($userid, ',') > 0){
				$querystring .= ' FROM `'.$this->db->dbprefix.'usermeta` WHERE userid IN ('.$userid.') GROUP BY userid';	
				}else{
				$querystring .= ' FROM `'.$this->db->dbprefix.'usermeta` WHERE userid = '.$userid;	
				}
				// return $querystring;
				$query = $this->db->query($querystring);
				if($query->num_rows()){
					if(substr_count($userid, ',') > 0){
						return $query->result();
					}else{
						return $query->row();
					}
					
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

	private function getallmetakeysforsok($userid){
		if(!empty($userid)){
			$query = $this->db->select('metakey')
							  ->where('sokid in ('.$userid.')')
							  ->get('sokmeta');
			if($query->num_rows()){
		
				return $query->result();
			}else{
				return false;
			}				  
		}else{
			return false;
		}
	}
	private function getallmetakeysforuser($userid){
		if(!empty($userid)){
			$query = $this->db->select('keyname')
							  ->where('userid',$userid)
							  ->get('usermeta');
			if($query->num_rows()){
				return $query->result();
			}else{
				return false;
			}				  
		}else{
			return false;
		}
	}



public function sokmetainsignleshot($userid){

		if(!empty($userid)){
		
	
			 $allmetakeys = $this->getallmetakeysforsok($userid);
			//echo "hello".$userid;
				
			$querystring = "SELECT sokid,";
			if($allmetakeys){
		//	echo json_encode($allmetakeys);
	
				foreach($allmetakeys as $meta){
				
				$querystring .= 'MAX(IF(metakey = \''.$meta->metakey.'\',metaval,NULL)) AS '.$meta->metakey.',';
				
				}
				$querystring = rtrim($querystring,',');
				if(substr_count($userid, ',') > 0){
				
				 $querystring .= ' FROM `'.$this->db->dbprefix.'sokmeta` WHERE sokid IN ('.$userid.') GROUP BY sokid';	
				}else{
				$querystring .= ' FROM `'.$this->db->dbprefix.'sokmeta` WHERE sokid = '.$userid;	
				}
				// return $querystring;etall

				$query = $this->db->query($querystring);
				if($query->num_rows()){
					if(substr_count($userid, ',') > 0){
						return $query->result();
					}else{
						return $query->row();
					}
					
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

	public function agentid(){
		$query = $this->db->select_max('username')
						  ->get('user');
		if($query->num_rows()){
			$lastidstring =  $query->row()->username;
			$lastid = intval(preg_replace('/[^0-9]+/', '', $lastidstring));
			// preg_match_all('!\d+!', $lastidstring, $lastid);
			$lastid++;
			if(strlen($lastid) < 2){
				$lastid = sprintf('%02d',$lastid);
			}
			$latestidstring = 'OFLY'.$lastid;
			return $latestidstring;
		}else{
			return false;
		}				  
	}

	public function getsponserId($username,$returnid = false){
		$query = $this->db->select('id')
				          ->where('username',$username)
						  ->get('user');
		if($query->num_rows()){
			if(!$returnid){
				return true;
			}else{
				return $query->row();
			}
			
		}else{
			return false;
		}				  	  
	}

	public function getAllagent(){

		if($this->session->userdata('usertype') == 'A'){
			$tbl1 = $this->db->dbprefix.'user';
			$tbl2 = $this->db->dbprefix.'userpinsummary';
			$tbl3 = $this->db->dbprefix.'product';
			$query = $this->db->select("$tbl1.*,$tbl2.productid,$tbl3.pcode,$tbl3.pname")
							  ->join("$tbl2","$tbl1.id = $tbl2.userid")
							  ->join("$tbl3","$tbl2.productid = $tbl3.id")
							  ->where("$tbl1.type<>","A")
				              ->get('user');
			if($query->num_rows()){

				foreach($query->result() as $agent){
					$agentname = $this->getusermeta($agent->id,'agentmeta','userfullname',true);
					$agentmobile = $this->getusermeta($agent->id,'agentmeta','userregisterphonenum',true);
					$agent = (array)$agent;
					$agent['agentname'] = $agentname;
					$agent['agentmobile'] = $agentmobile;
					$agentdetail[] = (object)$agent;
				}
				return $agentdetail;
			}	              
		}else{
			return false;
		}				  	  
	}

	public function userpindetail($userid){
		if(!empty($userid)){
			$query = $this->db->query('SELECT * FROM (SELECT productid,qtyallot,qtyused,SUM(qtyallot) AS totalallot,SUM(qtyused) AS totalused FROM mlm_userpindist 
WHERE userid = '.$userid.' GROUP BY productid) AS grp1 JOIN (SELECT id,pcode,pname FROM mlm_product) AS grp2 ON grp1.productid = grp2.id');
			if($query->num_rows()){
				$productlist = [];
				foreach($query->result() as $record){
					if($record->totalallot-$record->totalused > 0){
						$productlist[] = (object)['id' => $record->id,'pcode' => $record->pcode,'pname' => $record->pname];
					}
				}
				if(!empty($productlist)){
					$productlist = (object) $productlist;
					return $productlist;
				}else{
					return false;
				}
				//return $query->result();
			}		 	
		}else{
			return false;
		}
	}

	public function singleuserinfo($id){
		if(!empty($id)){
			$tbl1 = $this->db->dbprefix.'user';
			$tbl2 = $this->db->dbprefix.'usermeta';
			$querystring = "SELECT grp1.*,grp2.* FROM(SELECT `$tbl1`.`id` AS userid,`$tbl1`.`username`,`$tbl1`.`email`,`$tbl1`.`status` FROM `$tbl1` WHERE `$tbl1`.`id` = $id) AS grp1 JOIN (SELECT `$tbl2`.`userid`,MAX(IF(`$tbl2`.keyname = 'userfullname',`$tbl2`.keyval,0)) AS userfullname FROM `$tbl2` WHERE `$tbl2`.`userid` IN($id) GROUP BY `$tbl2`.userid ) AS grp2 ON grp1.userid = grp2.userid ";
			$query = $this->db->query($querystring);
			if($query->num_rows()){
				return $query->row();
			}else{
				return false;
			}
		}else{
			return false;
		}
	}


	//########################################################################//

	public function getAllusers(){
		$query = $this->db->where('type <>','A')->where('type <>','C')->get('user');
		if($query->num_rows()){
			return $query->result();
		}else{
			return false;
		}
	}

	public function getLatestuserid(){
		$query = $this->db->select_max('id')->get('user');
		if($query->num_rows()){
			return $query->row()->id;
		}else{
			return false;
		}
	}
}