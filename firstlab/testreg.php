<?php
    session_start();
    ini_set('display_errors',1);
    error_reporting(E_ALL);
    if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} }
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
    if (empty($login) or empty($password)) 
    {
    exit ("Empty fields");
    }
    $login = trim($login);
    $password = trim($password);
    $hostname_Database = "localhost";
    $database_Database = "usersdb";
    $username_Database = "admin";
    $password_Database = "";
    $mysqli = new mysqli($hostname_Database, $username_Database, $password_Database, $database_Database); 
    $sql1="SELECT * FROM `users` WHERE login='$login'";
    $result = $mysqli->query($sql1);
    $myrow = $result->fetch_array();
    if (empty($myrow['password']))
    {
    exit ("Wrong data.");
    }
    else {
    if ($myrow['password']==$password) {
    $_SESSION['login']=$myrow['login']; 
    $_SESSION['role']=$myrow['role']; 
    $_SESSION['id']=$myrow['id'];
    echo "Well done.";
    header('Location:index.php');
    }
    else {
        exit ("Wrong data.");
    }
    }

?>