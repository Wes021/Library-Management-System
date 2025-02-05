<div class="tab-content">
    <div id="signup">   
      <h1>Sign Up for Free</h1>
      
      <form action="{{ route('AddBook') }}" method="get">
        @csrf

      <div class="top-row">
        <div class="field-wrap">

          <label>
            Book Title<span class="req">*</span>
          </label>
          <input name="book_title" type="text" required autocomplete="off" />

        </div>
      </div>
  
      <div class="field-wrap">

        <label>
            ISBN<span class="req">*</span>
          </label>
          <input name="isbn" type="text" required autocomplete="off" />

      </div>
  
      <div class="field-wrap">

        <label>
            Publisher<span class="req">*</span>
          </label>
          <input name="publisher" type="text" required autocomplete="off" />

      </div>
      
      <div class="field-wrap">

        <label>
            Language<span class="req">*</span>
          </label>
          
          <select name="language" id="role">
            <option value="">Select</option>
            <option value="1">Arabic</option>
            <option value="2">English</option>
            <option value="3">German</option>
  
          </select>

      </div>

      <div class="field-wrap">

        <label>
            Year published<span class="req">*</span>
          </label>
          <input name="year" type="text" required autocomplete="off" />

      </div>
  
  
      <div class="field-wrap">

        <label>
          Category<span class="req">*</span>
        </label>
        
        <select name="category" id="role">
          <option value="">Select</option>  
          <option value="1">Sience</option>
          <option value="2">Art</option>
          <option value="3">Chimistry</option>

        </select>
  
      </div>

      

      <div class="field-wrap">

        <label>
            image<span class="req">*</span>
          </label>
          <input name="image" type="url" required autocomplete="off" />

      </div>

      <div class="field-wrap">

        <label>
            Status<span class="req">*</span>
          </label>
          
          <select name="status" id="role">
            <option value="">Select</option>
            <option value="1">Available</option>
            <option value="2">Not Available</option>
            <option value="3">Damaged</option>
  
          </select>

      </div>
    

      <div class="field-wrap">

        <label>
            Fine Rate<span class="req">*</span>
          </label>
          <input name="fine_rate" type="text" required autocomplete="off" />

      </div>

      <label>
        Total copies<span class="req">*</span>
      </label>
      <input name="total_copies" type="text" required autocomplete="off" />

  </div>
      
  
      <button type="submit" class="button button-block">Get Started</button>
      
      </form>
  
    </div>