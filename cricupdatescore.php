<?php
require('core/init.php');
$admin_id = $_SESSION['id'];
$id = $_GET['id'];
$hname = stripslashes($_POST['homename']);
$hruns = $_POST['homeruns'];
$hwicket = $_POST['homewickets'];
$htowin=$_POST['hometowin'];
$oruns =$_POST['oppruns'];
$owicket = $_POST['oppwickets'];
$otowin=$_POST['opptowin'];
$oname =stripslashes($_POST['oppname']);
$result = $hname.' '.$hruns.' '.$hwicket.' '.$htowin.' '.$oname.' '.$oruns.' '.$owicket.' '.$otowin;
$r = $users->cricupdatescore($result,$id);
if(!$r)
{
	die('Error:'.mysql_error());
}
header('location:edit_home.php');
?>