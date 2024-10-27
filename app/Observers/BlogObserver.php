<?php


namespace App\Observers;

use App\Models\Blog;
use App\Mail\NotificationMaller;
use App\Models\Subscription;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class BlogObserver
{
    public function created(Blog $blog)
    {
	      $emails=Subscription::get();
	      foreach ($emails as $email) {
	      	// code...
	      
	      $data = [
            'name' =>'User',
            'subject'=>'New Blog Post:'.$blog->title.'',
            'url_description' => 'New Blog Post:'.$blog->title.'',
            'body'=>'',
        ];
        $data['body'] ="Hello! ,<br>
		We're excited to share our latest blog post,<b>".$blog->title."</b>.
		<br>
		Read the full post here: <a href='read_post/".$blog->slug."'><b>".$blog->title."</b></a>
		<br>

		We hope you enjoy it!
		<br>

		Best,

		".ucfirst(env('APP_NAME'))."";

	            

	        Mail::to($email)->queue(new NotificationMaller($data)); 
	    }
	}

   
}