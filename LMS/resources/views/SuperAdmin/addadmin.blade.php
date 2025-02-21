<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Add Employee</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }

    body {
      background: #f4f4f4;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      width: 100%;
      max-width: 700px;
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin-top: 160px
    }

    h1 {
      text-align: center;
      margin-bottom: 20px;
    }

    .field-wrap {
      margin-bottom: 15px;
    }

    label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    input, select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
    }

    .button {
      display: block;
      width: 100%;
      padding: 10px;
      background: #007bff;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 18px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .button:hover {
      background: #0056b3;
    }
  </style>
</head>
<body>
  <br>
    <br>
    <br>
    <br>
    <br><br>
    @include('layouts.SuperAdminNavbar') <!-- Always Include Navbar -->
    @include('layouts.SuperAdminSideNavbar')
  

   <div class="content">
       
   </div>
  <div class="container">
    @include('common.alert')
    <h1>Add Employee</h1>
      
    <form action="{{ route('AddEmployee') }}" method="get">
      @csrf

      <div class="field-wrap">
        <label>First Name<span class="req">*</span></label>
        <input name="name" type="text" required autocomplete="off" />
      </div>

      <div class="field-wrap">
        <label>Email Address<span class="req">*</span></label>
        <input name="email" type="email" required autocomplete="off"/>
      </div>

      <div class="field-wrap">
        <label>Set A Password<span class="req">*</span></label>
        <input name="password" type="password" required autocomplete="off"/>
      </div>

      <div class="field-wrap">
        <label>Choose a Role<span class="req">*</span></label>
        <select name="role">
          <option value="">Select</option>
          <option value="1">Super Admin</option>
          <option value="2">Admin</option>
          <option value="3">Not Assigned</option>
        </select>
      </div>

      <div class="field-wrap">
        <label>Gender<span class="req">*</span></label>
        <select name="gender">
          <option value="Not Added">Select</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
      </div>

      <div class="field-wrap">
        <label>Phone Number<span class="req">*</span></label>
        <input name="phone_number" type="text" required autocomplete="off"/>
      </div>

      <button type="submit" class="button">Add Employee</button>
    </form>
    <a href="{{ route('DisplayEmployees') }}">Back</a>
  </div>
</body>
</html>
