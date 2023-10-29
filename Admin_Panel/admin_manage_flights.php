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
        <h1>Manage Flights</h1>
    </div>

    <div class="head_panel3">
        <h1>Modify Flights:</h1>

        <right>
        <button id="add_flight" onclick="window.location.href = 'http://localhost/admin_page/admin_add_flight.php';">Add Flight</button>
    </div>


    <div class="side_bar">

        <br></br>
        <center>
        <button id="admin_buttons" onclick="window.location.href = 'http://localhost/admin_page/admin_manage_flights.php';">Manage Flights</button>
        <br></br>
        <button id="admin_buttons" onclick="window.location.href = 'http://localhost/';">Manage Bookings</button>
        <br></br>
        <button id="admin_buttons" onclick="window.location.href = 'http://localhost/phpmyadmin/index.php?route=/database/structure&db=airplane_ticket_reservation_system';">Database Access</button>
        <br></br>
        <button id="logout" onclick="window.location.href = 'http://localhost/admin_page/admin_logout.php';">Logout</button>

    </div>

    <?php
    
    $db = mysqli_connect("localhost", "root", "", "airplane_ticket_reservation_system");

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    
    $count = 1;       
    $query = "SELECT * FROM flight_info;";
    $flightdata_query = $db->query($query);


    if (!$flightdata_query) {
        die("Query failed: " . $db->error);
    }

    echo"<div class = flight_table>";

    echo "<table>";
    
    echo "<tr>";
    echo "<th>No.</th>";
    echo "<th>Flight ID</th>";
    echo "<th>Origin</th>";
    echo "<th>Destination</th>";
    echo "<th>Departure Time</th>";
    echo "<th>Airline</th>";
    echo "<th>Action</th>";
    
    echo "</tr>";

    echo "</tr>";
    
    while ($flightdata = $flightdata_query->fetch_assoc()) {

        echo "<tr>";

        echo "<td>" . $count. "</td>";
        echo "<td>" . $flightdata["flight_id"] . "</td>";
        echo "<td>" . $flightdata["origin"] . "</td>";
        echo "<td>" . $flightdata["destination"] . "</td>";
        echo "<td>" . $flightdata["departure_time"] . "</td>";
        echo "<td>" . $flightdata["airline_name"] . "</td>";
        echo "<td><button id='admin_buttons' onclick='location.href=\"admin_modify_flight.php?flight_id=" . $flightdata["flight_id"] . "\"'>Modify</button></td>";
        
        echo "</tr>";

        $count++;
    
    }
    
    echo "</table>";
    
    
    echo"</div>";

      
    ?>



</body>
</html>