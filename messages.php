<html>
<title>
Messages
</title>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style/css/style.css">
</head>
<body>
<div class="wrapper">
	<div class="container">
<center>
<?php session_start(); ?>
<?php if($_SESSION["id"] !=1){
echo "<body background='5.jpeg'>
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
echo "<h2> logged in as "; 
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
$sql="SELECT id,fname from data where mobile='$m' or email='$m'";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
$pp=$row["fname"];
$id=$row["id"];
}

$page=$_SERVER["PHP_SELF"];
$sec="10";
header("Refresh:$sec;url=$page");
#echo "Watch the page reload in 5 secs";
echo " ";
echo "$pp<br></h2>";
echo "<b>Recent Messages<br><br></b>";
$sql="select distinct id,fname from data where id in((select id from messages where fid=$id )) or id in((select fid from messages where id=$id )) ;";
$result=mysqli_query($conn,$sql);
if($result->num_rows>0){
while($row=mysqli_fetch_assoc($result)){
#echo "<br>".$row["fname"]." ";
$fn=$row["fname"];
$fnid=$row["id"];
$fff="$fnid-$fn";
echo "<form action='msg_history.php' method='POST'>
<input type='submit' value='$fff' name='frnd'></form>";

}
echo "<br>";

echo "<b>New Message<br><br></b>";
$sql="select id,fname from  data where id!=$id;";
$result=mysqli_query($conn,$sql);
if($result->num_rows>0){
while($row=mysqli_fetch_assoc($result)){
#echo "<br>".$row["fname"]." ";
$fn=$row["fname"];
$fnid=$row["id"];
$fff="$fnid-$fn";
echo "<form action='msg_history.php' method='POST'>
<input type='submit' value='$fff' name='frnd'></form>";

}
}
}
else{



echo "<font color='red' <br>NO messages to display<br><h2>";
echo "<b>New Message<br><br></b>";
$sql="select id,fname from  data where id!=$id;";
$result=mysqli_query($conn,$sql);
if($result->num_rows>0){
while($row=mysqli_fetch_assoc($result)){
#echo "<br>".$row["fname"]." ";
$fn=$row["fname"];
$fnid=$row["id"];
$fff="$fnid-$fn";
echo "<form action='msg_history.php' method='POST'>
<input type='submit' value='$fff' name='frnd' ></form>";

}
}
}
echo "<form action='welcome.php' method='post'>
<input type='submit' value='Home'></form>";
echo "<form action='index.php' method='post'>
<input type='submit' value='Logout'></form>";
mysqli_close($conn);
}
?>
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
