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