<?php

namespace App\Http\Controllers;
use App\Enums\UserType;
use App\Helpers\Helper;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function notifications(Request $request)
   {
      if (Auth::user()->user_type==UserType::ADMIN->title()) {
            $notifications=Notification::where('user_type',UserType::ADMIN->title())orderby('id','DESC')->get();
             Notification::where('user_type',UserType::ADMIN->title())->update(['status'=>'true']);

            return view('pages.admin.notifications.notifications',compact('notifications'))->with(['page_title'=>'Notifications']);
        }
         if (Auth::user()->user_type==UserType::CLIENT->title()) {
             $notifications=Notification::where('user_id',Auth::user()->id)->where('user_type',UserType::CLIENT->title())orderby('id','DESC')->get();
             Notification::where('user_id',Auth::user()->id)->update(['status'=>'true']);
            return view('pages.client.notifications.notifications',compact('notifications'))->with(['page_title'=>'Notifications']);
        }
   }
   public function count_notifications(Request $request)
   {
       if (Auth::user()->user_type==UserType::ADMIN->title()) {
            $count_notifications=Notification::where('status','false')->where('user_type',UserType::ADMIN->title())->get();
            $order_notifications=Notification::where('status','false')->where('user_type',UserType::ADMIN->title())->where('message_type','order')->get();
             $drop_notifications=[];
           if (count($order_notifications)>0) {
               // code...
           
                
                   $drop_notifications[]='
                    <a href="#" class="dropdown-item">
                       <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M20.756 5.345A1 1 0 0 0 20 5H6.181l-.195-1.164A1 1 0 0 0 5 3H2.75a1 1 0 1 0 0 2h1.403l1.86 11.164l.045.124l.054.151l.12.179l.095.112l.193.13l.112.065a1 1 0 0 0 .367.075H18a1 1 0 1 0 0-2H7.847l-.166-1H19a1 1 0 0 0 .99-.858l1-7a1 1 0 0 0-.234-.797M18.847 7l-.285 2H15V7zM14 7v2h-3V7zm0 3v2h-3v-2zm-4-3v2H7l-.148.03L6.514 7zm-2.986 3H10v2H7.347zM15 12v-2h3.418l-.285 2z"></path><circle cx="8.5" cy="19.5" r="1.5" fill="currentColor"></circle><circle cx="17.5" cy="19.5" r="1.5" fill="currentColor"></circle></svg></i>'.count($order_notifications).' New Order
                        
                    </a>';
                }
                 $user_notifications=Notification::where('status','false')->where('user_type',UserType::ADMIN->title())->where('message_type','user')->get();
             
           if (count($user_notifications)>0) {
               // code...
           
                
                   $drop_notifications[]='
                    <a href="#" class="dropdown-item">
                      <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="1em" height="1em" viewBox="0 0 24 24"><circle cx="12" cy="6" r="4" fill="currentColor"/><path fill="currentColor" d="M20 17.5c0 2.485 0 4.5-8 4.5s-8-2.015-8-4.5S7.582 13 12 13s8 2.015 8 4.5"/></svg></i>'.count($user_notifications).' New User
                        
                    </a>';
                }
             
            return (['success' => 'Setting update successfully','count_notifications'=>count($count_notifications),'drop_notifications'=>implode('', $drop_notifications)]);
        }
         if (Auth::user()->user_type==UserType::CLIENT->title()) {
            $count_notifications=Notification::where('user_id',Auth::user()->id)->where('status','false')->where('user_type',UserType::CLIENT->title())->get();
             $order_notifications=Notification::where('user_id',Auth::user()->id)->where('status','false')->where('user_type',UserType::CLIENT->title())->where('message_type','order')->get();
             $drop_notifications=[];
           if (count($order_notifications)>0) {
               // code...
           
                
                   $drop_notifications[]='
                    <a href="#" class="dropdown-item">
                       <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M20.756 5.345A1 1 0 0 0 20 5H6.181l-.195-1.164A1 1 0 0 0 5 3H2.75a1 1 0 1 0 0 2h1.403l1.86 11.164l.045.124l.054.151l.12.179l.095.112l.193.13l.112.065a1 1 0 0 0 .367.075H18a1 1 0 1 0 0-2H7.847l-.166-1H19a1 1 0 0 0 .99-.858l1-7a1 1 0 0 0-.234-.797M18.847 7l-.285 2H15V7zM14 7v2h-3V7zm0 3v2h-3v-2zm-4-3v2H7l-.148.03L6.514 7zm-2.986 3H10v2H7.347zM15 12v-2h3.418l-.285 2z"></path><circle cx="8.5" cy="19.5" r="1.5" fill="currentColor"></circle><circle cx="17.5" cy="19.5" r="1.5" fill="currentColor"></circle></svg></i>'.count($order_notifications).' New Order
                        
                    </a>';
                }
             
            return (['success' => 'Setting update successfully','count_notifications'=>count($count_notifications),'drop_notifications'=>implode('', $drop_notifications)]);
        }
   }
}
