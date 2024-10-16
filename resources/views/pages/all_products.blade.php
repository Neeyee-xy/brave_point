 @include('pages.components.header')
<style type="text/css">
  .product_img img{
    width: auto;
  }
</style>







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
              <h2 class="add_font remove_white_space">{{$product_count}} Products</h2> 
              <!-- <p class="ml-0 mt-3 ml-sm-0  ml-md-5 mt-sm-2 mt-md-0 w-100 w-sm-100">Showing page 1 of 3</p> -->
              
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

            @foreach($products as $product)
            <div class="col-12 col-sm-12 col-md-6 col-lg-3 mt-2 fetch_product_details" product_id="{{$product->id}}" data-aos="fade-left" data-aos-delay="300">
              <div data-toggle="modal" data-target="#product_details_modal" class="product_card pointer mb-0 mt-0 mt-sm-2 mb-sm-2 ">
                <div class="product_card_imag_box">
                <img src="{{$product->image}}">
              </div>
                <div class="product_description p-1">
                  <h6>{{$product->name}}</h6>
                  <div class="d-flex justify-content-between">
                    <p class="font-weight-bold">NGN {{number_format($product->sachet_price,2)}}</p>
                    <!-- <p>100ml</p> -->
                    
                  </div>
                  <div>
                    <p>{{Ucfirst(Str::limit($product->description, $limit = 100, $end = '...'))}}.</p>
                  </div>
                  
                </div>
                
              </div>
              
            </div>
            @endforeach
           
          </div>
          
        </div> 


       @if ($products->hasPages())
            <nav aria-label="Page navigation" class="d-flex justify-content-center">
                <ul class="pagination ">
                    {{-- Previous Page Link --}}
                    @if ($products->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link">&laquo;</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $products->previousPageUrl() }}" rel="prev">&laquo;</a>
                        </li>
                    @endif

                    @if($products->currentPage() > 3)
                        <li class="page-item"><a class="page-link" href="{{ $products->url(1) }}">1</a></li>
                    @endif
                    @if($products->currentPage() > 4)
                        <li class="page-item disabled"><span class="page-link">...</span></li>
                    @endif
                    @foreach(range(1, $products->lastPage()) as $i)
                        @if($i >= $products->currentPage() - 2 && $i <= $products->currentPage() + 2)
                            @if ($i == $products->currentPage())
                                <li class="page-item active"><span class="page-link">{{ $i }}</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a></li>
                            @endif
                        @endif
                    @endforeach
                    @if($products->currentPage() < $products->lastPage() - 3)
                        <li class="page-item disabled"><span class="page-link">...</span></li>
                    @endif
                    @if($products->currentPage() < $products->lastPage() - 2)
                        <li class="page-item"><a class="page-link" href="{{ $products->url($products->lastPage()) }}">{{ $products->lastPage() }}</a></li>
                    @endif

                    {{-- Next Page Link --}}
                    @if ($products->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $products->nextPageUrl() }}" rel="next">&raquo;</a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <span class="page-link">&raquo;</span>
                        </li>
                    @endif
                </ul>
            </nav>
            @endif









       
      


        @include('pages.components.footer')
        <script type="text/javascript">
          $(document).on("click",".price", function(e){

            $('.price_label').html("NGN "+$(this).attr('price')+"")
            $('.price_selected').html(""+$(this).attr('price')+"")
            $('.unit_label').html(""+$(this).attr('unit')+"")
          })



           $(document).on("click",".add_to_cart", function(e){
            
            $('#product_details_modalLabel').html("Cart Details")
             $('.cart').html("")
            $('.spinner-border').show();
           if (!$('input[name="radio-group"]:checked').length > 0) {
            toastr.error("Select at least one price")
            return false;
            }
            
             if ($('.qty').val()=="") {
              toastr.error("Qty can not be empty")
              return false;
            }
             if ($('.stock').html()=="Out-of-stock") {
              toastr.error("Sorry, Product is out of stock. Kindly check back in few hours")
              return false;
            }
             $(".add_to_cart").html("Processing");
             $(".add_to_cart").prop("disabled",true);
                var formData = new FormData();
               
                formData.append( 'id',$('.product_id').val());
                formData.append( 'price',$('.price_selected').html());
                formData.append( 'qty',$('.qty').val());
                formData.append( 'unit',$('.unit_label').html());
          
              
              
             $('.product_details').html("")
            $.ajax({
        url : "/add_to_cart",
        type : 'POST' ,
        data : formData ,
        contentType: false,
        cache: false,
        processData:false,
        dataType: 'json',
        mimeType: 'multipart/form-data',
        success:function (data) {
          // alert(data.success)
          
      
        var success_msg=data.hasOwnProperty('success')
          var errors_msg=data.hasOwnProperty('errors')
            
           
        
           if (success_msg== true) {
         toastr.error(data.errors)
                return false;
         
           }
            if (success_msg== true) {
          
      }
      $('.spinner-border').hide();
          $('.cart').html(data.cart_details)
          $('.checkout').removeClass('d-none')
          $('.add_to_cart').addClass('d-none');
          $('.cart').removeClass('d-none')
          
          $('.product_details').addClass('d-none');
          toastr.success("Item added successfully")
          $('.price_label').html("NGN "+data.total_price+"")
          $(".add_to_cart").html("Add To Cart");
             $(".add_to_cart").prop("disabled",false);
   }, 
    error: function(data) {
        if( data.status === 419 ) {
           toastr.error("CSRF token mismatch, It seams you have open dashboard in a new tab or your session has expired")
           $(".add_to_cart").html("Add To Cart");
             $(".add_to_cart").prop("disabled",false);
        

  

          } 
         if( data.status === 422 ) {
            var errors = $.parseJSON(data.responseText);
            $.each(errors, function (key, value) {
                // console.log(key+ " " +value);
          

                if($.isPlainObject(value)) {
                    $.each(value, function (key, value) {                       
                        console.log(key+ " " +value);
                        toastr.error(value)
                $(".add_to_cart").html("Add To Cart");
                $(".add_to_cart").prop("disabled",false);
                     

  
                   

                    });
                }else{
               
                }
            });
       

          } 
    }
});


    })



           $(document).on("click",".fetch_product_details", function(e){
             $('.checkout').addClass('d-none')
            $('.add_to_cart').removeClass('d-none');
              $('#product_details_modalLabel').html("Product Details")
             $('.cart').html("")
             $('.product_details').html("")
             $('.product_details').removeClass("d-none")
             $('.price_label').html("")
          $('.spinner-border').show();
                var formData = new FormData();
                var id=$(this).attr('product_id');
                formData.append( 'id',$(this).attr('product_id'));
          
              
              
             
            $.ajax({
        url : "/fetch_product_details",
        type : 'POST' ,
        data : formData ,
        contentType: false,
        cache: false,
        processData:false,
        dataType: 'json',
        mimeType: 'multipart/form-data',
        success:function (data) {
          // alert(data.success)
          
      
        var success_msg=data.hasOwnProperty('success')
          var errors_msg=data.hasOwnProperty('errors')
            
           
        
           if (errors_msg== true) {
         showNotification("top", "right", "danger",data.errors,"Error")
     return false;
         
           }
           $('.spinner-border').hide();
          $('.product_details').html(data.product_details)
           $('.product_id').html(id)
   }, 
    error: function(data) {
        if( data.status === 419 ) {
           toastr.error("CSRF token mismatch, It seams you have open dashboard in a new tab or your session has expired")
        

  

          } 
         if( data.status === 422 ) {
            var errors = $.parseJSON(data.responseText);
            $.each(errors, function (key, value) {
                // console.log(key+ " " +value);
          

                if($.isPlainObject(value)) {
                    $.each(value, function (key, value) {                       
                        console.log(key+ " " +value);
                        toastr.error(value)
                     

  
                   

                    });
                }else{
               
                }
            });
       

          } 
    }
});


    })
    
        </script>