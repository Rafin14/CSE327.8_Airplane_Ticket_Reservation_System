<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Panel</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_style.css">
</head>
<body>


    <div class="head_panel1">

        <h1>Admin Panel</h1>
    </div>

    <div class="head_panel2">
        <h1>Flight Information</h1>
    </div>

    <div class="head_panel3">
        <h1>Flights:</h1>
    </div>


    <div class="side_bar">

        <br></br>
        <center>
        <button id="admin_buttons" onclick="window.location.href = 'http://localhost/';">Manage Flights</button>
        <br></br>
        <button id="admin_buttons" onclick="window.location.href = 'http://localhost/';">Customer Information</button>
        <br></br>
        <button id="admin_buttons" onclick="window.location.href = 'http://localhost/';">Manage Bookings</button>
        <br></br>
        <button id="logout" onclick="window.location.href = 'http://localhost/';">Logout</button>

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
        
        echo "</tr>";

        $count++;
    
    }
    
    echo "</table>";
    
    
    echo"</div>";

      
    ?>



</body>
</html>