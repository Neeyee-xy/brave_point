<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
       return view('pages.admin.category.index')->with(['page_title'=>'Category']);;
    }
     public function edit(Request $request)
    {
        $category=Category::find($request->id);
       return view('pages.admin.category.edit',compact('category'))->with(['page_title'=>'Category']);;
    }
    public function tables(Request $request)
    {
       return view('pages.admin.category.tables');;
    }


    public function create(Request $request)
    {
        $rules = [
        'name' => 'required',
        'icon' => 'required',
       
             
          
    ];

    $customMessages = [
        'required' => 'The :attribute  field is required.',
          'test_mode.required' => 'The mode field is required.',
          'title.required'=> 'The question bank name is required'
         

    ];
    $validate= $this->validate($request, $rules, $customMessages);

    if ($validate) {
        if (Category::create( array_merge($request->all()))){
    // code...

  
      return (['success' => 'Category created successfully']);

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
        'icon' => 'required',
       
             
          
    ];

    $customMessages = [
        'required' => 'The :attribute  field is required.',
          'test_mode.required' => 'The mode field is required.',
          'title.required'=> 'The question bank name is required'
         

    ];
    $validate= $this->validate($request, $rules, $customMessages);

    if ($validate) {
        $category = Category::find($request->id);
        
        if ($category?->update($request->all())){
    // code...

  
      return (['success' => 'Category update successfully']);

       }else{
         return (['errors' => 'Something went wrong ']);
       }
    }else{
        return $this->validate($request, $rules, $customMessages);
       }
    }

    public function delete(Request $request)
    {
      
        $category = Category::find($request->id);
        
        if ($category?->delete()){
    // code...

  
      return (['success' => 'Category deleted successfully']);

       }else{
         return (['errors' => 'Something went wrong ']);
       }
   
    }
}
