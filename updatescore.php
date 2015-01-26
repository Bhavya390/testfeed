<?php
require('core/init.php');
$admin_id = $_SESSION['id'];
$id = $_GET['id'];

$hscore = $_POST['homescore'];
$hname = stripslashes($_POST['homename']);
$oscore =$_POST['oppscore'];
$oname =stripslashes($_POST['oppname']);
$r = $users->updatescore($hscore,$hname,$oscore,$oname,$id);


if (!$r) {

  die('Error: ' . mysql_error());

}

header('location:edit_home.php');

?>
