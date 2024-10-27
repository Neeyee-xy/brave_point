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