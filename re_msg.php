<html>
<title>
Messages
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
echo "<h2> logined as "; 
$servername="localhost";
$username="root";
$password="ls@143";
$dbname="chat_box";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
die("connection failed: " .mysqli_connect_error());
}
$page=$_SERVER["PHP_SELF"];
$sec="10";
header("Refresh:$sec;url=$page");
#echo "Watch the page reload in 5 secs";
#$m=$_POST["mob"];
#$p=$_POST["psd"];
$m=$_SESSION['user'];
#echo $m;
$fn_id=$_POST["frnd"];
#echo $fn_id;
$sql="SELECT id,fname from data where mobile='$m' or email='$m'";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
$pp=$row["fname"];
$id=$row["id"];
}
echo " ";
echo "$pp<br></h2>";
echo "<b>Messages<br><br></b>";
$fn_id=$_SESSION["fn_id"];
$mssg=$_POST["r_m"];
if(strlen($mssg)>0){
$sql="insert into messages(id,fid,msg) values($id,$fn_id,'$mssg');";
$result=mysqli_query($conn,$sql);
}
$sql="select id, msg,msgtime from messages where id=$id and fid=$fn_id or fid=$id and id=$fn_id order by msgtime asc;";
$result=mysqli_query($conn,$sql);
if($result->num_rows>0){
while($row=mysqli_fetch_assoc($result)){
#echo "<br>".$row["fname"]." ";
$msg=$row["msg"];
$sid=$row["id"];
$msgtime=$row["msgtime"];
$sql="select fname from data where id=$sid";
$result1=mysqli_query($conn,$sql);
while($row1=mysqli_fetch_assoc($result1)){
$fn=$row1["fname"];
echo "<font size=4px>". $fn;
echo "-";
echo $msg."<font size=1px>   ".$msgtime."<br><font size=4px>";
}

/* "<form action='msg_history.php' method='POST'>
<input type='submit' value='$fn' >
<input type='radio' value='$fnid' name='frnd'><br></form>";
*/
#$msgs=$row["msg"];
#echo $fn "and" $msgs;
}
echo "<form action='re_msg.php' method='POST'>
<input type='text' name='r_m' placeholder='reply'>
<input type='submit' value='send'>
</form>";
echo "<br>";
}
else{



echo "<font color='red' <br>NO messages to display<br><h2>";
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

</body>
</html>
