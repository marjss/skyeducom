<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ordermodel extends MY_Model
{
public function getSOKMaster($tblname){
		if(!empty($tblname)){
			$query = $this->db->select('*')->get($tblname);
			if($query->num_rows()){
				return $query->result();
			}else{
				return false;
			}
		}
		else{
			return false;
		}
		
	
	}
	public function getSOKMasterorde($tblname){
		if(!empty($tblname)){
		
	 $q1="select distinct klr_sok.id,klr_sok.soknum from klr_sok join klr_ordeinr where klr_ordeinr.sokid=klr_sok.id";
			$query = $this->db->query($q1);
			if($query->num_rows()){
				return $query->result();
			}else{
				return false;
			}
		}
		else{
			return false;
		}
		
	
	}
	
	public function getSOKMasterordernon($tblname){
		if(!empty($tblname)){
		
	 $q1="select distinct klr_sok.id,klr_sok.soknum from klr_sok join klr_order where klr_order.sokid=klr_sok.id";
			$query = $this->db->query($q1);
			if($query->num_rows()){
				return $query->result();
			}else{
				return false;
			}
		}
		else{
			return false;
		}
		
	
	}
	
	
	
	public function getsupplydate(){
		$q1="select * from klr_ordeinr";
		$query = $this->db->query($q1);
         if($query->num_rows())
		    {
			return $query->result();
			}
			else
			{
				return false;
			}
			
	
	}
	
	public function cusno(){
		$q1="select sokid,cusno from klr_order";
		$query = $this->db->query($q1);
         if($query->num_rows())
		    {
			return $query->result();
			}
			else
			{
				return false;
			}
			
	
	}
	
	
	public function getoffice($tblname,$id)
	{
		if(!empty($tblname)){
		$q1="select klr_intrnloffice.* from klr_intrnloffice join klr_ordeinr where klr_intrnloffice.state=klr_ordeinr.invoice_generator and klr_ordeinr.id=(select max(id) from klr_ordeinr where klr_ordeinr.sokid=".$id .")";
				$query = $this->db->query($q1);
			if($query->num_rows()){
				return $query->result();
			}else{
				return false;
			}
		}
		else{
			return false;
		}
		
	
	}
	
	public function getAllusermetakeys($userid,$metasourcekey){
		if(!empty($sokid)){
			$query = $this->db->where(array('metasourcekey' => $metasourcekey,'userid' => $userid))
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
	
	
	public function getAllusermetainoneshot($userid,$metasourcekey){
		if(!empty($sokid)){
			$allmetakeys = $this->getAllusermetakeys($userid,$metasourcekey);
			$querystring = "SELECT userid,";
			if($allmetakeys){
				foreach($allmetakeys as $metakey){
				$querystring .= 'MAX(IF(keyname = \''.$keyname->keyname.'\',keyval,NULL)) AS \''.$keyname->keyname.'\',';
				}
				$querystring = rtrim($querystring,',');
				if(substr_count($sokid, ',') > 0){
				$querystring .= ' FROM `'.$this->db->dbprefix.'usermeta` WHERE sokid IN ('.$userid.') GROUP BY sokid';	
				}else{
				$querystring .= ' FROM `'.$this->db->dbprefix.'usermeta` WHERE sokid = '.$userid;	
				}
				//return $querystring;
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
	
	public function getbank()
	{
	$q1="select * from klr_bank";
		$query = $this->db->query($q1);
			if($query->num_rows())
			{
				return $query->result();
			}
	
	}
	public function getSOKMasterorder($id){
		if(!empty($id)){

$q1="select * from klr_order where id=(select max(id) from klr_order where sokid=".$id.")";
		
			$query = $this->db->query($q1);
			if($query->num_rows()){
				return $query->result();
			}else{
				return false;
			}
		}
		else{
			return false;
		}
		
	
	}
	
	public function getSOKMasterinvoicenon($id){
		if(!empty($id)){

$q1="select * from klr_invoice where id=(select max(id) from klr_invoice where sokid=".$id.")";
		
			$query = $this->db->query($q1);
			if($query->num_rows()){
				return $query->result();
			}else{
				return false;
			}
		}
		else{
			return false;
		}
		
	
	}
	
	
		public function getSOKMasterorderinr($id){
		if(!empty($id)){

$q1="select * from klr_ordeinr where id=(select max(id) from klr_ordeinr where sokid=".$id.")";
		
			$query = $this->db->query($q1);
			if($query->num_rows()){
				return $query->result();
			}else{
				return false;
			}
		}
		else{
			return false;
		}
		
	
	}
	
	
	public function getSOKMasterinvoiceinr($id){
		if(!empty($id)){

$q1="select * from klr_invoiceinr where id=(select max(id) from klr_invoiceinr where sokid=".$id.")";
		
			$query = $this->db->query($q1);
			if($query->num_rows()){
				return $query->result();
			}else{
				return false;
			}
		}
		else{
			return false;
		}
		
	
	}
	
	
	public function gettabledataorder($id)
{

$tbl1 = $this->db->dbprefix.'product';
			$tbl2 = $this->db->dbprefix.'sokproduct';
			$q1="select klr_sokproduct.*,klr_product.*,klr_sokproduct.sokid AS id from klr_product join klr_sokproduct where klr_product.typenum=klr_sokproduct.typeno and klr_sokproduct.sokid='".$id."'";
			$query=$this->db->query($q1);
			//$query = $this->db->select("$tbl2.*,$tbl1.*,$tbl2.sokid AS id") 
				//			  ->from($tbl1)
					//		  ->join("$tbl2","$tbl2.typeno = $tbl1.typenum")
						//	 ->where("$tbl2.sokid",."'".$id."'")
							//  ->get();
							  if($query->num_rows()){
				return $query->result();
				
			}else{
				return false;
				}
			
}

	
	
	public function enrollorder($sokid,$cusname,$cusno,$billadd,$shipadd,$custconperson,$custelno,$custemail,$docno,$docdate,$vatno,$adminno,$admintelnum,$adminemail,$vendorname,$vendortelnum,$vendoremail,$pono,$podate,$disdate,$disport,$entryport,$fforwarder,$payterms,$deltm,$shipterms,$rnote)
	{
	

	$query="insert into klr_order values('','".$cusname."','".$cusno."','".$billadd."','".$shipadd."','".$custconperson."','".$custelno."','".$custemail."','".$docno."','".$docdate."','".$vatno."','".$adminno."','".$admintelnum."','".$adminemail."','".$vendorname."','".$vendortelnum."','".$vendoremail."','".$pono."','".$podate."','".$disdate."','".$disport."','".$entryport."','".$fforwarder."','".$payterms."','".$deltm."','".$shipterms."','".$rnote."','".$sokid."')";
	
$result=$this->db->query($query);

	//return $sokid;

	
		
	}	
	
		public function enrollorderinr($sokid,$cusname,$cusno,$billadd,$shipadd,$custconperson,$custelno,$custemail,$docno,$docdate,$vatno,$adminno,$admintelnum,$adminemail,$vendorname,$vendortelnum,$vendoremail,$pono,$podate,$disdate,$disport,$entryport,$fforwarder,$payterms,$deltm,$shipterms,$rnote,$sgst,$cgst,$igst,$fca,$oca,$intoff)
	{
	

	$query="insert into klr_ordeinr values('','".$cusname."','".$cusno."','".$billadd."','".$shipadd."','".$custconperson."','".$custelno."','".$custemail."','".$docno."','".$docdate."','".$vatno."','".$adminno."','".$admintelnum."','".$adminemail."','".$vendorname."','".$vendortelnum."','".$vendoremail."','".$pono."','".$podate."','".$disdate."','".$disport."','".$entryport."','".$fforwarder."','".$payterms."','".$deltm."','".$shipterms."','".$rnote."','".$sokid."','".$sgst."','".$cgst."','".$igst."','".$fca."','".$oca."','".$intoff."')";
$result=$this->db->query($query);
	//return $sokid;
	
	}	
	
	
	public function enrollinvoice($sokid,$cusname,$cusno,$billadd,$shipadd,$custconperson,$custelno,$custemail,$docno,$docdate,$vatno,$adminno,$admintelnum,$adminemail,$vendorname,$vendortelnum,$vendoremail,$pono,$podate,$disdate,$disport,$entryport,$fforwarder,$payterms,$deltm,$shipterms,$rnote,$rono,$rorderdate,$delno,$delinfo)
	{
	

	$query="insert into klr_invoice values('','".$cusname."','".$cusno."','".$billadd."','".$shipadd."','".$custconperson."','".$custelno."','".$custemail."','".$docno."','".$docdate."','".$vatno."','".$adminno."','".$admintelnum."','".$adminemail."','".$vendorname."','".$vendortelnum."','".$vendoremail."','".$pono."','".$podate."','".$disdate."','".$disport."','".$entryport."','".$fforwarder."','".$payterms."','".$deltm."','".$shipterms."','".$rnote."','".$sokid."','".$rono."','".$rorderdate."','".$delno."','".$delinfo."')";
	
$result=$this->db->query($query);

	//return $sokid;

	
		
	}	
	
	
	
	public function enrollinvoiceinr($sokid,$cusname,$billadd,$shipadd,$custconperson,$custelno,$custemail,$docno,$docdate,$pono,$podate,$disdate,$fforwarder,$payterms,$transmode,$vehno,$sgst,$cgst,$igst,$fca,$oca,$intoff)
	{
	

$query="insert into klr_invoiceinr values('','".$cusname."','".$billadd."','".$shipadd."','".$custconperson."','".$custelno."','".$custemail."','".$docno."','".$docdate."','".$pono."','".$podate."','".$disdate."','".$fforwarder."','".$payterms."','".$sokid."','".$sgst."','".$cgst."','".$igst."','".$fca."','".$oca."','".$intoff."','".$transmode."','".$vehno."')";
$result=$this->db->query($query);
	//return $sokid;
	
	}	
	
	public function test(){
		$query1="select sokid,freightf,shmarks from klr_ipo";
		$query = $this->db->query($query1);
	     	 if($query->num_rows()){
			return 	$query->result();
						
			}else{
				return false;
			}		
		
	
	}
	
	
public function getSOKadmin()
	{
		$query1="select distinct klr_sokproduct.sokid AS soknum,klr_prodcenter.* from klr_prodcenter join klr_sokproduct where klr_prodcenter.shrtname=klr_sokproduct.supplier";
		$query = $this->db->query($query1);
	     	 if($query->num_rows()){
			return 	$query->result();
				
				
			}else{
				return false;
			}		
		
	
	}
	public function getSOKvendor()
	{
		$query1="select distinct klr_sok.id AS soknum,klr_sok.customerid,klr_persincharge.* from klr_persincharge join klr_sok where klr_persincharge.id=klr_sok.personinchid";
		$query = $this->db->query($query1);
	     	 if($query->num_rows()){
			return 	$query->result();
				
				
			}else{
				return false;
			}		
		
	
	}
	public function getusermeta()
	{
		$query1="select distinct klr_usermeta.* from klr_usermeta join klr_sok where klr_usermeta.userid=klr_sok.customerid";
		$query = $this->db->query($query1);
	     	 if($query->num_rows()){
			return 	$query->result();
				
				
			}else{
				return false;
			}		
		
	
	}
	
	
	public function Listsoknumber(){
		$query = $this->db->select('id')->get('sok');
		if($query->num_rows()){
			$customeridstring = '';
			foreach($query->result() as $userid){
				$customeridstring .= $userid->id.',';
			}
			$customeridstring = rtrim($customeridstring,',');
			$this->load->model('usermodel');
			//$customerdetail = $this->usermodel->usersokinsignleshot($customeridstring);
			$customerdetail = $this->usermodel->sokmetainsignleshot($customeridstring);
			return $customerdetail;
		}else{
			return false;
		}
	}
	
}
	?>