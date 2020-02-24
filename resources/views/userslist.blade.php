@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<html lang="en">
<head runat="server">
    
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>List of Users</title>
</head>
<body>

<div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
  <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>

  <a href="/user" class="w3-bar-item w3-button">Admin Profile</a>
  <a href="/userslist" class="w3-bar-item w3-button">All users</a>
 


</div>

<div class="w3-teal">
  <button class="w3-button w3-teal w3-xlarge" onclick="w3_open()">☰</button>
  <div class="w3-container">
    <h1>Alumni Tracking System</h1>
      <h3>Welcome Admin!!</h3>
  </div>
</div>



<div class="w3-container">
    <p></p>
       <form id="form1" runat="server">
        <div>
        </div>
        
<div class="container">
        <table class="table table-stripped table-dark">
            <thead>
                <tr>
                <!-- <th scope="col"> Id <th> -->
                
                <th scope="col"> Name</th>
                
                <th scope="col"> Role</th>
                
                <th scope="col"> Email </th>
                <th scope="col"> Phone </th>
                <th scope="col"> Address </th>
                <th scope="col"> Job </th>
                <th scope="col"> Achievements </th>
             
                
                
               
                <!-- <th scope="col"> Address <th> 
                <th scope="col"> Achievemnets <th> 
                <th scope="col"> Job <th>    -->
                </tr>
            </thead>

                <tbody id="data">
                <script>


fetch("http://192.168.0.116:8000/users").then(
    res=>{
        res.json().then(
            data=>{
                console.log(data);
                if(data.length > 0){
                    var temp = "";

                    data.forEach((u)=>{
                        temp +="<tr>";
                        // temp +="<td>"+u.id+"</td>";
                        temp +="<td>"+u.name+"</td>";
                        temp +="<td>"+u.role.name+"</td>";
                        temp +="<td>"+u.email+"</td>";
                        temp +="<td>"+u.Phone+"</td>";
                        temp +="<td>"+u.Address+"</td>";
                        temp +="<td>"+u.Job+"</td>";
                        temp +="<td>"+u.Achievements+"</td>";
                        
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
</div>
         
       
    </form>

</div>

<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>



</body>
</html>
@endsection