<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Listingmodel extends MY_Model
{
	public function ListSOK(){
		$query =$this->db->get('sok');
		if($query->num_rows()){
			$sokdata = [];
			$this->load->model('usermodel');
			foreach($query->result_array() as $sokrecord){
				$customerid = $sokrecord['customerid'];
				$sokrecord['customername'] = $this->usermodel->getusermeta($customerid,'clientmeta','customername',true);
				$sokdata[] = (object) $sokrecord;
			}
			return $sokdata;
		}else{
			return false;
		}
	}
}