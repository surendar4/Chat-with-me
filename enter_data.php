<!DOCTYPE HTML>
<html>
<title>
Chat with Me
</title>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style/css/style.css">
</head>

<?php session_start(); ?>
<?php
$servername="localhost";
$username="root";
$password="ls@143";
$dbname="chat_box";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
die("connection failed: " .mysqli_connect_error());
}
#$e=$_POST["eid"];
$fn=$_POST["fname"];
$dob=$_POST["dob"];
$gender=$_POST["gender"];
$mob=$_POST["mob"];
$psd=$_POST["password"];
$city=$_POST["city"];
$email=$_POST["email"];
$sql="INSERT INTO data(fname,dob,gender,mobile,city,email) values('$fn','$dob','$gender','$mob','$city','$email')";

if(mysqli_query($conn, $sql)){
 #   echo "data";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$sql="SELECT id from data where mobile='$mob' or email='$email'";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
$id=$row["id"];
}
#echo "id=$id ";

$sql="INSERT INTO login values($id,'$psd','$dob','$mob','$email')";

if(mysqli_query($conn, $sql)){
    echo "Registered successfully";
#<!DOCTYPE html>

 $_SESSION["id"]=0;
      $_SESSION["user"]=0;
echo "<body>
<div class='wrapper'>
	<div class='container'>
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

";






} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?> 
<br>
</form>
</body>
</html>
