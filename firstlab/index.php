<?php session_start(); ?> 
<!DOCTYPE html>
<html>
  <head>
    <title>Authorization</title>
	<script>
    function disp(form) {
        console.log (form);
        if (form.style.display == "none") {
            form.style.display = "block";
        } else {
            form.style.display = "none";
        }
    }
    </script>
	<link rel="stylesheet"  href = "style/style2.css"/>
    <link rel="stylesheet"  href = "style/style.css"/>
  </head>
  <body bgcolor="#ffcc66">
            <div>
            <div style="float: right; width: 50x; height: 100px;">
                <?php if($_SESSION['login']) {?><font size="5"><bold><i> Welcome </i></bold></font><?php echo $_SESSION['login'];?>
                <button id="enter" class="authoriz" type="enter" onclick='location.href="http://localhost/changeinf.php"'>Change Information</button></div>
                <a href="http://localhost/logout.php"><font size="4">logout</font></a>
                <?php } else{ echo "Make registration or Enter";};?>
            </div>
            </div>
			<div style="float: left; width: 150px; height: 100px;">
				<button id="auth" class="authoriz" type="authoriz" onclick="disp(document.getElementById('dialog')) ">Registration</button></div>
				<button id="enter" class="authoriz" type="enter" onclick="disp(document.getElementById('form-login'))">Enter</button></div>
		    </div>
			<form method='post' action="http://localhost/save_user.php" class="dialog" id="dialog" title="Authorization Form" style ="display: none" enctype="multipart/form-data">
				<label for="login">Login: </label>
				<p><input type='text' name='login' required></p>
				<label for="password">Password: </label>
				<p><input type="password" name='password' required minlength="6"></p>
                <label for="name">Name: </label>
                <p><input type='text' name='name' required></p>
                <label for="lastname">Lastname: </label>
                <p><input type='text' name='lastname' required></p>
                <label for="photo">Choose photo: </label>
                <input type = "file" name = "picture" id = ""> 
                <p><input type='submit' name='submit' value='Ok'></p>
			</form>
			<form method='post' action="http://localhost/testreg.php" class="enter" id="form-login" title="Entering Form" style ="display: none">
				<label for="name">Login: </label>
				<p><input type='text' name='login' required=""></p>
				<label for="password">Password: </label>
				<p><input type="password" name='password' minlength="6" required=""></p>
				<p><input type='submit' name='submit' value='Ok'></p>
			</form> 
		<form enctype="multipart/form-data">
			<?php
			$hostname_Database = "localhost";
            $database_Database = "usersdb";
            $username_Database = "admin";
            $password_Database = "";
            $mysqli = new mysqli($hostname_Database, $username_Database, $password_Database, $database_Database); 
            $sql1 = "SELECT * FROM `users`";           
            $result = $mysqli->query($sql1);
            $table = "<table>";
            $table .= "<tr>";
            $table .= "<th> ID </th>";
            $table .= "<th> Name </th>";
            $table .= "<th> Lastname </th>";
            $table .= "<th> Login </th>";
            $table .= "<th>Photo</th>";
            $table .= "<th>Role</th>";
            if($_SESSION['role']=="admin") { $table .= "<th> Delete </th>"; }
            if($_SESSION['role']=="admin") { $table .= "<th> Change </th>";}
            $table .= "</tr>";
            while ($row = $result->fetch_array())
            {
            $table .= "<tr>";
            $table .= "<td>".$row['id']."</td>";
            $table .= "<td>".$row['name']."</td>";
            $table .= "<td>".$row['lastname']."</td>";
            $table .= "<td>".$row['login']."</td>";
            $table .= "<td>".'<IMG width = "200" src="'.$row['photo'].'">'."</td>";
            $table .= "<td>".$row['role']."</td>";
            if($_SESSION['login']) { if($_SESSION['role']=="admin") { $table .= "<td><a name=\"del\" href=\"delete.php?del=".$row["id"]."\">Удалить</a></td>\n"; }}
            if($_SESSION['login']) { if($_SESSION['role']=="admin") { $table .= "<td><a name=\"chan\" href=\"changeforadmin.php?chan=".$row["id"]."\">Change Information</a></td>\n"; }}
            $table .= "</tr>";
            }
            $table .= "</table> ";
            echo $table;
			?>
		</form>
  </body> 
</html>
