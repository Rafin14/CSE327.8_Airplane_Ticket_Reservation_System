
<?php
// Database connection
$servername = "localhost"; // Replace 'localhost' with your database server
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "airplane_ticket_reservation_system"; // Replace with your database name

// Create connection
$conn = new mysqli("localhost", "root", "", "airplane_ticket_reservation_system");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch data
$sql = "SELECT bi.booking_id, pi.payment_id, pi.passenger_id, pi.ticket_price, pi.vat, pi.total
        FROM booking_info bi
        INNER JOIN payment_info pi ON bi.booking_id = pi.booking_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<h3>Billing Details</h3>";
        echo "<p>Payment_ID: " . $row["payment_id"] . "</p>";
        echo "<p>Booking_ID: " . $row["booking_id"] . "</p>";
        echo "<p>Passenger_ID: " . $row["passenger_id"] . "</p>";
        echo "<p>Ticket Price: " . $row["ticket_price"] . "</p>";
        echo "<p>Vat: " . $row["vat"] . "</p>";
        echo "<p>Total Amount to Pay: " . $row["total"] . "</p>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
    