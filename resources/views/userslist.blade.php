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
    <input type="checkbox" id="check"> <!--css properties for userslist page -->
    <label for="check">
      <i class="fas fa-bars" id="btn"></i>
      <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
    <header>My App</header>
  <ul>
    <li><a href="home"><i class="fas fa-qrcode"></i>Dashboard</a></li>
    <li><a href="userslist"><i class="fas fa-link"></i>View users</a></li>
    <!-- <li><a href="register"><i class="fas fa-stream"></i>Create College</a></li> -->
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
              
                
                
                <th scope="col"> Name</th>
                
                <th scope="col"> Email </th>
                <th scope="col"> Role </th>

                <th scope="col"> Address </th>
                <th scope="col"> Phone </th>
                            <th scope="col"> Job </th>
                <th scope="col"> Achievements </th>
                </tr>
                
            </thead>
            
                    
                   



                <tbody id="data"> <!--displays data from data variable and shows in table  -->


                <script>
                    function myFunction() {
  location.replace("https://www.w3schools.com")
}



fetch("http://192.168.0.114:8000/users").then( // fetch user data from user api 
    res=>{
        res.json().then(
            data=>{
                console.log(data+1);
                if(data.length > 0){
                    var temp = "";

                    data.forEach((u)=>{ // using for each loops data from user api is fetched and displayed

                        temp +="<tr>";
                        
                        temp +="<td>"+u.name+"</td>";
                         
                        temp +="<td>"+u.email+"</td>";
                        temp +="<td>"+u.role.name+"</td>";
                        temp += "<td>"+u.Address+"</td>";
                        temp +="<td>"+u.Phone+"</td>";
 
                        temp +="<td>"+u.Job+"</td>";
                        temp +="<td>"+u.Achievements+"</td>";
                       
                        temp +="</tr>";
                        
                    }
                  
                    )
                    document.getElementById("data").innerHTML = temp; // saves data in data variable


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