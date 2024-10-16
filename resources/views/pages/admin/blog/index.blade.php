@include('pages.components.head')
@include('pages.components.navbar')
@include('pages.components.sidebar')

<link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">

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
                <h3 class="card-title">Add New Blog Post</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="product_form" name="product_form">
                <div class="card-body">
                  <div class="row">
                    
                  
                  <div class="col-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Post Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter name">
                    <input type="text" class="form-control" id="user_id" name="user_id" placeholder="Enter name" value="{{Auth::user()->id}}" hidden>
                  </div>
                </div>
                  <div class="col-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Post</label>
                   <textarea id="summernote" style="height: 400px;">
                Place <em>some</em> <u>text</u> <strong>here</strong>
              </textarea>
                  </div>
                </div>
                   
                 
                  <div class="col-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Post Image</label>
                    <input type="file" class="form-control" id="image" name="image" placeholder="Enter sachet price">
                  </div>
                </div>
                 
                 </div>
                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" id="save_post">Save Post</button>
                </div>
              </form>
            </div>
         
       
          
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <div class="card card-primary w-100">
              <div class="card-header">
                <h3 class="card-title">Product Data</h3>
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
<script src="/plugins/summernote/summernote-bs4.min.js"></script>
<script type="text/javascript">
$('#summernote').summernote({
  height: 300, // set editor height
  minHeight: null, // set minimum height of editor
  maxHeight: null, // set maximum height of editor
  focus: true, // set focus to editable area after initializing summernote,
   toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
});

fetch_tables();
  function fetch_tables()
  {
    $.ajax({
      url:"/admin/blog/tables",
      method:"GET",
      success:function(data){
        $('#tables').html(data);
      }
    })
  }

   $(document).on('click', ".delete_blog", function () {
   // $("#overlay-profile1").show();
    var id = $(this).attr('blog_id'); // $(this) refers to button that was clicked
  // alert(id);
Swal.fire({
  title: "Are you sure?",
  text: "Your are about to delete this post",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Yes, delete it!"
}).then((result) => {
  if (result.isConfirmed) {
     delete_blog(id) 
    
  }
});




    function delete_blog(id)  
    {  
// alert(resu);

  $('.confirm').prop('disabled', true);
  $('.cancel').prop('disabled', true);
var que= id;


var pass_data = {
         'id' : id,
         
            
        };
        
        $.ajax({
            url : "/admin/blog/delete",  // create a new php page to handle ajax request
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



  $('form[name="product_form"]').on('submit',(function(e){
 
    // $('#submitButton').addClass("disabled");
     // $('#submitButton').val('processing...')
     $("#save_post").html("Processing");
     $("#save_post").prop("disabled",true);
        e.preventDefault();
         var formData = new FormData(this);
           formData.append("post", $('#summernote').summernote("code") );


          $.ajax({
          url: "/admin/blog",
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
            $("#save_post").html("Save Post");
            $("#save_post").prop("disabled",false);
             // toastr.success_msg(data.errors)
           }
           if (errors_msg== true) {
         
             toastr.error(data.errors)
              $("#save_post").html("Save Post");
              $("#save_post").prop("disabled",false);
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
        $("#save_post").html("Save Post");
        $("#save_post").prop("disabled",false);

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
        $("#save_post").html("Save Post");
        $("#save_post").prop("disabled",false);

          } 
    }           
});
}));
</script>