<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="continer">
        <div class="row">
          <div class="col-lg-10 col-lg-offset-2 col-lg-pull-1">
            <!-- Default box -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Update Basic Information</h3>
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
            <?=form_open_multipart('forms/viewBasic',array('name' => 'servicebox','id' => 'servicebox','method'=>'post'))?>
              <div class="box-body">
               
                <div class="form-group col-sm-6">
                  <?=form_label('Institute Name','institute_name');?>
                  <?=form_input(array('name' => 'institute_name','id' => 'institute_name','class' => 'form-control','value'=>(isset($institute_name) ? $institute_name:'')));?>
                  <?=form_error('institute_name','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>
                <div class="form-group col-sm-6">
                  <?=form_label('Address Line one','address_line_one');?>
                  <?=form_input(array('name' => 'address_line_one','id' => 'address_line_one','class' => 'form-control','value'=>(isset($address_line_one) ? $address_line_one:'')));?>
                  <?=form_error('address_line_one','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>
                <div class="form-group col-sm-6">
                  <?=form_label('Address Line two','address_line_two');?>
                  <?=form_input(array('name' => 'address_line_two','id' => 'address_line_two','class' => 'form-control','value'=>(isset($address_line_two) ? $address_line_two:'')));?>
                  <?=form_error('address_line_two','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>
                <div class="form-group col-sm-6">
                  <?=form_label('Address Line three','address_line_three');?>
                  <?=form_input(array('name' => 'address_line_three','id' => 'address_line_three','class' => 'form-control','value'=>(isset($address_line_three) ? $address_line_three:'')));?>
                  <?=form_error('address_line_three','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>
                <div class="form-group col-sm-6">
                  <?=form_label('Primary Number','phone_one');?>
                  <?=form_input(array('name' => 'phone_one','id' => 'phone_one','type'=>'number','class' => 'form-control','value'=>(isset($phone_one) ? $phone_one:'')));?>
                  <?=form_error('phone_one','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>
                <div class="form-group col-sm-6">
                  <?=form_label('Secondary Number','phone_two');?>
                  <?=form_input(array('name' => 'phone_two','id' => 'phone_two','type'=>'number','class' => 'form-control','value'=>(isset($phone_two) ? $phone_two:'')));?>
                  <?=form_error('phone_two','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>
                <div class="form-group col-sm-6">
                  <?=form_label('Primary Email','email_one');?>
                  <?=form_input(array('name' => 'email_one','id' => 'email_one','type'=>'email','class' => 'form-control','value'=>(isset($email_one) ? $email_one:'')));?>
                  <?=form_error('email_one','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>
                <div class="form-group col-sm-6">
                  <?=form_label('Secondary Email','email_two');?>
                  <?=form_input(array('name' => 'email_two','id' => 'email_two','type'=>'email','class' => 'form-control','value'=>(isset($email_two) ? $email_two:'')));?>
                  <?=form_error('email_two','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>
                <div class="form-group col-sm-6">
                  <?=form_label('Contact Person Name','contact_person_one');?>
                  <?=form_input(array('name' => 'contact_person_one','id' => 'contact_person_one','class' => 'form-control','value'=>(isset($contact_person_one) ? $contact_person_one:'')));?>
                  <?=form_error('contact_person_one','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>
                

                <div class="form-group col-sm-12">
                  <?=form_label('About Us','about_us');?>
                  <?=form_textarea(array('name' => 'about_us','id' => 'about_us','class' => 'form-control','value'=>(isset($about_us) ? $about_us:'')));?>
                  <?=form_error('about_us','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>
            </div>
              <!-- /.box-body -->

              <div class="box-footer">
                
                <?=form_submit(array('name' => 'submit','class' => 'btn btn-primary','type' =>'submit','value' => 'Submit'))?>
                <?=form_reset(array('name' => 'reset','class' => 'btn btn-default','type' =>'reset','value' => 'Reset'))?>
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