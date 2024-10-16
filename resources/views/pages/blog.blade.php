 @include('pages.components.header')
 <?php
use App\Models\Blog;
use App\Models\BlogSetting;
use App\Helpers\Helper;
if (!function_exists('find_first_post')) {
  function find_first_post($blog_id){
    if ($blog_id!==null) {
      $blog=Blog::with('user')->find($blog_id);
      return $blog;
    }

  }
}


 ?>

<style type="text/css">
  .leading_blog_box_1{
    height: 450px;


  }
  .leading_blog_box_1 img{
    height: 250px;
    width: 100%;
  }
  .blop_text{
    color: #7c8c9c;
  }
  .leading_blog_box_2{
    height: 50%;


  }
   .leading_blog_box_2 img{
    height: 175px;
    width: 100%;
  }
  .leading_blog_box_3 img{
    height: 200px;
    width: 100%;
  }
</style>




    <main>
       <div class="container cart_page">
        <div class="d-flex justify-content-center">
          <p class="little_page_title font-weight-bold" data-aos="zoom-in" data-aos-delay="300">{{$settings?->heading1}}</p>
        </div>
        <div class="d-flex justify-content-center header_text">
          <div class="w_50_100">
            
          
            <h3 class="text-center font-weight-bold" data-aos="zoom-in" data-aos-delay="300">
             {{$settings?->heading2}}
            </h3>
            <p class="text-center" data-aos="zoom-in" data-aos-delay="300">{{$settings?->heading3}}</p>
          </div>
          
        </div>




        
        </div>
        <div class="container">
          <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6" data-aos="zoom-in" data-aos-delay="300">
              @if($settings?->heading_image1!==null)
              @php
              $first_post=find_first_post($settings?->heading_image1)
              @endphp
              <div class="w-100 leading_blog_box_1">
                <img src="{{$first_post->image}}">
                <div class="mb-2 mt-2">
                  <p class="little_page_title " data-aos="zoom-in" data-aos-delay="300">{{$first_post?->user?->name}} • {{Helper::time_elapsed_string($first_post->created_at, $full = false)}}</p>
                </div>
                <div class="mb-2 mt-2 d-flex">
                  <h3 class="font-weight-bold">{{$first_post?->title}}</h3>
                  <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M13.47 5.47a.75.75 0 0 1 1.06 0l6 6a.75.75 0 0 1 0 1.06l-6 6a.75.75 0 1 1-1.06-1.06l4.72-4.72H4a.75.75 0 0 1 0-1.5h14.19l-4.72-4.72a.75.75 0 0 1 0-1.06" clip-rule="evenodd"/></svg>
                </div>
                <div class="mb-2 mt-2 d-none">
                  <p class="blop_text">Learn about the diverse ways herbal medicine can address health issues and enhance your quality of life.</p>
                </div>
                
              </div>

              


              @endif
              
              
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6" data-aos="zoom-in" data-aos-delay="300">

               
              <div class="w-100 leading_blog_box_2 d_flex_grid">
              @if($settings?->heading_image2!==null)
              @php
              $first_post=find_first_post($settings?->heading_image2)
              @endphp

              <img src="{{$first_post->image}}">
                <div class="ml-2">
                <div class="mb-1 mt-1">
                  <p class="little_page_title " data-aos="zoom-in" data-aos-delay="300">{{$first_post?->user?->name}} • {{Helper::time_elapsed_string($first_post->created_at, $full = false)}}</p>
                </div>
                <div class="mb-1 mt-1 d_flex_grid">
                  <h6 class="font-weight-bold">{{$first_post?->title}}</h6>
                  <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M13.47 5.47a.75.75 0 0 1 1.06 0l6 6a.75.75 0 0 1 0 1.06l-6 6a.75.75 0 1 1-1.06-1.06l4.72-4.72H4a.75.75 0 0 1 0-1.5h14.19l-4.72-4.72a.75.75 0 0 1 0-1.06" clip-rule="evenodd"/></svg>
                </div>
                <div class="mb-1 mt-1 d-none">
                  <p class="blop_text">Explore how herbal remedies can effectively address....</p>
                </div>
              </div>
              @endif


                
                
              </div>

              <div class="w-100 leading_blog_box_2 d_flex_grid">
              @if($settings?->heading_image3!==null)
              @php
              $first_post=find_first_post($settings?->heading_image3)
              @endphp

              <img src="{{$first_post->image}}">
                <div class="ml-2">
                <div class="mb-1 mt-1">
                  <p class="little_page_title " data-aos="zoom-in" data-aos-delay="300">{{$first_post?->user?->name}} • {{Helper::time_elapsed_string($first_post->created_at, $full = false)}}</p>
                </div>
                <div class="mb-1 mt-1 d_flex_grid">
                  <h6 class="font-weight-bold">{{$first_post?->title}}</h6>
                  <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M13.47 5.47a.75.75 0 0 1 1.06 0l6 6a.75.75 0 0 1 0 1.06l-6 6a.75.75 0 1 1-1.06-1.06l4.72-4.72H4a.75.75 0 0 1 0-1.5h14.19l-4.72-4.72a.75.75 0 0 1 0-1.06" clip-rule="evenodd"/></svg>
                </div>
                <div class="mb-1 mt-1 d-none">
                  <p class="blop_text">Explore how herbal remedies can effectively address....</p>
                </div>
              </div>
              @endif


                
                
              </div>
             
            </div>
            <div class="col-12 mt-5 mb-5">
                <h6 class="font-weight-bold">All herbal blog posts</h6>
              
            </div>






