<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use App\Models\Notification;
use App\Enums\UserType;
use App\Mail\NotificationMaller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    function create_admin_account(Request $request)
    {
         $rules = [

            'name' => ['required','string','max:255'],
            'email' => ['required','max:255','email','unique:users,email'],
            'phone'  => ['required'],
            'user_type'    => ['required', 'string', new Enum(UserType::class)],
            'password'    => ['required', 'string', 'confirmed'],
        
        ];


        $customMessages = [
            'category.required' => 'The category field is required.',
            ];

        $validate= $this->validate($request, $rules, $customMessages);
         if ($validate) {

            

        $validate['password'] = bcrypt($request->input('password'));
        $validate['verification_code'] = Str::random(10);
        $verification_code=$validate['verification_code'];
        $user = User::create($validate);

         if ($user) {
             // code...
         
        $data = [
            'name' =>$request->name,
            'subject'=>'Email Verification',
            'url_description' => 'Email Verification',
            'body'=>'',
        ];
        $data['body'] ="Dear <b> ".$request->name."</b>,<br>

Thank you for registering with ".ucfirst(env('APP_NAME'))."! <br>We're excited to have you join our community.<br>

To confirm your registration,<br> please click on the following link:

<p style='color:black;'><a href='". env('APP_URL')."/auth/verifications/".$verification_code."' style='background-color: #263544;padding:10px;text-decoration:none;color:white;border:1 px solid  #263544;border-radius:10px;justifly-content:center; '>Verify Email Address.</a></p>
<br>
If you have any trouble clicking on the link, please copy and paste the link below into your web browser.
<br>
". env('APP_URL')."/auth/verifications/".$verification_code."


<br>
If you have any questions or need assistance, please don't hesitate to contact our customer support team at [Customer Support Email] or [Customer Support Phone Number].
<br>
Thank you again for choosing ".ucfirst(env('APP_NAME'))."!   

Sincerely,
".ucfirst(env('APP_NAME'))."";

Mail::to($request->email)->queue(new NotificationMaller($data));
  // Auth::loginUsingId($user->id);
 return (['success' => 'Registration Successful, kindly confirm your email address to get started.']);
}

         }else{
             return $this->validate($request, $rules, $customMessages);
         }
    }


     function create_client_account(Request $request)
    {
         $rules = [

            'name' => ['required','string','max:255'],
            'email' => ['required','max:255','email','unique:users,email'],
            'phone'  => ['required'],
            'user_type'    => ['required', 'string', new Enum(UserType::class)],
            'password'    => ['required', 'string', 'confirmed'],
        
        ];


        $customMessages = [
            'category.required' => 'The category field is required.',
            ];

        $validate= $this->validate($request, $rules, $customMessages);
         if ($validate) {

            

        $validate['password'] = bcrypt($request->input('password'));
        $validate['verification_code'] = Str::random(10);
        $verification_code=$validate['verification_code'];
        $user = User::create($validate);

         if ($user) {
             // code...
         
        $data = [
            'name' =>$request->name,
            'subject'=>'Email Verification',
            'url_description' => 'Email Verification',
            'body'=>'',
        ];
        $data['body'] ="Dear <b> ".$request->name."</b>,<br>

Thank you for registering with ".ucfirst(env('APP_NAME'))."! <br>We're excited to have you join our community.<br>

To confirm your registration,<br> please click on the following link:

<p style='color:black;'><a href='". env('APP_URL')."/auth/verifications/".$verification_code."' style='background-color: #263544;padding:10px;text-decoration:none;color:white;border:1 px solid  #263544;border-radius:10px;justifly-content:center; '>Verify Email Address.</a></p>
<br>
If you have any trouble clicking on the link, please copy and paste the link below into your web browser.
<br>
". env('APP_URL')."/auth/verifications/".$verification_code."


<br>
If you have any questions or need assistance, please don't hesitate to contact our customer support team at [Customer Support Email] or [Customer Support Phone Number].
<br>
Thank you again for choosing ".ucfirst(env('APP_NAME'))."!   

Sincerely,
".ucfirst(env('APP_NAME'))."";

Notification::create([
                    'user_id' => $order->user_id,
                    'user_type' => 'Admin',
                    'message' => 'New User Registered',
                    'message_type' => 'user',
                    'status'=> 'false'
                ]);
Mail::to($request->email)->queue(new NotificationMaller($data));
 // Auth::loginUsingId($user->id);
 return (['success' => 'Registration Successful, kindly confirm your email address to get started.']);
}

         }else{
             return $this->validate($request, $rules, $customMessages);
         }
    }












    public function forget_password(Request $request)
    {
        return view('pages.auth.forget_password');
        
    }
    public function send_password_token(Request $request)
    {
        $rules = [
            'email' => ['required'],
            
        
        ];


        $customMessages = [
            'category.required' => 'The category field is required.',
            ];

        $validate= $this->validate($request, $rules, $customMessages);
         if ($validate) {
             $verification_code= Str::random(10);
            $user=User::where('email',$request->email)->first();
            if ($user!==null) {
                $user->remember_token=$verification_code;
                $user->save();
                 $data = [
            'name' =>$request->name,
            'subject'=>'Password Reset Token',
            'url_description' => 'Password reset Token',
            'body'=>'',
        ];
        $data['body'] ="Dear <b>".$user->name."</b>,<br>

                You have requested to reset your password for ".ucfirst(env('APP_NAME')).". To complete the process, please click on the link below or copy and paste it into your web browser:

                <p style='color:black;'><a href='". env('APP_URL')."/auth/verify_token/".$verification_code."' style='background-color: #263544;padding:10px;text-decoration:none;color:white;border:1 px solid  #263544;border-radius:10px;justifly-content:center; '>Reset Password.</a></p>
                    <br>
                    If you have any trouble clicking on the link, please copy and paste the link below into your web browser.
                    <br>
                    ". env('APP_URL')."/auth/verify_token/".$verification_code."


                    <br>
                <br>
                If you did not request a password reset, please disregard this email. Your password will remain unchanged.
                <br>
                Sincerely,
                <br>
                ".ucfirst(env('APP_NAME'))."<br>
                Support Team
                ".ucfirst(env('APP_NAME'))."";

Mail::to($request->email)->queue(new NotificationMaller($data));
            }else{

            }

 return (['success' => 'A link as been sent to the email you provided.']);
          }else{
             return $this->validate($request, $rules, $customMessages);
         }
    }






    public function verify_token(Request $request)
    {
       $user=User::where('remember_token',$request->verification_code)->first();

       if ($user!==null) {
        
        $user->email_verified_at=Now();
        $user->save();
        $token=$request->verification_code;
           // Auth::loginUsingId($user->id);
         return view('pages.auth.change_password',compact('token'));
              
       }else{
        //  Auth::logout();
        // session()->invalidate();
      return redirect('/auth/verified')->withErrors('Verification Unsuccessful');;
       }
    }
     public function change_password(Request $request)
    {
      $rules = [

            'password'    => ['required', 'string', 'confirmed'],
        
        ];


        $customMessages = [
            'category.required' => 'The category field is required.',
            ];

        $validate= $this->validate($request, $rules, $customMessages);
         if ($validate) {
             $user=User::where('remember_token',$request->token)->first();

       if ($user!==null) {
         Auth::loginUsingId($user->id);
        $user->password=bcrypt($request->input('password'));
        $user->save();
        return (['success' => 'Password Reset Successful']);

         }else{
            return $this->validate($request, $rules, $customMessages);
         }
    }
}
     public function verify_user(Request $request)
    {
       $user=User::where('verification_code',$request->verification_code)->first();

       if ($user!==null) {
        
        $user->email_verified_at=Now();
        $user->save();
           // Auth::loginUsingId($user->id);
        return redirect('/auth/verified')->with('success', 'Verification successful!');
              
       }else{
        //  Auth::logout();
        // session()->invalidate();
      return redirect('/auth/verified')->withErrors('Verification Unsuccessful');;
       }
    }


    public function verified(Request $request)
    {
      
              return view('pages.auth.verification');
       }
























}
