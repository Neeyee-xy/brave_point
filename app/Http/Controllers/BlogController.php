<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\BlogSetting;
use Illuminate\Http\Request;

class BlogController extends Controller
{
     public function index(Request $request)
     {


     return view('pages.admin.blog.index')->with(['page_title'=>'Blog']);
     }   

     public function tables(Request $request)
    {
       return view('pages.admin.blog.tables');;
    }
    public function blog_settings(Request $request)
    {
          $blogs=Blog::orderBy('id','DESC')->get();;
          $settings=BlogSetting::first();
       return view('pages.admin.blog.blog_home',compact('settings','blogs'))->with(['page_title'=>'Settings']);
    }

    public function save_settings(Request $request)
    {
      $settings=BlogSetting::get();
      if (count($settings)>0) {
        $settings = BlogSetting::first();
        if ($settings?->update(array_merge($request->all()))){
    
    // code...

  
      return (['success' => 'Setting update successfully']);

       }

      }else{
         if (BlogSetting::create( array_merge($request->all()))) {
            return (['success' => 'Setting saved successfully']);
         }
      }
    }

     public function create(Request $request)
    {
        $rules = [
        'title' => 'required',
        'user_id' => 'required',
        'post' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',

       
             
          
    ];

    $customMessages = [
        'required' => 'The :attribute  field is required.',
          'category_id.required' => 'The product category field is required.',
          'title.required'=> 'The question bank name is required'
         

    ];
    $validate= $this->validate($request, $rules, $customMessages);
    $validate['post']=htmlspecialchars($request->post);
    if ($validate) {
        $image = "/assets/img/blog/".time() . '4.' . $request->image->getClientOriginalExtension();

        $request->image->move(public_path('assets/img/blog/'), $image);
        if (Blog::create( array_merge($request->all(),['image' =>$image]))){
    // code...

  
      return (['success' => 'Post created successfully']);

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
        'title' => 'required',
        'user_id' => 'required',
        'post' => 'required',
        'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',

       
             
          
    ];
    $customMessages = [
        'required' => 'The :attribute  field is required.',
          'test_mode.required' => 'The mode field is required.',
          'title.required'=> 'The question bank name is required'
         

    ];
    $validate= $this->validate($request, $rules, $customMessages);

    if ($validate) {
        $blog = Blog::find($request->id);
        if ($request->image!==null) {
            // code...
        unlink(public_path(''.$blog->image.''));
         $image = "/assets/img/blog/".time() . '4.' . $request->image->getClientOriginalExtension();

        $request->image->move(public_path('assets/img/blog/'), $image);
    }else{
        $image=$blog->image;
}
        if ($blog?->update(array_merge($request->all(),['image' =>$image]))){
    
    // code...

  
      return (['success' => 'post update successfully']);

       }else{
         return (['errors' => 'Something went wrong ']);
       }
    }else{
        return $this->validate($request, $rules, $customMessages);
       }
    }


public function delete(Request $request)
    {
      
        $blog = Blog::find($request->id);
         unlink(public_path(''.$blog->image.''));
        
        if ($blog?->delete()){
    // code...

  
      return (['success' => 'Blog deleted successfully']);

       }else{
         return (['errors' => 'Something went wrong ']);
       }
   
    }

     public function edit(Request $request)
    {  
        $blog=Blog::find($request->id);
       return view('pages.admin.blog.edit',compact('blog'))->with(['page_title'=>'Blog']);;
    }
        
}
