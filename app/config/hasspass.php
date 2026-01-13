<?php
$password="password";
$hashpass=password_hash($password,PASSWORD_DEFAULT);
echo $password;
echo "<br>";
echo $hashpass;