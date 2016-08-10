<?php
$hostname = "127.0.0.1";
$username = "root";
$password ="123456";
$connection = mysql_connect($hostname, $username, $password) or die ("Could not open connection to database");
mysql_select_db("member", $connection) or die("Could not select database");
$username=$_GET['username'];
$password=$_GET['password'];
$checkid=mysql_query("SELECT * from personal WHERE username='$username' and password='$password'") or die("Could not issue MySQL query");
$records = mysql_num_rows($checkid);
if($records>0){
	echo "Login Successful";
}else{	
	echo "Wrong Username or Password";
	return;

}
?>