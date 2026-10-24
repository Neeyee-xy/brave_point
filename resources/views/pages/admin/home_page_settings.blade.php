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
                <h3 class="card-title"> Home Page Settings</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="product_form" name="product_form">
                <div class="card-body">
                  <div class="row">
                    
                  
                  <div class="col-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Hero Text </label>
                    <input type="text" class="form-control" id="hero_text" name="hero_text" placeholder="Enter name"value="{{$settings?->hero_text}}">
                    
                  </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Hero Sub Text</label>
                    <input type="text" class="form-control" id="hero_sub_text" name="hero_sub_text" placeholder="Enter name" value="{{$settings?->hero_sub_text}}">
                    
                  </div>
                </div>
                @for ($slot = 1; $slot <= 6; $slot++)
                  @include("pages.admin.partials.home_slot", ["slot" => $slot, "label" => "Leading Product Image ".$slot])
                @endfor
                <div class="col-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Home Page Video</label>
                   <input type="file" class="form-control" id="file" name="file" accept="video/mp4, video/avi, video/mov, video/mpeg, video/wmv, video/webm">
                    
                  </div>
                </div>
                 <div class="col-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Video Text 1</label>
                    <input type="text" class="form-control" id="video_text1" name="video_text1" placeholder="Enter name" value="{{$settings?->video_text1}}">
                    
                  </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Video Text 2</label>
                    <input type="text" class="form-control" id="video_text2" name="video_text2" placeholder="Enter name" value="{{$settings?->video_text2}}">
                    
                  </div>
                </div>
                <div class="col-12 col-sm-12 col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Facebook Link</label>
                    <input type="text" class="form-control" id="fb" name="fb" placeholder="Enter name" value="{{$settings?->fb}}">
                    
                  </div>
                </div>
                <div class="col-12 col-sm-12 col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Instagram Link</label>
                    <input type="text" class="form-control" id="ig" name="ig" placeholder="Enter name" value="{{$settings?->ig}}">
                    
                  </div>
                </div>
                <div class="col-12 col-sm-12 col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Youtibe Link</label>
                    <input type="text" class="form-control" id="yb" name="yb" placeholder="Enter name" value="{{$settings?->yb}}">
                    
                  </div>
                </div>
               
                @for ($slot = 7; $slot <= 11; $slot++)
                  @include("pages.admin.partials.home_slot", ["slot" => $slot, "label" => "Footer Product Image ".($slot - 6)])
                @endfor
                 
                
                 
                   
                 
                  
                 
                 </div>
                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" id="save_settings">Save Setting</button>
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


 




  $('form[name="product_form"]').on('submit',(function(e){
 
    // $('#submitButton').addClass("disabled");
     // $('#submitButton').val('processing...')
     $("#save_settings").html("Processing");
     $("#save_settings").prop("disabled",true);
        e.preventDefault();
         var formData = new FormData(this);
          


          $.ajax({
          url: "/admin/save_home_page_settings",
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
            // Reload so the slot previews show the newly saved images
            setTimeout(function () { location.reload(); }, 1000);

            $("#save_settings").html("Save Settings");
            $("#save_settings").prop("disabled",false);
             // toastr.success_msg(data.errors)
           }
           if (errors_msg== true) {
         
             toastr.error(data.errors)
              $("#save_settings").html("Save Settings");
              $("#save_settings").prop("disabled",false);
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
        $("#save_settings").html("Save Settings");
        $("#save_settings").prop("disabled",false);

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
        $("#save_settings").html("Save Settings");
        $("#save_settings").prop("disabled",false);

          } 
    }           
});
}));
</script>
