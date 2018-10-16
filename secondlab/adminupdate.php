<?php
   session_start();
   ini_set('display_errors',1);
   error_reporting(E_ALL);

   if(isset($_POST['change'])){
 $hostname_Database = "localhost";
 $database_Database = "usersdb";
 $username_Database = "admin";
 $password_Database = "";
 $mysqli = new mysqli($hostname_Database, $username_Database,   $password_Database, $database_Database); 
 $p=$_POST['password'];
 $log = $_POST['id'];
 
 $sql1 = "UPDATE `users` SET `password` = '$p' WHERE `id` = '$log'";           
 $result = $mysqli->query($sql1);
 echo "password was update";
   }
   else{
   if (isset($_POST['name'])) { $name=$_POST['name']; echo $name; }
   if (isset($_POST['lastname'])) { $lastname=$_POST['lastname']; echo $lastname;  }
   if (empty($name) or empty($lastname)) {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
   }

   $name = trim($name);
   $lastname = trim($lastname);
   $hostname_Database = "localhost";
   $database_Database = "usersdb";
   $username_Database = "admin";
   $password_Database = "";
   $current = $_POST['id'];
   $mysqli = new mysqli($hostname_Database, $username_Database, $password_Database, $database_Database); 

    if(!empty($_FILES['picturechoose']['name'])){
     
   $allowed = ['png','jpeg','jpg'];
   $fl_name = $_FILES['picturechoose']['name'];
   $tm = explode('.', $fl_name);
   $fl_extern = strtolower(end($tm));
   $fl_temp = $_FILES['picturechoose']['tmp_name'];
   $t = substr(md5(time()),0,10);
   $file_path = 'images/'. $t . '.'.$fl_extern;
   $file_path1 = $_SERVER['DOCUMENT_ROOT'].'/images/'. $t . '.'.$fl_extern;
   move_uploaded_file($fl_temp,$file_path1); 
   $sql1 = "UPDATE `users` SET `photo` = '$file_path' WHERE `id` = '$current'";  
   $result = $mysqli->query($sql1);
    }
   if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
   }
   $sql1 = "UPDATE `users` SET `name` = '$name', `lastname`= '$lastname'  WHERE `id` = '$current'";  
   $result = $mysqli->query($sql1);
   if (!$result) {
    printf("%s\n", $mysqli->error);
   exit();
   }

   header('Location:index.php');
 }
?>
