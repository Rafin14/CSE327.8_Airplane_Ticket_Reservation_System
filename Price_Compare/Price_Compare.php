<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="ListStyle.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap">
</head>
<body>
<div class="box">
        <h1>Ticket Price Comparison</h1>
      </div>
      <div class="box box2">
      <h2>Cheapest</h2>
        <?php
   /**
 
 
 * PHP version 7.2
 *
 * @category Ticket_Price_Comparison
 * @package  Airplane_Ticket_Reservation_System
 * @author   Zarin Tasnim Roshni 2021627642
 */

     // Establish a database connection
        
        $db= mysqli_connect("localhost", "root", "","airplane_ticket_reservation_system");
        
        /**
 * Fetches and displays the details of the cheapest flight.
 *
 * @param mysqli $db The database connection
 */
function displayCheapestFlightDetails($db)
{
    $query = "SELECT * FROM flight_info WHERE price = (SELECT MIN(price) FROM flight_info);";
    $cheapest_data_query = $db->query($query);

    if (!$cheapest_data_query) {
        die("Query failed: " . $db->error);
    }
        echo "<div class= 'flight_details' >";

        echo "<table>"; //Start table
        
            echo "<tr>";
            echo "<th>Flight Id </th>";
            echo "<td></td>"; 
            echo "<th>Origin </th>";
            echo "<td></td>"; // Empty cell for space
            echo "<th>Destination </th>";
            echo "<td></td>"; // Empty cell for space
            echo "<th>Departure Time </th>";
            echo "<td></td>"; // Empty cell for space
            echo "<th>Airline's Name </th>";
            echo "<td></td>"; // Empty cell for space
            echo "<th>Price </th>";
            echo "<td></td>";
            echo "<th>Action </th>"; // New header for the button

            echo"</tr>";
            
            while($cheapest_data =$cheapest_data_query->fetch_assoc()){

                echo "<td>" . $cheapest_data["flight_id"] . "</td>";
                echo "<td></td>"; // Empty cell for space
                echo "<td>" . $cheapest_data["origin"] . "</td>";
                echo "<td></td>"; // Empty cell for space
                echo "<td>" . $cheapest_data["destination"] . "</td>";
                echo "<td></td>"; // Empty cell for space
                echo "<td>" . $cheapest_data["departure_time"] . "</td>";
                echo "<td></td>"; // Empty cell for space
                echo "<td>" . $cheapest_data["airline_name"] . "</td>";
                echo "<td></td>"; // Empty cell for space
                echo "<td>" . $cheapest_data["price"] . "</td>";
                echo "<td></td>";
                echo '<td><button onclick="window.location.href=\'http://localhost/r/PaymentGate.php\'"> Click </button></td>'; // Button cell

                echo "</tr>";
            }


        echo "</table>";
        echo "</div>";
    }
    // Display details for the cheapest flight
    displayCheapestFlightDetails($db);
    

       ?>

</div>

<div class="box box3">
    <h2>Best Value</h2>
    <?php
     /**
 * Fetches and displays the details of flights that are not the cheapest or most expensive (best value).
 *
 * @param mysqli $db The database connection
 */
    $db= mysqli_connect("localhost", "root", "","airplane_ticket_reservation_system");
    function displayBestValueFlightDetails($db)
{
    $best_value_query = "SELECT * FROM flight_info WHERE price NOT IN (SELECT MIN(price) FROM flight_info) AND price NOT IN (SELECT MAX(price) FROM flight_info);";
    $best_value_result = $db->query($best_value_query);

    if (!$best_value_result) {
        die("Query failed: " . $db->error);
    }

    echo "<div class='flight_details'>";
    echo "<table>";
    echo "<tr>";
    echo "<th>Flight Id</th><td></td>";
    echo "<th>Origin</th><td></td>";
    echo "<th>Destination</th><td></td>";
    echo "<th>Departure Time</th><td></td>";
    echo "<th>Airline's Name</th><td></td>";
    echo "<th>Price</th><td></td>";
    echo "<th>Action</th>";
    echo "</tr>";

    while ($best_value_data = $best_value_result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $best_value_data["flight_id"] . "</td><td></td>";
        echo "<td>" . $best_value_data["origin"] . "</td><td></td>";
        echo "<td>" . $best_value_data["destination"] . "</td><td></td>";
        echo "<td>" . $best_value_data["departure_time"] . "</td><td></td>";
        echo "<td>" . $best_value_data["airline_name"] . "</td><td></td>";
        echo "<td>" . $best_value_data["price"] . "</td><td></td>";
        echo '<td><button onclick="window.location.href=\'http://localhost/r/PaymentGate.php\'">Click</button></td>';
        echo "</tr>";
    }

    echo "</table>";
    echo "</div>";
}

// Display details for the best value flights
displayBestValueFlightDetails($db);
    ?>
</div>

<div class="box box4">
<h2>Fastest</h2>
    <?php
    /**
 * Fetches and displays the details of the most expensive (fastest) flight.
 *
 * @param mysqli $db The database connection
 */
function displayFastestFlightDetails($db)
{
    $fastest_query = "SELECT * FROM flight_info WHERE price = (SELECT MAX(price) FROM flight_info);";
    $fastest_result = $db->query($fastest_query);

    if (!$fastest_result) {
        die("Query failed: " . $db->error);
    }

    echo "<div class='flight_details'>";
    echo "<table>";
    echo "<tr>";
    echo "<th>Flight Id</th><td></td>";
    echo "<th>Origin</th><td></td>";
    echo "<th>Destination</th><td></td>";
    echo "<th>Departure Time</th><td></td>";
    echo "<th>Airline's Name</th><td></td>";
    echo "<th>Price</th><td></td>";
    echo "<th>Action</th>";
    echo "</tr>";

    while ($fastest_data = $fastest_result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $fastest_data["flight_id"] . "</td><td></td>";
        echo "<td>" . $fastest_data["origin"] . "</td><td></td>";
        echo "<td>" . $fastest_data["destination"] . "</td><td></td>";
        echo "<td>" . $fastest_data["departure_time"] . "</td><td></td>";
        echo "<td>" . $fastest_data["airline_name"] . "</td><td></td>";
        echo "<td>" . $fastest_data["price"] . "</td><td></td>";
        echo '<td><button onclick="window.location.href=\'http://localhost/r/PaymentGate.php\'">Click</button></td>';
        echo "</tr>";
    }

    echo "</table>";
    echo "</div>";

}
// Display details for the most expensive (fastest) flight
displayFastestFlightDetails($db);
    ?>
</div>

        

       

</body>
</html>