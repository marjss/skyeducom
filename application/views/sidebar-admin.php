<!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url('assets/dist/img/user2-160x160.jpg')?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php if($userinfo = $this->session->userdata('userinfo')){?> 
              <span class="hidden-xs"><?=ucwords($userinfo['fullname'])?></span>
              <?php } ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?=base_url()?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Home page</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('forms/viewSlider')?>"><i class="fa fa-circle-o"></i> Slider</a></li>
            <li><a href="<?=base_url('forms/viewServiceBox')?>"><i class="fa fa-circle-o"></i> Service</a></li>
            <li><a href="<?=base_url('forms/viewBasic')?>"><i class="fa fa-circle-o"></i> Basic Info</a></li>
          </ul>
        </li>
        
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>