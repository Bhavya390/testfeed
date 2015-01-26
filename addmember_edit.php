<?php
require ('core/init.php');
$admin_id= $_SESSION['id'];
//if(isset($_POST['member_name'])&&isset($_POST['department'])&&isset($_POST['age'])&&isset($_POST['rollno'])&&isset($_POST['position']))
if(isset($_POST['buttonsave']))
{
	
	$membername=mysql_escape_String($_POST['member_name']);
	$dept=mysql_escape_String($_POST['department']);
	$age=mysql_escape_String($_POST['age']);
	$rollno=mysql_escape_String($_POST['rollno']);
	$postion=mysql_escape_String($_POST['position']);
	$data = $users->addmember($admin_id,$membername,$dept,$age,$rollno,$postion);
	
}
?>
