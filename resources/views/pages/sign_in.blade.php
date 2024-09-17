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
    <link rel="stylesheet" href="/css/main.css" />
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
        height: 65px;
        color: #000;
        width: 60%;
        background: #fff;
        bottom: 10%;
        left: 10%;
        border-radius: 10px;
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
<div class="w-100 d_flex_grid">
    <div class="left_sign_box w_50_100">
         <img  src="/assets/img/hero_image/login.webp" alt="">
         <div class="left_sign_box_inner_box pl-4 pt-2">
            <h5>01 -----</h5>
            <p class="mt-1">Ibacode Herbal tea</p>
             
         </div>
        
    </div>
    <div class="right_sign_box w_50_100 cart_page">
        <div class="w-100">
            <img src="/assets/img/logos/BravePoint.svg" data-aos="zoom-in" data-aos-delay="300">
            
        </div>
        <div class="w-100 mt-5 mb-5">
            <h4>Sign In To Brave Point</h4>
            
        </div>
        <div class="w-100 google_login d-flex justify-content-center pt-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 48 48"><path fill="#ffc107" d="M43.611 20.083H42V20H24v8h11.303c-1.649 4.657-6.08 8-11.303 8c-6.627 0-12-5.373-12-12s5.373-12 12-12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4C12.955 4 4 12.955 4 24s8.955 20 20 20s20-8.955 20-20c0-1.341-.138-2.65-.389-3.917"/><path fill="#ff3d00" d="m6.306 14.691l6.571 4.819C14.655 15.108 18.961 12 24 12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4C16.318 4 9.656 8.337 6.306 14.691"/><path fill="#4caf50" d="M24 44c5.166 0 9.86-1.977 13.409-5.192l-6.19-5.238A11.9 11.9 0 0 1 24 36c-5.202 0-9.619-3.317-11.283-7.946l-6.522 5.025C9.505 39.556 16.227 44 24 44"/><path fill="#1976d2" d="M43.611 20.083H42V20H24v8h11.303a12.04 12.04 0 0 1-4.087 5.571l.003-.002l6.19 5.238C36.971 39.205 44 34 44 24c0-1.341-.138-2.65-.389-3.917"/></svg>
            <p class="mt-1 ml-3">Continue with Google</p>
            
        </div>

        <div class="w-100 d-flex justify-content-center mb-4 mt-4">
            <div class="hr_strike mr-2"></div><h4>OR</h4><div class="ml-2 hr_strike"></div>         
        </div>
        <div class="w-100">
            <div class="input-group mb-2 mr-sm-2">
                <div class="input-group-prepend ">
                  <div class="input-group-text google_login">
                      <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><path fill="black" d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2zm-2 0l-8 5l-8-5zm0 12H4V8l8 5l8-5z"/></svg>
                  </div>
                </div>
                <input type="text" class="form-control google_login" id="inlineFormInputGroupUsername2" style="border-left: 0px !important;" placeholder="Enter your email address">
              </div>
              <div class="input-group mb-2 mr-sm-2">
                <div class="input-group-prepend ">
                  <div class="input-group-text google_login">
                     <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><path fill="black" d="M12 13a1.49 1.49 0 0 0-1 2.61V17a1 1 0 0 0 2 0v-1.39A1.49 1.49 0 0 0 12 13m5-4V7A5 5 0 0 0 7 7v2a3 3 0 0 0-3 3v7a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-7a3 3 0 0 0-3-3M9 7a3 3 0 0 1 6 0v2H9Zm9 12a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-7a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1Z"/></svg>
                  </div>
                </div>
                <input type="text" class="form-control google_login" id="inlineFormInputGroupUsername2" style="border-left: 0px !important;" placeholder="Password">
              </div>
        </div>
        <div class="w-100">
            <a href="/forget_password">Forgot Password?</a>
        </div>
        <div class="w-100">
             <button type="button" class="btn btn-primary btn_primary low_radius w-100 mt-4">Sign In</button>
            
        </div>
        <div class="w-100 d-flex justify-content-center mt-4">
            <p>Don’t have account? <a href="/sign_up" class="active">Register Now</a></p>
            
        </div>
        <div class="w-100 d-flex justify-content-start mt-4">
            <p>By continuing you are agreeing to the our privacy <a href="#" class="active">policy</a> and <a href="#" class="active">terms</a> of use of BravePoint Ltd.</p>
            
        </div>
        
        
    </div>
    
</div>

</body>
<footer> 
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <script src="/js/vendor/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
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