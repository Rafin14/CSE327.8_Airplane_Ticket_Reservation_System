<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Link to an external CSS stylesheet -->
    <link rel="stylesheet" href="Style.css">
    <!-- Link to Google Fonts for font styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap">
</head>
<body>
    <!-- Header with a centered heading -->
    <div class="centered-heading">
        <!-- Heading welcoming users to the payment section -->
        <h1>Welcome to Payment</h1>
    </div>
    <!-- Container for payment details -->
    <div class="centered-box">
        <?php
        /**
 
 *
 * PHP version 7.2
 *
 * @category Payment_Process
 * @package  Airplane_Ticket_Reservation_System
 * @author   Zarin Tasnim Roshni 2021627642
 */
       // Establish a database connection
       $db = mysqli_connect("localhost", "root", "", "airplane_ticket_reservation_system");

       function displayPaymentDetails($db)
{
   $query = "SELECT * FROM payment_info WHERE booking_id = '555';";
   $payment_data_query = $db->query($query);

   if (!$payment_data_query) {
       die("Query failed: " . $db->error);
   }

        echo "<div class='payment-details'>";

        echo "<table>"; // Start table
        while ($payment_data = $payment_data_query->fetch_assoc()) {
            echo "<tr>";
            echo "<th>Payment ID: </th>";
            echo "<td>" . $payment_data["payment_id"] . "</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<th>Booking ID: </th>";
            echo "<td>" . $payment_data["booking_id"] . "</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<th>Passenger ID: </th>";
            echo "<td>" . $payment_data["passenger_id"] . "</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<th>Ticket Price: </th>";
            echo "<td>" . $payment_data["ticket_price"] . "</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<th>Vat: </th>";
            echo "<td>" . $payment_data["vat"] . "</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<th>Total: </th>";
            echo "<td>" . "BDT " . $payment_data["total"] . "</td>";
            echo "</tr>";
        }
        echo "</table>"; // End table
        echo "</div>";
    }
     // Display payment details
displayPaymentDetails($db);
        ?>
    </div>

    <div class="centered-box2">
        <p>Select any Option for Payment</p>
    </div>

    <!-- Container for payment buttons -->
    <div class="button-container">
        <!-- Button to navigate to Card.html -->
        <a href="Card.html" class="button button1">
            <p>Card</p>
        </a>

        <!-- Button to navigate to Bkash.html -->
        <a href="BkashNagad.html" class="button button2">
            <p>Bkash</p>
        </a>

        <!-- Button to navigate to Nagad.html -->
        <a href="BkashNagad.html" class="button button3">
            <p>Nagad</p>
        </a>
    </div>
</body>
</html>