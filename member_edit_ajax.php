<?php
require ('core/init.php');
if($_POST['id'])
{
$id=mysql_escape_String($_POST['id']);
$membername=mysql_escape_String($_POST['name']);
$dept=mysql_escape_String($_POST['dept']);
$age=mysql_escape_String($_POST['age']);
$rollno=mysql_escape_String($_POST['rollno']);
$postion=mysql_escape_String($_POST['pos']);
$data = $users->updatemember($id,$membername,$dept,$age,$rollno,$postion);
}
?>
