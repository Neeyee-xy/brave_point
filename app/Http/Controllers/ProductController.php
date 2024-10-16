<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
     public function fetch_product_details(Request $request)
    {
        $product=Product::find($request->id);
        $product_details = view('pages.components.product_details', compact( 'product'))->render();
        return (['product_details' => $product_details]);
       
    }
    public function all_products(Request $request)
    {

        $products=Product::paginate(9);
        $product_count=Product::get()->count();
       return view('pages.all_products',compact('products','product_count'));
    }
     public function index(Request $request)
    {
        $categories=Category::all();
       return view('pages.admin.product.index',compact('categories'))->with(['page_title'=>'Product']);;
    }
     public function edit(Request $request)
    {   $categories=Category::all();
        $product=Product::find($request->id);
       return view('pages.admin.product.edit',compact('product','categories'))->with(['page_title'=>'Product']);;
    }
    public function tables(Request $request)
    {
       return view('pages.admin.product.tables');;
    }


    public function create(Request $request)
    {
        $rules = [
        'name' => 'required',
        'description' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        'carton_price' => 'required',
        'sachet_price' => 'required',
        'category_id' => 'required',
        'tips' => 'sometimes',
        'status' => 'required',
       
             
          
    ];

    $customMessages = [
        'required' => 'The :attribute  field is required.',
          'category_id.required' => 'The product category field is required.',
          'title.required'=> 'The question bank name is required'
         

    ];
    $validate= $this->validate($request, $rules, $customMessages);

    if ($validate) {
        $image = "/assets/img/products/".time() . '4.' . $request->image->getClientOriginalExtension();

        $request->image->move(public_path('assets/img/products/'), $image);
        if (Product::create( array_merge($request->all(),['image' =>$image]))){
    // code...

  
      return (['success' => 'Product created successfully']);

       }else{
         return (['errors' => 'Something went wrong ']);
       }
    }else{
        return $this->validate($request, $rules, $customMessages);
       }
    }
     public function update(Request $request)
    {
         $rules = [
        'name' => 'required',
        'description' => 'required',
        'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        'carton_price' => 'required',
        'sachet_price' => 'required',
        'tips' => 'sometimes',
        'status' => 'required',
       
             
          
    ];

    $customMessages = [
        'required' => 'The :attribute  field is required.',
          'test_mode.required' => 'The mode field is required.',
          'title.required'=> 'The question bank name is required'
         

    ];
    $validate= $this->validate($request, $rules, $customMessages);

    if ($validate) {
        $product = Product::find($request->id);
        if ($request->image!==null) {
            // code...
        unlink(public_path(''.$product->image.''));
         $image = "/assets/img/products/".time() . '4.' . $request->image->getClientOriginalExtension();

        $request->image->move(public_path('assets/img/products/'), $image);
    }else{
        $image=$product->image;
}
        if ($product?->update(array_merge($request->all(),['image' =>$image]))){
    
    // code...

  
      return (['success' => 'Product update successfully']);

       }else{
         return (['errors' => 'Something went wrong ']);
       }
    }else{
        return $this->validate($request, $rules, $customMessages);
       }
    }

    public function delete(Request $request)
    {
      
        $product = Product::find($request->id);
         unlink(public_path(''.$product->image.''));
        
        if ($product?->delete()){
    // code...

  
      return (['success' => 'Product deleted successfully']);

       }else{
         return (['errors' => 'Something went wrong ']);
       }
   
    }
}
