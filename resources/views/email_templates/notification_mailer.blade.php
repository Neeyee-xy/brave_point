<div style='background-color: white!important; border-color: #4b545c; height:100%; width:100%;padding-top:10px;padding-right:auto;padding-left:auto;padding-bottom:20px;'>

    <center><img src="{{  env('APP_URL') }}/logos/logo.png" alt="{{ ucfirst(env('APP_NAME')) }}"><h4 style='font-size:25px; font-weight:400;color:black;'>{{ ucfirst(env('APP_NAME')) }}</h4><center>

    <div style='background-color: #ffffff; height:100%; width:100%;padding:10px;color:black;text-align:left;'>
       <?php echo $body;?>
    </div>
    <p style='text-align: center;color:black'>
        Copyright &copy; {{ date("Y") }} <a href="{{  env('APP_URL') }}" target='_blank' rel='noopener'>{{ ucfirst(env('APP_NAME')) }}</a>
    </p>
</div>