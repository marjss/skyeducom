<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="continer">
        <div class="row">
          <div class="col-lg-10 col-lg-offset-2 col-lg-pull-1">
            <!-- Default box -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title"><?php if(isset($id)){echo "Update Slider";} else {echo "Create Slider"; } ?></h3>
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
            <?=form_open_multipart('forms/createServicebox',array('name' => 'servicebox','id' => 'servicebox','method'=>'post'))?>
              <div class="box-body">
               
                <div class="form-group col-sm-6">
                  <?=form_label('Heading','box_head');?>
                  <?=form_input(array('name' => 'box_head','id' => 'box_head','class' => 'form-control','value'=>(isset($box_head) ? $box_head:'')));?>
                  <?=form_error('box_head','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>

                <div class="form-group col-sm-12">
                  <?=form_label('Description','box_description');?>
                  <?=form_textarea(array('name' => 'box_description','id' => 'description','class' => 'form-control','value'=>(isset($box_description) ? $box_description:'')));?>
                  <?=form_error('box_description','<div class="has-error"><span class="help-block">','</span></div>');?>
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