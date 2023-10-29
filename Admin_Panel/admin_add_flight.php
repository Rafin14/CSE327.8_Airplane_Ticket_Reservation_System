<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Panel</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_style.css">
</head>

<?php 

session_start();

$db = mysqli_connect("localhost", "root", "", "airplane_ticket_reservation_system");

$id=$_SESSION["id"] ;
$pass=$_SESSION["pass"];

if(empty($id)){

    echo"error";
    echo '<script>alert("NOT AUTHORIZED")</script>';

    header("Refresh: 0; URL=http://localhost/admin_page/admin_login.html");

    exit;

}
else{

$sql = "SELECT pass FROM admin_info WHERE admin_ID = '$id'";
$password_query = $db->query($sql);
$password = $password_query->fetch_assoc();

if($password["pass"]==$pass){

    //DO NOTHING
}
else{
    
    echo"NOT AUTHORIZED";
    echo '<script>alert("NOT AUTHORIZED")</script>';

    header("Refresh: 0; URL=http://localhost/admin_page/admin_login.html");

    exit;

}
}

?>

<body>


    <div class="head_panel1">

        <h1>Admin Panel</h1>
    </div>

    <div class="head_panel2">
        <h1>Manage Flight:</h1>
    </div>

    <div class="head_panel3">
        <h1>Add Flight:</h1>
    </div>



    <div class="side_bar">

        <br></br>
        <center>
        <button id="admin_buttons" onclick="window.location.href = 'http://localhost/admin_page/admin_manage_flights.php';">Manage Flights</button>
        <br></br>
        <button id="admin_buttons" onclick="window.location.href = 'http://localhost/phpmyadmin/index.php?route=/database/structure&db=airplane_ticket_reservation_system';">Database Access</button>
        <br></br>
        <button id="logout" onclick="window.location.href = 'http://localhost/admin_page/admin_logout.php';">Logout</button>

    </div>


<div class = "flight_info">

<form action = "admin_flight_adding.php" method ="POST">

    <div>
        <label>Flight ID: </label> 
        <input type = "text" name = "flightid" value = "">
    </div>

    <div>
        <label>Origin: </label> 
        <input type = "text" name = "origin" value = "">
    </div>

    <div>
        <label>Destination: </label> 
        <input type = "text" name = "destination" value = "">
    </div>

    <div>
        <label>Date: </label> 
        <input type = "Date" name = "date" value = "">
    </div>

    <div>
        <label>Time: </label> 
        <input type = "time" name = "time" value = "">
    </div>

    <div>
        <label>Airline: </label> 
        <input type = "text" name = "airline" value = "">
    </div>

    <div>
        <label>Ticket Price: </label> 
        <input type = "text" name = "price" value = "">
    </div>

    <div>
        <input type = "submit" value = "Add Flight">
    </div>

</form>


</div>


</body>
</html>