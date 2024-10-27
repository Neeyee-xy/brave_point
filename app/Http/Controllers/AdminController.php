<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Enums\UserType;
use Illuminate\Validation\Rules\Enum;
use App\Mail\NotificationMaller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class AdminController extends Controller
{
     public function index(Request $request)
    {
       return view('pages.admin.users.admins.index')->with(['page_title'=>'Admin']);;
    }
    public function tables(Request $request)
    {
       return view('pages.admin.users.admins.tables');;
    }
    public function edit(Request $request)
    {
        $user=User::find($request->id);
       return view('pages.admin.users.admins.edit',compact('user'))->with(['page_title'=>'Admin']);;
    }
    function update(Request $request)
    {
         $rules = [

            'name' => ['required','string','max:255'],
            'id' => ['required','string','max:255'],
            'email' => ['required'],
            'phone'  => ['required'],
            'user_type'    => ['required', 'string', new Enum(UserType::class)],
            'password'    => ['required', 'string', 'confirmed'],
        
        ];


        $customMessages = [
            'category.required' => 'The category field is required.',
            ];

        $validate= $this->validate($request, $rules, $customMessages);
         if ($validate) {
            $user=User::find($request->id);
            

        $validate['password'] = bcrypt($request->input('password'));
        $user->update($validate);

         if ($user) {
             // code...
         
        $data = [
            'name' =>$request->name,
            'subject'=>'Account Updated',
            'url_description' => 'Account Updated',
            'body'=>'',
        ];
        $data['body'] ="Dear <b> ".$request->name."</b>,<br>

            Your account details has been updated
            <br>
            If you have any questions or need assistance, please don't hesitate to contact our customer support team at [Customer Support Email] or [Customer Support Phone Number].
            <br>
            Thank you again for choosing ".ucfirst(env('APP_NAME'))."!   

            Sincerely,
            ".ucfirst(env('APP_NAME'))."";

            Mail::to($request->email)->queue(new NotificationMaller($data));
  // Auth::loginUsingId($user->id);
 return (['success' => 'Account Updated Successfully.']);
}

         }else{
             return $this->validate($request, $rules, $customMessages);
         }
    }

public function delete(Request $request)
    {
      
        $user = user::find($request->id);
         
        
        if ($user?->delete()){
    // code...

  
      return (['success' => 'User deleted successfully']);

       }else{
         return (['errors' => 'Something went wrong ']);
       }
   
    }

}
