<?php
session_start();
 $hostname_Database = "localhost";
 $database_Database = "usersdb";
 $username_Database = "admin";
 $password_Database = "";
 $mysqli = new mysqli($hostname_Database, $username_Database,   $password_Database, $database_Database); 
 $p=$_GET['password'];
 echo "$p";
print_r($_POST);

 $log=$_SESSION['login'];
 echo "$log";
 $sql1 = "UPDATE `users` SET `password` = '$p' WHERE `login` = '$log'";           
 $result = $mysqli->query($sql1);
 //header('Location:index.php');
?>
