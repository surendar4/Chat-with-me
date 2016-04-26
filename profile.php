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
$sql="SELECT fname from data where mobile='$m' or email='$m'";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
$pp=$row["fname"];
}
echo "";
echo "$pp<br>";
$sql="select * from data where mobile='$m' or email='$m'";
$result=mysqli_query($conn,$sql);
if($result->num_rows>0){
#echo "<table><tr><th>ID</th><th>full name</th><th>Date of Birth</th><th>Gender</th><th>Mobile</th><th>Joined date</th></tr>";
while($row=mysqli_fetch_assoc($result)){
#echo "<tr><td>".$row["id"]."</td><td>".$row["fname"]."</td><td>".$row["dob"]."</td><td>".$row["gender"]."</td><td>".$row["mobile"]."</td><td>".$row["regd"]."</td></tr>";

echo "<br>ID:".$row["id"]."<br>Full Name:".$row["fname"]."<br>Date Of Birth:".$row["dob"]."<br>Gender:".$row["gender"]."<br>Mobile:".$row["mobile"]."<br>Email:".$row["email"]."<br> City:".$row["city"]."<br>Joined on:".$row["regd"]."<br>";
}
#echo "</table";
}
$idd=$row["id"];
$sql="select count(*) from friends where id=$idd";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
#echo "total friends=".$row["count"].;
#echo "ffff=" .$result;
#echo "<a href='welcome.php'>Home</a><br>";
#echo "<a href='index.php'>Logout</a>";
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
