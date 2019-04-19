<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Test extends MY_Controller {
  
    function __construct()
    {
        parent::__construct();
      $this->load->library("mytcpdf");
		$this->load->model('processmodel');
			$this->load->model('mastermodel');
	$this->load->helper('user_helper');
    }
  
    public function test() {
	  $this->load->library("mytcpdf");
 $id = $this->uri->segment(3);
//	exit();
		//echo $id;
		//exit();	
		//$data['id']=$id;
		$ipodetail = $this->processmodel->ipodetail($id);
			$intoffice=$this->processmodel->internaloffice();
			$internalinvoice=$this->processmodel->internalinvoice($id);
			$internaldelivery=$this->processmodel->internaldelivery($id);
			$productdetail=$this->processmodel->ipoproduct($id);
			//echo "hello:".json_encode($productdetail);
			$pagedata = ['ipodetail' => $ipodetail,'ipoId' => $id,'internalinvoice'=>$internalinvoice,'internaldelivery'=>$internaldelivery,'productdetail'=>$productdetail,'intoffice'=>$intoffice];
 //  $data['txt']='xbcvbcvn';
   $this->load->view('test',$pagedata);
    }
}
  