 @include('pages.components.header')
<div class="modal fade " id="product_details_modal" tabindex="-1" aria-labelledby="product_details_modalLabel" aria-hidden="true">
  <div class="modal-dialog product_detail_model">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="product_details_modalLabel font-weight-bold">Product Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="product_details w-100 ">
          <div class="product_img">
            
            <img src="/assets/img/products/product2.webp">
          </div>
          <div class="d-flex justify-content-between mt-3">
            <div>
              <h3>Ibacode Herbal Tea</h3>
            </div>
            <div>
              <img src="/assets/img/products/rating.svg">
              <div class="gray_background   mt-2">
                <p class="font-weight-bold star_rating_reviews"> 24 Reviews</p>
                
              </div>
              
            </div>
            
          </div>
          <div class="w-100 mt-4">
            <label class="checkbox-container mt-2">
              <input type="radio" name="radio-group"  value="option1">
              <span class="checkmark"></span>

              <div class="d-flex justify-content-between">
                <span class="relative mt-1 font-weight-bold"style="z-index:100">Carton</span>
                <span class="relative mt-1 font-weight-bold mr-2"style="z-index:100">NGN 35,000.0/carton</span>
                
              </div>
              
            </label>
            <label class="checkbox-container mt-4">
              <input type="radio" name="radio-group"  value="option1">
              <span class="checkmark"></span>

              <div class="d-flex justify-content-between">
                <span class="relative mt-1 font-weight-bold"style="z-index:100">Sachet bags</span>
                <span class="relative mt-1 font-weight-bold mr-2"style="z-index:100">NGN 15,000.0/bag</span>
                
              </div>
              
            </label>

          </div>
          <div class="w-100 d-flex justify-content-between mt-4">
            <div>
              <h5 class="font-weight-bolder"> Quantity</h5>
            </div>
            <div style="width: 66px;">
              <input type="number" name="" class="form-control gray_background mr-3" min="0">
            </div>
            
            
          </div>
          <div class="gray_background w-100 d-flex justify-content-center mt-4" style="height:40px">
            <p class="my-auto">One box (16 bags) included with purchase.</p>
            
          </div>
          <div class="w-100 mt-4">
            <ul class="nav nav-pills mb-3 d-flex w-100" id="pills-tab" role="tablist">
              <li class="nav-item w-50" role="presentation">
                <button class="nav-link active w-100 " id="pills-home-tab" data-toggle="pill" data-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Product Description</button>
              </li>
              <li class="nav-item w-50" role="presentation">
                <button class="nav-link w-100" id="pills-profile-tab" data-toggle="pill" data-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Reviews</button>
              </li>
             
            </ul>
            <div class="tab-content" id="pills-tabContent mr-2 ml-2">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">...</div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
            </div>

            
          </div>
          
          
        </div>
        <div class="cart w-100 d-none">
          <div class="cart_img_box d-flex ">
            <div class="cart_img w-50">
              <img src="/assets/img/products/product2.webp">
            </div>
            <div class="ml-2 w-50">
              <div class="d-flex">
                <h3>Ibacode Herbal Tea</h3>
                <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><path fill="#F68634" d="M16 9v10H8V9zm-1.5-6h-5l-1 1H5v2h14V4h-3.5zM18 7H6v12c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2z"/></svg>
                
              </div>
              <span class="mt-3 font-weight-bold ">NGN 35,000.00</span>
               <div class="w-100 cart_info_box mt-2">
                <p class="p-2 font-weight-bold">One box (16 bags) included with purchase.</p>
            
              </div>
              <div class="w-100 d-flex justify-content-between mt-4">
                <div>
                    <h5 class="font-weight-bolder"> Quantity</h5>
                  </div>
                  <div style="width: 66px;">
                    <input type="number" name="" class="form-control gray_background mr-3" min="0" value="1">
                  </div>
                </div>
              
            </div>
            
            
          </div>

        </div>
    
      </div>
      <div class="modal-footer d-flex justify-content-between">
       <h2>NGN 37,000.00</h2>
        <button type="button" class="btn btn-primary btn_primary low_radius add_to_cart">Add To Cart</button>
         <a type="a" href="/cart"  class="btn btn-primary btn_primary low_radius checkout d-none">Checkout</a>
      </div>
    </div>
  </div>
