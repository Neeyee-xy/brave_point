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
        









     

        
       
      
       
 


        @include('pages.components.footer')