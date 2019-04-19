<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="continer">
        <div class="row">
          <div class="col-lg-10 col-lg-offset-2 col-lg-pull-1">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List Of Users Registered</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Type</th>
                  <th>Status</th>
                  <th>Register Date</th>
                </tr>
                </thead>
                <tbody>
                  <?php if(!empty($allusers)){
                    foreach($allusers as $user){?>
                    <tr>
                      <td><?=$user->username?></td>
                      <td><?=decryptIt($user->pass)?></td>
                      <td><?=$user->type?></td>
                      <td><?=($user->status == 1)?'<span class="label label-success">Active</span>':'<span class="label label-warning">Inactive</span>'?></td>
                      <td><?=@date('d-m-Y',strtotime($user->registerdate))?></td>
                    </tr>
                    <?php }
                  } ?>
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