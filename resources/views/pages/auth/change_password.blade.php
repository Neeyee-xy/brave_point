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
            <img src="/assets/img/logos/BravePoint.svg" data-aos="zoom-in" data-aos-delay="300">
            
        </div>
        <div class="w-100 mt-5 mb-5">
            <h4>Reset Password</h4>
         
            
        </div>
       
        <div class="w-100">
            <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend ">
                              <div class="input-group-text google_login">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><path fill="black" d="M12 13a1.49 1.49 0 0 0-1 2.61V17a1 1 0 0 0 2 0v-1.39A1.49 1.49 0 0 0 12 13m5-4V7A5 5 0 0 0 7 7v2a3 3 0 0 0-3 3v7a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-7a3 3 0 0 0-3-3M9 7a3 3 0 0 1 6 0v2H9Zm9 12a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-7a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1Z"/></svg>
                              </div>
                            </div>
                            <input type="text" class="form-control google_login" id="password" style="border-left: 0px !important;" placeholder="Password">
                </div>
                <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend ">
                              <div class="input-group-text google_login">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><path fill="black" d="M12 13a1.49 1.49 0 0 0-1 2.61V17a1 1 0 0 0 2 0v-1.39A1.49 1.49 0 0 0 12 13m5-4V7A5 5 0 0 0 7 7v2a3 3 0 0 0-3 3v7a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-7a3 3 0 0 0-3-3M9 7a3 3 0 0 1 6 0v2H9Zm9 12a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-7a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1Z"/></svg>
                              </div>
                            </div>
                            <input type="text" name="" id="token" value="{{$token}}" hidden>
                            <input type="text" class="form-control google_login" id="password_confirmation" style="border-left: 0px !important;" placeholder="Confirm Password">
                </div>
             
        </div>
       
        <div class="w-100">
             <button type="button" class="btn btn-primary btn_primary low_radius w-100 mt-4" id="change_password">Confirm</button>
            
        </div>
        
        
        
        
    </div>
    
</div>

</body>
@endsection