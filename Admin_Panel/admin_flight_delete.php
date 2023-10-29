<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Panel</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_style.css">
</head>

<?php 

session_start();

$db = mysqli_connect("localhost", "root", "", "airplane_ticket_reservation_system");

$id=$_SESSION["id"] ;
$pass=$_SESSION["pass"];
$flightId=$_SESSION["flightid"];

if(empty($id)){

    echo"error";
    echo '<script>alert("NOT AUTHORIZED")</script>';

    header("Refresh: 0; URL=http://localhost/admin_page/admin_login.html");

    exit;

}
else{

$sql = "SELECT pass FROM admin_info WHERE admin_ID = '$id'";
$password_query = $db->query($sql);
$password = $password_query->fetch_assoc();

if($password["pass"]==$pass){

    //DO NOTHING
}
else{
    
    echo"NOT AUTHORIZED";
    echo '<script>alert("NOT AUTHORIZED")</script>';

    header("Refresh: 0; URL=http://localhost/admin_page/admin_login.html");

    exit;

}
}

if (empty($flightId)){

    echo"ERROR";
    echo '<script>alert("NOT AUTHORIZED")</script>';

    header("Refresh: 0; URL=http://localhost/admin_page/admin_login.html");

    exit;

} else {

    $sql= "DELETE FROM payment_info WHERE booking_id IN (SELECT booking_id FROM booking_info WHERE flight_id = '$flightId');";
    mysqli_query($db, $sql);

    $sql= "DELETE FROM booking_info WHERE flight_id = '$flightId'";
    mysqli_query($db, $sql);

    $sql= "DELETE FROM flight_info WHERE flight_id = '$flightId'";
    mysqli_query($db, $sql);

    header("Refresh: 0; URL=http://localhost/admin_page/admin_manage_flights.php");


}

?>