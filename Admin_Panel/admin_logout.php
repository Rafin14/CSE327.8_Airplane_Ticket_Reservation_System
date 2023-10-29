<?php
/**
 * PHP script for logging out an admin user and redirecting to the admin login page.
 *
 * This script logs out the admin user, destroys the session, and redirects to the admin login page.
 *
 * @package AdminLogout
 * @author [Your Name]
 * @version 1.0
 */

// Start the session
session_start();

// Redirect to the admin login page
header("Location: http://localhost/CSE327.8_Airplane_Ticket_Reservation_System/Admin_Panel/admin_login.html");

// Destroy the session to log the user out
session_destroy();

// Exit the script
exit();
