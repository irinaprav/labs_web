<?php 

class LogController{
	function logout(){
      unset($_SESSION['login']);
      unset($_SESSION['id']);
      unset($_SESSION['role']);
      header('Location:./index.php');
  }
  }
?>

