<?php

namespace App\Http\Controllers;
use App\Enums\UserType;
use App\Models\Setting;
use App\Models\HomePageSetting;
use App\Models\Product;
use App\Models\Category;
use App\Models\BlogSetting;
use App\Models\Transaction;
use App\Models\Blog;
use App\Models\Subscription;
use App\Models\Order;
use App\Models\User;
use App\Mail\NotificationMaller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{


   
    public function subscribe(Request $request)
    {
        

         $rules = [
    
        'email' => ['required','max:255','email','unique:subscriptions,email'],

       
             
          
    ];

    $customMessages = [
        'required' => 'The :attribute  field is required.',
    ];
    $validate= $this->validate($request, $rules, $customMessages);

    if ($validate) {
        if (Subscription::create( array_merge($request->all()))) {
            return (['success' => 'You successfully subscribe to our new letter']);
         }

         
    }else{
        return $this->validate($request, $rules, $customMessages);
    }

    }
    public function contact_us(Request $request)
    {
        

         $rules = [
        'name' => 'required',
        'email' => 'required',
        'time' => 'required',
        'details' => 'required',

       
             
          
    ];

    $customMessages = [
        'required' => 'The :attribute  field is required.',
    ];
    $validate= $this->validate($request, $rules, $customMessages);

    if ($validate) {

         $data = [
            'name' =>$request->name,
            'subject'=>'Appointment Request',
            'url_description' => 'Appointment Request',
            'body'=>'',
        ];
        $data['body'] ="Hello <b>Admin</b>,<br>
            You have a new <b>Appointment</b>
            from <b>".$request->name."</b>, Preferred appointment time <b>".$request->time."</b>, Contact Email <b>".$request->email."</b>
            <br>
            <b>Describe Briefly Subject Of Concern</b>
            <br>
            ".$request->details."
            <br>

".ucfirst(env('APP_NAME'))."";
        $settings=Setting::first();
        if ($settings->admin_email!==null) {
            Mail::to($settings->admin_email)->queue(new NotificationMaller($data));
        }
        return (['success' => 'Email Sent, We will reach out to confirm your appointment, Thanks']);
    }else{
        return $this->validate($request, $rules, $customMessages);
    }

    }
    public function blog(Request $request)
    {
        $settings = BlogSetting::first();
        $blogs=Blog::with('user')->paginate(9);

        return view('pages.blog',compact('settings','blogs'));

    }
    public function index(Request $request)
        {
            $settings = HomePageSetting::first();

            return view('pages.index',compact('settings'))->with(['page_title'=>'
Herbal Remedies for Modern Health Challenges']);

        }


    public function dashboard(Request $request)
    {
       if (Auth::user()->user_type==UserType::ADMIN->title()) {
        if ($request->year==null) {
             $year=date('Y');
        }else{
            $year=$request->year;
        }

        $new_order=Order::where('status','Confirmed')->get()->count();
        $in_progress_order=Order::where('status','Order On the Way')->get()->count();
        $completed_order=Order::where('status','Order Completed')->get()->count();
        $abandoned_order=Order::where('status','abandoned')->get()->count();
        $products=Product::get()->count();
        $categories=Category::get()->count();
        $users=User::where('user_type','Client')->get()->count();
        $admins=User::where('user_type','Admin')->get()->count();
        

        $amount = Transaction::where('status','success')->whereRaw('YEAR(created_at) = '.$year.'')->get()->pluck('amount')->toarray();
        $amount_ab = Transaction::where('status','!=','success')->whereRaw('YEAR(created_at) = '.$year.'')->get()->pluck('amount')->toarray(); 
        

         $jan = Transaction::where('status','success')->whereRaw('YEAR(created_at) = '.$year.'')->whereMonth('created_at', 1)->get()->count(); 
         $jan_ab = Transaction::where('status','!=','success')->whereRaw('YEAR(created_at) = '.$year.'')->whereMonth('created_at', 1)->get()->count(); 
         $feb = Transaction::where('status','success')->whereRaw('YEAR(created_at) = '.$year.'')->whereMonth('created_at', 2)->get()->count(); 
         $feb_ab = Transaction::where('status','!=','success')->whereRaw('YEAR(created_at) = '.$year.'')->whereMonth('created_at', 2)->get()->count(); 
         $mar = Transaction::where('status','success')->whereRaw('YEAR(created_at) = '.$year.'')->whereMonth('created_at', 3)->get()->count(); 
         $mar_ab = Transaction::where('status','!=','success')->whereRaw('YEAR(created_at) = '.$year.'')->whereMonth('created_at', 3)->get()->count(); 
         $apr = Transaction::where('status','success')->whereRaw('YEAR(created_at) = '.$year.'')->whereMonth('created_at', 4)->get()->count(); 
         $apr_ab = Transaction::where('status','!=','success')->whereRaw('YEAR(created_at) = '.$year.'')->whereMonth('created_at', 4)->get()->count(); 
        $may = Transaction::where('status','success')->whereRaw('YEAR(created_at) = '.$year.'')->whereMonth('created_at', 5)->get()->count(); 
         $may_ab = Transaction::where('status','!=','success')->whereRaw('YEAR(created_at) = '.$year.'')->whereMonth('created_at', 5)->get()->count(); 
         $jun = Transaction::where('status','success')->whereRaw('YEAR(created_at) = '.$year.'')->whereMonth('created_at', 6)->get()->count(); 
         $jun_ab = Transaction::where('status','!=','success')->whereRaw('YEAR(created_at) = '.$year.'')->whereMonth('created_at', 6)->get()->count(); 
         $jul = Transaction::where('status','success')->whereRaw('YEAR(created_at) = '.$year.'')->whereMonth('created_at', 7)->get()->count(); 
         $jul_ab = Transaction::where('status','!=','success')->whereRaw('YEAR(created_at) = '.$year.'')->whereMonth('created_at', 7)->get()->count(); 
         $aug = Transaction::where('status','success')->whereRaw('YEAR(created_at) = '.$year.'')->whereMonth('created_at', 8)->get()->count(); 
         $aug_ab = Transaction::where('status','!=','success')->whereRaw('YEAR(created_at) = '.$year.'')->whereMonth('created_at', 8)->get()->count(); 
         $sep = Transaction::where('status','success')->whereRaw('YEAR(created_at) = '.$year.'')->whereMonth('created_at', 9)->get()->count(); 
         $sep_ab = Transaction::where('status','!=','success')->whereRaw('YEAR(created_at) = '.$year.'')->whereMonth('created_at', 9)->get()->count(); 
         $oct = Transaction::where('status','success')->whereRaw('YEAR(created_at) = '.$year.'')->whereMonth('created_at', 10)->get()->count(); 
         $oct_ab = Transaction::where('status','!=','success')->whereRaw('YEAR(created_at) = '.$year.'')->whereMonth('created_at', 10)->get()->count();
        $nov = Transaction::where('status','success')->whereRaw('YEAR(created_at) = '.$year.'')->whereMonth('created_at', 11)->get()->count(); 
        $nov_ab = Transaction::where('status','!=','success')->whereRaw('YEAR(created_at) = '.$year.'')->whereMonth('created_at', 11)->get()->count(); 
        $dec = Transaction::where('status','success')->whereRaw('YEAR(created_at) = '.$year.'')->whereMonth('created_at', 12)->get()->count(); 
        $dec_ab = Transaction::where('status','!=','success')->whereRaw('YEAR(created_at) = '.$year.'')->whereMonth('created_at', 12)->get()->count(); 


        return view('pages.admin.dashboard',compact('jan','jan_ab','feb','feb_ab','mar','mar_ab','apr','apr_ab','may','may_ab','jun','jun_ab','jul','jul_ab','aug','aug_ab','sep','sep_ab','oct','oct_ab','nov','nov_ab','dec','dec_ab','amount','amount_ab','year','new_order','in_progress_order','completed_order','abandoned_order','products','categories','users','admins'))->with(['page_title'=>'Dashboard']);
        }
         if (Auth::user()->user_type==UserType::CLIENT->title()) {
        $new_order=Order::where('status','Confirmed')->where('user_id',Auth::user()->id)->get()->count();
        $in_progress_order=Order::where('status','Order On the Way')->where('user_id',Auth::user()->id)->get()->count();
        $completed_order=Order::where('status','Order Completed')->where('user_id',Auth::user()->id)->get()->count();
        $abandoned_order=Order::where('status','abandoned')->where('user_id',Auth::user()->id)->get()->count();
            return view('pages.client.dashboard',compact('new_order','in_progress_order','completed_order','abandoned_order'))->with(['page_title'=>'Dashboard']);
        }
       
    }

     public function admin_dashboard(Request $request)
    {
       return view('pages.admin.dashboard')->with(['page_title'=>'Dashboard']);
    }
     public function home_page_settings(Request $request)
    {

        $products=Product::get();
        $settings = HomePageSetting::first();
       return view('pages.admin.home_page_settings',compact('products','settings'))->with(['page_title'=>'Home Page Settings']);
    }

    public function save_home_page_settings(Request $request)
    {
      $slots = range(1, 11);
      $rules = [];
      foreach ($slots as $i) {
          $rules['image_'.$i] = 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048';
      }
      $this->validate($request, $rules, [
          'image' => 'Each slot image must be an image file (jpeg, png, jpg, gif, svg, webp).',
          'max' => 'Each slot image must not be larger than 2MB.',
      ]);

      $settings = HomePageSetting::first();

      $data = $request->except(array_merge(
          ['file', '_token'],
          array_map(fn ($i) => 'image_'.$i, $slots),
          array_map(fn ($i) => 'remove_image_'.$i, $slots)
      ));

      if ($request->hasFile('file')) {
          $file = "/assets/videos/".time() . '4.' . $request->file->getClientOriginalExtension();
          $request->file->move(public_path('assets/videos/'), $file);
          $data['file'] = $file;
      }

      // Custom slot images: an upload replaces the slot image, "remove" falls back to the product image
      foreach ($slots as $i) {
          $old = $settings?->{'image_'.$i};

          if ($request->hasFile('image_'.$i)) {
              $upload = $request->file('image_'.$i);
              $name = time().'_slot'.$i.'_'.uniqid().'.'.$upload->getClientOriginalExtension();
              $upload->move(public_path('assets/img/home/'), $name);
              $data['image_'.$i] = '/assets/img/home/'.$name;
          } elseif ($request->boolean('remove_image_'.$i)) {
              $data['image_'.$i] = null;
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

      HomePageSetting::create($data);
      return (['success' => 'Setting saved successfully']);
      
    }

    public function settings(Request $request)
    {

      $settings=Setting::first();
       return view('pages.admin.settings',compact('settings'))->with(['page_title'=>'Settings']);
    }


    public function save_settings(Request $request)
    {
      $settings=Setting::get();
      if (count($settings)>0) {
        $settings = Setting::first();
        if ($settings?->update(array_merge($request->all()))){
    
    // code...

  
      return (['success' => 'Setting update successfully']);

       }

      }else{
         if (Setting::create( array_merge($request->all()))) {
            return (['success' => 'Setting saved successfully']);
         }
      }
    }








}
