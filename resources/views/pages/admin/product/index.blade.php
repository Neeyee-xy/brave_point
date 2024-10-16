
 


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
            <h1 class="m-0">Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Product</li>
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
                <h3 class="card-title">Add New Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="product_form" name="product_form">
                <div class="card-body">
                  <div class="row">
                    
                  
                  <div class="col-12 col-sm-12 col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                  </div>
                </div>
                  <div class="col-12 col-sm-12 col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Description</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                  </div>
                </div>
                   <div class="col-12 col-sm-12 col-md-6">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Product Carton Price</label>
                    <input type="number" class="form-control" id="carton_price" name="carton_price" placeholder="Enter carton price">
                  </div>
                </div>
                  <div class="col-12 col-sm-12 col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Sachet Price</label>
                    <input type="number" class="form-control" id="sachet_price" name="sachet_price" placeholder="Enter sachet price">
                  </div>
                </div>
                  <div class="col-12 col-sm-12 col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Image</label>
                    <input type="file" class="form-control" id="image" name="image" placeholder="Enter sachet price">
                  </div>
                </div>
                  <div class="col-12 col-sm-12 col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Status</label>
                   <select class="form-control" id="status" name="status">
                     <option value="">---select---</option>
                     <option value="In-stock">In-stock</option>
                      <option value="Out-of-stock">Out-of-stock</option>
                   </select>
                  </div>
                </div>
                 <div class="col-12 col-sm-12 col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Category</label>
                   <select class="form-control" id="category_id" name="category_id">
                     <option value="">---select---</option>
                     @foreach($categories as $category)
                     <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                   </select>
                  </div>
                </div>
                 <div class="col-12 col-sm-12 col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Tips</label>
                   <textarea class="form-control" id="tips" name="tips"></textarea>
                 
                  </div>
                </div>
                 </div>
                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" id="add_product">Add Product</button>
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
<script type="text/javascript">
 
fetch_tables();
  function fetch_tables()
  {
    $.ajax({
      url:"/admin/product/tables",
      method:"GET",
      success:function(data){
        $('#tables').html(data);
      }
    })
  }

   $(document).on('click', ".delete_product", function () {
   // $("#overlay-profile1").show();
    var id = $(this).attr('product_id'); // $(this) refers to button that was clicked
  // alert(id);
Swal.fire({
  title: "Are you sure?",
  text: "Your are about to delete this product ",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Yes, delete it!"
}).then((result) => {
  if (result.isConfirmed) {
     delete_product(id) 
    
  }
});




    function delete_product(id)  
    {  
// alert(resu);

  $('.confirm').prop('disabled', true);
  $('.cancel').prop('disabled', true);
var que= id;


var pass_data = {
         'id' : id,
         
            
        };
        
        $.ajax({
            url : "/admin/product/delete",  // create a new php page to handle ajax request
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
     $("#add_product").html("Processing");
     $("#add_product").prop("disabled",true);
        e.preventDefault();
         var formData = new FormData(this);


          $.ajax({
          url: "/admin/product",
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
            $("#add_product").html("Add Product");
            $("#add_product").prop("disabled",false);
             // toastr.success_msg(data.errors)
           }
           if (errors_msg== true) {
         
             toastr.error(data.errors)
              $("#add_product").html("Add Product");
              $("#add_product").prop("disabled",false);
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
        $("#add_product").html("Add Product");
        $("#add_product").prop("disabled",false);

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
        $("#add_product").html("Add Product");
        $("#add_product").prop("disabled",false);

          } 
    }           
});
}));
</script>