@foreach($blogs as $blog)
            <div class="col-12 col-sm-12 col-md-4">
              <div class="leading_blog_box_3">
                <img src="{{$blog->image}}">
                <div class="ml-2">
                <div class="mb-1 mt-1">
                  <p class="little_page_title " data-aos="zoom-in" data-aos-delay="300">{{$blog?->user?->name}} • {{Helper::time_elapsed_string($blog->created_at, $full = false)}}</p>
                </div>
                <div class="mb-1 mt-1 d_flex_grid">
                  <h6 class="font-weight-bold">{{$blog?->title}}</h6>
                  <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M13.47 5.47a.75.75 0 0 1 1.06 0l6 6a.75.75 0 0 1 0 1.06l-6 6a.75.75 0 1 1-1.06-1.06l4.72-4.72H4a.75.75 0 0 1 0-1.5h14.19l-4.72-4.72a.75.75 0 0 1 0-1.06" clip-rule="evenodd"/></svg>
                </div>
                <div class="mb-1 mt-1 d-none">
                  <p class="blop_text">Learn how herbal mental models simplify complex processes and relationships.</p>
                </div>
              </div>
                
              </div>
              
              </div>
@endforeach
              
           
           <!--  <div class="col-12 col-sm-12 col-md-4">
               <div class="leading_blog_box_3">
                <img src="/assets/img/blog/image_5.webp">
                <div class="ml-2">
                <div class="mb-1 mt-1">
                  <p class="little_page_title " data-aos="zoom-in" data-aos-delay="300">Olivia Rhye • 20 Jan 2022</p>
                </div>
                <div class="mb-1 mt-1 d_flex_grid">
                  <h6 class="font-weight-bold">Master the art of herbs for effective problem-solving in health-related contexts</h6>
                  <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M13.47 5.47a.75.75 0 0 1 1.06 0l6 6a.75.75 0 0 1 0 1.06l-6 6a.75.75 0 1 1-1.06-1.06l4.72-4.72H4a.75.75 0 0 1 0-1.5h14.19l-4.72-4.72a.75.75 0 0 1 0-1.06" clip-rule="evenodd"/></svg>
                </div>
                <div class="mb-1 mt-1">
                  <p class="blop_text">Discover the power of herbal and tools for creating, t...</p>
                </div>
              </div>
                
              </div>
              
            </div>

            <div class="col-12 col-sm-12 col-md-4">
               <div class="leading_blog_box_3">
                <img src="/assets/img/blog/image_6.webp">
                <div class="ml-2">
                <div class="mb-1 mt-1">
                  <p class="little_page_title " data-aos="zoom-in" data-aos-delay="300">Olivia Rhye • 20 Jan 2022</p>
                </div>
                <div class="mb-1 mt-1 d_flex_grid">
                  <h6 class="font-weight-bold">Delve into the world of herbal API Stack and its potential in addressing health challenges</h6>
                  <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M13.47 5.47a.75.75 0 0 1 1.06 0l6 6a.75.75 0 0 1 0 1.06l-6 6a.75.75 0 1 1-1.06-1.06l4.72-4.72H4a.75.75 0 0 1 0-1.5h14.19l-4.72-4.72a.75.75 0 0 1 0-1.06" clip-rule="evenodd"/></svg>
                </div>
                <div class="mb-1 mt-1">
                  <p class="blop_text">Discover the power of herbal and tools for creating, t...</p>
                </div>
              </div>
                
              </div>
              
            </div>






