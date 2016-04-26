<!DOCTYPE html>
<html>
<title>
chat with me
</title>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style/css/style1.css">
</head>
<?php
session_start(); ?>
<?php $_SESSION["id"]=0;
      $_SESSION["user"]=0; ?>
<body>
<div class="wrapper">
	<div class="container">
<center>
<h1>
chat with me<br>
</h1>
<b>login</b><br><br>
<form action="check.php" method="POST">
<input type="text" name="mob" placeholder='Email/Mobile' required><br>
<input type="password" name="psd" placeholder='Password' required><br>
<input type="submit" value="login">
</form>
<form action="signup.php" method="POST">
<input type="submit" value="New Registration">
</form>
<form action="forgot.php" method="POST">
<input type="submit" value="Forgot password">
</form>

</div>
<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
 <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="style/js/index.js"></script>




</center>
</body>
</html>


