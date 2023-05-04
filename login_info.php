<?php
$server = 'localhost';
$username = 'root';
$password = '';
$dbname = "User";

$conn = mysqli_connect($server,$username,$password,$dbname);

$logUnm = $_REQUEST['loguser'];
$logPass = $_REQUEST['logpass'];

$logUnm = stripcslashes($logUnm);
$logPass = stripcslashes($logPass);
$logUnm = mysqli_real_escape_string($conn,$logUnm);  
$logPass = mysqli_real_escape_string($conn,$logPass);  

$sql = "SELECT username,userpassword FROM User_data WHERE username='$logUnm' AND userpassword='$logPass'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$count = mysqli_num_rows($result);

if ($count == 1) {
  echo '<center><h1 style="margin-top:200px; color:green">Login Successfully....! </h1></center>';
  echo '<center><h2 style= "color:lightgreen">'."Welcome " .$logUnm."</h2></center>";
}
else{
  echo '<h2 style="margin-top:200px; color:red">Login Failed. Invalid Username or Password.</h2>';
}

?>