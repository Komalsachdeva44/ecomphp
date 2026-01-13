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
