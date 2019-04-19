<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class MY_Controller extends CI_Controller
{
	public $statename = [	 '' => '----Select State----',
							 'AP' => 'Andhra Pradesh',
							 'AR' => 'Arunachal Pradesh',
							 'AS' => 'Assam',
							 'BR' => 'Bihar',
							 'CT' => 'Chhattisgarh',
							 'GA' => 'Goa',
							 'GJ' => 'Gujarat',
							 'HR' => 'Haryana',
							 'HP' => 'Himachal Pradesh',
							 'JK' => 'Jammu & Kashmir',
							 'JH' => 'Jharkhand',
							 'KA' => 'Karnataka',
							 'KL' => 'Kerala',
							 'MP' => 'Madhya Pradesh',
							 'MH' => 'Maharashtra',
							 'MN' => 'Manipur',
							 'ML' => 'Meghalaya',
							 'MZ' => 'Mizoram',
							 'NL' => 'Nagaland',
							 'OR' => 'Odisha',
							 'PB' => 'Punjab',
							 'RJ' => 'Rajasthan',
							 'SK' => 'Sikkim',
							 'TN' => 'Tamil Nadu',
							 'TR' => 'Tripura',
							 'UK' => 'Uttarakhand',
							 'UP' => 'Uttar Pradesh',
							 'WB' => 'West Bengal',
							 'AN' => 'Andaman & Nicobar',
							 'CH' => 'Chandigarh',
							 'DN' => 'Dadra and Nagar Haveli',
							 'DD' => 'Daman & Diu',
							 'DL' => 'Delhi',
							 'LD' => 'Lakshadweep',
							 'PY' => 'Puducherry'
						];
	public $csvheaders = [

		'createcustomercsv' => ['Customer Name' => 'customername','Customer Email' => 'customeremail','Billing Address1' => 'billingaddress1','Billing Address2' => 'billingaddress2','Billing Address3' => 'billingaddress3','Bill to City' => 'billingcustomercity','Bill to State' => 'billingcustomerstate','Bill to ZIP' => 'billingcustomerzip','Shipping Address1' => 'shippingaddress1','Shipping Address2' => 'shippingaddress2','Shipping Address3' => 'shippingaddress3','Ship to City' => 'shippingcustomercity','Ship to State' => 'shippingcustomerstate','Ship to ZIP' => 'shippingcustomerzip','Contact Person' => 'customercontactperson','Contact Number' => 'customercontactnumber','Fax Number' => 'customerfaxnumber','Mobile Number' => 'customermobilenumber','Freight Forwarder' => 'customerfreightforwarder'],

		'createproductcsv' => ['Type Number' => 'typenum','SAP Number' => 'sapnum','Description' => 'detail','List Base Price' => 'list_baseprice','List Surcharge Price' => 'list_surcharge','Transfer Base Price' => 'trans_baseprice','Transfer Surcharge Price' => 'trans_surcharge','HSN' => 'hsn','Supplier' => 'supplier'],
		'createcustomertypecsv' => ['Name' => 'name','Type Number' => 'typenum'],
		'createzonecsv' => ['Zone Name' => 'name'],
		'createapplicationtypecsv' => ['Divison' => 'division','SBF' => 'sbf','Application Name' => 'name'],
		'createpersoninchargecsv' => ['Name' => 'name','Short Name' => 'shortname'],
		'createproducttypecsv' => ['Name' => 'name'],
		'createincotermcsv' => ['Name' => 'name'],
		'createcurrencycsv' => ['Short Name' => 'shortname'],
		'createproductioncentercsv' => ['Short Name' => 'shrtname','Name' => 'name','Address1' => 'add1','Address2' => 'add2','Address3' => 'add3','City' => 'city','Country' => 'country','Contact Person' => 'contperson','Contact Number' => 'contnumber','Email' => 'email'],
		'createinternalofficecsv' => ['Short Name' => 'shrtname','Name' => 'name','Address1' => 'add1','Address2' => 'add2','Address3' => 'add3','City' => 'city','PIN' => 'pin','Phone Number' => 'phone','Fax Number' => 'fax','Email' => 'email','GST' => 'gst','PAN' => 'pan','CIN' => 'cin']
	

	];					

	public function viewpage($pagename,$pagedataarray = array()){
		$usertype =  $this->session->userdata('usertype');
		$pagedataarray['usertype'] = $usertype;

		$this->load->view('header',array('usertype' => $usertype));
		$this->load->view($pagename,$pagedataarray);
	}

	//function to call when call method doesnot exist*************************
	// public function _remap($method)
 //    {
 //        if(method_exists($this,$method))
 //        {
 //            call_user_func(array($this, $method));
 //            return false;
 //        }
 //        else
 //        {
 //            $this->index();
 //            // show_404();
 //        }
 //    }
    ///////******************************
	
}