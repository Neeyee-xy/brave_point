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


</head>
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
             
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                  Shop
                </a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="/shop">Home</a>
                  <a class="dropdown-item" href="/all_products">All Products</a>
                  
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
               <li class="nav-item">
                <a class="nav-link" href="/blog">Blog</a>
              </li>
              
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control search_box search_opacity" type="search" placeholder="Search" aria-label="Search">
              
              <button class="btn border-0 search_btn" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24"><path fill="currentColor" d="M15.5 14h-.79l-.28-.27A6.47 6.47 0 0 0 16 9.5A6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5S14 7.01 14 9.5S11.99 14 9.5 14"/></svg></button>
              <button class="btn border-0 search d-none" type="submit">Search</button>
              <a class="nav-link" href="/sign_up">Sign Up</a>
              <a class="nav-link" href="#">Cart <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24"><path fill="currentColor" d="M20.756 5.345A1 1 0 0 0 20 5H6.181l-.195-1.164A1 1 0 0 0 5 3H2.75a1 1 0 1 0 0 2h1.403l1.86 11.164l.045.124l.054.151l.12.179l.095.112l.193.13l.112.065a1 1 0 0 0 .367.075H18a1 1 0 1 0 0-2H7.847l-.166-1H19a1 1 0 0 0 .99-.858l1-7a1 1 0 0 0-.234-.797M18.847 7l-.285 2H15V7zM14 7v2h-3V7zm0 3v2h-3v-2zm-4-3v2H7l-.148.03L6.514 7zm-2.986 3H10v2H7.347zM15 12v-2h3.418l-.285 2z"/><circle cx="8.5" cy="19.5" r="1.5" fill="currentColor"/><circle cx="17.5" cy="19.5" r="1.5" fill="currentColor"/></svg></a>

            </form>

          </div>
</nav>