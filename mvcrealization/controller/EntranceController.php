<form enctype="multipart/form-data">
	<?php
	require_once("../view/index.php");
	        $hostname_Database = "localhost";
            $database_Database = "usersdb";
            $username_Database = "admin";
            $password_Database = "";
            $mysqli = new mysqli($hostname_Database, $username_Database, $password_Database, $database_Database); 
            $sql1 = "SELECT * FROM `users`";           
            $result = $mysqli->query($sql1);
            $table = "<table id = 'mytable'>";
            $table .= "<tr>";
            $table .= "<th> ID </th>";
            $table .= "<th> Name </th>";
            $table .= "<th> Lastname </th>";
            $table .= "<th onclick='sort_name();'> Login </th>";
            $table .= "<th>Photo</th>";
            $table .= "<th>Role</th>";
            if($_SESSION['role']=="admin") { $table .= "<th> Delete </th>"; }
            if($_SESSION['role']=="admin") { $table .= "<th> Change </th>";}
            $table .= "</tr>";
	    $table .= "<tbody id='table1'>";
            while ($row = $result->fetch_array())
            {
            $table .= "<tr>";
            $table .= "<td>".$row['id']."</td>";
            $table .= "<td>".$row['name']."</td>";
            $table .= "<td>".$row['lastname']."</td>";
            $table .= "<td>".$row['login']."</td>";
            $table .= "<td>".'<IMG width = "200" src="'.$row['photo'].'">'."</td>";
            $table .= "<td>".$row['role']."</td>";
            if($_SESSION['login']) { if($_SESSION['role']=="admin") { $table .= "<td><a name=\"del\" href=\"delete.php?del=".$row["id"]."\">Delete</a></td>\n"; }}
            if($_SESSION['login']) { if($_SESSION['role']=="admin") { $table .= "<td><a name=\"chan\" href=\"changeforadmin.php?chan=".$row["id"]."\">Change Information</a></td>\n"; }}
            $table .= "</tr>";
            }
            $table .= "</tbody>";
            $table .= "</table> ";
            echo $table;
            echo "<input type='hidden' id='name_order' value='asc'>"; 
			?>
		</form>
