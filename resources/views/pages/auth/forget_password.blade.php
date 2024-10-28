@extends('pages.components.main_page_auth')
@section('title') {{ 'Forget Password' }} @endsection

@section('content')
<body class="show-spinner">
<div class="w-100 d_flex_grid">
    <div class="left_sign_box w_50_100">
         <img  src="/assets/img/hero_image/login.webp" alt="">
         <div class="left_sign_box_inner_box pl-4 pt-2">
             <a href="/index">
            <img src="/assets/img/logos/logo.jpg" data-aos="zoom-in" data-aos-delay="300">
        </a>
             
         </div>
        
    </div>
    <div class="right_sign_box w_50_100 cart_page">
        <div class="w-100">
             <a href="/index">
            <img src="/assets/img/logos/BravePoint.svg" data-aos="zoom-in" data-aos-delay="300">
        </a>
            
        </div>
        <div class="w-100 mt-5 mb-5">
            <h4>Forgot Password</h4>
            <p>Please enter the email address you used to create your account. We will send you a link to reset your password.</p>
            
        </div>
       
        <div class="w-100">
            <div class="input-group mb-2 mr-sm-2">
                <div class="input-group-prepend ">
                  <div class="input-group-text google_login">
                      <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><path fill="black" d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2zm-2 0l-8 5l-8-5zm0 12H4V8l8 5l8-5z"/></svg>
                  </div>
                </div>
                <input type="text" class="form-control google_login" id="email" style="border-left: 0px !important;" placeholder="Enter your email address">
              </div>
             
        </div>
       
        <div class="w-100">
             <button type="button" class="btn btn-primary btn_primary low_radius w-100 mt-4" id="reset_password">Reset Password</button>
            
        </div>
        
        <div class="w-100 d-flex justify-content-center mt-4">
            <p>Remember Password? <a href="/auth/sign_in" class="active">Login</a></p>
            
        </div>
        
        
    </div>
    
</div>

</body>
@endsection