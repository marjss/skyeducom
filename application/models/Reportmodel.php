<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportmodel extends MY_Model {

	public function Gettodaycollection(){
		$tdate = @date('Y-m-d');
		$query = $this->db->select('SUM(payment) AS totalamount,paymentmode,paymentdate')
						  ->where('DATE(paymentdate)',$tdate)
						  ->group_by('paymentmode')
						  ->get('payment');
		if($query->num_rows()){
			return $query->result_array();
		}else{
			return false;
		}				  	
	}

	public function GetCommitteecollection(){
		$tbl1 = $this->db->dbprefix.'payment';
		$tbl2 = $this->db->dbprefix.'committee';
		$query = $this->db->select("$tbl1.committeeid,SUM($tbl1.payment) AS totalamount,$tbl1.paymentmode,$tbl1.paymentdate,$tbl2.name,$tbl2.prizecount")
						  ->from($tbl1)
						  ->join("$tbl2","$tbl1.committeeid = $tbl2.id")
						  ->group_by("$tbl1.committeeid,$tbl1.paymentmode")
						  ->get();
		if($query->num_rows()){
			$committeedata = [];
			foreach($query->result() as $comrecord){
				$comtotalamt = !empty($committeedata[$comrecord->committeeid]['totalamt'])?$committeedata[$comrecord->committeeid]['totalamt']+$comrecord->totalamount:$comrecord->totalamount;
				$committeedata[$comrecord->committeeid][$comrecord->paymentmode] = $comrecord->totalamount;
				$committeedata[$comrecord->committeeid]['totalamt'] = $comtotalamt;
				$committeedata[$comrecord->committeeid]['name'] = $comrecord->name;
				$committeedata[$comrecord->committeeid]['prizecount'] = $comrecord->prizecount; 
			}
			return $committeedata;
		}else{
			return false;
		}				  	
	}

	public function Getmonthcollection(){
		$tbl1 = $this->db->dbprefix.'payment';
		$tbl2 = $this->db->dbprefix.'committee';
		$query = $this->db->select("$tbl1.committeeid,SUM($tbl1.payment) AS totalamount,$tbl1.paymentmode,DATE_FORMAT($tbl1.paymentdate,'%M-%Y') AS paymonth,$tbl2.name,$tbl2.prizecount")
						  ->from($tbl1)
						  ->join("$tbl2","$tbl1.committeeid = $tbl2.id")
						  ->group_by("$tbl1.committeeid,$tbl1.paymentmode,paymonth")
						  ->get();
		if($query->num_rows()){
			$committeedata = [];
			foreach($query->result() as $comrecord){
				$comtotalamt = !empty($committeedata[$comrecord->committeeid]['totalamt'])?$committeedata[$comrecord->committeeid]['totalamt']+$comrecord->totalamount:$comrecord->totalamount;
				$committeedata[$comrecord->committeeid][$comrecord->paymentmode] = $comrecord->totalamount;
				$committeedata[$comrecord->committeeid]['totalamt'] = $comtotalamt;
				$committeedata[$comrecord->committeeid]['name'] = $comrecord->name;
				$committeedata[$comrecord->committeeid]['paymonth'] = $comrecord->paymonth;
				$committeedata[$comrecord->committeeid]['prizecount'] = $comrecord->prizecount; 
			}
			return $committeedata;
		}else{
			return false;
		}
	}

	public function getPaidmembers($comid,$month){
		$tbl1 = $this->db->dbprefix.'payment';
		$tbl2 = $this->db->dbprefix.'committee';
		$tbl3 = $this->db->dbprefix.'usermeta';
		if(!empty($comid) && !empty($month)){
			$sql = "SELECT grp1.*,grp2.memname FROM (SELECT $tbl1.committeeid,$tbl1.memberid,$tbl1.eminum,$tbl1.paymentmode,$tbl1.paymentdate,DATE_FORMAT($tbl1.paymentdate,'%M-%Y') AS paymonth,$tbl2.name FROM $tbl1 JOIN $tbl2 ON $tbl1.committeeid = $tbl2.id WHERE $tbl1.committeeid = $comid AND DATE_FORMAT($tbl1.paymentdate,'%M-%Y') = '$month' ) AS grp1 JOIN (SELECT userid,keyval AS memname FROM $tbl3 WHERE metasourcekey = 'membermeta' AND keyname = 'membername') AS grp2 ON grp1.memberid = grp2.userid";
			$query  =$this->db->query($sql);
			if($query->num_rows()){
				return $query->result();
			}else{
				return false;
			}


		}else{
			return false;
		}
	}

	public function collecitonToday($mode = null){
		$today = @date('Y-m-d');
		$tbl1 = $this->db->dbprefix.'payment';
		$tbl2 = $this->db->dbprefix.'committee';
		$tbl3 = $this->db->dbprefix.'usermeta';
		if(!empty($mode)){
			$sql = "SELECT grp1.*,grp2.memname FROM (SELECT $tbl1.*,$tbl2.name FROM $tbl1 JOIN $tbl2 ON $tbl1.committeeid = $tbl2.id WHERE $tbl1.paymentmode = '$mode' AND DATE($tbl1.paymentdate) = '$today' )AS grp1 JOIN (SELECT userid,keyval AS memname FROM $tbl3 WHERE metasourcekey = 'membermeta' AND keyname = 'membername') AS grp2 ON grp1.memberid = grp2.userid";
		}else{
			$sql = "SELECT grp1.*,grp2.memname FROM (SELECT $tbl1.*,$tbl2.name FROM $tbl1 JOIN $tbl2 ON $tbl1.committeeid = $tbl2.id WHERE DATE($tbl1.paymentdate) = '$today') AS grp1 JOIN (SELECT userid,keyval AS memname FROM $tbl3 WHERE metasourcekey = 'membermeta' AND keyname = 'membername') AS grp2 ON grp1.memberid = grp2.userid";
		}

		$query = $this->db->query($sql);
		if($query->num_rows()){
			return $query->result();
		}else{
			return false;
		}
		
	}
}