<?php
$hostname = "127.0.0.1";
$username = "root";
$password ="123456";
$connection = mysql_connect($hostname, $username, $password) or die ("Could not open connection to database");
mysql_select_db("member", $connection) or die("Could not select database");

$method = $_SERVER['REQUEST_METHOD'];
echo $method;


switch ($method){
case 'POST':
echo "Here is POST";


$username=$_POST['username'];
$password=$_POST['password'];
$email=$_POST['email'];

$checkid=mysql_query("SELECT * from personal WHERE username='$username'") or die ("Could not issue MySQL query");

$records = mysql_num_rows($checkid);

if($records>0){
	
	echo "Duplicate";
	return;
	
}else{
	
	$sqlstring="insert into personal (username,password,email) values ('$username', '$password','$email')";
	
	mysql_query($sqlstring);
	
}


 break;
case 'GET':

$username=$_GET['username'];
$password=$_GET['password'];
$checkid=mysql_query("SELECT * from personal WHERE username='$username' and password='$password'") or die("Could not issue MySQL query");
$records = mysql_num_rows($checkid);

if($records>0){
	echo "success";
}else{
	
	echo "Fail to login";
	return;
}




 break;
case 'PUT':

 echo "Here is PUT";

    parse_str(file_get_contents("php://input"),$post_vars);

   

    $username=$post_vars['username'];

    $oldpass=$post_vars['oldpass'];

    $newpass=$post_vars['newpass'];

 //echo $blogid;
 //echo  $emotion;
//echo $content1;

   $checkid=mysql_query("SELECT * from personal WHERE username='$username' and password='$oldpass'") or die("Could not issue MySQL query");

$records = mysql_num_rows($checkid);

if($records>0){
	
		$sqlstring="update personal set password='$newpass' where username='$username'";
	
	mysql_query($sqlstring);
	
	
}else{
	 echo "No user found";
	 return;
}
 

    break;

    case 'DELETE':

    parse_str(file_get_contents("php://input"),$post_vars);

 echo "Here is Delete";

      $username=$post_vars['username'];
      $password=$post_vars['password'];

 
$checkid=mysql_query("SELECT * from personal WHERE username='$username' and password='$password'") or die("Could not issue MySQL query");
$records = mysql_num_rows($checkid);

if($records>0){
	$sqlstring="delete from personal where username='$username'";
	
	mysql_query($sqlstring);
}else{
	
	echo "Fail to login";
	return;
}
   
 

    break;

 

  default:

    rest_error($request); 

    break;
}
	?>