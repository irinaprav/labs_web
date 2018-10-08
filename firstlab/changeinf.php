<?php session_start(); ?> 
<!DOCTYPE html>
<html>
	<head>
		<title>Change Information</title>
		<link rel="stylesheet"  href = "style/style1.css"/>
		<script src = "script.js"></script>
	</head>
	<body bgcolor="#ffcc66">
	<section class="wrap-form" >
		<form id="send_form" method="POST" action="update.php" class="user-form" enctype="multipart/form-data" >
		<?php
            ini_set('display_errors',1);
            error_reporting(E_ALL);
			$hostname_Database = "localhost";
            $database_Database = "usersdb";
            $username_Database = "admin";
            $password_Database = "";
            $current = $_SESSION['login'];
            $mysqli = new mysqli($hostname_Database, $username_Database, $password_Database, $database_Database); 
            $sql1 = "SELECT * FROM `users` WHERE login = '$current'";
            $result_photo = $mysqli->query($sql1);
            $row1 = $result_photo->fetch_array();
           
            $result = $mysqli->query($sql1);
            $row = $result->fetch_array();
        ?>
		<div id = "innerdir"></div>
		<ul>
			<li>
				<h2>Information: </h2>
				 <?php if($_SESSION['login']) echo $_SESSION['login'];?>
				<span class="required_notification">* Fill with required information</span>
			</li>	
			<li>
				<label for="name">Name:</label>
				<input type="text" name="name" value="<?= $row['name'] ?>" required/>
			</li>
			<li>
				<label for="lastname">Lastname:</label>
				<input type="text" name="lastname" value="<?= $row['lastname'] ?>" required/>
				<span class="form_hint"/>
			</li>
			<li>
				<label for="photo">Photo:</label>
				<IMG width = "200" src="<?= $row['photo'] ?>"/>
                <input type = "file" name = "picturechoose" id = ""> 
				<span class="form_hint"/>
			</li>
			<li>
				<label for="role">Role:</label>
				<input type="text" name="role" value="<?= $row['role'] ?>" required readonly/>
				<span class="form_hint"/>
			</li>
			<li>
				<form method="POST" action="change_password.php">
				<label for="password">Password:</label>
				<p><input type="password" name='password' minlength="6"></p>
				<button  type="submit" name = "change">CHANGE PASSWORD</button>
				<span class="form_hint"/>
				</form>
			</li>
			<li>
				<button  type="submit" name ="save">Submit Form</button>
			</li>
		</ul>
		</form>
	</section>
    </div>
	</body>
	
</html>