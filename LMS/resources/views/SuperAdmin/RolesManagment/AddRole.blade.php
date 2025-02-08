<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('AddRole') }}" method="GET">
        @csrf
        <div class="top-row">
            <div class="field-wrap">
              <label>
                Role ID<span class="req"></span>
              </label>
              <input value="Automatically generated" name="name" type="text" required autocomplete="off"  disabled/>
            </div>
          </div>
      
          <div class="field-wrap">
            <label>
              Role name<span class="req">*</span>
            </label>
            <input name="role_name" type="text"required autocomplete="off"/>
          </div>

          <button type="submit">Add role</button>
    </form>
</body>
</html>