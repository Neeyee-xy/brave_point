<?php
use App\Models\Product;
use App\Models\Blog;
$products_nav=Product::get();
$blogs_nav=Blog::get();
?>
<!DOCTYPE html>
<html lang="en" class="html">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="/font/iconsmind-s/css/iconsminds.css" />
    <link rel="stylesheet" href="/font/simple-line-icons/css/simple-line-icons.css" />
    <link rel="stylesheet" href="/font/font-awesome_4.6.2.min.css" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - @if(isset($page_title)){{$page_title}}
        @endif</title>
   <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/vendor/bootstrap.min.css" />

    <link rel="stylesheet" href="/css/main12345.css" />
   <link rel="stylesheet" href="/plugins/toastr/toastr.min.css">

</head>
<style type="text/css">
  .search_item{
  display: none;
  margin-top: 0.125em;
  margin-left: 0.125em;
  background-color: #fff;
  border: 1px solid rgba(0, 0, 0, 0.175);
  border-radius: 0.375rem;
  padding-left: 10px;
  padding-right: 10px;
  }
.search_item{
  list-style-type: none;
  margin: 0;
  padding: 0;
  }
.search_item li{
  color: #e75e8d;

  padding: 9px 10px;
  letter-spacing: .3px;
  }
  .search_item li a{
  color: #e75e8d;
  }
  .search_item li:hover{
    color: black;
    background-color: #e9ecef;
  }
</style>
<body class="show-spinner">
    <nav class="navbar navbar-expand-lg navbar-light white_background">
          <!-- <a class="navbar-brand" href="#">Navbar</a> -->
          <a  href="/index"> <img src="/assets/img/logos/BravePoint.svg" data-aos="zoom-in" data-aos-delay="300"></a>
         
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item ">
                <a class="nav-link active" href="/index">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="/about_us">About Us </a>
              </li>
             
             <!--  <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                  Shop
                </a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="/shop">Home</a>
                  <a class="dropdown-item" href="/all_products">All Products</a>
                  
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li> -->
               <li class="nav-item">
                <a class="nav-link" href="/all_products">Shop</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/blog">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/contact">Contact Us</a>
              </li>
              
            </ul>
            <form class="form-inline my-2 my-lg-0" style="position: relative;">
              <input class="form-control search_box search_opacity" type="search" placeholder="Search" aria-label="Search" id="search_list" >
              <div class="w-100 search_ab_top" style="position: absolute;">
                          <ul class="search_item mt-3">
                            @foreach($products_nav as $product_nav)
                            
                              <li>
                                <a  class="" href="/all_products?product_id={{$product_nav->id}}&slug={{$product_nav->slug}}">{{$product_nav->name}}</a>
                              </li>
                              @endforeach

                            @foreach($blogs_nav as $blog_nav)
                            
                              <li>
                                <a  class="" href="/read_post?slug={{$product_nav->slug}}">{{$blog_nav->title}}</a>
                              </li>
                              @endforeach
                           
                              
                            
                           

                          </ul>
                       </div>  
              
              <button class="btn border-0 search_btn" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24"><path fill="currentColor" d="M15.5 14h-.79l-.28-.27A6.47 6.47 0 0 0 16 9.5A6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5S14 7.01 14 9.5S11.99 14 9.5 14"/></svg></button>
              <button class="btn border-0 search d-none" type="submit">Search</button>
              @if(Auth::check())
              <a class="nav-link" href="/dashboard"><svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24"><circle cx="12" cy="6" r="4" fill="currentColor"/><path fill="currentColor" d="M20 17.5c0 2.485 0 4.5-8 4.5s-8-2.015-8-4.5S7.582 13 12 13s8 2.015 8 4.5" opacity="0.5"/></svg></a>
              @else
              <a class="nav-link" href="/auth/sign_in">Sign In</a>
              @endif
              <a class="nav-link get_cart_items" data-toggle="modal" data-target="#product_details_modal" href="#">Cart <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24"><path fill="currentColor" d="M20.756 5.345A1 1 0 0 0 20 5H6.181l-.195-1.164A1 1 0 0 0 5 3H2.75a1 1 0 1 0 0 2h1.403l1.86 11.164l.045.124l.054.151l.12.179l.095.112l.193.13l.112.065a1 1 0 0 0 .367.075H18a1 1 0 1 0 0-2H7.847l-.166-1H19a1 1 0 0 0 .99-.858l1-7a1 1 0 0 0-.234-.797M18.847 7l-.285 2H15V7zM14 7v2h-3V7zm0 3v2h-3v-2zm-4-3v2H7l-.148.03L6.514 7zm-2.986 3H10v2H7.347zM15 12v-2h3.418l-.285 2z"/><circle cx="8.5" cy="19.5" r="1.5" fill="currentColor"/><circle cx="17.5" cy="19.5" r="1.5" fill="currentColor"/></svg>
              <span class="badge badge-success count_cart_item"></span>
              </a>


            </form>

          </div>
</nav>
<div class="modal fade " id="product_details_modal" tabindex="-1" aria-labelledby="product_details_modalLabel" aria-hidden="true">
  <div class="modal-dialog product_detail_model">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-bold" id="product_details_modalLabel">Product Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="w-100 d-flex justify-content-center">
          <div class="spinner-border text-danger" role="status">
            <span class="sr-only">Loading...</span>
          </div>
          
        </div>
        
        <div class="product_details w-100 ">
          
          
        </div>
        <div class="cart w-100 d-none">
        

        </div>
    
      </div>
      <div class="modal-footer d-flex justify-content-between">
       <h2 class="price_label"></h2>
       <h2 class="unit_label d-none"></h2>
       <h2 class="price_selected d-none"></h2>
        <button type="button" class="btn btn-primary btn_primary low_radius add_to_cart">Add To Cart</button>
         <a type="a" href="/cart"  class="btn btn-primary btn_primary low_radius checkout d-none">Checkout</a>
      </div>
    </div>
  </div>
</div>