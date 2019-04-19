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
            <?=form_open_multipart('forms/createSlide',array('name' => 'sliderform','id' => 'sliderform','method'=>'post'))?>
              <div class="box-body">
                <div class="form-group col-sm-6">
                  <?=form_label('Image (1920x500)','image');?>
                  <?=form_upload(array('name' => 'image[]','id' => 'image','class' => 'form-control'));?>
                  <?=form_error('Image','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>
                <div class="form-group col-sm-6">
                  <?=form_label('Heading 4','h_four');?>
                  <?=form_input(array('name' => 'h_four','id' => 'h_four','class' => 'form-control','value'=>(isset($h_four) ? $h_four:'')));?>
                  <?=form_error('h_four','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>
                <div class="form-group col-sm-6">
                  <?=form_label('Heading 2','h_two');?>
                  <?=form_input(array('name' => 'h_two','id' => 'h_two','class' => 'form-control','value'=>(isset($h_two) ? $h_two:'')));?>
                  <?=form_error('h_two','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>
                <div class="form-group col-sm-12">
                  <?=form_label('Description','description');?>
                  <?=form_textarea(array('name' => 'description','id' => 'description','class' => 'form-control','value'=>(isset($description) ? $description:'')));?>
                  <?=form_error('description','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>
                  <div class="form-group col-sm-6">
                  <?=form_label('Link','link');?>
                  <?=form_input(array('name' => 'link','id' => 'link','class' => 'form-control','value'=>(isset($link) ? $link:'')));?>
                  <?=form_error('link','<div class="has-error"><span class="help-block">','</span></div>');?>
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