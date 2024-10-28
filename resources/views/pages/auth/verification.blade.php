@extends('pages.components.main_page_auth')
@section('title') {{ 'Sign In' }} @endsection

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
            <h4>Email Verification</h4>
            
        </div>
       
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
     <div class="w-100">
             <a type="a" class="btn btn-primary btn_primary low_radius w-100 mt-4" href="/auth/sign_in">Sign In</a>
            
        </div>
@endif
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
     <div class="w-100">
             <a type="a" class="btn btn-primary btn_primary low_radius w-100 mt-4" href="/dashboard">Continue To Dashboard</a>
            
        </div>
@endif
       
       
        <div class="w-100 d-flex justify-content-start mt-4">
            <p>By continuing you are agreeing to the our privacy <a href="#" class="active">policy</a> and <a href="#" class="active">terms</a> of use of BravePoint Ltd.</p>
            
        </div>
        
        
    </div>
    
</div>

</body>
@endsection
