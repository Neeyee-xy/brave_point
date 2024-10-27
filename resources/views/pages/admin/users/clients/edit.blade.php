
 


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
            <h1 class="m-0">{{$page_title}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
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
        <div class="row">
          
        <div class="card card-primary w-100">
              <div class="card-header">
                <h3 class="card-title">Add New {{$page_title}}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="user_form" name="user_form">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Full Name" value="{{$user->name}}">
                    <input type="text" class="form-control" id="id" name="id" placeholder="Enter Full Name" value="{{$user->id}}" hidden>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone Number</label>
                    <input type="number" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number" value="{{$user->phone}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="{{$user->email}}" readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="number" class="form-control" id="password" name="password" placeholder="Enter Password" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Confrim Password</label>
                    <input type="number" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter Confrim Password">
                  </div>
                  
                 
                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" id="update">Update</button>
                </div>
              </form>
            </div>
         
       
          
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <div class="card card-primary w-100">
              <div class="card-header">
                <h3 class="card-title">Admin Data</h3>
              </div>
              <div id="tables" class="p-4">
                
              </div>

            </div>
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
<script type="text/javascript">
 
fetch_tables();
  function fetch_tables()
  {
    $.ajax({
      url:"/admin/users/clients/tables",
      method:"GET",
      success:function(data){
        $('#tables').html(data);
      }
    })
  }

   $(document).on('click', ".delete_user", function () {
   // $("#overlay-profile1").show();
    var id = $(this).attr('user_id'); // $(this) refers to button that was clicked
  // alert(id);
Swal.fire({
  title: "Are you sure?",
  text: "Your are about to delete this user",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Yes, delete it!"
}).then((result) => {
  if (result.isConfirmed) {
     delete_user(id) 
    
  }
});




    function delete_user(id)  
    {  
// alert(resu);

  $('.confirm').prop('disabled', true);
  $('.cancel').prop('disabled', true);
var que= id;


var pass_data = {
         'id' : id,
         
            
        };
        
        $.ajax({
            url : "/admin/users/clients/delete",  // update a new php page to handle ajax request
            type : "POST",
            data : pass_data,
            dataType: 'json', // add this
        success:function (data) {
          // alert(data.success)
          var success_msg=data.hasOwnProperty('success')
          var errors_msg=data.hasOwnProperty('errors')
           if (success_msg== true) {
            fetch_tables();
              Swal.fire({
                title: "Deleted!",
                 text: ""+data.success+"",
                icon: "success"
              });
             
             // toastr.success_msg(data.errors)
           }
           if (errors_msg== true) {
         fetch_tables();
              Swal.fire({
                title: "Error!",
                text: ""+data.errors+"",
                icon: "error"
              });
                    
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
        
    } 
    return false;
});



  $('form[name="user_form"]').on('submit',(function(e){
 
    // $('#submitButton').addClass("disabled");
     // $('#submitButton').val('processing...')
     $("#update").html("Processing");
     $("#update").prop("disabled",true);
        e.preventDefault();
         var formData = new FormData(this);
         formData.append( 'user_type',"Client"); 


          $.ajax({
          url: "/admin/users/clients/edit/{{$user->id}}",
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
                fetch_tables();
            $("#update").html("update");
            $("#update").prop("disabled",false);
             // toastr.success_msg(data.errors)
           }
           if (errors_msg== true) {
         
             toastr.error(data.errors)
              $("#update").html("update");
              $("#update").prop("disabled",false);
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
        $("#update").html("update");
        $("#update").prop("disabled",false);

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
        $("#update").html("update");
        $("#update").prop("disabled",false);

          } 
    }           
});
}));
</script>