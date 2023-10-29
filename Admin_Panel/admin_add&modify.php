<?php

session_start();

$db = mysqli_connect("localhost", "root", "", "airplane_ticket_reservation_system");

$id=$_SESSION["id"] ;
$pass=$_SESSION["pass"];

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

$flightid =$_POST["flightid"];
$origin = $_POST["origin"];
$destination = $_POST["destination"];
$date = $_POST["date"];
$time = $_POST["time"];
$airline = $_POST["airline"];
$price = $_POST["price"];
$delete = $_POST["delete_flight"];

$datetime = $date ." ". $time;


if($delete==1){

    $_SESSION["flightid"] = $flightid;

    echo '<script>
     if (confirm("Are you sure you want to delete this Flight?")) {

        alert("DELETED");
        window.location = "http://localhost/admin_page/admin_flight_delete.php";


     } else {

        alert("CANCELLED \nRedirecting...");
        window.location = "http://localhost/admin_page/admin_manage_flights.php";

     }
     </script>';

}
else{
    
    if(empty($flightid) || empty($origin) || empty($destination) || empty($datetime) || empty($price)){
        
        echo '<script>alert("Please Enter All Fields \nRedirecting...")</script>';
        header("Refresh: 0; URL=http://localhost/admin_page/admin_manage_flights.php");
    }
    else if(!empty($flightid) || !empty($origin) || !empty($destination) || !empty($datetime) || !empty($price)){
        
        $sql= "UPDATE flight_info SET origin = '$origin' WHERE flight_id = '$flightid'";
        mysqli_query($db, $sql);
        
        $sql= "UPDATE flight_info SET destination = '$destination' WHERE flight_id = '$flightid'";
        mysqli_query($db, $sql);
        
        $sql= "UPDATE flight_info SET departure_time = '$datetime' WHERE flight_id = '$flightid'";
        mysqli_query($db, $sql);
        
        $sql= "UPDATE flight_info SET airline_name = '$airline' WHERE flight_id = '$flightid'";
        mysqli_query($db, $sql);
        
        $sql= "UPDATE flight_info SET price = '$price' WHERE flight_id = '$flightid'";
        mysqli_query($db, $sql);
        
        echo '<script>alert("Flight Information Updated \nRedirecting...")</script>';
        header("Refresh: 0; URL=http://localhost/admin_page/admin_manage_flights.php");
    
    }
}



?>