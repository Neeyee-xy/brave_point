 @include('pages.components.header')
 <?php
use App\Helpers\Helper;

?>




    <main>
       <div class="container cart_page">
         <h3 class="font-weight-bold">{{$post->title}}</h3>
          <div class="mb-2 mt-2">
                  <p class="little_page_title " data-aos="zoom-in" data-aos-delay="300">{{ucfirst($post?->user?->name)}} • {{Helper::time_elapsed_string($post->created_at, $full = false)}}</p>
          </div>
          <div class="mb-2 mt-2 d-flex justify-content-center">
                 <img src="{{$post->image}}">
          </div>
          <div class="mb-2 mt-5 d-flex justify-content-start">
            <p class="blop_text">{!!$post->post!!}.</p>
          </div>

        
          
        
            
          
        </div>
      </div>
          
          
       
       <div style="height: 300px;">
         
       </div>








       
      


        @include('pages.components.footer')
<script type="text/javascript">
         







           
        </script>