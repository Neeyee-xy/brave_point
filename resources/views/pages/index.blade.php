 @include('pages.components.header')
 <?php
 use App\Models\HomePageSetting;
 use App\Models\Product;
if (!function_exists('find_product_image')) {
  function find_product_image($product_id){
    if ($product_id!==null) {
      $product_image=Product::find($product_id);
      return "src=".$product_image->image." slug=".$product_image->slug." alt=".$product_image->slug."";
    }

  }
}
if (!function_exists('find_product_slug')) {
  function find_product_slug($product_id){
    if ($product_id!==null) {
      $product_image=Product::find($product_id);
      return $product_image->slug;
    }

  }
}



 ?>

    <main>
        <div class="hero_image">
            <div class="hero_text">
              <h1 class="hero_text_text" data-aos="fade-up" data-aos-delay="300">{{$settings?->hero_text}}</h1>
              <p data-aos="zoom-in" data-aos-delay="300">{{$settings?->hero_sub_text}}</p>
              <a href="/all_products" class="btn btn_primary low_radius" data-aos="fade-right" data-aos-delay="300">Discover Now</a>
            </div>
        </div> 









        <div class="mt-5  container">
          <div class="row">
            <div class="col-11 col-sm-11 col-md-12 col-lg-4" data-aos="fade-right" data-aos-delay="300">
              <div class="w-100">
                <h1>Explore Our Products</h1>
                
              </div>
              <div class="w-100">
                  <p>We are NAFDAC and FDA (US) approved.
                  All our products created with the best natural ingredients and have been thoroughly reviewed, inspected as well as vetted by NAFDAC and FDA</p>

              </div>
              <div class="w-100 mt-5">
                <a class="btn btn_primary low_radius" href="/all_products">Shop Now</a>
              </div>
              <div class="w-100 d-flex mt-5  partners">
                <div class="d-flex partners_img">
                   <img src="/assets/img/partners/nafdac.svg">
                <img src="/assets/img/partners/fda.svg">
                  
                </div>
               
                  <div class="slide_btn d-flex mt-5">
                  <button href="#" class="slide_btn prev mr-3 slider_btn_css">
                    <svg xmlns="http://www.w3.org/2000/svg" width="0.75em" height="1em" viewBox="0 0 384 512"><path fill="currentColor" d="M380.6 81.7c7.9 15.8 1.5 35-14.3 42.9L103.6 256l262.7 131.4c15.8 7.9 22.2 27.1 14.3 42.9s-27.1 22.2-42.9 14.3l-320-160C6.8 279.2 0 268.1 0 256s6.8-23.2 17.7-28.6l320-160c15.8-7.9 35-1.5 42.9 14.3"/></svg>
                  </button>
                  <button href="#" class="slide_btn next slider_btn_css">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"><path fill="currentColor" d="M228 128a12 12 0 0 1-6.86 10.84l-152 72a12 12 0 0 1-10.27-21.69L188 128L58.87 66.85a12 12 0 0 1 10.27-21.69l152 72A12 12 0 0 1 228 128"/></svg>
                  </button>
                </div>
              </div>
              
            </div>
            <div class="col-11 col-sm-11 col-md-12 col-lg-8" data-aos="fade-left" data-aos-delay="300">
              

              <div class="slide_wrap w-100">
                <div class="slide_show">
                <div class="slide_img">
                  <div class="slide  d-flex justify-content-center px-5 mr-3">
                    <a  class="my-auto" href="/all_products?product_id={{$settings?->product_id_1}}&slug={{find_product_slug($settings?->product_id_1)}}">
                    <img  class="slide_img_ my-auto" {{find_product_image($settings?->product_id_1)}} >
                  </a>
                     <!-- <div class="slide_inner_box p-3">
                      <p>01-</p>
                      <p>Abdocare Herbal Tea</p>
                      
                    </div> -->
                  </div>
                  <div class="slide d-flex justify-content-center px-5 mr-3" style="background:#F1F0F3;">
                     <a  class="my-auto" href="/all_products?product_id={{$settings?->product_id_2}}&slug={{find_product_slug($settings?->product_id_2)}}">
                    <img  class="slide_img_ my-auto" {{find_product_image($settings?->product_id_2)}} >
                  </a>

                  </div>
                  <div class="slide d-flex justify-content-center px-5 mr-3">
                    <a  class="my-auto" href="/all_products?product_id={{$settings?->product_id_3}}&slug={{find_product_slug($settings?->product_id_3)}}">
                    <img  class="slide_img_ my-auto" {{find_product_image($settings?->product_id_3)}} >
                  </a>
                  </div>
                   <div class="slide d-flex justify-content-center px-5 mr-3">
                    <a  class="my-auto" href="/all_products?product_id={{$settings?->product_id_4}}&slug={{find_product_slug($settings?->product_id_4)}}">
                    <img  class="slide_img_ my-auto" {{find_product_image($settings?->product_id_4)}} >
                  </a>
                  </div>
                  <div class="slide d-flex justify-content-center px-5 mr-3">
                    <a  class="my-auto" href="/all_products?product_id={{$settings?->product_id_5}}&slug={{find_product_slug($settings?->product_id_5)}}">
                    <img  class="slide_img_ my-auto" {{find_product_image($settings?->product_id_5)}} >
                  </a>
                  </div>
                  <div class="slide d-flex justify-content-center px-5 mr-3">
                    <a  class="my-auto" href="/all_products?product_id={{$settings?->product_id_6}}&slug={{find_product_slug($settings?->product_id_6)}}">
                    <img  class="slide_img_ my-auto" {{find_product_image($settings?->product_id_6)}} >
                  </a>
                  </div>
                  
                  </div> 
                </div>
              
              </div>


              
            </div>

            
          </div>
          
        </div>


        <div class="mt-5  container">
          <div class="row">
            <div class="col-11 col-sm-11  col-md-6 col-lg-6" data-aos="fade-right" data-aos-delay="300">
              <div class="w-100 ">
                <h1>Why Choose Herbal Remedies?</h1>

              </div>
              <div class="w-100 mt-5 ">
                <p>Herbal remedies have been used for centuries to support health and wellness. Here are some benefits of choosing our herbal products:
                </p>

              </div>
            </div>
           
            <div class="col-11 col-sm-11 col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="300">
              <div class="w-100 ml-sm-0 ml-md-4">
                <div class="">
                <p><b>Natural Ingredients:</b> Made from pure, natural herbs with no artificial additives.</p>

                </div>
                <div class="w-100">
                <p style="color:#7c8c9c"><b>Effective Solutions:</b> Scientifically formulated to provide relief and promote overall health.</p>

                </div>
                <div class="w-100">
                <p style="color:#7c8c9c"><b>Holistic Approach:</b> Addresses the root cause of health issues rather than just symptoms.</p>

                </div>
                

              </div>
              
            </div>
          </div>
        </div>
       
        <div class="container mt-5 mb-5">
          <div class="row">
            
          
          <div class="col-11 col-sm-11 col-md-12 col-lg-6" data-aos="fade-up-right" data-aos-delay="300">
             <div class="w-100">
                <h1>Shop By Concern</h1>
                
              </div>
              <div class="w-100 mt-5">
                  <p>Explore our carefully curated collection of natural herbs made from pure natural herbs extract based on modern scientific theory. We stock only tried, tested and trusted products.</p>

              </div>
              <div class="w-100 mt-5">
                <a class="btn btn_primary low_radius" href="/all_products">Shop Now</a>
              </div>
            
          </div>
          <div class="col-11 col-sm-11 col-md-12 col-lg-6">
            <div class="d-flex justify-content-between mt-5" data-aos="flip-left" data-aos-delay="300">
              <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" viewBox="0 0 14 14"><g fill="none" stroke="black" stroke-linecap="round" stroke-linejoin="round"><path d="M.5 7a6.5 6.5 0 1 0 13 0a6.5 6.5 0 1 0-13 0"/><path d="M2.529 7.664c.286-.139.994-.312 1.535.105s.554 1.146.493 1.458c-.06.312-.047 1.04.494 1.457c.54.417 1.249.244 1.535.105M8.833 6.5A1.667 1.667 0 1 0 7.32 4.137a1.25 1.25 0 1 0 .385 1.922a1.66 1.66 0 0 0 1.13.441ZM8.25 9a.25.25 0 1 1 0-.5m0 .5a.25.25 0 1 0 0-.5m-5-3a.25.25 0 1 1 0-.5m0 .5a.25.25 0 1 0 0-.5m7 5a.25.25 0 0 1 0-.5m0 .5a.25.25 0 0 0 0-.5"/></g></svg>
                
              </div>
               <div>
                <h5><b>Malaria and Typhoid</b></h5>
                <p class="mt-2">Made from pure, natural herbs with no artificial additives.</p>
                <div class="d-flex">
                  <p class=""><a href="/all_products">Shop Now</a></p>
                <svg xmlns="http://www.w3.org/2000/svg"  class="mt-1 ml-2" width="3em" height="1.5em" viewBox="0 0 24 24"><path fill="#F68634" fill-rule="evenodd" d="M13.47 5.47a.75.75 0 0 1 1.06 0l6 6a.75.75 0 0 1 0 1.06l-6 6a.75.75 0 1 1-1.06-1.06l4.72-4.72H4a.75.75 0 0 1 0-1.5h14.19l-4.72-4.72a.75.75 0 0 1 0-1.06" clip-rule="evenodd"/></svg>
                </div>
                
              </div>
              

            </div>
            <div class="d-flex justify-content-between mt-5" data-aos="flip-left" data-aos-delay="300">
              <div>
                  <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" viewBox="0 0 48 48"><g fill="none" stroke="black"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="4.67" d="M19.036 44q-1.47-4.793-4.435-7.147c-2.965-2.353-7.676-.89-9.416-3.318s1.219-6.892 2.257-9.526s-3.98-3.565-3.394-4.313q.585-.748 7.609-4.316Q13.652 4 26.398 4C39.144 4 44 14.806 44 21.68c0 6.872-5.88 14.276-14.256 15.873q-1.123 1.636 3.24 6.447"/><path stroke-linejoin="round" stroke-width="4" d="M19.5 14.5q-.981 3.801.583 5.339q1.563 1.537 5.328 2.01q-.855 4.903 2.083 4.6q2.937-.302 3.53-2.44q4.59 1.29 4.976-2.16c.385-3.45-1.475-6.201-2.238-6.201s-2.738-.093-2.738-1.148s-2.308-1.65-4.391-1.65s-.83-1.405-3.69-.85q-2.86.555-3.443 2.5Z" clip-rule="evenodd"/><path stroke-linecap="round" stroke-width="4" d="M30.5 25.5c-1.017.631-2.412 1.68-3 2.5c-1.469 2.05-2.66 3.298-2.92 4.608"/></g></svg>
                
              </div>
               <div>
                <h5><b>Memory Boost</b></h5>
                <p class="">Made from pure, natural herbs with no artificial additives.</p>
                <div class="d-flex">
                  <p class=""><a href="/all_products">Shop Now</a></p>
                  <svg xmlns="http://www.w3.org/2000/svg" class="mt-1 ml-3 " width="1.5em" height="1.5em" viewBox="0 0 24 24"><path fill="#F68634" fill-rule="evenodd" d="M13.47 5.47a.75.75 0 0 1 1.06 0l6 6a.75.75 0 0 1 0 1.06l-6 6a.75.75 0 1 1-1.06-1.06l4.72-4.72H4a.75.75 0 0 1 0-1.5h14.19l-4.72-4.72a.75.75 0 0 1 0-1.06" clip-rule="evenodd"/></svg>
              </div>
            </div>
              

            </div>

            <div class="d-flex justify-content-between mt-5"  data-aos="flip-left" data-aos-delay="300">
              <div>
                  <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" viewBox="0 0 48 48"><path fill="black" fill-rule="evenodd" d="M29.587 16.464c.305-.305.369-.77.235-1.18c-.704-2.149.038-4.903 2.08-6.945c2.687-2.687 6.609-3.123 8.76-.973s1.713 6.072-.974 8.76c-2.018 2.017-4.73 2.766-6.868 2.104c-.406-.126-.862-.057-1.163.244l-.24.241a3.55 3.55 0 0 1-2.719 1.14l-3.224-.12c-2.464-.091-4.308 2.39-3.49 4.699l.273.774c1.29 3.647-1.644 7.562-5.534 7.38l-1.964-.09c-.969-.045-1.748.852-1.566 1.803l.31 1.628c.487 2.549-1.34 5.046-3.934 5.378l-1.46.188a1.467 1.467 0 1 1-.373-2.911l1.57-.202c.865-.11 1.474-.943 1.312-1.792l-.31-1.629c-.545-2.853 1.792-5.544 4.697-5.41l1.965.092c1.768.082 3.102-1.698 2.515-3.355l-.274-.774c-1.517-4.287 1.908-8.896 6.483-8.726l3.224.12a.5.5 0 0 0 .389-.162z" clip-rule="evenodd"/></svg>
                
              </div>
               <div>
                <h5><b>Erectile Dysfunction</b></h5>
                <p class="">Made from pure, natural herbs with no artificial additives.</p>
                <div class="d-flex">
                  <p class=""><a href="/all_products">Shop Now</a></p>
                <svg xmlns="http://www.w3.org/2000/svg" class="mt-1 ml-3 " width="1.5em" height="1.5em" viewBox="0 0 24 24"><path fill="#F68634" fill-rule="evenodd" d="M13.47 5.47a.75.75 0 0 1 1.06 0l6 6a.75.75 0 0 1 0 1.06l-6 6a.75.75 0 1 1-1.06-1.06l4.72-4.72H4a.75.75 0 0 1 0-1.5h14.19l-4.72-4.72a.75.75 0 0 1 0-1.06" clip-rule="evenodd"/></svg>
                </div>
                
              </div>
              

            </div>
          </div>
            
          </div>
        </div>
        <div class="w-100 conslutation d-flex justify-content-center">
          <div class="conslutation_inner_box my-auto">
            <div class="row">
              <div class="col-11 col-sm-11 col-md-12  col-lg-6 my-auto " data-aos="zoom-in" data-aos-delay="300">
                <div class="w-100">
                <p>Not sure where to start?</p>
                <h1>Book a Free 15 Minute Herbal Consultation</h1>
                
              </div>
            </div>
              <div class="col-11 col-sm-11 col-md-12  col-lg-6 conslutation_inner_box_right" data-aos="zoom-in" data-aos-delay="300">
                 <div class="w-100 mt-5">
                <p>
                  Book a remote session with one of our experienced Holists to better understand your specific health concerns & goals.
                </p>
              </div>
                <br>
                <p>n.b. not all Holists offer this type of consultation.</p>
                 <div class="w-100 mt-5">
                <a class="btn btn_primary low_radius" href="/contact">Book Now</a>
              </div>
              </div>
            </div>
            
          </div>
          
        </div>
        <div class="container socials mt-5">
          <div class="w-100 d-flex justify-content-between">
            <div class="socials">
              <h2>Follow Our Socials</h2>
              
            </div>
            <div class="d-flex justify-content-center">
              <a href="{{$settings?->fb}}" data-aos="flip-up"  data-aos-delay="300">
              <svg class="ml-3" xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 16 16"><path fill="black" d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131c.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/></svg>
            </a>
              <a href="{{$settings?->ig}}" data-aos="flip-up"  data-aos-delay="300">
              <svg class="ml-3" xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><path fill="black" fill-rule="evenodd" d="M7.465 1.066C8.638 1.012 9.012 1 12 1s3.362.013 4.534.066s1.972.24 2.672.511c.733.277 1.398.71 1.948 1.27c.56.549.992 1.213 1.268 1.947c.272.7.458 1.5.512 2.67C22.988 8.639 23 9.013 23 12s-.013 3.362-.066 4.535c-.053 1.17-.24 1.97-.512 2.67a5.4 5.4 0 0 1-1.268 1.949c-.55.56-1.215.992-1.948 1.268c-.7.272-1.5.458-2.67.512c-1.174.054-1.548.066-4.536.066s-3.362-.013-4.535-.066c-1.17-.053-1.97-.24-2.67-.512a5.4 5.4 0 0 1-1.949-1.268a5.4 5.4 0 0 1-1.269-1.948c-.271-.7-.457-1.5-.511-2.67C1.012 15.361 1 14.987 1 12s.013-3.362.066-4.534s.24-1.972.511-2.672a5.4 5.4 0 0 1 1.27-1.948a5.4 5.4 0 0 1 1.947-1.269c.7-.271 1.5-.457 2.67-.511m8.98 1.98c-1.16-.053-1.508-.064-4.445-.064s-3.285.011-4.445.064c-1.073.049-1.655.228-2.043.379c-.513.2-.88.437-1.265.822a3.4 3.4 0 0 0-.822 1.265c-.151.388-.33.97-.379 2.043c-.053 1.16-.064 1.508-.064 4.445s.011 3.285.064 4.445c.049 1.073.228 1.655.379 2.043c.176.477.457.91.822 1.265c.355.365.788.646 1.265.822c.388.151.97.33 2.043.379c1.16.053 1.507.064 4.445.064s3.285-.011 4.445-.064c1.073-.049 1.655-.228 2.043-.379c.513-.2.88-.437 1.265-.822c.365-.355.646-.788.822-1.265c.151-.388.33-.97.379-2.043c.053-1.16.064-1.508.064-4.445s-.011-3.285-.064-4.445c-.049-1.073-.228-1.655-.379-2.043c-.2-.513-.437-.88-.822-1.265a3.4 3.4 0 0 0-1.265-.822c-.388-.151-.97-.33-2.043-.379m-5.85 12.345a3.669 3.669 0 0 0 4-5.986a3.67 3.67 0 1 0-4 5.986M8.002 8.002a5.654 5.654 0 1 1 7.996 7.996a5.654 5.654 0 0 1-7.996-7.996m10.906-.814a1.337 1.337 0 1 0-1.89-1.89a1.337 1.337 0 0 0 1.89 1.89" clip-rule="evenodd"/></svg>
              </a>
              <a href="{{$settings?->yb}}" data-aos="flip-up"  data-aos-delay="300">
             <svg class="ml-3" xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><g fill="none" stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M2 8a4 4 0 0 1 4-4h12a4 4 0 0 1 4 4v8a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4z"/><path d="m10 9l5 3l-5 3z"/></g></svg>
              </a>
            </div>
          </div>
            <div class="w-100  product_grid d_flex_grid justify-content-between">
              <div class="img_box_footer px-3 py-3 mr-3" data-aos="zoom-in-right"  data-aos-delay="300">
                <a class="my-auto"  href="/all_products?product_id={{$settings?->product_id_7}}&slug={{find_product_slug($settings?->product_id_7)}}">
                    
                    <img  class="mr-2 ml-2 img_box_footer_img" {{find_product_image($settings?->product_id_7)}} >
                  </a>
                </div>
                   <div class="img_box_footer px-3 py-3 mr-3" data-aos="zoom-in-right"  data-aos-delay="300">
                    <a class="my-auto"  href="/all_products?product_id={{$settings?->product_id_8}}&slug={{find_product_slug($settings?->product_id_8)}}">
                    
                    <img  class="mr-2 ml-2 img_box_footer_img" {{find_product_image($settings?->product_id_8)}} >
                  </a>
                </div>
                  <div class="img_box_footer px-3 py-3 mr-3" data-aos="zoom-in-right"  data-aos-delay="300">
                    <a class="my-auto"  href="/all_products?product_id={{$settings?->product_id_9}}&slug={{find_product_slug($settings?->product_id_9)}}">
                    
                    <img  class="mr-2 ml-2 img_box_footer_img" {{find_product_image($settings?->product_id_9)}} >
                  </a>
                </div>
                  <div class="img_box_footer px-3 py-3 mr-3" data-aos="zoom-in-right"  data-aos-delay="300">
                    <a class="my-auto"  href="/all_products?product_id={{$settings?->product_id_10}}&slug={{find_product_slug($settings?->product_id_10)}}">
                    
                    <img  class="mr-2 ml-2 img_box_footer_img" {{find_product_image($settings?->product_id_10)}} >
                  </a>
                </div>
                  <div class="img_box_footer px-3 py-3 mr-3" data-aos="zoom-in-right"  data-aos-delay="300">
                    <a class="my-auto"  href="/all_products?product_id={{$settings?->product_id_11}}&slug={{find_product_slug($settings?->product_id_11)}}">
                    
                    <img  class="mr-2 ml-2 img_box_footer_img" {{find_product_image($settings?->product_id_11)}} >
                  </a>
                </div>
              
            

              
            </div>
            
        </div>
          
        </div>
        <div class=" conslutation mt-5 pt-5" style="background: #EEEDED;
  overflow-x: hidden;">
          
       
        <div class="container_slider p-5" data-aos="zoom-in-left"  data-aos-delay="300">

  <div class="carousel_slider">
    <div class="a">
      <div class="item_slider item_slider_background p-3 pt-4">
        <div class="d_flex_grid p-2">
          <div class="">
            <div class="background_box">
              
            </div>
            <div class="image_box_slider">
              <img src="/assets/img/avater/image1.svg">
              
            </div>
            
          </div>
          <div class="w-100 ml-sm-0 ml-lg-5">
            <div>
              <h5 >"A friend recommended Ibacode when I had a very nad Malaria and when I prepared it in 24 hrs - I had great relief"</h5 >
            </div>
            <div class="mt-sm-0 mt-lg-5">
              <img src="/assets/img/logos/stars.svg">
            </div>
            <div class="customer_name pt-3 mt-3 mt-sm-3 mt-lg-3">


              <h5>
                SOLA O.
              </h5>
              
            </div>
            <div>
              
            </div>
            
          </div>
          
        </div>
      </div>
    </div>
    <div class="b">
      <div class="item_slider item_slider_background p-3 pt-4">
        <div class="d_flex_grid p-2">
          <div class="">
            <div class="background_box">
              
            </div>
            <div class="image_box_slider">
              <img src="/assets/img/avater/image2.svg">
              
            </div>
            
          </div>
          <div class="w-100 ml-sm-0 ml-lg-5">
            <div>
              <h5 >"A friend recommended Ibacode when I had a very nad Malaria and when I prepared it in 24 hrs - I had great relief"</h5 >
            </div>
              <div class="mt-sm-0 mt-lg-5">
              <img src="/assets/img/logos/stars.svg">
            </div>
            <div class="customer_name pt-3 mt-3 mt-sm-3 mt-lg-3">


              <h5>
                Liquid O.
              </h5>
              
            </div>
            <div>
              
            </div>
            
          </div>
          
        </div>
      </div>
    </div>
    <div class="c">
      <div class="item_slider item_slider_background p-3 pt-4">
        <div class="d_flex_grid p-2">
          <div class="">
            <div class="background_box">
              
            </div>
            <div class="image_box_slider">
              <img src="/assets/img/avater/image2.svg">
              
            </div>
            
          </div>
          <div class="w-100 ml-sm-0 ml-lg-5">
            <div>
              <h5 >"A friend recommended Ibacode when I had a very nad Malaria and when I prepared it in 24 hrs - I had great relief"</h5 >
            </div>
              <div class="mt-sm-0 mt-lg-5">
              <img src="/assets/img/logos/stars.svg">
            </div>
            <div class="customer_name pt-3 mt-3 mt-sm-3 mt-lg-3">


              <h5>
                Liquid O.
              </h5>
              
            </div>
            <div>
              
            </div>
            
          </div>
          
        </div>
      </div>
    </div>
    <div class="d">
      <div class="item_slider item_slider_background p-3 pt-4">
        <div class="d_flex_grid p-2">
          <div class="">
            <div class="background_box">
              
            </div>
            <div class="image_box_slider">
              <img src="/assets/img/avater/image2.svg">
              
            </div>
            
          </div>
          <div class="w-100 ml-sm-0 ml-lg-5">
            <div>
              <h5 >"A friend recommended Ibacode when I had a very nad Malaria and when I prepared it in 24 hrs - I had great relief"</h5 >
            </div>
              <div class="mt-sm-0 mt-lg-5">
              <img src="/assets/img/logos/stars.svg">
            </div>
            <div class="customer_name pt-3 mt-3 mt-sm-3 mt-lg-3">


              <h5>
                Liquid O.
              </h5>
              
            </div>
            <div>
              
            </div>
            
          </div>
          
        </div>
      </div>
    </div>
    <div class="e">
      <div class="item_slider item_slider_background p-3 pt-4">
        <div class="d_flex_grid p-2">
          <div class="">
            <div class="background_box">
              
            </div>
            <div class="image_box_slider">
              <img src="/assets/img/avater/image2.svg">
              
            </div>
            
          </div>
          <div class="w-100 ml-sm-0 ml-lg-5">
            <div>
              <h5 >"A friend recommended Ibacode when I had a very nad Malaria and when I prepared it in 24 hrs - I had great relief"</h5 >
            </div>
              <div class="mt-sm-0 mt-lg-5">
              <img src="/assets/img/logos/stars.svg">
            </div>
            <div class="customer_name pt-3 mt-3 mt-sm-3 mt-lg-3">


              <h5>
                Liquid O.
              </h5>
              
            </div>
            <div>
              
            </div>
            
          </div>
          
        </div>
      </div>
    </div>
    <div class="f">
     <div class="item_slider item_slider_background p-3 pt-4">
        <div class="d_flex_grid p-2">
          <div class="">
            <div class="background_box">
              
            </div>
            <div class="image_box_slider">
              <img src="/assets/img/avater/image2.svg">
              
            </div>
            
          </div>
          <div class="w-100 ml-sm-0 ml-lg-5">
            <div>
              <h5 >"A friend recommended Ibacode when I had a very nad Malaria and when I prepared it in 24 hrs - I had great relief"</h5 >
            </div>
              <div class="mt-sm-0 mt-lg-5">
              <img src="/assets/img/logos/stars.svg">
            </div>
            <div class="customer_name pt-3 mt-3 mt-sm-3 mt-lg-3">


              <h5>
                Liquid O.
              </h5>
              
            </div>
            <div>
              
            </div>
            
          </div>
          
        </div>
      </div>
    </div>
    <div class="g">
    <div class="item_slider item_slider_background p-3 pt-4">
        <div class="d_flex_grid p-2">
          <div class="">
            <div class="background_box">
              
            </div>
            <div class="image_box_slider">
              <img src="/assets/img/avater/image2.svg">
              
            </div>
            
          </div>
          <div class="w-100 ml-sm-0 ml-lg-5">
            <div>
              <h5 >"A friend recommended Ibacode when I had a very nad Malaria and when I prepared it in 24 hrs - I had great relief"</h5 >
            </div>
              <div class="mt-sm-0 mt-lg-5">
              <img src="/assets/img/logos/stars.svg">
            </div>
            <div class="customer_name pt-3 mt-3 mt-sm-3 mt-lg-3">


              <h5>
                Liquid O.
              </h5>
              
            </div>
            <div>
              
            </div>
            
          </div>
          
        </div>
      </div>
    </div>
    <div class="h">
      <div class="item_slider item_slider_background p-3 pt-4">
        <div class="d_flex_grid p-2">
          <div class="">
            <div class="background_box">
              
            </div>
            <div class="image_box_slider">
              <img src="/assets/img/avater/image2.svg">
              
            </div>
            
          </div>
          <div class="w-100 ml-sm-0 ml-lg-5">
            <div>
              <h5 >"A friend recommended Ibacode when I had a very nad Malaria and when I prepared it in 24 hrs - I had great relief"</h5 >
            </div>
              <div class="mt-sm-0 mt-lg-5">
              <img src="/assets/img/logos/stars.svg">
            </div>
            <div class="customer_name pt-3 mt-3 mt-sm-3 mt-lg-3">


              <h5>
                Liquid O.
              </h5>
              
            </div>
            <div>
              
            </div>
            
          </div>
          
        </div>
      </div>
    </div>
    <div class="i">
      <div class="item_slider item_slider_background p-3 pt-4">
        <div class="d_flex_grid p-2">
          <div class="">
            <div class="background_box">
              
            </div>
            <div class="image_box_slider">
              <img src="/assets/img/avater/image2.svg">
              
            </div>
            
          </div>
          <div class="w-100 ml-sm-0 ml-lg-5">
            <div>
              <h5 >"A friend recommended Ibacode when I had a very nad Malaria and when I prepared it in 24 hrs - I had great relief"</h5 >
            </div>
              <div class="mt-sm-0 mt-lg-5">
              <img src="/assets/img/logos/stars.svg">
            </div>
            <div class="customer_name pt-3 mt-3 mt-sm-3 mt-lg-3">


              <h5>
                Liquid O.
              </h5>
              
            </div>
            <div>
              
            </div>
            
          </div>
          
        </div>
      </div>
    </div>
    <div class="j">
      <div class="item_slider item_slider_background p-3 pt-4">
        <div class="d_flex_grid p-2">
          <div class="">
            <div class="background_box">
              
            </div>
            <div class="image_box_slider">
              <img src="/assets/img/avater/image2.svg">
              
            </div>
            
          </div>
          <div class="w-100 ml-sm-0 ml-lg-5">
            <div>
              <h5 >"A friend recommended Ibacode when I had a very nad Malaria and when I prepared it in 24 hrs - I had great relief"</h5 >
            </div>
              <div class="mt-sm-0 mt-lg-5">
              <img src="/assets/img/logos/stars.svg">
            </div>
            <div class="customer_name pt-3 mt-3 mt-sm-3 mt-lg-3">


              <h5>
                Liquid O.
              </h5>
              
            </div>
            <div>
              
            </div>
            
          </div>
          
        </div>
      </div>
    </div>
    <div class="k">
      <div class="item_slider item_slider_background p-3 pt-4">
        <div class="d_flex_grid p-2">
          <div class="">
            <div class="background_box">
              
            </div>
            <div class="image_box_slider">
              <img src="/assets/img/avater/image2.svg">
              
            </div>
            
          </div>
          <div class="w-100 ml-sm-0 ml-lg-5">
            <div>
              <h5 >"A friend recommended Ibacode when I had a very nad Malaria and when I prepared it in 24 hrs - I had great relief"</h5 >
            </div>
              <div class="mt-sm-0 mt-lg-5">
              <img src="/assets/img/logos/stars.svg">
            </div>
            <div class="customer_name pt-3 mt-3 mt-sm-3 mt-lg-3">


              <h5>
                Liquid O.
              </h5>
              
            </div>
            <div>
              
            </div>
            
          </div>
          
        </div>
      </div>
    </div>
  </div>

</div>
<div class="slide_btn d-flex  w-100 justify-content-center " style="margin-top: 156px !important;">
                  <button href="#" class="slide_btn next_slider mr-3 slider_btn_css">
                    <svg xmlns="http://www.w3.org/2000/svg" width="0.75em" height="1em" viewBox="0 0 384 512"><path fill="currentColor" d="M380.6 81.7c7.9 15.8 1.5 35-14.3 42.9L103.6 256l262.7 131.4c15.8 7.9 22.2 27.1 14.3 42.9s-27.1 22.2-42.9 14.3l-320-160C6.8 279.2 0 268.1 0 256s6.8-23.2 17.7-28.6l320-160c15.8-7.9 35-1.5 42.9 14.3"/></svg>
                  </button>
                  <button href="#" class="slide_btn prev_slider slider_btn_css">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"><path fill="currentColor" d="M228 128a12 12 0 0 1-6.86 10.84l-152 72a12 12 0 0 1-10.27-21.69L188 128L58.87 66.85a12 12 0 0 1 10.27-21.69l152 72A12 12 0 0 1 228 128"/></svg>
                  </button>
                </div>


     </div>  


        @include('pages.components.footer')