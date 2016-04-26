<!doctype html>
<html>
<title>
Recover password
</title>

<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style/css/style1.css">
</head>

<body>
<div class="wrapper">
	<div class="container">
<center>
<h2>Forgot password </h2><br>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<input type="text" name="mob" placeholder='Email/Mobile' required><br>
<input type="text" name="dob" placeholder='Date_Of_Birth' required><br>
<input type="submit" value="submit">
</form>


<?php
$servername="localhost";
$username="root";
$password="ls@143";
$dbname="chat_box";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
die("connection failed: " .mysqli_connect_error());
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
$m=$_POST["mob"];
$p=$_POST["dob"];
}

$sql="SELECT dob FROM login WHERE mobile='$m' or email='$m'";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
$pp=$row["dob"];
}

#echo " $pp and $p";
if($pp===$p)
{
#echo '45';
echo "<br>";

$sql="SELECT password FROM login WHERE mobile='$m' or email='$m'";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
$pp=$row["password"];
echo "<br> <font color='red'> Password=$pp<br>";
#echo "<a href='index.php'>login</a>";
echo "<form action='index.php' method='post'>
<input type='submit' value='Home'>";
#echo "<a href='index.php'>Logout</a></h2>";


}


}
else
{
#echo "password not matches<br>";
echo "<font color='red'>You have entered incorrect details please try again <br>";
echo "<form action='index.php' method='post'>
<input type='submit' value='Home'>";
#echo "<a href='index.php'>Logout</a></h2>";

}
mysqli_close($conn);
?> 
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
