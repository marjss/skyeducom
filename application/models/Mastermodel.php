<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Mastermodel extends MY_Model
{
	public function enrollCustomerbyCSV($data = array()){
		if(!empty($data)){
		//first of all register user in usertable
		$this->load->model('usermodel');
		$this->load->helper('user_helper');
		$trackresult = [];
		//start csv looping
		foreach($data as $csvdata){
			$lastuserid = $this->usermodel->getLatestuserid();
			$username = 'kistler_'.(intval($lastuserid)+1);
			$password = encryptIt(substr(md5(uniqid(rand(), true)),10,5));
			$registerdate = @date('Y-m-d');
			$status = 0;
			$insertuserdata = ['username' => $username,'pass' =>$password,'type' => 'C','status' => $status,'registerdate' => $registerdate ];
			$this->db->set('timestamp','NOW()',false);
			$result = $this->db->insert('user',$insertuserdata);
			if($result){
				$userid = $this->db->insert_id();
				//now enter remianing meta in usermeta table
				$metasourcekey = 'clientmeta';
				$usermeatadata = [];
				foreach($csvdata as $keyname=>$keyval){
					$usermeatadata[] = ['metasourcekey' => $metasourcekey,'userid' =>$userid,'keyname' =>$keyname,'keyval' => $keyval  ];
				}
				$result_meta = $this->db->insert_batch('usermeta',$usermeatadata);
				$trackresult[] = $result_meta;
			}
		}
		if(!in_array($trackresult,0)){
			return true;
		}else{
			return false;
		}
			
			
		}else{	
			return false;
		}
	}

	public function enrollCustomer($data = array()){
		if(!empty($data)){
			extract($data);
			//first of all register user in usertable
			$this->load->model('usermodel');
			$this->load->helper('user_helper');
			$trackresult = [];
			//insert user if it is not edit case
			$lastuserid = $this->usermodel->getLatestuserid();
			$username = 'kistler_'.(intval($lastuserid)+1);
			$password = encryptIt(substr(md5(uniqid(rand(), true)),10,5));
			$registerdate = @date('Y-m-d');
			$status = 0;
			$insertuserdata = ['username' => $username,'pass' =>$password,'type' => 'C','status' => $status,'registerdate' => $registerdate ];
			$this->db->set('timestamp','NOW()',false);
			$result = $this->db->insert('user',$insertuserdata);
			$customermeta = ['customername' => $customername,'customeremail' => $customeremail,'billingaddress1' => $billingaddress1,'billingaddress2' => $billingaddress2,'billingaddress3' => $billingaddress3,'billingcustomercity' => $billingcustomercity,'billingcustomerstate' => $billingcustomerstate,'billingcustomerzip' => $billingcustomerzip,'shippingaddress1' => $shippingaddress1,'shippingaddress2' => $shippingaddress2,'shippingaddress3' => $shippingaddress3,'shippingcustomercity' => $shippingcustomercity,'shippingcustomerstate' => $shippingcustomerstate,'shippingcustomerzip' => $shippingcustomerzip,'customercontactperson' => $customercontactperson,'customercontactnumber' => $customercontactnumber,'customerfaxnumber' => $customerfaxnumber,'customermobilenumber' => $customermobilenumber,'customerfreightforwarder' => $customerfreightforwarder];
			if($result){
				$userid = $this->db->insert_id();
				//now enter remianing meta in usermeta table
				$metasourcekey = 'clientmeta';
				$usermeatadata = [];
				foreach($customermeta as $keyname=>$keyval){
					$usermeatadata[] = ['metasourcekey' => $metasourcekey,'userid' =>$userid,'keyname' =>$keyname,'keyval' => $keyval  ];
				}
				$result_meta = $this->db->insert_batch('usermeta',$usermeatadata);
				$trackresult[] = $result_meta;
			}
			if(!in_array($trackresult,0)){
			return true;
			}else{
				return false;
			}

		}else{
			return false;
		}
	}

	public function editCustomer($data = array()){
		if(!empty($data)){
			$tbl = $this->db->dbprefix.'usermeta';
			extract($data);
			$err = [];
			$customermeta = ['customername' => $customername,'customeremail' => $customeremail,'billingaddress1' => $billingaddress1,'billingaddress2' => $billingaddress2,'billingaddress3' => $billingaddress3,'billingcustomercity' => $billingcustomercity,'billingcustomerstate' => $billingcustomerstate,'billingcustomerzip' => $billingcustomerzip,'shippingaddress1' => $shippingaddress1,'shippingaddress2' => $shippingaddress2,'shippingaddress3' => $shippingaddress3,'shippingcustomercity' => $shippingcustomercity,'shippingcustomerstate' => $shippingcustomerstate,'shippingcustomerzip' => $shippingcustomerzip,'customercontactperson' => $customercontactperson,'customercontactnumber' => $customercontactnumber,'customerfaxnumber' => $customerfaxnumber,'customermobilenumber' => $customermobilenumber,'customerfreightforwarder' => $customerfreightforwarder];
			if(!empty($editmode)){
				foreach ($customermeta as $key => $value) {
					$userid = $editmode;
					//now enter remianing meta in usermeta table
					$metasourcekey = 'clientmeta';
					$sql = "INSERT INTO $tbl (`metasourcekey`,`userid`,`keyname`,`keyval`) VALUES ('$metasourcekey',$userid,'$key','$value') ON DUPLICATE KEY UPDATE `keyval` = '$value'";
					$result = $this->db->query($sql);
					if(!$result){
						$err[] = $key;
					}
				}
				if(empty($err)){
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

	public function enrollProductbyCSV($data = array()){
		if(!empty($data)){
		//first of all register user in usertable
		$this->load->model('usermodel');
		$this->load->helper('user_helper');
		$trackresult = [];
		//start csv looping
		foreach($data as $csvdata){
				//make a combined array to insert product
				$status = 1;
				$method = 'csv';
				$uploadby = $this->session->userdata('user_id');
				$timestamp = @date('Y-m-d h:i:s');
				$producttotaladata = $productdata = [];
				foreach($csvdata as $key=>$product){
					$productdata[$key] = $product;
					
				}
				$productdata['status'] = $status;
				$productdata['method'] = $method;
				$productdata['uploadby'] = $uploadby;
				$productdata['timestamp'] = $timestamp;
				$producttotaladata[] = $productdata;
				//$this->db->set('timestamp','NOW()',false);
				$result_meta = $this->db->insert_batch('product',$producttotaladata);
				// return $producttotaladata;
				$trackresult[] = $result_meta;
			
		}
		if(!in_array($trackresult,0)){
			return true;
		}else{
			return false;
		}
			
			
		}else{	
			return false;
		}
	}

	public function enrollCustomerTypebyCSV($data = array()){
		if(!empty($data)){
		$trackresult = [];
		//start csv looping
		foreach($data as $csvdata){
				//make a combined array to insert product
				$timestamp = @date('Y-m-d h:i:s');
				$customertypetotaladata = $customertypedata = [];
				foreach($csvdata as $key=>$customertype){
					$customertypedata[$key] = $customertype;
					
				}
				$customertypedata['timestamp'] = $timestamp;
				$customertypetotaladata[] = $customertypedata;
				//$this->db->set('timestamp','NOW()',false);
				$result_meta = $this->db->insert_batch('customertype',$customertypetotaladata);
				// return $customertypetotaladata;
				$trackresult[] = $result_meta;
			
		}
		if(!in_array($trackresult,0)){
			return true;
		}else{
			return false;
		}
			
			
		}else{	
			return false;
		}
	}

	public function enrollZoneTypebyCSV($data = array()){
		if(!empty($data)){
		$trackresult = [];
		//start csv looping
		foreach($data as $csvdata){
				//make a combined array to insert product
				$timestamp = @date('Y-m-d h:i:s');
				$zonetypetotaladata = $zonetypedata = [];
				foreach($csvdata as $key=>$zonetype){
					$zonetypedata[$key] = $zonetype;
					
				}
				$zonetypedata['timestamp'] = $timestamp;
				$zonetypetotaladata[] = $zonetypedata;
				//$this->db->set('timestamp','NOW()',false);
				$result_meta = $this->db->insert_batch('zones',$zonetypetotaladata);
				// return $zonetypetotaladata;
				$trackresult[] = $result_meta;
			
		}
		if(!in_array($trackresult,0)){
			return true;
		}else{
			return false;
		}
			
			
		}else{	
			return false;
		}
	}
	public function enrollApplicationTypebyCSV($data = array()){
		if(!empty($data)){
		$trackresult = [];
		//start csv looping
		foreach($data as $csvdata){
				//make a combined array to insert product
				$timestamp = @date('Y-m-d h:i:s');
				$applicationtypetotaladata = $applicationtypedata = [];
				foreach($csvdata as $key=>$applicationtype){
					$applicationtypedata[$key] = $applicationtype;
					
				}
				$applicationtypedata['status'] = 1;
				$applicationtypedata['timestamp'] = $timestamp;
				$applicationtypetotaladata[] = $applicationtypedata;
				//$this->db->set('timestamp','NOW()',false);
				$result_meta = $this->db->insert_batch('applicationtype',$applicationtypetotaladata);
				// return $applicationtypetotaladata;
				$trackresult[] = $result_meta;
			
		}
		if(!in_array($trackresult,0)){
			return true;
		}else{
			return false;
		}
			
			
		}else{	
			return false;
		}
	}
	public function enrollPersonInchbyCSV($data = array()){
		if(!empty($data)){
		$trackresult = [];
		//start csv looping
		foreach($data as $csvdata){
				//make a combined array to insert product
				$timestamp = @date('Y-m-d h:i:s');
				$personinchtotaladata = $personinchdata = [];
				foreach($csvdata as $key=>$personinch){
					$personinchdata[$key] = $personinch;
					
				}
				$personinchdata['status'] = 1;
				$personinchdata['timestamp'] = $timestamp;
				$personinchtotaladata[] = $personinchdata;
				//$this->db->set('timestamp','NOW()',false);
				$result_meta = $this->db->insert_batch('persincharge',$personinchtotaladata);
				// return $personinchtotaladata;
				$trackresult[] = $result_meta;
			
		}
		if(!in_array($trackresult,0)){
			return true;
		}else{
			return false;
		}
			
			
		}else{	
			return false;
		}
	}
	public function enrollProductTypebyCSV($data = array()){
		if(!empty($data)){
		$trackresult = [];
		//start csv looping
		foreach($data as $csvdata){
				//make a combined array to insert product
				$timestamp = @date('Y-m-d h:i:s');
				$producttypetotaladata = $producttypedata = [];
				foreach($csvdata as $key=>$producttype){
					$producttypedata[$key] = $producttype;
					
				}
				$producttypedata['status'] = 1;
				$producttypedata['timestamp'] = $timestamp;
				$producttypetotaladata[] = $producttypedata;
				//$this->db->set('timestamp','NOW()',false);
				$result_meta = $this->db->insert_batch('producttype',$producttypetotaladata);
				// return $producttypetotaladata;
				$trackresult[] = $result_meta;
			
		}
		if(!in_array($trackresult,0)){
			return true;
		}else{
			return false;
		}
			
			
		}else{	
			return false;
		}
	}
	public function enrollIncoTermbyCSV($data = array()){
		if(!empty($data)){
		$trackresult = [];
		//start csv looping
		foreach($data as $csvdata){
				//make a combined array to insert product
				$timestamp = @date('Y-m-d h:i:s');
				$incotermtotaladata = $incotermdata = [];
				foreach($csvdata as $key=>$incoterm){
					$incotermdata[$key] = $incoterm;
					
				}
				$incotermdata['status'] = 1;
				$incotermdata['timestamp'] = $timestamp;
				$incotermtotaladata[] = $incotermdata;
				//$this->db->set('timestamp','NOW()',false);
				$result_meta = $this->db->insert_batch('incoterm',$incotermtotaladata);
				// return $incotermtotaladata;
				$trackresult[] = $result_meta;
			
		}
		if(!in_array($trackresult,0)){
			return true;
		}else{
			return false;
		}
			
			
		}else{	
			return false;
		}
	}
	public function enrollCurrencyCSV($data = array()){
		if(!empty($data)){
		$trackresult = [];
		//start csv looping
		foreach($data as $csvdata){
				//make a combined array to insert product
				$timestamp = @date('Y-m-d h:i:s');
				$currencytotaladata = $currencydata = [];
				foreach($csvdata as $key=>$currency){
					$currencydata[$key] = $currency;
					
				}
				$currencydata['timestamp'] = $timestamp;
				$currencytotaladata[] = $currencydata;
				//$this->db->set('timestamp','NOW()',false);
				$result_meta = $this->db->insert_batch('currency',$currencytotaladata);
				// return $currencytotaladata;
				$trackresult[] = $result_meta;
			
		}
		if(!in_array($trackresult,0)){
			return true;
		}else{
			return false;
		}
			
			
		}else{	
			return false;
		}
	}
	public function enrollProductioncenterCSV($data = array()){
		if(!empty($data)){
		$trackresult = [];
		//start csv looping
		foreach($data as $csvdata){
				//make a combined array to insert product
				$timestamp = @date('Y-m-d h:i:s');
				$productioncentertotaldata = $productioncenterdata = [];
				foreach($csvdata as $key=>$productioncenter){
					$productioncenterdata[$key] = $productioncenter;
					
				}
				$productioncenterdata['timestamp'] = $timestamp;
				$productioncentertotaldata[] = $productioncenterdata;
				//$this->db->set('timestamp','NOW()',false);
				$result_meta = $this->db->insert_batch('prodcenter',$productioncentertotaldata);
				// return $productioncentertotaldata;
				$trackresult[] = $result_meta;
			
		}
		if(!in_array($trackresult,0)){
			return true;
		}else{
			return false;
		}
			
			
		}else{	
			return false;
		}
	}
	public function enrollInternalOfficeCSV($data = array()){
		if(!empty($data)){
		$trackresult = [];
		//start csv looping
		foreach($data as $csvdata){
				//make a combined array to insert product
				$timestamp = @date('Y-m-d h:i:s');
				$productioncentertotaldata = $productioncenterdata = [];
				foreach($csvdata as $key=>$productioncenter){
					$productioncenterdata[$key] = $productioncenter;
					
				}
				$productioncenterdata['timestamp'] = $timestamp;
				$productioncentertotaldata[] = $productioncenterdata;
				//$this->db->set('timestamp','NOW()',false);
				$result_meta = $this->db->insert_batch('intrnloffice',$productioncentertotaldata);
				// return $productioncentertotaldata;
				$trackresult[] = $result_meta;
			
		}
		if(!in_array($trackresult,0)){
			return true;
		}else{
			return false;
		}
			
			
		}else{	
			return false;
		}
	}

	public function ListCustomers(){
		$query = $this->db->select('id')->where('type','C')->get('user');
		if($query->num_rows()){
			$customeridstring = '';
			foreach($query->result() as $userid){
				$customeridstring .= $userid->id.',';
			}
			$customeridstring = rtrim($customeridstring,',');
			$this->load->model('usermodel');
			$customerdetail = $this->usermodel->usermetainsignleshot($customeridstring);
			return $customerdetail;
		}else{
			return false;
		}
	}
	
	public function Listsokmeta(){
		$query = $this->db->select('id')->get('sok');
		if($query->num_rows()){
			$customeridstring = '';
			foreach($query->result() as $userid){
				$customeridstring .= $userid->id.',';
			}
			$customeridstring = rtrim($customeridstring,',');
			$this->load->model('usermodel');
			$customerdetail = $this->usermodel->sokmetainsignleshot($customeridstring);
			return $customerdetail;
		}else{
			return false;
		}
	}


	public function ListProducts(){
		$query = $this->db->get('product');
		if($query->num_rows()){
			return $query->result();
		}else{
			return false;
		}

	}

	public function ListCurrency(){
		$query = $this->db->get('currency');
		if($query->num_rows()){
			return $query->result();
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


	public function getProdDetailbytypenum($typenum,$columnkey = false){
		if(!empty($typenum)){
			if($columnkey){
				$query = $this->db->select($columnkey)->where('typenum',$typenum)->get('product');
			}else{
				$query = $this->db->select('id,typenum,sapnum,list_baseprice,list_surcharge,trans_baseprice,trans_surcharge,supplier')->where('typenum',$typenum)->get('product');
			}
			if($query->num_rows()){
				if($columnkey){
					return $query->row()->$columnkey;
				}else{
					return $query->row();
				}
				
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public function ListProductTypenum(){
		$query = $this->db->distinct()->select('typenum')->get('product');
		if($query->num_rows()){
			$typenum = [];
			foreach($query->result() as $rec){
				$typenum[] = $rec->typenum;
			}
			return $typenum;
		}else{
			return false;
		}
	}


}