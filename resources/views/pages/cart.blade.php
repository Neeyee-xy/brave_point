 @include('pages.components.header')





    <main>
       <div class="container cart_page">
        <div class="row">
          <div class="col-12 col-sm-12 col-md-6">
            <h5 class="font-weight-bold">Contact</h5>
            <input type="email" name="" class="form-control add_font_league_spartan mt-2" placeholder="Email Address">
             <input type="number" name="" class="form-control add_font_league_spartan mt-2" placeholder="Phone Number">
             <h5 class="font-weight-bold mt-4">Delivery</h5>
             <div class="row mt-2">
              <div class="col-12 col-sm-12 col-md-6">
                <input type="text" name="" class="form-control add_font_league_spartan mt-2" placeholder="First Name">
              </div>
              <div class="col-12 col-sm-12 col-md-6">
                 <input type="text" name="" class="form-control add_font_league_spartan mt-2" placeholder="Last Name">
                
              </div>
               
             </div>
            
             <input type="Text" name="" class="form-control add_font_league_spartan mt-2" placeholder="Address">
             <select class="form-control add_font_league_spartan mt-2">
               <option value=""> Country/Region</option>
             </select>
              <div class="row mt-2">
              <div class="col-12 col-sm-12 col-md-6">
                <input type="text" name="" class="form-control add_font_league_spartan mt-2" placeholder="City">
              </div>
              <div class="col-12 col-sm-12 col-md-6">
                 <input type="text" name="" class="form-control add_font_league_spartan mt-2" placeholder="Postal Code">
                
              </div>
               
             </div>
             <div class="w-100">
               <h5 class="font-weight-bold mt-4">Payment Options</h5>
                <select class="form-control add_font_league_spartan mt-2">
               <option value="">CREDIT CARD</option>
             </select>
               
             </div>
             <button type="button" class="btn btn-primary btn_primary low_radius w-100 mt-4">Pay Now</button>
            
          </div>
          <div class="col-12 col-sm-12 col-md-6">
            <div class="cart_img_box d-flex  " style="margin-top:30px;">
            <div class="cart_img w-50">
              <img src="/assets/img/products/product2.webp">
            </div>
            <div class="ml-2 w-50">
              <div class="d-flex">
                <h3>Ibacode Herbal Tea</h3>
                
                
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
                    <input type="number" name="" class="form-control gray_background mr-3" min="0"value="1">
                  </div>
                </div>

                
              
            </div>


            
            
          </div>
          <div class="w-100 d-flex justify-content-between mt-4">
                  <p>Subtotal</p>
                  <p>NGN 35,000.00</p>
                  
                </div>
                <div class="w-100 d-flex justify-content-between">
                  <p>Delivery</p>
                  <p>NGN 2,000.00</p>
                  
                </div>
                <div class="w-100 d-flex justify-content-between">
                  <p class="font-weight-bold">Total</p>
                  <p class="font-weight-bold">NGN 37,000.00</p>
                  
                </div>
           
            
          </div>
          
        </div>
         
       </div>
       <div style="height: 300px;">
         
       </div>








       
      


        @include('pages.components.footer')