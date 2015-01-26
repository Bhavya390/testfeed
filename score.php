<?php

require('core/init.php');
$admin_id = $_SESSION['id'];
$home_score =$_POST['homescore'];
$home_name =stripslashes($_POST['homename']);
$opp_score=$_POST['oppscore'];
$opp_name=stripslashes($_POST['oppname']);
$r=$users->score($home_score,$home_name,$opp_score,$opp_name,$admin_id);
if (!$r) {

  die('Error: ' . mysql_error());

}
header('Location:edit_home.php');
?>