</div>







    <main>
        <div class="hero_product_image">
            <div class="hero_product_text">
              <div class="d-flex">
              <p class="font-weight-bold">Shop all</p> <svg class="mt-1 mt-lg-2  ml-2 mr-2" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="white" d="m5.5 4.14l-1 1.72L15 12L4.5 18.14l1 1.72L19 12z"/></svg><p class="font-weight-bold">Shop all</p>
            </div>
            <div class="d_flex_grid justify-content-between w-100">
              
            
              <h1 class="hero_product_text_text" style="white-space: nowrap;" data-aos="fade-up" data-aos-delay="300">All Products</h1>
              <p data-aos="zoom-in" data-aos-delay="300" class="project_long_text ml-sm-0 ml-md-0 ml-lg-3">All of the items our customers love the most, from malaria cure to memory booster to immune-boosting tinctures.</p>
              </div>
            
            </div>
        </div> 
        <div class="container mt-3 mb-5">
          <div class="d-flex justify-content-between w-100">
            <div class="socials  d_flex_grid">
              <h2 class="add_font remove_white_space">100 Products</h2> <p class="ml-0 mt-3 ml-sm-0  ml-md-5 mt-sm-2 mt-md-0 w-100 w-sm-100">Showing page 1 of 3</p>
              
            </div>
            <div class="d_flex_grid">
              <select class="form-control select " style="background:#b3b3b3;color: #000000;">
                <option>Sort By</option>
              </select>
              <select class="form-control select ml-0 ml-sm-0 ml-md-3" style="background:#b3b3b3;color: #000000;">
                <option>Filters</option>
              </select>
            </div>
            
          </div>
          
        </div>
        <div class="container mt-3">
          <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-3 mt-2">
              <div data-toggle="modal" data-target="#product_details_modal" class="product_card pointer mb-0 mt-0 mt-sm-2 mb-sm-2 ">
                <div class="product_card_imag_box">
                <img src="/assets/img/products/product1.webp">
              </div>
                <div class="product_description p-1">
                  <h6>Ibacode Herbal Tea</h6>
                  <div class="d-flex justify-content-between">
                    <p class="font-weight-bold">NGN 35,000.132</p>
                    <p>100ml</p>
                    
                  </div>
                  <div>
                    <p>Buy your prescription tincture blend here.</p>
                  </div>
                  
                </div>
                
              </div>
              
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-3 mt-2">
              <div data-toggle="modal" data-target="#product_details_modal" class="product_card pointer mb-0 mt-0 mt-sm-2 mb-sm-2 ">
                <div class="product_card_imag_box">
                <img src="/assets/img/products/image1.webp">
              </div>
                <div class="product_description p-1">
                  <h6>Ibacode Herbal Tea</h6>
                  <div class="d-flex justify-content-between">
                    <p class="font-weight-bold">NGN 35,000.132</p>
                    <p>100ml</p>
                    
                  </div>
                  <div>
                    <p>Buy your prescription tincture blend here.</p>
                  </div>
                  
                </div>
                
              </div>
              
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 mt-3 " style="">
              <div class="conslutation" style="border-radius: 10px;height: 450px;">
                
              
              <div class="pt-5 pb-5 pl-3 pr-2">
              <div class="w-100">
                <p>Not sure where to start?</p>
                <h1>Book a Free 15 Minute Herbal Consultation</h1>
                
              </div>
              <div class="w-100 mt-5">
                <p>
                  Book a remote session with one of our experienced Holists to better understand your specific health concerns & goals.
                </p>
              </div>
                <br>
                <p>n.b. not all Holists offer this type of consultation.</p>
                 <div class="w-100 mt-5">
                <button class="btn btn_primary low_radius">Book Now</button>
              </div>
            </div>
            </div>
            </div>
            
                 

              
            
            
          </div>
          
        </div> 

        <div class="container mt-3">
          <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-3 mt-2">
              <div data-toggle="modal" data-target="#product_details_modal" class="product_card pointer mb-0 mt-0 mt-sm-2 mb-sm-2 ">
                <div class="product_card_imag_box">
                <img src="/assets/img/products/product1.webp">
              </div>
                <div class="product_description p-1">
                  <h6>Ibacode Herbal Tea</h6>
                  <div class="d-flex justify-content-between">
                    <p class="font-weight-bold">NGN 35,000.132</p>
                    <p>100ml</p>
                    
                  </div>
                  <div>
                    <p>Buy your prescription tincture blend here.</p>
                  </div>
                  
                </div>
                
              </div>
              
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-3 mt-2">
              <div data-toggle="modal" data-target="#product_details_modal" class="product_card pointer mb-0 mt-0 mt-sm-2 mb-sm-2 ">
                <div class="product_card_imag_box">
                <img src="/assets/img/products/image1.webp">
              </div>
                <div class="product_description p-1">
                  <h6>Ibacode Herbal Tea</h6>
                  <div class="d-flex justify-content-between">
                    <p class="font-weight-bold">NGN 35,000.132</p>
                    <p>100ml</p>
                    
                  </div>
                  <div>
                    <p>Buy your prescription tincture blend here.</p>
                  </div>
                  
                </div>
                
              </div>
              
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-3 mt-2">
              <div data-toggle="modal" data-target="#product_details_modal" class="product_card pointer mb-0 mt-0 mt-sm-2 mb-sm-2 ">
                <div class="product_card_imag_box">
                <img src="/assets/img/products/product1.webp">
              </div>
                <div class="product_description p-1">
                  <h6>Ibacode Herbal Tea</h6>
                  <div class="d-flex justify-content-between">
                    <p class="font-weight-bold">NGN 35,000.132</p>
                    <p>100ml</p>
                    
                  </div>
                  <div>
                    <p>Buy your prescription tincture blend here.</p>
                  </div>
                  
                </div>
                
              </div>
              
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-3 mt-2">
              <div data-toggle="modal" data-target="#product_details_modal" class="product_card pointer mb-0 mt-0 mt-sm-2 mb-sm-2 ">
                <div class="product_card_imag_box">
                <img src="/assets/img/products/image1.webp">
              </div>
                <div class="product_description p-1">
                  <h6>Ibacode Herbal Tea</h6>
                  <div class="d-flex justify-content-between">
                    <p class="font-weight-bold">NGN 35,000.132</p>
                    <p>100ml</p>
                    
                  </div>
                  <div>
                    <p>Buy your prescription tincture blend here.</p>
                  </div>
                  
                </div>
                
              </div>
              
            </div>
            
            
                 

              
            
            
          </div>
          
        </div>




        <div class="container mt-3">
          <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 mt-3 " >
              <div class="spot_light">
             
              <div class="w-100" style="background:url(/assets/img/hero_image/leaf2.webp);height: 180px;">
              </div>
              <div class="pt-1 p-sm-1 pt-md-1
              pb-md-1 pl-md-5 pr-md-5 ">
                <div class="w-100">
                  <p>Not sure where to start?</p>
                  <h4>Discover the Wonders of Nature</h4>
                
                </div>
              <div class="w-100">
                <p style="color:#595959;">
                  Explore the fascinating world of herbs with our weekly spotlight. Each post dives deep into the history, uses, and benefits of a unique herb.  Whether you're a culinary enthusiast, a natural health advocate, or simply curious about nature, our detailed descriptions and practical tips will enrich your understanding and appreciation of these incredible plants.
                </p>
              </div>
              
              <div class="d-flex justify-content-between">
                <h6>Keep Reading</h6>
                <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><path fill="none" stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 12h16m0 0l-6-6m6 6l-6 6"/></svg>
                
              </div>
                 
            </div>
            </div>
          </div>


            <div class="col-12 col-sm-12 col-md-6 col-lg-3 mt-2">
              <div data-toggle="modal" data-target="#product_details_modal" class="product_card pointer mb-0 mt-0 mt-sm-2 mb-sm-2 ">
                <div class="product_card_imag_box">
                <img src="/assets/img/products/product1.webp">
              </div>
                <div class="product_description p-1">
                  <h6>Ibacode Herbal Tea</h6>
                  <div class="d-flex justify-content-between">
                    <p class="font-weight-bold">NGN 35,000.132</p>
                    <p>100ml</p>
                    
                  </div>
                  <div>
                    <p>Buy your prescription tincture blend here.</p>
                  </div>
                  
                </div>
                
              </div>
              
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-3 mt-2">
              <div data-toggle="modal" data-target="#product_details_modal" class="product_card pointer mb-0 mt-0 mt-sm-2 mb-sm-2 ">
                <div class="product_card_imag_box">
                <img src="/assets/img/products/image1.webp">
              </div>
                <div class="product_description p-1">
                  <h6>Ibacode Herbal Tea</h6>
                  <div class="d-flex justify-content-between">
                    <p class="font-weight-bold">NGN 35,000.132</p>
                    <p>100ml</p>
                    
                  </div>
                  <div>
                    <p>Buy your prescription tincture blend here.</p>
                  </div>
                  
                </div>
                
              </div>
              
            </div>
          </div>
          
        </div> 


        <div class="container mt-3 mb-5">
          <div class="d-flex justify-content-between w-100">
            <div class="socials  d-flex">
            <p class=" ml-5">Showing page 1 of 3</p>
              
            </div>
            <div class="d-flex">
             <button class="btn btn_primary low_radius">Next  <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><path fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 12h16m0 0l-6-6m6 6l-6 6"/></svg></button>
            </div>
            
          </div>
          
        </div>









       
      


        @include('pages.components.footer')