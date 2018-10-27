<?php session_start(); ?> 
<!DOCTYPE html>
<html>
  <head>
    <title>Canvas</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js?ver=1.6.4"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

<link rel="stylesheet"  href = "style/style.css"/>
  </head>
  <body style = "background-image: url(images/ff.png);background-repeat: repeat; border-width:7px;border-style:solid;border-color:black; height: 95%" enctype="multipart/form-data">
    <style>
    html{
      height: 100%;
    }
    </style>
  <center>
    <canvas width="800" id = "can" height="500"></canvas>
    <div></div>
    <label>Color of your figure:</label> 
    <input name="r1" type="radio" value="blue" checked=""> Blue
    <input name="r1" type="radio" value="black"> Black
    <input name="r1" type="radio" value="green"> Green
    <br>
    <label>Type of your figure:</label> 
    <input name="ty" type="radio" value="circle" checked=""> Circle
    <input name="ty" type="radio" value="rectangle"> Rectangle
    <input name="ty" type="radio" value="square"> Square
    <br>
    <datalist id="tickmarks">
      <option value="0" label="0">
      <option value="5">
      <option value="10">
      <option value="15">
      <option value="20">
      <option value="25" label="100">
      <option value="30">
      <option value="35">
      <option value="40">
      <option value="45">
      <option value="50" label="200">
    </datalist><br>
    <label>Speed of your figure:</label> 
    <input type="range" id="ran" min = "0" max = "50" step = "5" >
    <input type="submit" id="start" value="start" onclick="paint()">
    <input type="submit" id="stop" value="stop" onclick="stop()">
  </center>
  
	<footer>
	©PravotorovaINC,2018
	</footer>
  <script type="text/javascript" src="canvas.js"></script>
  </body> 
</html>

