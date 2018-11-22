<?php session_start(); ?> 
<!DOCTYPE html>
<html>
  <head>
    <title>Media</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js?ver=1.6.4"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

<script type="text/javascript" src="http://www.youtube.com/player_api"></script>
<script type="text/javascript" src="ajax.js"></script>
<link rel="stylesheet"  href = "style/style.css"/>
  </head>
  <body style = "background-image: url(images/ff.png);background-repeat: repeat; border-width:7px;border-style:solid;border-color:black; height: 95%" enctype="multipart/form-data">
    <style>
    html{
      height: 100%;
    }
  </style>
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
                echo "<div class=\"".'audioPlaceholder'.$row['id']."\" id=\"".'audioPlaceholder'.$row['id']."\"style = \"display = inline-block; position:relative;  float:left; margin: 50px; \"> <img src='images/1.png' width = '150px' /> <div></div> <div class = \"comp\" style = \"display = block\" id =\"".'wave'.$row['id']."\"></div> <div id ='nameaud'>".$row['name']."</div>  </div>";
                echo "<script>
                  $(\".".'audioPlaceholder'.$row['id']."\").click(function (event) {
                    console.log(\"".'wave'.$row['id']."\");
                            var elem = document.getElementById(\"".'wave'.$row['id']."\");
                            if((window.getComputedStyle(elem).display=='block')||(elem.style.display=='block')){
                                if(document.getElementById(\"".'controls'.$row['id']."\")==null){
                                  var sound      = document.createElement('audio');
                                  sound.id       = \"".'controls'.$row['id']."\";
                                  sound.controls = 'controls';
                                  sound.src      = \"".$row['src'].$row['name']."\";
                                  sound.type     = 'audio/mp3';
                                  sound.style.position = 'absolute';
                                  $(this).append(sound);    
                                }
                                document.getElementById(\"".'controls'.$row['id']."\").src = \"".$row['src'].$row['name']."\";
                                document.getElementById(\"".'controls'.$row['id']."\").style.display = 'block';
                                elem.style.display = 'none';                            
                               }
                            else{
                                document.getElementById(\"".'controls'.$row['id']."\").style.display = 'none';
                                document.getElementById(\"".'controls'.$row['id']."\").src='';
                                elem.style.display = 'block';
                            }

                  });

                  </script>";
              }
              elseif ($row['type'] == "image") {
                 echo "<div class='imagePlaceholder'  style = \"display = inline-block; float:left; margin: 50px ; \"> <img src= \"".$row['src'].$row['name']." \" width = '300px' height = '150px' /> <div></div> <div id ='wave'></div> <div id ='nameaud'>".$row['name']."</div>  </div>";
              }
              elseif ($row['type'] == "video"){
                $url = $row['src'];
                 echo "<div class=\"".'videoPlaceholder'.$row['id']."\" id=\"".'videoPlaceholder'.$row['id']."\"style = \"display = inline-block; float:left; margin: 50px; \"> <img src='files/img/vidos.png' width = '150px' /> <div></div> <div class = \"comp\" style = \"display = block\" id =\"".'wave'.$row['id']."\"></div> <a href=\"".'#video'.$row['id']."\" >".$row['name']."</a>  </div>
                   <div class=\"overlay1\" id=\"".'video'.$row['id']."\"></div>

            <div class='modal'>
              <div class='video__title'>
             Это просто заголовок и краткое описание видео
              </div>
              <div class='video' id='Youtube'>
             <iframe width=\"1280\" height=\"720\" src=\"".$url."\" frameborder=\"0\" allow=\"encrypted-media\" allowfullscreen id = \"".'vi'.$row['id']."\" ></iframe>
              </div>
            <a class='close' id ='stop' href='#close'></a>
          </div>";
          echo "<script> 
                $('#stop').click( function(){ 
             
            document.getElementById(\"".'vi'.$row['id']."\").contentWindow.postMessage('{\"event\":\"command\",\"func\":\"stopVideo\",\"args\":\"\"}', '*');
         
            });
                </script>";
              }
            }
            ?>

	<footer>
	©PravotorovaINC,2018
	</footer>
  </body> 
</html>

