  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="continer">
        <div class="row">
          <div class="col-lg-10 col-lg-offset-2 col-lg-pull-1">
            <!-- Default box -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Create Form</h3>
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
            <?=form_open_multipart('forms/createSlider',array('name' => 'sliderform','id' => 'sliderform'))?>
              <div class="box-body">
<!--                <div class="form-group col-sm-6">
                  <?=form_label('Image','image');?>
                  <?=form_browse(array('name' => 'image','id' => 'image','type' => 'file','class' => 'form-control','placeholder' => 'Enter Form Name','value' => set_value('FormName',!empty($usermeta->loginusername)?$usermeta->loginusername:'')))?>
                  <?=form_error('Image','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>-->
<!--                <div class="form-group col-sm-6">
                    <?=form_label('&nbsp','');?>
                    <div class="form-group col-sm-12">
                  <?=form_button(array('name' => 'add','class' => 'btn btn-primary additem','type' =>'button','content' => 'Add Element'))?>
                    </div>
                </div>-->
                  <div class="form-container" id="fcontainer"></div>

                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                
                <?=form_button(array('name' => 'submit','class' => 'btn btn-primary','type' =>'submit','content' => 'Submit'))?>
                <?=form_button(array('name' => 'reset','class' => 'btn btn-default','type' =>'reset','content' => 'Reset'))?>
              </div>
              
            <?=form_close();?>
<!--              <div class="form-group col-sm-6" style="display:none;">
                  <?=form_label('Select Type','fieldType');?>
                  <?=form_dropdown('fieldType',$fieldtype,set_value('fieldType',''),'class="form-control" id="fieldType"'); ?>
                  <?=form_error('fieldType','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>-->
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