<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="/font/iconsmind-s/css/iconsminds.css" />
    <link rel="stylesheet" href="/font/simple-line-icons/css/simple-line-icons.css" />
    <link rel="stylesheet" href="/font/font-awesome_4.6.2.min.css" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>
   <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/vendor/bootstrap.min.css" />
     <link rel="stylesheet" href="/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="/css/main44.css" />

<style>
    .input-group-text {
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      -webkit-box-align: center;
      -ms-flex-align: center;
      align-items: center;
      padding: .375rem .75rem;
      margin-bottom: 0;
      font-size: 1rem;
      font-weight: 400;
      line-height: 1.5;
      color: black;
      text-align: center;
      white-space: nowrap;
      background-color: transparent;
      border: 1px solid #ced4da;
      border-radius: .25rem;
}
    .left_sign_box{
        height: 100vh;
        position: relative;
    }
    .right_sign_box{
        height: 100vh;
        position: relative;
    }
    .left_sign_box img{
        height: 100%;
        width: 100%;
    }
    .left_sign_box_inner_box{
        position: absolute;
        height: 200px;
        color: #000;
        width: 60%;
/*        background: #fff;*/
        bottom: 10%;
        left: 10%;
        border-radius: 10px;
    }
    .left_sign_box_inner_box img{
        height: 100%;
        width: auto;
    }
    .google_login{
        height: 50px;
        border-radius: 10px;
        border: 1px solid black;
    }
    .right_sign_box .active {
  color: #F68634!important;
}
    @media (min-width: 568px) and (max-width: 767px) 
    {
        .left_sign_box{
            display: none;
        }

    }

@media (min-width: 321px) and (max-width: 567px) {
        .left_sign_box{
            display: none;
        }

    }
    .hr_strike{
        height: 10px;
        width: 70px;
        border-radius: 7px;
        background: #b3b3b3;
        margin-top: 12px;
    }
</style>

</head>
<body class="show-spinner">
  @yield('content')

</body>
<footer> 
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <script src="/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="/plugins/toastr/toastr.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
             $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
            })

             $(document).on("click","#sign_in", function(e){
 
    // $('#submitButton').addClass("disabled");
     // $('#submitButton').val('processing...')
     $("#sign_in").html("Processing");
     $("#sign_in").prop("disabled",true);
e.preventDefault();

  var formData = new FormData(); 
  

  formData.append( 'email',$('#email').val());
  formData.append( 'password',$('#password').val());

 
           
             

$.ajax({
url: "/auth/sign_in",
type: "POST",
data:  formData,
contentType: false,
cache: false,
processData:false,
dataType: 'json',
mimeType: 'multipart/form-data',

 success:function (data) {
          // alert(data.errors)
          var success_msg=data.hasOwnProperty('success')
          var errors_msg=data.hasOwnProperty('errors')

         


           if (success_msg== true) {
            toastr.success(data.success)
             
           

            $("#sign_in").html("Create Account");
            $("#sign_in").prop("disabled",false);
            if (data.lastVisitedPage!==null) {
       setTimeout(window.location.href=""+data.lastVisitedPage+"", 4000);
   }else{
     setTimeout(window.location.href="/dashboard", 4000);
   }
             // toastr.success_msg(data.errors)
           }
           if (errors_msg== true) {
          toastr.error(data.errors)
        
  
        $("#sign_in").html("Create Account");
        $("#sign_in").prop("disabled",false);
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
       $("#sign_in").html("Create Account");
     $("#sign_in").prop("disabled",false);
                    // $('#response').show().html(value+"<br/>");

                    });
                }else{
                // $('#response').show().append(value+"<br/>"); //this is my div with messages
                }
            });
            $("#sign_in").html("Create Account");
     $("#sign_in").prop("disabled",false);

          } 
    }           
});
});



 $(document).on("click","#change_password", function(e){
 
    // $('#submitButton').addClass("disabled");
     // $('#submitButton').val('processing...')
     $("#change_password").html("Processing");
     $("#change_password").prop("disabled",true);
e.preventDefault();

  var formData = new FormData(); 
  

formData.append( 'password',$('#password').val());
formData.append( 'token',$('#token').val());
formData.append( 'password_confirmation',$('#password_confirmation').val()); 

 
           
             

$.ajax({
url: "/auth/change_password",
type: "POST",
data:  formData,
contentType: false,
cache: false,
processData:false,
dataType: 'json',
mimeType: 'multipart/form-data',

 success:function (data) {
          // alert(data.errors)
          var success_msg=data.hasOwnProperty('success')
          var errors_msg=data.hasOwnProperty('errors')

         


           if (success_msg== true) {
            toastr.success(data.success)
             
           

            $("#change_password").html("Create Account");
            $("#change_password").prop("disabled",false);
       setTimeout(window.location.href="/dashboard", 4000);
             // toastr.success_msg(data.errors)
           }
           if (errors_msg== true) {
          toastr.error(data.errors)
        
  
        $("#change_password").html("Create Account");
        $("#change_password").prop("disabled",false);
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
       $("#change_password").html("Create Account");
     $("#change_password").prop("disabled",false);
                    // $('#response').show().html(value+"<br/>");

                    });
                }else{
                // $('#response').show().append(value+"<br/>"); //this is my div with messages
                }
            });
            $("#change_password").html("Create Account");
     $("#change_password").prop("disabled",false);

          } 
    }           
});
});





