 @include('pages.components.header')





    <main>
       <div class="container cart_page">
        @if($transaction->status!=="success")
        <div class="d-flex justify-content-center">
          <img src="/assets/img/logos/failed.webp" data-aos="zoom-in" data-aos-delay="300" style="height:300px;width:auto;">
          
        </div>
        <div class="d-flex justify-content-center">
          <h3>Your Order not Confirmed</h3>
          
        </div>
        <div class="d-flex justify-content-center">
          <h6>Your payment was not successfull,<br>

If you have any questions, please don't hesitate to contact our customer service team at [Customer Service Contact Information].</h6>
          
        </div>

        @else
       
         <div class="d-flex justify-content-center">
          <img src="/assets/img/logos/success.webp" data-aos="zoom-in" data-aos-delay="300" style="height:300px;width:auto;">
          
        </div>
        <div class="d-flex justify-content-center">
          <h3>Your Order is Confirmed</h3>
          
        </div>
        <div class="d-flex justify-content-center">
          <h6>Thank you for your recent order. <br>Your order number is #{{$transaction->cart_order_id}}. <br>We've received your order and it's currently being processed.<br>

You'll receive another email with shipping information once your order has been shipped.<br>

If you have any questions, please don't hesitate to contact our customer service team at [Customer Service Contact Information].</h6>
          
        </div>
        @endif
             <div class="d-flex justify-content-center mt-3">
          <a type="a" href="/dashboard" class="btn btn-primary btn_primary low_radius ">Dashboard</a>
          <a type="a" href="/index" class="btn btn-primary btn_primary low_radius ml-4">Continue Shopping</a>
          
        </div>
          </div>
          
          
       
       <div style="height: 300px;">
         
       </div>








       
      


        @include('pages.components.footer')
        <script type="text/javascript">
         








           
        </script>