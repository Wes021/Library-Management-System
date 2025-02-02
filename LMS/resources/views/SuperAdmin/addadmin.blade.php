<div class="tab-content">
  <div id="signup">   
    <h1>Sign Up for Free</h1>
    
    <form action="{{ route('addadmin') }}" method="get">
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
    
    <button type="submit" class="button button-block">Get Started</button>
    
    </form>

  </div>