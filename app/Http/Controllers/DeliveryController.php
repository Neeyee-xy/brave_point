<?php

namespace App\Http\Controllers;
use App\Models\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function index(Request $request)
    {
       return view('pages.admin.delivery.index')->with(['page_title'=>'Delivery Fee']);;
    }
     public function edit(Request $request)
    {
        $delivery=delivery::find($request->id);
       return view('pages.admin.delivery.edit',compact('delivery'))->with(['page_title'=>'Delivery Fee']);;
    }
    public function tables(Request $request)
    {
       return view('pages.admin.delivery.tables');;
    }


    public function create(Request $request)
    {
        $rules = [
        'location' => 'required',
        'price' => 'required',
       
             
          
    ];

    $customMessages = [
        'required' => 'The :attribute  field is required.',
          'test_mode.required' => 'The mode field is required.',
          'title.required'=> 'The question bank name is required'
         

    ];
    $validate= $this->validate($request, $rules, $customMessages);

    if ($validate) {
        if (delivery::create( array_merge($request->all()))){
    // code...

  
      return (['success' => 'Delivery Fee created successfully']);

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
        'location' => 'required',
        'price' => 'required',
       
             
          
    ];

    $customMessages = [
        'required' => 'The :attribute  field is required.',
          'test_mode.required' => 'The mode field is required.',
          'title.required'=> 'The question bank name is required'
         

    ];
    $validate= $this->validate($request, $rules, $customMessages);

    if ($validate) {
        $delivery = delivery::find($request->id);
        
        if ($delivery?->update($request->all())){
    // code...

  
      return (['success' => 'Delivery Fee update successfully']);

       }else{
         return (['errors' => 'Something went wrong ']);
       }
    }else{
        return $this->validate($request, $rules, $customMessages);
       }
    }

    public function delete(Request $request)
    {
      
        $delivery = delivery::find($request->id);
        
        if ($delivery?->delete()){
    // code...

  
      return (['success' => 'Delivery Fee deleted successfully']);

       }else{
         return (['errors' => 'Something went wrong ']);
       }
   
    }
}
