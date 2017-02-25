<?php
  include 'includes/connect.php';
  include 'includes/functions.php'
?>

<DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body>
<div id = "container">
<img id = "logo" src = "images/atomly_logo.png"></img>
<form method="post" action="index.php">
<fieldset class = "cf">
<input id = "url_long" type = "text" class = "shorten-input" placeholder = "Please enter your url..." name="long_url"></input>
<input id = "submit_" type = "submit" name = "submit_url" class = "action-btn" value = "SUBMIT"></input>
</fieldset>
</form>
<div id ="shorter"><h1><?php if(isset($shorturl)){ echo "Short URL: localhost:81/atomly/".$shorturl; } ?></h1></div>
</div>
<body>
</html>
