<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Panel</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_style.css">
</head>

<?php
/**
 * PHP script for displaying flight information in the admin panel.
 *
 * This script verifies admin authorization and retrieves flight information from the database.
 *
 * @author Rafin Hassan (ID: 2021099042)
 */

// Start the session
session_start();

// Connect to the database
$db = mysqli_connect("localhost", "root", "", "airplane_ticket_reservation_system");

$id = $_SESSION["id"];
$pass = $_SESSION["pass"];

// Check if the user is authorized
if (empty($id)) {
    echo "error";
    echo '<script>alert("NOT AUTHORIZED")</script>';
    header("Refresh: 0; URL=http://localhost/CSE327.8_Airplane_Ticket_Reservation_System/Admin_Panel/admin_login.html");
    exit;
} else {
    // Check if the provided password matches the one stored in the database
    $sql = "SELECT pass FROM admin_info WHERE admin_ID = '$id'";
    $password_query = $db->query($sql);
    $password = $password_query->fetch_assoc();

    if ($password["pass"] == $pass) {
        // The user is authorized; do nothing
    } else {
        echo "NOT AUTHORIZED";
        echo '<script>alert("NOT AUTHORIZED")</script>';
        header("Refresh: 0; URL=http://localhost/CSE327.8_Airplane_Ticket_Reservation_System/Admin_Panel/admin_login.html");
        exit;
    }
}
?>

<body>
    <div class="head_panel1">
        <h1>Admin Panel</h1>
    </div>

    <div class="head_panel2">
        <h1>Flight Information</h1>
    </div>

    <div class="head_panel3">
        <h1>ALL Flights:</h1>
    </div>

    <div class="side_bar">
        <br></br>
        <center>
        <button id="admin_buttons" onclick="window.location.href = 'http://localhost/CSE327.8_Airplane_Ticket_Reservation_System/Admin_Panel/admin_manage_flights.php';">Manage Flights</button>
        <br></br>
        <button id="admin_buttons" onclick="window.location.href = 'http://localhost/phpmyadmin/index.php?route=/database/structure&db=airplane_ticket_reservation_system';">Database Access</button>
        <br></br>
        <button id="logout" onclick="window.location.href = 'http://localhost/CSE327.8_Airplane_Ticket_Reservation_System/Admin_Panel/admin_logout.php';">Logout</button>
    </div>

    <?php
    // Connect to the database again to retrieve flight data
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

    echo "<div class = flight_table>";

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
    echo "</div>";
    ?>

</body>
</html>
