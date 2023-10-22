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

    <h2> Location X to Location Y </h2>

</div>


<body>
    <?php
    // (A) FIXED IDS FOR THIS DEMO
    $sessid = 1;
    $userid = 999;

    // (B) GET SESSION SEATS
    require "2-reserve-lib.php";
    $seats = $_RSV->get($sessid);
    ?>

    <div class="formbg">

        <!-- (C) DRAW SEATS LAYOUT -->
        <div id="layout"><?php
    foreach ($seats as $s) {
      $taken = is_numeric($s["user_id"]);
      printf("<div class='seat%s'%s>%s</div>",
        $taken ? " taken" : "",
        $taken ? "" : " onclick='reserve.toggle(this)'",
        $s["seat_id"]
      );
    }
    ?></div>
        <!-- (E) SAVE SELECTION -->
        <form id="ninja" method="post" action="4-save.php">
            <input type="hidden" name="sessid" value="<?=$sessid?>">
            <input type="hidden" name="userid" value="<?=$userid?>">
        </form>
        <button id="go" onclick="reserve.save()">Reserve Seats</button>

    </div>

    <div class=legend2>
        <div id="legend">

            <h3> Legends: </h3><br />
            <div class="seat"></div>
            <div class="txt">Open</div>
            <div class="seat taken"></div>
            <div class="txt">Taken</div>
            <div class="seat selected"></div>
            <div class="txt">Your Selected Seats</div>
        </div>
    </div>
</body>

</html>