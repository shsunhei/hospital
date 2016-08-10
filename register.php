<?php
$hostname = "127.0.0.1";
$username = "root";
$password ="123456";
$connection = mysql_connect($hostname, $username, $password) or die ("Could not open connection to database");
mysql_select_db("member", $connection) or die("Could not select database");
$user=$_POST['username'];
$password=$_POST['password'];
$email=$_POST['email'];
$checkid=mysql_query("SELECT * from personal WHERE email='$email'") or die ("Could not issue MySQL query");
$checkname=mysql_query("SELECT * from personal WHERE username='$user'") or die ("Could not //issue MySQL query");
$records = mysql_num_rows($checkid);
$recordsname = mysql_num_rows($checkname);
$c1="0";
$c2="0";
if($records>0){
	echo "Duplicate Email";
	$c1="1";
	return;			
}
if($recordsname>0){
	echo "Duplicate Username";
	$c2="1";
	return;			
}

if ($c1 == "0" && $c2 == "0"){
	echo "successful";
	$sqlstring="insert into personal (username,password,email) values ('$user', '$password','$email')";
	mysql_query($sqlstring);
	
}

?>