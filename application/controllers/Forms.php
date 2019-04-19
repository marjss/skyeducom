<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */

/**
 * 
 */
class Forms extends MY_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('user_id')) {
            return redirect('login');
        }
        $this->load->helper(array('form', 'url'));
        
        $this->load->library('user_agent');
    }

    public function index() {
        $this->profile();
    }

    public function createSlide()
    {
        $this->load->helper('form');
         $this->load->library('form_validation');
       if ($this->input->server('REQUEST_METHOD') == 'POST'){
           $this->form_validation->set_rules('h_four' , 'Heading 4', 'required');
           $this->form_validation->set_rules('h_two' , 'Heading 2', 'required');
           if ($this->form_validation->run() == true) {
                $data = array(
                'image_link' => $this->input->post('image[]'),
                'h_four' => $this->input->post('h_four'),
                'h_two' => $this->input->post('h_two'),
                'description' => $this->input->post('description'),
                'link' => $this->input->post('link'),

             );
                $this->load->model('Slidermodel');
                $record_id = $this->Slidermodel->addData($data);
                
                $this->uploadFiles($record_id);
            }
           }
   
        $this->viewpage('form-slider');
        $this->load->view('footer');
    }
    public function uploadFiles($record_id)
{
    $config = array(
        'upload_path'   => FCPATH . "slider_images/",
        'allowed_types' => 'jpg|png|jpeg',
        'overwrite'     => TRUE,  
        'max_height' => "500",
        'max_width' => "1920"
    );

    $this->load->library('upload', $config);

    $files = $_FILES['image'];
    
    foreach ($files['name'] as $key => $filename) {
        $_FILES['image[]']['name']     = $files['name'][$key];
        $_FILES['image[]']['type']     = $files['type'][$key];
        $_FILES['image[]']['tmp_name'] = $files['tmp_name'][$key];
        $_FILES['image[]']['error']    = $files['error'][$key];
        $_FILES['image[]']['size']     = $files['size'][$key];

        $config['file_name'] = $filename;

        $this->upload->initialize($config);
        
        if (isset($_FILES['image[]']['name']) && !empty($_FILES['image[]']['name'])) {
            if ( ! $this->upload->do_upload('image[]')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', 'Error in creating slider.');
            } else {
                $uploads[] = $this->upload->data();
                $link = $_FILES['image[]']['name'];
                $array = array(
                    'record_id' => $record_id,
                    'image_link'  =>$link
                    
                );
               
                $this->Slidermodel->addData($array);
            }
        }
    }
    $this->session->set_flashdata('success', 'Slider created successfully.');
    redirect(base_url() . 'forms/viewSlider/' . $record_id);
}
    public function viewSlider()
    {
       
        $this->load->model('Slidermodel');
        $data['slider'] = $this->Slidermodel->get_slider();
        $this->viewpage('list-slider',$data);
        $this->load->view('footer');
    }
    public function editSlide($id){
        if( $id > 0 ){
            $this->load->model('Slidermodel');
            $data[0]['formEdit'] = 1;
            $data = $this->Slidermodel->get_slider($id);
            $this->viewpage('form-slider',$data[0]);
            $this->load->view('footer');
        }
    }
        
    public function deleteSlide($id){
        if( $id > 0 ){
            $this->load->model('Slidermodel');
            $data = $this->Slidermodel->deleteSlider($id);
            if($data){
                $this->session->set_flashdata('success', 'Slide deleted successfully.');
                redirect(base_url() . 'forms/viewSlider/');
            } else {
                $this->session->set_flashdata('error', 'Error in deleting slide.');
            }
        }
    }
    public function viewServiceBox()
    {
       
        $this->load->model('Slidermodel');
        $data['service'] = $this->Slidermodel->get_serviceboxes();
        $this->viewpage('list-serviceBox',$data);
        $this->load->view('footer');
    }
    public function createServicebox(){
        $this->load->helper('form');
         $this->load->library('form_validation');
       if ($this->input->server('REQUEST_METHOD') == 'POST'){
           $this->form_validation->set_rules('box_head' , 'Heading', 'required');
           $this->form_validation->set_rules('box_description' , 'Description', 'required');
           if ($this->form_validation->run() == true) {
                $data = array(
                    'box_head' => $this->input->post('box_head'),
                    'box_description' => $this->input->post('box_description')
                );
                $this->load->model('Slidermodel');
                $record_id = $this->Slidermodel->addBox($data);
                $this->session->set_flashdata('success', 'Service box created successfully.');
                redirect(base_url() . 'forms/viewServiceBox');
            }
        }
   
        $this->viewpage('form-serviceBox');
        $this->load->view('footer');
    }
    
     public function viewBasic()
    {
       
        $this->load->helper('form');
         $this->load->library('form_validation');
         $this->load->model('Slidermodel');
       if ($this->input->server('REQUEST_METHOD') == 'POST'){
           $this->form_validation->set_rules('institute_name' , 'Heading 4', 'required');
           $this->form_validation->set_rules('phone_one' , 'Heading 2', 'required');
           $this->form_validation->set_rules('email_one' , 'Heading 2', 'required');
           $this->form_validation->set_rules('contact_person_one' , 'Heading 2', 'required');
           $this->form_validation->set_rules('about_us' , 'Heading 2', 'required');
           if ($this->form_validation->run() == true) {
                $data = array(
                'institute_name' => $this->input->post('institute_name'),
                'address_line_one' => $this->input->post('address_line_one'),
                'address_line_two' => $this->input->post('address_line_two'),
                'address_line_three' => $this->input->post('address_line_three'),
                'phone_one' => $this->input->post('phone_one'),
                'phone_two' => $this->input->post('phone_two'),
                'email_one' => $this->input->post('email_one'),
                'email_two' => $this->input->post('email_two'),
                'contact_person_one' => $this->input->post('contact_person_one'),
                'contact_person_two' => $this->input->post('contact_person_two'),
                'about_us' => $this->input->post('about_us'),

             );
                $this->load->model('Slidermodel');
                $record_id = $this->Slidermodel->updateBasic($data);
                if($record_id){
                    $this->session->set_flashdata('success', 'Basic information updated successfully.');
                }
               }
           }
        $aboutdata = $this->Slidermodel->get_basic();
        
        $this->viewpage('form-basic',$aboutdata[0]);
        $this->load->view('footer');
    }
}