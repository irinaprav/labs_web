<?php

session_start();

require_once("./manager/UsersManager.php");

class Controller{

    function auth(){
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} }
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
$login = trim($login);
$password = trim($password);
$usersmanager = new UsersManager();
$token = $usersmanager->authUser($login,$password);
$_SESSION['login']=$token->getLogin(); 
$_SESSION['role']=$token->getRole(); 
$_SESSION['id']=$token->getId();
if ( $token != null){
    setcookie('authorized_as',$token, "/");
} else {
    http_response_code(401);
    echo 'Not authorized';
    die();
}
header('Location:./index.php');
}
}
?>