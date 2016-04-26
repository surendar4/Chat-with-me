<html>
<title>
Chat with me
</title>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style/css/style1.css">
</head>
<body>
<div class="wrapper">
	<div class="container">
<!--
<?php $check='2_surendar_45';
$check=$check%100;
echo "check=$check;" ?>
!-->


<center>
<?php session_start(); ?>
<?php if($_SESSION["id"] !=1){
echo "<body background='5.jpejg'>
<center>
<h1>
chat with me<br>
</h1>
<b>login</b><br><br>
<form action='check.php' method='POST'>
<input type='text' name='mob' placeholder='Email/Mobile' required><br>
<input type='password' name='psd' placeholder='Password' required><br>
<input type='submit' value='login'>
</form>
<form action='signup.php' method='POST'>
<input type='submit' value='Signup'>
</form>
<form action='forgot.php' method='POST'>
<input type='submit' value='Forgot password'>
</form>

</center>";
}
else {
echo "<h2> logined as "; 
$servername="localhost";
$username="root";
$password="ls@143";
$dbname="chat_box";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
die("connection failed: " .mysqli_connect_error());
}
#$m=$_POST["mob"];
$p=$_POST["psd"];
$m=$_SESSION['user'];
#echo $m;
$sql="SELECT fname from data where mobile='$m' or email='$m'";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
$pp=$row["fname"];
}
echo "";
echo "$pp<br>";
echo "<form action='profile.php' method='post'>
<input type='submit' value='Profile'></form>

<form action='messages.php' method='post'>
<input type='submit' value='Messages'></form>

<form action='friends.php' method='post'>
<input type='submit' value='Friends'></form>

<form action='index.php' method='post'>
<input type='submit' value='Logout'></form>";



mysqli_close($conn);
}
?>
<!--<form action="index.php" method="post">
	<input type="submit" value="logout">
	</form> !-->

</div>
<ul class='bg-bubbles'>
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
<script src='style/js/index.js'></script>

</center>
</body>
</html>
