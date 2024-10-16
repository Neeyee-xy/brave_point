 
          <div class="product_img d-flex justify-content-center">

            
            <img src="{{$product->image}}">
          </div>
          <div class="d-flex justify-content-between mt-3">
            <div>
              <h3 class="font-weight-bold">{{$product->name}}</h3>
              @if($product->status=="In-stock")
              <h5 style="color:green" class="font-weight-bold stock">{{$product->status}}</h5>
              @else
              <h5 style="color:red" class="font-weight-bold stock">{{$product->status}}</h5>


              @endif
            </div>
            <div>
              <img src="/assets/img/products/rating.svg">
              <div class="gray_background   mt-2">
                <p class="font-weight-bold star_rating_reviews"> 24 Reviews</p>
                
              </div>
              
            </div>
            
          </div>
          <div class="w-100 mt-4">
            <label class="checkbox-container mt-2 price" price="{{number_format($product->carton_price,2)}}" unit="Carton">
              <input type="radio" name="radio-group" class="price" value="{{$product->carton_price}}">
              <input type="text" name="radio-group" class="product_id" value="{{$product->id}}" hidden>
              <span class="checkmark"></span>

              <div class="d-flex justify-content-between " >
                <span class="relative mt-1 font-weight-bold"style="z-index:100">Carton</span>
                <span class="relative mt-1 font-weight-bold mr-2"style="z-index:100">NGN {{number_format($product->carton_price,2)}}/carton</span>
                
              </div>
              
            </label>
            <label class="checkbox-container mt-4 price" price="{{number_format($product->sachet_price,2)}}" unit="Bags">
              <input type="radio" name="radio-group"  class="price" value="{{$product->carton_price}}">
              <span class="checkmark"></span>

              <div class="d-flex justify-content-between " >
                <span class="relative mt-1 font-weight-bold"style="z-index:100">Sachet bags</span>
                <span class="relative mt-1 font-weight-bold mr-2"style="z-index:100">NGN {{number_format($product->sachet_price,2)}}/bag</span>
                
              </div>
              
            </label>

          </div>
          <div class="w-100 d-flex justify-content-between mt-4">
            <div>
              <h5 class="font-weight-bolder"> Quantity</h5>
            </div>
            <div style="width: 66px;">
              <input type="number" name="" class="form-control gray_background mr-3 qty" min="0" value="1">
            </div>
            
            
          </div>
          <div class="gray_background w-100 d-flex justify-content-center mt-4" style="height:40px">
            <p class="my-auto">{{$product->tips}}</p>
            
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
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">{{$product->description}}</div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">Comming soon</div>
               
            </div>

            
          </div>
          
          
        