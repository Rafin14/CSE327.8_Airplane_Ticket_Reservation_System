<?php
/**
 * PHP script for admin login to the airplane ticket reservation system.
 *
 * This script handles the admin login process, verifying the provided credentials and granting access to the admin dashboard.
 *
 * @package AdminLogin
 * @author Rafin Hassan
 * @version 1.0
 */

// Start the session
session_start();

// Connect to the database
$db = mysqli_connect("localhost", "root", "", "airplane_ticket_reservation_system");

$id = $_POST["id"];
$pass = $_POST["password"];

// Check if either ID or password is empty
// Make this a function
if (empty($id) || empty($pass)) {
    echo "error";
    echo '<script>alert("Please Enter ID and Pass")</script>';
    header("Refresh: 0.5; URL=http://localhost/CSE327.8_Airplane_Ticket_Reservation_System/Admin_Panel/admin_login.html");
} else {
    // Check if the provided password matches the one stored in the database
    $sql = "SELECT pass FROM admin_info WHERE admin_ID = '$id'";
    $password_query = $db->query($sql);
    $password = $password_query->fetch_assoc();

    if ($password["pass"] == $pass) {
        echo "successfull";

        // Store admin ID and password in the session
        $_SESSION["id"] = $id;
        $_SESSION["pass"] = $pass;

        // Redirect to the admin dashboard
        header("Location: http://localhost/CSE327.8_Airplane_Ticket_Reservation_System/Admin_Panel/admin_dashboard.php");
    } else {
        echo "error";
        echo '<script>alert("Username or Password Incorrect")</script>';
        header("Refresh: 0.5; URL=http://localhost/CSE327.8_Airplane_Ticket_Reservation_System/Admin_Panel/admin_login.html");
    }
}
