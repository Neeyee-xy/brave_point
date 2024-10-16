<?php

namespace App\Http\Controllers;
use App\Models\Setting;
use App\Enums\UserType;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;



    public function __construct()
    {
        try {
            $settings = Setting::firstorfail();
            
        } catch (ModelNotFoundException $e) {
           if (Auth::user()->user_type==UserType::ADMIN->title()) {
                       return ([
                            'errors' => 'Paystack secret not found',
                        ]);
                   }else{
                    return (['errors' => 'Something went wrong,contact admin ']);
                   }
        }
        $this->settings =  $settings;
    }
}
