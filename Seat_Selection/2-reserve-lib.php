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
  function get ($flightid) {
    $this->query(
      "SELECT s.seat_id, r.booking_id
      FROM seats s
      LEFT JOIN reservations r ON s.flight_id = r.flight_id AND s.seat_id = r.seat_id
      WHERE s.flight_id = ?
      ORDER BY s.seat_id", [$flightid]
    );
    $sess = $this->stmt->fetchAll();
    return $sess;
  }

  // (E) SAVE RESERVATION
  function save ($flightid, $bookingid, $seats) {
    $sql = "INSERT INTO `reservations` (`flight_id`, `seat_id`, `booking_id`) VALUES ";
    $data = [];
    foreach ($seats as $seat) {
      $sql .= "(?,?,?),";
      array_push($data, $flightid, $seat, $bookingid);
    }
    $sql = substr($sql, 0, -1);
    $this->query($sql, $data);
    return true;
  }
}

// (F) DATABASE SETTINGS - CHANGE TO YOUR OWN!
define("DB_HOST", "localhost");
define("DB_NAME", "airplane_ticket_reservation_system");
define("DB_CHARSET", "utf8mb4");
define("DB_USER", "root");
define("DB_PASSWORD", "");

// (G) NEW CATEGORY OBJECT
$_RSV = new Reserve();