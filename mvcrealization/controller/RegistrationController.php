<?php
   
   require_once("./manager/UsersManager.php");

   class RegController{
    function register(){
   if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } 
   if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
   if (isset($_POST['name'])) { $name=$_POST['name']; if ($name =='') { unset($name);} }
   if (isset($_POST['lastname'])) { $lastname=$_POST['lastname']; if ($lastname =='') { unset($lastname);} }
   if (empty($login) or empty($password)) {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
   }
   $login = trim($login);
   $password = trim($password);
   $usersmanager = new UsersManager();
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
   $nUser = new User(1, $lastname, $login, $password, $name, $file_path, 'user');
   $token = $usersmanager->createUser($nUser);
   header('Location:./index.php');
 }
}
?>
