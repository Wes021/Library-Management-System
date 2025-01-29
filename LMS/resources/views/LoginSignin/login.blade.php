<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/LoginSignin.css') }}">

</head>
<body>
    <div class="form">
      
        <ul class="tab-group">
          <li class="tab active"><a href="#signup">Sign Up</a></li>
          <li class="tab"><a href="#login">Log In</a></li>
        </ul>
        
        <div class="tab-content">
          <div id="signup">   
            <h1>Sign Up for Free</h1>
            
            <form action="{{ route('signup') }}" method="get">
              @csrf
            <div class="top-row">
              <div class="field-wrap">
                <label>
                  First Name<span class="req">*</span>
                </label>
                <input name="name" type="text" required autocomplete="off" />
              </div>
            </div>
    
            <div class="field-wrap">
              <label>
                Email Address<span class="req">*</span>
              </label>
              <input name="email" type="email"required autocomplete="off"/>
            </div>

            <div class="field-wrap">
              <label>
                Phone number<span class="req">*</span>
              </label>
              <input name="phone_number" type="text"required autocomplete="off"/>
            </div>
            
            <div class="field-wrap">
              <label>
                Set A Password<span class="req">*</span>
              </label>
              <input name="password" type="password"required autocomplete="off"/>
            </div>
            
            <button type="submit" class="button button-block"/>Get Started</button>
            
            </form>
    
          </div>
          
          <div id="login">   
            <h1>Welcome Back!</h1>
            
            <form action="{{ route('signin') }}" method="post">
              @csrf

              <div class="field-wrap">
              <label>
                Email Address<span class="req">*</span>
              </label>
              <input name="email" type="email"required autocomplete="off"/>
            </div>
            
            <div class="field-wrap">
              <label>
                Password<span class="req">*</span>
              </label>
              <input name="password" type="password"required autocomplete="off"/>
            </div>
            
            <p class="forgot"><a href="#">Forgot Password?</a></p>
            
            <button type="submit">Sign in</button>
            
            </form>
    
          </div>
          
        </div><!-- tab-content -->
        
    </div> <!-- /form -->
    <script src="{{ asset('js/SignupSignin/SignupSignin.js') }}"></script>

</body>
</html>