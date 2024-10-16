  @foreach($carts as $cart)
  <div class="cart_img_box d-flex  mb-5">
            <div class="cart_img w-50">
              <img src="{{$cart->product->image}}">
            </div>
            <div class="ml-2 w-50">
              <div class="d-flex justify-content-between">
                <h3>{{$cart->product->name}}</h3>
                <svg  class="pointer delete_cart_item" cart_id="{{$cart->id}}" xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><path fill="#F68634" d="M16 9v10H8V9zm-1.5-6h-5l-1 1H5v2h14V4h-3.5zM18 7H6v12c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2z"/></svg>
                
              </div>
              <span class="mt-3 font-weight-bold ">NGN {{number_format($cart->price,2)}}</span>
               <div class="w-100 cart_info_box mt-2">
                <p class="p-2 font-weight-bold">{{$cart->product->tips}}</p>
            
              </div>
              <div class="w-100 d-flex justify-content-between mt-4">
                <div>
                    <h5 class="font-weight-bolder"> Quantity</h5>
                  </div>
                  <div style="width: 66px;">
                    <input type="number" name="" class="form-control gray_background mr-3 qty" min="0" value="{{$cart->qty}}" cart_id="{{$cart->id}}">
                   
                  </div>
                </div>
              
            </div>
            
            
          </div>

          @endforeach