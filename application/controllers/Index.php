<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Index extends MY_Controller
{
	
    public function __construct()
    {
           parent::__construct();

    }
	
	public function index(){
            $this->load->model('Slidermodel');
            $slideData = $this->Slidermodel->get_slider();
            $serviceData = $this->Slidermodel->get_serviceboxes();
            $basicData = $this->Slidermodel->get_basic();
            $this->load->view('index',array('slideData'=>$slideData,'service'=>$serviceData,'basic'=>$basicData));
	}

	
}