<?php
class Reserve {
  // (A) CONSTRUCTOR - CONNECT TO DATABASE
  private $pdo = null;
  private $stmt = null;
  public $error = null;
  function __construct () {
    $this->pdo = new PDO(
      "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET,
      DB_USER, DB_PASSWORD, [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
  }

  // (B) DESTRUCTOR - CLOSE DATABASE CONNECTION
  function __destruct () {
    if ($this->stmt !== null) { $this->stmt = null; }
    if ($this->pdo !== null) { $this->pdo = null; }
  }

  // (C) HELPER FUNCTION - RUN SQL QUERY
  function query ($sql, $data=null) : void {
    $this->stmt = $this->pdo->prepare($sql);
    $this->stmt->execute($data);
  }

  // (D) GET SEATS FOR GIVEN SESSION
  function get ($tripid) {
    $this->query(
      "SELECT sa.`seat_id`, r.`booking_id` FROM `seats` sa
       LEFT JOIN `trips` se USING (`flight_id`)
       LEFT JOIN `reservations` r USING(`seat_id`)
       WHERE se.`trip_id`=?
       ORDER BY sa.`seat_id`", [$tripid]
    );
    $sess = $this->stmt->fetchAll();
    return $sess;
  }

  // (E) SAVE RESERVATION
  function save ($tripid, $bookingid, $seats) {
    $sql = "INSERT INTO `reservations` (`trip_id`, `seat_id`, `booking_id`) VALUES ";
    $data = [];
    foreach ($seats as $seat) {
      $sql .= "(?,?,?),";
      array_push($data, $tripid, $seat, $bookingid);
    }
    $sql = substr($sql, 0, -1);
    $this->query($sql, $data);
    return true;
  }
}

// (F) DATABASE SETTINGS - CHANGE TO YOUR OWN!
define("DB_HOST", "localhost");
define("DB_NAME", "seat_selection");
define("DB_CHARSET", "utf8mb4");
define("DB_USER", "root");
define("DB_PASSWORD", "");

// (G) NEW CATEGORY OBJECT
$_RSV = new Reserve();