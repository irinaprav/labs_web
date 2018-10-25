<?php session_start(); ?> 
<!DOCTYPE html>
<html>
  <head>
    <title>Authorization</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js?ver=1.6.4"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script>
    function disp(form) {
        console.log (form);
        if (form.style.display == "none") {
            form.style.display = "block";
        } else {
            form.style.display = "none";
        }
    }
    function sort_name()
{
 var table=$('#mytable');
 var tbody =$('#table1');

 tbody.find('tr').sort(function(a, b) 
 {
  if($('#name_order').val()=='asc') 
  {
   return $('td:first', a).text().localeCompare($('td:first', b).text());
  }
  else 
  {
   return $('td:first', b).text().localeCompare($('td:first', a).text());
  }
		
 }).appendTo(tbody);
	
 var sort_order=$('#name_order').val();
 if(sort_order=="asc")
 {
  document.getElementById("name_order").value="desc";
 }
 if(sort_order=="desc")
 {
  document.getElementById("name_order").value="asc";
 }
}

    </script>

<script type="text/javascript" src="ajax.js"></script>
	<link rel="stylesheet"  href = "style/style2.css"/>
    <link rel="stylesheet"  href = "style/style.css"/>
  </head>
  <body style = "background-image: url(images/ff.png) ;background-repeat: repeat;">
           <header>
            <div style="float: right; width: 300x; height: 100px;">
                <?php if($_SESSION['login']) {?><font size="5"><bold><i> Welcome<?php echo ", ".$_SESSION['login'];?> </i></bold></font>
		 <a href="http://localhost/logout.php" class="loghref" ><font size="4">logout</font></a>
                <button class="header-button" onclick='location.href="http://localhost/labs_web/secondlab/changeinf.php"'>Change Information</button></div>
               <button class="header-button" onclick='location.href="http://localhost/labs_web/secondlab/media.php"' >Media</button></div>
                <?php } else{ echo "Make registration or Enter";};?>
            </div>
            
			<div style="float: left; width: 150px; height: 100px;">
				<form action ="#join_form"><button class="header-button" type="authoriz">Sign up</button></form></div>
				<form action ="#login_form"><button class="header-button" type="enter" >Sign in</button></form></div>
						
		    </div>
</header>

<a href="#x" class="overlay" id="login_form"></a>
	
        <div class="popup" method='post' id="popup" >
            <h2>Welcome Guest!</h2>
            <p>Please enter your login and password here</p>
            <div>
                <label for="login">Login</label>
                <input type="text" id="login" value="" required/>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" value="" required/>
            </div>
            <input class="log" type="submit" value="Log In"  />

            <a class="close" href="#close"></a>
        </div>


<a href="#x" class="overlay" id="join_form"></a>
<div class="popup">
    <h2>Registration</h2>
    <p>Your information</p>
    <div>
        <label for="login">Login (Email)</label>
        <input type="text" id="logina" name="login" value="" required/>
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" id="passworda" value="" name="password" required/>
    </div>
    <div>
        <label for="name">Name</label>
        <input type="text" id="name" value="" name="name" required/>
    </div>
    <div>
        <label for="lastname">Lastname</label>
        <input type="text" id="lastname" value="" name="lastname" required/>
    </div>
    <div>
    <label for="photo">Choose photo: </label>
    <input type = "file" name = "picture" id = "picture">
    </div>
    <input class="authorization" type="button" value="Register" />&nbsp;&nbsp;&nbsp;or&nbsp;&nbsp;&nbsp;<a href="#login_form" id="login_pop">Authorization</a>

    <a class="close" href="#close"></a>
</div>

	<form enctype="multipart/form-data">
	<?php
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
		/*$dir = "files/";
			foreach (new DirectoryIterator($dir)as $fileInfo){
				if($fileInfo->isDot()||$fileInfo->isDir()) continue;
				printf('<img src="http://localhost/images/1.png" width = "100px" onclick = "play(%s)" />%s',
				$fileInfo->getFileName(), PHP_EOL
				);
printf("<div id ='wave'></div>");
			}*/
			?>
		</form> 
	<footer>
	©PravotorovaINC,2018
	</footer>
  </body> 
</html>

