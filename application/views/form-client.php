<!--Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Make Member registration Here
        <!-- <small>it all starts here</small> -->
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="continer">
        <div class="row">
          <div class="col-lg-10 col-lg-offset-2 col-lg-pull-1">
             <!-- Default box -->
      <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Fill Member Detail</h3>
            </div>
            <!-- /.box-header -->
            <?php //echo '<pre>';print_r($clientdata);echo '</pre>'; ?>
            <?php if($success = $this->session->flashdata('success')){?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                <?=$success?>
              </div>
            <?php }else if($error = $this->session->flashdata('error')){?> 
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Fail!</h4>
               <?=$error?>
              </div>
            <?php } ?>
            <!-- form start -->
            <?=form_open_multipart('client/process',array('name' => 'memberregistration','id' => 'memberregistration'))?>
              <div class="box-body">
                
                <div class="form-group col-sm-6">
                  <?=form_label('Name','membername');?>
                  <?=form_input(array('name' => 'membername','id' => 'membername','type' => 'text','class' => 'form-control','placeholder' => 'Enter Name','value' => set_value('membername',!empty($clientdata->membername)?$clientdata->membername:'')))?>
                  <?=form_error('membername','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>
                <div class="form-group col-sm-4">
                  <?=form_label('Gender','membergender');?>
                  <?php if(!empty($editmode)){
                      if(!empty($clientdata->membergender)){
                      $gender = !empty($clientdata->membergender)?$clientdata->membergender:'M';
                      }else{
                        $gender = '';
                      }
                  }else{
                    $gender = '';
                  } ?>
                  <?php 
                    $newtype = form_radio(array('name' => 'membergender','id' => 'gendermale','value' => 'M','checked' => ($gender === 'M')?true:false)).'Male';
                    $oldtype = form_radio(array('name' => 'membergender','id' => 'genderfemale','value' => 'F','checked' => ($gender === 'F')?true:false)).'Female';
                  ?>
                  <div class="radio">
                    <?=form_label($newtype);?>
                    <?=form_label($oldtype);?>
                  </div>
                  <?=form_error('membergender','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>
                <div class="form-group col-sm-6">
                  <?=form_label('Email','memberemail');?>
                  <?=form_input(array('name' => 'memberemail','id' => 'memberemail','type' => 'email','class' => 'form-control','placeholder' => 'Enter Client Email','value' => set_value('memberemail',!empty($clientdata->memberemail)?$clientdata->memberemail:'')))?>
                  <?=form_error('memberemail','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>
                <div class="form-group col-sm-6">
                  <?=form_label('Address','memberaddress');?>
                  <?=form_textarea(array('name' => 'memberaddress','id' => 'memberaddress','rows' => 1,'class' => 'form-control','placeholder' => 'Enter Address','value' => set_value('memberaddress',!empty($clientdata->memberaddress)?$clientdata->memberaddress:'')))?>
                  <?=form_error('memberaddress','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>
                <div class="form-group col-sm-6">
                  <?=form_label('City','membercity');?>
                  <?=form_input(array('name' => 'membercity','id' => 'membercity','type' => 'text','class' => 'form-control','placeholder' => 'Enter city','value' => set_value('membercity',!empty($clientdata->membercity)?$clientdata->membercity:'')))?>
                  <?=form_error('membercity','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>
                <div class="form-group col-sm-6">
                  <?=form_label('State','memberstate');?>
                  <?=form_dropdown('memberstate',$this->statename,set_value('memberstate',!empty($clientdata->memberstate)?$clientdata->memberstate:''),'class="form-control" id="memberstate"'); ?>
                  <?=form_error('memberstate','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>
                <div class="form-group col-sm-6">
                  <?=form_label('PIN Code','memberpin');?>
                  <?=form_input(array('name' => 'memberpin','id' => 'memberpin','type' => 'text','class' => 'form-control','placeholder' => 'Enter Address','value' => set_value('memberpin',!empty($clientdata->memberpin)?$clientdata->memberpin:'')))?>
                  <?=form_error('memberpin','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>
                <div class="form-group col-sm-6">
                  <?=form_label('Near By Landmark','memberlandmark');?>
                  <?=form_input(array('name' => 'memberlandmark','id' => 'memberlandmark','type' => 'text','class' => 'form-control','placeholder' => 'Enter Landmark','value' => set_value('memberlandmark',!empty($clientdata->memberlandmark)?$clientdata->memberlandmark:'')))?>
                  <?=form_error('memberlandmark','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>
                <div class="form-group col-sm-6">
                  <?=form_label('Contact Number','membercontact');?>
                  <?=form_input(array('name' => 'membercontact','id' => 'membercontact','type' => 'text','class' => 'form-control','placeholder' => 'Enter Contact Number','value' => set_value('membercontact',!empty($clientdata->membercontact)?$clientdata->membercontact:'')))?>
                  <?=form_error('membercontact','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>

                <div class="form-group col-sm-6">
                  <?=form_label('Alternate Contact Number','memberaltercontact');?>
                  <?=form_input(array('name' => 'memberaltercontact','id' => 'memberaltercontact','type' => 'text','class' => 'form-control','placeholder' => 'Enter Alternate Number','value' => set_value('memberaltercontact',!empty($clientdata->memberaltercontact)?$clientdata->memberaltercontact:'')))?>
                  <?=form_error('memberaltercontact','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>
                <div class="form-group col-sm-6">
                  <?=form_label('PAN Card','memberpannum');?>
                  <?=form_input(array('name' => 'memberpannum','id' => 'memberpannum','type' => 'text','class' => 'form-control','placeholder' => 'Enter PAN Number','value' => set_value('memberpannum',!empty($clientdata->memberpannum)?$clientdata->memberpannum:'')))?>
                  <?=form_error('memberpannum','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>
                <div class="form-group col-sm-6">
                  <?=form_label('UID Number/Aadhar Number','memberaadharnum');?>
                  <?=form_input(array('name' => 'memberaadharnum','id' => 'memberaadharnum','type' => 'text','class' => 'form-control','placeholder' => 'Enter Aadhar Number','value' => set_value('memberaadharnum',!empty($clientdata->memberaadharnum)?$clientdata->memberaadharnum:'')))?>
                  <?=form_error('memberaadharnum','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>
                <div class="form-group col-sm-6">
                  <?=form_label('Member Photo','memberphoto');?>
                  <?=form_upload(array('name' => 'memberphoto','id' => 'memberphoto','type' => 'text','class' => 'form-control'))?>
                  <?=form_error('memberphoto','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>
                <div class="form-group col-sm-6">
                  <?=form_label('Alternate Correspondance','memberalternatecorrespondance');?>
                  <?=form_textarea(array('name' => 'memberalternatecorrespondance','id' => 'memberalternatecorrespondance','rows' => 3,'class' => 'form-control','placeholder' => 'Enter Address with full detail','value' => set_value('memberalternatecorrespondance',!empty($clientdata->memberalternatecorrespondance)?$clientdata->memberalternatecorrespondance:'')))?>
                  <?=form_error('memberalternatecorrespondance','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>
                <?php if(!empty($clientdata->memberphoto)){
                  $filepath = 'upload/'.$clientdata->memberphoto;
                  if(file_exists($filepath)){
                    $imgsrc = '<img src="'.base_url($filepath).'" class="img-responsive" >';
                  }else{
                    $imgsrc = '';
                  }

                  ?>
                  <div class="form-group col-sm-6">
                    <?=$imgsrc?>
                  </div>
               <?php } ?>
               <?php if(!isset($editmode)){?>
               <div class="form-group col-sm-6">
                  <?=form_label('Select Committee','membercommittee');?>
                  <?php $cdata = ['' => '---- Select Committee ----'];
                  if(!empty($commt)){
                    foreach($commt as $committee){
                      $members = !empty($committee->membercount)?$committee->membercount:0;
                      $cdata[$committee->id] = $committee->name.'('.$committee->emipermem.' - '.@date('d M, Y',strtotime($committee->startdate)).') Members-'.$members;
                    }
                  }
                   ?>
                  
                  <?=form_dropdown('membercommittee',$cdata,set_value('membercommittee',!empty($clientdata->membercommittee)?$clientdata->membercommittee:''),'class="form-control" id="membercommittee"'); ?>
                  <?=form_error('membercommittee','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>
               <?php } ?>
                
                <div class="clearfix"></div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <?=form_hidden('formname','memberregistration')?>
                <?=!empty($editmode)?form_hidden('editmode',$editmode):''?>
                <?=form_button(array('name' => 'submit','class' => 'btn btn-primary','type' =>'submit','content' => 'Submit'))?>
                <?=form_button(array('name' => 'reset','class' => 'btn btn-default','type' =>'reset','content' => 'Reset'))?>
                <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
              </div>
            <?=form_close();?>
          </div>
      <!-- /.box -->

          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->