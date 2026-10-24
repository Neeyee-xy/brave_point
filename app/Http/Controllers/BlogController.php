<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\BlogSetting;
use Illuminate\Http\Request;

class BlogController extends Controller
{
     public function read_post(Request $request)
     {
        $post=Blog::with('user')->where('slug',$request->slug)->first();


     return view('pages.read_post',compact('post'))->with(['page_title'=>'Blog']);
     }  

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
      $slots = range(1, 3);
      $rules = [];
      foreach ($slots as $i) {
          $rules['leading_image'.$i] = 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048';
      }
      $this->validate($request, $rules, [
          'image' => 'Each leading post image must be an image file (jpeg, png, jpg, gif, svg, webp).',
          'max' => 'Each leading post image must not be larger than 2MB.',
      ]);

      $settings = BlogSetting::first();

      $data = $request->except(array_merge(
          ['_token'],
          array_map(fn ($i) => 'leading_image'.$i, $slots),
          array_map(fn ($i) => 'remove_leading_image'.$i, $slots)
      ));

      // Custom leading post images: an upload replaces the image, "remove" falls back to the post image
      foreach ($slots as $i) {
          $old = $settings?->{'leading_image'.$i};

          if ($request->hasFile('leading_image'.$i)) {
              $upload = $request->file('leading_image'.$i);
              $name = time().'_leading'.$i.'_'.uniqid().'.'.$upload->getClientOriginalExtension();
              $upload->move(public_path('assets/img/blog/leading/'), $name);
              $data['leading_image'.$i] = '/assets/img/blog/leading/'.$name;
          } elseif ($request->boolean('remove_leading_image'.$i)) {
              $data['leading_image'.$i] = null;
          } else {
              continue;
          }

          if ($old && is_file(public_path($old))) {
              unlink(public_path($old));
          }
      }

      if ($settings) {
          $settings->update($data);
          return (['success' => 'Setting update successfully']);
      }

      BlogSetting::create($data);
      return (['success' => 'Setting saved successfully']);
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
        if (Blog::create( array_merge($request->all(),['image' =>$image,'slug'=>str_ireplace(" ", "_", $request->title)]))){
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
        if ($blog?->update(array_merge($request->all(),['image' =>$image,'slug'=>str_ireplace(" ", "_", $request->title)]))){
    
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
