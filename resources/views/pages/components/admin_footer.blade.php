
<footer class="main-footer">
    <strong>Copyright &copy; {{date('Y')}} <a href="/index">BravePoint</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<!-- <script src="/plugins/chart.js/Chart.min.js"></script> -->
<!-- Sparkline -->
<!-- <script src="/plugins/sparklines/sparkline.js"></script> -->
<!-- JQVMap -->
<!-- <script src="/plugins/jqvmap/jquery.vmap.min.js"></script> -->
<!-- <script src="/plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
<!-- jQuery Knob Chart -->
<!-- <script src="/plugins/jquery-knob/jquery.knob.min.js"></script> -->
<!-- daterangepicker -->
<!-- <script src="/plugins/moment/moment.min.js"></script> -->
<!-- <script src="/plugins/daterangepicker/daterangepicker.js"></script> -->
<!-- Tempusdominus Bootstrap 4 -->
<!-- <script src="/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> -->
<!-- Summernote -->
<!-- <script src="/plugins/summernote/summernote-bs4.min.js"></script> -->
<!-- overlayScrollbars -->
<script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.js"></script>
   <script src="/plugins/sweetalert2/sweetalert2.js"></script>
     <script src="/plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="/dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="/dist/js/pages/dashboard.js"></script> -->
<script type="text/javascript">
  $(document).ready(function(){

             $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
            })
  $("body > *").css({ opacity: 0 });
    // preloader
    setTimeout(function () {
      $("body").removeClass("show-spinner");
      $("main").addClass("default-transition");
      $(".sub-menu").addClass("default-transition");
      $(".main-menu").addClass("default-transition");
      $(".theme-colors").addClass("default-transition");
      $("body > *").animate({ opacity: 1 }, 100);
      count_notifications();
    }, 300);


    function count_notifications(){
            
            
          
                var formData = new FormData();
               
             
          
              
        
            $.ajax({
        url : "/count_notifications",
        type : 'POST' ,
        data : formData ,
        contentType: false,
        cache: false,
        processData:false,
        dataType: 'json',
        mimeType: 'multipart/form-data',
        success:function (data) {
          // alert(data.success)
          
      
        var success_msg=data.hasOwnProperty('success')
          var errors_msg=data.hasOwnProperty('errors')
            
           
        
           if (errors_msg== true) {
         toastr.error(data.errors)
                return false;
         
           }
            if (success_msg== true) {
          
      }
     
          $('.count_notifications').html(data.count_notifications)
          if (data.count_notifications>0) {
          $('.drop_notifications').html(data.drop_notifications)
        }else{
          $('.count_notifications').addClass('d-none');
        }
         
   }, 
    error: function(data) {
        if( data.status === 419 ) {
           toastr.error("CSRF token mismatch, It seams you have open dashboard in a new tab or your session has expired")
           
        

  

          } 
         if( data.status === 422 ) {
            var errors = $.parseJSON(data.responseText);
            $.each(errors, function (key, value) {
                // console.log(key+ " " +value);
          

                if($.isPlainObject(value)) {
                    $.each(value, function (key, value) {                       
                        console.log(key+ " " +value);
                        toastr.error(value)
                
                     

  
                   

                    });
                }else{
               
                }
            });
       

          } 
    }
});


    }

  });
</script>
</body>
</html>