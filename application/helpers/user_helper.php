<?php
defined('BASEPATH') OR exit('No direct script access allowed');
function encryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp89ZAW';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
}

function decryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp89ZAW';
    $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
    return( $qDecoded );
}

// function printtreewithnode($data = array()){
// 	if(!empty($data)){
// 		foreach($data as $agentrecord){
// 			if(array_key_exists('child',$agentrecord)){
// 				echo '<ul>';
// 				foreach($agentrecord['child'] as $key => $val){
// 					$valsize = sizeof($val);
// 					if($valsize > 0){
// 						echo '<li>'.$key;
// 						printtreewithnode($val);
// 						echo '</li>';
// 					}else{
// 					echo '<li>'.$key.'</li>';	
// 					}
					
// 				}
// 				echo '</ul>';
// 			}
// 		}
// 	}else{
// 		return false;
// 	}
// }
#########################################***************************
// function printtreewithnode($data = array(),$arrayOfObjects){
// 	if(!empty($data)){
// 		foreach($data as $agentrecord){
// 			if(array_key_exists('child',$agentrecord)){
// 				echo '<li>';
// 				foreach($agentrecord['child'] as $key => $val){
// 					$valsize = sizeof($val);
// 					//get detail about user here
// 					$neededObject = array_filter(
// 				    $arrayOfObjects, function ($e) use (&$key) {
// 				    	return $e->userid == $key;
// 				    }
// 						);
// 					$neededObject = array_values($neededObject);
// 					$userInformation = $neededObject[0];
// 					$agentfullname = $userInformation->userfullname;
// 					$agentjoindate = $userInformation->joindate;
// 					$agentitempurchase = $userInformation->pcode;
// 					$agentcaping = $userInformation->caping;
// 					$joiningside = ($userInformation->joiningside == 1)?'Left Side':'Right Side';

// 					if($valsize > 0){
// 						echo '<li class="treeview"><a href="#"><i class="fa fa-users"></i>';
// 						echo $agentfullname.', Join On '.$agentjoindate.', Caping '.$agentcaping.' Join Side '.$joiningside.'('.$valsize.')'; 
// 						echo '<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>';
// 		                echo '<ul class="treeview-menu">';
// 		              printtreewithnode($val,$arrayOfObjects);
// 		              echo '</ul></li>';
// 					}else{
// 					echo '<li><a href="#"><i class="fa fa-user"></i> ';
// 					echo $agentfullname.', Join On '.$agentjoindate.', Caping '.$agentcaping.', Join Side '.$joiningside;
// 					echo '</a></li>';	
// 					}
					
// 				}
// 				echo '</li>';
// 			}
// 		}
// 	}else{
// 		return false;
// 	}
// }
############################################***********************************
function findKey($array,$searchcount = 0)
{	

    foreach ($array as $agentrecord) {
    	if(array_key_exists('child',$agentrecord)){
			foreach($agentrecord['child'] as $key => $val){
				if(is_array($val)){
				$searchcount += sizeof($val);	
				}
				
				if(sizeof($val) > 0){
					findKey($val,$searchcount);
				}
						
			}
		}
    }

    return $searchcount;
}
function printtreewithnode($data = array(),$arrayOfObjects){
	if(!empty($data)){
		$childcount = findKey($data,0);
		foreach($data as $agentrecord){
			if(array_key_exists('child',$agentrecord)){
				//echo '<li>';
				//$i = 0;
				foreach($agentrecord['child'] as $key => $val){
					$valsize = sizeof($val);
					//get detail about user here
					$neededObject = array_filter(
				    $arrayOfObjects, function ($e) use (&$key) {
				    	return $e->userid == $key;
				    }
						);
					$neededObject = array_values($neededObject);
					$userInformation = $neededObject[0];
					$agentfullname = $userInformation->userfullname;
					$agentcode = $userInformation->username;
					$agentjoindate = $userInformation->joindate;
					$agentitempurchase = $userInformation->pcode;
					$agentcaping = $userInformation->caping;
					$joiningside = ($userInformation->joiningside == 1)?'Left Side':'Right Side';
					$sideclass = ($userInformation->joiningside == 1)?'leftside':'rightside';
					if($valsize > 0){
						echo '<li class="'.$sideclass.'"><a href="'.base_url('user/nettree/'.$key).'"><i class="fa fa-user"></i> '.$agentfullname.'</a>'.$agentcode;
						//echo $agentfullname.', Join On '.$agentjoindate.', Caping '.$agentcaping.' Join Side '.$joiningside.'('.$valsize.')'; 
		                echo '<ul>';
		                	printtreewithnode($val,$arrayOfObjects);
		              
		              echo '</ul></li>';
					}else{
					echo '<li class="'.$sideclass.'"><a href="'.base_url('user/nettree/'.$key).'"><i class="fa fa-user"></i> '.$agentfullname;
					//echo $agentfullname.', Join On '.$agentjoindate.', Caping '.$agentcaping.', Join Side '.$joiningside;
					echo '</a>'.$agentcode.'</li>';	
					}
					
				}
				//echo '</li>';
			}
		}
	}else{
		return false;
	}
}



