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
 <div class="container">
        <table class="table table-stripped table-dark">
            <thead>
                <tr>
                <!-- <th scope="col"> Id <th> -->
                
                <th scope="col"> Name</th>
                
                <th scope="col"> Phone </th>
                <th scope="col"> Role </th>
                <th scope="col"> Address </th>
                <th scope="col"> Job </th>
                <th scope="col"> Achievements </th>
               
                

                



               <!--  <th scope="col"> Phone </th>
                <th scope="col"> Address </th>
                <th scope="col"> Job </th>
                <th scope="col"> Achievements </th> -->
             
                
                
               
                <!-- <th scope="col"> Address <th> 
                <th scope="col"> Achievemnets <th> 
                <th scope="col"> Job <th>    -->
                </tr>
            </thead>

                <tbody id="data">
                <script>


fetch("http://192.168.0.114:8000/users").then(
    res=>{
        res.json().then(
            data=>{
                console.log(data);
                if(data.length > 0){
                    var temp = "";

                    data.forEach((u)=>{

                        temp +="<tr>";

                        // temp +="<td>"+u.id+"</td>";
                        temp +="<td >"+u.name+"</td>";
                         
                        temp +="<td>"+u.Phone+"</td>";
                        temp +="<td>"+u.role.name+"</td>";
                        temp +="<td>"+u.Address+"</td>";
                        temp +="<td>"+u.Job+"</td>";
                        temp +="<td>"+u.Achievements+"</td>";
                        
                                            
                
                        // temp +="<td>"+u.Phone+"</td>";
                        // temp +="<td>"+u.Address+"</td>";
                        // temp +="<td>"+u.Job+"</td>";
                        // temp +="<td>"+u.Achievements+"</td>";
                        
                        temp +="</tr>";
                        // temp +="<td>"+u.Address+"</td></tr>";
                        // temp +="<td>"+u.Job+"</td></tr>";
                        // temp +="<td>"+u.Achievements+"</td></tr>";
                    })
                    document.getElementById("data").innerHTML = temp;
                }
            }

        )
    }
)
</script>
                
                </tbody>

        </table>
 </section>
        
     
    </body>







@endsection