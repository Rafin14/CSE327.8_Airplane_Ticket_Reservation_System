<?php

session_start();

$db = mysqli_connect("localhost", "root", "", "airplane_ticket_reservation_system");


$id = $_POST["id"];
$pass = $_POST["password"];


if(empty($id) || empty($pass)){

    echo"error";
    echo '<script>alert("Please Enter ID and Pass")</script>';

    header("Refresh: 0.5; URL=http://localhost/CSE327.8_Airplane_Ticket_Reservation_System/Admin_Panel/admin_login.html");

}
else{

$sql = "SELECT pass FROM admin_info WHERE admin_ID = '$id'";
$password_query = $db->query($sql);
$password = $password_query->fetch_assoc();

if($password["pass"]==$pass){
    
    echo"successfull";

    $_SESSION["id"] = $id;
    $_SESSION["pass"] = $pass;


    header("Location: http://localhost/CSE327.8_Airplane_Ticket_Reservation_System/Admin_Panel/admin_dashboard.php");
    

}
else{
    
    echo"error";
    echo '<script>alert("Username or Password Incorrect")</script>';

    header("Refresh: 0.5; URL=http://localhost/CSE327.8_Airplane_Ticket_Reservation_System/Admin_Panel/admin_login.html");

}
}

?>