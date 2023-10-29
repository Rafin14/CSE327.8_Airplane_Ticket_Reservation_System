<?php
// (A) LOAD LIBRARY
require "2-reserve-lib.php";

// (B) SAVE
$_RSV->save($_POST["flightid"], $_POST["bookingid"], $_POST["seats"]);
header("Refresh: 0; URL=http://localhost/CSE327.8_Airplane_Ticket_Reservation_System/Payment/PaymentGateway.html");
