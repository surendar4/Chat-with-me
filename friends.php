<html>
<title>
Chat with me
</title>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style/css/style.css">
</head>
<body>
<div class="wrapper">
	<div class="container">
<head>
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
#echo "<head>";
#echo "<font color='orange' <br>friend requests to display <br><br>";
#echo "sdfsjadf<br>";
$sql="select id from data where mobile='$m' or email='$m'";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
$id=$row["id"];
#echo $id;
#echo "Friend Requests ";
#$sql="select  fname,dob,gender,mobile from data,friends where data.id=friends.fid and friends.fid=$id";
$sql="select  data.id,fname,dob,gender,mobile from data,requests where data.id=requests.id and requests.fid=$id";
#echo "dwkfdwasdbjqwbd<br>";
$result=mysqli_query($conn,$sql);
if($result->num_rows>0){
echo "<table><tr><th>ID</th><th>Full Name</th></th><th>ID</th></tr>";
while($row=mysqli_fetch_assoc($result)){
#echo $row["fname"] "<br>";
/* $fn=$row["fname"];
$id=$row["id"];
echo "$id && $fn <br>"; */
$iid=$row["id"];
#echo "23213747<br>";
echo "<tr><td>".$row["id"]."</td><td>".$row["fname"]."</td><td><form action='add_friend.php' method='POST'>
<input type='submit' value='$iid-Accept'  name='fid'></form></td></tr>";
#echo "weyqwfeqyw<br>";
#echo "hhhhh";
}

#}
#}

}
}
echo "</head>";
echo "<font color='darkgreen' <br>friend requests to display<br>";

$sql="select id from data where mobile='$m' or email='$m'";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
$id=$row["id"];
#echo $id;

#$sql="select  fname,dob,gender,mobile from data,friends where data.id=friends.fid and friends.fid=$id";
$sql="select  distinct data.id,fname,dob,gender,mobile from data,friends where data.id=friends.id and friends.fid=$id";
$result=mysqli_query($conn,$sql);
if($result->num_rows>0){
echo "<table><tr><th>ID</th><th>full name</th><th>Date of Birth</th><th>Gender</th><th>Mobile</th></tr>";
while($row=mysqli_fetch_assoc($result)){
$iid=$row["id"];
echo "<tr><td>".$row["id"]."</td><td>".$row["fname"]."</td><td>".$row["dob"]."</td><td>".$row["gender"]."</td><td>".$row["mobile"]."</td><td><form action='unfriend.php' method='POST'>
<input type='submit' value='$iid-Unfriend'  name='fid'></form></td></tr>";

#echo "<br>ID:".$row["id"]."<br>Full Name:".$row["fname"]."<br>Date Of Birth:".$row["dob"]."<br>Gender:".$row["gender"]."<br>Mobile:".$row["mobile"]."<br>Joined on:".$row["regd"]."<br>";
}
echo "<font color='darkgreen' <br>friends to display<br>";

echo "</table></head>";
}
}


echo "<font color='black'>find friends<br>";
/*echo "<form method='POST' action='htmlspecialchars($_SERVER['PHP_SELF']);'>
sort by:<input type='radio' value='fname' name='sort'>Fname
	<input type='radio' value='mobile' name='sort'>Mobile
	<input type='radio' value='city' name='sort'>City
	<input type='submit' value='submit'></form><br>"; */
#if($_SERVER["REQUEST_METHOD"]=="POST"){
#$m=$_POST["mob"];
#$p=$_POST["dob"];
#$sort=$_POST["sort"];
#$sql="select fname from data where order by $sort";
/*$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
echo $row["fname"] "<br>";
#}
#}


} */
mysqli_close($conn);
}
?>
<form method='POST' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
sort by:<input type='submit' value='fname' name='sort'>
	<input type='submit' value='mobile' name='sort'>
	<input type='submit' value='city' name='sort'>
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
#$m=$_POST["mob"];
#$p=$_POST["dob"];
$sort=$_POST["sort"];
#echo $sort ;
$sql="select id,fname,$sort from data where id != ALL(select fid from friends,data where data.id=friends.id and mobile='$m' or email='$m') and id!= ALL(select fid from requests,data where data.id=requests.id and mobile='$m' or email='$m') and id!= $id order by $sort";
$result=mysqli_query($conn,$sql);
if($result->num_rows>0){
echo "<table><tr><th>ID</th><th>Full Name</th><th>$sort</th><th>ID</th></tr>";
while($row=mysqli_fetch_assoc($result)){
#echo $row["fname"] "<br>";
/* $fn=$row["fname"];
$id=$row["id"];
echo "$id && $fn <br>"; */
$iid=$row["id"];
echo "<tr><td>".$row["id"]."</td><td>".$row["fname"]."</td><td>".$row["$sort"]."</td><td><form action='add_request.php' method='POST'>
<input type='submit' value='$iid-add'  name='fid'></form></td></tr>";
#echo "hhhhh";
}

#}
#}

}
}
echo "</table>"; 
echo "<form action='welcome.php' method='post'>
<input type='submit' value='Home'></form>";
echo "<form action='index.php' method='post'>
<input type='submit' value='Logout'></form>";

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
