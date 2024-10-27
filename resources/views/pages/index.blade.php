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
        









     

        
       
      
       
 


        <div class=" subscrible_us relative" >
        <div class="subscrible_us_inner_box">
          <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-8" data-aos="zoom-out"  data-aos-delay="300">
              <div class="w-100 px-5">
                 <h5 class="">
                Subscribe to our newsletter for the latest updates, health tips, and exclusive offers straight to your inbox.
              </h5>
                
              </div>
             
              
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 px-5">
              <div class="w-100 subscrible_us_inner_form_box d-flex">
                <div class="w-100 my-auto">
              
          
            </div>
          </div>
              
            </div>
            
          </div>
        </div>


      </div>  
      <div class=" subscrible_us" style="background: #EEEDED; height: 150px;" >
       


      </div>  
    </main>
    <footer>
      
      
    </footer>
    
</body>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
      <script src="/js/vendor/jquery-3.3.1.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
       
      <script src="/js/vendor/bootstrap.bundle.min.js"></script>
      <script src="/plugins/toastr/toastr.min.js"></script>
      <script>
 $(document).ready(function(){

   $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
 AOS.init({
      duration: 1000,
      easing: "ease-in-out",
      once: true,
      mirror: false
    });


    $("body > *").css({ opacity: 0 });
    // preloader
    setTimeout(function () {
      count_cart_item()
      $("body").removeClass("show-spinner");
      $("main").addClass("default-transition");
      $(".sub-menu").addClass("default-transition");
      $(".main-menu").addClass("default-transition");
      $(".theme-colors").addClass("default-transition");
      $("body > *").animate({ opacity: 1 }, 100);

    }, 300);

    // search box 
    $('.search_btn').on('click', function (e) {
      $('.search').removeClass('d-none')
      $('.search_box').removeClass('search_opacity')
      $('.search_box').addClass('search_box_open')
      $('.search_btn').addClass('d-none')


    })
   
   

   // slider

  var container = $(".slide_wrap");
  var slideShow = container.find(".slide_show");
  var slideImg = slideShow.find(".slide_img");
  var slides = slideImg.find(">div");
  var slideBtn = $(".slide_btn"); 

  var slideCount = slides.length; 
  var slideWidth = slides.innerWidth();  

  var slidesToShow = 3;
  var currentSlide = 0;

  var slideCopy = slides.slice(0, slidesToShow).clone();
  slideImg.append(slideCopy);

 
  function back() {
    currentSlide--;
    if (currentSlide < 0) {
      currentSlide = slideCount - slidesToShow;
    }
    slideImg.animate({"margin-left": -currentSlide * slideWidth + "px"},500);
  }

  function next() {
    currentSlide++;
    if (currentSlide >= slideCount) {
      currentSlide = 0;
    }
    slideImg.animate({"margin-left": -currentSlide * slideWidth + "px"},500);
  }

 
  slideBtn.on("click", ".slide_btn", function() {
    if ($(this).hasClass("prev")) {
      back();
    } else {
      next();
    }
  });












function count_cart_item(){
            
            
          
                var formData = new FormData();
               
             
          
              
        
            $.ajax({
        url : "/count_cart_item",
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
     
          $('.count_cart_item').html(data.count_cart_item)
         
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


    }




function count_notifications(){
            
            
          
                var formData = new FormData();
               
             
          
              
        
            $.ajax({
        url : "/count_notifications",
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
     
          $('.count_notifications').html(data.count_notifications)
         
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


    }


 $('form[name="subscribe"]').on('submit',(function(e){
 
    // $('#submitButton').addClass("disabled");
     // $('#submitButton').val('processing...')
     $("#subscribe").html("Processing");
     $("#subscribe").prop("disabled",true);
        e.preventDefault();
         var formData = new FormData(this);


          $.ajax({
          url: "/subscribe",
          type: "POST",
          data:  formData,
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
            toastr.success(data.success)
               
            $("#subscribe").html("Subscribe to Newsletter");
            $("#subscribe").prop("disabled",false);

             // setTimeout(window.location.href=""+data.authorization_url+"", 4000);
             // toastr.success_msg(data.errors)
           }
           if (errors_msg== true) {
         
             toastr.error(data.errors)
              $("#subscribe").html("subscribe");
              $("#subscribe").prop("disabled",false);
           }
              // toastr.error(value)
          
     } ,
    error: function(data) {
         if( data.status === 422 ) {
            var errors = $.parseJSON(data.responseText);
            $.each(errors, function (key, value) {
                // console.log(key+ " " +value);
          

                if($.isPlainObject(value)) {
                    $.each(value, function (key, value) {                       
                        console.log(key+ " " +value);
                       
                      toastr.error(value)
  
                    // $('#response').show().html(value+"<br/>");

                    });
                }else{
                // $('#response').show().append(value+"<br/>"); //this is my div with messages
                }
            });
        $("#subscribe").html("Subscribe to Newsletter");
        $("#subscribe").prop("disabled",false);

          } 
          if( data.status === 419 ) {
            toastr.error("Token Mismatch, Kindly Refresh The Page")
            $.each(errors, function (key, value) {
                // console.log(key+ " " +value);
          

                if($.isPlainObject(value)) {
                    $.each(value, function (key, value) {                       
                        console.log(key+ " " +value);
                       
                    
  
                    // $('#response').show().html(value+"<br/>");

                    });
                }else{
                // $('#response').show().append(value+"<br/>"); //this is my div with messages
                }
            });
        $("#subscribe").html("Subscribe to Newsletter");
        $("#subscribe").prop("disabled",false);

          } 
        }           
    });
  }));




 $(document).on("change",".qty", function(e){
            
            $('.price_label').html("Recalculating...")
           
                var formData = new FormData();
            
                formData.append( 'id',$(this).attr('cart_id'));
                formData.append( 'qty',$(this).val());
               
              
              
              
             
            $.ajax({
            url : "/add_qty",
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
      
          
        
          // toastr.success("Item added successfully")
          $('.price_label').html("NGN "+data.total_price+"")
           var item=data.total_price;
            item=item.replace('NGN ',"");
            var selectedOption = $('.delivery_price').html();
            var attributeValue = selectedOption.replace('NGN ',"");;



            var total=parseInt(item)+parseInt(attributeValue);
            var delivery_price=parseFloat(attributeValue);
             var total_price=parseFloat(total);
            $('.delivery_price').html("NGN "+delivery_price.toFixed(2)+"")
             $('.total').html("NGN "+total_price.toFixed(2)+"")
        
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



     $(document).on("click",".delete_cart_item", function(e){
            
            $('#product_details_modalLabel').html("Cart Details")
             $('.cart').html("")
            $('.spinner-border').show();
           
                var formData = new FormData();
            
                formData.append( 'id',$(this).attr('cart_id'));
               
              
              
              
             $('.product_details').html("")
            $.ajax({
        url : "/delete_cart_item",
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
          // toastr.success("Item added successfully")
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




     $(document).on("click",".get_cart_items", function(e){
            
            $('#product_details_modalLabel').html("Cart Details")
             $('.cart').html("")
           
                var formData = new FormData();
               
              
              
              
             $('.product_details').html("")
            $.ajax({
        url : "/get_cart_items",
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
          // toastr.success("Item added successfully")
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


  // video player

$('.player_center_button').on('click', function (e) {
      $('.toggle').trigger('click')
      $(this).hide()
      $('.vido_text').hide();
       })
  const player = $(".player");
  const video = player.find(".viewer");
  const progress = player.find(".progress");
  const progressBar = player.find(".progress__filled");
  const toggle = player.find(".toggle");
  const skipButtons = player.find("[data-skip]");
  const ranges = player.find(".player__slider");

  // Function definitions
  function togglePlay() {
    const method = video[0].paused ? "play" : "pause";
    video[0][method](); // Use element[0] to access the DOM element
  }

  function updateButton() {
    const icon = video[0].paused ? "►" : "❚ ❚";
    toggle.text(icon); // Use .text() to set text content
  }

  function skip() {
    video[0].currentTime += parseFloat($(this).data("skip")); // Use $(this) to access the clicked element
  }

  function handleRangeUpdate() {
    video[0][this.name] = this.value; // Use element[0] for DOM access
  }

  function handleProgress() {
    const percent = video[0].currentTime / video[0].duration * 100;
    progressBar.css("flex-basis", `${percent}%`); // Use .css() for styling
  }

  function scrub(e) {
    const scrubTime = e.offsetX / progress.width() * video[0].duration;
    video[0].currentTime = scrubTime;
  }

  // Event listeners with jQuery syntax
  video.on("click", togglePlay);
  video.on("play", updateButton);
  video.on("pause", updateButton);
  video.on("timeupdate", handleProgress);

  toggle.on("click", togglePlay);
  skipButtons.each(function() { $(this).on("click", skip); });
  ranges.each(function() { $(this).on("change", handleRangeUpdate).on("mousemove", handleRangeUpdate); });

  let mousedown = false;
  progress.on("click", scrub);
  progress.on("mousemove", function(e) { if (mousedown) scrub(e); });
  progress.on("mousedown", function() { mousedown = true; });
  progress.on("mouseup", function() { mousedown = false; });


  var carousel = $(".carousel_slider"),
    items = $(".item_slider"),
    currdeg  = 0;

$(".next_slider").on("click", { d: "n" }, rotate);
$(".prev_slider").on("click", { d: "p" }, rotate);

function rotate(e){
  if(e.data.d=="n"){
    currdeg = currdeg - 60;
  }
  if(e.data.d=="p"){
    currdeg = currdeg + 60;
  }
  carousel.css({
    "-webkit-transform": "rotateY("+currdeg+"deg)",
    "-moz-transform": "rotateY("+currdeg+"deg)",
    "-o-transform": "rotateY("+currdeg+"deg)",
    "transform": "rotateY("+currdeg+"deg)"
  });
    items.css({
    "-webkit-transform": "rotateY("+(-currdeg)+"deg)",
    "-moz-transform": "rotateY("+(-currdeg)+"deg)",
    "-o-transform": "rotateY("+(-currdeg)+"deg)",
    "transform": "rotateY("+(-currdeg)+"deg)"
  });
}










 // shop slider
 class Slider {
    constructor(slider) {
        this.slider = slider;
        this.display = slider.querySelector(".image-display");
        this.navButtons = Array.from(slider.querySelectorAll(".nav-button"));
        this.prevButton = slider.querySelector(".prev-button");
        this.nextButton = slider.querySelector(".next-button");
        this.sliderNavigation = slider.querySelector(".slider-navigation");
        this.currentSlideIndex = 0;
        this.preloadedImages = {};

        this.initialize();
    }

    initialize() {
        this.setupSlider();
        this.preloadImages();
        this.eventListeners();
    }

    setupSlider() {
        this.showSlide(this.currentSlideIndex);
    }

    showSlide(index) {
        this.currentSlideIndex = index;
        const navButtonImg = this.navButtons[
            this.currentSlideIndex
        ].querySelector("img");
        if (navButtonImg) {
            const imgClone = navButtonImg.cloneNode();
            this.display.replaceChildren(imgClone);
        }
        this.updateNavButtons();
    }

    updateNavButtons() {
        this.navButtons.forEach((button, buttonIndex) => {
            const isSelected = buttonIndex === this.currentSlideIndex;
            button.setAttribute("aria-selected", isSelected);
            if (isSelected) button.focus();
        });
    }

    preloadImages() {
        this.navButtons.forEach((button) => {
            const imgElement = button.querySelector("img");
            if (imgElement) {
                const imgSrc = imgElement.src;
                if (!this.preloadedImages[imgSrc]) {
                    this.preloadedImages[imgSrc] = new Image();
                    this.preloadedImages[imgSrc].src = imgSrc;
                }
            }
        });
    }

    eventListeners() {
        document.addEventListener("keydown", (event) => {
            this.handleAction(event.key);
        });

        this.sliderNavigation.addEventListener("click", (event) => {
            const targetButton = event.target.closest(".nav-button");
            const index = targetButton
                ? this.navButtons.indexOf(targetButton)
                : -1;
            if (index !== -1) {
                this.showSlide(index);
            }
        });

        this.prevButton.addEventListener("click", () =>
            this.handleAction("prev")
        );
        this.nextButton.addEventListener("click", () =>
            this.handleAction("next")
        );
    }

    handleAction(action) {
        if (action === "Home") {
            this.currentSlideIndex = 0;
        } else if (action === "End") {
            this.currentSlideIndex = this.navButtons.length - 1;
        } else if (action === "ArrowRight" || action === "next") {
            this.currentSlideIndex =
                (this.currentSlideIndex + 1) % this.navButtons.length;
        } else if (action === "ArrowLeft" || action === "prev") {
            this.currentSlideIndex =
                (this.currentSlideIndex - 1 + this.navButtons.length) %
                this.navButtons.length;
        }

        this.showSlide(this.currentSlideIndex);
    }
}

const ImageSlider = new Slider(document.querySelector(".image-slider"));

})
      </script>

</html>



