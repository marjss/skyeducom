<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Formsmodel extends MY_Model
{
    public function save($data = array()){

		if(is_array($data)){
                    
                    $json_string = mysql_real_escape_string($data['json']);
//                    $json_string = $data['json'];
                    $query="INSERT INTO `klr_forms` (`id`, `formJson`, `createdAt`, `updatedAt`) VALUES (NULL, '".$json_string."', CURRENT_TIMESTAMP, NULL)";
                    
                    $result=$this->db->query($query);
                    
                }
			
                if($result){
                    return $this->db->insert_id();
                }else{
                    return false;
                }

	}
    public function view($data = array()){
        $this->db->from('klr_forms');
        $this->db->order_by("id", "desc");
        $this->db->limit(1);
        $query = $this->db->get(); 
        return $query->result();
    }
}