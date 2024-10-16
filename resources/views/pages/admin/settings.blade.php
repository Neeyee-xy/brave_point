   @include('pages.components.head')
  @include('pages.components.navbar')
   @include('pages.components.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Settings</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Settings</li>
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
        <div class="row">
          
        <div class="card card-primary w-100">
              <div class="card-header">
                <h3 class="card-title">Settings</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="product_form" name="product_form">
                <div class="card-body">
                  <div class="row">
                     <div class="col-12 col-sm-12 col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Admin Email</label>
                    <input type="email" class="form-control" id="admin_email" name="admin_email" placeholder="Enter email" value="{{$settings?->admin_email}}">
                   
                  </div>
                </div>
                 <div class="col-12 col-sm-12 col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">PayStack Secret Api Key</label>
                    <input type="text" class="form-control" id="paystack_sk" name="paystack_sk" placeholder="Enter key" value="{{$settings?->paystack_sk}}">
                   
                  </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">PayStack Public Api Key</label>
                    <input type="text" class="form-control" id="paystack_pk" name="paystack_pk" placeholder="Enter key" value="{{$settings?->paystack_pk}}">
                   
                  </div>
                </div>
                    
                  </div>
                  
                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" id="save">Save</button>
                </div>
              </form>
            </div>
         
       
          
        </div>
        <!-- /.row -->
        <!-- Main row -->
       
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@include('pages.components.admin_footer')
<script type="text/javascript">






    

  $('form[name="product_form"]').on('submit',(function(e){
 
    // $('#submitButton').addClass("disabled");
     // $('#submitButton').val('processing...')
     $("#save").html("Processing");
     $("#save").prop("disabled",true);
        e.preventDefault();
         var formData = new FormData(this);


          $.ajax({
          url: "/admin/settings",
          type: "POST",
          data:  formData,
          contentType: false,
          cache: false,
          processData:false,
          dataType: 'json',
          mimeType: 'multipart/form-data',

 success:function (data) {
          // alert(data.success)
          var success_msg=data.hasOwnProperty('success')
          var errors_msg=data.hasOwnProperty('errors')
           if (success_msg== true) {
            toastr.success(data.success)
               
            $("#save").html("Save");
            $("#save").prop("disabled",false);
             setTimeout(window.location.href="/admin/settings", 4000);
             // toastr.success_msg(data.errors)
           }
           if (errors_msg== true) {
         
             toastr.error(data.errors)
              $("#save").html("Save");
              $("#save").prop("disabled",false);
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
        $("#save").html("Save");
        $("#save").prop("disabled",false);

          } 
          if( data.status === 419 ) {
            toastr.error("Token Mismatch, Kindly Refresh The Page")
            $.each(errors, function (key, value) {
                // console.log(key+ " " +value);
          

                if($.isPlainObject(value)) {
                    $.each(value, function (key, value) {                       
                        console.log(key+ " " +value);
                       
                    
  
                    // $('#response').show().html(value+"<br/>");

                    });
                }else{
                // $('#response').show().append(value+"<br/>"); //this is my div with messages
                }
            });
        $("#save").html("Save");
        $("#save").prop("disabled",false);

          } 
    }           
});
}));
</script>