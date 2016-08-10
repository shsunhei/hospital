<?php
$hostname = "127.0.0.1";
$username = "root";
$password ="123456";
$connection = mysql_connect($hostname, $username, $password) or die ("Could not open connection to database");
mysql_select_db("member", $connection) or die("Could not select database");

parse_str(file_get_contents("php://input"),$post_vars);
$username1=$post_vars['username'];
$email=$post_vars['email'];
$pass=$post_vars['pass'];

$checkemail=mysql_query("SELECT * from personal WHERE email='$email' and password='$pass' and username='$username1'") or die("Could not issue MySQL query");
$records = mysql_num_rows($checkemail);
if($records>0){
	$sqlstring="delete from personal where email='$email'";
	mysql_query($sqlstring);
	echo "Account has been deleted";
}else{
	echo "Wrong Email or Password";
	return;

}
?>