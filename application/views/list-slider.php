<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="continer">
        <div class="row">
          <div class="col-lg-10 col-lg-offset-2 col-lg-pull-1">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List Of Sliders</h3>
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
              <div class="row col-sm-12 " style="margin-bottom: 10px;" >
                  <button onclick="location.href='<?php echo base_url('forms/createSlide');?>';" type="button" class="btn btn-primary pull-right">Create Slide</button>
                </div>
              <br>
            <!-- /.box-header -->
            <div class="box-body">
                
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Image</th>
                  <th>Head4</th>
                  <th>Head2</th>
                  <th>link</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                   
                <?php foreach ($slider as $slide) { ?>
                     <tr><?php $id = $slide['id']; ?>
                        <td><?=$slide['id'];?></td>
                        <td><img src="<?=base_url().'slider_images/'.$slide['image_link'];?>" height="50px" width="100px"></td>
                        <td><?=$slide['h_four'];?></td>
                        <td><?=$slide['h_two'];?></td>
                        <td><?=$slide['link'];?></td>
                        <td>
                            <!--<a href="<?php // echo base_url('forms/editSlide/'.$id);?>"><i class="fa fa-edit"></i></a>-->
                            <a href="<?php echo base_url('forms/deleteSlide/'.$id);?>"><i class="fa fa-trash"></i></a>
                        </td>
                         </tr>
              <?php }?>
                    
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
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