<?php

$host = '127.0.0.1';
$user = 'root';
$pass = '123456';
mysql_connect($host, $user, $pass);
mysql_select_db('member');

if(isset($_POST['user_email']))
{
	$emailId=$_POST['user_email'];
	$checkdata=" SELECT * FROM personal WHERE email='$emailId' ";
	$query=mysql_query($checkdata);
	if(mysql_num_rows($query)>0)
	{
	echo '<span style="color:#ff6666;">Email Already Exist</span>';
	}
	else
	{
	echo '<span style="color:#66cc66;">Email available !</span>';
	}
exit();
}
?>