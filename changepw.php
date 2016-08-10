<?php
$hostname = "127.0.0.1";
$username = "root";
$password ="123456";
$connection = mysql_connect($hostname, $username, $password) or die ("Could not open connection to database");
mysql_select_db("member", $connection) or die("Could not select database");

parse_str(file_get_contents("php://input"),$post_vars);
$email=$post_vars['email'];
$oldpass=$post_vars['oldpass'];
$newpass=$post_vars['newpass'];
$username1=$post_vars['username'];
$checkid=mysql_query("SELECT * from personal WHERE email='$email' and password='$oldpass' and username='$username1'") or die("Could not issue MySQL query");
$records = mysql_num_rows($checkid);
if($records>0){
	$sqlstring="update personal set password='$newpass' where email='$email'";
	mysql_query($sqlstring);
	echo "Changed password";
}else{
	 echo "Email / Password wrong";
	 return;
}
 
?>