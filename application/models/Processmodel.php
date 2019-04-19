<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Processmodel extends MY_Model
{
	
	public function getSOKMaster($tblname){
		if(!empty($tblname)){
			$query = $this->db->select('id,name')->get($tblname);
			if($query->num_rows()){
				return $query->result();
			}else{
				return false;
			}
		}else{
			return false;
		}
		
	}
	
		public function getSOKMasteripo($tblname){
		if(!empty($tblname)){
			$query = $this->db->select('*')->get($tblname);
			if($query->num_rows()){
				return $query->result();
			}else{
				return false;
			}
		}else{
			return false;
		}
		
		
		
	}
	
	public function enrollipo($iponum,$ipodate,$sokid,$suppname,$suppadd,$cperson,$refno,$prepby,$shmarks,$invoiceto,$delat,$ff,$payt,$expdate,$exworks,$disport,$entry,$shrtname,$shrtinvoiceto,$shrtdelat)
	{
	$query="insert into klr_ipo values('','".$iponum."','".$ipodate."','".$sokid."','".$suppname."','".$suppadd."','".$cperson."','".$refno."','".$prepby."','".$shmarks."','".$invoiceto."','".$delat."','".$ff."','".$payt."','".$expdate."','".$exworks."','".$disport."','".$entry."','".$shrtname."','".$shrtinvoiceto."','".$shrtdelat."')";
	$result=$this->db->query($query);

	return $iponum;
	
		
	}	
	
	
	public function IPOdetail($id){
			
$query1="select * from klr_ipo where iponum='".$id."' limit 1";
			$query = $this->db->query($query1);
	     	 if($query->num_rows()){
			return 	$query->result();
				
				
			}else{
				return false;
			}				  
		
	}
	public function internaloffice(){
			
$query1="select * from klr_intrnloffice";
			$query = $this->db->query($query1);
	     	 if($query->num_rows()){
			return 	$query->result();
				
				
			}else{
				return false;
			}				  
		
	}
		public function internalinvoice($id){
			
$query1="select klr_intrnloffice.* from klr_ipo inner join klr_intrnloffice where klr_ipo.iponum='".$id."' and klr_intrnloffice.shrtname=klr_ipo.shrtinvoiceto limit 1";
			$query = $this->db->query($query1);
	     	 if($query->num_rows()){
			return 	$query->result();
				
				
			}else{
				return false;
			}				  
		
	}
		public function internaldelivery($id){
			
$query1="select klr_intrnloffice.* from klr_ipo inner join klr_intrnloffice where klr_ipo.iponum='".$id."' and klr_intrnloffice.shrtname=klr_ipo.shrtdelat limit 1";
			$query = $this->db->query($query1);
	     	 if($query->num_rows()){
			return 	$query->result();
				
				
			}else{
				return false;
			}				  
		
	}
public function ipoproduct($id){
	
			
			$query = $this->db->select("klr_sokproduct.*,klr_product.*,klr_product.supplier AS supp,klr_ipo.shrtname AS st")
							  ->from("klr_sokproduct")
							  ->join("klr_product","klr_sokproduct.typeno = klr_product.typenum")
							  ->join("klr_ipo","klr_sokproduct.sokid=klr_ipo.sokid")
							  ->where('klr_ipo.iponum',$id)
							   ->get();
	    	 if($query->num_rows()){
			return 	$query->result();
				
				
			}else{
				return false;
			}				  
		
	}
	
	


// for 'sok number' dropdownlist in ipo
public function getSOKMaster1($tblname){
		if(!empty($tblname)){
			$query = $this->db->select('*')->get($tblname);
			if($query->num_rows()){
				return $query->result();
			}else{
				return false;
			}
		}else{
			return false;
		}
		
		
		
	}
	public function getSOKid($tblname){
		if(!empty($tblname)){
			$query = $this->db->select('id')->get($tblname);
			if($query->num_rows()){
				return $query->result();
			}else{
				return false;
			}
		}else{
			return false;
		}
		
		
		
	}
	

	// for retreive 'ipo generate to' dropdownlist center
		public function getSOKMaster2($tblname){
		if(!empty($tblname)){
			$query = $this->db->select('id,shrtname,name')->get($tblname);
			if($query->num_rows()){
				return $query->result();
				
			}else{
				return false;
			}
		}else{
			return false;
		}
	//	$query2=$this->db->select('contperson')->get($tblname)->where('shrtname'=>$sokipogen);
		
	
	}

	public function getSOKMaster3($tblname){
		if(!empty($tblname)){
			$query = $this->db->select('*')->get($tblname);
			if($query->num_rows()){
				return $query->result();
				
			}else{
				return false;
			}
		}else{
			return false;
		}
	//	$query2=$this->db->select('contperson')->get($tblname)->where('shrtname'=>$sokipogen);
		
	
	}
	public function getSOKMaster4($tblname){
		if(!empty($tblname)){
		$tbl1 = $this->db->dbprefix.'sok';
			$tbl2 = $this->db->dbprefix.'sokmeta`';
			$query = $this->db->select("$tbl1.*,$tbl2.*")
							  ->from($tbl1)
							  ->join("$tbl2","$tbl1.id = $tbl2.sokid")
							   ->get();
			
			if($query->num_rows()){
				return $query->result();
				
			}else{
				return false;
			}
		}else{
			return false;
		}
	//	$query2=$this->db->select('contperson')->get($tblname)->where('shrtname'=>$sokipogen);
		
	
	}
public function getSOKMaster5($tblname){
		if(!empty($tblname)){
			$query = $this->db->select('*')->get($tblname);
			if($query->num_rows()){
				return $query->result();
				
			}else{
				return false;
			}
		}else{
			return false;
		}
	//	$query2=$this->db->select('contperson')->get($tblname)->where('shrtname'=>$sokipogen);
		
	
	}
public function gettabledata($tbl)
{/*
$query1="select klr_intrnloffice.* from klr_ipo inner join klr_intrnloffice where klr_ipo.iponum='".$id."' and klr_intrnloffice.shrtname=klr_ipo.shrtdelat limit 1";
			$query = $this->db->query($query1);
	     	 if($query->num_rows())
*/
$tbl1 = $this->db->dbprefix.'product';
			$tbl2 = $this->db->dbprefix.'sokproduct';
			$query = $this->db->select("$tbl2.*,$tbl1.*,$tbl2.sokid AS id") 
							  ->from($tbl1)						 
							  ->join("$tbl2","$tbl2.typeno = $tbl1.typenum")
							// ->distinct("$tbl1.typenum")
							  ->get();
							  if($query->num_rows()){
				return $query->result();
				
			}else{
				return false;
				}
			
}



	public function enrollSOK($data = array()){
		if(!empty($data)){
			extract($data);
			$sokdate = @date('Y-m-d',strtotime($sokdate));
			$sokexpdeliverydate = @date('Y-m-d',strtotime($sokexpdeliverydate));
			$regdate = @date('Y-m-d');
			$sokdata = ['soknum' => $soknumber,'customerid' => $sokcustomerid,'sokdate' => $sokdate,'applicationtypeid' => $sokapplicationtype,'customertypeid' => $sokcustomertype,'producttypeid' => $sokproducttype,'personinchid' => $sokpersonincharge,'zoneid' => $sokzone,'chfordrval' => $totalordervalchf,'chftrnval' => $totaltrnfrvalchf,'chflistval' => $totallistvalchf,'discount' => $totaldiscountonsok,'profit' => $totalprofitonsok,'exp_del_date' => $sokexpdeliverydate,'freightfrwrder' => $sokfreightforwarder,'regdate' => $regdate,'status' => 1];

			//first of all insert sok data in to get sok id
			$this->db->set('timestamp','NOW()',false);
			$result = $this->db->insert('sok',$sokdata);
			if($result){
				$sokid = $this->db->insert_id();
				//enter sok meta and sok item list in to respective tables
				$sokmeta = ['sokpaymentterms' => $sokpaymentterms,'sokcustomername' => $sokcustomername,'sokcustomeraddress' => $sokcustomeraddress,'sokcustomershipaddress' => $sokcustomershipaddress,'sokcustomertelnumber' => $sokcustomertelnumber,'sokcustomerfaxnumber' => $sokcustomerfaxnumber,'sokcustomercontactperson' => $sokcustomercontactperson,'sokcustomeremailid' => $sokcustomeremailid,'sokquotationnumber' => $sokquotationnumber,'sokponumber' => $sokponumber,'sokpodate' => $sokpodate,'sokdispatchport' => $sokdispatchport,'sokentryport' => $sokentryport,'orderpackagingcharge' => $orderpackagingcharge,'transferpackagingcharge' => $transferpackagingcharge,'listpackagingcharge' => $listpackagingcharge,'ordercipfcacharge' => $ordercipfcacharge,'transfercipfcacharge' => $transfercipfcacharge,'listcipfcacharge' => $listcipfcacharge,'totalordervalue' => $totalordervalue,'totaltransfervalue' => $totaltransfervalue,'totallistvalue' => $totallistvalue,'sokexworks' => $sokexworks,'sokdispatchport' => $sokdispatchport,'sokentryport' => $sokentryport];
				//$sokitemslist = [];
				if(!empty($sokprodtypenum)){
					$timestamP = @date('Y-m-d h:i:s');
					$SOKitem = [];
					foreach($sokprodtypenum as $key=>$typenum){
						$srchrgunitneeded = !empty($srchrgunit)?$srchrgunit[$key]:0;
						$SOKitem[] = ['sokid' => $sokid,'typeno' => $typenum,'sapno' => $sokprodsapnum[$key],'qty' => $sokprodqty[$key],'ordrpricecurrency' => $sokpocuurency[$key],'ordrprice' => $sokprodordrprice[$key],'ordrval' => $sokprodordrval[$key],'trnsfrpricecurrency' => $soktrnfrcuurency[$key],'trnsfrprice' => $sokprodtrnfrprice[$key],'trnsfrval' => $sokprodtrnfrval[$key],'listpricecurrency' => $soklistpcuurency[$key],'listprice' => $sokprodlistprice[$key],'listval' => $sokprodlistval[$key],'supplier' => $sokprodsupplier[$key],'chfordrval' => $chfconvertedvalue[$key],'chftrnsfrval' => $chfconvertedtrnfrvalue[$key],'chflistval' => $chfconvertedlistvalue[$key],'srchrgunit' => $srchrgunitneeded,'timestamp' => $timestamP];
						//$sql_sokitems = "INSERT INTO {$this->db->dbprefix}sokproduct (`sokid`,`typeno`,`sapno`,`qty`,`ordrpricecurrency`,`ordrprice`,`ordrval`,`trnsfrpricecurrency`,`trnsfrprice`,`trnsfrval`,`listpricecurrency`,`listprice`,`listval`,`supplier`,`chfordrval`,`chftrnsfrval`,`chflistval`,`srchrgunit`,`timestamp`) VALUES ($sokid,'$typenum','$sokprodsapnum[$key]','$sokprodqty[$key]','$sokpocuurency[$key]','$sokprodordrprice[$key]','$sokprodordrval[$key]','$soktrnfrcuurency[$key]','$sokprodtrnfrprice[$key]','$sokprodtrnfrval[$key]','$soklistpcuurency[$key]','$sokprodlistprice[$key]','$sokprodlistval[$key]','$sokprodsupplier[$key]','$chfconvertedvalue[$key]','$chfconvertedtrnfrvalue[$key]','$chfconvertedlistvalue[$key]',$srchrgunitneeded,'$timestamP') ON DUPLICATE KEY UPDATE `qty` = '$sokprodqty[$key]',`ordrpricecurrency` = '$sokpocuurency[$key]',`ordrprice` = '$sokprodordrprice[$key]',`ordrval` = '$sokprodordrval[$key]',`trnsfrpricecurrency` = '$soktrnfrcuurency[$key]',`trnsfrprice` = '$sokprodtrnfrprice[$key]',`trnsfrval` = '$sokprodtrnfrval[$key]',`listpricecurrency` = '$soklistpcuurency[$key]',`listprice` = '$sokprodlistprice[$key]',`listval` = '$sokprodlistval[$key]',`supplier` = '$sokprodsupplier[$key]',`chfordrval` = '$chfconvertedvalue[$key]',`chftrnsfrval` = '$chfconvertedtrnfrvalue[$key]',`chflistval` = '$chfconvertedlistvalue[$key]',`srchrgunit` = $srchrgunitneeded,`timestamp` = '$timestamP'";
						//$result_sokitems = $this->db->query($sql_sokitems);
					}
				$this->db->insert_batch('sokproduct',$SOKitem);	
				}
				//enter sok items meta
				if(!empty($sokmeta) && !empty($sokid)){
					$metasourcekey = 'sokmeta';
					foreach($sokmeta as $key => $val){
						$val = addslashes($val);
						$sql_sokmeta = "INSERT INTO {$this->db->dbprefix}sokmeta (`metasourcekey`,`sokid`,`metakey`,`metaval`) VALUES ('$metasourcekey',$sokid,'$key','$val') ON DUPLICATE KEY UPDATE `metaval` = '$val'";
						$result_sokmeta = $this->db->query($sql_sokmeta);
					}

				}
				return $sokid;
			}
		}else{
			return false;
		}
	}	

	public function getAllSOKmetakeys($sokid,$metasourcekey){
		if(!empty($sokid)){
			$query = $this->db->where(array('metasourcekey' => $metasourcekey,'sokid' => $sokid))
							  ->get('sokmeta');
			if($query->num_rows()){
				return $query->result();
			}else{
				return false;
			}				  
		}else{
			return false;
		}
	}

	public function getAllsokmetainoneshot($sokid,$metasourcekey){
		if(!empty($sokid)){
			$allmetakeys = $this->getAllSOKmetakeys($sokid,$metasourcekey);
			$querystring = "SELECT sokid,";
			if($allmetakeys){
				foreach($allmetakeys as $metakey){
				$querystring .= 'MAX(IF(metakey = \''.$metakey->metakey.'\',metaval,NULL)) AS \''.$metakey->metakey.'\',';
				}
				$querystring = rtrim($querystring,',');
				if(substr_count($sokid, ',') > 0){
				$querystring .= ' FROM `'.$this->db->dbprefix.'sokmeta` WHERE sokid IN ('.$sokid.') GROUP BY sokid';	
				}else{
				$querystring .= ' FROM `'.$this->db->dbprefix.'sokmeta` WHERE sokid = '.$sokid;	
				}
				//return $querystring;
				$query = $this->db->query($querystring);
				if($query->num_rows()){
					if(substr_count($sokid, ',') > 0){
						return $query->result();
					}else{
						return $query->row();
					}
					
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

	public function SOKdetail($sokid){
		if(!empty($sokid)){
			$tbl1 = $this->db->dbprefix.'sok';
			$tbl2 = $this->db->dbprefix.'customertype`';
			$tbl3 = $this->db->dbprefix.'persincharge';
			$tbl4 = $this->db->dbprefix.'zones';
			$tbl5 = $this->db->dbprefix.'sokproduct';
			$tbl6 = $this->db->dbprefix.'sokmeta';
			$tbl7 = $this->db->dbprefix.'producttype';
			$tbl8 = $this->db->dbprefix.'applicationtype';

			$query = $this->db->select("$tbl1.*,$tbl2.name AS customertypename,$tbl3.name AS personinchname,$tbl4.name AS zonename,$tbl7.name AS producttypename,$tbl8.name AS applicationname")
							  ->from($tbl1)
							  ->join("$tbl2","$tbl1.customertypeid = $tbl2.typenum")
							  ->join("$tbl3","$tbl1.personinchid = $tbl3.id")
							  ->join("$tbl4","$tbl1.zoneid = $tbl4.id")
							  ->join("$tbl7","$tbl1.producttypeid = $tbl7.id")
							  ->join("$tbl8","$tbl1.applicationtypeid = $tbl8.id")
							  ->where("$tbl1.id",$sokid)
							  ->get();

			if($query->num_rows()){
				$sokdata = $query->row_array();
				//get all meta and item data from other table
				$query_items = $this->db->where('sokid',$sokid)
										->get('sokproduct');
				if($query_items->num_rows()){
					$sokdata['sokitems'] = $query_items->result();

				}
				//get meta
				$metasourcekey = 'sokmeta';
				$allmetakeys = $this->getAllsokmetainoneshot($sokid,$metasourcekey);
				if(!empty($allmetakeys)){
					$sokdata['sokmeta'] = $allmetakeys;
				}

				return (object) $sokdata;

			}else{
				return false;
			}				  
		}else{
			return false;
		}
	}
	
/*	public function SOKdetail2($sokid){
		if(!empty($sokid)){
			$tbl1 = $this->db->dbprefix.'sok';
			$tbl2 = $this->db->dbprefix.'customertype`';
			$tbl3 = $this->db->dbprefix.'persincharge';
			$tbl4 = $this->db->dbprefix.'zones';
			$tbl5 = $this->db->dbprefix.'sokproduct';
			$tbl6 = $this->db->dbprefix.'sokmeta';
			$tbl7 = $this->db->dbprefix.'producttype';
			$tbl8 = $this->db->dbprefix.'applicationtype';

			$query = $this->db->select("$tbl1.*")
							  ->from($tbl1)
							  ->join("$tbl2","$tbl1.customertypeid = $tbl2.typenum")
							  ->join("$tbl3","$tbl1.personinchid = $tbl3.id")
							  ->join("$tbl4","$tbl1.zoneid = $tbl4.id")
							  ->join("$tbl7","$tbl1.producttypeid = $tbl7.id")
							  ->join("$tbl8","$tbl1.applicationtypeid = $tbl8.id")
							  ->where("$tbl1.id",$sokid)
							  ->get();

			if($query->num_rows()){
				$sokdata = $query->row_array();
				//get all meta and item data from other table
				$query_items = $this->db->where('sokid',$sokid)
										->get('sokproduct');
				if($query_items->num_rows()){
					$sokdata['sokitems'] = $query_items->result();

				}
				//get meta
				$metasourcekey = 'sokmeta';
				$allmetakeys = $this->getAllsokmetainoneshot($sokid,$metasourcekey);
				if(!empty($allmetakeys)){
					$sokdata['sokmeta'] = $allmetakeys;
				}

				return (object) $sokdata;

			}else{
				return false;
			}				  
		}else{
			return false;
		}
	}*/


}