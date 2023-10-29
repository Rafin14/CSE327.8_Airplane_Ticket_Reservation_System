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



    <div class="side_bar">

        <br></br>
        <center>
        <button id="admin_buttons" onclick="window.location.href = 'http://localhost/admin_page/admin_manage_flights.php';">Manage Flights</button>
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
    
    if (isset($_GET['flight_id'])) {

        $flightId = $_GET['flight_id'];
    
    } else {

        echo"NOT AUTHORIZED";
        echo '<script>alert("NOT AUTHORIZED")</script>';
    
        header("Refresh: 0; URL=http://localhost/admin_page/admin_login.html");
    
        exit;
    
    
    }

    echo"<div class=head_panel3>";
    echo"<h1>Flight Info of  $flightId : </h1>";
    echo"</div>";
    
    $query = "SELECT * FROM flight_info WHERE flight_id = '$flightId';";
    $flightdata_query = $db->query($query);


    if (!$flightdata_query) {
        die("Query failed: " . $db->error);
    }

    echo"<div class = flight_table>";

    echo "<table>";
    
    echo "<tr>";
    echo "<th>Flight ID</th>";
    echo "<th>Origin</th>";
    echo "<th>Destination</th>";
    echo "<th>Departure Time</th>";
    echo "<th>Airline</th>";
    echo "<th>TIcket Price</th>";
    
    echo "</tr>";

    echo "</tr>";
    
    while ($flightdata = $flightdata_query->fetch_assoc()) {

        echo "<tr>";
        
        echo "<td>" . $flightdata["flight_id"] . "</td>";
        echo "<td>" . $flightdata["origin"] . "</td>";
        echo "<td>" . $flightdata["destination"] . "</td>";
        echo "<td>" . $flightdata["departure_time"] . "</td>";
        echo "<td>" . $flightdata["airline_name"] . "</td>";
        echo "<td>" . "BDT " . $flightdata["price"] . "</td>";


        
        echo "</tr>";
    
    }
    
    echo "</table>";
    
    
    echo"</div>";

    echo"<div class=head_panel3>";
    echo"<h1>Enter Updated Info of  $flightId : </h1>";
    echo"</div>";
      
    ?>

<div class = "flight_info">

<form action = "admin_add_delete.php" method ="POST">

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

    <input type="hidden" name="flightid" value="<?php echo $flightId; ?>">


    <div>
        <input type = "submit" value = "Update">
    </div>

</form>

<form action = "admin_add_delete.php" method ="POST">

<input type="hidden" name="flightid" value="<?php echo $flightId; ?>">
<input type="hidden" name="delete_flight" value="1">

<div>
    <input type="submit" id="delete_flight_button" value="DELETE FLIGHT">
</div>


</form>

</body>
</html>