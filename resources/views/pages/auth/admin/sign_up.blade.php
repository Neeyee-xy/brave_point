@extends('pages.components.main_page_auth')
@section('title') {{ 'Admin Sign Up' }} @endsection

@section('content')
<body class="show-spinner">
<div class="w-100 d_flex_grid">
    <div class="left_sign_box w_50_100">
         <img  src="/assets/img/hero_image/login.webp" alt="">
         <div class="left_sign_box_inner_box pl-4 pt-2">
              <img src="/assets/img/logos/logo.jpg" data-aos="zoom-in" data-aos-delay="300">
             
         </div>
        
    </div>
    <div class="right_sign_box w_50_100 cart_page">
        <div class="w-100">
            <img src="/assets/img/logos/BravePoint.svg" data-aos="zoom-in" data-aos-delay="300">
            
        </div>
        <div class="w-100 mt-5 mb-5">
            <h4>Create Account</h4>
            
        </div>
        <div class="w-100 google_login d-flex justify-content-center pt-1" style="display: none!important;">
            <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 48 48"><path fill="#ffc107" d="M43.611 20.083H42V20H24v8h11.303c-1.649 4.657-6.08 8-11.303 8c-6.627 0-12-5.373-12-12s5.373-12 12-12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4C12.955 4 4 12.955 4 24s8.955 20 20 20s20-8.955 20-20c0-1.341-.138-2.65-.389-3.917"/><path fill="#ff3d00" d="m6.306 14.691l6.571 4.819C14.655 15.108 18.961 12 24 12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4C16.318 4 9.656 8.337 6.306 14.691"/><path fill="#4caf50" d="M24 44c5.166 0 9.86-1.977 13.409-5.192l-6.19-5.238A11.9 11.9 0 0 1 24 36c-5.202 0-9.619-3.317-11.283-7.946l-6.522 5.025C9.505 39.556 16.227 44 24 44"/><path fill="#1976d2" d="M43.611 20.083H42V20H24v8h11.303a12.04 12.04 0 0 1-4.087 5.571l.003-.002l6.19 5.238C36.971 39.205 44 34 44 24c0-1.341-.138-2.65-.389-3.917"/></svg>
            <p class="mt-1 ml-3">Continue with Google</p>
            
        </div>

        <div class="w-100 d-flex justify-content-center mb-4 mt-4" style="display: none!important;">
            <div class="hr_strike mr-2"></div><h4>OR</h4><div class="ml-2 hr_strike"></div>         
        </div>
        <div class="w-100">
            
              <div class="input-group mb-2 mr-sm-2">
                <div class="input-group-prepend ">
                  <div class="input-group-text google_login">
                      <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 256 256"><path fill="black" d="M234.38 210a123.36 123.36 0 0 0-60.78-53.23a76 76 0 1 0-91.2 0A123.36 123.36 0 0 0 21.62 210a12 12 0 1 0 20.77 12c18.12-31.32 50.12-50 85.61-50s67.49 18.69 85.61 50a12 12 0 0 0 20.77-12M76 96a52 52 0 1 1 52 52a52.06 52.06 0 0 1-52-52"/></svg>
                  </div>
                </div>
                <input type="text" class="form-control google_login" id="name" style="border-left: 0px !important;" placeholder="Enter Full Name">
              </div>
              <div class="input-group mb-2 mr-sm-2">
                <div class="input-group-prepend ">
                  <div class="input-group-text google_login">
                     <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 16 16"><g fill="currentColor"><path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/><path d="M8 14a1 1 0 1 0 0-2a1 1 0 0 0 0 2"/></g></svg>
                  </div>
                </div>
                <input type="text" class="form-control google_login" id="phone" style="border-left: 0px !important;" placeholder="Enter your Phone Number">
              </div>
              <div class="input-group mb-2 mr-sm-2">
                <div class="input-group-prepend ">
                  <div class="input-group-text google_login">
                      <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><path fill="black" d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2zm-2 0l-8 5l-8-5zm0 12H4V8l8 5l8-5z"/></svg>
                  </div>
                </div>
                <input type="text" class="form-control google_login" id="email" style="border-left: 0px !important;" placeholder="Enter your email address">
              </div>
              <div class="input-group mb-2 mr-sm-2">
                <div class="input-group-prepend ">
                  <div class="input-group-text google_login">
                     <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><path fill="black" d="M12 13a1.49 1.49 0 0 0-1 2.61V17a1 1 0 0 0 2 0v-1.39A1.49 1.49 0 0 0 12 13m5-4V7A5 5 0 0 0 7 7v2a3 3 0 0 0-3 3v7a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-7a3 3 0 0 0-3-3M9 7a3 3 0 0 1 6 0v2H9Zm9 12a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-7a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1Z"/></svg>
                  </div>
                </div>
                <input type="password" class="form-control google_login" id="password" style="border-left: 0px !important;" placeholder="Password">
              </div>
              <div class="input-group mb-2 mr-sm-2">
                <div class="input-group-prepend ">
                  <div class="input-group-text google_login">
                     <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><path fill="black" d="M12 13a1.49 1.49 0 0 0-1 2.61V17a1 1 0 0 0 2 0v-1.39A1.49 1.49 0 0 0 12 13m5-4V7A5 5 0 0 0 7 7v2a3 3 0 0 0-3 3v7a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-7a3 3 0 0 0-3-3M9 7a3 3 0 0 1 6 0v2H9Zm9 12a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-7a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1Z"/></svg>
                  </div>
                </div>
                <input type="password" class="form-control google_login" id="password_confirmation" style="border-left: 0px !important;" placeholder="Confrim Password">
              </div>
        </div>
        
        <div class="w-100">
             <button type="button" class="btn btn-primary btn_primary low_radius w-100 mt-4" id="create_admin_account">Create Account</button>
            
        </div>
        <div class="w-100 d-flex justify-content-center mt-4">
            <p>Have an account? <a href="/auth/sign_in" class="active">Sign In</a></p>
            
            
        </div>
        <div class="w-100 d-flex justify-content-start mt-4">
            <p>By continuing you are agreeing to the our privacy <a href="#" class="active">policy</a> and <a href="#" class="active">terms</a> of use of BravePoint Ltd.</p>
            
        </div>
        
        
    </div>
    
</div>

</body>
@endsection