function getObjelement($arrayOfObjects,$element,$searchedValue){
	$neededObject = array_filter(
    $arrayOfObjects, function ($e) use (&$searchedValue,&$element) {
    	return $e->$element == $searchedValue;
    }
		);
	$neededObject = array_values($neededObject);
	return $neededObject[0];
}

function countjoinside($data){
	$leftside = $rightside = $neutral = $count = [];
	foreach($data as $record){
		if($record->joiningside == 1){
			$leftside[] = $record->userid;
		}else if($record->joiningside == 2){
			$rightside[] = $record->userid;
		}else{
			$neutral[] = $record->userid;
		}
	}
	$count['leftcount'] = sizeof($leftside);
	$count['rightcount'] = sizeof($rightside);
	$count['neutral'] = sizeof($neutral);
	return (object) $count;
}

// function calculatejoining($data = array(),$arrayOfObjects,$fcall = true){
// 	if(!empty($data)){
// 		if($fcall){
// 			$leftside = $rightside = $neutral = $direct = $indirect = $diectleft = $directright = $indirectleft = $indirectright = $totaljoininfo = $totaluserid = [];
// 		}
		
// 		foreach($data as $agentrecord){
// 			if(array_key_exists('child',$agentrecord)){
// 				$directnode = 0;
// 				foreach($agentrecord['child'] as $key => $val){
// 					$valsize = sizeof($val);
// 					$totaluserid[] = $key;
// 					//get detail about user here
// 					$neededObject = array_filter(
// 				    $arrayOfObjects, function ($e) use (&$key) {
// 				    	return $e->userid == $key;
// 				    }
// 						);
// 					$neededObject = array_values($neededObject);
// 					$userInformation = $neededObject[0];
// 					if($directnode == 0){
// 						$direct[] = $key;
// 						if($userInformation->joiningside == 1){
// 							$diectleft[] = $key;
// 						}else{
// 							$directright[] = $key;
// 						}	 
// 					}else{
// 						$indirect[] = $key;
// 						if($userInformation->joiningside == 1){
// 							$indirectleft[] = $key;
// 						}else{
// 							$indirectright[] = $key;
// 						}
// 					}
						
// 		              calculatejoining($val,$arrayOfObjects,false);
					
					
// 				$directnode++;}

// 			}
// 		}
// 		$leftside = sizeof($diectleft) + sizeof($indirectleft);
// 		$rightside = sizeof($directright) + sizeof($indirectright);
// 		$totaljoininfo['leftside'] = $leftside;
// 		$totaljoininfo['rightside'] = $rightside;
// 		$totaljoininfo['diectleft'] = $diectleft;
// 		$totaljoininfo['directright'] = $directright;
// 		$totaljoininfo['indirectleft'] = $indirectleft;
// 		$totaljoininfo['indirectright'] = $indirectright;
// 		$totaljoininfo['direct'] = $direct;
// 		$totaljoininfo['indirect'] = $indirect;
// 		$totaljoininfo['totaluserid'] = $totaluserid;
// 		return $totaljoininfo;

// 	}else{
// 		return false;
// 	}
// }