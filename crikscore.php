<?php
require('core/init.php');
$admin_id= $_SESSION['id'];
$h_name = $_POST['homename'];
$h_run = $_POST['homeruns'];
$h_wicket = $_POST['homewickets'];
$h_towin = $_POST['hometowin'];
$o_name = $_POST['oppname'];
$o_run = $_POST['oppruns'];
$o_wicket = $_POST['oppwickets'];
$o_towin=$_POST['opptowin'];
$result = $h_name.' '.$h_run.' '.$h_wicket.' '.$h_towin.' '.$o_name.' '.$o_run.' '.$o_wicket.' '.$o_towin;
if($admin_id!=0)
{
$data = $users->crickscore($result,$admin_id);
}
if (!$data) {

  die('Error: ' . mysql_error());

}
header('Location:edit_home.php');
?>