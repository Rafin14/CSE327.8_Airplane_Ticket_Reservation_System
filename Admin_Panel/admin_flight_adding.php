<?php
/**
 * PHP script for adding flight information to the airplane ticket reservation system.
 *
 * This script verifies admin authorization and allows the addition of flight information to the database.
 *
 * @package FlightManagement
 * @author Rafin Hassan
 * @version 1.0
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

$flightid = $_POST["flightid"];
$origin = $_POST["origin"];
$destination = $_POST["destination"];
$date = $_POST["date"];
$time = $_POST["time"];
$airline = $_POST["airline"];
$price = $_POST["price"];

$datetime = $date . " " . $time;

echo $flightid;
echo $origin;
echo $destination;
echo $datetime;
echo $airline;
echo $price;

if (empty($flightid) || empty($origin) || empty($destination) || empty($datetime) || empty($price)) {
    echo '<script>alert("ADD ALL FLIGHT INFORMATION \nRedirecting...")</script>';
    header("Refresh: 0; URL=http://localhost/CSE327.8_Airplane_Ticket_Reservation_System/Admin_Panel/admin_manage_flights.php");
} else if (!empty($flightid) || !empty($origin) || !empty($destination) || !empty($datetime) || !empty($price)) {
    $sql = "INSERT INTO flight_info(flight_id, origin, destination, departure_time, airline_name, price) VALUES ('$flightid','$origin','$destination','$datetime','$airline','$price');";
    mysqli_query($db, $sql);

    echo '<script>alert("Flight Added \nRedirecting...")</script>';
    header("Refresh: 0; URL=http://localhost/CSE327.8_Airplane_Ticket_Reservation_System/Admin_Panel/admin_manage_flights.php");
}
?>
