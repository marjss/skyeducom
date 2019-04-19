<!--Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Make Committee Registration Here
        <!-- <small>it all starts here</small> -->
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="continer">
        <div class="row">
          <div class="col-lg-10 col-lg-offset-2 col-lg-pull-1">
             <!-- Default box -->
      <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Fill Committee Detail</h3>
            </div>
            <!-- /.box-header -->
            <?php //echo '<pre>';print_r($committeedata);echo '</pre>'; ?>
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
            <?=form_open_multipart('committee/process',array('name' => 'committeeregistration','id' => 'committeeregistration'))?>
              <div class="box-body">
                <div class="form-group col-sm-6">
                  <?=form_label('Committee Name','committeename');?>
                  <?=form_input(array('name' => 'committeename','id' => 'committeename','type' => 'text','class' => 'form-control','placeholder' => 'Enter Name','value' => set_value('committeename',!empty($committeedata->name)?$committeedata->name:'')))?>
                  <?=form_error('committeename','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>
                <div class="form-group col-sm-6">
                  <?=form_label('Per Member Installment','committeeemipermember');?>
                  <?=form_input(array('name' => 'committeeemipermember','id' => 'committeeemipermember','type' => 'text','class' => 'form-control','placeholder' => 'Enter Installment','value' => set_value('committeeemipermember',!empty($committeedata->emipermem)?$committeedata->emipermem:'')))?>
                  <?=form_error('committeeemipermember','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>
                <div class="form-group col-sm-6">
                  <?=form_label('Tenure(In Months)','committeetenure');?>
                  <?=form_input(array('name' => 'committeetenure','id' => 'committeetenure','type' => 'text','class' => 'form-control','placeholder' => 'Enter Tenure','value' => set_value('committeetenure',!empty($committeedata->tenure)?$committeedata->tenure:'')))?>
                  <?=form_error('committeetenure','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>
                <div class="form-group col-sm-6">
                  <?=form_label('Members Limit','committeememberslimit');?>
                  <?=form_input(array('name' => 'committeememberslimit','id' => 'committeememberslimit','type' => 'text','class' => 'form-control','placeholder' => 'Enter Total Amount','value' => set_value('committeememberslimit',!empty($committeedata->members)?$committeedata->members:'')))?>
                  <?=form_error('committeememberslimit','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>
                <div class="form-group col-sm-6">
                  <?=form_label('Monthly Installment','committeeemi');?>
                  <?=form_input(array('name' => 'committeeemi','id' => 'committeeemi','type' => 'text','class' => 'form-control','placeholder' => 'Enter Installment','value' => set_value('committeeemi',!empty($committeedata->emi)?$committeedata->emi:'')))?>
                  <?=form_error('committeeemi','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>
                <div class="form-group col-sm-6">
                  <?=form_label('Total Amount','committeetotalamt');?>
                  <?=form_input(array('name' => 'committeetotalamt','id' => 'committeetotalamt','type' => 'text','class' => 'form-control','placeholder' => 'Enter Total Amount','value' => set_value('committeetotalamt',!empty($committeedata->amt)?$committeedata->amt:'')))?>
                  <?=form_error('committeetotalamt','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>
                <div class="form-group col-sm-6">
                  <?=form_label('Start Date','committeestartdate');?>
                  <?=form_input(array('name' => 'committeestartdate','id' => 'committeestartdate','type' => 'text','class' => 'form-control purchdate','placeholder' => 'Enter Start Date','value' => set_value('committeestartdate',!empty($committeedata->startdate)?@date('d M, Y',strtotime($committeedata->startdate)):'')))?>
                  <?=form_error('committeestartdate','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>
                <div class="form-group col-sm-6">
                  <?=form_label('End Date','committeeenddate');?>
                  <?=form_input(array('name' => 'committeeenddate','id' => 'committeeenddate','type' => 'text','class' => 'form-control purchdate','placeholder' => 'End Date','value' => set_value('committeeenddate',!empty($committeedata->enddate)?@date('d M, Y',strtotime($committeedata->enddate)):'')))?>
                  <?=form_error('committeeenddate','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>
                <div class="form-group col-sm-6">
                  <?=form_label('Open Date/Time','committeeopendatetime');?>
                  <?=form_input(array('name' => 'committeeopendatetime','id' => 'committeeopendatetime','type' => 'text','class' => 'form-control pdate','placeholder' => 'Enter date/time','value' => set_value('committeeopendatetime',!empty($committeedata->opendate)?$committeedata->opendate:'')))?>
                  <?=form_error('committeeopendatetime','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>
                <div class="form-group col-sm-6">
                  <?=form_label('Payment Date','committeepaymentdate');?>
                  <?=form_input(array('name' => 'committeepaymentdate','id' => 'committeepaymentdate','type' => 'text','class' => 'form-control purchdate','placeholder' => 'Enter date','value' => set_value('committeepaymentdate',!empty($committeedata->paydate)?@date('d M, Y',strtotime($committeedata->paydate)):'')))?>
                  <?=form_error('committeepaymentdate','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>
                <div class="form-group col-sm-6">
                  <?=form_label('Late Payment Fine/Day','committeelatefine');?>
                  <?=form_input(array('name' => 'committeelatefine','id' => 'committeelatefine','type' => 'text','class' => 'form-control','placeholder' => 'Enter Amount','value' => set_value('committeelatefine',!empty($committeedata->panelty)?$committeedata->panelty:'')))?>
                  <?=form_error('committeelatefine','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>
                <div class="form-group col-sm-6">
                  <?=form_label('Lucky Draw Amount','committeeluckdraw');?>
                  <?=form_input(array('name' => 'committeeluckdraw','id' => 'committeeluckdraw','type' => 'text','class' => 'form-control','placeholder' => 'Enter Amount','value' => set_value('committeeluckdraw',!empty($committeedata->bonusamt)?$committeedata->bonusamt:'')))?>
                  <?=form_error('committeeluckdraw','<div class="has-error"><span class="help-block">','</span></div>');?>
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <?=!empty($editmode)?form_hidden('formname','editcommitteeregistration'):form_hidden('formname','committeeregistration')?>
                <?=!empty($editmode)?form_hidden('editmode',$editmode):''?>
                <?=form_button(array('name' => 'submit','class' => 'btn btn-primary','type' =>'submit','content' => 'Submit'))?>
                <?=form_button(array('name' => 'reset','class' => 'btn btn-default','type' =>'reset','content' => 'Reset'))?>
                <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
              </div>
            <?=form_close();?>
          </div>
      <!-- /.box -->

          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->