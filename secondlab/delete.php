<?php
 $hostname_Database = "localhost";
 $database_Database = "usersdb";
 $username_Database = "admin";
 $password_Database = "";
 $mysqli = new mysqli($hostname_Database, $username_Database,   $password_Database, $database_Database); 
 $del=$_GET['del'];
 $sql1 = "DELETE FROM `users` WHERE id = '$del'";           
 $result = $mysqli->query($sql1);
 header('Location:index.php');
?>
