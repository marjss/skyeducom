<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="continer">
        <div class="row">
          <div class="col-lg-10 col-lg-offset-2 col-lg-pull-1">
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
          </div>
        </div>
        <div class="row">
          <div class="col-lg-10 col-lg-offset-2 col-lg-pull-1">
            <!-- Default box -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Upload Application Type CSV</h3>&nbsp;&nbsp;&nbsp;(<small><a href="<?=base_url('assets/sample/application_type.csv')?>">Download Sample</a></small>)
              </div>
                 <!-- form start -->
            <?=form_open_multipart('masters/process',array('name' => 'createapplicationtypebycsv','id' => 'createapplicationtypebycsv'))?>
              <div class="box-body">
                <div class="form-group col-sm-6">
                  <?=form_label('Upload CSV','createapplicationtypecsv');?>
                  <?=form_upload(array('name' => 'createapplicationtypecsv','id' => 'createapplicationtypecsv','type' => 'text','class' => 'form-control'))?>
                  <?=form_error('createapplicationtypecsv','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>

                <div class="form-group col-sm-6">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <?=form_hidden('formname','createapplicationtypebycsv')?>
                <?=form_button(array('name' => 'submit','class' => 'btn btn-primary','type' =>'submit','content' => 'Submit'))?>
                <?=form_button(array('name' => 'reset','class' => 'btn btn-default','type' =>'reset','content' => 'Reset'))?>
              </div>
            <?=form_close();?>
              <!-- /.box-footer-->
            </div>
            <!-- /.box -->
          </div>
        </div>
        <div class="row">
          <div class="col-lg-10 col-lg-offset-2 col-lg-pull-1">
            <!-- Default box -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Fill Up Application Type Detail</h3>
              </div>
                 <!-- form start -->
            <?=form_open_multipart('masters/process',array('name' => 'createapplicationtype','id' => 'createapplicationtype'))?>
              <div class="box-body">
                <div class="form-group col-sm-6">
                  <?=form_label('Divison','applicationtypedivison');?>
                  <?=form_input(array('name' => 'applicationtypedivison','id' => 'applicationtypedivison','type' => 'text','class' => 'form-control','placeholder' => 'Enter Name','value' => set_value('applicationtypedivison',!empty($usermeta->applicationtypedivison)?$usermeta->applicationtypedivison:'')))?>
                  <?=form_error('applicationtypedivison','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>
                <div class="form-group col-sm-6">
                  <?=form_label('SBF','applicationtypesbf');?>
                  <?=form_input(array('name' => 'applicationtypesbf','id' => 'applicationtypesbf','type' => 'text','class' => 'form-control','placeholder' => 'Enter Name','value' => set_value('applicationtypesbf',!empty($usermeta->applicationtypesbf)?$usermeta->applicationtypesbf:'')))?>
                  <?=form_error('applicationtypesbf','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>

                <div class="form-group col-sm-6">
                  <?=form_label('Application Name','applicationtypename');?>
                  <?=form_input(array('name' => 'applicationtypename','id' => 'applicationtypename','type' => 'text','class' => 'form-control','placeholder' => 'Enter Name','value' => set_value('applicationtypename',!empty($usermeta->applicationtypename)?$usermeta->applicationtypename:'')))?>
                  <?=form_error('applicationtypename','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>
                <div class="form-group col-sm-6">
                </div>

                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <?=form_hidden('formname','createapplicationtype')?>
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