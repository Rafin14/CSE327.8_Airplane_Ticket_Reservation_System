<!DOCTYPE html>
<html>

<head>
    <title>Seat Reservation</title>
    <meta charset="utf-8">
    <script src="3b-reservation.js"></script>
    <link rel="stylesheet" href="3c-reservation.css">
</head>

<div class="head">

    <h2> Seat Map </h2>

</div>

<div class="head2">

    <?php
    
    $db = mysqli_connect("localhost", "root", "", "airplane_ticket_reservation_system");
    
    $flightid = 'CX881';

    $query = "SELECT f.origin FROM flight_info f WHERE f.flight_id = '$flightid'";
    $origin_query = $db->query($query);

    $origin = $origin_query->fetch_assoc();

    $query = "SELECT f.destination FROM flight_info f WHERE f.flight_id = '$flightid'";
    $destination_query = $db->query($query);

    $destination = $destination_query->fetch_assoc();

    $query = "SELECT f.airline_name FROM flight_info f WHERE f.flight_id = '$flightid'";
    $airlinename_query = $db->query($query);

    $airlinename = $airlinename_query->fetch_assoc();


    echo "<h2>". $airlinename["airline_name"] . "&nbsp &nbsp " . $flightid . ": &nbsp &nbsp " . $origin["origin"] . "&nbsp &nbsp to &nbsp &nbsp". $destination["destination"]  . "</h2>" ;

    ?>

</div>


<body>
    <?php
    
    //$flightid = 'EK201';
    $bookingid = 999;

    // (B) GET SESSION SEATS
    require "2-reserve-lib.php";
    $seats = $_RSV->get($flightid);
    ?>

    <div class="formbg">

        <!-- (C) DRAW SEATS LAYOUT -->
        <div id="layout"><?php
    foreach ($seats as $s) {
      $taken = is_numeric($s["booking_id"]);
      printf("<div class='seat%s'%s>%s</div>",
        $taken ? " taken" : "",
        $taken ? "" : " onclick='reserve.toggle(this)'",
        $s["seat_id"],
      );
    }
    ?></div>
    </div>

    <div class=legend2>
        <div id="legend">

            <h3> Legends: </h3><br />
            <div class="seat"></div>
            <div class="txt">Open</div>
            <div class="seat taken"></div>
            <div class="txt">Taken</div>
            <div class="seat selected"></div>
            <div class="txt">Selected Seat</div>
        </div>
    </div>

    <!-- (E) SAVE SELECTION -->

    <div class=seatsave>

        <form id="ninja" method="post" action="4-save.php">
            <input type="hidden" name="flightid" value="<?=$flightid?>">
            <input type="hidden" name="bookingid" value="<?=$bookingid?>">
        </form>
        <button id="go" onclick="reserve.save()">Save Seat</button>

    </div>

    <button id="cancel" onclick="window.location.href = 'http://localhost/phpmyadmin/';">Cancel</button>

    <body>

    <html>