$(document).on("click","#reset_password", function(e){
 
    // $('#submitButton').addClass("disabled");
     // $('#submitButton').val('processing...')
     $("#reset_password").html("Processing");
     $("#reset_password").prop("disabled",true);
e.preventDefault();

  var formData = new FormData(); 
  

  formData.append( 'email',$('#email').val());

 
           
             

$.ajax({
url: "/auth/send_password_token",
type: "POST",
data:  formData,
contentType: false,
cache: false,
processData:false,
dataType: 'json',
mimeType: 'multipart/form-data',

 success:function (data) {
          // alert(data.errors)
          var success_msg=data.hasOwnProperty('success')
          var errors_msg=data.hasOwnProperty('errors')

         


           if (success_msg== true) {
            toastr.success(data.success)
             
           

            $("#reset_password").html("Reset Password");
            $("#reset_password").prop("disabled",false);
       // setTimeout(window.location.href="/dashboard", 4000);
             // toastr.success_msg(data.errors)
           }
           if (errors_msg== true) {
          toastr.error(data.errors)
        
  
        $("#reset_password").html("Reset Password");
        $("#reset_password").prop("disabled",false);
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
       $("#reset_password").html("Reset Password");
     $("#reset_password").prop("disabled",false);
                    // $('#response').show().html(value+"<br/>");

                    });
                }else{
                // $('#response').show().append(value+"<br/>"); //this is my div with messages
                }
            });
            $("#reset_password").html("Reset Password");
     $("#reset_password").prop("disabled",false);

          } 
    }           
});
});













$(document).on("click","#create_admin_account", function(e){
 
    // $('#submitButton').addClass("disabled");
     // $('#submitButton').val('processing...')
     $("#create_admin_account").html("Processing");
     $("#create_admin_account").prop("disabled",true);
e.preventDefault();

  var formData = new FormData(); 
  
  formData.append( 'name',$('#name').val()); 
  formData.append( 'phone',$('#phone').val()); 
  formData.append( 'email',$('#email').val());
  formData.append( 'user_type',"Admin"); 
  formData.append( 'password',$('#password').val());
  formData.append( 'password_confirmation',$('#password_confirmation').val()); 
 
           
             

$.ajax({
url: "/auth/admin/create_admin_account",
type: "POST",
data:  formData,
contentType: false,
cache: false,
processData:false,
dataType: 'json',
mimeType: 'multipart/form-data',

 success:function (data) {
          // alert(data.errors)
          var success_msg=data.hasOwnProperty('success')
          var errors_msg=data.hasOwnProperty('errors')

         


           if (success_msg== true) {
            toastr.success(data.success)
             
           

            $("#create_admin_account").html("Create Account");
            $("#create_admin_account").prop("disabled",false);
       setTimeout(window.location.href="/dashboard", 4000);
             // toastr.success_msg(data.errors)
           }
           if (errors_msg== true) {
          toastr.error(data.errors)
        
  
        $("#create_admin_account").html("Create Account");
        $("#create_admin_account").prop("disabled",false);
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
       $("#create_admin_account").html("Create Account");
     $("#create_admin_account").prop("disabled",false);
                    // $('#response').show().html(value+"<br/>");

                    });
                }else{
                // $('#response').show().append(value+"<br/>"); //this is my div with messages
                }
            });
            $("#create_admin_account").html("Create Account");
     $("#create_admin_account").prop("disabled",false);

          } 
    }           
});
});




            $(document).on("click","#create_client_account", function(e){
 
    // $('#submitButton').addClass("disabled");
     // $('#submitButton').val('processing...')
     $("#create_client_account").html("Processing");
     $("#create_client_account").prop("disabled",true);
e.preventDefault();

  var formData = new FormData(); 
  
  formData.append( 'name',$('#name').val()); 
  formData.append( 'phone',$('#phone').val()); 
  formData.append( 'email',$('#email').val());
  formData.append( 'user_type',"Client"); 
  formData.append( 'password',$('#password').val());
  formData.append( 'password_confirmation',$('#password_confirmation').val()); 
 
           
             

$.ajax({
url: "/auth/client/create_client_account",
type: "POST",
data:  formData,
contentType: false,
cache: false,
processData:false,
dataType: 'json',
mimeType: 'multipart/form-data',

 success:function (data) {
          // alert(data.errors)
          var success_msg=data.hasOwnProperty('success')
          var errors_msg=data.hasOwnProperty('errors')

         


           if (success_msg== true) {
            toastr.success(data.success)
             
           

            $("#create_client_account").html("Create Account");
            $("#create_client_account").prop("disabled",false);
       setTimeout(window.location.href="/dashboard", 4000);
             // toastr.success_msg(data.errors)
           }
           if (errors_msg== true) {
          toastr.error(data.errors)
        
  
        $("#create_client_account").html("Create Account");
        $("#create_client_account").prop("disabled",false);
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
       $("#create_client_account").html("Create Account");
     $("#create_client_account").prop("disabled",false);
                    // $('#response').show().html(value+"<br/>");

                    });
                }else{
                // $('#response').show().append(value+"<br/>"); //this is my div with messages
                }
            });
            $("#create_client_account").html("Create Account");
     $("#create_client_account").prop("disabled",false);

          } 
    }           
});
});






















    $("body > *").css({ opacity: 0 });
    // preloader
    setTimeout(function () {
      $("body").removeClass("show-spinner");
      $("main").addClass("default-transition");
      $(".sub-menu").addClass("default-transition");
      $(".main-menu").addClass("default-transition");
      $(".theme-colors").addClass("default-transition");
      $("body > *").animate({ opacity: 1 }, 100);
    }, 300);


AOS.init({
      duration: 1000,
      easing: "ease-in-out",
      once: true,
      mirror: false
    });







});
    </script>

</footer>
</html>