<?php session_start(); ?> 
<!DOCTYPE html>
<html>
  <head>
    <title>Authorization</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js?ver=1.6.4"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>


<script type="text/javascript" src="ajax.js"></script>
    <link rel="stylesheet"  href = "style/style.css"/>
  </head>
  <body style = "background-image: url(images/ff.png);background-repeat: repeat; ">
           <header>
            
	   </header>
<?php ini_set('display_errors',1);
   error_reporting(E_ALL);
	    $hostname_Database = "localhost";
            $database_Database = "usersdb";
            $username_Database = "admin";
            $password_Database = "";
            $mysqli = new mysqli($hostname_Database, $username_Database, $password_Database, $database_Database); 
            $sql1 = "SELECT * FROM `media`";      
            $result = $mysqli->query($sql1);
             while ($row = $result->fetch_array())
            {
              if($row['type'] == "audio"){
                echo "<div class='audioPlaceholder'  style = \"display = inline; \"> <img src='images/1.png' width = '150px' /> <div id ='wave'></div> <div id ='nameaud'>".$row['name']."</div>  </div>";
                echo "<script>
                  $('.audioPlaceholder').click(function (event) {
                                 $(this).children('#wave').replaceWith('<audio controls=\"controls\"><source src = \"".$row['src'].$row['name']."\" type=\"audio/mp3\"></audio>')
                  });

                  </script>";
              }
            }
            ?>
<!--<div class="videoPlaceholder" >
   <img src="images/f2.png" width = "100px" />
   <div id ='wave'></div>
</div>
<div class="videoPlaceholder" >
   <img src="images/f2.png" width = "100px" />
   <div id ='wave'></div>
</div>
<script>
$('.videoPlaceholder').click(function (event) {
    var videoSrc = 'https://www.youtube.com/embed/_OzWxKSm1rU';
    $(this).children('#wave').replaceWith('<audio controls="controls"><source src="files/imagine-dragons_-_natural.mp3" type="audio/mp3"></audio>')
})

</script> -->
		</form> 
	<footer>
	©PravotorovaINC,2018
	</footer>
  </body> 
</html>

