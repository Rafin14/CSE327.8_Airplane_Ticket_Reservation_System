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
 * PHP script for deleting a flight and associated data from the airplane ticket reservation system.
 *
 * This script verifies admin authorization and deletes a flight and associated booking and payment data from the database.
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
$flightId = $_SESSION["flightid"];

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

// Check if a valid flight ID is available
if (empty($flightId)) {
    echo "ERROR";
    echo '<script>alert("NOT AUTHORIZED")</script>';
    header("Refresh: 0; URL=http://localhost/CSE327.8_Airplane_Ticket_Reservation_System/Admin_Panel/admin_login.html");
    exit;
} else {
    // Delete associated payment and booking data for the flight
    $sql = "DELETE FROM payment_info WHERE booking_id IN (SELECT booking_id FROM booking_info WHERE flight_id = '$flightId');";
    mysqli_query($db, $sql);

    $sql = "DELETE FROM booking_info WHERE flight_id = '$flightId'";
    mysqli_query($db, $sql);

    // Delete the flight data itself
    $sql = "DELETE FROM flight_info WHERE flight_id = '$flightId'";
    mysqli_query($db, $sql);

    // Redirect to the flight management page
    header("Refresh: 0; URL=http://localhost/CSE327.8_Airplane_Ticket_Reservation_System/Admin_Panel/admin_manage_flights.php");
}
?>
