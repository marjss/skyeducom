<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="continer">
        <div class="row">
          <div class="col-lg-10 col-lg-offset-2 col-lg-pull-1">
            <!-- Default box -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Create User</h3>
              </div>
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
            <?=form_open_multipart('user/process',array('name' => 'createloginuser','id' => 'createloginuser'))?>
              <div class="box-body">
                <div class="form-group col-sm-6">
                  <?=form_label('Username','loginusername');?>
                  <?=form_input(array('name' => 'loginusername','id' => 'loginusername','type' => 'text','class' => 'form-control','placeholder' => 'Enter Username','value' => set_value('loginusername',!empty($usermeta->loginusername)?$usermeta->loginusername:'')))?>
                  <?=form_error('loginusername','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>
                <div class="form-group col-sm-6">
                  <?=form_label('Password','loginpassword');?>
                  <?=form_input(array('name' => 'loginpassword','id' => 'loginpassword','type' => 'password','class' => 'form-control','placeholder' => 'Enter Password','value' => set_value('loginpassword',!empty($usermeta->loginpassword)?$usermeta->loginpassword:'')))?>
                  <?=form_error('loginpassword','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>
                <div class="form-group col-sm-6">
                  <?=form_label('Select Type','loginusertype');?>
                  <?php $usertype = ['' => '---- Select Type ----','U'=>'Moderator','C' => 'User'];?>
                  <?=form_dropdown('loginusertype',$usertype,set_value('loginusertype',''),'class="form-control" id="loginusertype"'); ?>
                  <?=form_error('loginusertype','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>

                <div class="form-group col-sm-6">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <?=form_hidden('formname','createloginuser')?>
                <?=form_button(array('name' => 'submit','class' => 'btn btn-primary','type' =>'submit','content' => 'Submit'))?>
                <?=form_button(array('name' => 'reset','class' => 'btn btn-default','type' =>'reset','content' => 'Reset'))?>
              </div>
            <?=form_close();?>
              <!-- /.box-footer-->
            </div>
            <!-- /.box -->
          </div>
        </div>
      </div>
      
      <?php 
      //echo '<pre>';print_r($this->session->userdata());echo '</pre>';
      ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->