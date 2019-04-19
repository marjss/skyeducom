<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; <?=@date('Y')?> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>-->
<script src="<?=base_url('assets/bower_components/jquery/dist/jquery.min.js')?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<!-- Select2 -->
<script src="<?=base_url('assets/bower_components/select2/dist/js/select2.full.min.js')?>"></script>
<!-- bootstrap datepicker -->
<script src="<?=base_url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')?>"></script>
<!-- typeahead -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="<?=base_url('assets/plugins/typehead/js/jquery.typeahead.js')?>"></script>

<!-- DataTables -->
<script src="<?=base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js')?>"></script>
<script src="<?=base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')?>"></script>
<!-- SlimScroll -->
<script src="<?=base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')?>"></script>
<!-- print js -->
<script src="<?=base_url('assets/dist/js/jQuery.print.js')?>"></script>
<!-- FastClick -->
<script src="<?=base_url('assets/bower_components/fastclick/lib/fastclick.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('assets/dist/js/adminlte.min.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url('assets/dist/js/demo.js')?>"></script>

  <script src="http://formbuilder.online/assets/js/form-builder.min.js"></script>
  <script src="http://formbuilder.online/assets/js/form-render.min.js"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree();
    $('.select2').select2();
    $('#example1').DataTable();
    /////////// printing script
      

    $('.Datepicker').datepicker({
      autoclose: true,
      todayHighlight: true,
      format:'dd-mm-yyyy',
    })
    //sok product table
    $('button[data-action="remove"]').hide();
    
    

  })
</script>
 <script>
 $(document).ready(function(){
     
     var options = {
          onSave: function(formData) {
//              console.log(formData);
//          toggleEdit();
//          $('.render-wrap').formRender({formData});
//          window.sessionStorage.setItem('formData', JSON.stringify(formData));
        },
      disableFields: ['autocomplete','hidden','file']
    };
        var data = '';        
        var fbEditor = document.getElementById('fcontainer');

        var formBuilder = $(fbEditor).formBuilder();
        
      $("#buildform").on('submit',function(e){
          
          
             var data = formBuilder.actions.getData('json', true);
               $('<input />').attr('type', 'hidden')
          .attr('name', "data")
          .attr('value', data)
          .appendTo(this);
      return true;
           
       
      })
      <?php
      if(isset($form)){  ?>
    var fview = JSON.stringify(<?=$form?>);
  const escapeEl = document.createElement("textarea");
  const code = document.getElementById("fview");
  const formData =fview;
  const addLineBreaks = html => html.replace(new RegExp("><", "g"), ">\n<");
  const $markup = $("<div/>");
  $markup.formRender({formData});
  $("#fview").html($markup)
  
     <?php }
      ?>
    });
    </script>
</body>
</html>