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
            <h4>Reset Password</h4>
         
            
        </div>
       
        <div class="w-100">
            <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend ">
                              <div class="input-group-text google_login">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><path fill="black" d="M12 13a1.49 1.49 0 0 0-1 2.61V17a1 1 0 0 0 2 0v-1.39A1.49 1.49 0 0 0 12 13m5-4V7A5 5 0 0 0 7 7v2a3 3 0 0 0-3 3v7a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-7a3 3 0 0 0-3-3M9 7a3 3 0 0 1 6 0v2H9Zm9 12a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-7a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1Z"/></svg>
                              </div>
                            </div>
                            <input type="text" class="form-control google_login" id="inlineFormInputGroupUsername2" style="border-left: 0px !important;" placeholder="Password">
                </div>
                <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend ">
                              <div class="input-group-text google_login">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><path fill="black" d="M12 13a1.49 1.49 0 0 0-1 2.61V17a1 1 0 0 0 2 0v-1.39A1.49 1.49 0 0 0 12 13m5-4V7A5 5 0 0 0 7 7v2a3 3 0 0 0-3 3v7a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-7a3 3 0 0 0-3-3M9 7a3 3 0 0 1 6 0v2H9Zm9 12a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-7a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1Z"/></svg>
                              </div>
                            </div>
                            <input type="text" class="form-control google_login" id="inlineFormInputGroupUsername2" style="border-left: 0px !important;" placeholder="Confirm Password">
                </div>
             
        </div>
       
        <div class="w-100">
             <button type="button" class="btn btn-primary btn_primary low_radius w-100 mt-4">Confirm</button>
            
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