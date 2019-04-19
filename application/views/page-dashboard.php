<?php if(!empty($usertype)){
      if($usertype === 'A'){
      	$this->view('dashboard-admin');
      }else if($usertype === 'U'){
      	$this->view('dashboard-user');
      }
    } ?>