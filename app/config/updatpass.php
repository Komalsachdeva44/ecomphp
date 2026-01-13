<?php
$host="localhost";
$username="root";
$password="";
$db="ecom";

$conn= new mysqli($host , $username , $password , $db);
if($conn->connect_error){
    die("connection failed");
}
else{
    echo("connected success");
}

$newpassword ="password";
$hashpassword=password_hash($newpassword,PASSWORD_DEFAULT);
$email="admin@example.com";
$prepareconnection=$conn->prepare("UPDATE admins SET password = ? WHERE email = ?");
$prepareconnection->bind_param("ss",$hashpassword,$email);

if($prepareconnection->execute()){
    echo"Password updated success";
}else{
    echo"Error ".$prepareconnection->error ;
}