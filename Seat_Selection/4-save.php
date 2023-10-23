<?php
// (A) LOAD LIBRARY
require "2-reserve-lib.php";

// (B) SAVE
$_RSV->save($_POST["tripid"], $_POST["bookingid"], $_POST["seats"]);
echo "SAVED";