  @foreach($carts as $cart)
  <div class="cart_img_box d-flex  mb-5">
            <div class="cart_img w-50">
              <img src="{{$cart->product->image}}" style="height: 200px;width: auto;">
            </div>
            <div class="ml-2 w-50">
              <div class="d-flex justify-content-between">
                <h3>{{$cart->product->name}}</h3>
                
                
              </div>
              <span class="mt-3 font-weight-bold ">NGN {{number_format($cart->price,2)}}</span>
              
              <div class="w-100 mt-4">
                <div>
                    <h5 class="font-weight-bolder"> Unit: {{$cart->unit}}</h5>
                  </div>
                  <div>
                    <h5 class="font-weight-bolder"> Quantity: {{$cart->qty}}</h5>
                  </div>
                  
                </div>
              
            </div>
            
            
          </div>

          @endforeach