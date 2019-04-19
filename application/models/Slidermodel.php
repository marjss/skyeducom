<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Slidermodel extends MY_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_slider($id = FALSE) {
       
        if ($id === FALSE) {
            $query = $this->db->get('klr_slider');

            if ($query->num_rows() > 0) {
                return $query->result_array();
            } else {
                return false;
            }
        }
        $query = $this->db->get_where('klr_slider', array('id' => $id));

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    public function get_serviceboxes($id = FALSE) {
       
        if ($id === FALSE) {
            $this->db->order_by("id", "desc");
            $this->db->limit(3, 0);
            $query = $this->db->get('klr_service_box');

            if ($query->num_rows() > 0) {
                return $query->result_array();
            } else {
                return false;
            }
        }
        $query = $this->db->get_where('klr_service_box', array('id' => $id));

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    /**
     * Function to add slider data into database
     * 
     * @param type $data
     * @return boolean
     */
    public function addData($data){
        if($data['record_id'] >0){
            $this->db->set('image_link','"'.$data['image_link'].'"',false);
            $this->db->where('id',$data['record_id']);
            $this->db->update('slider');
            return true;
        }
        $this->db->insert('klr_slider', $data);
        return $this->db->insert_id();
    }
    
    /**
     * function to delete the slider
     * 
     * @param type $id
     * @return boolean
     */
    public function deleteSlider($id){
        if($id >0){ 
            $this->db->where('id', $id);
            $this->db->delete('klr_slider');
            return true;
        }
        else{
            return false;
        }
    }
    
    public function addBox($data){
        if($data['record_id'] >0){
            
        }
        $this->db->insert('klr_service_box', $data);
        return $this->db->insert_id();
    }
    public function get_basic($id = FALSE) {
       
        if ($id === FALSE) {
            $query = $this->db->get('klr_basic_info');
            
            if ($query->num_rows() > 0) {
                return $query->result_array();
            } else {
                return false;
            }
        }
        $query = $this->db->get_where('klr_basic_info', array('id' => $id));

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    public function updateBasic($data){
        
        $this->db->update('klr_basic_info', $data);
        return $this->db->insert_id();
    }
}
