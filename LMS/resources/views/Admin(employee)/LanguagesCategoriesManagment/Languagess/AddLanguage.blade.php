<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <form action="{{ route('AddLanguage') }}" method="get">
        @csrf

      <div class="top-row">
        <div class="field-wrap">

          <label>
            ID<span class="req">*</span>
          </label>
          <input name="book_title" type="text" value="Automaticlly generated" required autocomplete="off" disabled/>

        </div>
      </div>
  
      <div class="field-wrap">

        <label>
            Name<span class="req">*</span>
          </label>
          <input name="language_name" type="text" required autocomplete="off" />

      </div>
  <button type="submit">Add language</button>
    </form>

</body>
</html>