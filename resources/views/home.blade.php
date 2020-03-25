@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sider Menu Bar CSS</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <body>
    <input type="checkbox" id="check">
    <label for="check">
      <i class="fas fa-bars" id="btn"></i>
      <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
    <header>My App</header>
  <ul>
    <li><a href="home"><i class="fas fa-qrcode"></i>Dashboard</a></li>
    <li><a href="userslist"><i class="fas fa-link"></i>View users</a></li>
    <li><a href="register"><i class="fas fa-stream"></i>Create College</a></li>
    <li><a href="eventlist"><i class="fas fa-calendar-week"></i>Events</a></li>
    <li><a href="#"><i class="far fa-question-circle"></i>About</a></li>
    <li><a href="#"><i class="fas fa-sliders-h"></i>Services</a></li>
    <li><a href="#"><i class="far fa-envelope"></i>Contact</a></li>
  </ul>
</div>
 <section>
     <h2 style="color: white; text-align:center">Welcome Admin</h2>
     <br>


    <div class="container">
      <div class="box">
        <div class="imgBx">
          <img src="create.jpg">
        </div>
        <div class="content">
          <h3>View Users</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
      </div>
      <div class="box">
        <div class="imgBx">
          <img src="register.jpg">
        </div>
        <div class="content">
          <h3>Create College</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
      </div>
      <div class="box">
        <div class="imgBx">
          <img src="view.jpg">
        </div>
        <div class="content">
          <h3>Track users</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
      </div>
    </div>
    <br>
    <br>
    <div class = "box2">
    <div class="imgBx">
    <img src = "bg.jpg">
    <div class = "content">
    <h1> Hello saugat</h1>
    </div>
    </div>
    </div>

 </section>

  </body>
</html>




@endsection