<?php
   ini_set('display_errors',1);
   error_reporting(E_ALL);
   if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } 
   if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
   if (isset($_POST['name'])) { $name=$_POST['name']; if ($name =='') { unset($name);} }
   if (isset($_POST['lastname'])) { $lastname=$_POST['lastname']; if ($lastname =='') { unset($lastname);} }
   if (empty($login) or empty($password)) {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
   }
   $login = trim($login);
   $password = trim($password);
   $hostname_Database = "localhost";
   $database_Database = "usersdb";
   $username_Database = "admin";
   $password_Database = "";
   $mysqli = new mysqli($hostname_Database, $username_Database, $password_Database, $database_Database); 
   $sql1 = "SELECT * FROM `users` where login = '$login'";
   $result_all = $mysqli->query($sql1);
   $row = $result_all->fetch_array();
    if (!empty($row['id'])) {
    exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
    }
     if(!empty($_FILES['picture']['name'])){
    $allowed = ['png','jpeg','jpg'];
    $fl_name = $_FILES['picture']['name'];
    $tm = explode('.', $fl_name);
    $fl_extern = strtolower(end($tm));
    $fl_temp = $_FILES['picture']['tmp_name'];
    $t = substr(md5(time()),0,10);
    $file_path = 'images/'. $t . '.'.$fl_extern;
    $file_path1 = $_SERVER['DOCUMENT_ROOT'].'/images/'. $t . '.'.$fl_extern;
    move_uploaded_file($fl_temp,$file_path1);                       
     }
     else{
     	$file_path = 'images/794b5171f2.jpg';
     }              
   if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
   }
   $sql= "INSERT INTO `users` (`login`,`password`,`lastname`,`name`,`role`,`photo`) VALUES('$login','$password','$lastname','$name','user','$file_path')";
   $result = $mysqli->query($sql);
   if (!$result) {
    printf("%s\n", $mysqli->error);
   exit();
   }
   echo "Query run. Inserted UserID " . $mysqli->insert_id . "<br />";

   header('Location:index.php');
?>
