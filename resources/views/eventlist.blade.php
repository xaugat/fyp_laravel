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
    <header>My App</header> <!--creates navigation of admin panel -->
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
     



 <div class="container">
        <table class="table table-stripped table-dark"> <!--table css -->
            <thead>
                <tr>
                <!-- <th scope="col"> Id <th> -->
                
                <th scope="col"> Event Name</th> <!--table headers -->
                
                <th scope="col"> Event Date </th>
                <th scope="col"> Venue </th>
                <th scope="col"> Time </th>
                
             
                
              
                </tr>
            </thead>

                <tbody id="data"> <!-- data fetched from data variable is assigned here to show in table -->
                <script>
fetch("http://192.168.0.114:8000/api/allevents").then( // fetch data from api and shows in list 
  
    res=>{
      
        res.json().then(

            data=>{ // all data are saved in data variables 
                console.log(data.data);
                if(data.data.length > 0){
                    var temp = "";

                    data.data.forEach((u)=>{ // for loops to iterate and fetch data from api 
                        temp +="<tr>";
                        temp +="<td>"+u.event_name+"</td>";
                        temp +="<td>"+u.event_date+"</td>";
                        temp +="<td>"+u.event_venue+"</td>";
                        temp +="<td>"+u.event_time+"</td>";
                       
                        
                        temp +="</tr>";
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