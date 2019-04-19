<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('fpdf/fpdf.php');
class Myfpdf extends FPDF
{

 public function __construct(){
		parent::__construct();
		$kistler=& get_instance();

}
}

?>