<div class="col-12 col-sm-12 col-md-4 mt-5">
              <div class="leading_blog_box_3">
                <img src="/assets/img/blog/image_4.webp">
                <div class="ml-2">
                <div class="mb-1 mt-1">
                  <p class="little_page_title " data-aos="zoom-in" data-aos-delay="300">Olivia Rhye • 20 Jan 2022</p>
                </div>
                <div class="mb-1 mt-1 d_flex_grid">
                  <h6 class="font-weight-bold">Learn valuable leadership lessons from the principles of herbal medicine</h6>
                  <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M13.47 5.47a.75.75 0 0 1 1.06 0l6 6a.75.75 0 0 1 0 1.06l-6 6a.75.75 0 1 1-1.06-1.06l4.72-4.72H4a.75.75 0 0 1 0-1.5h14.19l-4.72-4.72a.75.75 0 0 1 0-1.06" clip-rule="evenodd"/></svg>
                </div>
                <div class="mb-1 mt-1">
                  <p class="blop_text">Discover the power of herbal and tools for creating, t...</p>
                </div>
              </div>
                
              </div>
              
              </div>
              
           
            <div class="col-12 col-sm-12 col-md-4 mt-5">
               <div class="leading_blog_box_3">
                <img src="/assets/img/blog/image_5.webp">
                <div class="ml-2">
                <div class="mb-1 mt-1">
                  <p class="little_page_title " data-aos="zoom-in" data-aos-delay="300">Olivia Rhye • 20 Jan 2022</p>
                </div>
                <div class="mb-1 mt-1 d_flex_grid">
                  <h6 class="font-weight-bold">Delve into the world of herbal API Stack and its potential in addressing health challenges</h6>
                  <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M13.47 5.47a.75.75 0 0 1 1.06 0l6 6a.75.75 0 0 1 0 1.06l-6 6a.75.75 0 1 1-1.06-1.06l4.72-4.72H4a.75.75 0 0 1 0-1.5h14.19l-4.72-4.72a.75.75 0 0 1 0-1.06" clip-rule="evenodd"/></svg>
                </div>
                <div class="mb-1 mt-1">
                  <p class="blop_text">Discover the power of herbal and tools for creating, t...</p>
                </div>
              </div>
                
              </div>
              
            </div>

            <div class="col-12 col-sm-12 col-md-4 mt-5">
               <div class="leading_blog_box_3">
                <img src="/assets/img/blog/image_6.webp">
                <div class="ml-2">
                <div class="mb-1 mt-1">
                  <p class="little_page_title " data-aos="zoom-in" data-aos-delay="300">Olivia Rhye • 20 Jan 2022</p>
                </div>
                <div class="mb-1 mt-1 d_flex_grid">
                  <h6 class="font-weight-bold">Delve into the world of herbal API Stack and its potential in addressing health challenges</h6>
                  <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M13.47 5.47a.75.75 0 0 1 1.06 0l6 6a.75.75 0 0 1 0 1.06l-6 6a.75.75 0 1 1-1.06-1.06l4.72-4.72H4a.75.75 0 0 1 0-1.5h14.19l-4.72-4.72a.75.75 0 0 1 0-1.06" clip-rule="evenodd"/></svg>
                </div>
                <div class="mb-1 mt-1">
                  <p class="blop_text">Discover the power of herbal and tools for creating, t...</p>
                </div>
              </div>
                
              </div>
              
            </div> -->
            <!-- <div class="col-12 d-flex justify-content-between mt-5">
              <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 20 20"><path fill="black" d="m5.83 9l5.58-5.58L10 2l-8 8l8 8l1.41-1.41L5.83 11H18V9z"/></svg> Previous</a>

               <a href="#"> Next <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 20 20"><path fill="black" d="M2 11h12.2l-5.6 5.6L10 18l8-8l-8-8l-1.4 1.4L14.2 9H2z"/></svg></a>
              
            </div> -->

            @if ($blogs->hasPages())
            <nav aria-label="Page navigation" class="d-flex justify-content-center">
                <ul class="pagination ">
                    {{-- Previous Page Link --}}
                    @if ($blogs->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link">&laquo;</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $blogs->previousPageUrl() }}" rel="prev">&laquo;</a>
                        </li>
                    @endif

                    @if($blogs->currentPage() > 3)
                        <li class="page-item"><a class="page-link" href="{{ $blogs->url(1) }}">1</a></li>
                    @endif
                    @if($blogs->currentPage() > 4)
                        <li class="page-item disabled"><span class="page-link">...</span></li>
                    @endif
                    @foreach(range(1, $blogs->lastPage()) as $i)
                        @if($i >= $blogs->currentPage() - 2 && $i <= $blogs->currentPage() + 2)
                            @if ($i == $blogs->currentPage())
                                <li class="page-item active"><span class="page-link">{{ $i }}</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $blogs->url($i) }}">{{ $i }}</a></li>
                            @endif
                        @endif
                    @endforeach
                    @if($blogs->currentPage() < $blogs->lastPage() - 3)
                        <li class="page-item disabled"><span class="page-link">...</span></li>
                    @endif
                    @if($blogs->currentPage() < $blogs->lastPage() - 2)
                        <li class="page-item"><a class="page-link" href="{{ $blogs->url($blogs->lastPage()) }}">{{ $blogs->lastPage() }}</a></li>
                    @endif

                    {{-- Next Page Link --}}
                    @if ($blogs->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $blogs->nextPageUrl() }}" rel="next">&raquo;</a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <span class="page-link">&raquo;</span>
                        </li>
                    @endif
                </ul>
            </nav>
            @endif

















           
            
          </div>
          
        </div>
 </div>

      






       
      


        @include('pages.components.footer')