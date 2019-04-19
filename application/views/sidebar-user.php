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
            <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('user/enroll')?>"><i class="fa fa-circle-o"></i> Create User</a></li>
            <li><a href="<?=base_url('listing/Users')?>"><i class="fa fa-circle-o"></i> List User</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Masters</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('masters/Cdetail')?>"><i class="fa fa-circle-o"></i> Append Customer</a></li>
            <li><a href="<?=base_url('masters/Product')?>"><i class="fa fa-circle-o"></i> Append Product</a></li>
            <li><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i> Append Customer Type</a></li>
            <li><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i> Append Zones</a></li>
            <li><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i> Apppend Application Type</a></li>
            <li><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i> Append Person Incharge</a></li>
            <li><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i> Append Product Type</a></li>
            <li><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i> Append Inco Term</a></li>
            <li><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i> Append Currency</a></li>
            <li><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i> Append Production Centers</a></li>
            <li><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i> Append Internal Offices</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>View</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i> Customers</a></li>
            <li><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i> Products</a></li>
            <li><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i> Customer Types</a></li>
            <li><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i> Zones</a></li>
            <li><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i> Application Types</a></li>
            <li><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i> Person Incharge</a></li>
            <li><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i> Product Type</a></li>
            <li><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i> Inco Term</a></li>
            <li><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i> Currency Exchange</a></li>
            <li><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i> Production Centers</a></li>
            <li><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i> Internal Offices</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Process</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i> Create SOK</a></li>
            <li><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i> Invoice/Performa Invoice</a></li>
            <li><a href="<?=base_url()?>"><i class="fa fa-circle-o"></i> Order Confirmation</a></li>
          </ul>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>