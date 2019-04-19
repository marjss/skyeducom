<?php

/**
* 
*/
class MY_Model extends CI_Model
{
	
	public function fileupload($filename = array()){
		if(is_array($filename)){
			$config = ['upload_path' => './assets/images/','allowed_types' => 'jpg|gif|jpeg|png'];
			$this->load->library('upload',$config);
			foreach($filename as $key => $value){
					//$sendback[$key] = $val;
					if (!empty($value['tmp_name']) && $value['size'] > 0) {
					            if (!$this->upload->do_upload($key)) {
					              $err = array('error' =>'No Image Size.');
					            } else {
					                // Code After Files Upload Success GOES HERE
					                $data_name = $this->upload->data();
					                $filename_arr[] = $data_name['file_name'];
					            }
					        }	
					}
				if(!isset($err)){
					return $filename_arr[0];
				}else{
					return false;
				}	
					
		}else{
			return false;
		}
	}
}