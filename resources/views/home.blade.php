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
    <header>My App</header> <!--admin home page navigation bar -->
  <ul>
    <li><a href="home"><i class="fas fa-qrcode"></i>Dashboard</a></li>
    <li><a href="userslist"><i class="fas fa-link"></i>View users</a></li>
    <li><a href="eventlist"><i class="fas fa-calendar-week"></i>Events</a></li>
    <li><a href="#"><i class="far fa-question-circle"></i>About</a></li>
    <li><a href="#"><i class="fas fa-sliders-h"></i>Services</a></li>
    <li><a href="#"><i class="far fa-envelope"></i>Contact</a></li>
  </ul>
</div>
 <section>

     <h2 style="color: white; text-align:center">Welcome Admin</h2>
     <br>


    <div class="container"><!-- Shows admin home page and basic instructions to admin-->
      <div class="box">
        <div class="imgBx">
          <img src="create.jpg">
        </div>
        <div class="content"> <!-- information is shown in the box card-->
          <h3>View Users</h3>
          <p>Being the Admin of the System, you can view all the users participated in this system. You can view the address, phone number, name, email, their achievemnts and jobs. Also you can identify users from their role either 
          they are Alumni, College, Students or Admin.</p>
        </div>
      </div>
      <div class="box">
        <div class="imgBx">
          <img src="register.jpg">
        </div>
        <div class="content">
          <h3>Create College</h3>
          <p>Admin only have the permission to create a new College in the system. So Being an Admin you can create a new College and once a college is registered you should hand the account to the respective college. this can be done through Mobile Application also.</p>
        </div>
      </div>
      <div class="box">
        <div class="imgBx">
          <img src="view.jpg">
        </div>
        <div class="content">
          <h3>View Events</h3>
          <p>Events can be viewed by every users of the application. Whereas the authority to create events is only given to college. You can view all the events created by college from Admin panel as well as Mobile Application.</p>
        </div>
      </div>
    </div>

    <br>
    <br>
    <br>



 <div class = "box2">
    <div class="imgBx">

    <img src = "background.jpg">

    <div class = "content">
        <h3 style="color: black; text-align:center"> Alumni Tracking System</h3>
   
    </div>

    <div class = "contents">
        <h3 style="color: black; text-align:center"> About us</h3>

        <h5 style="color: black; text-align:center"> Alumni Tracking System is a Mobile based application. This application is made for a university to track their alumni, students and faculty members. this application provides 
        seperate database to store information of alumni, student and colleges of the a particular university. </h5>
   
    </div>

    <div class = "container">
        <h3 style="color: black; text-align:center"> What's inside App</h3>
       
        <h5 style="color: black; text-align:center"> Search your faculty members. Call and mail via application. Watch events and stay connected.</h5>
        <h6 style="color: black; text-align:center">Developed by: Saugat Poudel</h6>
   
    </div>
    </div>
    </div>
     </section>

  </body>
</html>




@endsection