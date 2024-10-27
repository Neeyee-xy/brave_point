 @include('pages.components.header')





    <main>
       <div class="container cart_page">
        <form name="contact_us">
          <div class="row mt-2 w-100">
              <div class="col-12 col-sm-12 col-md-8 mx-auto">
                <input type="text" name="name" class="form-control add_font_league_spartan mt-2" placeholder="Full Name" >
              </div>
             
          </div>
          <div class="row mt-2 w-100">
              <div class="col-12 col-sm-12 col-md-8 mx-auto">
                <input type="email" name="email" class="form-control add_font_league_spartan mt-2" placeholder="Your Email" >
              </div>
             
          </div>
          <div class="row mt-2 w-100">
              <div class="col-12 col-sm-12 col-md-8 mx-auto">
                <input type="text" name="time" class="form-control add_font_league_spartan mt-2" placeholder="Preferred Appointment Time" >
              </div>
             
          </div>
          <div class="row mt-2 w-100">
              <div class="col-12 col-sm-12 col-md-8 mx-auto">
                <textarea name="details" class="form-control add_font_league_spartan mt-2" placeholder="Describe Briefly Subject Of Concern"></textarea>
                
              </div>
             
          </div>
          <div class="row mt-2 w-100">
              <div class="col-12 col-sm-12 col-md-8 mx-auto">
                 <button type="submit" class="btn btn-primary btn_primary low_radius w-100 mt-4" id="pay_now">Submit</button>
                
              </div>
             
          </div>
        </form>
          
        
            
          
        </div>
      </div>
          
          
       
       <div style="height: 300px;">
         
       </div>








       
      


        @include('pages.components.footer')
<script type="text/javascript">
         

  $('form[name="contact_us"]').on('submit',(function(e){
 
    // $('#submitButton').addClass("disabled");
     // $('#submitButton').val('processing...')
     $("#pay_now").html("Processing");
     $("#pay_now").prop("disabled",true);
        e.preventDefault();
         var formData = new FormData(this);


          $.ajax({
          url: "contact_us",
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
               
            $("#pay_now").html("Pay now");
            $("#pay_now").prop("disabled",false);

             // setTimeout(window.location.href=""+data.authorization_url+"", 4000);
             // toastr.success_msg(data.errors)
           }
           if (errors_msg== true) {
         
             toastr.error(data.errors)
              $("#pay_now").html("pay_now");
              $("#pay_now").prop("disabled",false);
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
        $("#pay_now").html("Pay now");
        $("#pay_now").prop("disabled",false);

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
        $("#pay_now").html("Pay now");
        $("#pay_now").prop("disabled",false);

          } 
        }           
    });
  }));






           
        </script>