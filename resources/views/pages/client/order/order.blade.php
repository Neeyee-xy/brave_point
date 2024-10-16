@include('pages.components.head')
@include('pages.components.navbar')
@include('pages.components.sidebar')
<link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<style type="text/css">
  .spinner{
    display: none;
  }
</style>
<div class="modal fade " id="view_order" tabindex="-1" aria-labelledby="view_orderLabel" aria-hidden="true">
  <div class="modal-dialog product_detail_model modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-bold" id="view_orderLabel">Order Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="w-100 d-flex justify-content-center">
          <div class="spinner-border text-danger" role="status">
            <span class="sr-only">Loading...</span>
          </div>
          
        </div>
        
        <div class="order_details w-100 ">
          
          
        </div>
        <div class="cart w-100 d-none">
        

        </div>
    
      </div>
      <div class="modal-footer d-flex justify-content-between">
       <h2 class="price_label_order"></h2>
      
      </div>
    </div>
  </div>
</div>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{$page_title}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">{{$page_title}}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
       
        	<div class="card">
              <div class="card-header">
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Order ID</th>
                    <th>Adddress</th>
                  
                    <th></th>
                    
                  </tr>
                  </thead>
                  <tbody>
                  	@foreach($orders as $order)
                  	<tr>
                  		<td>#{{$order->cart_order_id}}</td>
                  		<td>{{$order->user->address}}</td>
                  		
               <td>
                <div class="d-flex">
                  
                
                <a class="nav-link view_order" order_id="{{$order->id}}" data-toggle="modal" data-target="#view_order" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M20.77 12c0-.359-.194-.594-.582-1.066C18.768 9.21 15.636 6 12 6s-6.768 3.21-8.188 4.934c-.388.472-.582.707-.582 1.066s.194.594.582 1.066C5.232 14.79 8.364 18 12 18s6.768-3.21 8.188-4.934c.388-.472.582-.707.582-1.066M12 15a3 3 0 1 0 0-6a3 3 0 0 0 0 6" clip-rule="evenodd"/></svg> View Order</a>
                <a class="nav-link cancel_order  ml-2" order_id="{{$order->id}}"  status="Cancelled" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 48 48"><path fill="#d50000" d="M24 6C14.1 6 6 14.1 6 24s8.1 18 18 18s18-8.1 18-18S33.9 6 24 6m0 4c3.1 0 6 1.1 8.4 2.8L12.8 32.4C11.1 30 10 27.1 10 24c0-7.7 6.3-14 14-14m0 28c-3.1 0-6-1.1-8.4-2.8l19.6-19.6C36.9 18 38 20.9 38 24c0 7.7-6.3 14-14 14"/></svg> Cancel Order</a>
                 <div class="spinner-border spinner-border_{{$order->id}} text-danger spinner" role="status">
                      <span class="sr-only">Loading...</span>
                    </div>
              </div>

              </td>
                  	</tr>
                  	@endforeach

                  </tbody>
              </table>
          </div>
      </div>
  </div>

          
        
         
       
          
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
        
         
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <!-- /.content-wrapper -->
@include('pages.components.admin_footer')
 <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/plugins/jszip/jszip.min.js"></script>
<script src="/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
   $(document).ready(function(){
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });


$(document).on("click",".cancel_order", function(e){
$('.spinner-border_'+$(this).attr('order_id')+'').show();
    e.preventDefault()
   // $("#overlay-profile1").show();
    var order_id = $(this).attr('order_id'); 
   
    
    var pass_data = {
             'order_id' : order_id,
             'status':$(this).attr('status'),   
            };
        $.ajax({
            url : "/client/change_order_status",  // create a new php page to handle ajax request
            type : "POST",
            data : pass_data,
            dataType: 'json', // add this
        success:function (data) {
          // alert(data.success)
          var success_msg=data.hasOwnProperty('success')
          var errors_msg=data.hasOwnProperty('errors')
           if (success_msg== true) {
           

             
             toastr.success(data.success)
             $('.spinner-border_'+order_id+'').hide();
           }
           if (errors_msg== true) {
         
             toastr.error(data.errors)
          
           }
              // toastr.error(value)
          
     } ,
    error: function(data) {
         if( data.status === 422 ) {
            var errors = $.parseJSON(data.responseText);
            $.each(errors, function (key, value) {
                // console.log(key+ " " +value);
          

                if($.isPlainObject(value)) {
                    $.each(value, function (key, value) {                       
                        console.log(key+ " " +value);
                       
      toastr.error(value)
  
                    // $('#response').show().html(value+"<br/>");

                    });
                }else{
                // $('#response').show().append(value+"<br/>"); //this is my div with messages
                }
            });
         

          } 
    }
        });
        
});

     $(document).on("click",".view_order", function(e){
            
         $('.spinner-border').show();
        $('.order_details').html("")

        e.preventDefault()

        var order_id = $(this).attr('order_id'); 
       
       
        var pass_data = {
                 'order_id' : order_id,
                 
                };
        $.ajax({
            url : "/view_order",  // create a new php page to handle ajax request
            type : "POST",
            data : pass_data,
            dataType: 'json', // add this

        success:function (data) {
          // alert(data.success)
          
      
        var success_msg=data.hasOwnProperty('success')
          var errors_msg=data.hasOwnProperty('errors')
            
           
        
           if (success_msg== true) {
         toastr.error(data.errors)
                return false;
         
           }
            if (success_msg== true) {
          
      }
      $('.spinner-border').hide();
          $('.order_details').html(data.order_details)
         
          // toastr.success("Item added successfully")
          $('.price_label_order').html("Total: NGN "+data.total_price+"")
         
   }, 
    error: function(data) {
        if( data.status === 419 ) {
           toastr.error("CSRF token mismatch, It seams you have open dashboard in a new tab or your session has expired")
           $(".add_to_cart").html("Add To Cart");
             $(".add_to_cart").prop("disabled",false);
        

  

          } 
         if( data.status === 422 ) {
            var errors = $.parseJSON(data.responseText);
            $.each(errors, function (key, value) {
                // console.log(key+ " " +value);
          

                if($.isPlainObject(value)) {
                    $.each(value, function (key, value) {                       
                        console.log(key+ " " +value);
                        toastr.error(value)
                $(".add_to_cart").html("Add To Cart");
                $(".add_to_cart").prop("disabled",false);
                     

  
                   

                    });
                }else{
               
                }
            });
       

          } 
    }
});


    })
</script>