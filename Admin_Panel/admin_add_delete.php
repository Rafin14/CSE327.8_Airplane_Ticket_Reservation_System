<?php
/**
 * PHP script for managing flight information in the airplane ticket reservation system.
 *
 * This script handles updating flight information and deleting flights if authorized.
 *
 * @author Rafin Hassan (ID: 2021099042)
 */

// Start the session
session_start();

// Connect to the database
$db = mysqli_connect("localhost", "root", "", "airplane_ticket_reservation_system");

// Get user information from the session
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

// Get flight information from the POST data
$flightid = $_POST["flightid"];
$origin = $_POST["origin"];
$destination = $_POST["destination"];
$date = $_POST["date"];
$time = $_POST["time"];
$airline = $_POST["airline"];
$price = $_POST["price"];
$delete = $_POST["delete_flight"];
$datetime = $date . " " . $time;

// Check if the user wants to delete a flight
if ($delete == 1) {
    $_SESSION["flightid"] = $flightid;
    echo '<script>
     if (confirm("Are you sure you want to delete this Flight?")) {
        alert("DELETED");
        window.location = "http://localhost/CSE327.8_Airplane_Ticket_Reservation_System/Admin_Panel/admin_flight_delete.php";
     } else {
        alert("CANCELLED \nRedirecting...");
        window.location = "http://localhost/CSE327.8_Airplane_Ticket_Reservation_System/Admin_Panel/admin_manage_flights.php";
     }
     </script>';
} else {
    // Check if any required fields are empty
    if (empty($flightid) || empty($origin) || empty($destination) || empty($datetime) || empty($price)) {
        echo '<script>alert("Please Enter All Fields \nRedirecting...")</script>';
        header("Refresh: 0; URL=http://localhost/CSE327.8_Airplane_Ticket_Reservation_System/Admin_Panel/admin_manage_flights.php");
    } else {
        // Update flight information in the database
        $sql = "UPDATE flight_info SET origin = '$origin' WHERE flight_id = '$flightid'";
        mysqli_query($db, $sql);

        $sql = "UPDATE flight_info SET destination = '$destination' WHERE flight_id = '$flightid'";
        mysqli_query($db, $sql);

        $sql = "UPDATE flight_info SET departure_time = '$datetime' WHERE flight_id = '$flightid'";
        mysqli_query($db, $sql);

        $sql = "UPDATE flight_info SET airline_name = '$airline' WHERE flight_id = '$flightid'";
        mysqli_query($db, $sql);

        $sql = "UPDATE flight_info SET price = '$price' WHERE flight_id = '$flightid'";
        mysqli_query($db, $sql);

        echo '<script>alert("Flight Information Updated \nRedirecting...")</script>';
        header("Refresh: 0; URL=http://localhost/CSE327.8_Airplane_Ticket_Reservation_System/Admin_Panel/admin_manage_flights.php");
    }
}
?>
