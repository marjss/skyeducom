  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?=base_url('dashboard')?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
       
        <!-- <li>
          <a href="<?=base_url('client/enroll')?>">
            <i class="fa fa-th"></i> <span>Enroll Client</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">Hot</small>
            </span>
          </a>
        </li> -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Enroll</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('client')?>"><i class="fa fa-circle-o"></i> Member</a></li>
            <li><a href="<?=base_url('committee')?>"><i class="fa fa-circle-o"></i> Committee</a></li>
            <!-- <li><a href="<?=base_url('company')?>"><i class="fa fa-circle-o"></i> Company</a></li> -->
            
          </ul>
        </li>
        <li><a href="<?=base_url('committee/assignMember')?>"><i class="fa fa-book"></i> <span>Add Members</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i>
            <span>Listing</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('listing/members')?>"><i class="fa fa-circle-o"></i> Member</a></li>
            <li><a href="<?=base_url('listing/committee')?>"><i class="fa fa-circle-o"></i> Committee</a></li>
            <li><a href="<?=base_url('listing/payments')?>"><i class="fa fa-circle-o"></i> Payments</a></li>
            <li><a href="<?=base_url('listing/winners')?>"><i class="fa fa-circle-o"></i> Prize Winners</a></li>
            
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i>
            <span>Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('report')?>"><i class="fa fa-circle-o"></i> Today Collection</a></li>
            <li><a href="<?=base_url('report/committeecol')?>"><i class="fa fa-circle-o"></i> Committee Collection</a></li>
            <li><a href="<?=base_url('report/monthlycol')?>"><i class="fa fa-circle-o"></i> Monthly Collection</a></li>
            
          </ul>
        </li>
        <li><a href="<?=base_url('payment')?>"><i class="fa fa-gear"></i></i> <span>Payment</span></a></li>
         <li><a href="<?=base_url('payment/prize')?>"><i class="fa fa-gear"></i></i> <span>Prize Entry</span></a></li>

       <!--  <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>